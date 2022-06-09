<div class="animated fadeIn">


                <div class="row">
                   
                    
                                            <div class="col-lg-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <strong>Category</strong> Edit
                                                    </div>
													
													<form class="needs-validation" action="<?=site_url(array('category','edit',isset($category->id)?$category->id:0))?>" method="post" enctype="multipart/form-data" novalidate="" class="form-horizontal">
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
                                                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="name" placeholder="Car Name" value="<?=isset($category->name)?$category->name:set_value('name')?>" required class="form-control"><small class="form-text text-muted">Car name</small>
																<div class="invalid-feedback">
																			Name is required	
																		</div>
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
             