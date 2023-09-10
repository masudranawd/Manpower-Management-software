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

$pdf->SetFont('aefurat', '', 7, '', true);


//remove default header & footer. 
$pdf->setPrintHeader(false); 
$pdf->setPrintFooter(false); 

//add page
$pdf->AddPage(); 


// define barcode style
$style = array(
    //'position' => 'center',
    'align' => 'C',
    'stretch' => false,
    'fitwidth' => true,
    //'border' => true,
    'hpadding' => 'auto',
    'vpadding' => 'auto',
    'fgcolor' => array(0,0,0),
    'bgcolor' => false, //array(255,255,255),
    'text' => true,
    'font' => 'helvetica',
    'fontsize' => 14,
    'stretchtext' => 13,
);



$style['cellfitalign'] = 'C';
$n = 1; 
$To = $CustomerDataInfo->qty; 


while($n <= $To){
    $n ++; 
    $x = $pdf->GetX();
    $y = $pdf->GetY();

    $pdf->write1DBarcode($CustomerDataInfo->visa_no,  'C39', '', '18', '', 19, 0.33, $style, 'N');      
// Center alignment


$pdf->Ln();
}
//Bottom barcode 


// define barcode style
$style2 = array(
    //'position' => 'center',
    'align' => 'C',
    'stretch' => false,
    'fitwidth' => true,
    //'border' => true,
   // 'hpadding' => 'auto',
    //'vpadding' => 'auto',
    'fgcolor' => array(0,0,0),
    'bgcolor' => false, //array(255,255,255),
    'text' => true,
    'font' => 'helvetica',
    'fontsize' => 14,
    'stretchtext' => 13,
);



$style2['cellfitalign'] = 'C';
$n = 1; 
$To = $CustomerDataInfo->qty; 


while($n <= $To){
    $n ++; 
    $x = $pdf->GetX();
    $y = $pdf->GetY();

    $pdf->write1DBarcode($CustomerDataInfo->passport_no,  'C39', '', '257', '', 19, 0.33, $style, 'N');      

$pdf->Ln();
}



$pdf->writeHTMLCell(0,0,0,23,'',0,0); //HEADER.
$tbl = <<<EOD
<br/>
<br/>

<table cellspacing="0" cellpadding="1" style="">
    <tr>
            <th style=" width:60mm;font-size:11;">PHOTO</th>
            <th style=" width:70mm;font-size:11;font-family:times;text-align:center;">
            <br/>
            <br/>
            <br/>
          <!--  <img src="images1/ar.png" style="height:53px;">-->
            </th>
            <th style=" width:60mm;text-align:center;font-size:12;">
                <b style="font-size:14px;font-family:times;">$CustomerDataInfo->mofa_number</b><br/>
                سفارة
             المملكة العربية السعودية
           <br/>
القسم القنصلي      <br> EMBASSY OF SAUDI ARABIA<br>
CONSULAR SECTION 

</th>
    </tr>
</table>


<br/>
<br/>
<br/>
<table cellspacing="0" cellpadding="1" style="border-top:1px solid #000;border-left:1px solid #000;border-right:1px solid #000; line-height:95%;" >
    <tr>
            <th style=" width:18mm;font-size:13;"><small>Full name:</small></th>
            <th style=" width:74mm;font-size:11;font-family:times;"><b>$CustomerDataInfo->fullname</b></th>
            <th style=" width:10mm;font-size:11;font-family:times;"><b> $Gender</b></th>
            <th style=" width:72mm;font-size:11;font-family:times;"><b>$CustomerDataInfo->father_name</b></th>
            <th style=" width:16mm;text-align:right;font-size:13;"><small>السم الكامل:</small></th>
    </tr>
</table>


<table cellspacing="0" cellpadding="1" style="border-top:1px solid #000;border-left:1px solid #000;border-right:1px solid #000; line-height:95%;">
    <tr>
            <th style=" width:30mm;font-size:13;"><small>Mother's name:</small></th>
            <th style=" width:140mm;font-size:11;font-family:times;"><b >$CustomerDataInfo->mother_name</b></th>
            <th style=" width:20mm;text-align:right;font-size:13;"><small>اسم الولادة:</small></th>
    </tr>
</table>
<table cellspacing="0" cellpadding="1" style="border-top:1px solid #000;border-left:1px solid #000;border-right:1px solid #000; line-height:95%;">
    <tr>
            <th style=" width:30mm;font-size:13;"><small>Date of birth:</small></th>
            <th style=" width:36mm;font-size:11;font-family:times;"><b>$CustomerDataInfo->date_of_birth</b></th>
            <th style=" width:28mm;text-align:right;font-size:13;"><small>تاريخ الولادة: </small></th>
            <th style=" width:32mm;text-align:right;font-size:13;text-align:left;"><small>&nbsp;&nbsp;Place of birth:</small></th>

            <th style=" width:44mm;font-size:11;font-family:times;"><b>$CustomerDataInfo->place_of_birth</b></th>

            <th style=" width:20mm;font-size:13;text-align:right;"><small>محل الولادة: </small></th>
    </tr>
</table>
<table cellspacing="0" cellpadding="1" style="border-top:1px solid #000;border-left:1px solid #000;border-right:1px solid #000; line-height:95%;">
    <tr>
            <th style=" width:30mm;font-size:13;"><small>Pervious nationality:</small></th>
            <th style=" width:36mm;font-size:11;font-family:times;"><b>$CustomerDataInfo->previous_nationality</b></th>
            <th style=" width:28mm;text-align:right;font-size:13;"><small>الجنسية السابقة: </small></th>
            <th style=" width:30mm;text-align:left;font-size:13;"><small>Present nationality:</small></th>
            <th style=" width:36mm;font-size:11;font-family:times;"><b>$CustomerDataInfo->pesent_nationality</b></th>

            <th style=" width:30mm;font-size:11;text-align:right;"><small> الجنسية الحالية: </small></th>
    </tr>
</table>

<table cellspacing="0" cellpadding="1" style="border-top:1px solid #000;border-left:1px solid #000;border-right:1px solid #000; line-height:95%;">
    <tr>
            <th style=" width:30mm;font-size:13;"><small>Sex:</small></th>
            <th style=" width:36mm;font-size:11;font-family:times;"><b>$CustomerDataInfo->gender</b></th>
            <th style=" width:28mm;text-align:right;font-size:13;"><small>االجنس: </small></th>
            <th style=" width:30mm;text-align:left;font-size:13;"><small>&nbsp;&nbsp;Marital Status:</small></th>
            <th style=" width:36mm;font-size:11;font-family:times;"><b>$CustomerDataInfo->marital_status</b></th>
            <th style=" width:30mm;text-align:right;font-size:13;"><small>لحالة الاجتماعية:</small></th>
    </tr>
