<?php
	//merchant configuration data
	$merchant_config = array(
							'merchant_id' => '12345',
							'merchant_access_code' => '10c84e3e-a4fe-4ca5-b291-866391ff108b',
							'merchant_secret_key' => '591A2CEE30A34C05B2D8B2825BC75F57',
							'merchant_return_url' => 'http://localhost/pluralxt-pinelabs-php/response_page.php',
							'merchant_gateway_mode' => 'sandbox',
							'merchant_payment_modes_csv' => 'ALL',
							'merchant_preferred_gateway' => 'HDFC',
						);

	$pluralxt_host_url = 'https://paymentoptimizer.pinepg.in';

	if ($merchant_config['merchant_gateway_mode'] == 'sandbox')
	{
		$pluralxt_host_url = 'https://paymentoptimizertest.pinepg.in';
	}

	function pluralxt_hex2str($hex)
	{
		try
		{
		    $string = '';
		    
		    for ($i = 0; $i < strlen($hex) - 1; $i += 2)
		    {
		        $string .= chr(hexdec($hex[$i] . $hex[$i + 1]));
		    }
		    
		    return $string;
		}
		catch(Exception $e)
		{
			error_log("Exception in pluralxt_hex2str() function: " . $e);

			return '';
		}
	}

	function pluralxt_call_order_creation_api($url, $data, $x_verify)
	{
		try
		{
		   	$curl = curl_init();
			
			curl_setopt($curl, CURLOPT_POST, 1);
			
			if ($data)
			{
				curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
			}
			// OPTIONS:
			curl_setopt($curl, CURLOPT_URL, $url);

			curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			  'X-VERIFY: ' . $x_verify,
			  'Content-Type: application/json',
			));

			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

			// EXECUTE:
			$result = curl_exec($curl);

			if (!$result) {
				die("Connection Failure");
			}

			curl_close($curl);

			return $result;
		}
		catch(Exception $e)
		{
			error_log("Exception in pluralxt_call_order_creation_api() function: " . $e);
		}
	}

	function pluralxt_create_order($params)
	{	
		try
		{
			global $merchant_config, $pluralxt_host_url;

			$merchant_data 							= new \stdClass();
			$merchant_data->merchant_return_url 	= $merchant_config['merchant_return_url'];
			$merchant_data->merchant_access_code 	= $merchant_config['merchant_access_code'];
			$merchant_data->order_id 				= array_key_exists('order_id', $params) ? $params['order_id'] : null;
			$merchant_data->merchant_id 			= $merchant_config['merchant_id'];
		                                               
			$payment_info_data 						= new \stdClass();
			$payment_info_data->amount 				= array_key_exists('amount_in_paisa', $params) ? $params['amount_in_paisa'] : null;
			$payment_info_data->currency_code 		= "INR";
			$payment_info_data->preferred_gateway 	= $merchant_config['merchant_preferred_gateway'];
			$payment_info_data->order_desc 			= array_key_exists('order_description', $params) ? $params['order_description'] : null;
		                                               
			$customer_data 							= new \stdClass();
			$customer_data->customer_ref_no 		= array_key_exists('customer_ref_no', $params) ? $params['customer_ref_no'] : null;
			$customer_data->mobile_number 			= array_key_exists('customer_mobile_number', $params) ? $params['customer_mobile_number'] : null;
			$customer_data->email_id 				= array_key_exists('customer_email_id', $params) ? $params['customer_email_id'] : null;
			$customer_data->first_name 				= array_key_exists('customer_first_name', $params) ? $params['customer_first_name'] : null;
			$customer_data->last_name 				= array_key_exists('customer_last_name', $params) ? $params['customer_last_name'] : null;
			$customer_data->country_code 			= array_key_exists('customer_country_code', $params) ? $params['customer_country_code'] : "91";
		                                               
			$billing_address_data 					= new \stdClass();
			$billing_address_data->first_name 		= array_key_exists('bill_first_name', $params) ? $params['bill_first_name'] : null;
			$billing_address_data->last_name 		= array_key_exists('bill_last_name', $params) ? $params['bill_last_name'] : null;
			$billing_address_data->address1 		= array_key_exists('bill_address1', $params) ? $params['bill_address1'] : null;
			$billing_address_data->address2 		= array_key_exists('bill_address2', $params) ? $params['bill_address2'] : null;
			$billing_address_data->address3 		= array_key_exists('bill_address3', $params) ? $params['bill_address3'] : null;
			$billing_address_data->pincode 			= array_key_exists('bill_pincode', $params) ? $params['bill_pincode'] : null;
			$billing_address_data->city 			= array_key_exists('bill_city', $params) ? $params['bill_city'] : null;
			$billing_address_data->state 			= array_key_exists('bill_state', $params) ? $params['bill_state'] : null;
			$billing_address_data->country 			= array_key_exists('bill_country', $params) ? $params['bill_country'] : null;
		                                               
			$shipping_address_data 					= new \stdClass();
			$shipping_address_data->first_name 		= array_key_exists('ship_first_name', $params) ? $params['ship_first_name'] : null;
			$shipping_address_data->last_name 		= array_key_exists('ship_last_name', $params) ? $params['ship_last_name'] : null;
			$shipping_address_data->address1 		= array_key_exists('ship_address1', $params) ? $params['ship_address1'] : null;
			$shipping_address_data->address2 		= array_key_exists('ship_address2', $params) ? $params['ship_address2'] : null;
			$shipping_address_data->address3 		= array_key_exists('ship_address3', $params) ? $params['ship_address3'] : null;
			$shipping_address_data->pincode 		= array_key_exists('ship_pincode', $params) ? $params['ship_pincode'] : null;
			$shipping_address_data->city 			= array_key_exists('ship_city', $params) ? $params['ship_city'] : null;
			$shipping_address_data->state 			= array_key_exists('ship_state', $params) ? $params['ship_state'] : null;
			$shipping_address_data->country 		= array_key_exists('ship_country', $params) ? $params['ship_country'] : null;

			$product_details 						= new \stdClass();
			$product_details->product_code 			= array_key_exists('product_code', $params) ? $params['product_code'] : null;
			$product_details->product_amount 		= array_key_exists('product_amount_in_paisa', $params) ? $params['product_amount_in_paisa'] : null;
			
			$product_info_data = new \stdClass();

			$product_info_data->product_details[0] = $product_details;
		                                               
			$additional_info_data 					= new \stdClass();
			$additional_info_data->rfu1 			= array_key_exists('rfu1', $params) ? $params['rfu1'] : null;

			$orderData = new \stdClass();

			$orderData->merchant_data = $merchant_data;
			$orderData->payment_info_data = $payment_info_data;
			$orderData->customer_data = $customer_data;
			$orderData->billing_address_data = $billing_address_data;
			$orderData->shipping_address_data = $shipping_address_data;
			$orderData->product_info_data = $product_info_data;
			$orderData->additional_info_data = $additional_info_data;

			$orderData = json_encode($orderData);

			$requestData = new \stdClass();
			$requestData->request = base64_encode($orderData);

			$x_verify = strtoupper(hash_hmac("sha256", $requestData->request, pluralxt_hex2str($merchant_config['merchant_secret_key'])));

			$requestData = json_encode($requestData);

			$orderCreationUrl = $pluralxt_host_url . '/api/v2/order/create';
			$order_creation = pluralxt_call_order_creation_api($orderCreationUrl, $requestData, $x_verify);

			$response = json_decode($order_creation, true);

			return $response;
		}
		catch(Exception $e)
		{
			error_log("Exception in pluralxt_create_order() function: " . $e);

			return null;
		}
	}

	function pluralxt_redirect_after_order_creation($token)
	{	
		try
		{
			global $merchant_config, $pluralxt_host_url;

			$payment_redirect_url = $pluralxt_host_url . '/pinepg/v2/process/payment/redirect?orderToken=' . $token . '&paymentmodecsv=' . $merchant_config['merchant_payment_modes_csv'];

			header("Location: $payment_redirect_url");
			
			die();
		}
		catch(Exception $e)
		{
			error_log("Exception in redirect_after_order_creation() function: " . $e);
		}
	}

?>