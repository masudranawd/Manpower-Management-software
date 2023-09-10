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
         <b style="font-size:14px;">Safa Marwa International</b><br>
         <strong>Overseas Employment Licence # RL-1029</strong><br>
        <b>Head Office:</b>W-8/1 (LEVEL-7), PALTAN CHINA TOWN,<br> 67/1,
NAYAPALTAN, DHAKA-1000<br>
         <b>Phone:</b>+88-02-9357282 9352725<br>
         <b>E-mail:</b>safamarwaint@yahoo.com<br>
      </th>

      <th style=" width:65mm;font-size:12;text-align:left">
<br/>
<br/>
<br/>
        <div style="text-align:center;"><b>$VoucherData->type</b></div>
        <hr>
        <b>DATE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;       :</b> $VoucherData->vou_date<hr>
        <b>VOU NO  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b> $VoucherData->vou_no<hr>
        <b>AMOUNT &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b> $VoucherData->amount<hr>
        
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
      <th style="width:40mm;font-size:11.5px;text-align:left">HEAD OF ACCOUNT</th>
      <th style="width:;font-size:11.5px;text-align:left;border-bottom:1px dotted #000;">
     <b>$VoucherData->account</b>
      </th>
    </tr>
</table>

<br><br><br>
<table>
    <tr >
      <th style="width:75mm;font-size:11.5px;text-align:left">BEING THE AMOUNT RECEIVED FROM</th>
      <th style="width:;font-size:11.5px;text-align:left;border-bottom:1px solid #000;">
     
      </th>
    </tr>
</table>

<br><br>
<table  cellspacing="0" cellpadding="1">
    <tr>
      <th style="width:;font-size:11.5px;text-align:left;border-bottom:1px solid #000;" >
       <b>$VoucherData->received</b>
      </th>
    </tr>
</table>

<br><br>
<table  cellspacing="0" cellpadding="1">
    <tr>
      <th style="width:40mm;font-size:11.5px;text-align:left">ON ACCOUNT OF</th>
      <th style="width:;font-size:11.5px;text-align:left;border-bottom:1px solid #000;" >
      </th>
    </tr>

</table>

<br><br>
<table  cellspacing="0" cellpadding="1">
    <tr>
      <th style="width:;font-size:11.5px;text-align:left;border-bottom:1px solid #000;" >
       <b>$VoucherData->on_account</b>
      </th>
    </tr>
</table>

<br><br>
<table  cellspacing="0" cellpadding="1">
    <tr>
      <th style="width:40mm;font-size:11.5px;text-align:left">TAKA IN WORDS</th>
      <th style="width:;font-size:11.5px;text-align:left;border-bottom:1px solid #000;" > $Amountword
      </th>
    </tr>
</table>
<br><br>
<table  cellspacing="0" cellpadding="1">
    <tr>
      <th style="width:;font-size:11.5px;text-align:left;border-bottom:1px solid #000;" >
      </th>
    </tr>
</table>

<br><br>
<table >
    <tr>
      <th style="width:40mm;font-size:11.5px;text-align:left">TOTAL TAKA </th>
      <th style="width:;font-size:11.5px;text-align:right;border-bottom:1px solid #000;">
       <b>$VoucherData->amount</b>
      </th>
    </tr>
</table>
<br><br><br>
<table>
    <tr>
        <th style="font-size:11;text-align:left;">We give a quality service to the people by Hajj, Umrah and all kind of visa processing and all Airlines Ticket all over the world.
        </th>
    </tr>
</table>
<table>
    <tr>
        <th style="width:20mm;font-size:14;font-family:times;text-align:center;">
        <br><br><br>
          <hr>
        </th>
        <th style="width:14mm;"></th>
        <th style="width:40mm;font-size:14;font-family:times;text-align:center;">
        <br><br><br>
          <hr>
        </th>
        <th style="width:14mm;"></th>
        <th style="width:30mm;font-size:14;font-family:times;text-align:center;">
        <br><br><br>
          <hr>
        </th>
        <th style="width:10mm;"></th>
        <th style="width:65mm;font-size:14;font-family:times;text-align:center;">
        <br><br><br>
          <hr>
        </th>
    </tr>
    <tr style="line-height:1px">
            <th style="width:19mm;font-size:10;text-align:center;">
              RECIPIENT
            </th>
            <th style="width:10mm;"></th>
            <th style="width:47mm;font-size:10;text-align:center;">
              ACCOUNTS OFFICER 
            </th>
            <th style="width:50mm;font-size:10;text-align:center;">
              MANAGER
            </th>
            <th style="width:68mm;font-size:10;text-align:center;">
              PROPRIETOR/ MANAGING DIRECTOR
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