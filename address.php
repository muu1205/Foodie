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
        <title><?php echo $_SESSION["uname"]."'s "?>order</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">    
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <link href='https://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet'>
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAgxu6PdlRpm2-TwzK-vanmUFhmBgNFoNA&libraries=places&callback=initMap" async defer></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
        <link href='https://fonts.googleapis.com/css?family=Caveat' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Delius Unicase' rel='stylesheet'>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        
        <style>
            #confirm{
                border-radius: 10px;
                height: 60px;
                width: 250px;
                font-size: 25px;
                line-height: 50px;
                border-collapse: collapse;
                text-transform: uppercase;
            }
            table{
              width:100%;
              table-layout: fixed;
            }
            .tbl-header{
              background-color: rgba(255,255,255,0.3);
             }
            .tbl-content{
              height:300px;
              overflow-x:auto;
              margin-top: 0px;
              border: 1px solid rgba(255,255,255,0.3);
            }
            th{
              padding: 20px 15px;
              text-align: left;
              font-weight: bolder;
              font-size: 25px;
              color: black;
              text-transform: uppercase;
            }
            td{
              padding: 15px;
              text-align: left;
              vertical-align:middle;
              font-weight: 300;
              font-size: 20px;
              color: black;
              border-bottom: solid 1px rgba(255,255,255,0.1);
            }


            /* demo styles */

            body{
                background: -webkit-linear-gradient(left, #ff8c66, #ffb366);
                background: linear-gradient(to right, #ff8c66, #ffb366);
            }
            section{
              margin: 50px;
            }



            /* for custom scrollbar for webkit browser*/

            ::-webkit-scrollbar {
                width: 6px;
            } 
            ::-webkit-scrollbar-track {
                -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
            } 
            ::-webkit-scrollbar-thumb {
                -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
            }
            .dropdown-menu a:hover {
                background-color: #ddd;
            }   
            .dropdown:hover .dropdown-menu {
                display: block;
            }
        </style>
    </head>
    <body>
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
        <br><br>
        <div>
            <br>
            <div align="center"><h2><span id="detail">Payment Details</span></h2></div>
            <div class="container">
                <div class="row " style="margin-top: 25px">
                    <div class="col-md-6 col-md-offset-3 form-container">
                        <form role="form" action="address_save.php" method="post" id="reused_form">
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label for="name">
                                        Your Name: <span style="font-size: 25px;" class="glyphicon glyphicon-user"></span></label>
                                    <input type="text" class="form-control" id="name" name="name"  style="background-color:#white;" required>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label for="email">
                                        Phone Number: <i style="font-size: 25px;" class="fa fa-phone"></i></label>
                                    <input type="text" class="form-control" id="phone" name="phone"  style="background-color:#white;" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label for="add1">
                                        House Number: <i style="font-size: 25px;" class="fa fa-home"></i></label>
                                    <input type="text" class="form-control" id="hno" name="hno"  style="background-color:#white;" required>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label for="add2">
                                        Locality: <i style="font-size: 25px;" class="fa fa-home"></i></label>
                                    <input type="text" class="form-control" id="loc" name="loc"  style="background-color:#white;" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label for="city">City: <i style="font-size: 25px;" class="material-icons">location_city</i></label>
                                    <select class="form-control" name="city" id="city">
                                        <option>New Delhi</option>
                                        <option>Kanpur</option>
                                        <option>Vellore</option>                                                            <option>Mumbai</option>
                                        <option>Chennai</option>
                                        <option>Bangalore</option>
                                        <option>Kolkata</option>
                                    </select>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label for="state">State: <i style="font-size: 25px;" class="material-icons">location_on</i></label>
                                    <select class="form-control" name="state" id="state">
                                        <option>NCR</option>
                                        <option>Uttar Pradesh</option>
                                        <option>Tamil Nadu</option>
                                        <option>Maharashtra</option>
                                        <option>Karnataka</option>
                                        <option>West Bengal</option>
                                    </select>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-sm-12 form-group">
                                    <label>Payment Options: <i style="font-size: 25px;" class="fa fa-google-wallet"></i></label><br>
                                    <div class="radio">
                                        <label><input type="radio" name="payment" value="cod">Cash On Delivery</label>
                                    </div>
                                    <div class="radio">
                                        <label><input type="radio" name="payment" value="wallet">Foodie Wallet</label>
                                    </div>
                                </div>
                            </div>                                            
                            <div class="row">
                                <div class="col-sm-12 form-group">
                                    <button type="submit" onclick="window.location.href='address_save.php'" style="background-color:#ff9900" class="btn btn-lg btn-warning btn-block" >Post </button>
                                </div>
                            </div>
                        </form>
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