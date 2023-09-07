
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

      $stmt = $conn->prepare("INSERT INTO `income`(`eid`, `date`, `dname`, `mobile`,`raddress`,`transaction`,`donation`,`chargeofseva`) VALUES ('".$_POST['eid']."','".$_POST['date']."','".$_POST['dname']."','".$_POST['mobile']."','".$_POST['raddress']."','".$_POST['transaction']."','".$_POST['donation']."','".$_POST['chargeofseva']."')");
        $stmt->execute();
        $last_id = $conn->lastInsertId();
        $_SESSION['pay_id']=$last_id;

       

?>





<div class="content-body">
           
      <div class="container-fluid">
      <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Payment</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                          
               
                                   <form  method="post">
                                   
                                      <div class="mb-6">
                                        <div class="row">
                                            
                                    <div class="col-12">
                                         
                                      </div>

                                         

                                   
                      


                                      
                                      


                                          </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
          </div>
    





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
    'amount'          => $_POST['chargeofseva']* 100, // 2000 rupees in paise
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
