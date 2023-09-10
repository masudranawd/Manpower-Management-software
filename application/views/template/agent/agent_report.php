 <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="clearfix"></div>
               <?php echo $this->session->flashdata('smg');?>

                    <div class="
                    ">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel"  style="background: #2A3F54;">
                                <div class="x_title">
                                    <h2 style="color:#fff;">Agent Search</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <form class="" action="<?php echo base_url('Agent/AgentReportView');?>" method="post" novalidate>

                                     <div class="col-md-8"><!--start--->
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align" style="color:#fff;">
                                                Agent  
                                              </label>
                                              <div class="col-md-10 col-sm-6" style="margin-top: -10px;">
                                                 <select class="chosent form-control" name="agent_id" >
                                                    <option value="" > Agent Select</option> 
                                                  <?php 
                                                    foreach ($AllAgentList as $AgentList) {
                                                  ?>
                                                    <option value="<?php echo $AgentList->agent_id;?>"><?php echo $AgentList->agent_name;?> / <?php echo 'AG'.$AgentList->agent_id;?> / <?php echo $AgentList->mobile_no;?></option>
                                                  <?php
                                                      }  
                                                  ?>
                                                  </select>
                                              <script type="text/javascript">$(".chosent").chosen(); </script>
                                              </div>
                                          </div>
                                        </div><!--end---> 

                                        <div class="col-md-3 col-sm-6">
                                            <div class="form-group">
                                                <div class="col-md-12 offset-md-3">
                                                    <button type='submit' class="btn btn-info btn-block btn-round ">Search</button>
                                                </div>
                                            </div>
                                           
                                        </div>

                                    </form>
                                  </div>

                                </div>
                            </div>

                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel"  style="background: #2A3F54;">
                                <div class="x_title">
                                    <h2 style="color:#fff;"> Agent Payment Report</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <form class="" action="<?php echo base_url('Agent/AgentReportDateMonth');?>" method="post"  target="_blank">
                                  
                                        <div class="col-md-3"><!--start--->
                                          <div class="field item form-group">
                                              <div class="col-md-12 col-sm-6" style="margin-top: -10px;">
                                                 <select class="chosent form-control" name="agent_id" >
                                                    <option value="" >Agent Select</option> 
                                                  <?php 
                                                    foreach ($AllAgentList as $AgentList) {
                                                  ?>
                                                    <option value="<?php echo $AgentList->id;?>"><?php echo $AgentList->agent_name;?> / <?php echo 'AG'.$AgentList->agent_id;?> / <?php echo $AgentList->mobile_no;?></option>
                                                  <?php
                                                      }  
                                                  ?>
                                                  </select>
                                              <script type="text/javascript">$(".chosent").chosen(); </script>
                                              </div>
                                          </div>
                                        </div><!--end---> 

                                      <div class="col-md-4">
                                        <div class="field item form-group">
                                          <label class="col-form-label col-md-2 col-sm-3  label-align" style="color:#fff;">From</label>
                                          <div class="col-md-10 ">
                                              <input type="date" class="form-control "  name="fromdate">
                                          </div>
                                        </div>
                                       </div>

                                      <div class="col-md-4">
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-2 col-sm-3  label-align" style="color:#fff;">To </label>
                                            <div class="col-md-10">
                                                <input type="date" class="form-control " name="todate">
                                            </div>
                                        </div>
                                     </div>

                                  <div class="col-md-1 col-sm-6">
                                  <div class="form-group">
                                      <div class="col-md-12 ">
                                          <button type='submit' class="btn btn-info sourc" >Search</button>
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
            <!-- /page content -->



