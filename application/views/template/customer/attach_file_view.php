<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
	     <div class="row">
              <div class="col-md-12">
                  <div class="x_title">
                    <h2> Customer Attach File View<small> </small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="row">
						<div class="gallery_section">
							<div class="container">
								<div class="demo-gallery">
									<br>
						            <ul id="lightgallery" class="col-md-12 list-unstyled row">
						           <?php

						           		foreach ($AttachfileListData as $AttachFileData) {
						           	?>
								       <li class="col-xs-6 col-sm-4 col-md-6 x_panel " style="display:flex;width:750px;" data-responsive="<?php echo base_url();?>images/File/<?php echo $AttachFileData->file_attach;?>" data-src="<?php echo base_url();?>images/File/<?php echo $AttachFileData->file_attach;?>" >
						                    <a href="">
						                        <img src="<?php echo base_url();?>images/File/<?php echo $AttachFileData->file_attach;?>" style="width: 100%;">
						                    </a><br/>
						                    <center><h3 style="font-size: 19px; font-weight: bold;"><?php echo $AttachFileData->title;?></b></h3>
						                    <a href="" class="btn btn-round btn-danger btn-xs"  data-toggle="modal" data-target="#Remove<?php echo $AttachFileData->id;?>">Remove</a>
						                </li>

                                            <!--- remove model  ---->
                                            <div class="modal fade" id="Remove<?php echo $AttachFileData->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                              <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel"> Title:##<?php echo $AttachFileData->title;?> </h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                  </div>
                                                  <div class="modal-body">
                                            
                                            <form action="<?php echo base_url('Customer/RemoveCustomerAttachFile/')?><?php echo $AttachFileData->id;?>" method="post">
                                                      <div class="field item form-group">
                                                        <label class="col-form-label col-md-12 col-sm-3  label-align" style="color:red;font-size: 1.3rem;font-weight: 900;text-align: center;">  Are You Sure ? Remove It. </label>
                                                     </div>     
                                            
                                                      <div class="ln_solid">
                                                        <div class="form-group">
                                                           <div class="col-md-6 offset-md-3">
                                                               <button type='submit' class="btn btn-primary">Yes</button>
                                                                <button type='reset' class="btn btn-success">No</button>
                                                             </div>
                                                        </div>
                                                      </div>
                                                     </form>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            <!--- model end ----->
						           	<?php
						           		}

						            ?>
     
						            </ul>
						        </div>
							</div>
						</div><!--end were here to help-->
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>







