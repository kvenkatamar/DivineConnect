
<?php 
session_start();
 include '../assets/constant/config.php';
 
 try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
      }
       catch(PDOException $e)
        {
        echo "Connection failed: " . $e->getMessage();
        }
        
  $stmt = $conn->prepare("INSERT INTO `pass1`(`sevaname`,`cseva`,`mobile_no`, `dname`,`tperson`,`totalamount`,`date`,`agee`,`genderr`,`ptypee`,`pnoo`) VALUES ('".$_POST['sevaname']."','".$_POST['cseva']."','".$_POST['mobile_no']."','".$_POST['dname']."','".$_POST['tperson']."','".$_POST['totalamount']."','".$_POST['date']."','".$_POST['agee']."','".$_POST['genderr']."','".$_POST['ptypee']."','".$_POST['pnoo']."')");

        $stmt->execute();
        $last_id = $conn->lastInsertId();
        $_SESSION['pay_id']=$last_id;
        $service = count($_POST['name1']);
        
        extract($_POST); 
        for($i=0;$i<$service;$i++){



        $l_id= $last_id;

        //echo "insert into pass2(name1,age,gender,ptype,pno,l_id)values('$name1[$i]','$age[$i]','$gender[$i]','$ptype[$i]','$pno[$i]','$l_id')";exit;
        $sql="insert into pass2(name1,age,gender,ptype,pno,l_id)values('$name1[$i]','$age[$i]','$gender[$i]','$ptype[$i]','$pno[$i]','$l_id')";
        $execute = $conn->query($sql);
    }
    
        $stmt1 = $conn->prepare("DELETE FROM pass2 WHERE name1='' ");
        $stmt1->execute();


?>


<?php

require('config.php');
require('razorpay-php/Razorpay.php');


// Create the Razorpay Order

use Razorpay\Api\Api;

$api = new Api($keyId, $keySecret);

//
// We create an razorpay order using orders api
// Docs: https://docs.razorpay.com/docs/orders
//
$orderData = [
    'receipt'         => 3456,
    'amount'          => $_POST['totalamount'] * 100, // 2000 rupees in paise
    'currency'        => 'INR',
    'payment_capture' => 1 // auto capture
];

$razorpayOrder = $api->order->create($orderData);

$razorpayOrderId = $razorpayOrder['id'];

$_SESSION['razorpay_order_id'] = $razorpayOrderId;

$displayAmount = $amount = $orderData['amount'];

if ($displayCurrency !== 'INR')
{
    $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
    $exchange = json_decode(file_get_contents($url), true);

    $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
}

$checkout = 'automatic';

if (isset($_GET['checkout']) and in_array($_GET['checkout'], ['automatic', 'manual'], true))
{
    $checkout = $_GET['checkout'];
}

$data = [
    "key"               => $keyId,
    "amount"            => $amount,
    "name"              => "KSD",
    "description"       => "Something",
    "image"             => "https://s29.postimg.org/r6dj1g85z/daft_punk.jpg",
    "prefill"           => [
    "name"              => "",
    "email"             => "",
    "contact"           => "",
    ],
    "notes"             => [
    "address"           => "Hello World",
    "merchant_order_id" => "12312321",
    ],
    "theme"             => [
    "color"             => "#ccc"
    ],
    "order_id"          => $razorpayOrderId,
];

if ($displayCurrency !== 'INR')
{
    $data['display_currency']  = $displayCurrency;
    $data['display_amount']    = $displayAmount;
}

$json = json_encode($data);

require("checkout/{$checkout}.php");

 
 ?>
