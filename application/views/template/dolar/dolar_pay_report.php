<!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="clearfix"></div>
                        <?php echo $this->session->flashdata('smg');?>
                    <div class="row">
                        
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel" style="background: #2A3F54;">
                                <div class="x_title">
                                    <h2 style="color:#fff;">Dolar Payment Report</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <form class="" action="<?php echo base_url('Account/DolarPayReport');?>" method="post">
                                  
                                          <div class="field item form-group">
                                               <label class="col-form-label col-md-2 col-sm-3  label-align" style="color:#fff;">From Date</label>
                                                <div class="col-md-3 ">
                                                    <input type="date" class="form-control"  name="fromdate" required="">
                                                </div>
                                              <label class="col-form-label col-md-2 col-sm-3  label-align" style="color:#fff;">
                                                To Date</label>
                                            <div class="col-md-3 ">
                                                 <input type="date" class="form-control"  name="todate" required="">
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

<?php if($dolarPaymentReportlist == !null){?>
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel" >
                  <div class="x_title">
                    <h2>Dolar Payment Report</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-md-12">
                            <div class="card-box table-responsive"  id="printMe" style="margin-top: 30px;">

                            <div class="" style="color:#000;font-weight: bold; ">
                                <div class="col-md-8">
                                    <div class="" style="float:left;">
                                            <img src="<?php echo base_url();?>images/<?php echo $SiteData->logo;?>" alt="" style="height:100px;width:100px;">
                                    </div>
                                <div class="" style="float:left;padding-left:20px;">
                                    
                                  <h3 style="color:#000;"><?php echo $SiteData->name;?></h3>
                                  <h4 style="color:#000;"><?php echo $SiteData->address;?></h4>
                                  <h4 style="color:#000;"><b>E-mail:</b> <?php echo $SiteData->email;?></h4>
                                  <h4 style="color:#000;"><b>Phone:</b> <?php echo $SiteData->phone;?></h4>
                                </div>
                                </div>
                                <div class="col-md-4">
                                     <p style="font-size:22px;padding:0px; margin:0px;">Dolar Payment Report</p>
                                      

                                    <p style="font-size:16px;padding:0px; margin:0px;">
                                
                                  <?php if($fromdate){echo  'Date : '.date("d/m/Y", strtotime($fromdate)); }else{ echo '';} ?> - <?php if($todate){echo date("d/m/Y", strtotime($todate)); }else{ echo '';} ?>
                              
                                  <?php
                                      $sl=0;
                                      $totaldolar = 0;
                                    foreach ($dolarPaymentReportlist as $dolarPaydata) {
                                    
                                      $sl++;$totaldolar =(int)$totaldolar+(int)$dolarPaydata->amount;
                                    }
                                  ?>

                                  <br/>Total Dolar: <?php echo $totaldolar;?> <br/>
                                </p>
                                </div>
                            </div>
                    <div style="height: 190px;"></div>
                    <table class="table table-striped table-bordered" style="width:100% margin-top:40px;" >
                       <thead>
                        <tr>
                          <th>Sl</th>
                          <th>Date</th>
                          <th width="20%">Description</th>
                          <th>Amount</th>
                        </tr>
                      </thead>


                      <tbody>
                      <?php
                          $sl=0;
                        $totaldolar = 0;
                       foreach ($dolarPaymentReportlist as $dolarPaydata) {
                            $sl++;
                            $totaldolar =(int)$totaldolar+(int)$dolarPaydata->amount;
                      ?>
                        <tr>
                          <td style="width: 5%;"><?php echo $sl;?></td>
                          <td><?php echo date("d/m/Y", strtotime($dolarPaydata->pay_date));?></td>    
                          <td style="width: 60%;">
                           <!-- dectiption -->

                            <?php  
                                $AgentInfo = $this->Accounts_model->Agent_info_for_invoice($dolarPaydata->agent_id);
                                   if ($AgentInfo == !null) {
                                  echo '<b>Agent-  </b>'.$AgentInfo->agent_name;echo '('.$AgentInfo->agent_id .')';
                                  }else{
                                    echo '';
                                  } 
                            ?> 
                            <?php  
                                  $CustomerInfo = $this->Accounts_model->Customer_info_for_invoice($dolarPaydata->customer_id);

                              if ($CustomerInfo == !null) {
                                  echo '<b>P-</b>'.$CustomerInfo->fullname; echo '('.$CustomerInfo->serial_no.')'; 
                              }else{ echo '';}
                            ?>


                            <?php echo $dolarPaydata->remark;?>
                            
                          </td>    
                          <td style="text-align: center;">
                            <?php echo $dolarPaydata->amount;?>
                          </td>
                        </tr>
                      <?php
                        }
                      ?>


                        <tr>
                          <td colspan="3" style="text-align: right;">Total  =</td>
                          <td colspan="" style="text-align: center;"> <?php echo $totaldolar; ?></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              <div class="row no-print">
                <div class=" ">
                  <button class="btn btn-default" onclick="printDiv('printMe')"><i class="fa fa-print"></i> Print</button>
                </div>
              </div>
              </div>
           </div>
          </div>
        </div>
<?php }else{
  echo 'Not Found';
}?>
<!----->

                    </div>
                </div>
            </div>
            <!-- /page content -->
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