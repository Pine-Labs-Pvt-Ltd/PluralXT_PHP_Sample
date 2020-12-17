<?php
  	include 'process_order_payment.php';

	$postdata = $_REQUEST;

	//create order
	$order_creation_response = pluralxt_create_order($postdata);	

	$response_code = null;
	$token = null;

	if (!empty($order_creation_response))
	{	
		if (array_key_exists('response_code', $order_creation_response))
		{	
			$response_code = $order_creation_response['response_code'];
		}

		if (array_key_exists('token', $order_creation_response))
		{
			$token = $order_creation_response['token'];
		}	
	}

	if ($response_code != 1 || empty($token))
	{
		echo "Order creation failed";
		
		exit;
	}

	//redirect to payment gateway
	pluralxt_redirect_after_order_creation($token);

	exit;
?>