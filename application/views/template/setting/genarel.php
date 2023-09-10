 <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Genarel Setting</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <?php echo form_open_multipart('Setting/GeneralUpdate/');?>
                                      <div class="row">
                                          <input class="form-control" type="hidden" name="id" value="<?php echo $SiteData->id;?>"/>
                                          <input class="form-control" type="hidden" name="old_image" value="<?php echo $SiteData->logo;?>"/>
                                        <div class="col-md-6">
                                          <div class="field item form-group">
                                              <div class="col-md-12 col-sm-6">
                                                  <label class="label-align">Name</label>
                                                  <input class="form-control" name="name" value="<?php echo $SiteData->name;?>"/>
                                              </div>
                                          </div>
                                        </div>
                                        <div class="col-md-6">
                                          <div class="field item form-group">
                                              <div class="col-md-12 col-sm-6">
                                                  <label class="label-align">Title</label>
                                                  <input class="form-control" name="title" value="<?php echo $SiteData->title;?>"/>
                                              </div>
                                          </div>
                                          </div>
                                        <div class="col-md-6">
                                          <div class="field item form-group">
                                              <div class="col-md-12 col-sm-6">
                                                  <label class="label-align">Phone</label>
                                                  <input class="form-control" name="phone" value="<?php echo $SiteData->phone;?>"/>
                                              </div>
                                          </div>
                                          </div>
                                        <div class="col-md-6">
                                          <div class="field item form-group">
                                              <div class="col-md-12 col-sm-6">
                                                <label class="label-align">Email</label>
                                                  <input class="form-control" name="email" value="<?php echo $SiteData->email;?>"/>
                                              </div>
                                          </div>
                                        </div>


                                        <div class="col-md-12"><!--start--->
                                          <div class="field item form-group">
                                              <div class="col-md-12 col-sm-6">
                                                <label class="label-align">Address</label>
                                                <textarea class="form-control" rows="3" name="address" rows="4" cols="50"><?php echo $SiteData->address;?></textarea>
                                              </div>
                                          </div>
                                        </div><!--end--->

                                        <div class="col-md-6"><!--start--->
                                          <div class="field item form-group">
                                              <div class="col-md-12 col-sm-6">
                                                   <label class="label-align">Logo</label>
                                                  <input class="form-control" class='optional' name="logo"  type="file"  />
                                                  <img src="<?php echo base_url();?>images/<?php echo $SiteData->logo;?>" style="width:100%;">
                                              </div>
                                          </div>
                                        </div><!--end--->
                                      </div><!---ROW END-->
                            
                     
                                        <div class="ln_solid">
                                            <div class="form-group">
                                                <div class="col-md-6">
                                                    <button type='submit' class="btn btn-info">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div><!--end col-md-12--->


                        <div class="col-md-3 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Stemp Image </h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <?php echo form_open_multipart('Setting/StemUpdate/');?>
                                      <div class="row">
                                          <input class="form-control" type="hidden" name="id" value="<?php echo $SiteData->id;?>"/>

                                          <input class="form-control" type="hidden" name="old_image" value="<?php echo $SiteData->stemp_image;?>"/>

                                        <div class="col-md-12"><!--start--->
                                            <img src="<?php echo base_url();?>images/<?php echo $SiteData->stemp_image;?>" style="width:100%;">
                                          <div class="field item form-group">
                                              <div class="col-md-12 col-sm-6">
                                                  <input class="form-control" class='optional' name="stemp_image"  type="file"  />
                                              </div>
                                          </div>
                                        </div><!--end--->
                                      </div><!---ROW END-->
                            
                     
                                        <div class="ln_solid">
                                            <div class="form-group">
                                              <div class="col-md-6 offset-md-3">
                                                <button type='submit' class="btn btn-warning">Update</button>
                                              </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div><!--end col-md-6--->
                        <div class="col-md-3 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Signature Image </h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <?php echo form_open_multipart('Setting/SignatureImageUpdate/');?>
                                      <div class="row">
                                          <input class="form-control" type="hidden" name="id" value="<?php echo $SiteData->id;?>"/>

                                          <input class="form-control" type="hidden" name="old_image" value="<?php echo $SiteData->signature_image;?>"/>

                                        <div class="col-md-12"><!--start--->
                                            <img src="<?php echo base_url();?>images/<?php echo $SiteData->signature_image;?>" style="width:100%;">
                                          <div class="field item form-group">
                                              <div class="col-md-12 col-sm-6">
                                                  <input class="form-control" class='optional' name="signature_image"  type="file"  />
                                              </div>
                                          </div>
                                        </div><!--end--->
                                      </div><!---ROW END-->
                            
                     
                                        <div class="ln_solid">
                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3">
                                                    <button type='submit' class="btn btn-warning">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div><!--end col-md-6--->

                    </div>
                </div>
            </div>
            <!-- /page content -->
