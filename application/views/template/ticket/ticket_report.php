  <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="clearfix"></div>

  <?php echo $this->session->flashdata('smg');?>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2> <span style="color:orange;">Daily Ticket Booking</span><small>Report</small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <form class="" action="<?php echo base_url('Ticket/DailyTickterReportSearch');?>" method="post" novalidate target="_blank">
                                  
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Enter Date<span class="required">*</span></label>
                                                  <div class="col-md-6 ">
                                                      <input type="text" class="form-control has-feedback-left" id="single_cal4" placeholder="First Name" name="created_at" aria-describedby="inputSuccess2Status4">
                                                      <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                      <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                    </div>

                                        <div class="col-md-4 col-sm-6">
                                            <div class="form-group">
                                                <div class="col-md-4 offset-md-3">
                                                    <button type='submit' class="btn btn-secondary sourc" >Submit</button>
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
                                    <h2>Weekly And Monthly <span style="color:orange;"> Ticket Booking</span> <small>Report</small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <form class="" action="<?php echo base_url('Ticket/weeklymonthTicketReportSearch');?>" method="post" novalidate>
                                  
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">From Date<span class="required">*</span></label>
                                                  <div class="col-md-3 ">
                                                      <input type="date" class="form-control has-feedback-left" id="single_cal4" name="fromdate">
                                                    </div>
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">To Date<span class="required">*</span></label>
                                                  <div class="col-md-3 ">
                                                      <input type="date" class="form-control has-feedback-left" id="single_cal4" name="todate">
                                                    </div>

                                        <div class="col-md-2 col-sm-6">
                                            <div class="form-group">
                                                <div class="col-md-2 offset-md-3">
                                                    <button type='submit' class="btn btn-secondary sourc" >Submit</button>
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



