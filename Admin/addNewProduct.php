<?php
require_once './init.php';

if (Session::exists(Config::get('session/session_name'))) {

    if (Input::exists()) {
        if (Token::check(Input::get('token'))) {
            $productname = Input::get('productname');
            $productcategory = Input::get('productcategory');
            $file = $_FILES['files'];
            $productdescription = Input::get('productdescription');

            $allowedExts = array('jpg', 'png', 'jpeg');
            $uploadDirectory = Config::get('uploadDestinationDirectory');
            $maxSize = 4000000;
            try {
                $addNewProduct = new Product($productname, $productcategory, $productdescription, $file, $allowedExts, $uploadDirectory, $maxSize);
                Session::flash('addNewproduct', 'New product has been added successfully.');
                Redirect::to('addNewProduct.php');
            } catch (Exception $ex) {
                $errors = array($ex->getMessage());
            }
        }
    }
    ?>

    <?php require_once './Header.php'; ?>

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper site-min-height">
            <?php
            if (Session::exists('addNewproduct')) {
                echo '<div class="alert alert-success" style="margin-top: 50px;">';
                echo '<strong>Success! </strong>' . Session::flash('addNewproduct');
                echo '</div >';
            }
            ?>
            <h3 class="centered" > Add New Product </h3>
            <div class="row mt">
                <div class="col-lg-12">
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" class="form-horizontal" enctype="multipart/form-data" role="form">

                        <div class="form-group">
                            <label for="productname" class="col-md-offset-2 col-md-2 control-label">Product Name : </label>
                            <div class="col-md-5">
                                <input type="text" name="productname" id="productname" class="form-control" required="" placeholder="Type The Product Name.">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="productcategory" class="col-md-offset-2 col-md-2 control-label">Product Category : </label>
                            <div class="col-md-5">
                                <select class="form-control" name="productcategory" id="productcategory">
                                    <option>--Select Product Category--</option>
                                    <option>Herbs</option>
                                    <option>Seeds</option>
                                    <option>Spices</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="productimage" class="col-md-offset-2 col-md-2 control-label">Product Image : </label>
                            <div class="col-md-5">
                                <input class="form-control" type="file" id="productimage" name="files[]" multiple="" required="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="productdescription" class="col-md-offset-2 col-md-2 control-label">Product Description : </label>
                            <div class="col-md-5">
                                <textarea class="form-control" rows="5" name="productdescription" id="productdescription" placeholder="Type The Product Category" ></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-offset-2 col-md-2">
                            </div>
                            <div class="col-md-5">
                                <input type="hidden" name="token" value="<?php echo Token::generate(); ?>" />
                                <input type="submit" name="submit" value="Add New Product" class="btn btn-primary" />
                            </div>
                        </div>

                    </form>
                    <?php
                    if (isset($errors)) {
                        echo '<div class="alert alert-danger col-md-offset-1 col-md-7"> ';
                        echo '<strong>Danger!  </strong> ';
                        echo '<br /> ';
                        foreach ($errors as $error) {
                            echo $error . '<br />';
                        }
                    }
                    ?>
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
