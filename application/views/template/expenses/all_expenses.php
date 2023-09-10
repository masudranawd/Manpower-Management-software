
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">

            <div class="clearfix"></div>

           <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>At Last Expenses</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                          </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>Sl</th>
                          <th>Expense Date</th>
                          <th>For Expenses</th>
                          <th>Details</th>
                          <th>Amount</th>
                          <th>Action</th>
                        </tr>
                      </thead>


                      <tbody>

                        <?php 
                            $Sl =0;
                          foreach ($AllExpensesData as $ExpensesData) {
                            $Sl++;
                            
                        ?>

                        <tr>
                          <td><?php echo $Sl;?></td>
                          <td><?php echo $ExpensesData->expense_date;?></td>
                          <td>
                            <?php
                             $expenseCatName = $this->Expenses_model->GetExpensesCatById($ExpensesData->expense_cat_id);
                              echo $expenseCatName->expenses_cat_name;
                            ?>
                          </td>
                          <td>
                            <?php echo $ExpensesData->details;?>
                          </td>
                          <td>
                            <?php echo $ExpensesData->amount;?>
                              
                            </td> 
                            <td class="" style="text-align: center;">
                              <a href="" class="btn btn-round btn-warning" data-toggle="modal" data-target="#expense_edit<?php echo $ExpensesData->id;?>">E</a>
                             
      <a href="" class="btn btn-round btn-danger btn-xs"  data-toggle="modal" data-target="#Remove<?php echo $ExpensesData->id;?>">Remove</a>
                          
                          </td>
                        </tr>


<!--- remove model  ---->
<div class="modal fade" id="Remove<?php echo $ExpensesData->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel"> Expenses:# </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">

<form action="<?php echo base_url('Expenses/Expense_Romve');?>/<?php echo $ExpensesData->id;?>" method="post">
          <div class="field item form-group">
            <label class="col-form-label col-md-12 col-sm-3  label-align" style="color:red;font-size: 1.3rem;font-weight: 900;text-align: center;">  Are You Sure ? Remove It. </label>
         </div>     

          <div class="ln_solid">
            <div class="form-group">
               <div class="col-md-6 offset-md-3">
                   <button type='submit' class="btn btn-primary">Yes</button>
                    <button type='reset' class="btn btn-success">No</button>
                 </div>
            </div>
          </div>
         </form>
      </div>
    </div>
  </div>
</div>
<!--- model end ----->

          <!-- Modal -->
          <div class="modal fade" id="expense_edit<?php echo $ExpensesData->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">Expenses Update </h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">

             <form class="" action="<?php echo base_url('Expenses/UpdateExpenses');?>" method="post" novalidate>
                              <input type="hidden" name="id" value="<?php echo $ExpensesData->id;?>">

                         <div class="field item form-group">
                              <label class="col-form-label col-md-2 col-sm-3  label-align"><?php echo "Date"?><span class="required">*</span></label>
                              <div class="col-md-10 col-sm-6">
                                <input  class="form-control" name="expense_date" value="<?php echo $ExpensesData->expense_date;?>" />
                              </div>
                        </div>

                         <div class="field item form-group">
                              <label class="col-form-label col-md-2 col-sm-3  label-align"><?php echo "For Expenses"?><span class="required">*</span></label>
                              <div class="col-md-10 col-sm-6">
                                <select class=" form-control" name="expense_cat_id"  >
                                   <option>Select CashIn Category</option>
                                     <?php 
                                       foreach ($AllExpensesCat as $ExpensesCat) {
                                     ?>
                                      <option value="<?php echo $ExpensesCat->id;?>" <?php if ($ExpensesCat->id == $ExpensesData->expense_cat_id): echo 'selected'; ?> <?php endif ?> ><?php echo $ExpensesCat->expenses_cat_name;?></option>
                                     <?php } ?>
                                </select>
                              </div>
                        </div>

                         <div class="field item form-group">
                              <label class="col-form-label col-md-2 col-sm-3  label-align"><?php echo "Details"?><span class="required">*</span></label>
                              <div class="col-md-10 col-sm-6">
                                <textarea class="form-control" name="details"  />
                                <?php echo $ExpensesData->details;?>
                                  </textarea>
                              </div>
                        </div>

                         <div class="field item form-group">
                              <label class="col-form-label col-md-2 col-sm-3  label-align"><?php echo "Amount"?><span class="required">*</span></label>
                              <div class="col-md-10 col-sm-6">
                                <input  class="form-control" name="amount" value="<?php echo $ExpensesData->amount;?>" />
                              </div>
                        </div>

                <div class="modal-footer">
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
            </div>
         </div><!-- end row---->
                </div>
              </div>

                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
