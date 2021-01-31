<!DOCTYPE html>
<html>
<head>
	<title>Payment Gateway</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="container">
	<h4>Payment Page</h4>
<hr>
<p>Customer Name : <?php echo $customerdata->customer_name; ?></p>
<p>Email : <?php echo $customerdata->customer_email; ?></p>
<p>Mobile : <?php echo $customerdata->customer_mobileno; ?></p>
<p>Address : <?php echo $customerdata->customer_address; ?></p>

<form method="post" action="<?php echo base_url('payment/checkout');?>">
	<div class="form-group">
		<input type="hidden" name="customer_id" value="<?php echo $customerdata->customer_id; ?>" />
		<input type="hidden" name="customer_name" value="<?php echo $customerdata->customer_name; ?>" />
		<input type="hidden" name="customer_email" value="<?php echo $customerdata->customer_email; ?>" />
		<input type="hidden" name="customer_mobileno" value="<?php echo $customerdata->customer_mobileno; ?>" />
		<input type="hidden" name="customer_address" value="<?php echo $customerdata->customer_address; ?>" />
		<input type="number" name="price" placeholder="Enter Price" class="form-control" />
	</div>
	<input type="submit" name="submit" class="btn btn-primary">
</form>
</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>