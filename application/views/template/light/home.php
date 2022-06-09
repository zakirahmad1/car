<?=$header?>
		<div class="card shadow-lg">
			<div class="card-body p-5">
				<h1 class="fs-4 card-title fw-bold mb-4">Login</h1>
				<form method="POST" action="<?=site_url(array('user'));?>" class="needs-validation" novalidate="" autocomplete="off">
				<?php if($this->session->flashdata('msg')){?> 
					   <div class="alert alert-primary" role="alert">
						  <?php echo $this->session->flashdata('msg'); ?>
						</div>
				<?php }?>
							<?php if(validation_errors()){?> 
							<div class="alert alert-danger" role="alert">
							  <?php echo validation_errors(); ?>
							</div>
							<?php }?>	
					<div class="mb-3">
						<label class="mb-2 text-muted" for="email">E-Mail Address</label>
						<input id="email" type="email" value="<?php echo set_value('name'); ?>" class="form-control" name="email" value="" required autofocus>
						<div class="invalid-feedback">
							Email is invalid
						</div>
					</div>

					<div class="mb-3">
						<div class="mb-2 w-100">
							<label class="text-muted" for="password">Password</label>
							<a href="forgot.html" class="float-end">
								Forgot Password?
							</a>
						</div>
						<input id="password" type="password" class="form-control" name="password" required>
						<div class="invalid-feedback">
							Password is required
						</div>
					</div>

					<div class="d-flex align-items-center">
						<div class="form-check">
							<input type="checkbox" name="remember" id="remember" class="form-check-input">
							<label for="remember" class="form-check-label">Remember Me</label>
						</div>
						<button type="submit" class="btn btn-primary ms-auto">
							Login
						</button>
						<input  type="hidden" class="form-control" name="action" value='add'>	
					</div>
				</form>
			</div>
			<div class="card-footer py-3 border-0">
				<div class="text-center">
					Don't have an account? <a href="<?=site_url(array('user','signup'))?>" class="text-dark">Create One</a>
				</div>
			</div>
		</div>
<?=$footer?>