<?php

$email = $_POST['email'];
$password = $_POST['password'];
// echo $email;
// echo $password;

//  Db connection
$con = new mysqli("localhost:3330","root","khunTun1997","myformtesting");

if($con -> connect_error) {
        die("Failed to connect : " . $con -> connect_error);
}else {
        $stmt = $con -> prepare("select * from myregistration where email = ? ");
        $stmt -> bind_param("s", $email);
        $stmt -> execute();
        $stmt_result = $stmt -> get_result();
        if($stmt_result -> num_rows > 0){
                $data = $stmt_result -> fetch_assoc();

                if($data['password'] === $password){
                        echo "<h2>Login Successfully !!!</h2>";
                }else{
                        echo "<h2>Invalid Email or password</h2>";
                }
        }else {
                echo "<h2>Invalid Email or password</h2>";
        }
}




// testing

// $serverName = "localhost";
// $userName = "root";
// $password = "khunTun1997";
// $dbName = "abccompanies";



// $con = mysqli_connect($serverName,$userName,$password,$dbName);


// if(mysqli_connect_errno()){
	// echo "Failed to connect !";
	// exit();
// }else{
// echo "Connection was successfully !";
// }

?>