<?php
include_once '../includes/user_session.php';
include_once '../includes/apiCall.php';




if(isset($_POST['username']) && isset($_POST['password']) && $_POST['airline']){

    $data_array =  array(
        "session"         => array(
            "airline"         => $_POST['airline'],
            "username"        => $_POST['username'],
            "password"        => $_POST ['password'],
        ),
    );
    $make_call = CallAPI("POST", "https://beta.id90travel.com/session.json" , json_encode($data_array));

    $response = json_decode($make_call, true);

    if(array_key_exists('error',$response)){

        $error  = $response['error'];
        ob_start();
        header('Location:../index.php?error='.$error);
        ob_end_flush();
        die();
    }else{
        $userSession = new UserSession();
        $userSession->setCurrentUser($_POST['username']);
        $userSession->setAirline($_POST['airline']);


        ob_start();
        header('Location:../index.php');
        ob_end_flush();
        die();
    }
    if(array_key_exists('status',$response)){

        $status  = $response['status'];
        echo "<p>Status: ".$status ."</p>";
    }

}


?>