</table>

<table cellspacing="0" cellpadding="1" style="border-top:1px solid #000;border-left:1px solid #000;border-right:1px solid #000;line-height:95%;">
    <tr>
            <th style=" width:30mm;font-size:13;"><small>Sect:</small></th>
            <th style=" width:36mm;font-size:11;"><b> </b></th>
            <th style=" width:28mm;text-align:right;font-size:13;"><small>المذهب: </small></th>
            <th style=" width:30mm;text-align:left;font-size:13;"><small>&nbsp;&nbsp;Religion:</small></th>
            <th style=" width:36mm;font-size:11;font-family:times;"><b>$CustomerDataInfo->religion</b></th>
            <th style=" width:30mm;text-align:right;font-size:13;"><small>الديـانة: </small></th>
    </tr>
</table>



<table cellspacing="0" cellpadding="1" style="border-top:1px solid #000;border-left:1px solid #000;border-right:1px solid #000;">
    <tr>
            <th style=" width:35mm;font-size:11;"><b> </b></th>

            <th style=" width:20mm;font-size:11;"><small>مصدرة:</small></th>

            <th style=" width:20mm;font-size:11;"><b> </b></th>

            <th style=" width:15mm;font-size:11;"><small>مصدرة:</small></th>

            <th style=" width:80mm;font-size:12;text-align:right;"><b> $CustomerDataInfo->profession_arabic </b></th>

            <th style=" width:20mm;text-align:right;font-size:11;"><small>مصدرة:</small></th>

    </tr>
</table>


<table cellspacing="0" cellpadding="1" style="border-top:1px solid #000;border-left:1px solid #000;border-right:1px solid #000;line-height:95%;">
    <tr>
            <th style=" width:20mm;font-size:13;"><small>Place of issue:</small></th>
            <th style=" width:28mm;font-size:11;font-family:times;"><b> $CustomerDataInfo->place_issue </b></th>
            <th style=" width:17mm;font-size:13;"><small>Qualification</small></th> 
            <th style=" width:15mm;font-size:10;font-family:times;"><b></b></th>
            <th style=" width:16mm;font-size:13;"><small>Profession :</small></th> 
            <th style=" width:94mm;font-size:11;font-family:times;text-align:center;"><b>$CustomerDataInfo->profession</b></th>
          
    </tr>
</table>


<table cellspacing="0" cellpadding="1" style="border-top:1px solid #000;border-left:1px solid #000;border-right:1px solid #000;line-height:90%;">
    <tr>
            <th style=" width:50mm;font-size:13;"><small>Home address and telephone No.</small></th>
            <th style=" width:100mm;font-size:11;font-family:times;"><b></b></th>
            <th style=" width:40mm;text-align:right;font-size:13;"><small>عنوان المنزل ورقم التلفون: </small></th>
          
    </tr>
</table>

<table cellspacing="0" cellpadding="1" style="border-top:1px solid #000;border-left:1px solid #000;border-right:1px solid #000;line-height:90%;">
    <tr>
            <th style=" width:50mm;font-size:13;"><small>Business address and telephone No.:</small></th>
            <th style=" width:100mm;font-size:10;text-align:center;font-family:times;"><b>M/S SAFA MARWA INTERNATIONAL RL-1029</b></th>
            <th style=" width:40mm;"></th>
          
    </tr>
</table>
<table cellspacing="0" cellpadding="1" style="border-top:1px solid #000;border-left:1px solid #000;border-right:1px solid #000;line-height:95%;">
    <tr>
            <th style=" width:190mm;font-size:10;text-align:center;font-family:times;font-weight:600;">
67/1, NAYA PALTAN, W-8/1(7<sup>th</sup> FLOOR) WEST TOWER, PALTAN CHINA TOWN, DHAKA-1000, PHONE:+8802-7193650
        </th>
          
    </tr>
</table>


<table cellspacing="0" cellpadding="1" style="border-top:1px solid #000;border-left:1px solid #000;border-right:1px solid #000;line-height:90%;">
    <tr>
            <th style=" width:30mm;font-size:13;"><small style="line-height:20px;">Purpose of travel:</small></th>

            <th style=" width:15mm;font-size:10;text-align:center;border:1px solid #000;">عمل  <br> Work </th>

            <th style=" width:20mm;font-size:10;text-align:center;border:1px solid #000;padding:5px;">مرور <br> Transit </th>
            <th style=" width:15mm;font-size:10;text-align:center;border:1px solid #000;padding:5px;">زيارة <br> Visit </th>

            <th style=" width:20mm;font-size:10;text-align:center;border:1px solid #000;padding:5px;">عمرة <br> Umrah </th>

            <th style=" width:25mm;font-size:10;text-align:center;border:1px solid #000;padding:5px;">للإقامة <br> Residence </th>

            <th style=" width:15mm;font-size:10;text-align:center;border:1px solid #000;padding:5px;">لحج <br> Hajj </th>

            <th style=" width:25mm;font-size:10;text-align:center;border:1px solid #000;padding:5px;">دبلوماسية <br> Diplomacy </th>
            <th style=" width:25mm;text-align:right;font-size:11;"><small style="line-height:20px;">الغاية من السفر: </small></th>
          
    </tr>
</table>
<table cellspacing="0" cellpadding="1" style="border-top:1px solid #000;border-left:1px solid #000;border-right:1px solid #000;line-height:90%;">
    <tr>
            <th style=" width:44mm;font-size:11;"><b> </b></th>

            <th style=" width:20mm;font-size:11;"><small>محل الاصدار: </small></th>

            <th style=" width:43mm;font-size:11;"><b> </b></th>

            <th style=" width:20mm;font-size:11;"><small>تاريخ الاصدار: </small></th>

            <th style=" width:43mm;font-size:11;text-align:right"><b> </b></th>

            <th style=" width:20mm;text-align:right;font-size:11;"><small>رقم الجواز:</small></th>

    </tr>
</table>


<table cellspacing="0" cellpadding="1" style="border-left:1px solid #000;border-right:1px solid #000;line-height:90%;">
    <tr>
            <th style=" width:23mm;font-size:13;"><small>Place of issue:</small></th>
            <th style=" width:32mm;font-size:11;font-family:times;"><b>$CustomerDataInfo->place_issue</b></th>
            <th style=" width:35mm;font-size:13;"><small>Date Of passport issue:</small></th> 
            <th style=" width:40mm;font-size:11;font-family:times;"><b>$CustomerDataInfo->D_of_passport_issue</b></th>
            <th style=" width:20mm;font-size:13;"><small>Passport No.:</small></th> 
            <th style=" width:40mm;font-size:11;font-family:times;"><b>$CustomerDataInfo->passport_no</b></th>
          
    </tr>
