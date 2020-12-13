<?php
require_once './init.php';

if (Session::exists(Config::get('session/session_name'))) {
    ?>
    <?php require_once './Header.php'; ?>

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper site-min-height">
            <?php
            if (Session::exists('deleteProductSucess')) {
                echo '<div class="alert alert-success" style="margin-top: 50px;">';
                echo '<strong>Success! </strong>' . Session::flash('deleteProductSucess');
                echo '</div >';
            } elseif (Session::exists('deleteProductfailed')) {
                echo '<div class="alert alert-danger" style="margin-top: 50px;">';
                echo '<strong>Success! </strong>' . Session::flash('deleteProductfailed');
                echo '</div >';
            }
            ?>
            <h3 class="centered"> View Users </h3>
            <div class="row mt">
                <div class="col-lg-12">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Product Image</th>
                                <th>Product Description</th>
                                <th> Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $user = new User();
                            $productsdata = $user->viewProducts();

                            foreach ($productsdata as $data) {
                                echo '<tr>';
                                echo '<td>' . $data->name . '</td>';
                                echo '<td>' . $data->image . '</td>';
                                echo '<td>' . $data->description . '</td>';
                                echo '<td> <a href="deleteProduct.php?id=' . $data->id . '" class="btn btn-danger" role="button">Delete</a> </td>';
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

