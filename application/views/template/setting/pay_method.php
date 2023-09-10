 <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="clearfix"></div>

                    <div class="row">

                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Add Payment Method   <?php echo $this->session->flashdata('smgv');?></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <form class="" action="<?php echo base_url('Setting/AddNewBank');?>" method="post" >
                                  
                                          <label class="col-form-label col-md-1 col-sm-3  label-align"><?php echo "Bank  Name."?></label>
                                          <div class="col-md-4 col-sm-6">
                                              <input class="form-control"  name="bank_name" required="required" />
                                          </div>

                                          <label class="col-form-label col-md-1 col-sm-3  label-align"><?php echo "Account No."?></label>
                                          <div class="col-md-4 col-sm-6">
                                              <input class="form-control"name="account_number" required="required" />
                                          </div>

                                          <div class="col-md-2 ">
                                              <button type='submit' class="btn btn-success">Add</button>
                                          </div>
                                           
                                    </form>
                                </div>
                            </div>

                          <!---table----->
                <div class="x_panel">
                  <div class="x_title">
                    <h2> All Payment Method List <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <div class="table-responsive">
                      <table class="table tablewhite table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th class="column-title" style="text-align: center;">sl </th>
                            <th class="column-title" style="text-align: center;">Bank Name</th>
                            <th class="column-title" style="text-align: center;">Acconunt NO</th>
                            <th class="column-title" style="text-align: center;">action </th>
                          </tr>
                        </thead>

                        <tbody>
                          <?php 
                               $sl = 0;
                            foreach ($AllPayMethod as $PaymentData) {
                              $sl++;
                          ?>

                          <tr class="even pointer">
                            <td class="a-center "><?php echo $sl;?></td>
                            <td class=" " style="text-align: center;"><?php echo $PaymentData->bank_name;?></td>
                            <td class=" " style="text-align: center;"><?php echo $PaymentData->account_number;?></td>
                            <td class=" last" style="text-align: center;">
                              <a href="" class="btn btn-round btn-danger" data-toggle="modal" data-target="#remove<?php echo $PaymentData->id;?>">Remove</a>
                              <a href="" class="btn btn-round btn-warning" data-toggle="modal" data-target="#update<?php echo $PaymentData->id;?>">EDit</a>
                            </td>
                            </td>
                          </tr>



          <!-- Modal -->
          <div class="modal fade" id="update<?php echo $PaymentData->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel" style="color: #000;">Edit </h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">

                        <form class="" action="<?php echo base_url('Setting/UpdatePaymethodData');?>" method="post" novalidate>
                              <input type="hidden" name="id" value="<?php echo $PaymentData->id;?>">
                         <div class="field item form-group">
                              <label class="col-form-label col-md-2 col-sm-3  label-align" style="color: #000;font-weight: 800;"><?php echo "bank Name"?><span class="required">*</span></label>
                              <div class="col-md-10 col-sm-6">
                                <input class="form-control" name="bank_name" value="<?php echo $PaymentData->bank_name;?>" />
                              </div>
                        </div> 
                        <div class="field item form-group">
                              <label class="col-form-label col-md-2 col-sm-3  label-align" style="color: #000;font-weight: 800;"><?php echo "Acconunt No"?><span class="required">*</span></label>
                              <div class="col-md-10 col-sm-6">
                                <input class="form-control" name="account_number" value="<?php echo $PaymentData->account_number;?>" />
                              </div>
                        </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                    </form>                  
                </div>
              </div>
            </div>
          </div>
          <!-- visa category model---->

          <!-- Modal -->
          <div class="modal fade" id="remove<?php echo $PaymentData->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel" style="color: #000;font-weight: 800;">Remove</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">

                        <form class="" action="<?php echo base_url('Setting/PayMethodRemove/');?><?php echo $PaymentData->id;?>" method="post" novalidate>
                              <input type="hidden" name="id" value="<?php echo $PaymentData->id;?>">
                              <h3 style="color: red;font-weight: 900;"><?php echo "Are Your Sure ? Remove IT."?></h3>
                              
                        </div>

                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">YES</button>
                </div>
                    </form>                  
                </div>
              </div>
            </div>
          </div>
          <!-- visa category model---->
                          <?php
                            }
                          ?>
                        </tbody>
                      </table>
                    </div>
              
            
                  </div>
                </div>
          </div><!-- end col-md-6-->


                    </div><!-- end row---->
                </div>
            </div>
            <!-- /page content -->