</table>

<table cellspacing="0" cellpadding="1" style="border-top:1px solid #000;border-left:1px solid #000;border-right:1px solid #000;line-height:90%;">
    <tr>
            <th style=" width:50mm;font-size:13;"><small>Date of pasport's expiry:</small></th>
            <th style=" width:110mm;font-size:11;font-family:times;"><b>$CustomerDataInfo->D_passport_expiry </b></th>
            <th style=" width:30mm;text-align:right;font-size:11;"><small>تاريخ انتهاء صلاحية الجواز:</small></th>
          
    </tr>
</table>


<table cellspacing="0" cellpadding="1" style="border-top:1px solid #000;border-left:1px solid #000;border-right:1px solid #000;line-height:80%;">
    <tr>
            <th style=" width:34mm;font-size:10;"><b> </b></th>

            <th style=" width:30mm;font-size:11;"><small>مدة الاقامة بالمملكة: </small></th>

            <th style=" width:43mm;font-size:10;"><b> </b></th>

            <th style=" width:20mm;font-size:11;"><small>تاريخ الوصول: </small></th>

            <th style=" width:43mm;font-size:10;text-align:right"><b> </b></th>

            <th style=" width:20mm;text-align:right;font-size:11;"><small>رتاريخ المغادرة:</small></th>

    </tr>
    <tr>
            <th style=" width:50mm;font-size:13;"><small>Duration of stay in the Kingdom:</small></th>
            <th style=" width:30mm;font-size:11;font-family:times;"><b>  </b></th>
            <th style=" width:30mm;font-size:13;"><small>Date of arrival:</small></th> 
            <th style=" width:20mm;font-size:11;font-family:times;"><b></b></th>
            <th style=" width:60mm;font-size:13;"><small>Date of departure:</small></th> 
          
    </tr>
</table>

<table cellspacing="0" cellpadding="1" style="border-top:1px solid #000;border-left:1px solid #000;border-right:1px solid #000;line-height:80%;">
    <tr>
            <th style=" width:10mm;font-size:11;"><small> </small></th>

            <th style=" width:10mm;font-size:11;"><small>تاريخ: </small></th>

            <th style=" width:15mm;font-size:11;"><small> </small></th>
            <th style=" width:15mm;font-size:11;"><small> ايصال رقم: </small></th>

            <th style=" width:15mm;text-align:center;font-size:11;"><small>()</small></th>
            <th style=" width:10mm;font-size:11;"><small>ماريخ </small></th>

            <th style=" width:15mm;text-align:center;font-size:11;"><small></small></th>
            <th style=" width:15mm;font-size:11;"><small>مبشيك رقم:</small></th>

            <th style=" width:15mm;text-align:center;font-size:11;"><small>(&nbsp;&nbsp;&nbsp;)</small></th>
            <th style=" width:10mm;font-size:11;font-size:11;"><small>منقدا</small></th>

            <th style=" width:15mm;text-align:center;font-size:11;"><small>(&nbsp;&nbsp;&nbsp;)</small></th>
            <th style=" width:10mm;font-size:11;"><small> مجاملة </small></th>

            <th style=" width:15mm;text-align:right;font-size:11;"><small>(&nbsp;&nbsp;&nbsp;)</small></th>
            <th style=" width:20mm;font-size:11;"><small> مطريقة الدفع: </small></th>

    </tr>
</table>

<table cellspacing="0" cellpadding="1" style="border-top:1px solid #000;border-left:1px solid #000;border-right:1px solid #000;line-height:80%;">
    <tr>
            <th style=" width:40mm;font-size:13;"><small>Model of payment: </small></th>


            <th style=" width:30mm;font-size:13;"><small>Free</small></th>

            <th style=" width:25mm;text-align:center;font-size:13;"><small>Cash</small></th>

            <th style=" width:35mm;text-align:center;font-size:13;"><small>Check No.</small></th>

            <th style=" width:25mm;text-align:center;font-size:13;"><small>Date:</small></th>

            <th style=" width:35mm;text-align:center;font-size:13;"><small>No. Date:</small></th>


    </tr>
</table>


<table cellspacing="0" cellpadding="1" style="border-top:1px solid #000;border-left:1px solid #000;border-right:1px solid #000;line-height:80%;">
    <tr>
            <th style=" width:55mm;font-size:13;"><small>Relationship </small></th>

            <th style=" width:15mm;font-size:11;"><small> لتـه: </small></th>

            <th style=" width:100mm;font-size:11;"><small></small></th>
            <th style=" width:20mm; text-align:right;font-size:11;"><small>اسم المحرم: </small></th>

    </tr>
</table>

<table cellspacing="0" cellpadding="1" style="border-top:1px solid #000;border-left:1px solid #000;border-right:1px solid #000;line-height:80%;">
    <tr>
            <th style=" width:25mm;font-size:13;"><small>Destination</small></th>
            <th style=" width:45mm;font-size:13;"><small></small></th>
            <th style=" width:28mm;font-size:13;"><small> لجهة الوصول بالمملكة:  </small></th>

            <th style=" width:25mm;font-size:13;"><small>Carrier's name:</small></th>
            <th style=" width:40mm;font-size:13;"><small></small></th>
            <th style=" width:27mm;font-size:13; text-align:right;"><small>اسم الشركة الناقلة: </small></th>

    </tr>
</table>

<table cellspacing="0" cellpadding="1" style="border-top:1px solid #000;border-left:1px solid #000;border-right:1px solid #000;line-height:80%;">
    <tr>
            <th style=" width:90mm;font-size:13;"><small> Dependents traveling in the same passport:</small></th>
          
            <th style=" width:100mm;font-size:13; text-align:right;"><small> لايضاحات تخص افراد العائلة (المضافين) علي  نفس جواز السفر:</small></th>

    </tr>
</table>

<table cellspacing="0" cellpadding="1" style="border-top:1px solid #000;border-left:1px solid #000;border-right:1px solid #000; line-height:80%;">
    <tr>
            <th style=" width:40mm;font-size:13;text-align:center;border-right:1px solid #000;"><small> نوع الصلة</small></th>
            <th style=" width:40mm;font-size:13;text-align:center;border-right:1px solid #000;"><small>تاريخ الميلاد</small></th>

            <th style=" width:45mm;font-size:13;text-align:center;border-right:1px solid #000;"><small> الجنــــــــــس  </small></th>

            <th style=" width:65mm;font-size:13;text-align:center;"><small> م بـالكـــــــامل</small></th>

    </tr>
    <tr>
            <th style=" width:40mm;font-size:13;text-align:center;border-right:1px solid #000;"><small>Relationship</small></th>
            <th style=" width:40mm;font-size:13;text-align:center;border-right:1px solid #000;"><small>Date of birth</small></th>
            <th style=" width:45mm;font-size:13;text-align:center;border-right:1px solid #000;"><small>Sex</small></th>
            <th style="width:65mm;font-size:13;text-align:center;"><small>Full name</small></th>

    </tr>
