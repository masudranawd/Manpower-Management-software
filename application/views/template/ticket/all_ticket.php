    <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>
             <h2><?php echo $this->session->flashdata('smgdu');?></h2>
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>All Ticket</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
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
                    <table id="datatable-buttons" class="table tablewhite table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>Date</th>
                          <th>Type</th>
                          <th>Agent </th>
                          <th>Descriptions </th>
                          <th>Sale Amount </th>
                          <th>Gross Fare</th>
                          <th>Base Fare</th>
                          <th>Tax</th>
                          <th>Net Price</th>
                          <th>Action</th>
                        </tr>
                      </thead>


                      <tbody>
                      <?php
                          $sl=0;
                        foreach ($AllTicketData as $TicketData) {
                              if ($TicketData->type == 'Ticket Booking') {
                                    $sl++;

                      ?>

                        <tr>
                          <td><?php echo $TicketData->created_at;?></td>
                          <td style="width: 6%;"> <?php echo $TicketData->issue_reissue;?> </td>
                          <td>

                            <?php 
                            if ($TicketData->agent_id == null) {
                            ?>
                              
                            <?php 
                            }else{
                            ?>

                            <?php 
                              $AgentName = $this->Ticket_model->Agent_info_for_invoice($TicketData->agent_id);

                                echo $AgentName->agent_name;
                             ?>
                           <?php }?>
                          </td>
                            <td style="width: 45%;">

                            
                            <?php 
                              $CustomerData = $this->Customer_model->customernamebyid($TicketData->customer_id);
                              if ($CustomerData == !null) {
                              ?>
                             <b>Passenger Name :</b> <?php echo  $CustomerData->fullname; ?> <b>pp no  :</b><?php echo $CustomerData->passport_no;?> <?php }else{?>
                             <b>Passenger Name :</b> <?php echo  $TicketData->p_name; ?> <b>pp no  :</b><?php echo $TicketData->passport;?> 
                             <?php }?><b> Ticket N.</b> <?php echo $TicketData->ticket_number;?> <b>Air Lince :</b><?php echo $TicketData->air_lince;?> <b>PNR Code :</b><?php echo $TicketData->pnr_code;?>,  <b>Issue Date : </b><?php echo date('dS M Y', strtotime($TicketData->issue_date));?>, <b>Flight Date :</b><?php echo  date('dS M Y', strtotime($TicketData->flight_date));?>,<b>Sector :</b> <?php echo $TicketData->sector?>
                            <?php   if ($TicketData->remark) {echo '<b>Remark:</b>'.$TicketData->remark;}else{ echo '';} ?>
                          </td>

                      
                          <td style="text-align:center;width: 12%;">
                            <?php echo $TicketData->carrier;?><br>

                          </td>
                          <td style="text-align:center;width: 12%;">
                            <?php echo $TicketData->gross_price;?><br>

                          </td>

                          <td style="text-align:center;width: 12%;"><?php echo $TicketData->base_fare;?>
                          </td>
                          <td>
                            <?php echo $TicketData->tax; ?>
                          </td>
                          <td style="text-align:center">
                            <?php 
                            //  $Gross_price = $TicketData->gross_price;
                            //  $Base_price = $TicketData->base_fare;
                            //  $tax = $TicketData->tax;
                            //  $comision = $TicketData->comision;
                            //  $ait = '.3';
                            //  $totalcomission = ($Base_price * $comision)/100;
                            //  $totalait = ($Gross_price * $ait)/100;
                            //  //echo $totalcomission;
                            // // echo '<br/>'.$totalait;

                            //  $totalBase = $Base_price - $totalcomission;

                            //  //echo '<br/>'.$totalBase.'<br/>';

                            // echo $totalnet = (int)$totalBase + (int)$totalait + (int)$tax ;
                            
                            		/*ticke net price*/
		$Gross_price = $TicketData->gross_price;
	     $Base_price = $TicketData->base_fare;
	     $tax = $TicketData->tax;
	     $comision =$TicketData->comision;
	     $ait = '.3';
	     $totalcomission = ($Base_price * $comision)/100;
	     $totalait = ($Base_price * $ait)/100;
	     //echo $totalcomission;
	    // echo '<br/>'.$totalait;

	    // $totalBase = $Base_price - $totalcomission;
	     $totalBase =  $totalcomission - $totalait ;

	     //echo '<br/>'.$totalBase.'<br/>';
	  //  $data['totalnet'] = (int)$totalBase + (int)$tax ;
	  
	   $totalnet = (int)$Gross_price - (int)$totalBase ;

     if ($TicketData->issue_reissue == 'Refund') {
      echo '<del>'.$totalnet.'</del> <br/>';
      echo '<b>Charge='.$TicketData->refund.'<br/>';
      echo '<b>Total='.((int)$totalnet - (int)$TicketData->refund);
    }elseif($TicketData->issue_reissue == 'Void'){
       echo '<del>'.$totalnet.'</del> <br/>';
      echo '<b>Charge='.(int)$TicketData->void;
    }elseif($TicketData->issue_reissue == 'Reissue'){
      echo '<del>'.$totalnet.'</del> <br/>';
      echo '<b>Charge='.$TicketData->reissue.'<br/>';
      echo '<b>Total='.((int)$totalnet + (int)$TicketData->reissue);
    }else{ echo $totalnet;}

                            ?>
                          </td>
                          <td style="text-align: center;">
                           <a href="<?php echo base_url('Ticket/TicketBookingUpdate/')?><?php echo $TicketData->id;?>" class="btn btn-round btn-warning btn-xs">E</a>
                              <a href="" class="btn btn-round btn-danger btn-xs" data-toggle="modal" data-target="#Remove<?php echo $TicketData->id;?>" >D</a>
                           <!--<a href="<?php echo base_url('Ticket/Invoice/')?><?php echo $TicketData->id;?>/<?php echo $TicketData->agent_id;?>/<?php echo $TicketData->customer_id;?>" class="btn btn-round btn-info btn-xs" target="_blank">Print</a>-->
                          </td>
                        </tr>
                      <!--- remove model  ---->
                      <div class="modal fade" id="Remove<?php echo $TicketData->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title" id="myModalLabel" style="color:#000;"><?php 
                              $CustomerData = $this->Customer_model->customernamebyid($TicketData->customer_id);?>
                             <b>Passenger Name :</b> <?php if($CustomerData == null){ echo $TicketData->p_name;}else{ echo $CustomerData->fullname; }?>  </h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">

                      <form action="<?php echo base_url('Ticket/RemoveTicket/');?><?php echo $TicketData->id;?>" method="post">
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
      </div><!--end row-->
    </div>
  </div>
  <!-- /page content -->