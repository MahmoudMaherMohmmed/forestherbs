<?php
require_once './init.php';
if (Session::exists(Config::get('session/session_name'))) {
    ?>

    <?php require_once './Header.php'; ?>

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper site-min-height">
            <?php
            if (Session::exists('deleteUserSucess')) {
                echo '<div class="alert alert-success" style="margin-top: 50px;">';
                echo '<strong>Success! </strong>' . Session::flash('deleteUserSucess');
                echo '</div >';
            } elseif (Session::exists('deleteUserfailed')) {
                echo '<div class="alert alert-danger" style="margin-top: 50px;">';
                echo '<strong>Success! </strong>' . Session::flash('deleteUserfailed');
                echo '</div >';
            }
            ?>
            <h3 class="centered"> View Users </h3>
            <div class="row mt">
                <div class="col-lg-12">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th> Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $user = new User();
                            $usersdata = $user->viewUsers();

                            foreach ($usersdata as $data) {
                                echo '<tr>';
                                echo '<td>' . $data->firstname . '</td>';
                                echo '<td>' . $data->lastname . '</td>';
                                echo '<td>' . $data->username . '</td>';
                                echo '<td>' . $data->email . '</td>';
                                echo '<td>' . $data->telephone . '</td>';
                                echo '<td> <a href="deleteUser.php?id=' . $data->id . '" class="btn btn-danger" role="button">Delete</a> </td>';
                                echo'</tr>';
                            }
                            ?>
                        </tbody>
                    </table>
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