</table>

<table cellspacing="0" cellpadding="1" border="1" style="line-height:110%;">
    <tr>
            <th style="  width:40mm;font-size:13;text-align:center;"><small></small></th>
            <th style="  width:40mm;font-size:13;text-align:center;"><small></small></th>
            <th style="  width:45mm;font-size:13;text-align:center;"><small></small></th>
            <th style="  width:65mm;font-size:13;text-align:center;"><small></small></th>

    </tr>
    <tr>
            <th style="  width:40mm;font-size:13;text-align:center;"><small></small></th>
            <th style="  width:40mm;font-size:13;text-align:center;"><small>GROUP</small></th>
            <th style="  width:45mm;font-size:13;text-align:center;"><small></small></th>
            <th style="  width:65mm;font-size:13;text-align:center;"><small></small></th>

    </tr>
    <tr>
            <th style="  width:40mm;font-size:13;text-align:center;"><small></small></th>
            <th style="  width:40mm;font-size:13;text-align:center;"><small>CITY</small></th>
            <th style="  width:45mm;font-size:13;text-align:center;"><small></small></th>
            <th style="  width:65mm;font-size:13;text-align:center;"><small></small></th>

    </tr>
    <tr>
            <th style="  width:40mm;font-size:13;text-align:center;"><small></small></th>
            <th style="  width:40mm;font-size:13;text-align:center;"><small>ID</small></th>
            <th style="  width:45mm;font-size:13;text-align:center;"><small></small></th>
            <th style="  width:65mm;font-size:13;text-align:center;"><small></small></th>

    </tr>
</table>


<table cellspacing="0" cellpadding="1" style="border-top:1px solid #000;border-left:1px solid #000;border-right:1px solid #000;line-height:90%;">
    <tr>
            <th style=" width:100mm;font-size:13;"><small>Name and address of company or individual in the kingdom:</small></th>
            <th style=" width:10mm;"><small></small></th>
            <th style=" width:80mm;text-align:right;font-size:13;"><small>اسم وعنوان الشركة او اسم الشخص وعنوان بالمملكة:</small></th>

    </tr>
</table>

<table cellspacing="0" cellpadding="1" style="border-top:1px solid #000;border-left:1px solid #000;border-right:1px solid #000;line-height:98%;">
    <tr>
            <th style=" width:190mm;font-size:10.5;font-family:times;text-align:center;"><b>$CustomerDataInfo->Kofile_name_eng</b></th>
           

    </tr>
</table>

<table cellspacing="0" cellpadding="1" style="border-top:1px solid #000;border-left:1px solid #000;border-right:1px solid #000;line-height:8px;">
    <tr>
            <th style=" width:125mm;font-size:10;font-family:times;">The undersigned hereby certify that all the information I have provided are correct.I will abide by the laws of the Kingdom during the period of my residence in it.
</th>
            <th style=" width:65mm;text-align:right;font-size:12;"><small>انا الموقع ادناه اقر بان كل المعلومات التي دونها <br>صحيحه.
وسيكون ملتزما بقوانين المملكة اثناء فترة وجودي بها
</small></th>

    </tr>
</table>

<table cellspacing="0" cellpadding="1" style="border-top:1px solid #000;border-left:1px solid #000;border-right:1px solid #000;line-height:90%;">
    <tr>
            <th style=" width:10mm;font-size:13;"><small>Date</small></th>
            <th style=" width:12mm;font-size:13;"><small> </small></th>
            <th style=" width:12mm;font-size:13;"><small>التأريخ:</small></th>

            <th style=" width:13mm;font-size:13;"><small>Signature</small></th>
            <th style=" width:12mm;font-size:13;"><small> </small></th>
            <th style=" width:20mm;font-size:13;"><small>التوقيع: </small></th>

            <th style=" width:10mm;font-size:13;"><small>Name</small></th>
            <th style=" width:91mm;font-size:11;font-family:times;"><b>$CustomerDataInfo->fullname</b></th>
            <th style=" width:10mm;font-size:13;text-align:right;"><small>االسم:</small></th>
    </tr>
</table>

<table cellspacing="0" cellpadding="1" style="border-top:1px solid #000;border-left:1px solid #000;border-right:1px solid #000;line-height:85%;">
    <tr>
            <th style=" width:35mm;font-size:13;"><small>For official use only</small></th>
            <th style=" width:120mm;font-size:13;"><small> </small></th>
            <th style=" width:35mm;font-size:13;text-align:right;"><small>للاستعمال الرسمي فقط:</small></th>

    </tr>
</table>

<table cellspacing="0" cellpadding="1" style="border-left:1px solid #000;border-right:1px solid #000;line-height:90%;">
    <tr>
            <th style=" width:10mm;font-size:13;"><small>Date</small></th>
            <th style=" width:40mm;font-size:12;">هـ <b style="font-family:times;">$CustomerDataInfo->visa_date_arabic</b></th>
            <th style=" width:20mm;font-size:13;"><small>التأريخ:</small></th>

            <th style=" width:20mm;font-size:13;"><small>Authorization</small></th>
            <th style=" width:50mm;font-size:12;font-family:times;"><b>$CustomerDataInfo->visa_no</b></th>
            <th style=" width:50mm;font-size:13;text-align:right;"><small>رقم الامر المعتمد عليه اعطاء التأشيرة:</small>
            </th>
    </tr>
</table>

<table cellspacing="0" cellpadding="1" style="border-top:1px solid #000;border-left:1px solid #000;border-right:1px solid #000;">
    <tr>
            <th style=" width:35mm;font-size:13;"><small>Visit/Work for:</small></th>
            <th style=" width:110mm;font-size:12;text-align:center;"> <b>$CustomerDataInfo->kofil_name_ar</b></th>
            <th style=" width:45mm;text-align:right;font-size:13;"><small>لزيارة العمل لدي:</small></th>

    </tr>
</table>

<table cellspacing="0" cellpadding="1" style="border-top:1px solid #000;border-left:1px solid #000;border-right:1px solid #000;line-height:90%;">
    <tr>
            <th style=" width:20mm;font-size:13;"><small>Date:</small></th>
            <th style=" width:50mm;font-size:13;"><small></small></th>
            <th style=" width:25mm;font-size:13;"><small> وتاريخ: </small></th>
            <th style=" width:30mm;font-size:13;"><small>Visa No:</small></th>
            <th style=" width:45mm;"><small></small></th>
            <th style=" width:20mm;text-align:right;font-size:13;"><small>اشرله برقم: </small></th>

    </tr>
