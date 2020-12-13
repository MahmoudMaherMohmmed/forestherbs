<?php

class Input {

    public static function exists($type = 'POST') {
        switch ($type) {
            case 'POST':
                return(!empty($_POST)) ? TRUE : FALSE;
                break;
            case 'GET':
                return(!empty($_GET)) ? TRUE : FALSE;
                break;
            default :
                return FALSE;
                break;
        }
    }

    public static function get($item) {
        if (isset($_POST[$item])) {
            return $_POST[$item];
        } elseif (isset($_GET[$item])) {
            return $_GET[$item];
        }
        return '';
    }

}
