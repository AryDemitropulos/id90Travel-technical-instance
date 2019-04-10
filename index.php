

<?php
include_once 'includes/user_session.php';
include_once 'includes/apiCall.php';
include_once 'includes/airlines.php';

$userSession = new UserSession();


if(isset($_SESSION['user'])){
   
    include_once 'vistas/Hoteles/hoteles.php';


}else{
    
    include_once 'vistas/login.php';
}

?>