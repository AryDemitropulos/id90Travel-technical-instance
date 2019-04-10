<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="vistas/Hoteles/hoteles.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="vistas/Hoteles/hoteles.css">


</head>
<body>
<div id="menu" class="display-flex-between">
    <div>
        <img width="75" src="recursos/color-logo.png" alt="">
    </div>
    <div class="display-flex-between">
        <div style="margin-right: 20px">Welcome <?php echo$_SESSION['user'];?></div>
        <div class="log-out"><a href="includes/logout.php">Log Out</a></div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12 background-search display-flex-center">
        <div>
            <h1 class="banner-text">your next best vacations</h1>
            <div class="panel panel-default display-flex-center">
                <div class="panel-body" style="width:100%;">

                    <form id="hotelSearch" class="hotel-form row form-search" action="" method="">

                        <div class="form-group col-md-3">
                            <label for="pwd">Destination:</label>
                            <input type="text" class="form-control" id="destination" placeholder="Your Place...">
                            <span class="text-danger" id="error-destination" style="display: none;"> Error destination</span>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="pwd">From:</label>
                            <input type="text" class="form-control" id="datepickerFrom">
                            <span class="text-danger" id="error-datepickerFrom" style="display: none;"> Error destination</span>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="pwd">To:</label>
                            <input type="text" class="form-control" id="datepickerTo">
                            <span class="text-danger" id="error-datepickerTo" style="display: none;"> Error destination</span>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="pwd">Gests:</label>
                            <input type="number" class="form-control" id="guests" value="1" min="1">
                            <span class="text-danger" id="error-guests" style="display: none;"> Error destination</span>
                        </div>



                    </form>
                    <button type="button" onclick="refreshTable()" class="btn  pull-right button-search">Search</button>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-12 display-flex-center">
        <div style="width: 80%">
            <h2 class="regular-padding">Hotels</h2>

            <div class="regular-padding" id="complete-the-fields"> <h3>Please complete the fields to find the best hotel for you.</h3> </div>
            <div id="hotel-container">

            </div>


            <div class="display-flex-center" id="loading" style="display: none;     height: 200px;">
                <div class="loader">
                </div>
            </div>


        </div>
    </div>
</div>



</body>
</html>

