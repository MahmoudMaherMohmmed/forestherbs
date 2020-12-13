<?php
require_once './init.php';

if (Input::exists()) {
    if (Token::check(Input::get('token'))) {
        $user = new User();
        $login = $user->login(Input::get('username'), Input::get('password'));
        if ($login) {
            Redirect::to('Home.php');
        } else {
            $msg = 'username or password is not correct';
        }
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Admin Login</title>
        <link rel='shortcut icon' href='../Resourses/Images/favicon.png' type='image/x-icon'>
        <link rel='icon' href='../Resourses/Images/favicon.png' type='image/x-icon'>


        <link rel="stylesheet" type="text/css" href="../Resourses/CSS/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="../Resourses/CSS/adminLogin-style.css" />
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6 col-xs-offset-1 col-xs-10">
                    <img src="../Resourses/Images/Logo.png" height="300px" width="300px" />
                    <form action="" method="post" class="form-horizontal" autocomplete="off">
                        <fieldset>
                            <label for="username">Username</label>
                            <input type="text" size="20" name="username" id="username" class="form-control " autofocus required />
                            <br />
                            <label for="password">Password</label>
                            <input type="password" size="20" name="password" class="form-control" id="password" required />
                            <br />
                            <input type="hidden" name="token" value="<?php echo Token::generate() ?>" />
                            <p class="submit"><input type="submit" value="Login" name="Login"></p>
                            <br />
                            <br />
                            <?php if (isset($msg)) { ?>
                                <div class = "alert alert-danger">
                                    <strong>Danger! </strong> <?php echo $msg; ?>
                                </div>
                            <?php } ?>

                        </fieldset>
                    </form>
                    <br />
                </div>
            </div>
        </div>
    </body>
</html>
