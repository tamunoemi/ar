<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100" >
                            <form class="login100-form validate-form" method="post" action="<?= base_url(); ?>auth/register">
					
                                <input type="hidden" name="refid" value="<?=$refid;?>">
                                    <span class="login100-form-title ">
                                        <img src="<?= base_url(); ?>assets/images/logo.png" class='img-responsive img-rounded' style="width:180px; margin: auto;">
                                        <br>
						SIGN UP
                                                
					</span>
					
                                   <p style="text-align: center">Open your <?=SITENAME;?> account.Your login details will be mailed to you.</p><br>
                                   
                                   <div id="infoMessage" style="color:#e28964; font-size: 0.8rem"><?php 
                                        $msg = isset($_SESSION['message']) ?  $_SESSION['message'] : "";
                                        echo $msg;
                                        ?></div>
                                        
                             
					
                                        <div class="wrap-input100 validate-input" data-validate = "Enter your fullname">
						<input class="input100" type="text" name="fullname">
						<span class="focus-input100"></span>
						<span class="label-input100">Fullname</span>
					</div>
                                    
                                        <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="identity">
						<span class="focus-input100"></span>
						<span class="label-input100">Email</span>
					</div>
                                   
                                         <div class="wrap-input100 validate-input" data-validate = "Enter your mobile number">
                                             <input class="input100" type="tel" name="phone">
						<span class="focus-input100"></span>
						<span class="label-input100">Phone Number</span>
					</div>
					
					
					

					<div class="flex-sb-m w-full p-t-3 p-b-32">
						<div class="contact100-form-checkbox">
                                                    <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember" checked="false" value="1">
							<a href="<?= base_url(); ?>auth/login" class="txt1">
								Back to Login
							</a>
						</div>

						
					</div>
			

					<div class="container-login100-form-btn">
                                            <button class="login100-form-btn">
							Sign Up
						</button>
					</div>
					
					

					
				</form>

				<div class="login100-more" style="background-image: url('<?= base_url(); ?>assets/images/3.png');">
				</div>
			</div>
		</div>
	</div>
	
	

