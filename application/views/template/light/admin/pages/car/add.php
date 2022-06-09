<div class="animated fadeIn">


                <div class="row">
                   
                    
                                            <div class="col-lg-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <strong>Car</strong> Add
                                                    </div>
													
													<form class="needs-validation" action="<?=site_url(array('car','add'))?>" method="post" enctype="multipart/form-data" novalidate="" class="form-horizontal">
                                                    <div class="card-body card-block">
                                                        
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
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Name</label></div>
                                                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="name" placeholder="Car Name" value="<?php echo set_value('name'); ?>" required class="form-control"><small class="form-text text-muted">Car name</small>
																<div class="invalid-feedback">
																			Name is required	
																		</div>
																</div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="email-input" class=" form-control-label">Model</label></div>
                                                                <div class="col-12 col-md-9"><input type="text" id="model-input" name="model" required placeholder="Enter model" value="<?php echo set_value('model'); ?>" class="form-control"><small class="help-block form-text">Car Model</small></div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="reg-input" class=" form-control-label">Registration No</label></div>
                                                                <div class="col-12 col-md-9"><input type="text" id="reg-input" name="reg" placeholder="Registration" required value="<?php echo set_value('reg'); ?>" class="form-control"><small class="help-block form-text">Please enter a Registration number</small></div>
                                                            </div>
															
															  <div class="row form-group">
                                                                <div class="col col-md-3"><label for="color-input" class=" form-control-label">Color</label></div>
                                                                <div class="col-12 col-md-9"><input type="text" id="color-input" name="color" placeholder="color" required value="<?php echo set_value('color'); ?>" class="form-control"><small class="help-block form-text">Please enter a color</small></div>
                                                            </div>
                                                           
                                                              
                                                                <div class="row form-group">
                                                                    <div class="col col-md-3"><label for="selectLg" class=" form-control-label">Category</label></div>
                                                                    <div class="col-12 col-md-9">
                                                                        <select name="category" required class="form-control-lg form-control">
                                                                           	
																		<?php if(!empty($categories)){ foreach($categories as $key=> $category){?>
																			<option <?=isset($category->id) && $category->id==set_value('category')?"selected":""?> value="<?=$category->id?>"><?=$category->name?></option>
																		<?php }?>
																		<?php }?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                               
                                                               
                                                        
                                                    </div>
                                                    <div class="card-footer">
                                                        <button type="submit" class="btn btn-primary btn-sm">
                                                            <i class="fa fa-dot-circle-o"></i> Add
                                                        </button>
														<input  type="hidden" class="form-control" name="action" value='add'>
                                                        
                                                    </div>
													</form>
                                                </div>
                                             </div>

                                          </div>
                                        </div><!-- .animated -->
             