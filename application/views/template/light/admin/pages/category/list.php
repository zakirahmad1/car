    <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Table</strong>
                            </div>
                            <div class="card-body">
							
							 <?php if($this->session->flashdata('msg')){?> 
								   <div class="alert alert-primary" role="alert">
									  <?php echo $this->session->flashdata('msg'); ?>
									</div>
							<?php }?>
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                           
											<th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php if(!empty($lists)){?>
									<?php foreach($lists as $list){?>
                                        <tr>
                                            <td><?=$list->name?></td>
                                          
											 <td>
                                            <!-- Call to action buttons -->
                                            <ul class="list-inline m-0">
                                               
                                                <li class="list-inline-item">
                                                    <a  href="<?=site_url(array('category','edit',$list->id))?>" class="btn btn-success btn-sm rounded-0" type="button"   title="Edit"><i class="fa fa-edit"></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="<?=site_url(array('category','delete',$list->id))?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                        </tr>
									<?php }?>
								<?php }?>									
                                   </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
				


            