</table>

<table cellspacing="0" cellpadding="1" style="border-top:1px solid #000;border-left:1px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;line-height:90%;">
    <tr>
            <th style=" width:35mm;font-size:13;"><small>FEE COLLECTED:</small></th>
            <th style=" width:20mm;"><small></small></th>
            <th style=" width:25mm;font-size:13;font-size:11;"><small> المبلع المحصل: </small></th>
            <th style=" width:15mm;font-size:13;"><small>Type:</small></th>
            <th style=" width:25mm;"><small></small></th>
            <th style=" width:20mm;text-align:right;font-size:13;"><small>انوعها: </small></th>
            <th style=" width:15mm;font-size:13;"><small>Duration:</small></th>
            <th style=" width:20mm;"><small></small></th>
            <th style=" width:15mm;text-align:right;font-size:11;"><small>امدتها:</small></th>

    </tr>
</table>
<table cellspacing="0" cellpadding="1" style="line-height:100%;">
    <tr>
            <th style=" width:30mm;font-size:11;"><small> رئيس القسم القنصلي </small></th>
            <th style=" width:130mm;font-size:12;text-align:center;font-family:Times New Roman"><b>ID: $CustomerDataInfo->id_no</b></th>
            <th style=" width:30mm;text-align:right;font-size:13;"><small> مدقق البيانات </small></th>

    </tr>
    <tr>
            <th style=" width:60mm;font-size:11;font-family:times;"><b>Head of Consular section</b></th>
            <th style=" width:15mm;font-size:11;font-family:times;text-align:right;"><b>  </b></th>
            
            <th style=" width:55mm;font-size:15;font-family:times;text-align:center;"><b></b></th>
            
            <th style=" width:60mm;font-size:11;text-align:right;font-family:times;"><b>CHECKED BY:</b></th>

    </tr>
</table>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
<table>
    <tr>
            <th style=" width:190mm;font-size:11;text-align:justify;font-family:times;">
TO <br>
THE CHIEF OF CONSULATE SECTION <br>
ROYAL EMBASSAY OF SAUDI ARABIA<br>
DHAKA, BANGLADESH<br><br>

EXCELLENCY,<br><br>

WITH DUE RESPET WE ARE SUBMITTING ONE PASSPORT FOR WORK VISA WITH ALL NECESSARY DOCUMENTS AND PARTICULARS MENTIONED AS BELOW KNOWING ALL  INSTRUCTIONS AND REGULATIONS OF CONSULATE SECTION.


            </th>

    </tr>

    <br>
    <tr>
      <th style=" width:85mm;font-size:11;font-family:times;font-family:times;">1.&nbsp;&nbsp;&nbsp;&nbsp;NAME OF THE EMPLOYER IN <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SAUDI ARABIA</th>
      <th style=" width:5mm;font-size:11;text-align:left">:</th>
      <th style=" width:80mm;font-size:13;font-family:times;"><b>$CustomerDataInfo->Kofile_name_eng</b></th>

    </tr>
    <br>
    <br>
    <tr>
      <th style=" width:85mm;font-size:11;font-family:times;">2.&nbsp;&nbsp;&nbsp;&nbsp;VISA NO AND DATE</th>
      <th style=" width:3mm;font-size:11;text-align:left">:</th>
      <th style=" width:34mm;font-size:13;font-family:times;"><b>  $CustomerDataInfo->visa_no</b></th>
      <th style=" width:48mm;font-size:13;font-family:times;"><b>Date: $CustomerDataInfo->visa_date_arabic H</b></th>

    </tr>

    <br>
    <tr>
      <th style=" width:85mm;font-size:11;font-family:times;">3.&nbsp;&nbsp;&nbsp;&nbsp;FULL NAME OF THE EMPLOYEE</th>
      <th style=" width:5mm;font-size:11;text-align:left">:</th>
      <th style=" width:80mm;font-size:13;text-align:left;font-family:times;"><b>$CustomerDataInfo->fullname </b></th>

    </tr>

    <br>
    <tr>
      <th style=" width:85mm;font-size:11;font-family:times;">4.&nbsp;&nbsp;&nbsp;&nbsp;PASSPORT NO. AND ISSUE DATE</th>
      <th style=" width:5mm;font-size:11;text-align:left">:</th>
      <th style=" width:36mm;font-size:13;font-family:times;"><b>$CustomerDataInfo->passport_no</b></th>
      <th style=" width:44mm;font-size:13;font-family:times;"><b>Date: $CustomerDataInfo->D_of_passport_issue </b></th>
    </tr>

    <br>
    <tr>
      <th style=" width:85mm;font-size:11;font-family:times;">5.&nbsp;&nbsp;&nbsp;&nbsp; PROFESSION </th>
      <th style=" width:5mm;font-size:11;text-align:left">:</th>
      <th style=" width:80mm;font-size:13;font-family:times;"><b>$CustomerDataInfo->profession </b></th>

    </tr>
    <br>
    <tr>
      <th style=" width:85mm;font-size:11;font-family:times;">6.&nbsp;&nbsp;&nbsp;&nbsp;RELIGION</th>
      <th style=" width:5mm;font-size:11;text-align:left">:</th>
      <th style=" width:80mm;font-size:13;font-family:times;"><b>$CustomerDataInfo->religion</b></th>

    </tr>

    <br>
    <br>
    <tr>
      <th style=" width:190mm;font-size:11;text-align:justify;font-family:times;">I DO HEREBY CONFIRM AND DECLARE THAT RELIGION STATED IN THE VISA FORM AND FORWARDING LETER IS FULLY CORRECT. I ALSO UNDERTAKE THE RESPONSIBILITY TO CANCEL THE VISA AND TO STOP FUNCTIONING WITH OUR OFFICE IF THE STATEMENT IS FOUND INCORRECT. 
<br/>
<br/>
WE THEREFORE REQUEST YOUR EXCELLENCY TO KINDLY ISSUE WORK VISA OUT OF_________ VISAS AND OBLIGE THEREBY.


      </th>

    </tr>

    <br>
    <br>
    <tr>
      <th style=" width:190mm;font-size:11px;text-align:left;font-family:times;">

    <br>
    <br>
YOURS FAITHFULLY,

    <br>
    <br>
    <br>
<b style="font-size:13;font-family:times;"><center>FOR,</center><br>M/S SAFA MARWA INTERNATIONAL RL-1029</b>

      </th>

    </tr>
</table>

<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>

