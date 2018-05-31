<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "food";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if(isset($_SESSION['uname']))
{
    $user=$_SESSION['uname'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo $_SESSION["uname"]."'s "?>Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">    
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <link href='https://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet'>
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDqkB7IBBTwkpH2ZASExOmMqvy1-hOINjQ&libraries=places&callback=initMap" async defer></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
        <link href='https://fonts.googleapis.com/css?family=Caveat' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Delius Unicase' rel='stylesheet'>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <style>
            .chip {
                display: inline-block;
                padding: 0 25px;
                height: 200px;
                font-size: 25px;
                line-height: 30px;
                border-radius: 50px;
                background-color: #cceeff;
                color: black;
                font-weight: bolder;                
            }
            .chip img {
                font-family: 'Delius Unicase';
                float: left;
                margin: 0px 10px 0px -80px;
                height: 200px;
                width: 200px;
                border-radius: 50%;
            }
            #chip {
                display: inline-block;
                padding: 0 25px;
                height: 200 px;
                font-size: 25px;
                line-height: 30px;
                border-radius: 50px;
                background-color: #cceeff;
                color: black;
                font-weight: bolder;                
            }
            #chip img {
                font-family: 'Delius Unicase';
                float: right;
                margin: 0px -75px 0px 0px;
                height: 200px;
                width: 200px;
                border-radius: 50%;
            }
            #order {
                border-radius: 5px;
                transition: 0.3s;
            }

            #order:hover {opacity: 0.7;}
            
            .dropdown-menu a:hover {
                background-color: #ddd;
            }
            .dropdown:hover .dropdown-menu {
                display: block;
            }
            img{
                height: 250px;
            }
            #menu{
                padding: 35px;
            }
            .tab-content{
                background-color:#000000;
                color:#fff;
                padding:20px
            }
            .nav-tabs > li > a{
                border: medium none;
            }
            .nav-tabs > li > a:hover{
                background-color: #000000 !important;
                border: medium none;
                border-radius: 0;
                color:#fff;
            }
            .form-container{
                padding: 30px;
                background-color: #666666;
                box-shadow: 0 16px 24px 2px rgba(0,0,0,0.14), 0 20px 30px 5px rgba(0,0,0,0.12), 0 8px 10px -5px rgba(0,0,0,0.3);
                border-radius: 8px;
                font-size: 20px;
            }
            .radio-inline {
                display: block;
                position: relative;
                padding-left: 35px;
                margin-bottom: 12px;
                cursor: pointer;
                font-size: 22px;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }
            .radio-inline input {
                position: absolute;
                opacity: 0;
                cursor: pointer;
            }
            .checkmark {
                position: absolute;
                top: 0;
                left: 0;
                height: 25px;
                width: 25px;
                background-color: #eee;
                border-radius: 50%;
            }
            .radio-inline:hover input ~ .checkmark {
                background-color: #ccc;
            }
            .radio-inline input:checked ~ .checkmark {
                background-color: #2196F3;
            }
            .checkmark:after {
                content: "";
                position: absolute;
                display: none;
            }
            .radio-inline input:checked ~ .checkmark:after {
                display: block;
            }
            .radio-inline .checkmark:after {
            top: 9px;
            left: 9px;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: white;
        }

    </style>
        
    </head>
    
    <body style="background-color:#d9d9d9;">
        
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!--<a class="navbar-brand" href="index.html">Foodie</a>-->
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="home.php">Home <span class="sr-only"></span></a></li>
                        <li><a href="order.php">Orders <span class="sr-only"></span></a></li>
                        <li><a href="nearby.html">Nearby</a></li>
                        <!--<li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">One more separated link</a></li>
                            </ul>
                        </li>-->
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION["uname"]."  "?><i class="fa fa-user" style="color: white;font-size: 25px"></i> <span class="caret"></span></a>
                            <ul class="dropdown-menu" style="font-size:20px;">
                                <li><a href="home.php">Dashboard</a></li>
                                <li><a href="order.php">Orders</a></li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </li>
                        <li><a href="cart.php"><i class="fa fa-shopping-bag" style="color: white;font-size: 25px"></i></a></li>
                    </ul>
                    <form class="navbar-form navbar-right">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </form>          
                </div>
            </div>
        </nav>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>               
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                <img src="carousel/2.jpg" alt="Los Angeles" style="width:100%; height:700px">
                </div>

                <div class="item">
                    <img src="carousel/3.jpg" alt="Chicago" style="width:100%; height:700px">
                </div>
                
                <div class="item">
                    <img src="carousel/1.jpg" alt="New york" style="width:100%; height:700px">
                </div>
                
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        
        
         <div class="container-fluid" id="menu" style="background-color:#000000">

            <ul class="nav nav-tabs nav-justified">
                <li class="active"><a data-toggle="tab" href="#menu1">Thick Shake Factory</a></li>
                <li><a data-toggle="tab" href="#menu2">Barbecue Nation</a></li>
            </ul>

            <div class="tab-content">
                <div id="menu1" class="tab-pane fade in active">
                    <ul class="nav nav-tabs nav-justified">
                        <li><a data-toggle="tab" href="#menu11">Thick Shake Factory</a></li>
                        <!--<li><a data-toggle="tab" href="#menu12">Map</a></li>-->
                        <li><a data-toggle="tab" href="#menu13">Order</a></li>
                        <li><a data-toggle="tab" href="#menu14">Feedback</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="menu11" class="tab-pane fade in active">
                            <div class="row">
                                <div class="col-sm-4">                            
                                    <div class="card" style="width:300px">
                                        <img class="card-img-top" src="thickshake.png" alt="Card image" style="width:100%">
                                        <div class="card-body">
                                            <h4 class="card-title" style="text-align:center">THICK SHAKE FACTORY</h4>
                                            <p class="card-text" style="font-size:15px;">Serving the best Thickshakes and milkshakes around the globe, a stand alone champion in the game since 2013.</p>
                                            <div style="text-align:center"><a href="http://thethickshakefactory.com/ind/" class="btn btn-danger" target="_blank">Visit Us</a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <br>
                                    <div class="chip">
                                        <img src="review/me.jpg" alt="Person" width="150" height="150">
                                            <br><em><u>PARMEET SINGH</u></em> - 
                                            <p style="font-family: 'Caveat';font-size:25px;font-weight:70;">I think I  just found the milkshake place that just does it well for me just the way I like it. I have tried the Belgium Chocolate and Ice Cream Snickers thick shakes. Both of them were excellent.Its hard to miss when you pass through Brigade Road.</p>
                                    </div>
                                    <br><br>
                                    <div class="chip" id="chip">
                                        <img src="review/2.jpg" alt="Person" width="100" height="150">
                                            <br><em><u>PARMEET SINGH</u></em> - 
                                            <p style="font-family: 'Caveat';font-size:25px;font-weight:70;">Bright white themed place filled with cool air conditioning, shakes are simply the best with rich ingredients and no compromise in the quality and quantity, definitely one of the best place to have shakes and slushes, highly recommend.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="menu12" class="tab-pane fade">
                            <h3>Location</h3>
                        </div>
                        <div id="menu13" class="tab-pane fade">
                            <div class="row">
                                <div class="col-sm-6">
                                    <img src="thickshake/1.jpg" id="order1" alt="Drink 1" style="transform: rotate(360deg);height:300px;weight:300px;">
                                    
                                    <div style="text-align:center;"><span style="padding:5px;"><a class="btn btn-danger" href="order1.php">ADD</a>&nbsp;&nbsp;&#8377; 150 &nbsp;</span></div>
                                    
                                    <img src="thickshake/2.png" id="order2" alt="Drink 2" style="transform: rotate(360deg);height:300px;weight:300px;">
                                    
                                    <div style="text-align:center;"><span style="padding:5px;"><a class="btn btn-danger" href="order2.php">ADD</a>&nbsp;&nbsp;&#8377; 150 &nbsp;</span></div>
                                </div>
                                <div class="col-sm-6">
                                    <img src="thickshake/3.jpg" id="order3" alt="Drink 3" style="transform: rotate(360deg);height:300px;weight:300px;">
                                    
                                    <div style="text-align:center;"><span style="padding:5px;"><a class="btn btn-danger" href="order3.php">ADD</a>&nbsp;&nbsp;&#8377; 150 &nbsp;</span></div>
                                    
                                    <img src="thickshake/4.jpg" id="order4" alt="Drink 4" style="transform: rotate(360deg);height:300px;weight:300px;">
                                    
                                    <div style="text-align:center;"><span style="padding:5px;"><a class="btn btn-danger" href="order4.php">ADD</a>&nbsp;&nbsp;&#8377; 150 &nbsp;</span></div>
                                </div>
                            </div>
                        </div>
                        <div id="menu14" class="tab-pane fade">
                             <div class="container">
                                <div class="row " style="margin-top: 25px">
                                    <div class="col-md-6 col-md-offset-3 form-container">
                                        <p>
                                            Please help us to serve you better by taking a couple of minutes.
                                        </p><br>
                                        <form role="form" action="email_thickshake.php" method="post" id="reused_form">
                                            <div class="row">
                                                <div class="col-sm-12 form-group">
                                                    <label style="color:#66ccff;">How satisfied were you with our food?</label>
                                                        <label class="radio-inline">Bad
                                                            <input type="radio" name="experience" id="radio_experience" value="bad">
                                                            <span class="checkmark"></span>
                                                        </label>                                                        
                                                        <label class="radio-inline">Average
                                                            <input type="radio" name="experience" id="radio_experience" value="average" >
                                                            <span class="checkmark"></span>
                                                        </label>                                                        
                                                        <label class="radio-inline">Good
                                                            <input type="radio" name="experience" id="radio_experience" value="good">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                </div>
                                            </div>  
                                            <div class="row">
                                                <div class="col-sm-12 form-group">
                                                    <label for="comments"  style="color:#66ccff;">
                                                        If you have specific feedback, please write to us...</label>
                                                    <textarea class="form-control" type="textarea" name="comments" id="comments" placeholder="Your Comments..." maxlength="6000" rows="7" style="background-color:#e6e6e6" color:black; font-size:18px;></textarea>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 form-group">
                                                    <label for="name">
                                                        Your Name:</label>
                                                    <input type="text" class="form-control" id="name" name="name"  style="background-color:#e6e6e6;" required>
                                                </div>
                                                <div class="col-sm-6 form-group">
                                                    <label for="email">
                                                        Email:</label>
                                                    <input type="email" class="form-control" id="email" name="email"  style="background-color:#e6e6e6;" required>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-sm-12 form-group">
                                                    <button type="submit" class="btn btn-lg btn-warning btn-block" >Post </button>
                                                </div>
                                            </div>
                                            
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="menu2" class="tab-pane fade">
                    <ul class="nav nav-tabs nav-justified">
                        <li><a data-toggle="tab" href="#menu21">Barbecue Nation</a></li>
                        <!--<li><a data-toggle="tab" href="#menu22">Map</a></li>-->
                        <li><a data-toggle="tab" href="#menu23">Order</a></li>
                        <li><a data-toggle="tab" href="#menu24">Feedback</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="menu21" class="tab-pane fade in active">
                            <div class="row">
                                <div class="col-sm-4">                            
                                    <div class="card" style="width:300px">
                                        <img class="card-img-top" src="bbq.png" alt="Card image" style="width:100%">
                                        <div class="card-body">
                                            <h4 class="card-title" style="text-align:center">BARBECUE NATION</h4>
                                            <p class="card-text" style="font-size:15px;">Barbeque Nation is one of the finest options you will ever come across when it comes to live grills and saucy appetizers. Book your table today!</p>
                                        <div style="text-align:center"><a href="http://www.barbequenation.com/" class="btn btn-danger" target="_blank">Visit Us</a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <br>
                                    <div class="chip" id="chip">
                                        <img src="review/2.jpg" alt="Person" width="100" height="150">
                                            <br><em><u>PARMEET SINGH</u></em> - 
                                            <p style="font-family: 'Caveat';font-size:25px;font-weight:70;"> Barbeque Nation is really good for their buffet. They offer a wide range of food. The starters are the highlight. After that, we can have any food they have on offer, be it biriyani, noodles, fried rice, etc. Their desserts are also good. Great ambiance, friendly and really helpful staff.</p>
                                    </div>
                                    <br><br>
                                    <div class="chip">
                                        <img src="review/me.jpg" alt="Person" width="150" height="150">
                                            <br><em><u>PARMEET SINGH</u></em> - 
                                            <p style="font-family: 'Caveat';font-size:25px;font-weight:70;"> As always, you can’t go wrong with this place. However what stood out was the service and courteous staff. The starters were a delight and they went out of their way to ensure we are to our hearts content. The main course was good too and so was the selection of deserts.</p>
                                    </div>                                    
                                </div>
                            </div>
                            
                        </div>
                        <div id="menu22" class="tab-pane fade">
                        <h3>Location</h3>
                        </div>
                        <div id="menu23" class="tab-pane fade">
                            <div class="row">
                                <div class="col-sm-6">
                                    <img src="bbqn/1.jpg" id="order5" alt="Food 1" style="transform: rotate(360deg);height:300px;weight:300px;">
                                    
                                    <div style="text-align:center;"><span style="padding:5px;"><a class="btn btn-danger" href="order5.php">ADD</a>&nbsp;&nbsp;&#8377; 699 &nbsp;</span></div>
                                    
                                    <img src="bbqn/2.jpg" id="order6" alt="Food 2" style="transform: rotate(360deg);height:300px;weight:300px;">
                                    
                                    <div style="text-align:center;"><span style="padding:5px;"><a class="btn btn-danger" href="order6.php">ADD</a>&nbsp;&nbsp;&#8377; 699 &nbsp;</span></div>
                                    
                                </div>
                                <div class="col-sm-6">
                                    <img src="bbqn/3.jpg" id="order7" alt="Food 3" style="transform: rotate(360deg);height:300px;weight:300px;">
                                    
                                    <div style="text-align:center;"><span style="padding:5px;"><a class="btn btn-danger" href="order7.php">ADD</a>&nbsp;&nbsp;&#8377; 399 &nbsp;</span></div>
                                    
                                    <img src="bbqn/4.jpg" id="order8" alt="Food 4" style="transform: rotate(360deg);height:300px;weight:300px;">
                                    
                                    <div style="text-align:center;"><span style="padding:5px;"><a class="btn btn-danger" href="order8.php">ADD</a>&nbsp;&nbsp;&#8377; 349 &nbsp;</span></div>
                                </div>
                            </div>
                        </div>
                        <div id="menu24" class="tab-pane fade">
                             <div class="container">
                                <div class="row " style="margin-top: 25px">
                                    <div class="col-md-6 col-md-offset-3 form-container">
                                        <p>
                                            Please help us to serve you better by taking a couple of minutes.
                                        </p><br>
                                        <form role="form" action="email_bbq.php" method="post" id="reused_form">
                                            <div class="row">
                                                <div class="col-sm-12 form-group">
                                                    <label style="color:#66ccff;">How satisfied were you with our food?</label>
                                                        <label class="radio-inline">Bad
                                                            <input type="radio" name="experience" id="radio_experience" value="bad">
                                                            <span class="checkmark"></span>
                                                        </label>                                                        
                                                        <label class="radio-inline">Average
                                                            <input type="radio" name="experience" id="radio_experience" value="average" >
                                                            <span class="checkmark"></span>
                                                        </label>                                                        
                                                        <label class="radio-inline">Good
                                                            <input type="radio" name="experience" id="radio_experience" value="good">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                </div>
                                            </div>  
                                            <div class="row">
                                                <div class="col-sm-12 form-group">
                                                    <label for="comments"  style="color:#66ccff;">
                                                        If you have specific feedback, please write to us...</label>
                                                    <textarea class="form-control" type="textarea" name="comments" id="comments" placeholder="Your Comments..." maxlength="6000" rows="7" style="background-color:#e6e6e6" color:black; font-size:18px;></textarea>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 form-group">
                                                    <label for="name">
                                                        Your Name:</label>
                                                    <input type="text" class="form-control" id="name" name="name"  style="background-color:#e6e6e6;" required>
                                                </div>
                                                <div class="col-sm-6 form-group">
                                                    <label for="email">
                                                        Email:</label>
                                                    <input type="email" class="form-control" id="email" name="email"  style="background-color:#e6e6e6;" required>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-sm-12 form-group">
                                                    <button type="submit" class="btn btn-lg btn-warning btn-block" >Post </button>
                                                </div>
                                            </div>
                                            
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="container_loc">
            <div class="container_loc_text">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; New Delhi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#x25CF;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Kanpur &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#x25CF;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Vellore &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#x25CF;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Mumbai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#x25CF;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Chennai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#x25CF;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Bangalore &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#x25CF;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Kolkata
            </div>
        </div>
        <div class="container_footer">
            <div class="row footer1">
                <div class="col-sm-3">
                    <div class="company">
                        <h2>Company</h2>
                        <h4>About Us</h4>
                        <h4>Team</h4>
                        <h4>Career</h4>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="contact">
                        <h2>Contact Us</h2>
                        <h4>Help &amp; Support</h4>
                        <h4>Partner with us</h4>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="legal">
                        <h2>Legal</h2>
                        <h4>Terms &amp; Condition</h4>
                        <h4>Refund &amp; Cancellation</h4>
                        <h4>Privacy Policy</h4>
                        <h4>Offer Terms</h4>
                    </div>
                </div>
                <div class="col-sm-3">
                    <h2>Location</h2>
                    <div id="map"></div>
                    <script>
                      function initMap() {
                        var uluru = {lat: 12.9718, lng: 79.1589};
                        var map = new google.maps.Map(document.getElementById('map'), {
                          zoom: 15,
                          center: uluru
                        });
                        var marker = new google.maps.Marker({
                          position: uluru,
                          map: map
                        });
                      }
                    </script>
                </div>
            </div>
            <div class="row footer2">
                <div class="col-sm-4">FOODIE</div>
                <div class="col-sm-4">&copy;2018 Foodie</div>
                <div class="col-sm-4">
                    <a href="https://www.facebook.com/parmeet12singh" target="_blank"><i class="fa fa-facebook-f" style="color: white; padding-right: 25px;"></i></a>
                    <a href="https://twitter.com/parmeet12singh" target="_blank"><i class="fa fa-twitter" style="color: white; padding-right: 25px;"></i></a>
                    <a href="https://www.instagram.com/parmeet12singh/" target="_blank"><i class="fa fa-instagram" style="color: white; padding-right: 25px;"></i></a>
                    <a href="https://in.pinterest.com/parmeet12singh" target="_blank"><i class="fa fa-pinterest" style="color: white; padding-right: 25px;"></i></a>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
 }
else
    header("location: index.html");
 ?>