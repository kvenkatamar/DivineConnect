<?php 
$name=$_POST['name1'];
$name=$_POST['email1'];
$name=$_POST['mobile'];
$name=$_POST['msg'];

$mailheader= "From:".$name1."<".$email1.">\r\n";
$receipient="pawarvidya2911@gmail.com";

mail($receipient,$subject,$message,$mailheader)
or die("Error!");

echo "Message Send";



?>