<table cellspacing="0" cellpadding="1" >
    <tr>
            <th style=" width:15mm;"></th>
            <th style=" width:80mm;font-size:13;font-family:times;"><b><u>EMPLOYMENT CONTACT</u></b></th>
            <th style=" width:95mm;font-size:11px; text-align:right;"><u ><b>عـــــــــقــد عـــــمـــــل  </b></u></th>

    </tr>
    <br/>
    <tr>
            <th style=" width:30mm;font-size:11;font-family:times;"><b>1<sup>st</sup>Party</b></th>
            <th style=" width:130mm;font-size:13;font-family:times;"><b>: &nbsp;&nbsp;&nbsp;$CustomerDataInfo->Kofile_name_eng </b></th>
            <th style=" width:30mm;font-size:11;text-align:right;">لطرف الاول  &nbsp;:</th>

    </tr>

    <tr>
            <th style=" width:30mm;font-size:11;font-family:times;"><b>2<sup>nd</sup>Party</b></th>
            <th style=" width:130mm;font-size:13;font-family:times;"><b>: &nbsp;&nbsp;&nbsp;$CustomerDataInfo->fullname </b></th>
            <th style=" width:30mm;font-size:11;text-align:right;">لطرف الثاني &nbsp;:</th>

    </tr>
    <tr>
            <th style=" width:30mm;font-size:11;font-family:times;"><b>Nationality</b></th>
            <th style=" width:130mm;font-size:13;font-family:times;"><b>: &nbsp;&nbsp;&nbsp;$CustomerDataInfo->pesent_nationality </b></th>
            <th style=" width:30mm;font-size:11;text-align:right;">الجـنـســـــيـة  &nbsp;:</th>

    </tr>
    <tr>
            <th style=" width:30mm;font-size:11;font-family:times;"><b>Passport No</b></th>
            <th style=" width:130mm;font-size:13;font-family:times;"><b>: &nbsp;&nbsp;&nbsp;$CustomerDataInfo->passport_no </b></th>
            <th style=" width:30mm;font-size:11;text-align:right;">رقــم الجــواز  &nbsp;&nbsp;:</th>

    </tr>
    <tr>
            <th style=" width:30mm;font-size:11;font-family:times;"><b>Profession</b></th>
            <th style=" width:130mm;font-size:13;font-family:times;"><b>: &nbsp;&nbsp;&nbsp;$CustomerDataInfo->profession</b></th>
            <th style=" width:30mm;font-size:11;text-align:right;">المــهــــنــــة  &nbsp;&nbsp;:</th>

    </tr>


</table>

<br/>
<br/>
<table cellspacing="0" cellpadding="1" >
    <br/>
    <br/>
    <tr>
            <th style=" width:10mm;font-size:11;font-family:times;"><b>1.</b></th>
            <th style=" width:82mm;font-size:11px;text-align:justify;font-family:times;">That the 1st party shall pay to the 2nd party a monthly salary of SR. 1000 /- plus overtime accordingly to Saudi Labor Law.
                
            </th>

            <th style=" width:6mm;font-size:11;"></th>
            <th style=" width:82mm;font-size:11;text-align:right;">
                
                إن الطرف الاول يدفع الطرف الثاني راتب شهري1000 ريال سعودي بالإضافة حست القانون العامل المملكة العربيــة السعوديــة  
                
            </th>

            <th style=" width:10mm;font-size:11;text-align:right;font-family:times;"><b>.1</b></th>

    </tr>

    <br/>
    <tr>
            <th style=" width:10mm;font-size:11;font-family:times;"><b>2.</b></th>
            <th style=" width:82mm;font-size:11px;text-align:justify;font-family:times;">That 1st party should provide 2nd partys free medical, free single accommodation and free food facilities during the period of contract in the Kingdom of Saudi Arabia

               
            </th>

            <th style=" width:6mm;font-size:11;"></th>
            <th style=" width:82mm;font-size:11;text-align:right;">
               يلتزم الطرف الامل الطلب السكن الطرف الثاني مجانا خلال مدة المملكــــة العربيــة السعوديـــة 
                
            </th>

            <th style=" width:10mm;font-size:11;text-align:right;font-family:times;"><b>.2</b></th>

    </tr>

    <br/>
    <tr>
            <th style=" width:10mm;font-size:11;font-family:times;"><b>3.</b></th>
            <th style=" width:82mm;font-size:11px;text-align:justify;font-family:times;">That the 1st party shall provide free transportation from resident to the work site 
                
            </th>

            <th style=" width:6mm;font-size:11;"></th>
            <th style=" width:82mm;font-size:11;text-align:right;">
                ييلتزم الطرف الاول النقل للطرف الثاني من السكن الي محل العمل مجانا 
                
            </th>

            <th style=" width:10mm;font-size:11;text-align:right;font-family:times;"><b>.3</b></th>

    </tr>

    <br/>
    <tr>
            <th style=" width:10mm;font-size:11;font-family:times;"><b>4.</b></th>
            <th style=" width:82mm;font-size:11px;text-align:justify;font-family:times;">He period of contract is of 2(two) years
                
            </th>

            <th style=" width:6mm;font-size:11;"></th>
            <th style=" width:82mm;font-size:11;text-align:right;">
               يان مدة العقد سنتان 
                
            </th>

            <th style=" width:10mm;font-size:11;text-align:right;font-family:times;"><b>.4</b></th>

    </tr>
    <br/>

    <tr>
            <th style=" width:10mm;font-size:11;font-family:times;"><b>5.</b></th>
            <th style=" width:82mm;font-size:11px;text-align:justify;font-family:times;">That the 1st party shall bear the passage cost from Dhaka to K.S.A and back to Dhaka for joining the service and the return ticket would provide after completion this agreement.
                
            </th>

            <th style=" width:6mm;font-size:11;"></th>
            <th style=" width:82mm;font-size:11;text-align:right;">
                يحيث الطرف الاول يدفع نصف قمة التذكرة خطوط الجوية للطرف الثاني من كتمندووالي المملكـــة المباشرة العمل وتنكريــــــة العودة الي كتمندو وبعد انتهاء مدة 
                
            </th>

            <th style=" width:10mm;font-size:11;text-align:right;font-family:times;"><b>.5</b></th>

    </tr>
    <br/>
    <tr>
            <th style=" width:10mm;font-size:11;font-family:times;"><b>6.</b></th>
            <th style=" width:82mm;font-size:11px;text-align:justify;font-family:times;">Daily working hours shall be 8 hours.
                
            </th>

            <th style=" width:6mm;font-size:11;"></th>
            <th style=" width:82mm;font-size:11;text-align:right;">
               ساعات العمل يكون (8) ساعات يوميا 
                
            </th>

            <th style=" width:10mm;font-size:11;text-align:right;font-family:times;"><b>.6</b></th>

    </tr>

    <br/>
    <tr>
            <th style=" width:10mm;font-size:11;font-family:times;"><b>7.</b></th>
            <th style=" width:82mm;font-size:11px;text-align:justify;font-family:times;">That this agreement shall come in effect from the date of arrival of the 2nd party in the Kingdom of Saudi Arabia.
            
            </th>

            <th style=" width:6mm;font-size:11;"></th>
            <th style=" width:82mm;font-size:11;text-align:right;">حيث ان هذا العقد يعتبر بعد وصول الطرف الثاني في المملكـــة العربيــــة السعوديــــة 
                
            </th>

            <th style=" width:10mm;font-size:11;text-align:right;font-family:times;"><b>.7</b></th>

    </tr>
    <br/>

    <tr>
            <th style=" width:10mm;font-size:10px;font-family:times;"><b>8.</b></th>
            <th style=" width:82mm;font-size:11px;text-align:justify;font-family:times;"> That the 2nd party should undertake to abide by the instruction and rules enforced in the Kingdom of Saudi Arabia.
            
            </th>

            <th style=" width:6mm;font-size:11;"></th>
            <th style=" width:82mm;font-size:11;text-align:right;">
              حيث ان الطرف الثاني ليجمع التعليمات والقرارتالساري المفعول في المملكــــــة العربيـــــة السعودـــــة 
            
            </th>

            <th style=" width:10mm;font-size:10px;text-align:right;font-family:times;"><b>.8</b></th>

    </tr>
    <br/>
    <tr>
            <th style=" width:10mm;font-size:11;"><b>9.</b></th>
            <th style=" width:82mm;font-size:11px;text-align:justify;font-family:times;">That the any other terms and conditions not mentioned in the demand letter shall be following as per Saudi Labor Laws.
            
            </th>

            <th style=" width:6mm;font-size:11;"></th>
            <th style=" width:82mm;font-size:11;text-align:right;">
                حيث ان اي شرط لم يذكر فثي ورقة الطلب يعمل حسب القانون العامل المملكــــــة العربيــــة السعوديــــة  
              
            </th>

            <th style=" width:10mm;font-size:11;text-align:right;font-family:times;"><b>.9</b></th>

    </tr>

    
