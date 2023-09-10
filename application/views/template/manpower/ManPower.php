
            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="clearfix"></div>
  <?php echo $this->session->flashdata('sms');?>
                    <div class="row">

                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2> এজেন্ট  সার্চ</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <form class="" action="<?php echo base_url('Dashboard/ManpowerSlAdd');?>" method="post" novalidate>
                                  
                                          <div class="field item form-group">

                                              <div class="col-md-6 col-sm-6">
                                                  <input class="form-control" type="text" name="manpower_sl" placeholder="Enter ManPower Serial"  required="">
                                              </div>
                                                <div class="col-md-4">
                                                   <div class="field item form-group">
                                                      <label class="col-form-label col-md-2 col-sm-3  label-align"> Date<span class="required">*</span></label>
                                                        <div class="col-md-10 ">
                                                          <input type="date" class="form-control"name="date" required="">
                                                        </div>
                                                    </div>
                                                      <!-- end --->
                                                </div>
                                              <div class="col-md-2 col-sm-6">
                                                    <button type='submit' class="btn btn-info sourc">Add</button>
                                             </div>
                                           
                                          </div>
                                        </div><!--end---> 
                                    </form>
                                </div>
                              </div>
                            </div>

                                    <!--- end--->
                               <div class="x_panel">
                                    <div class="x_title">
                                        <h2> এজেন্ট  সার্চ</h2>
                                         <div class="clearfix"></div>
                                      </div>
                                    <div class="x_content">
                                      <form class="" action="<?php echo base_url('Dashboard/ManPowerCustomer');?>" method="post" novalidate>
                                        <div class="col-md-8">
                                          <div class="field item form-group">
                                                 <select class="chosent form-control" name="manpower_sl" >
                                                    <option value="" > এজেন্ট নির্বাচন করুন</option> 
                                                  <?php 
                                                      $sl = 0;
                                                    foreach ($AllManpowerSl as $ManpowerSl) {
                                                      $sl++;
                                                      if ($sl<=3) {
                                                  ?>
                                                    <option value="<?php echo $ManpowerSl->manpower_sl;?>">
                                                      <?php echo $ManpowerSl->manpower_sl;?> /<?php echo $ManpowerSl->date;?> /
                                                      </option>
                                                  <?php } } ?>
                                                  </select>
                                              <script type="text/javascript">$(".chosent").chosen(); </script>
                                            </div>
                                        </div>

                                              <div class="col-md-2 col-sm-6">
                                                    <button type='submit' class="btn btn-info sourc">অনুসন্ধান করুন</button>
                                             </div>
                                           
                                          </div>
                                        </div><!--end---> 
                                    </form>
                                  </div>
                                </div>
                            </div>
</div>
                      
            
                    </div><!-- end row---->
                </div>
            </div>
            <!-- /page content -->



