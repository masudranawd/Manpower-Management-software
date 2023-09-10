<?php 
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

$pdf->writeHTMLCell(0,0,0,5,'',0,0); //HEADER.
$tbl = <<<EOD
<br/>
<table>
    <tr>
      <th style=" width:125mm;font-size:10.9;">
         <img src="images/$SiteData->logo" style="height:50px;"><br>
         <b>$SiteData->name</b><br>
        <b>Head Office:</b>$SiteData->address<br>
         <b>E-mail:</b>$SiteData->email<br>
         <b>Phone:</b>$SiteData->phone<br>
      </th>

      <th style=" width:65mm;font-size:12;text-align:left">
<br/>
<br/>
        <div style="text-align:center;"><b>OFFICE COPY<br/>MONEY RECEIPT</b></div>
        <hr>
        <b>DATE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;       :</b> $InvoiceData->payment_date<hr>
        <b>MR NO &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b> $InvoiceData->serial_no<hr>
        <b>AMOUNT &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b> $InvoiceData->pay_amount  $InvoiceData->cost_amount <hr>
        
      </th>
  
    </tr>
</table>

<table>
  <tr>
    <th><hr></th>
  </tr>
</table>
<br><br>

<table  cellspacing="0" cellpadding="1">
    <tr>
      <th style="width:80mm;font-size:11.5px;text-align:left">Received with from M/s/Ms/Mr.</th>
      <th style="width:;font-size:11.5px;text-align:left;border-bottom:1px solid #000;">
      $AgentName $AgentID
      </th>
    </tr>
</table>

<br><br><br>
<table>
    <tr >
      <th style="width:40mm;font-size:11.5px;text-align:left">A sum of Taka</th>
      <th style="width:;font-size:11.5px;text-align:left;border-bottom:1px solid #000;">
      $Amountword Only
      </th>
    </tr>
</table>

<br><br>
<table  cellspacing="0" cellpadding="1">
    <tr>
      <th style="width:40mm;font-size:11.5px;text-align:left">Received Form</th>
      <th style="width:;font-size:11.5px;text-align:left;border-bottom:1px solid #000;" > $ReceiveName
      $ExpenseName
      </th>
    </tr>
</table>
<br>
<table  cellspacing="0" cellpadding="1">
    <tr>
      <th style="width:40mm;font-size:11.5px;text-align:left"></th>
      <th style="width:;font-size:11.5px;text-align:left;border-bottom:1px solid #000;" >
      $payment_method_name->bank_name , $payment_method_name->account_number
      </th>
    </tr>
</table><br>
<table  cellspacing="0" cellpadding="1">
    <tr>
      <th style="width:;font-size:10px;text-align:left;border-bottom:1px solid #000;" >$InvoiceData->remark
      </th>
    </tr>
</table>

<br><br>
<table >
    <tr>
      <th style="width:40mm;font-size:11.5px;text-align:left">Amount </th>
      <th style="width:;font-size:11.5px;text-align:right;border-bottom:1px solid #000;">
      <b>$InvoiceData->pay_amount $InvoiceData->cost_amount</b>
      </th>
    </tr>
</table>
<br><br>
<table>
    <tr>
        <th style=" width:142.5mm;font-size:11;text-align:left;">We provide a quality service to the people by Hajj, Umrah and all kind of<br> visa processing and all Airlines Ticket all over the world.
        </th>
        <th style="width:47.5mm;font-size:14;font-family:times;text-align:center;">
        <br><br><br>
          <hr>
        </th>
    </tr>
    <tr style="line-height:1px">
            <th style=" width:142.5mm;"></th>
            <th style="width:47.5mm;font-size:14;text-align:center;">
              Signature
            </th>
    </tr>
</table>

<br/>
<br/><br/>
<br/>
<br/><br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<table>
    <tr>
      <th style=" width:125mm;font-size:10.9;">
         <img src="images/$SiteData->logo" style="height:50px;"><br>
         <b>$SiteData->name</b><br>
        <b>Head Office:</b>$SiteData->address<br>
         <b>E-mail:</b>$SiteData->email<br>
         <b>Phone:</b>$SiteData->phone<br>
      </th>

      <th style=" width:65mm;font-size:12;text-align:left">
<br/>
<br/>
        <div style="text-align:center;"><b>CUSTOMER COPY<br/> MONEY RECEIPT</b></div>
        <hr>
        <b>DATE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;       :</b> $InvoiceData->payment_date<hr>
        <b>MR NO &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b> $InvoiceData->serial_no<hr>
        <b>AMOUNT &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b> $InvoiceData->pay_amount  $InvoiceData->cost_amount <hr>
      </th>
  
    </tr>
</table>

<table>
  <tr>
    <th><hr></th>
  </tr>
</table>
<br><br>

<table  cellspacing="0" cellpadding="1">
    <tr>
      <th style="width:80mm;font-size:11.5px;text-align:left">Received with from M/s/Ms/Mr.</th>
      <th style="width:;font-size:11.5px;text-align:left;border-bottom:1px solid #000;">
      $AgentName $AgentID
      </th>
    </tr>
</table>

<br><br>
<table>
    <tr >
      <th style="width:40mm;font-size:11.5px;text-align:left">A sum of Taka</th>
      <th style="width:;font-size:11.5px;text-align:left;border-bottom:1px solid #000;">
      $Amountword Only
      </th>
    </tr>
</table>

<br><br>
<table  cellspacing="0" cellpadding="1">
    <tr>
      <th style="width:40mm;font-size:11.5px;text-align:left">Received Form</th>
      <th style="width:;font-size:11.5px;text-align:left;border-bottom:1px solid #000;" > $ReceiveName
      $ExpenseName
      </th>
    </tr>
</table>
<br>
<table  cellspacing="0" cellpadding="1">
    <tr>
      <th style="width:40mm;font-size:11.5px;text-align:left"></th>
      <th style="width:;font-size:11.5px;text-align:left;border-bottom:1px solid #000;" >
      $payment_method_name->bank_name , $payment_method_name->account_number
      </th>
    </tr>
</table><br>
<table  cellspacing="0" cellpadding="1">
    <tr>
      <th style="width:;font-size:10px;text-align:left;border-bottom:1px solid #000;" >$InvoiceData->remark
      </th>
    </tr>
</table>


<br><br>
<table >
    <tr>
      <th style="width:40mm;font-size:11.5px;text-align:left">Amount </th>
      <th style="width:;font-size:12px;text-align:right;border-bottom:1px solid #000;">
     <b> $InvoiceData->pay_amount $InvoiceData->cost_amount</b>
         
      </th>
    </tr>
</table>
<br><br>
<table>
    <tr>
        <th style=" width:142.5mm;font-size:11;text-align:left;">We provide a quality service to the people by Hajj, Umrah and all kind of<br> visa processing and all Airlines Ticket all over the world.
        </th>
        <th style="width:47.5mm;font-size:14;font-family:times;text-align:center;">
        <br><br><br>
          <hr>
        </th>
    </tr>
    <tr style="line-height:1px">
            <th style=" width:142.5mm;"></th>
            <th style="width:47.5mm;font-size:14;text-align:center;">
              Signature
            </th>
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