</table>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>

<table cellspacing="0" cellpadding="1" >
    <tr>
            <th style=" width:15mm;"></th>
            <th style=" width:80mm;font-size:11; font-family:times;"><u>Signature of the First Party</u></th>
            <th style=" width:95mm;font-size:11; text-align:right;"><u>عتوقيع الطرف الاول</u></th>

    </tr>
<br/>
    <tr>
            <th style=" width:15mm;"></th>
            <th style=" width:80mm;font-size:11; font-family:times;"><u>Signature of the Second Party </u></th>
            <th style=" width:95mm;font-size:11; text-align:right;"><u> توقيع الطرف الثاني </u></th>

    </tr>
</table>


<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<table cellspacing="0" cellpadding="1" >
    <tr>
            <th style=" width:190mm;font-size:11;text-align:center;font-size:24px;"> 
ارفاق الجدول في كل معاملة
            </th>
    </tr>        
</table>

<br/>
<br/>
<br/>
<br/>
<table cellspacing="0" cellpadding="1" border="1" >
    <tr>
        <th style=" width:32mm;font-size:11;text-align:center;font-size:18px;"><b>
        الملاحظات
        <br> Remarks</b>
        </th>
        <th style=" width:43mm;font-size:11;text-align:center;font-size:18px;"><b>
المنفذ
        <br> Visa issued by</b>
        </th>
        <th style=" width:50mm;font-size:11;text-align:center;font-size:18px;"><b>
المكتب
        <br>Agency</b>
        </th>
        <th style=" width:65mm;font-size:11;text-align:center;font-size:18px;"><b>
