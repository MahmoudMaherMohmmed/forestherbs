<?php

require_once './init.php';

$productId = $_GET['id'];
$user = new User();

if ($user->deleteProducts($productId)) {
    Session::flash('deleteProductSucess', 'The product has been Deleted Successfully');
} else {
    Session::flash('deleteProductfailed', 'The product cann\'t be Deleted');
}

Redirect::to('viewProducts.php');
