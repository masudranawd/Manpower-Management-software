
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

  <?php echo $this->session->flashdata('smg');?>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Daily<small>Report</small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <form class="" action="<?php echo base_url('Expenses/DailyExpenseSearch');?>" method="post" novalidate target="_blank">
                                  
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align">Enter Date<span class="required">*</span></label>
                                                  <div class="col-md-6 ">
                                                      <input type="text" class="form-control has-feedback-left" id="single_cal4" placeholder="First Name" name="expense_date" aria-describedby="inputSuccess2Status4">
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
<!--start-->


                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Daily<small>Report</small> Expense following</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <form class="" action="<?php echo base_url('Expenses/DailyExpenseCategorySearch');?>" method="post" novalidate target="_blank">
                                  
                                          <div class="field item form-group">


                                                <label class="col-form-label col-md-1 col-sm-3  label-align">Enter Date<span class="required">*</span></label>
                                                <div class="col-md-3 xdisplay_inputx form-group row has-feedback">
                                <input type="text" class="form-control has-feedback-left" id="single_cal3" placeholder="First Name" aria-describedby="inputSuccess2Status3" name="expense_date">
                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                <span id="inputSuccess2Status3" class="sr-only">(success)</span>
                              </div>

                                                <label class="col-form-label col-md-2 col-sm-3  label-align">Expense Type Select<span class="required">*</span></label>
                                                <div class="col-md-3 ">
                                                 <select class="chosen form-control" name="expense_cat_id" required >
                                                    <option>Select Expense Category</option>
                                                    <?php 
                                                      foreach ($AllExpensesCat as $ExpensesCat) {
                                                    ?>
                                                      <option value="<?php echo $ExpensesCat->id;?>"><?php echo $ExpensesCat->expenses_cat_name;?></option>
                                                <?php } ?>
                                                  </select>
                                                </div>

                                        <div class="col-md-4 col-sm-4">
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
<!--end-->
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Weekly And Monthly <small>Report</small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <form class="" action="<?php echo base_url('Expenses/weeklymonthSearch');?>" method="post" novalidate>
                                  
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



