<?php

class Validate {

    private $_passed = FALSE,
            $_errors = array(),
            $_db = NULL;

    public function __construct() {
        $_db = DB::getInstance();
    }

    public function check($source, $items = array()) {

        foreach ($items as $item => $rules) {
            foreach ($rules as $rule => $rule_value) {

                $value = $source[$item];
                if ($rule === 'required' && empty($value)) {
                    $this->addError("{$item} is required .");
                } else {
                    switch ($rule) {
                        case 'min':
                            if (strlen($value) < $rule_value) {
                                $this->addError("{$item} must be a minmum {$rule_value} .");
                            }
                            break;
                        case 'max':
                            if (strlen($value) > $rule_value) {
                                $this->addError("{$item} must bs a muxmum {$rule_value} .");
                            }
                            break;
                        case 'matches':
                            if ($value != $source[$rule_value]) {
                                $this->addError("{$item} must matches {$rule_value} .");
                            }
                            break;
                    }
                }
            }
        }

        if (empty($this->_errors)) {
            $this->_passed = TRUE;
        }

        return $this;
    }

    private function addError($error) {
        $this->_errors[] = $error;
    }

    public function errors() {
        return $this->_errors;
    }

    public function passed() {
        return $this->_passed;
    }

}
