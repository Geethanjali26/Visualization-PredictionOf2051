<?php

session_start();

$mysqli=new mysqli('localhost','root','','crud')or die(mysqli_error($mysqli)); 

$id=0;
$update=false;
$year='';
$city='';
$state='';
$country='';
$ppl='';


if(isset($_POST['save'])){
    $year=$_POST['year'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $country=$_POST['country'];
    $ppl=$_POST['ppl'];
     
    $mysqli->query("INSERT  INTO data (year,city,state,country,ppl)VALUES('$year','$city','$state','$country','$ppl')") or die($mysqli->error);
    
    $_SESSION['message']="Record has been saved!";
    $_SESSION['msg_type']="success";
    
    header('location: c19database.php');
}

if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $mysqli->query("DELETE FROM data WHERE id=$id") or die($mysqli->error());
    
    $_SESSION['message']="Record has been deleted!";
    $_SESSION['msg_type']="danger";
    
    header('location: c19database.php');
    
}

if(isset($_GET['edit'])){
    $id= $_GET['edit'];
    $update=true;
    $result=$mysqli->query("SELECT * FROM data WHERE id=$id") or die($mysqli->error());
    if(count(array($result))==1){
        $row=$result->fetch_array();
        $year=$row['year'];
        $city=$row['city'];
        $state=$row['state'];
        $country=$row['country'];
        $ppl=$row['ppl'];
    }
}

if(isset($_POST['update'])){
    $id=$_POST['id'];
    $year=$_POST['year'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $country=$_POST['country'];
    $ppl=$_POST['ppl'];
    
    $mysqli->query("UPDATE data SET year='$year',city='$city',state='$state',country='$country',ppl='$ppl' WHERE id=$id") or die($mysqli->error());
    
    $_SESSION['message']="Record has been updated!";
    $_SESSION['msg_type']="warning";
    
    header('location: c19database.php');
    
}
