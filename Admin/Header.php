<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Dashboard">
        <meta name="keyword" content="">

        <title>Admin Panel</title>
        <link rel='shortcut icon' href='../Resourses/Images/favicon.png' type='image/x-icon'>
        <link rel='icon' href='../Resourses/Images/favicon.png' type='image/x-icon'>

        <link href="../Resourses/CSS/bootstrap.css" rel="stylesheet" />
        <link href="../Resourses/CSS/font-awesome.css" rel="stylesheet" />
        <link href="../Resourses/CSS/admin-style.css" rel="stylesheet" />
        <link href="../Resourses/CSS/admin-style-responsive.css" rel="stylesheet" />
    </head>

    <body>
        <section id="container" >
            <!--header start-->
            <header class="header black-bg">
                <div class="sidebar-toggle-box">
                    <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
                </div>

                <!--logo start-->
                <a href="#" class="logo"><b>Forest Herbs</b></a>
                <!--logo end-->

                <div class="top-menu">
                    <ul class="nav pull-right top-menu">
                        <li><a class="logout" href="./Logout.php">Logout</a></li>
                    </ul>
                </div>
            </header>
            <!--header end-->

            <!--sidebar start-->
            <aside>
                <div id="sidebar"  class="nav-collapse ">
                    <!-- sidebar menu start-->
                    <ul class="sidebar-menu" id="nav-accordion">

                        <p class="centered"> <a href="#"><img src="../Resourses/Images/admin-sam.jpg" class="img-circle" width="60"></a> </p>
                        <h5 class="centered">Admin</h5>

                        <li class="mt">
                            <a href="./Home.php">
                                <i class="fa fa-dashboard"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sub-menu">
                            <a href="javascript:;" >
                                <i class="fa fa-users"></i>
                                <span>Users</span>
                            </a>
                            <ul class="sub">
                                <li><a  href="./addNewUser.php">Add New User</a></li>
                                <li><a  href="./viewUsers.php">View users</a></li>
                            </ul>
                        </li>

                        <li class="sub-menu">
                            <a href="javascript:;" >
                                <i class="fa fa-cogs"></i>
                                <span>products</span>
                            </a>
                            <ul class="sub">
                                <li><a  href="./addNewProduct.php">Add New Product</a></li>
                                <li><a  href="./viewProducts.php">View Products</a></li>
                            </ul>
                        </li>

                    </ul>
                    <!-- sidebar menu end-->
                </div>
            </aside>
            <!--sidebar end-->

        </section>
    </body>
</html>

