<?php

class DB {

    private static $_instance = null;
    private $_pdo,
            $_query,
            $_error = FALSE,
            $_result,
            $_count = 0;

    private function __construct() {
        try {
            $this->_pdo = new PDO('mysql:host=' . Config::get('mysql/host') . ';dbname=' . Config::get('mysql/db') . '', Config::get('mysql/username'), Config::get('mysql/password'));
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }

    public static function getInstance() {
        if (!isset(self::$_instance)) {
            self::$_instance = new DB();
        }
        return self::$_instance;
    }

    public function query($sql, $params = array()) {
        $this->_error = FALSE;

        if ($this->_query = $this->_pdo->prepare($sql)) {
            $paramIndex = 1;
            if (count($params)) {
                foreach ($params as $param) {
                    $this->_query->bindValue($paramIndex, $param);
                    $paramIndex++;
                }
            }
        }

        if ($this->_query->execute()) {
            $this->_result = $this->_query->fetchAll(PDO::FETCH_OBJ);
            $this->_count = $this->_query->rowCount();
        } else {
            $this->_error = TRUE;
        }

        return $this;
    }

    public function action($action, $table, $where = array()) {
        if (count($where) === 3) {
            $operators = array('=', '>', '<', '>=', '<=');

            $field = $where[0];
            $operator = $where[1];
            $value = $where[2];

            if (in_array($operator, $operators)) {
                $sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?";
                if (!$this->query($sql, array($value))->error()) {
                    return $this;
                }
            }
        }

        return FALSE;
    }

    public function insert($table, $values = array()) {
        $valuesCount = count($values);

        if ($valuesCount) {
            $keys = array_keys($values);
            $valuesMark = '?';
            $counter = 0;

            for ($counter; $counter < $valuesCount - 1; $counter++) {
                $valuesMark .= ', ?';
            }

            $sql = "INSERT INTO {$table} (`" . implode('`,`', $keys) . "`) Values ({$valuesMark})";

            if (!$this->query($sql, $values)->error()) {
                return TRUE;
            }
        }
        return FALSE;
    }

    public function update($table, $id, $fields) {
        $set = '';
        $counter = 1;

        foreach ($fields as $name => $value) {
            $set .= "{$name}=?";
            if ($counter < count($fields)) {
                $set .= ', ';
                $counter++;
            }
        }

        $sql = "UPDATE {$table} SET {$set} WHERE id = {$id}";

        if (!$this->query($sql, $fields)->error()) {
            return TRUE;
        }
        return FALSE;
    }

    public function delete($table, $where) {
        return $this->action('DELETE', $table, $where);
    }

    public function get($table, $where) {
        return $this->action('SELECT *', $table, $where);
    }

    public function getAll($table) {
        $this->_error = FALSE;

        $sql = 'SELECT * FROM ' . $table;
        $this->_query = $this->_pdo->prepare($sql);
        if ($this->_query->execute()) {
            $this->_result = $this->_query->fetchAll(PDO::FETCH_OBJ);
            $this->_count = $this->_query->rowCount();
        } else {
            $this->_error = TRUE;
        }

        return $this;
    }

    public function results() {
        return $this->_result;
    }

    public function count() {
        return $this->_count;
    }

    public function error() {
        return $this->_error;
    }

}
