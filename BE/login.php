<?php

$dbhost="localhost";
$dbname="moviebuff";
$dbuser="root";
$dbpass="";
$db=null;
    try {
		$db = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);		
	} catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/>";
		die();
	}

    $un=$_POST["username"];      
    $pass=$_POST["password"];    

    $query="select ID from tbl_users where USERNAME='".$un."' AND PASSWORD=PASSWORD('".$pass."')";
    //echo $query;
    $stmt=$db->query($query);
    $rowCount=$stmt->rowCount();
    echo $rowCount;
    if ($rowCount>0){
        session_start();
        $_SESSION["username"]=$un;
        header("location:../pages/page1.php");
    }else{
        header("location:../login.php");
    }    
?>