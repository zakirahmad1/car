<?=$header?>
					<div class="card shadow-lg">
						<div class="card-body p-5">
							<h1 class="fs-4 card-title fw-bold mb-4">Register</h1>
							<form method="POST" action="<?=site_url(array('user','signup'));?>" class="needs-validation" novalidate="" autocomplete="off">
							<?php if(validation_errors()){?> 
							<div class="alert alert-danger" role="alert">
							  <?php echo validation_errors(); ?>
							</div>
							<?php }?>
							
							
								<div class="mb-3">
									<label class="mb-2 text-muted" for="name">Name</label>
									<input id="name" type="text" class="form-control" name="name" value="<?php echo set_value('name'); ?>" required autofocus>
									<div class="invalid-feedback">
										Name is required	
									</div>
								</div>

								<div class="mb-3">
									<label class="mb-2 text-muted" for="email">E-Mail Address</label>
									<input id="email" type="email" class="form-control" name="email" value="<?php echo set_value('email'); ?>" required>
									<div class="invalid-feedback">
										Email is invalid
									</div>
								</div>

								

								<p class="form-text text-muted mb-3">
									By registering you agree with our terms and condition.
								</p>

								<div class="align-items-center d-flex">
									<button  type="submit" class="btn btn-primary ms-auto">
										Register	
									</button>
								<input  type="hidden" class="form-control" name="action" value='add'>	
									
								</div>
							</form>
						</div>
						<div class="card-footer py-3 border-0">
							<div class="text-center">
								Already have an account? <a href="<?=site_url(array('user'))?>" class="text-dark">Login</a>
							</div>
						</div>
					</div>
		<?=$footer?>