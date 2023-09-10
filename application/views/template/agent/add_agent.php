
            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Add New Agent</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>

 <?php  
  if(empty($AgentId->agent_id)){
    $agent_id = '1';
  }else{
    $agent_id = $AgentId->agent_id+1;
  }
?>    
                                <div class="x_content">
                            <?php echo form_open_multipart('Agent/AddNewAgent');?>
                                      <div class="row">
                                        <div class="col-md-6">
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align" style="color:red;">Agent_id<span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" name="agent_id" value="<?php echo $agent_id; ?>" Readonly/>
                                              </div>
                                          </div>
                                        </div>
                                        <div class="col-md-6">
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align" style="color:red;">Name<span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="agent_name"  />
                                              </div>
                                          </div>
                                        </div>


                                        <div class="col-md-6"><!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align" style="color:red;">Phone<span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="mobile_no"  type="text"    />
                                                </div>
                                          </div>
                                        </div><!--end--->

                                        <div class="col-md-6"><!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align" style="color:red;">Balance<span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="balance"  type="number" />
                                                </div>
                                          </div>
                                        </div><!--end--->

                                        <div class="col-md-6"><!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Gender <span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                <select class="form-control"  name="gender"> 
                                                  <option value="male">male</option>
                                                  <option value="female">Female</option>
                                                </select>
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
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Profile  <span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="agent_image"  type="file"  />
                                              </div>
                                          </div>
                                        </div><!--end--->

                                        <div class="col-md-6"><!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Details <span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                <textarea class="form-control" rows="2" name="agent_details"></textarea>
                                              </div>
                                          </div>
                                        </div><!--end--->  
                     
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-2">
                                                    <button type='submit' class="btn btn-round  btn-secondary" style="padding: 15px 40px;">Save</button>
                                                </div>
                                            </div>
                                        </div>


                                         <div class="col-md-6"><!--start--->
                                            <?php echo $this->session->flashdata('smg');?>
                                          </div>
                                        </div><!--end--->
                            
                                      </div><!---ROW END-->
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