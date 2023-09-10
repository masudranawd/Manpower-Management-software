<?php 
//include tcpdf/library 
//include 'tcpdf/tcpdf.php'; 
//make TCPDF Object
$pdf = new TCPDF('p','mm','A4'); 
$pdf->SetFont('aefurat', '', 12);

//remove default header & footer. 
$pdf->setPrintHeader(false); 
$pdf->setPrintFooter(false); 

//add page
$pdf->AddPage(); 


//add content
//USING CELL
//1# $pdf->Cell(190,10,'This is A cell',1,1,'C');

//using html cell || writeHTMLCell($w, $h, $x, $y, $html='', $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true)

$var = '<table>';


$i = 0; $total = 0; 
foreach ($AllManpowerCustomerList as $ManpowerCustomer) {

  $i++; 
 $CustomerInfo = $this->Accounts_model->Customer_info_for_invoice($ManpowerCustomer->customer_id);
 $var .='<br/>';
 $var .='<br/>';
 $var .='<br/>';
 $var .='<table cellspacing="0" cellpadding="1" >';
     $var .='<tr>
            <th style=" width:15mm;"></th>
            <th style=" width:80mm;font-size:16;font-family:times;"><b><u>EMPLOYMENT CONTACT</u></b></th>
            <th style=" width:95mm;font-size:16px; text-align:right;"><u ><b>عـــــــــقــد عـــــمـــــل  </b></u></th>

    </tr>';
     $var .='<br/>';
     $var .='<tr>
            <th style=" width:30mm;font-size:10.9;font-family:times;"><b>1<sup>st</sup>Party</b></th>
            <th style=" width:130mm;font-size:10.9;font-family:times;"><b>: &nbsp;&nbsp;&nbsp;'.$CustomerInfo->Kofile_name_eng.'</b></th>
            <th style=" width:30mm;font-size:10.9;text-align:right;">لطرف الاول  &nbsp;:</th>

    </tr>';
    $var .=' <tr>
            <th style=" width:30mm;font-size:10.9;font-family:times;"><b>2<sup>nd</sup>Party</b></th>
            <th style=" width:130mm;font-size:10.9;font-family:times;"><b>: &nbsp;&nbsp;&nbsp;'.$CustomerInfo->fullname.' </b></th>
            <th style=" width:30mm;font-size:10.9;text-align:right;">لطرف الثاني &nbsp;:</th>

    </tr>';
     $var .='<tr>
            <th style=" width:30mm;font-size:10.9;font-family:times;"><b>Nationality</b></th>
            <th style=" width:130mm;font-size:10.9;font-family:times;"><b>: &nbsp;&nbsp;&nbsp;'.$CustomerInfo->pesent_nationality.' </b></th>
            <th style=" width:30mm;font-size:10.9;text-align:right;">الجـنـســـــيـة  &nbsp;:</th>

    </tr>';
    $var .=' <tr>
            <th style=" width:30mm;font-size:10.9;font-family:times;"><b>Passport No</b></th>
            <th style=" width:130mm;font-size:10.9;font-family:times;"><b>: &nbsp;&nbsp;&nbsp;'.$CustomerInfo->passport_no.'</b></th>
            <th style=" width:30mm;font-size:10.9;text-align:right;">رقــم الجــواز  &nbsp;&nbsp;:</th>

    </tr>';
    $var .=' <tr>
            <th style=" width:30mm;font-size:10.9;font-family:times;"><b>Profession</b></th>
            <th style=" width:130mm;font-size:10.9;font-family:times;"><b>: &nbsp;&nbsp;&nbsp;'.$CustomerInfo->profession.'</b></th>
            <th style=" width:30mm;font-size:10.9;text-align:right;">المــهــــنــــة  &nbsp;&nbsp;:</th>

    </tr>';


 $var .='</table>';

 $var .='<br/>';
 $var .='<table cellspacing="0" cellpadding="1" >';
     $var .='<br/>';
     $var .='<br/>';
    $var  .=' <tr>
            <th style=" width:10mm;font-size:10.9;font-family:times;"><b>1.</b></th>
            <th style=" width:82mm;font-size:11px;text-align:justify;font-family:times;">That the 1st party shall pay to the 2nd party a monthly salary of 800 SR. plus overtime accordingly to Saudi Labor Law.
                
            </th>

            <th style=" width:6mm;font-size:10.9;"></th>
            <th style=" width:82mm;font-size:10.9;text-align:right;">
                
                إن الطرف الاول يدفع الطرف الثاني راتب شهري800 ريال سعودي بالإضافة حست القانون العامل المملكة العربيــة السعوديــة  
                
            </th>

            <th style=" width:10mm;font-size:10.9;text-align:right;font-family:times;"><b>.1</b></th>

    </tr>';
 $var .='<br/>';
    $var .=' <tr>
            <th style=" width:10mm;font-size:10.9;font-family:times;"><b>2.</b></th>
            <th style=" width:82mm;font-size:11px;text-align:justify;font-family:times;">That 1st party should provide 2nd partys free medical, free single accommodation and free food facilities during the period of contract in the Kingdom of Saudi Arabia

               
            </th>

            <th style=" width:6mm;font-size:10.9;"></th>
            <th style=" width:82mm;font-size:10.9;text-align:right;">
               يلتزم الطرف الامل الطلب السكن الطرف الثاني مجانا خلال مدة المملكــــة العربيــة السعوديـــة 
                
            </th>

            <th style=" width:10mm;font-size:10.9;text-align:right;font-family:times;"><b>.2</b></th>

    </tr>';

 $var .='<br/>';
     $var .='<tr>
          <th style=" width:10mm;font-size:10.9;font-family:times;"><b>3.</b></th>
            <th style=" width:82mm;font-size:11px;text-align:justify;font-family:times;">That the 1st party shall provide free transportation from resident to the work site 
                
            </th>

            <th style=" width:6mm;font-size:10.9;"></th>
            <th style=" width:82mm;font-size:10.9;text-align:right;">
                ييلتزم الطرف الاول النقل للطرف الثاني من السكن الي محل العمل مجانا 
                
            </th>

            <th style=" width:10mm;font-size:10.9;text-align:right;font-family:times;"><b>.3</b></th>

    </tr>';

 $var .='<br/>';
     $var .='<tr>
            <th style=" width:10mm;font-size:10.9;font-family:times;"><b>4.</b></th>
            <th style=" width:82mm;font-size:11px;text-align:justify;font-family:times;">He period of contract is of 2(two) years
                
            </th>

            <th style=" width:6mm;font-size:10.9;"></th>
            <th style=" width:82mm;font-size:10.9;text-align:right;">
               يان مدة العقد سنتان 
                
            </th>

            <th style=" width:10mm;font-size:10.9;text-align:right;font-family:times;"><b>.4</b></th>

</tr>';
	 $var .='<br/>';
     $var .='<tr>
            <th style=" width:10mm;font-size:10.9;font-family:times;"><b>5.</b></th>
            <th style=" width:82mm;font-size:11px;text-align:justify;font-family:times;">That the 1st party shall bear the passage cost from Dhaka to K.S.A and back to Dhaka for joining the service and the return ticket would provide after completion this agreement.
                
            </th>

            <th style=" width:6mm;font-size:10.9;"></th>
            <th style=" width:82mm;font-size:10.9;text-align:right;">
                يحيث الطرف الاول يدفع نصف قمة التذكرة خطوط الجوية للطرف الثاني من كتمندووالي المملكـــة المباشرة العمل وتنكريــــــة العودة الي كتمندو وبعد انتهاء مدة 
                
            </th>

            <th style=" width:10mm;font-size:10.9;text-align:right;font-family:times;"><b>.5</b></th>

 	</tr>';
	 $var .='<br/>';
    $var .=' <tr>
            <th style=" width:10mm;font-size:10.9;font-family:times;"><b>6.</b></th>
            <th style=" width:82mm;font-size:11px;text-align:justify;font-family:times;">
            Daily working hours shall be 8 hours.
                
            </th>

            <th style=" width:6mm;font-size:10.9;"></th>
            <th style=" width:82mm;font-size:10.9;text-align:right;">
               ساعات العمل يكون (8) ساعات يوميا 
                
            </th>

            <th style=" width:10mm;font-size:10.9;text-align:right;font-family:times;"><b>.6</b></th>

    </tr>';

 $var .='<br/>';
     $var .='<tr>
            <th style=" width:10mm;font-size:10.9;font-family:times;"><b>7.</b></th>
            <th style=" width:82mm;font-size:11px;text-align:justify;font-family:times;">
            That this agreement shall come in effect from the date of arrival of the 2nd party in the Kingdom of Saudi Arabia.
            
            </th>

            <th style=" width:6mm;font-size:10.9;"></th>
            <th style=" width:82mm;font-size:10.9;text-align:right;">حيث ان هذا العقد يعتبر بعد وصول الطرف الثاني في المملكـــة العربيــــة السعوديــــة 
                
            </th>

            <th style=" width:10mm;font-size:10.9;text-align:right;font-family:times;"><b>.7</b></th>

 </tr>';

 $var .='<br/>';

   $var .='  <tr>
            <th style=" width:10mm;font-size:10px;font-family:times;"><b>8.</b></th>
            <th style=" width:82mm;font-size:11px;text-align:justify;font-family:times;">
            That the 2nd party should undertake to abide by the instruction and rules enforced in the Kingdom of Saudi Arabia.
            
            </th>

            <th style=" width:6mm;font-size:10.9;"></th>
            <th style=" width:82mm;font-size:10.9;text-align:right;">
              حيث ان الطرف الثاني ليجمع التعليمات والقرارتالساري المفعول في المملكــــــة العربيـــــة السعودـــــة 
            
            </th>

            <th style=" width:10mm;font-size:10px;text-align:right;font-family:times;"><b>.8</b></th>

</tr>';

 $var .='<br/>';
    $var .=' <tr>
            <th style=" width:10mm;font-size:10.9;"><b>9.</b></th>
            <th style=" width:82mm;font-size:11px;text-align:justify;font-family:times;">
            That the any other terms and conditions not mentioned in the demand letter shall be following as per Saudi Labor Laws.
            
            </th>

            <th style=" width:6mm;font-size:10.9;"></th>
            <th style=" width:82mm;font-size:10.9;text-align:right;">
                حيث ان اي شرط لم يذكر فثي ورقة الطلب يعمل حسب القانون العامل المملكــــــة العربيــــة السعوديــــة  
              
            </th>

            <th style=" width:10mm;font-size:10.9;text-align:right;font-family:times;"><b>.9</b></th>

    </tr>';

    
 $var .='</table>';

 $var .='<br/>';
 $var .='<br/>';
 $var .='<br/>';
 $var .='<br/>';
 $var .='<br/>';

 $var .='<table cellspacing="0" cellpadding="1" >';
     $var .='<tr>
            <th style=" width:15mm;"></th>
            <th style=" width:80mm;font-size:10.9; font-family:times;">Signature of the First Party</th>
            <th style=" width:95mm;font-size:10.9; text-align:right;">عتوقيع الطرف الاول</th>

    </tr>';
 $var .='<br/>';
    $var .=' <tr>
            <th style=" width:15mm;"></th>
            <th style=" width:80mm;font-size:10.9; font-family:times;">Signature of the Second Party </th>
            <th style=" width:95mm;font-size:10.9; text-align:right;"> توقيع الطرف الثاني </th>

    </tr>';
 $var .='</table>';

}




//$pdf->Image('1', 100, 100, 10 , 0, 'png', '', '', false, 300, '', false, false, 0, 'LB', false, false);
//$pdf->Image(base_url('images/').$optionsData->invoice_header,10,10,190,25);

//$pdf->writeHTMLCell(74,0,10,100,'<P>Header OF VOUCHAR<P>',1,1); //HEADER..

//$pdf->writeHTMLCell(190,0,12,40,'<b>From : '.$fromdate.'</b>',0,0); 
//$pdf->writeHTMLCell(190,0,12,45,'<b>To &nbsp; &nbsp; : '.$todate.'</b>',0,0); 

$pdf->writeHTMLCell(190,0,12,0,$var,0,0); 
//$pdf->writeHTMLCell(190,0,10,225,'<P>FOOTER OF VOUCHAR<P>',1,1); //FOOTER..

//$pdf->Image('1.png',10,261,74,15);

//output / result..
$pdf->Output(); 