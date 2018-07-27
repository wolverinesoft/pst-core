<?php

$CI =& get_instance();


?>
<script type="application/javascript">
    var caltotal = <?php echo number_format(($cart['transAmount'] + @$_SESSION['cart']['tax']['finalPrice']), 2, '.', ''); ?>;
    var orig_caltotal = caltotal;


</script>
	<!-- CONTENT WRAP =========================================================================-->
	<div class="content_wrap">
		
		<!-- CART -->
		<div class="main_content_full">
		<!-- CONTENT -->
			<div class="item_section">
			<h1>Purchase</h1>
			<h3>Please select shipping option and enter payment information</h3>
			<p>All fields are required.</p>
			
			<!-- VALIDATION ERROR -->
			<?php if(validation_errors()): ?>
			<div class="validation_error">
				<img src="<?php echo $s_assets; ?>/images/error.png">
				<h1>Error</h1>
				<div class="clear"></div>
				<p><?php echo validation_errors(); ?></p>
			</div>
			<?php endif; ?>
			<!-- END VALIDATION ERROR -->
			
		  <!-- PROCESS ERROR -->
			<?php if(@$processingError): ?>
			<div class="process_error">
				<img src="<?php echo $s_assets; ?>/images/process_error.png">
				<h1>Error</h1>
				<div class="clear"></div>
				<p><?php echo $processingError; ?></p>
			</div>
			<?php endif; ?>
			<!-- END PROCESS ERROR -->
			
		<form action="<?php echo $s_baseURL.'checkout/payment'; ?>" method="post" id="form_example" class="form_standard">				
		
		<!-- BILLING DETAILS -->
			<div class="cart_wrap_left">
				<h3 style="float:left;margin:5px 0 0;">
					<i class="fa fa-list"></i> Billing Details
				</h3>
				<div class="clear"></div>
				<br>
				<p><b>Company Name:</b>&nbsp;<?php echo $contactInfo['company']; ?></p>
				<p><b>First Name:</b>&nbsp;<?php echo $contactInfo['first_name']; ?></p>
				<p><b>Last Name:</b>&nbsp;<?php echo $contactInfo['last_name']; ?></p>
				<p><b>Email Address:</b>&nbsp;<?php echo $contactInfo['email']; ?></p>
				<p><b>Phone:</b>&nbsp;<?php echo $contactInfo['phone']; ?></p>
				<p><b>Address Line 1:</b>&nbsp;<?php echo $contactInfo['street_address']; ?></p>
				<p><b>Address Line 2:</b>&nbsp;<?php echo $contactInfo['address_2']; ?></p>
				<p><b>City:</b>&nbsp;<?php echo $contactInfo['city']; ?></p>
				<p><b>State:</b>&nbsp;<?php echo $contactInfo['state']; ?></p>
				<p><b>Zip:</b>&nbsp;<?php echo $contactInfo['zip']; ?></p>
			</div>
			<!-- END BILLING DETAILS -->
			
			<!-- SHIPPING DETAILS -->
			<div class="cart_wrap_right">
				<h3 style="float:left;margin:5px 0 0;">
					<i class="fa fa-home"></i> Shipping Details
				</h3>
				<div class="clear"></div>
				<br>
				<p><b>Company Name:</b>&nbsp;<?php echo $shippingInfo['company']; ?></p>
				<p><b>First Name:</b>&nbsp;<?php echo $shippingInfo['first_name']; ?></p>
				<p><b>Last Name:</b>&nbsp;<?php echo $shippingInfo['last_name']; ?></p>
				<p><b>Email Address:</b>&nbsp;<?php echo $shippingInfo['email']; ?></p>
				<p><b>Phone:</b>&nbsp;<?php echo $shippingInfo['phone']; ?></p>
				<p><b>Address Line 1:</b>&nbsp;<?php echo $shippingInfo['street_address']; ?></p>
				<p><b>Address Line 2:</b>&nbsp;<?php echo $shippingInfo['address_2']; ?></p>
				<p><b>City:</b>&nbsp;<?php echo $shippingInfo['city']; ?></p>
				<p><b>State:</b>&nbsp;<?php echo $shippingInfo['state']; ?></p>
				<p><b>Zip:</b>&nbsp;<?php echo $shippingInfo['zip']; ?></p>
			</div>
			<div class="clear"></div>
			<!-- END SHIPPING DETAILS -->
