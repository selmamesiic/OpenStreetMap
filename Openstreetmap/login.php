<?php



$db = "online";
$user = $_POST["users"];
$password = $_POST["password"];
$host = "localhost";

$conn = mysqli_connect($host,'amra','amra' ,$db);

if($conn && !empty($user) && !empty($password)){
    $q = "select * from users where users like '$user' and password like '$password'";
    $result = mysqli_query($conn, $q);

    if(mysqli_num_rows($result)>0){
        echo"MISSION COMPLETE!";
        session_start();
        $_SESSION['name'] = $user;
        header('Location: location.html');
        
    }else{
        echo "<script type='text/javascript'>window.alert('Mission Failed!');
        window.location.href='index.html';</script>";
    
    }

}else{
    echo "<script type='text/javascript'>window.alert('NOT CONNECTED or FIELDS ARE EMPTY!');
    window.location.href='index.html';</script>";
 
}


?>