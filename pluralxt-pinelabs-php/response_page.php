<html>
	<head>
    </head>
    <body>
		<div>      
			<td>
				<a style="margin: 20px -10px 10px 570px ;color:blue;font-weight: bold" href="index.php">Return To Transaction Page</a>
			</td>
		</div>
		<h1 style="text-align: center;color: #333">Response Parameters</h1>    
        
        <?php
  			include 'process_order_payment.php';

			ksort($_POST);

			$strPostData = "";
			
			foreach($_POST as  $key => $value)
			{
				echo "$key => $value" . "<br />";

				if($key != "dia_secret" && $key!= "dia_secret_type")
				{
					$strPostData.=$key."=".$value."&";
				}
			}

			// trim last character from string
			$strPostData = substr($strPostData, 0, -1);

			$responseHash = strtoupper(hash_hmac('sha256', $strPostData, pluralxt_hex2str($merchant_config['merchant_secret_key'])));

			echo "<br />";

			if ($responseHash == $_POST['dia_secret'])
			{
				if (isset($_POST['payment_status']) && $_POST['payment_status'] == 'CAPTURED'
					&& isset($_POST['payment_response_code']) && $_POST['payment_response_code'] == '1')
				{
					$amount = floatval($_POST['amount_in_paisa']) / 100.0;
					$txnId = $_POST['order_id'];

					$msg = "Thank you for shopping with us. Your account has been charged and your transaction is successful with the following order details:<br /><br /> Transaction Id: " . $txnId . "<br /> Amount: " . $amount . " <br /><br />We will process your order soon.";
				}
				elseif (isset($_POST['payment_status']) && $_POST['payment_status'] == 'CANCELLED') 
				{					
					$msg = "Thank you for shopping with us. However, the transaction has been cancelled.";
				}
				else
				{				
					$msg = "Thank you for shopping with us. However, the payment failed.";
				}
			}
			else
			{
				//tampered
				$msg = "Thank you for shopping with us. However, the payment failed.";
			}

			echo "<strong>$msg</strong>";
  
        ?>
    </body>
</html>