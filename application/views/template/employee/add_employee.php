
            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Add New Employee</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
<?php  
  if(empty($EmployeeId->id)){
    $employ_id = 'ID';
  }else{
    $employ_id = 'ID'.sprintf("%d",$EmployeeId->id+1);
  }
?>    
                                <div class="x_content">
                            <?php echo form_open_multipart('Employee/AddNewEmployee');?>
                                      <div class="row">

                                        <div class="col-md-6">
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align" style="color:red;">employ_id<span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="employ_id" value="<?php echo $employ_id;?>" />
                                              </div>
                                          </div>
                                        </div>

                                        <div class="col-md-6">
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align" style="color:red;">Joining Date<span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                 <input class="form-control" type="date" name="joining_date"/>
                                              </div>
                                          </div>
                                        </div>

                                        <div class="col-md-6">
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align" style="color:red;">Name<span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" name="name"  />
                                              </div>
                                          </div>
                                        </div>

                                        <div class="col-md-6">
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align" style="color:red;"> Designation<span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control"  name="designation"  />
                                              </div>
                                          </div>
                                        </div>


                                        <div class="col-md-6"><!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align" style="color:red;">Contact No.<span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="phone"  type="text"    />
                                                </div>
                                          </div>
                                        </div><!--end--->

                                        <div class="col-md-6"><!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Address <span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                <textarea class="form-control" rows="1.5" name="address"></textarea>
                                              </div>
                                          </div>
                                        </div><!--end--->

                                        <div class="col-md-6"><!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Employee Profile  <span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="image"  type="file"  />
                                              </div>
                                          </div>
                                        </div><!--end--->

                              
                                         <div class="col-md-6"><!--start--->
                                            <?php echo $this->session->flashdata('smg');?>
                                          </div>
                                        </div><!--end--->

                                      </div><!---ROW END-->
                            
                     
                                        <div class="">
                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3">
                                                    <button type='submit' class="btn btn-primary">Save</button>
                                                    <button type='reset' class="btn btn-secondary">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div><!--end col-md-12--->

                  </div>
                </div>
              </div>
            </div>
        </div>
            <!-- /page content -->
<!--- model start---->