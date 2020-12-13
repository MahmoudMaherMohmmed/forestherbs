<?php
require_once './init.php';

if (Session::exists(Config::get('session/session_name'))) {

    if (Input::exists()) {
        if (Token::check(Input::get('token'))) {
            $validate = new Validate();
            $validation = $validate->check($_POST, array(
                'firstname' => array('required' => TRUE, 'min' => 2, 'max' => 25),
                'lastname' => array('required' => TRUE, 'min' => 2, 'max' => 25),
                'username' => array('required' => TRUE, 'min' => 2, 'max' => 50),
                'email' => array('required' => TRUE, 'min' => 2, 'max' => 100),
                'password' => array('required' => TRUE, 'min' => 2),
                'repeat_password' => array('required' => TRUE, 'matches' => 'password'),
                'phone' => array('required' => TRUE, 'min' => 2, 'max' => 25)
            ));

            if ($validation->passed()) {
                $user = new User();
                $salt = Hash::salt(32);
                try {
                    $user->create(array(
                        'firstname' => Input::get('firstname'),
                        'lastname' => Input::get('lastname'),
                        'username' => Input::get('username'),
                        'email' => Input::get('email'),
                        'password' => Hash::make(Input::get('password'), $salt),
                        'salt' => $salt,
                        'telephone' => Input::get('phone'),
                        'joined' => date('Y:m:d H:i:s')
                    ));
                    Session::flash('addNewUser', 'New account has been added successfully.');
                    Redirect::to('addNewUser.php');
                } catch (Exception $ex) {
                    $errors = $ex->getMessage();
                }
            } else {
                $errors = $validation->errors();
            }
        }
    }
    ?>


    <?php require_once './Header.php'; ?>

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper site-min-height">
            <?php
            if (Session::exists('addNewUser')) {
                echo '<div class="alert alert-success" style="margin-top: 50px;">';
                echo '<strong>Success! </strong>' . Session::flash('addNewUser');
                echo '</div >';
            }
            ?>
            <h3 class="centered">Add New User</h3>
            <div class="row mt">
                <div class="col-lg-12">
                    <form action="" method="POST" class="form-horizontal" role="form">
                        <div class="form-group">
                            <label for="firstname" class="col-md-offset-1 col-md-2 control-label"> First Name : </label>
                            <div class="col-md-5">
                                <input type="text" name="firstname" id="firstname" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="col-md-offset-1 col-md-2 control-label"> Last Name : </label>
                            <div class="col-md-5">
                                <input type="text" name="lastname" id="lastname" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username" class="col-md-offset-1 col-md-2 control-label"> User Name : </label>
                            <div class="col-md-5">
                                <input type="text" name="username" id="username" class="form-control" autocomplete="off" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-md-offset-1 col-md-2 control-label"> Email : </label>
                            <div class="col-md-5">
                                <input type="email" name="email" id="email" class="form-control" autocomplete="off" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-offset-1 col-md-2 control-label"> Password : </label>
                            <div class="col-md-5">
                                <input type="password" name="password" id="password" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="repeat_password" class="col-md-offset-1 col-md-2 control-label"> Retype Your Password : </label>
                            <div class="col-md-5">
                                <input type="password" name="repeat_password" id="repeat_password" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="phone" class="col-md-offset-1 col-md-2 control-label"> Phone Number : </label>
                            <div class="col-md-5">
                                <input type="tel" name="phone" id="phone" class="form-control" />
                            </div>
                        </div>

                        <input type="hidden" name="token" value="<?php echo Token::generate() ?>" />
                        <input type="submit" value="Add New Admin" class="btn btn-primary col-md-offset-3" />

                        <br />
                        <br />

                        <?php
                        if (isset($errors)) {
                            ?>
                            <div class="alert alert-danger col-md-offset-1 col-md-7">
                                <strong>Danger!  </strong>
                                <br />
                                <?php
                                foreach ($errors as $error) {
                                    echo $error . '<br />';
                                }
                            }
                            ?>
                        </div>
                    </form>
                </div>
            </div>

        </section><! --/wrapper -->
    </section>
    <!--main content end-->

    <?php require_once './Footer.php'; ?>

    <?php
} else {
    Redirect::to('index.php');
}



