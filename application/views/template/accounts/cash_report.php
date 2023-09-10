<!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="clearfix"></div>
  <?php echo $this->session->flashdata('smg');?>
                    <div class="row">
                        
                        <!-- end--->
<div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2> ## Daily Ladger</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <form class="" action="<?php echo base_url('Accounts/PayDateSearch');?>" method="post" novalidate target="_blank">
                                  
                                          <div class="row">

                                            <div class="col-md-6 col-sm-6" style="margin-top: -10px;">
                                            
                                            <div class="field item form-group">
                                            <label class="col-form-label col-md-2 col-sm-3  label-align" style="color:red">Entry Date<span class="required">*</span></label>
                                              <div class="col-md-10 ">
                                                <select class="chosent form-control" name="id">
                                                  <option value="">Select Date</option>
                                                  <?php 
                                                      $sl =0;
                                                    foreach ($AllPayDate as $PayDate) {
                                                      $sl ++;
                                                  ?>
                                                    <option value="<?php echo $PayDate->id;?>"><?php echo $PayDate->pay_date;?></option>
                                                  <?php
                                                      }
                                                  ?>
                                                </select>

                <script type="text/javascript">$(".chosent").chosen(); </script>
                                              </div>
                                          </div>
                                            <!-- end --->

                                            </div>

                                        <div class="col-md-2 col-sm-6">
                                            <div class="col-md-12 offset-md-3">
                                              <button type='submit' class="btn btn-info sourc">Search </button>
                                            </div>
                                        </div>
                                          </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Cash Report</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <form class="" action="<?php echo base_url('Accounts/DailyCashInAndOurReport');?>" method="post" novalidate target="_blank">
                                  
                                          <div class="field item form-group">
                                                <label class="col-form-label col-md-3 col-sm-3  label-align">Date<span class="required">*</span>
                                                </label>
                                                  <div class="col-md-3 ">
                                                      <input type="text" class="form-control has-feedback-left" id="single_cal4" placeholder="First Name" name="payment_date" aria-describedby="inputSuccess2Status4">
                                                      <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                      <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                    </div>

                                                    <div class="col-md-2 col-sm-6">
                                                        <div class="form-group">
                                                            <div class="col-md-12 offset-md-3">
                                                                <button type='submit' class="btn btn-secondary sourc" >Search</button>
                                                            </div>
                                                        </div>
                                                       
                                                    </div>
                                          </div>

                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Weekly & Monthly Report</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <form class="" action="<?php echo base_url('Accounts/weeklymonthCahsSearch');?>" method="post" novalidate target="_blank">
                                  
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">
From Date<span class="required">*</span></label>
                                                  <div class="col-md-3 ">
                                                      <input type="date" class="form-control has-feedback-left" id="single_cal4" name="fromdate">
                                                    </div>
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">
                                                To Date<span class="required">*</span></label>
                                                  <div class="col-md-3 ">
                                                      <input type="date" class="form-control has-feedback-left" id="single_cal4" name="todate">
                                                    </div>

                                        <div class="col-md-2 col-sm-6">
                                            <div class="form-group">
                                                <div class="col-md-12 offset-md-3">
                                                    <button type='submit' class="btn btn-secondary sourc" >Search</button>
                                                </div>
                                            </div>
                                           
                                        </div>
                                          </div>

                                    </form>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <!-- /page content -->
