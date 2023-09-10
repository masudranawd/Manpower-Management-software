
            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="clearfix"></div>

                    <div class="row">

                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Add New Expenses Category </h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <form class="" action="<?php echo base_url('Setting/AddNewExpensesCategory');?>" method="post" novalidate>
                                  
                                          <div class="field item form-group">
                                              <label class="col-form-label col-md-2 col-sm-3  label-align"><?php echo "Category Name"?><span class="required">*</span></label>
                                              <div class="col-md-10 col-sm-6">
                                                  <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="expenses_cat_name" required="required" />
                                              </div>
                                          </div>
                          
                     
                                        <div class="ln_solid">
                                            <div class="form-group">
                                                <div class="col-md-4 offset-md-3">
                                                    <button type='submit' class="btn btn-success">Add</button>
                                                </div>
                                            </div>
                                           
                                        </div>
                                    </form>
                                </div>
                            </div>
  <?php echo $this->session->flashdata('smg');?>
                          <!---table----->
                <div class="x_panel">
                  <div class="x_title">
                    <h2> All Expenses Category List <small></small></h2>
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
                            <th class="column-title" style="display: table-cell;">sl </th>
                            <th class="column-title" style="display: table-cell;">name</th>
                            <th class="column-title" style="display: table-cell;">action </th>
                          </tr>
                        </thead>

                        <tbody>
                          <?php 
                          // var_dump($AllvisaCategory);
                          $sl = 0;
                            foreach ($AllExpensesCat as $ExpensesCat) {
                              $sl++;
                          ?>

                          <tr class="even pointer">
                            <td class="a-center "><?php echo $sl;?></td>
                            <td class=" "><?php echo $ExpensesCat->expenses_cat_name;?></td>
                            <td class=" last">
                              <a href="" class="btn btn-round btn-warning" data-toggle="modal" data-target="#visacat<?php echo $ExpensesCat->id;?>">E</a>
                            </td>
                            </td>
                          </tr>



          <!-- Modal -->
          <div class="modal fade" id="visacat<?php echo $ExpensesCat->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">Edit Category name</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">

                        <form class="" action="<?php echo base_url('Setting/UpdateExpensesCategory');?>" method="post" novalidate>
                              <input type="hidden" name="id" value="<?php echo $ExpensesCat->id;?>">
                         <div class="field item form-group">
                              <label class="col-form-label col-md-2 col-sm-3  label-align"><?php echo "Name"?><span class="required">*</span></label>
                              <div class="col-md-10 col-sm-6">
                                <input class="form-control" name="expenses_cat_name" value="<?php echo $ExpensesCat->expenses_cat_name;?>" />
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