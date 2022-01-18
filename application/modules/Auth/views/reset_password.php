
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>



<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 ">
				<form class="login100-form validate-form" method="post" action="<?= base_url().'auth/reset_password/' . $code; ?>">
                                    <span class="login100-form-title p-b-30" style="font-size: 1.5em; font: 400">
					Change Password
					</span>
					
                                    <?php
                                    if(isset($message) || isset($this->session->message)){
                                        $msg = isset($message)?$message:$this->session->message;
                                        ?>
                                    <div class="alert alert-danger m-t-30" style="width:100%; font-size: 0.8rem;"><?php echo $msg;?></div>
                                    <?php
                                    }
                                    ?>
                                    
					<div class="wrap-input100 validate-input m-t-15 m-b-15">
                                            <input class="input100" type="password" name="new">
						<span class="focus-input100" data-placeholder="New password"></span>
					</div>
                                    
                                        <div class="wrap-input100 validate-input m-t-15 m-b-15">
						<input class="input100" type="password" name="new_confirm">
						<span class="focus-input100" data-placeholder="Re enter password"></span>
					</div>

                    <?php echo form_input($user_id);?>
	            <?php echo form_hidden($csrf); ?>

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
			</div>
		</div>
	</div>
	
