<?php
$server="localhost";
$username="root";
$password="";

$conn=mysqli_connect($server,$username,$password);
if(!$conn){
    die("Connection Error:".mysqli_connect_error());
}

$sql="CREATE DATABASE IF NOT EXISTS `bbms`";
$result=mysqli_query($conn,$sql);
if(!$result){
    echo "Error:".mysqli_error($conn);
}

$database="bbms";
$conn=mysqli_connect($server,$username,$password,$database);
if(!$conn){
    die("Connection Error:".mysqli_connect_error());
}

$sql="CREATE TABLE IF NOT EXISTS `bbms`.`user02` (`id_user` VARCHAR(40) NOT NULL, `Email` VARCHAR(70) NOT NULL , `Name` VARCHAR(40) NOT NULL , `Mobile No.` VARCHAR(10) NOT NULL , `Gender` VARCHAR(10) NOT NULL , `Blood Group` VARCHAR(6) NOT NULL , `DOB` DATE NOT NULL ,`City` TEXT NOT NULL, `Password` VARCHAR(40) NOT NULL , `Time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP, UNIQUE (`Email`), UNIQUE (`Mobile No.`)) ENGINE = InnoDB";
$result=mysqli_query($conn,$sql);
if(!$result){
    echo "Error:".mysqli_error($conn);
}

$sql="CREATE TABLE IF NOT EXISTS `bbms`.`user01` (`id_user` VARCHAR(40) NOT NULL , `Name` VARCHAR(40) NOT NULL , `Email` VARCHAR(70) NOT NULL , `catagory` VARCHAR(20) NOT NULL , `Address` VARCHAR(255) NOT NULL ,  `City` TEXT NOT NULL ,  `Telephone No` VARCHAR(12) NOT NULL ,  `Password` VARCHAR(18) NOT NULL,`Time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,  UNIQUE  (`Telephone No`),    UNIQUE  (`Email`)) ENGINE = InnoDB";
$result=mysqli_query($conn,$sql);
if(!$result){
    echo "Error:".mysqli_error($conn);
}

$sql="CREATE TABLE IF NOT EXISTS `bbms`.`camp` (`id_user` VARCHAR(40) NOT NULL,`Email` VARCHAR(70) NOT NULL , `Primary_number` VARCHAR(10) NOT NULL , `Secondary_Number` VARCHAR(10) NOT NULL , `date` DATE NOT NULL , `Time` VARCHAR(40) NOT NULL , `Address` VARCHAR(100) NOT NULL, `City` VARCHAR(20) NOT NULL, PRIMARY KEY (`Email`)) ENGINE = InnoDB";
$result=mysqli_query($conn,$sql);
if(!$result){
    echo "Error:".mysqli_error($conn);
}
 
$sql="CREATE TABLE IF NOT EXISTS `bbms`.`bloodavailability` ( `id_user` VARCHAR(40) NOT NULL , `A+` INT(4) NOT NULL , `A-` INT(4) NOT NULL , `B+` INT(4) NOT NULL , `B-` INT(4) NOT NULL , `AB+` INT(4) NOT NULL , `AB-` INT(4) NOT NULL , `O+` INT(4) NOT NULL , `O-` INT(4) NOT NULL , PRIMARY KEY (`id_user`)) ENGINE = InnoDB";
$result=mysqli_query($conn,$sql);
if(!$result){
    echo "Error:".mysqli_error($conn);
}
?>