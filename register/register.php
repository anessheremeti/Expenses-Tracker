<?php
include '../database.php';

if(isset($_POST['signUP'])){
    echo "Sign Up button clicked<br>";
    $fulltName=trim($_POST['full-name']);
    $userName =trim($_POST['name']);   
    $email =trim($_POST['email']); 
    $password=trim($_POST['password']);
  //  $password=md5($password);

    $checkUserName="SELECT * FROM users WHERE name='$userName'";
    $result=$conn->query($checkUserName);
    if($result->num_rows > 0){
        echo "Users Address Already Exists ! ";
    }
    else{
        echo"    aaaaaaaaaaaaa";
                            
        $insertQuery="INSERT INTO users( fullname ,`name`,email,`password`)
                        VALUES ('$fulltName' , '$userName' , '$email','$password')";

                        if($conn->query( $insertQuery)==TRUE){
                            
                            header("location: /Expenses-Tracker/dashbord/dashbord.php");
                            exit();
                        }
                        else{
                            echo "Error".$conn->error;
                        }
                        
    }
}

if(isset($_POST['login'])){
    $userName = trim($_POST['username']);
    $password = trim($_POST['password']);
  //  $password=md5($password);
    
    $sql ="SELECT * FROM users WHERE name='$userName' AND password='$password' ";

    $result=$conn->query($sql);
    if($result->num_rows > 0){
        session_start();
        $row=$result->fetch_assoc();
        $_SESSION['username']=$row['name'];
        setcookie('remembered_username', $userName, time() + 36000, "/");

        header("Location: /Expenses-Tracker/dashbord/dashbord.php");
        exit();
    }
    else{
        echo "note found incorrect pasword";
        header("Location: /Expenses-Tracker/log-in/login.php");
       
        echo $userName;
        echo $password;
    }
}
?>