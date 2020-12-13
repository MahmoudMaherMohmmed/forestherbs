<?php

class User {

    private $_db,
            $_data,
            $_sessionName;

    public function __construct($user = null) {
        $this->_db = DB::getInstance();
        $this->_sessionName = Config::get('session/session_name');
    }

    public function create($fields = array()) {
        if (!$this->_db->insert('users', $fields)) {
            throw new Exception('There was a problem creating a new user.');
        }
    }

    public function login($username, $password) {
        $data = $this->_db->get('users', array('username', '=', $username));

        if ($data->count()) {
            $this->_data = $data->results()[0];
            if ($this->data()->password === Hash::make($password, $this->data()->salt)) {
                Session::put($this->_sessionName, $this->data()->id);
                return TRUE;
            }
        }

        return FALSE;
    }

    public function viewUsers() {
        $data = $this->_db->getAll('users');

        if ($data->count()) {
            return $data->results();
        }
    }

    public function deleteUser($id) {
        if ($this->_db->delete('users', array('id', '=', $id))) {
            return TRUE;
        }
        return FALSE;
    }

    public function logout() {
        Session::delete($this->_sessionName);
    }

    public function addNewProduct($fields = array()) {
        try {
            if (!$this->_db->insert('products', $fields)) {
                throw new Exception('There was a problem adding new product.');
            }
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
    }

    public function viewProducts() {
        $data = $this->_db->getAll('products');

        if ($data->count()) {
            return $data->results();
        }
    }

    public function deleteProducts($id) {
        if ($this->_db->delete('products', array('id', '=', $id))) {
            return TRUE;
        }
        return FALSE;
    }

    public function getProducts($productType) {
        $sql = 'SELECT * 
                FROM   products
                WHERE  products.category_id = ( SELECT category.id FROM category WHERE category.name = ? )';
        $data = $this->_db->query($sql, $productType);
        if ($data->count()) {
            return $data->results();
        }
    }

    private function data() {
        return $this->_data;
    }

}
