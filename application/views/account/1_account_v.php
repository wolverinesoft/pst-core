	<!-- CONTENT WRAP =========================================================================-->
	<div class="content_wrap">
		
		<!-- SIDEBAR -->
		<div class="sidebar">
			<div class="acct_nav_wrap">
			<div class="acct_nav_content">
				<div class="acct_menu-link">
					<a href="<?php echo base_url(); ?>" style="color:#333;">
						<i class="fa fa-navicon"></i> <b>Account Settings</b>
					</a>
				</div>
				<div id="acct_menu" class="acct_menu">
					<ul>
		      	<li><a href="<?php echo $s_baseURL.'checkout/account'; ?>"><i class="fa fa-user"></i> My Profile</a></li>
		      	<li><a href="<?php echo $s_baseURL.'checkout/account_edit'; ?>"><i class="fa fa-pencil"></i> Edit Profile</a></li>
		      	<li><a href="<?php echo base_url('shopping/cart'); ?>"><i class="fa fa-shopping-cart"></i> Shopping Cart</a></li>
		      	<li><a href="<?php echo $s_baseURL.'checkout/account_address'; ?>"><i class="fa fa-book"></i> Saved Addresses</a></li>
		      	<li><a href="<?php echo base_url('/shopping/wishlist'); ?>"><i class="fa fa-heart"></i> Wishlist</a></li>
		      	<li><a href="<?php echo $s_baseURL.'checkout/account_order'; ?>"><i class="fa fa-inbox"></i> Order History</a></li>
		      	<?php if($_SESSION['userRecord']['admin']): ?>
		      		<li><a href="<?php echo base_url('admin'); ?>"><i class="fa fa-gears"></i> Admin panel</a></li>
				<?php endif; ?>
		      	<li><a href="<?php echo $s_baseURL.'welcome/logout'; ?>"><i class="fa fa-sign-out"></i> Logout</a></li>
					</ul>
				</div>
			</div>
			</div>
			
		</div>
		<!-- END SIDEBAR -->	
		
		
		<!-- MAIN -->
		<div class="main_content">
		
		<?php if(@$_SESSION['newAccount']): ?>
		  <b>Thank you for creating an Account!</b><br />
		  <?php unset($_SESSION['newAccount']); endif;?>
		  
		  <?php if(@$_SESSION['orderNum']): ?>
		  <!-- SUCCESS MESSAGE -->
		<div class="success">
		  <img src="<?php echo $assets; ?>/images/success.png" style="float:left;margin-right:10px;">
	    <h1>Success</h1>
	    <div class="clear"></div>
	    <p>
	      Your order number <?php echo @$_SESSION['orderNum']; ?> has been placed. <br />
	      You should be receiving an email shortly confirming the order with details attached.<br />
		  Click on Order History to review this and previous orders.
	    </p>
	    <div class="clear"></div>
		</div>
		<!-- END SUCCESS MESSAGE -->
		<?php unset($_SESSION['orderNum']); 
		endif; ?>
			
			<!-- MY PROFILE -->
			<div class="account_section">
				<h1><i class="fa fa-user"></i> My Profile</h1>
				<div class="tabular_data">
					<table width="100%" cellpadding="8">
						<tr class="row_dark">
							<td style="width:120px;"><b>Email:</b></td>
							<td><?php echo $_SESSION['userRecord']['username']; ?></td>
						</tr>
						<tr>
							<td><b>First Name:</b></td>
							<td><?php echo @$_SESSION['userRecord']['first_name']; ?></td>
						</tr>
						<tr class="row_dark">
							<td><b>Last Name:</b></td>
							<td><?php echo @$_SESSION['userRecord']['last_name']; ?></td>
						</tr>
						<tr>
							<td><b>Group:</b></td>
							<td><?php echo $_SESSION['userRecord']['admin'] ? 'Admin' : 'Valued Customer'; ?></td>
						</tr>
						<tr  class="row_dark">
							<td><b>Last Login:</b></td>
							<td><?php echo @$_SESSION['userRecord']['last_login'] ? date('m/d/Y', $_SESSION['userRecord']['last_login']) : 'N/A'; ?> </td>
						</tr>
						
					</table>
				</div>
			</div>
			<!-- END MY PROFILE -->
			
		</div>
		<!-- END MAIN -->		
		
	
	</div>
	<div class="clearfooter"></div>
	<!-- END CONTENT WRAP ===================================================================-->
