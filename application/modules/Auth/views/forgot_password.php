
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>



<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 ">
				<form class="login100-form validate-form" method="post" action="<?= base_url(); ?>auth/forgot_passord">
                                 
                                    <h3 style="margin-top:100px;">Reset Password</h3>
                                    
                                    <?php
                                    if(isset($message) || isset($this->session->message)){
                                        $msg = isset($message)?$message:$this->session->message;
                                        ?>
                                    <div class="alert alert-danger m-t-30" style="width:100%; font-size: 0.8rem;"><?php echo $msg;?></div>
                                    <?php
                                    }
                                    ?>
                                    
					<div class="wrap-input100 validate-input m-t-15 m-b-15" data-validate = "Enter email address">
						<input class="input100" type="text" name="identity">
						<span class="focus-input100" data-placeholder="Enter your email address"></span>
					</div>

					

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Continue
						</button>
					</div>
                                    
                                    <ul class="login-more p-t-10">
						<li class="m-b-5">
							<span class="txt1">
								Back to 
							</span>

							<a href="<?= base_url(); ?>auth/login" class="txt2">
								Login?
							</a>
						</li>

					</ul>

					
				</form>
                            <div class="login100-more" style="background-image: url('<?= base_url(); ?>assets/images/3.png'); background-repeat: no-repeat; background-size: contain; background-position: 10px 0px;">
				</div>
			</div>
		</div>
	</div>
	
