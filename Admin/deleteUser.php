<?php

require_once './init.php';

$userId = $_GET['id'];
$user = new User();

if ($user->deleteUser($userId)) {
    Session::flash('deleteUserSucess', 'The Account has been Deleted Successfully');
} else {
    Session::flash('deleteUserfailed', 'The Account cann\'t be Deleted');
}

Redirect::to('viewUsers.php');



