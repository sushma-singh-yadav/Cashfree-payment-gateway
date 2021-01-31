 <!DOCTYPE html>
<html>
<head>
  <title>Cashfree - Signature Generator</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body onload="document.frm1.submit()">
  <form action="<?php echo $url; ?>" name="frm1" method="post">
      <p>Please wait.......</p>
      <input type="hidden" name="signature" value='<?php echo $signature; ?>'/>
      <input type="hidden" name="orderNote" value='<?php echo $postData['orderNote']; ?>'/>
      <input type="hidden" name="orderCurrency" value='<?php echo $postData['orderCurrency']; ?>'/>
      <input type="hidden" name="customerName" value='<?php echo $postData['customerName']; ?>'/>
      <input type="hidden" name="customerEmail" value='<?php echo $postData['customerEmail']; ?>'/>
      <input type="hidden" name="customerPhone" value='<?php echo $postData['customerPhone']; ?>'/>
      <input type="hidden" name="orderAmount" value='<?php echo $postData['orderAmount']; ?>'/>
      <input type ="hidden" name="notifyUrl" value='<?php echo $postData['notifyUrl']; ?>'/>
      <input type ="hidden" name="returnUrl" value='<?php echo $postData['returnUrl']; ?>'/>
      <input type="hidden" name="appId" value='<?php echo $postData['appId']; ?>'/>
      <input type="hidden" name="orderId" value='<?php echo $postData['orderId']; ?>'/>
  </form>
  </body>
</html>