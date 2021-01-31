<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {

public function __construct()
{
	parent::__construct();
	$this->load->model('payment_model');
}

public function index()
{
	///session data - customer
	$customerid=1;
	$customerdata=$this->payment_model->fetchCustomerData($customerid);
	$this->load->view('payment-view',['customerdata'=>$customerdata]);
}
public function checkout()
{
	$mode = "TEST"; //<------------ Change to TEST for test server, PROD for production

//extract($_POST);
  $secretKey = "609cb73e0e762f4a8943b4de61ad9b1649105723";
  $appId='483451a04623719bf7c5a6e2054384';
  $orderId='Order'.rand(0,100);
  $orderAmount=$this->input->post('price');
  $customerName=$this->input->post('customer_name');
  $customerEmail=$this->input->post('customer_email');
  $customerPhone=$this->input->post('customer_mobileno');
  $orderCurrency='INR';
  $orderNote='checkout';
  $returnUrl=base_url('payment/payment_status');
  $notifyUrl=base_url('payment/payment_status');
  $postData = array( 
  "appId" => $appId, 
  "orderId" => $orderId, 
  "orderAmount" => $orderAmount, 
  "orderCurrency" => $orderCurrency, 
  "orderNote" => $orderNote, 
  "customerName" => $customerName, 
  "customerPhone" => $customerPhone, 
  "customerEmail" => $customerEmail,
  "returnUrl" => $returnUrl, 
  "notifyUrl" => $notifyUrl,
);
  //print_r($postData);exit;
ksort($postData);
$signatureData = "";
foreach ($postData as $key => $value){
    $signatureData .= $key.$value;
}
$signature = hash_hmac('sha256', $signatureData, $secretKey,true);
$signature = base64_encode($signature);

if ($mode == "PROD") {
  $url = "https://www.cashfree.com/checkout/post/submit";
} else {
  $url = "https://test.cashfree.com/billpay/checkout/post/submit";
}
$this->load->view('payment-checkout',['postData'=>$postData,'signature'=>$signature,'url'=>$url]);
}
public function payment_status()
{
      $secretkey = "609cb73e0e762f4a8943b4de61ad9b1649105723";
     $orderId = $_POST["orderId"];
     $orderAmount = $_POST["orderAmount"];
     $referenceId = $_POST["referenceId"];
     $txStatus = $_POST["txStatus"];
     $paymentMode = $_POST["paymentMode"];
     $txMsg = $_POST["txMsg"];
     $txTime = $_POST["txTime"];
     $signature = $_POST["signature"];
     $data = $orderId.$orderAmount.$referenceId.$txStatus.$paymentMode.$txMsg.$txTime;
     $hash_hmac = hash_hmac('sha256', $data, $secretkey, true) ;
     $computedSignature = base64_encode($hash_hmac);
     if ($signature == $computedSignature) {
      //create page for succes
      echo 'Success';
      } else {
         echo 'Failed';
      }
}
}
