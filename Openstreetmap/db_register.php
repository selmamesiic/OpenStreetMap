<?php



$db = "online";
$user = $_POST["users"];
$password = $_POST["password"];
$host = "localhost";


$conn = mysqli_connect($host,'amra','amra' ,$db);

if($conn && !empty($user) && !empty($password)){
    $q = "select * from users where users ='$user' and password = '$password'";
    $result = mysqli_query($conn, $q);

    if(mysqli_num_rows($result)>0){
        echo "<script type='text/javascript'>window.alert('User already exists!');
            window.location.href='index.html';</script>";
    }else{
        $insert = "INSERT INTO users(users, password) VALUES('$user', '$password')";
        if(mysqli_query($conn,$insert)){
        
            echo "<script type='text/javascript'>window.alert('Successfully Updated!');
            window.location.href='index.html';</script>";
            
        }else{
            echo "Error: " . $insert . "" . mysqli_error($conn);
        }
    }

}else{
    echo "<script type='text/javascript'>window.alert('NOT CONNECTED or FIELDS ARE EMPTY!');
    window.location.href='index.html';</script>";

}


?>