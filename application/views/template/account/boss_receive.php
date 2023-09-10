      <!-- page content -->
  <div class="right_col" role="main">
      <div class="">
          <div class="clearfix"></div>
            <?php echo $this->session->flashdata('sms');?>
          <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel" style="background: #2A3F54;">
                    <div class="x_title">
                        <h2 style="color:#fff;">Boss Receive</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <form class="" action="<?php echo base_url('Account/BossReceiveAdd');?>" method="post">
                       
                                            
                        <script type="text/javascript">
                        var check = function() {
                          if (document.getElementById('Amount').value ==
                            document.getElementById('confirm_Amount').value) {
                            document.getElementById('message').style.color = 'green';
                            document.getElementById('message').innerHTML = 'matching';document.getElementById('submit').disabled = false;
                          } else {
                            document.getElementById('message').style.color = 'red';
                            document.getElementById('message').innerHTML = 'not matching';
                            document.getElementById('submit').disabled = true;
                          }
                        }
                        </script>

                        <div class="col-md-6"><!--start--->
                              <label style="color:#fff">Amount.<span class="required">*</span></label>
                          <div class="field item form-group">
                              <div class="col-md-12 col-sm-6">
                                  <input class="form-control" class='optional' name="c_amount"  type="number" id="Amount"  onkeyup='check();'  required="required" />
                                </div>
                          </div>
                        </div><!--end--->

                        <div class="col-md-6"><!--start--->

                          <label style="color:#fff">Confirm .<span class="required">*</span></label>
                          <div class="field item form-group">
                             <div class="col-md-12 col-sm-6">
                                  <input class="form-control" class='optional' name="amount"  type="number"   id="confirm_Amount"  onkeyup='check();' required="required" />
                                  <span id='message'></span>
                                </div>
                          </div>
                        </div><!--end--->

                     <div class="col-md-6">
                          <div class="field item form-group">
                            <div class="col-md-12">
                                <input type="text" class="form-control has-feedback-left" id="single_cal4" placeholder="d/m/y" name="payment_date" >
                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                              </div>
                          </div>
                        </div>
                        
                   
                        <div class="col-md-6" ><!--start--->
                          <div class="field item form-group">
                              <div class="col-md-12 col-sm-6">
                                  <input class="form-control" class='optional' name="remark"  type="text" placeholder="Enter Remark !" />
                                </div>
                          </div>
                        </div><!--end--->


                        <div class="col-md-6" style="margin-top: 10px;"><!--start--->
                            <div class="form-group">
                                <div class="col-md-6 ">
                                   <button type='submit' class=" form-control  btn btn-info btn-lg" id="submit" disabled  >Save</button>
                                </div>
                            </div>
                        </div><!--end--->
                        </form>
                    </div>
                </div>
            <?php echo $this->session->flashdata('smg');?>
             <!---table----->
      </div><!-- end row---->
                    
                    
      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">
            <h2>  All Boss Receive List </h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="row">
                <div class="col-sm-12">
                  <div class="card-box table-responsive">
                    <table id="datatable" class="table tablewhite table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>Date</th>
                          <th>Remark</th>
                          <th>Amount</th>
                          <th>Action</th>
                        </tr>
                      </thead>


                      <tbody>
                      <?php
                          $sl=0;
                        foreach ($AllBossReciveList as $BossReceiveData) {
                          $sl++;                  
                      ?>

                        <tr>

                          <td><?php echo date("d/m/Y", strtotime($BossReceiveData->payment_date));?></td>


                          <td style="width:20%;">
                                <?php 
                                    if ($BossReceiveData->remark) {
                                        echo $BossReceiveData->remark;
                                    }else{
                                      echo '00';
                                    }
                                ?>   
                           </td>
                          <td style="width:20%;">
                                <?php 
                                    if ($BossReceiveData->amount) {
                                        echo $BossReceiveData->amount;
                                    }else{
                                      echo '00';
                                    }
                                ?>   
                           </td>
                          <td style="width:30%;">
                            <a href="<?php echo base_url('Account/bossInvoice/');?><?php echo $BossReceiveData->id;?>" class="btn btn-round btn-primary btn-xs" target="_blank">Print</a>
                            <a href="" data-toggle="modal" data-target="#Edit<?php echo $BossReceiveData->id;?>"class="btn btn-round btn-warning btn-xs">Edit</a>
                            <a href="" class="btn btn-round btn-danger btn-xs"  data-toggle="modal" data-target="#Remove<?php echo $BossReceiveData->id;?>">Remove</a>
                          
                          </td>
                        </tr>
                        
                            <!--- remove model  ---->
                            <div class="modal fade" id="Edit<?php echo $BossReceiveData->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel" style="color:#000;">Date:## <?php echo $BossReceiveData->payment_date;?></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  </div>
                                  <div class="modal-body">
                            
                                    <form action="<?php echo base_url('Account/BossAcEdit/')?><?php echo $BossReceiveData->id;?>" method="post">
                                        
                                       <input class="form-control" name="id"  type="hidden"  value="<?php echo $BossReceiveData->id;?>" />
                                       
                                        <div class="field item form-group">
                                           <div class="col-md-2"><!--start--->
                                               <label style="color:#000;">Date.</label>
                                           </div>
                                          <div class="col-md-10 col-sm-6">
                                              <input class="form-control" name="payment_date"  type="text"  value="<?php echo $BossReceiveData->payment_date;?>" />
                                          </div>
                                        </div><!--end--->
                                        
                                        <div class="field item form-group">
                                           <div class="col-md-2"><!--start--->
                                               <label style="color:#000;">Amount.</label>
                                           </div>
                                          <div class="col-md-10 col-sm-6">
                                              <input class="form-control" name="amount"  type="number"  value="<?php echo $BossReceiveData->amount;?>" />
                                          </div>
                                        </div><!--end---> 
                                        
                                        <div class="field item form-group">
                                           <div class="col-md-2"><!--start--->
                                               <label style="color:#000;">Remark</label>
                                           </div>
                                          <div class="col-md-10 col-sm-6">
                                              <input class="form-control" name="remark"  type="text"  value="<?php echo $BossReceiveData->remark;?>" />
                                          </div>
                                        </div><!--end---> 
                            
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


                        
                            <!--- remove model  ---->
                            <div class="modal fade" id="Remove<?php echo $BossReceiveData->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel" style="color:#000;">Date:## <?php echo $BossReceiveData->payment_date;?></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  </div>
                                  <div class="modal-body">
                            
                                    <form action="<?php echo base_url('Account/BossAcRemove/')?><?php echo $BossReceiveData->id;?>" method="post">
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

                      <?php
                      }
                      ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
            <!-- /page content -->
                          
 <script type="text/javascript">$(".chosen").chosen(); </script>
<script>
$(document).ready(function(){
$("select").change(function(){
$(this).find("option:selected").each(function(){
var optionValue = $(this).attr("value");
if(optionValue){
    $(".box").not("." + optionValue).hide();
    $("." + optionValue).show();
} else{
    $(".box").hide();
}
});
}).change();
});
</script>