<?php if(@$cart): $i = 0; $total = 0;  ?>			
			<!-- ORDERS -->
			<div class="cart_wrap">
				<h3 style="float:left;margin:5px 0 0;">
					<i class="fa fa-shopping-cart"></i> Order Items
				</h3>
				<div class="clear"></div>
				<br>
				<div class="hidden_table">
					<table width="100%" cellpadding="6">
						<?php foreach($cart as $key => $product): if(isset($product['display_name'])):?>
						
						<tr>
							<?php if(@$product['display_name'] != 'Shipping'): ?>
							<td>
								<?php if(@$product['images']): ?>			
							<img src="<?php echo $s_baseURL . "productimages/".$product['images']['path']; ?>" title="<?php echo @$product['display_name']; ?>" border="0" width="80"><br />
							<?php echo @$product['images']['description']; ?>
						<?php endif; ?>	
							
							</td>
							<td>
								<b><?php $product['display_name'] = str_replace('|||', '<br /><span class="smaller_font">', $product['display_name']);
									$product['display_name'] = str_replace('||', '</span>', $product['display_name']);
									echo $product['display_name'];?></b><br>
									<?php
									$product['price'] = (float)str_replace("$","",$product['price']);
									?>
								<b>Unit Price:</b> $<?php echo number_format( str_replace(',', '', $product['price']), 2) ; ?>
							</td>
							<td width="20%">
								<b>Quantity:</b> <?php echo @$product['qty']; ?><br>
								<b>Sub Total:</b> <?php if(@$product['finalPrice']): ?>$<?php echo number_format(str_replace(',', '', $product['finalPrice']), 2); endif; ?>
							</td>
						</tr>
						<?php endif; endif; endforeach; ?>
						<tr>
							
						</tr>
					</table>
				</div>
			</div>
			<!-- END ORDERS -->
<?php  endif; ?>

			<!-- SHIPPING -->
			<div class="cart_wrap_left" style="height:415px">
				<h3 style="float:left;margin:5px 0 0;">
					<i class="fa fa-truck"></i> Shipping Method
				</h3>
				<div class="clear"></div>
				<br>
				<h3>Please Select Your Shipping Method</h3>
				<p>Shipping is required.</p>
				<div class="hidden_table">
					<table width="100%" cellpadding="6">
						
						<?php if(@$postalOptDD): foreach($postalOptDD as $code => $arr):
										$set = FALSE; ?>
						<?php if(@$_POST['shippingValue'] == $code):
								 		$set = TRUE; 
								 	elseif(!isset($_POST['shippingValue']) && ($code == 'GND')):
								 		$set = TRUE; 
								 	endif; ?>	
						<tr>
							<td><?php echo form_radio('shippingValue', $code, $set, 'onclick="changeTotal('.$arr['value'].');"'); ?></td>
							<td><b><?php echo $arr['label']; ?></b></td>
							
						</tr>
						<?php endforeach; endif; ?>
					</table>
					
				</div>
			</div>
			<!-- END CREDIT CARD -->


			
			<!-- CREDIT CARD -->
			<div class="cart_wrap_right">
				<h3 style="float:left;margin:5px 0 0;">
					<i class="fa fa-credit-card"></i> Payment Details
				</h3>
				<h1 style="margin:0; float:right;">Total: $<span id="total"></span></h1>
				<div class="clear"></div>
				<br>
				
                <?php
                switch ($store_name["merchant_type"]) {
                    case "Stripe":
                        echo $CI->load->view("checkout/payment_info_stripe", array(
                            "order_number" => $_SESSION['newOrderNum'],
                            "stripe_api_key" => $store_name["stripe_api_key"],
                            "company_name" => $store_name["company"],
                            "email" =>  $contactInfo['email']
                        ), true);
                        break;

                    default: // Braintree
                        echo $CI->load->view("checkout/payment_info_paymentdetails_v", array(

                        ), true);
                }

                ?>
            </div>
        </form>


                <div class="clear"></div>
			<!-- END CREDIT CARD -->
				
			<!-- END CHECK OUT -->
		
		</div>
	</div>
	<div class="clearfooter"></div>
	<!-- END CONTENT WRAP ===================================================================-->
	


</div>
<!-- END WRAPPER ==========================================================================-->

<script>
// $('#myform').submit(function submitClick(e)
// {
    // e.preventDefault();
// });

</script>

<script src="https://code.jquery.com/jquery-2.1.1.js"></script>
<?php

switch ($store_name["merchant_type"] == "Braintree") {
    case "Stripe":

        break;

    default: // Braintree
        echo $CI->load->view("checkout/payment_info_braintree_v", array(

        ), true);
}


?>

<script>
$(document).ready(function(){
	$("#pay").click(function(){
		$(".pay").show();
		$(".paypal").hide();
	});
	$("#payment").click(function(){
		$(".pay").hide();
		$(".paypal").show();
	})
});
</script>

<script>
	//$('#total').html('<?php //echo number_format(($cart['transAmount'] + @$_SESSION['cart']['tax']['finalPrice'] + $arr['value']), 2, '.', ''); ?>//');
	////$('#paypal_amt').val('<?php //echo number_format(($cart['transAmount'] + @$_SESSION['cart']['tax']['finalPrice'] + $arr['value']), 2, '.', ''); ?>//');
	
	function changeTotal(value)
	{
		caltotal = orig_caltotal + value;
		$('#total').html(caltotal.toFixed(2));
		//$('#paypal_amt').val(caltotal.toFixed(2));
	}

	changeTotal(<?php echo $arr['value']; ?>);
</script>