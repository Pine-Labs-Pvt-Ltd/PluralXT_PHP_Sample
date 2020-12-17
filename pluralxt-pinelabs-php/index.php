<html>
    <head>
    	<style>
            label {
                font-family: Verdana;
                font-size: 14px;
            }

            h1 {
              height: 100px;
                background-color: #3db54b;
                color: white;
                margin-bottom: 15px;
                text-align: center;
                font-size: 30px;
                display: flex;
                justify-content: center;
                align-items: center;
                font-family: Roboto,sans-serif;
            }

            .btn {
                font-size: 15px; line-height: 8px; padding: 15px 30px; color: white; background-color: #3db54b; font-weight: 600; letter-spacing: .3px; border: 0; cursor: pointer; text-align: center; display: inline-block; border-radius: 6px; -webkit-transition: all .3s ease-in;
            }           
        </style>
    </head>

<body>

  <? php
		//include 'CSS1_Index.css';

  ?>

        <form name ="pluralxt_pinelabs" action="purchase_redirect.php"  id="pluralxt_pinelabs" method="POST">
            <h1 style="text-align: center;">Plural XT Test Merchant Application</h1>

            <div align="center">
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <label>Order Id: </label>
                            </td>
                            <td>
                                <input type="text" name="order_id" value="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label><strong>Payment Info Data: </strong></label>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                <label>Amount in Paisa: </label>
                            </td>
                            <td>
                                <input type="text" name="amount_in_paisa" value="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Order Description: </label>
                            </td>
                            <td>
                                <input type="text" name="order_description" value="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label><strong>Customer Data: </strong></label>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                <label>Customer Reference No: </label>
                            </td>
                            <td>
                                <input type="text" name="customer_ref_no" value="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>First Name: </label>
                            </td>
                            <td>
                                <input type="text" name="customer_first_name" value="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Last Name: </label>
                            </td>
                            <td>
                                <input type="text" name="customer_last_name" value="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Mobile No: </label>
                            </td>
                            <td>
                                <input type="text" name="customer_mobile_number" value="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Email Id: </label>
                            </td>
                            <td>
                                <input type="text" name="customer_email_id" value="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Country Code: </label>
                            </td>
                            <td>
                                <input type="text" name="customer_country_code" value="91">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label><strong>Billing Address Data: </strong></label>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                <label>First Name: </label>
                            </td>
                            <td>
                                <input type="text" name="bill_first_name" value="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Last Name: </label>
                            </td>
                            <td>
                                <input type="text" name="bill_last_name" value="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Address1: </label>
                            </td>
                            <td>
                                <input type="text" name="bill_address1" value="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Address2: </label>
                            </td>
                            <td>
                                <input type="text" name="bill_address2" value="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Address3: </label>
                            </td>
                            <td>
                                <input type="text" name="bill_address3" value="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Pincode: </label>
                            </td>
                            <td>
                                <input type="text" name="bill_pincode" value="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>City: </label>
                            </td>
                            <td>
                                <input type="text" name="bill_city" value="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>State: </label>
                            </td>
                            <td>
                                <input type="text" name="bill_state" value="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Country: </label>
                            </td>
                            <td>
                                <input type="text" name="bill_country" value="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label><strong>Shipping Address Data: </strong></label>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                <label>First Name: </label>
                            </td>
                            <td>
                                <input type="text" name="ship_first_name" value="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Last Name: </label>
                            </td>
                            <td>
                                <input type="text" name="ship_last_name" value="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Address1: </label>
                            </td>
                            <td>
                                <input type="text" name="ship_address1" value="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Address2: </label>
                            </td>
                            <td>
                                <input type="text" name="ship_address2" value="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Address3: </label>
                            </td>
                            <td>
                                <input type="text" name="ship_address3" value="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Pincode: </label>
                            </td>
                            <td>
                                <input type="text" name="ship_pincode" value="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>City: </label>
                            </td>
                            <td>
                                <input type="text" name="ship_city" value="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>State: </label>
                            </td>
                            <td>
                                <input type="text" name="ship_state" value="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Country: </label>
                            </td>
                            <td>
                                <input type="text" name="ship_country" value="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label><strong>Product Info Data: </strong></label>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                <label>Product Code: </label>
                            </td>
                            <td>
                                <input type="text" name="product_code" value="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Product Amount: </label>
                            </td>
                            <td>
                                <input type="text" name="product_amount_in_paisa" value="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label><strong>Additional Info Data: </strong></label>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                <label>rfu1: </label>
                            </td>
                            <td>
                                <input type="text" name="rfu1" value="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <br>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div align="center">
                <input text-align="center" type="submit" class="btn" value="Submit">
                <br>
                <br>
                <br>
            </div>
        </form>
    </body>
</html>
