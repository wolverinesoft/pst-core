<?php
$contact_info = json_decode($application['contact_info']);
$physical_address = json_decode($application['physical_address']);
$housing_info = json_decode($application['housing_info']);
$banking_info = json_decode($application['banking_info']);
$previous_add = json_decode($application['previous_add']);
$employer_info = json_decode($application['employer_info']);
$reference = json_decode($application['reference']);
?>
<!-- MAIN CONTENT =======================================================================================-->
<div class="content_wrap">
    <div class="content">

        <!-- TAB CONTENT -->
        <div class="tab_content">
            <div class="hidden_table">
					<table width="100%" cellpadding="5">
						<tr>
							<td>Status :</td>
							<td><?php echo $application['application_status'];?></td>
						</tr>
						<tr>
							<td colspan="2">
								<p style="padding:5px;margin: 10px 0px 10px 0px;color:#ccc;background: #555;"><b>Vehicle Information:</b></p>
							</td>
						</tr>
						<tr>
							<td>
								<label for="type" >Type</label>
							</td>
							<td>
								<?php echo $application['type']; ?>
							</td>
						</tr>
						<tr>
							<td>
								<label for="condition" >Condition</label>
							</td>
							<td>
								<?php echo $application['condition'];?>
							</td>
						</tr>
						<tr>
							<td>
								<label for="year" >Year</label>
							</td>
							<td>
								<?php echo $application['year'];?>
							</td>
						</tr>
						<tr>
							<td>
								<label for="make" >Make</label>
							</td>
							<td>
								<?php echo $application['make'];?>
							</td>
						</tr>
						<tr>
							<td>
								<label for="model" >Model</label>
							</td>
							<td>
								<?php echo $application['model'];?>
							</td>
						</tr>
						<tr>
							<td>
								<label for="down_payment" >Down Payment</label>
							</td>
							<td>
								<?php echo $application['down_payment'];?>
							</td>
						</tr>
						
						<tr>
							<td colspan="2">
								<p style="padding:5px;margin: 10px 0px 10px 0px;color:#ccc;background: #555;"><b>Your Contact Information:</b></p>
							</td>
						</tr>
						<tr>
							<td>
								<label for="fname" >First Name</label>
							</td>
							<td>
								<?php echo $application['first_name'];?>
							</td>
						</tr>
						<tr>
							<td>
								<label for="mname" >Middle Name</label>
							</td>
							<td>
								<?php echo $contact_info->mname;?>
							</td>
						</tr>
						<tr>
							<td>
								<label for="lname" >Last Name</label>
							</td>
							<td>
								<?php echo $application['last_name'];?>
							</td>
						</tr>
						<tr>
							<td>
								<label for="dl" >Driver's Lisence</label>
							</td>
							<td>
								<?php echo $application['dl'];?>
							</td>
						</tr>
						<tr>
							<td>
								<label for="wphone" >Work Phone</label>
							</td>
							<td>
								<?php echo $contact_info->wphone;?>
							</td>
						</tr>
						<tr>
							<td>
								<label for="rphone" >Residence Phone</label>
							</td>
							<td>
								<?php echo $contact_info->rphone;?>
							</td>
						</tr>
						<tr>
							<td>
								<label for="email" >E-mail</label>
							</td>
							<td>
								<?php echo $application['email'];?>
							</td>
						</tr>
						<tr>
							<td>
								<label for="ssno" >Social Security Number</label>
							</td>
							<td>
								<?php echo $contact_info->ssno;?>
							</td>
						</tr>
						<tr>
							<td>
								<label for="marital_status" >Marital Status</label>
							</td>
							<td>
								<?php echo $contact_info->marital_status;?>
							</td>
						</tr>
						<tr>
							<td>
								<label for="gender" >Male/Female</label>
							</td>
							<td>
								<?php echo $contact_info->gender;?>
							</td>
						</tr>
						<tr>
							<td>
								<label for="dob" >Date of Birth</label>
							</td>
							<td>
								<?php echo $contact_info->day.'-'.$contact_info->month.'-'.$contact_info->year;?>
							</td>
						</tr>
						
						<tr>
							<td colspan="2">
								<p style="padding:5px;margin: 10px 0px 10px 0px;color:#ccc;background: #555;"><b>Physical Address Information:</b></p>
							</td>
						</tr>
						<tr>
							<td>
								<label for="paddress" >Physical Address</label>
							</td>
							<td>
								<?php echo $physical_address->paddress;?>
							</td>
						</tr>
						<tr>
							<td>
								<label for="city" >City</label>
							</td>
							<td>
								<?php echo $physical_address->city;?>
							</td>
						</tr>
						<tr>
							<td>
								<label for="state" >State</label>
							</td>
							<td>
								<?php echo $physical_address->state;?>
							</td>
						</tr>
						<tr>
							<td>
								<label for="zip" >Zip</label>
							</td>
							<td>
								<?php echo $physical_address->zip;?>
							</td>
						</tr>
						<tr>
							<td>
								<label for="country" >Country</label>
							</td>
							<td>
								<?php echo $physical_address->country;?>
							</td>
						</tr>
						
						<tr>
							<td colspan="2">
								<p style="padding:5px;margin: 10px 0px 10px 0px;color:#ccc;background: #555;"><b>Housing Information:</b></p>
							</td>
						</tr>
						<tr>
							<td>
								<label for="owns" >Do you rent or own your home, or other ?</label>
							</td>
							<td>
								<?php echo $housing_info->owns;?>
							</td>
						</tr>
						<tr>
							<td>
								<label for="landlord" >Landlord / Mortgage</label>
							</td>
							<td>
								<?php echo $housing_info->landlord;?>
							</td>
						</tr>
						<tr>
							<td>
								<label for="rent" >Rent / Mortgage Monthly Amount</label>
							</td>
							<td>
								<?php echo $housing_info->rent;?>
							</td>
						</tr>
						<tr>
							<td>
								<label for="mort_balance" >Mortgage Balance</label>
							</td>
							<td>
								<?php echo $housing_info->mort_balance;?>
							</td>
						</tr>
						<tr>
							<td>
								<label for="time" >Time at Current Residence</label>
							</td>
							<td>
								<?php echo $housing_info->months.' Months && '.$housing_info->years.' Years';?>
							</td>
						</tr>
						
						<tr>
							<td colspan="2">
								<p style="padding:5px;margin: 10px 0px 10px 0px;color:#ccc;background: #555;"><b>Banking Information:</b></p>
							</td>
						</tr>
						<tr>
							<td>
								<label for="bank_name" >Name of Bank</label>
							</td>
							<td>
								<?php echo $banking_info->bank_name;?>
							</td>
						</tr>
						<tr>
							<td>
								<label for="ac_type" >Account Types</label>
							</td>
							<td>
								<?php echo $banking_info->ac_type;?>
							</td>
						</tr>
						<tr>
							<td>
								<label for="bank_name1" >Name of Bank</label>
							</td>
							<td>
								<?php echo $banking_info->bank_name1;?>
							</td>
						</tr>
						<tr>
							<td>
								<label for="ac_type1" >Account Types</label>
							</td>
							<td>
								<?php echo $banking_info->ac_type1;?>
							</td>
						</tr>
						
						<tr>
							<td colspan="2">
								<p style="padding:5px;margin: 10px 0px 10px 0px;color:#ccc;background: #555;"><b>Previous Residence (If less then 5 years at current address..)</b></p>
							</td>
						</tr>
						<tr>
							<td>
								<label for="address1" >Address</label>
							</td>
							<td>
								<?php echo $previous_add->address;?>
							</td>
						</tr>
						<tr>
							<td>
								<label for="city" >City</label>
							</td>
							<td>
								<?php echo $previous_add->city;?>
							</td>
						</tr>
						<tr>
							<td>
								<label for="st_zip" >State, Zip</label>
							</td>
							<td>
								<?php echo $previous_add->state.', '.$previous_add->zip;?>
							</td>
						</tr>
						<tr>
							<td>
								<label for="how_long" >How long at previous address ?</label>
							</td>
							<td>
								<?php echo $previous_add->months.' Months && '.$previous_add->years.' Years';?>
							</td>
						</tr>
						
						<tr>
							<td colspan="2">
								<p style="padding:5px;margin: 10px 0px 10px 0px;color:#ccc;background: #555;"><b>Employer Information:</b></p>
							</td>
						</tr>
						<tr>
							<td>
								<label for="occupation" >Occupation</label>
							</td>
							<td>
								<?php echo $employer_info->occupation;?>
							</td>
						</tr>
						<tr>
							<td>
								<label for="emp_name" >Employer Name</label>
							</td>
							<td>
								<?php echo $employer_info->emp_name;?>
							</td>
						</tr>
						<tr>
							<td>
								<label for="emp_addr" >Employer Address</label>
							</td>
							<td>
								<?php echo $employer_info->emp_addr;?>
							</td>
						</tr>
						<tr>
							<td>
								<label for="emp_city" >Employer City</label>
							</td>
							<td>
								<?php echo $employer_info->emp_city;?>
							</td>
						</tr>
						<tr>
							<td>
								<label for="emp_state" >Employer State</label>
							</td>
							<td>
								<?php echo $employer_info->emp_state;?>
							</td>
						</tr>
						<tr>
							<td>
								<label for="emp_zip" >Employer Zip</label>
							</td>
							<td>
								<?php echo $employer_info->emp_zip;?>
							</td>
						</tr>
						<tr>
							<td>
								<label for="emp_phone" >Employer Phone</label>
							</td>
							<td>
								<?php echo $employer_info->emp_phone;?>
							</td>
						</tr>
						<tr>
							<td>
								<label for="salary" >Salary(Annually Gross)</label>
							</td>
							<td>
								<?php echo $employer_info->salary;?>
							</td>
						</tr>
						<tr>
							<td>
								<label for="emp_time" >Time at Employer</label>
							</td>
							<td>
								<?php echo $employer_info->month.' Months && '.$employer_info->year.' Years';?>
							</td>
						</tr>
						<tr>
							<td>
								<label>Type of Employment</label>
							</td>
							<td>
								<?php echo $employer_info->emp_type;?>
							</td>
						</tr>
						<tr>
							<td>
								<label for="other_income" >Other Income</label>
							</td>
							<td>
								<?php echo $employer_info->other_income;?>
							</td>
						</tr>
						<tr>
							<td>
								<label for="income_frequency" >Other Income Frequency</label>
							</td>
							<td>
								<?php echo $employer_info->income_frequency;?>
							</td>
						</tr>
						<tr>
							<td>
								<label for="comments" >Additional Comments<br/>Please include any information that you feel may help us process your application</label>
							</td>
							<td>
								<?php echo $employer_info->comments;?>
							</td>
						</tr>
					</table>
					<table cellpadding="5">
						<tr>
							<td colspan="8">
								<p style="padding:5px;margin: 10px 0px 10px 0px;color:#ccc;background: #555;"><b>References:</b></p>
							</td>
						</tr>
						<tr>
							<td><label for="name1" >Name</label></td>
							<td style="width:25%">
								<?php echo $reference->name1;?>
							</td>
							<td><label for="phone1" >Phone</label></td>
							<td style="width:25%">
								<?php echo $reference->phone1;?>
							</td>
							<td><label for="city1" >City</label></td>
							<td style="width:25%">
								<?php echo $reference->city1;?>
							</td>
							<td><label for="state1" >State</label></td>
							<td style="width:25%">
								<?php echo $reference->state1;?>
							</td>
						</tr>
						<tr>
							<td><label for="name1" >Name</label></td>
							<td style="width:25%">
								<?php echo $reference->name2;?>
							</td>
							<td><label for="phone1" >Phone</label></td>
							<td style="width:25%">
								<?php echo $reference->phone2;?>
							</td>
							<td><label for="city1" >City</label></td>
							<td style="width:25%">
								<?php echo $reference->city2;?>
							</td>
							<td><label for="state1" >State</label></td>
							<td style="width:25%">
								<?php echo $reference->state2;?>
							</td>
						</tr>
						<tr>
							<td><label for="name1" >Name</label></td>
							<td style="width:25%">
								<?php echo $reference->name3;?>
							</td>
							<td><label for="phone1" >Phone</label></td>
							<td style="width:25%">
								<?php echo $reference->phone3;?>
							</td>
							<td><label for="city1" >City</label></td>
							<td style="width:25%">
								<?php echo $reference->city3;?>
							</td>
							<td><label for="state1" >State</label></td>
							<td style="width:25%">
								<?php echo $reference->state3;?>
							</td>
						</tr>
						<tr>
							<td><label for="name1" >Name</label></td>
							<td style="width:25%">
								<?php echo $reference->name4;?>
							</td>
							<td><label for="phone1" >Phone</label></td>
							<td style="width:25%">
								<?php echo $reference->phone4;?>
							</td>
							<td><label for="city1" >City</label></td>
							<td style="width:25%">
								<?php echo $reference->city4;?>
							</td>
							<td><label for="state1" >State</label></td>
							<td style="width:25%">
								<?php echo $reference->state4;?>
							</td>
						</tr>
					</table>
            </div>
        </div>
        <!-- END TAB CONTENT -->
    </div>
</div>
<script src="/assets/js/jquery-1.7.2.js"></script>
<script>
window.print();
</script>
