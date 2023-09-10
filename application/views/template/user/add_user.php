
            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <!--<div class="page-title">
                        <div class="title_left">
                            <h3>Form Validation</h3>
                        </div>

                        <div class="title_right">
                            <div class="col-md-5 col-sm-5 form-group pull-right top_search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search for...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button">Go!</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>-->
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>New User<small>ADD</small> <?php echo $this->session->flashdata('msg');?></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                <?php echo form_open_multipart('User/AddNewUser/'); ?>
                                      <div class="row">
                                        <div class="col-md-6">
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">User Name<span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="user_id" required="required" />
                                              </div>
                                          </div>
                                        </div>
                                        <div class="col-md-6">
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Full Name<span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="fullname" required="required" />
                                              </div>
                                          </div>
                                        </div>


                                        <div class="col-md-6"><!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Email.<span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="email"  type="text"  required="required"  />
                                                </div>
                                          </div>
                                        </div><!--end--->

                                        <div class="col-md-6"><!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Types<span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <select class="form-control" name="types" > 
                                                      <option >Select Type</option>
                                                      <option value="Admin">Admin</option>
                                                      <option value="Manager">Manager</option>
                                                      <option value="Operator">Operator</option>
                                                      <option value="Editor">Editor</option>
                                                      <option value="Accounts">Accounts</option>
                                                  </select>
                                                </div>
                                          </div>
                                        </div><!--end--->

                                        <div class="col-md-6"><!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Password<span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="password"  type="password"  required="required"   />
                                                </div>
                                          </div>
                                        </div><!--end--->

                                        <div class="col-md-6"><!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Contact No.<span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" class='optional' name="phone"  type="text"  required="required"  />
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
                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3">
                                                    <button type='submit' class="btn btn-primary">Save</button>
                                                    <button type='reset' class="btn btn-success">Cancel</button>
                                                </div>
                                        </div>

                                        </div><!--end--->
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