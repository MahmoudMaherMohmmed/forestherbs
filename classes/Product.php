<?php

class Product {

    private $_productname,
            $_productcategory,
            $_productdescription,
            $_allowExts,
            $_maxSize,
            $_file,
            $_uploadDirectory,
            $_fileURL;

    function __construct($productname, $productcategory, $productdescription, $file, $allowedExts, $uploadDirectory, $maxSize) {
        if (is_array($allowedExts) AND is_int($maxSize)) {
            $this->_productname = $productname;
            $this->_productcategory = $productcategory;
            $this->_productdescription = $productdescription;
            $this->_file = $file;
            $this->_allowExts = $allowedExts;
            $this->_maxSize = $maxSize;
            $this->_uploadDirectory = $uploadDirectory;

            $this->uploadedImage();
        } else {
            throw new Exception("File extention must be in array and max size value must be integer value.");
        }
    }

    private function uploadedImage() {
        $file = $this->_file;
        $allowExts = $this->_allowExts;
        $maxsize = $this->_maxSize;
        $uploadDir = $this->_uploadDirectory;

        for ($i = 0; $i < count($file['name']); $i++) {
            $errors = array();

            $fileName = $file['name'][$i];
            @$fileExts = strtolower(end(explode('.', $fileName)));
            $fileSize = $file['size'][$i];
            $filetmpName = $file['tmp_name'][$i];

            if (in_array($fileExts, $allowExts) === FALSE) {
                $errors[] = "Extension is not allowed.";
            }

            if ($fileSize > $maxsize) {
                $errors[] = "File size must be smaller.";
            }

            if (empty($errors)) {
                $random = rand(0, 999);
                $this->_fileURL = $fileName;
                $destination = $uploadDir . $fileName;

                move_uploaded_file($filetmpName, $destination);

                $this->addProductToDatabase();
            } else {
                foreach ($errors as $error) {
                    throw new Exception($error);
                }
            }
        }
    }

    private function addProductToDatabase() {
        $user = new User();

        if ($this->_productcategory === 'Herbs') {
            $this->_productcategory = 1;
        } elseif ($this->_productcategory === 'Seeds') {
            $this->_productcategory = 2;
        } else {
            $this->_productcategory = 3;
        }

        $user->addNewProduct(array(
            'name' => $this->_productname,
            'image' => $this->_fileURL,
            'description' => $this->_productdescription,
            'category_id' => $this->_productcategory
        ));
    }

}
