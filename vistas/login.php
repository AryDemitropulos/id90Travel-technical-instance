<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sesiones</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="main.css">
</head>
<body>
<div class="display-flex-between">
    <div style="width: 800px">

        <div class="" >
            <div class="panel-body">
                <div class="display-flex-center" style="margin: 20px;">

                    <img src="recursos/color-logo.png" alt="">
                </div>
                <form action="vistas/auth.php" method="POST">
                    <?php
                    if(isset($_GET["error"])){
                        echo '<div class="bg-danger error-panel">'.$_GET["error"].'</div>';
                    }
                    ?>


                    <div class="form-group">
                        <label for="sel1">Company:</label>
                        <select class="form-control" id="airline" name="airline" required>

                            <option value="" disabled selected>Select your company</option>
                            <?php
                            $get_data = callAPI('GET', 'https://beta.id90travel.com/airlines/', false);
                            $response = $get_data;

                            $airlines = new Airlines();
                            $airlines->SetAirlines(json_decode($response,true));


                            foreach($airlines->airlinesArray as $item){
                                ?>
                                <option value="<?php echo  $item->display_name;   ?> "><?php echo  $item->display_name;   ?> </option>
                                <?php
                            }
                            ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email">Username:</label>
                        <input type="text" class="form-control" id="username" required placeholder="JohnDoe" name="username">
                    </div>
                    <div class="form-group">
                        <label for="email">Password:</label>
                        <input type="password" class="form-control" id="password" required  name="password">
                    </div>

                    <p class="center" style="margin-top: 50px;"><input class="button-search" type="submit" value="Log In"></p>
                </form>

            </div>
        </div>

    </div>

    <div class="img-login">
    </div>
</div>
</body>
</html>