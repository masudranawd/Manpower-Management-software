<?php 

if($ticketdata->issue_reissue == 'Void'){


//include tcpdf/library 
//include 'tcpdf/tcpdf.php'; 
//make TCPDF Object
$pdf = new Pdf('p', 'mm', 'A4', true, 'UTF-8', false);

$lg = Array();
$lg['a_meta_charset'] = 'UTF-8';
$lg['a_meta_dir'] = 'rtl';
$lg['a_meta_language'] = 'fa';
$lg['w_page'] = 'page';

$pdf->SetFont('times', '', 4, '', true);

//remove default header & footer. 
$pdf->setPrintHeader(false); 
$pdf->setPrintFooter(false); 
$pdf->SetFillColor(255, 255, 200);
//add page
$pdf->AddPage(); 


$pdf->Ln();

//Bottom barcode 


$pdf->writeHTMLCell(0,0,0,23,'',0,0); //HEADER.
$tbl = <<<EOD
<br/>
<table>
    <tr>
      <th style=" width:125mm;font-size:10.9;">
         <img src="images/$SiteData->logo" style="height:50px;"><br>
         <b>$SiteData->name</b><br>
         <b>$SiteData->address</b><br>
         <b>E-mail:</b>$SiteData->email<br>
         <b>Phone:</b>$SiteData->phone<br>
      </th>

      <th style=" width:65mm;font-size:10.9;text-align:left">
        <div style="text-align:center;"><b>INVOICE</b></div>
        <hr>
        <b>NO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b> Void Ticket<hr>
        <b>Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;       :</b> $ticketdata->created_at<hr>
        <b>Customer ID &nbsp;&nbsp;&nbsp;:</b> $CustomerData->fullname<hr>
        <b>PNR   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      :</b> $ticketdata->pnr_code<hr>
      </th>
   
    </tr>
   <hr>

    <tr>
      <th style=" width:5mm;font-size:10.9;font-family:times;"><b>To</b><br></th>
      <th style=" width:110mm;font-size:10.9;font-family:times;"><br><br>
      <b style="font-size:14px;">$CustomerData->fullname</b><br><br>
      <b>Passport No: </b> <b>$CustomerData->passport_no</b><br>
      <b>$CustomerData->address</b><br>
      <b>Phone :</b>$CustomerData->mobile_no<br>
      </th>
      <th style=" width:75mm;font-size:10.9;text-align:left"><br><br><br><br>
          <b>Invoice For</b><br><br>
          <b style="font-size:14px;">$AgentData->agent_name</b>
      </th>
    </tr>
</table>


<table border="1">

  <tr>
      <th style="font-size:12px;text-align:center">Service</th>
      <th style="font-size:12px;text-align:center">Ticket No</th>
      <th style="font-size:12px;text-align:center">Flight Date</th>
      <th style="font-size:12px;text-align:center">Carrier</th>
      <th style="font-size:12px;text-align:center">Sector</th>
      <th style="font-size:12px;text-align:center">Bill Amount</th>
      <th style="font-size:12px;text-align:center">Charge</th>
  </tr>
  <tr>
      <th style="font-size:12px;text-align:center">Air</th>
      <th style="font-size:12px;text-align:center">$ticketdata->ticket_number</th>
      <th style="font-size:12px;text-align:center">$ticketdata->flight_date</th>
      <th style="font-size:12px;text-align:center">$ticketdata->carrier</th>
      <th style="font-size:12px;text-align:center">$ticketdata->sector</th>
      <th style="font-size:12px;text-align:center">$ticketdata->gross_price</th>
      <th style="font-size:12px;text-align:center">$ticketdata->agent_charge</th>
  </tr>
</table>

<table border="1" >
    <tr>
            <th style=" width:158mm;font-size:11.5;text-align:right;"><b>Total :&nbsp;&nbsp;&nbsp;&nbsp;</b></th>
            <th style=" width:32mm;font-size:10.9;font-family:times;text-align:center;"><b>$ticketdata->agent_charge</b></th>
          </tr>
</table>

EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');

//$pdf->Image('1', 100, 100, 10 , 0, 'png', '', '', false, 300, '', false, false, 0, 'LB', false, false);

//$pdf->writeHTMLCell(0,140,10,30,'<P>Photo<P>'); //HEADER..

//$pdf->writeHTMLCell(190,0,10.9,40,'<b>From : '.$fromdate.'</b>',0,0); 
//$pdf->writeHTMLCell(190,0,10.9,45,'<b>To &nbsp; &nbsp; : '.$todate.'</b>',0,0); 

//$pdf->writeHTMLCell(190,0,10.9,00,$tbl,0,0); 
//$pdf->writeHTMLCell(190,0,10,225,'<P>FOOTER OF VOUCHAR<P>',1,1); //FOOTER..

//$pdf->Image('1.png',10,261,74,15);

//output / result..
$pdf->Output(); 
 }elseif ($ticketdata->issue_reissue == 'Refund') {
$RefundCharge = $ticketdata->gross_price - $ticketdata->refund;
//include tcpdf/library 
//include 'tcpdf/tcpdf.php'; 
//make TCPDF Object
$pdf = new Pdf('p', 'mm', 'A4', true, 'UTF-8', false);

$lg = Array();
$lg['a_meta_charset'] = 'UTF-8';
$lg['a_meta_dir'] = 'rtl';
$lg['a_meta_language'] = 'fa';
$lg['w_page'] = 'page';

$pdf->SetFont('times', '', 4, '', true);

//remove default header & footer. 
$pdf->setPrintHeader(false); 
$pdf->setPrintFooter(false); 
$pdf->SetFillColor(255, 255, 200);
//add page
$pdf->AddPage(); 


$pdf->Ln();

//Bottom barcode 


$pdf->writeHTMLCell(0,0,0,23,'',0,0); //HEADER.
$tbl = <<<EOD
<br/>
<table>
    <tr>
      <th style=" width:125mm;font-size:10.9;">
         <img src="images/$SiteData->logo" style="height:50px;"><br>
         <b>$SiteData->name</b><br>
         <b>$SiteData->address</b><br>
         <b>E-mail:</b>$SiteData->email<br>
         <b>Phone:</b>$SiteData->phone<br>
      </th>

      <th style=" width:65mm;font-size:10.9;text-align:left">
        <div style="text-align:center;"><b>INVOICE</b></div>
        <hr>
        <b>NO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b>Refund Ticket<hr>
        <b>Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;       :</b> $ticketdata->created_at<hr>
        <b>Customer ID &nbsp;&nbsp;&nbsp;:</b> $CustomerData->fullname<hr>
        <b>PNR   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      :</b> $ticketdata->pnr_code<hr>
      </th>
   
    </tr>
   <hr>

    <tr>
      <th style=" width:5mm;font-size:10.9;font-family:times;"><b>To</b><br></th>
      <th style=" width:110mm;font-size:10.9;font-family:times;"><br><br>
      <b style="font-size:14px;">$CustomerData->fullname</b><br><br>
      <b>Passport No: </b> <b>$CustomerData->passport_no</b><br>
      <b>$CustomerData->address</b><br>
      <b>Phone :</b>$CustomerData->mobile_no<br>
      </th>
      <th style=" width:75mm;font-size:10.9;text-align:left"><br><br><br><br>
          <b>Invoice For</b><br><br>
          <b style="font-size:14px;">$AgentData->agent_name</b>
      </th>
    </tr>
</table>


<table border="1">

  <tr>
      <th style="font-size:12px;text-align:center">Service</th>
      <th style="font-size:12px;text-align:center">Ticket No</th>
      <th style="font-size:12px;text-align:center">Flight Date</th>
      <th style="font-size:12px;text-align:center">Carrier</th>
      <th style="font-size:12px;text-align:center">Sector</th>
      <th style="font-size:12px;text-align:center">Bill Amount</th>
      <th style="font-size:12px;text-align:center">Refund Amount</th>
      <th style="font-size:12px;text-align:center">Charge</th>
  </tr>
  <tr>
      <th style="font-size:12px;text-align:center">Air</th>
      <th style="font-size:12px;text-align:center">$ticketdata->ticket_number</th>
      <th style="font-size:12px;text-align:center">$ticketdata->flight_date</th>
      <th style="font-size:12px;text-align:center">$ticketdata->carrier</th>
      <th style="font-size:12px;text-align:center">$ticketdata->sector</th>
      <th style="font-size:12px;text-align:center">$ticketdata->gross_price</th>
      <th style="font-size:12px;text-align:center">$ticketdata->refund</th>
      <th style="font-size:12px;text-align:center">$RefundCharge</th>
  </tr>
</table>

<table border="1" >
    <tr>
            <th style=" width:158mm;font-size:11.5;text-align:right;"><b>Total :&nbsp;&nbsp;&nbsp;&nbsp;</b></th>
            <th style=" width:32mm;font-size:10.9;font-family:times;text-align:center;"><b>$RefundCharge</b></th>
          </tr>
</table>

EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');

//$pdf->Image('1', 100, 100, 10 , 0, 'png', '', '', false, 300, '', false, false, 0, 'LB', false, false);

//$pdf->writeHTMLCell(0,140,10,30,'<P>Photo<P>'); //HEADER..

//$pdf->writeHTMLCell(190,0,10.9,40,'<b>From : '.$fromdate.'</b>',0,0); 
//$pdf->writeHTMLCell(190,0,10.9,45,'<b>To &nbsp; &nbsp; : '.$todate.'</b>',0,0); 

//$pdf->writeHTMLCell(190,0,10.9,00,$tbl,0,0); 
//$pdf->writeHTMLCell(190,0,10,225,'<P>FOOTER OF VOUCHAR<P>',1,1); //FOOTER..

//$pdf->Image('1.png',10,261,74,15);

//output / result..
$pdf->Output(); 

}else{
//include tcpdf/library 
//include 'tcpdf/tcpdf.php'; 
//make TCPDF Object
$pdf = new Pdf('p', 'mm', 'A4', true, 'UTF-8', false);

$lg = Array();
$lg['a_meta_charset'] = 'UTF-8';
$lg['a_meta_dir'] = 'rtl';
$lg['a_meta_language'] = 'fa';
$lg['w_page'] = 'page';

$pdf->SetFont('times', '', 4, '', true);

//remove default header & footer. 
$pdf->setPrintHeader(false); 
$pdf->setPrintFooter(false); 
$pdf->SetFillColor(255, 255, 200);
//add page
$pdf->AddPage(); 


$pdf->Ln();

//Bottom barcode 


$pdf->writeHTMLCell(0,0,0,23,'',0,0); //HEADER.
$tbl = <<<EOD
<br/>
<table>
    <tr>
      <th style=" width:125mm;font-size:10.9;">
         <img src="images/$SiteData->logo" style="height:50px;"><br>
         <b>$SiteData->name</b><br>
         <b>$SiteData->address</b><br>
         <b>E-mail:</b>$SiteData->email<br>
         <b>Phone:</b>$SiteData->phone<br>
      </th>

      <th style=" width:65mm;font-size:10.9;text-align:left">
        <div style="text-align:center;"><b>INVOICE</b></div>
        <hr>
        <b>NO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b><hr>
        <b>Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;       :</b> $ticketdata->created_at<hr>
        <b>Customer ID &nbsp;&nbsp;&nbsp;:</b> $CustomerData->fullname<hr>
        <b>PNR   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      :</b> $ticketdata->pnr_code<hr>
      </th>
   
    </tr>
   <hr>

    <tr>
      <th style=" width:5mm;font-size:10.9;font-family:times;"><b>To</b><br></th>
      <th style=" width:110mm;font-size:10.9;font-family:times;"><br><br>
      <b style="font-size:14px;">$CustomerData->fullname</b><br><br>
      <b>Passport No: </b> <b>$CustomerData->passport_no</b><br>
      <b>$CustomerData->address</b><br>
      <b>Phone :</b>$CustomerData->mobile_no<br>
      </th>
      <th style=" width:75mm;font-size:10.9;text-align:left"><br><br><br><br>
          <b>Invoice For</b><br><br>
          <b style="font-size:14px;">$AgentData->agent_name</b>
      </th>
    </tr>
</table>


<table border="1">

  <tr>
      <th style="font-size:12px;text-align:center">Ticket No</th>
      <th style="font-size:12px;text-align:center">Flight Date</th>
      <th style="font-size:12px;text-align:center">Carrier</th>
      <th style="font-size:12px;text-align:center">Sector</th>
  </tr>
  <tr>
      <th style="font-size:12px;text-align:center">$ticketdata->ticket_number</th>
      <th style="font-size:12px;text-align:center">$ticketdata->flight_date</th>
      <th style="font-size:12px;text-align:center">$ticketdata->carrier</th>
      <th style="font-size:12px;text-align:center">$ticketdata->sector</th>
  </tr>
</table>

<br/>
<br/>
<br/>
<br/>

<table border="1">
  <tr>
      <th colspan="3" style="font-size:12px;text-align:center;font-family:times;"><b>Gross Fare </b></th>
      <th style="font-size:12px;text-align:center">$ticketdata->gross_price</th>
  </tr>
  <tr>
      <th colspan="3" style="font-size:12px;text-align:center;font-family:times;"><b>Base Fare </b></th>
      <th style="font-size:12px;text-align:center">$ticketdata->base_fare</th>
  </tr>
  <tr>
      <th colspan="3" style="font-size:12px;text-align:center;font-family:times;"><b>Tax</b></th>
      <th style="font-size:12px;text-align:center">$ticketdata->tax</th>
  </tr>
  <tr>
      <th colspan="3" style="font-size:12px;text-align:center;font-family:times;"><b>Net Price</b></th>
      <th style="font-size:12px;text-align:center">$totalnet</th>
  </tr>
</table>


EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');

//$pdf->Image('1', 100, 100, 10 , 0, 'png', '', '', false, 300, '', false, false, 0, 'LB', false, false);

//$pdf->writeHTMLCell(0,140,10,30,'<P>Photo<P>'); //HEADER..

//$pdf->writeHTMLCell(190,0,10.9,40,'<b>From : '.$fromdate.'</b>',0,0); 
//$pdf->writeHTMLCell(190,0,10.9,45,'<b>To &nbsp; &nbsp; : '.$todate.'</b>',0,0); 

//$pdf->writeHTMLCell(190,0,10.9,00,$tbl,0,0); 
//$pdf->writeHTMLCell(190,0,10,225,'<P>FOOTER OF VOUCHAR<P>',1,1); //FOOTER..

//$pdf->Image('1.png',10,261,74,15);

//output / result..
$pdf->Output(); 
}

/// new ticket end