الاجراء
        <br>Procedure</b>
        </th>
    </tr>  

    <tr>
        <th style=" width:32mm;font-size:11;text-align:center;"></th>
        <th style=" width:43mm;font-size:11;text-align:center;"></th>
        <th style=" width:50mm;font-size:11;text-align:center;font-size:14px;">
        $CustomerDataInfo->mofa_number
        </th>
        <th style=" width:65mm;font-size:11;text-align:right;font-size:16px;">
         <b>
         Mofa No  / رقم إنجاز  
         </b>
        </th>
    </tr>

    <tr>
        <th style=" width:32mm;font-size:11;text-align:center;"></th>
        <th style=" width:43mm;font-size:11;text-align:center;"></th>
        <th style=" width:50mm;font-size:11;text-align:center;font-size:14px;">
         $CustomerDataInfo->visa_no
        </th>
        <th style=" width:65mm;font-size:11;text-align:right;font-size:16px;">
         <b>
         Visa No / رقم المعتند  
         </b>
        </th>
    </tr>
    <tr>
        <th style=" width:32mm;font-size:11;text-align:center;"></th>
        <th style=" width:43mm;font-size:11;text-align:center;"></th>
        <th style=" width:50mm;font-size:11;text-align:center;font-size:14px;">
         $CustomerDataInfo->fullname
        </th>
        <th style=" width:65mm;font-size:11;text-align:right;font-size:13px;">
         <b>
         Passport Name / الاسم في الجواز 
         </b>
        </th>
    </tr>
    <tr>
        <th style=" width:32mm;font-size:11;text-align:center;"></th>
        <th style=" width:43mm;font-size:11;text-align:center;"></th>
        <th style=" width:50mm;font-size:11;text-align:center;font-size:17px;">
         $CustomerDataInfo->passport_no
        </th>
        <th style=" width:65mm;font-size:11;text-align:right;font-size:16px;">
         <b>
         Passport No / رقم الجواز  
         </b>
        </th>
    </tr>
    <tr>
        <th style=" width:32mm;font-size:11;text-align:center;"></th>
        <th style=" width:43mm;font-size:11;text-align:center;"></th>
        <th style=" width:50mm;font-size:11;text-align:center;font-size:17px;">
         $CustomerDataInfo->D_passport_expiry
        </th>
        <th style=" width:65mm;font-size:11;text-align:right;font-size:12px;">
         <b>
          Passport Validity / صلاحية الجواز  
         </b>
        </th>
    </tr>
    <tr>
        <th style=" width:32mm;font-size:11;text-align:center;"></th>
        <th style=" width:43mm;font-size:11;text-align:center;"></th>
        <th style=" width:50mm;font-size:11;text-align:center;font-size:17px;">
        $years
        </th>
        <th style=" width:65mm;font-size:11;text-align:right;font-size:16px;">
         <b>
          Age / العمر   
         </b>
        </th>
    </tr>
    <tr>
        <th style=" width:32mm;font-size:11;text-align:center;"></th>
        <th style=" width:43mm;font-size:11;text-align:center;"></th>
        <th style=" width:50mm;font-size:11;text-align:center;font-size:17px;">
         $CustomerDataInfo->gender
        </th>
        <th style=" width:65mm;font-size:11;text-align:right;font-size:16px;">
         <b>
          Sex / الجنس   
         </b>
        </th>
    </tr>
    <tr>
        <th style=" width:32mm;font-size:11;text-align:center;"></th>
        <th style=" width:43mm;font-size:11;text-align:center;"></th>
        <th style=" width:50mm;font-size:11;text-align:center;font-size:14px;">
       $CustomerDataInfo->musaneed
        </th>
        <th style=" width:65mm;font-size:11;text-align:right;font-size:16px;">
         <b>
          Musaneed / مساند   
         </b>
        </th>
    </tr>
    <tr>
        <th style=" width:32mm;font-size:11;text-align:center;"></th>
        <th style=" width:43mm;font-size:11;text-align:center;"></th>
        <th style=" width:50mm;font-size:11;text-align:center;font-size:14px;">
        Attached
        </th>
        <th style=" width:65mm;font-size:11;text-align:right;font-size:16px;">
         <b>
          Wakalah / الوكالة  
         </b>
        </th>
    </tr>
    <tr>
        <th style=" width:32mm;font-size:11;text-align:center;"></th>
        <th style=" width:43mm;font-size:11;text-align:center;"></th>
        <th style=" width:50mm;font-size:11;text-align:center;font-size:14px;">
        Attached
        </th>
        <th style=" width:65mm;font-size:11;text-align:right;font-size:18px;">
         <b>
         Medical / قحص طبي 
         </b>
        </th>
    </tr>
    <tr>
        <th style=" width:32mm;font-size:11;text-align:center;"></th>
        <th style=" width:43mm;font-size:11;text-align:center;"></th>
        <th style=" width:50mm;font-size:11;text-align:center;font-size:14px;">
        Attached
        </th>
        <th style=" width:65mm;font-size:11;text-align:right;font-size:12px;">
         <b>
        Police Clearanee  / ورقة الشرطة 
         </b>
        </th>
    </tr>
    <tr>
        <th style=" width:32mm;font-size:11;text-align:center;"></th>
        <th style=" width:43mm;font-size:11;text-align:center;"></th>
        <th style=" width:50mm;font-size:11;text-align:center;font-size:14px;">
        Attached
        </th>
        <th style=" width:65mm;font-size:11;text-align:right;font-size:18px;">
         <b>
          License / الرخصة   
         </b>
        </th>
    </tr>

    <tr>
        <th style=" width:32mm;font-size:11;text-align:center;"></th>
        <th style=" width:43mm;font-size:11;text-align:center;"></th>
        <th style=" width:50mm;font-size:11;text-align:center;font-size:14px;">
      $CustomerDataInfo->profession_arabic
        </th>
        <th style=" width:65mm;font-size:11;text-align:right;font-size:18px;">
         <b>
         Profession / المهنة   
         </b>
        </th>
    </tr>

    <tr>
        <th style=" width:32mm;font-size:11;text-align:center;"></th>
        <th style=" width:43mm;font-size:11;text-align:center;"></th>
        <th style=" width:50mm;font-size:11;text-align:center;font-size:14px;">
        N/A
        </th>
        <th style=" width:65mm;font-size:11;text-align:right;font-size:14px;">
         <b>
        المؤهل وشهادة الخيرة  <br>Certificate & Experience /
         </b>
        </th>
    </tr>

    <tr>
        <th style=" width:32mm;font-size:11;text-align:center;"></th>
        <th style=" width:43mm;font-size:11;text-align:center;"></th>
        <th style=" width:50mm;font-size:11;text-align:center;font-size:14px;">
        N/A
        </th>
        <th style=" width:65mm;font-size:11;text-align:right;font-size:18px;">
         <b>
         Finger / البصمة   
         </b>
        </th>
    </tr>


</table>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<table>
<tr>
        <th style=" width:30mm;font-size:11;text-align:left;font-family:times;font-size:14px;"><b>Office Name: </b></th>
        <th style=" width:80mm;font-size:11;text-align:left;font-family:times;font-size:16px;"><b>M/S. Safa Marwa International</b></th>
        <th style=" width:55mm;font-size:11;text-align:right;font-size:17px;"><b>
صفا مروة انترناشيونال
       </b> </th>
        <th style=" width:30mm;font-size:11;text-align:center;font-size:14px;"><b>
        إسم المكتب:
        </b></th>
    </tr>

<br/>
  <tr>
    <th style=" width:20mm;font-size:11;text-align:left;font-family:times;font-size:14px;"><b>License :</b></th>
    <th style=" width:25mm;font-size:11;text-align:left;font-family:times;font-size:16px;"><b>RL- 1029 </b></th>
        <th style=" width:115mm;font-size:11;text-align:left;font-family:times;font-size:14px;border-bottom:1px dotted #000;"></th>
        <th style=" width:30mm;font-size:11;text-align:right;font-size:16px;"><b>رقم الر خصة :</b></th>
    </tr>
<br/>
  <tr>
    <th style=" width:30mm;font-size:11;text-align:left;font-family:times;font-size:14px;"><b>Signature :</b></th>
        <th style=" width:160mm;font-size:11;text-align:left;font-family:times;font-size:14px;border-bottom:1px dotted #000;"></th>
    </tr>

<br/>
  <tr>
    <th style=" width:20mm;font-size:11;text-align:left;font-family:times;font-size:14px;"><b>Seal :</b></th>
        <th style=" width:170mm;font-size:11;text-align:left;font-family:times;font-size:14px;border-bottom:1px dotted #000;"></th>
    </tr>

</table>



EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');

//$pdf->Image('1', 100, 100, 10 , 0, 'png', '', '', false, 300, '', false, false, 0, 'LB', false, false);

//$pdf->writeHTMLCell(0,140,10,30,'<P>Photo<P>'); //HEADER..



//$pdf->writeHTMLCell(190,0,11,40,'<b>From : '.$fromdate.'</b>',0,0); 
//$pdf->writeHTMLCell(190,0,11,45,'<b>To &nbsp; &nbsp; : '.$todate.'</b>',0,0); 

//$pdf->writeHTMLCell(190,0,11,00,$tbl,0,0); 
//$pdf->writeHTMLCell(190,0,10,225,'<P>FOOTER OF VOUCHAR<P>',1,1); //FOOTER..

//$pdf->Image('1.png',10,261,74,15);

//output / result..
$pdf->Output(); 
