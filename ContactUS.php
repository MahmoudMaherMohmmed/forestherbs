<!DOCTYPE html>

<html lang="en">
<head>
    <title>Forest Herbs | | Contact Us</title>
    <link rel='shortcut icon' href='./Resourses/Images/favicon.png' type='image/x-icon'>
    <link rel='icon' href='./Resourses/Images/favicon.png' type='image/x-icon'>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="keywords" content="Forest Herbs,Forest Herbs for import and export,herbs,seeds,spices">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="./Resourses/CSS/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="./Resourses/CSS/font-awesome.css" rel="stylesheet" type="text/css"/>
    <link href="./Resourses/CSS/main-style.css" rel="stylesheet" type="text/css"/>

</head>
<body>

<?php require './Header.php'; ?>

<!----- ContactUs Section ----->
<section class="SendUs">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h1 class="heading text-center">Send Us</h1>
                <form class="form-horizontal" role="form" method="post" action="">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="name" name="name" placeholder="First &amp; Last Name"
                                   type="text" required>
                            <p class="text-danger"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="email" name="email" placeholder="example@domain.com"
                                   type="email" required>
                            <p class="text-danger"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message" class="col-sm-2 control-label">Message</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="4" name="message" required></textarea>
                            <p class="text-danger"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-2">
                            <input id="submit" name="submit" value="Send" class="btn btn-primary" type="submit">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-2">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!----- SendUs Section ----->

<!----- GoogleMap Section ----->
<section class="GoogleMap">
    <div class="container">
        <div class="row">
            <h1 class="heading text-center">You can Find Us In Bing Map</h1>
            <div id="map"></div>
        </div>
    </div>
</section>
<!----- GoogleMap Section ----->

<!----- ContactDetails Section ----->
<section class="ContactDetails ">
    <div class="container">
        <div class="row">
            <h1 class="heading text-center">Contact Details</h1>
            <div class="col-md-6">
                <h3 class="page-header">Contact Info</h3>
                <div class="info-element">
                    <i class="fa fa-map-marker"></i>
                    <div class="contact-right">
                        <p>Address</p>
                        <span>Minshat Abu Milih, Sumusta </span>
                        <br/>
                        <span>Bani Swief, Egypt.</span>
                    </div>
                </div>
                <div class="info-element">
                    <i class="fa fa-mobile"></i>
                    <div class="contact-right">
                        <p>Mobile</p><span>(+20) 01280605162</span>
                    </div>
                </div>
                <div class="info-element">
                    <i class="fa fa-phone"></i>
                    <div class="contact-right">
                        <p>Phone</p><span>082-2393159</span>
                    </div>
                </div>
                <div class="info-element">
                    <i class="fa fa-envelope"></i>
                    <div class="contact-right">
                        <p>Email</p>
                        <a href="mailto:info@forestherbs.net">info@forestherbs.net</a>
                        <br/>
                        <a href="mailto:export@forestherbs.net">export@forestherbs.net</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 text-center">
                <h3 class="page-header">Around the Web</h3>
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <a class="btn-social" href="#">
                            <i class="fa fa-fw fa-facebook"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a class="btn-social" href="#">
                            <i class="fa fa-fw fa-linkedin"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a class="btn-social" href="#">
                            <i class="fa fa-fw fa-google-plus"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a class="btn-social" href="#">
                            <i class="fa fa-fw fa-twitter"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!----- ContactInfo Section ----->

<?php require './Footer.php'; ?>

<script type='text/javascript' src='https://www.bing.com/api/maps/mapcontrol?callback=GetMap' async defer></script>
<script type="text/javascript">
    var map;

    function GetMap() {
        var mapOptions = {
            credentials: 'Ajm3EHiK3zFMxrqPVOhgQnKOPNvRkbNRTE4Pr-lYjEnhMvq9PgGNq0XW2dJ0FLz5',
            center: new Microsoft.Maps.Location(28.966817, 30.904508),
            mapTypeId: Microsoft.Maps.MapTypeId.aerial,
            zoom: 14
        };
        map = new Microsoft.Maps.Map('#map', mapOptions);

        var infoboxOptions = {
            width: 200,
            height: 100,
            showCloseButton: true,
            zIndex: 0,
            offset: new Microsoft.Maps.Point(10, 0),
            showPointer: true,
            title: 'Forest Herbs'
        };
        var infobox = new Microsoft.Maps.Infobox(map.getCenter(), infoboxOptions);
        infobox.setMap(map);
    }
</script>

<script src="Resourses/JS/jquery.js"></script>
<script src="Resourses/JS/bootstrap.js"></script>

</body>
</html>

