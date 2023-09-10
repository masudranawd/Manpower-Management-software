<?php 
    $i=0; $totalb = 0; 	$totals =0;
	foreach($EmbassyFileList as $EmbassyFile){
	    $i++;
	}
	if($i <=35 ){
	    
	    
//include tcpdf/library 
//include 'tcpdf/tcpdf.php'; 

//make TCPDF Object
$pdf = new TCPDF('p','mm','A4'); 
$pdf->SetFont('aefurat', '', 22, '', true);

//remove default header & footer. 
$pdf->setPrintHeader(false); 
$pdf->setPrintFooter(false); 

//add page
$pdf->AddPage(); 

$var = '<table border="1" style="text-align:center; font-size:13px;">';
$var .= '<tr style="line-height:20px;" >
			<th style=" width:30mm;text-align:center;font-size:11px;">المهـنة
			<br><b>Profession</b></th>
			<th style=" width:14mm;text-align:center;font-size:11px;">التـاريخ<br><b>Year</b></th>
			<th style=" width:26mm;text-align:center;font-size:11px;"> رقـم التـأشـيـرة <br><b>Visa Number</b></th>
			<th style=" width:86mm;text-align:center;font-size:11px;"> اسـم الكـفـيـل  <br><b>Sponsor Name</b></th>
			<th style=" width:26mm;text-align:center;font-size:11px;">  رقـم الجـواز <br><b>Passport No.</b></th>
			<th style=" width:8mm;text-align:center;font-size:11px;"> ت <br><b>sl</b></th>
		</tr>'; //TABLE HEAD



$i=0; $totalb = 0; 	$totals =0;
	foreach($EmbassyFileList as $EmbassyFile){

			$ReportData = $EmbassyFile->customer_id;
			$EmbassyFileCData = $this->Customer_model->CustomerDataByID($ReportData);
		$i++; 
		$i = $i;
			if($i <=35 ){
		//$totals = $totals+$saleData->sale_price;
    
		$var .= '<tr>
			<td style="font-size:12px;">'.$EmbassyFileCData->profession_arabic.'</td>
			<td style="font-size:12px;">'. date(' Y', strtotime($EmbassyFileCData->visa_date_arabic))
			.'</td>
			<td style="font-size:12px;">'.$EmbassyFileCData->visa_no.'</td>
			<td style="font-size:12px;">'.$EmbassyFileCData->kofil_name_ar.'</td>
			<td style="font-size:12px;">'.$EmbassyFileCData->passport_no.'</td>
			<td style="font-size:12px;">'.$i.'</td>
		</tr>';

}
}
	$var .= '<tr style="line-height:20px;" >
			<th style=" width:95mm;text-align:center;font-size:13px;">الختم  </th>
			<th style=" width:95mm;text-align:right;font-size:14px;"><b> '.$i.' :</b> المستلم</th>
		</tr>'; //TABLE HEAD
		
	$var .= '<tr style="line-height:20px;" >
			<th style=" width:95mm;text-align:center;font-size:13px;"><b> :</b>المدقق   </th>
			<th style=" width:95mm;text-align:center;font-size:13px;"><b> :</b> التعبة </th>
		</tr>'; //TABLE HEAD
		
	$var .= '<tr style="line-height:22px;" >
			<th style=" width:95mm;text-align:center;font-size:13px;"><b> :</b>التسجيل   </th>
			<th style=" width:95mm;text-align:center;font-size:13px;"><b> :</b> المسنول </th>
		</tr>'; //TABLE HEAD
		

$var .= '</table>';





$pdf->writeHTMLCell(190,0,12,20,'<small style="font-size:14px;">&nbsp;&nbsp;&nbsp;1029 :</small><br>'.'<b  style="font-size:16px;">التاريخ   :      '.$arabic_date.'</b>',0,0); 
$pdf->writeHTMLCell(190,0,10,20,'<b style="text-align:right;font-size:18px;">صفا مروة انتراناشيونال</b> <small style="font-size:16px;"> اسم مقدم الجوازات </small>'.'<br>'.'<small style="text-align:right;font-size:16px;">   '.'     الــتـــوقـيـــع       :'.' &nbsp; &nbsp;</small>',0,0); 

$pdf->writeHTMLCell(190,20,7,10,'<b style="font-size:18px;text-align:center;">بيـان بالجـوازات المقدمـة</b>',0,0); 

$pdf->writeHTMLCell(190,0,12,40,$var,0,0); 

$pdf->Output(); 
	}else{
	   
//include tcpdf/library 
//include 'tcpdf/tcpdf.php'; 

//make TCPDF Object
$pdf = new TCPDF('p','mm','A4'); 
$pdf->SetFont('aefurat', '', 22, '', true);

//remove default header & footer. 
$pdf->setPrintHeader(false); 
$pdf->setPrintFooter(false); 

//add page
$pdf->AddPage(); 

$var = '<table border="1" style="text-align:center; font-size:13px;">';
$var .= '<tr style="line-height:20px;" >
			<th style=" width:30mm;text-align:center;font-size:11px;">المهـنة
			<br><b>Profession</b></th>
			<th style=" width:14mm;text-align:center;font-size:11px;">التـاريخ<br><b>Year</b></th>
			<th style=" width:26mm;text-align:center;font-size:11px;"> رقـم التـأشـيـرة <br><b>Visa Number</b></th>
			<th style=" width:86mm;text-align:center;font-size:11px;"> اسـم الكـفـيـل  <br><b>Sponsor Name</b></th>
			<th style=" width:26mm;text-align:center;font-size:11px;">  رقـم الجـواز <br><b>Passport No.</b></th>
			<th style=" width:8mm;text-align:center;font-size:11px;"> ت <br><b>sl</b></th>
		</tr>'; //TABLE HEAD



$i=0; $totalb = 0; 	$totals =0;
	foreach($EmbassyFileList as $EmbassyFile){

			$ReportData = $EmbassyFile->customer_id;
			$EmbassyFileCData = $this->Customer_model->CustomerDataByID($ReportData);
		$i++; 
		$i = $i;
		if($i <=35 ){
		//$totals = $totals+$saleData->sale_price;

		$var .= '<tr style="line-height:17px;" >
			<td style="font-size:12px;">'.$EmbassyFileCData->profession_arabic.'</td>
			<td style="font-size:12px;">'. date(' Y', strtotime($EmbassyFileCData->visa_date_arabic))
			.'</td>
			<td style="font-size:12px;">'.$EmbassyFileCData->visa_no.'</td>
			<td style="font-size:12px;">'.$EmbassyFileCData->kofil_name_ar.'</td>
			<td style="font-size:12px;">'.$EmbassyFileCData->passport_no.'</td>
			<td style="font-size:12px;">'.$i.'</td>
		</tr>';

}
}
	$var .= '<tr style="line-height:20px;" >
			<th style=" width:95mm;text-align:center;font-size:13px;">الختم  </th>
			<th style=" width:95mm;text-align:right;font-size:14px;"><b> '.$i.' :</b> المستلم</th>
		</tr>'; //TABLE HEAD
		
	$var .= '<tr style="line-height:20px;" >
			<th style=" width:95mm;text-align:center;font-size:13px;"><b> :</b>المدقق   </th>
			<th style=" width:95mm;text-align:center;font-size:13px;"><b> :</b> التعبة </th>
		</tr>'; //TABLE HEAD
		
	$var .= '<tr style="line-height:22px;" >
			<th style=" width:95mm;text-align:center;font-size:13px;"><b> :</b>التسجيل   </th>
			<th style=" width:95mm;text-align:center;font-size:13px;"><b> :</b> المسنول </th>
		</tr>'; //TABLE HEAD
		

$var .= '</table>';





$pdf->writeHTMLCell(190,0,12,20,'<small style="font-size:14px;">&nbsp;&nbsp;&nbsp;1029 :</small><br>'.'<b  style="font-size:16px;">التاريخ   :      '.$arabic_date.'</b>',0,0); 
$pdf->writeHTMLCell(190,0,10,20,'<b style="text-align:right;font-size:18px;">صفا مروة انتراناشيونال</b> <small style="font-size:16px;"> اسم مقدم الجوازات </small>'.'<br>'.'<small style="text-align:right;font-size:16px;">   '.'     الــتـــوقـيـــع       :'.' &nbsp; &nbsp;</small>',0,0); 

$pdf->writeHTMLCell(190,20,7,10,'<b style="font-size:18px;text-align:center;">بيـان بالجـوازات المقدمـة</b>',0,0); 

$pdf->writeHTMLCell(190,0,12,40,$var,0,0); 
 

//second 




//add page
$pdf->AddPage(); 

$var = '<table border="1" style="text-align:center; font-size:13px;">';
$var .= '<tr style="line-height:20px;" >
			<th style=" width:30mm;text-align:center;font-size:11px;">المهـنة
			<br><b>Profession</b></th>
			<th style=" width:14mm;text-align:center;font-size:11px;">التـاريخ<br><b>Year</b></th>
			<th style=" width:26mm;text-align:center;font-size:11px;"> رقـم التـأشـيـرة <br><b>Visa Number</b></th>
			<th style=" width:86mm;text-align:center;font-size:11px;"> اسـم الكـفـيـل  <br><b>Sponsor Name</b></th>
			<th style=" width:26mm;text-align:center;font-size:11px;">  رقـم الجـواز <br><b>Passport No.</b></th>
			<th style=" width:8mm;text-align:center;font-size:11px;"> ت <br><b>sl</b></th>
		</tr>'; //TABLE HEAD



$i=0; $totalb = 0; 	$totals =0;
	foreach($EmbassyFileList as $EmbassyFile){

			$ReportData = $EmbassyFile->customer_id;
			$EmbassyFileCData = $this->Customer_model->CustomerDataByID($ReportData);
		$i++; 
		$i = $i;
		if($i >=35 ){
		//$totals = $totals+$saleData->sale_price;

		$var .= '<tr style="line-height:17px;" >
			<td style="font-size:12px;">'.$EmbassyFileCData->profession_arabic.'</td>
			<td style="font-size:12px;">'. date(' Y', strtotime($EmbassyFileCData->visa_date_arabic))
			.'</td>
			<td style="font-size:12px;">'.$EmbassyFileCData->visa_no.'</td>
			<td style="font-size:12px;">'.$EmbassyFileCData->kofil_name_ar.'</td>
			<td style="font-size:12px;">'.$EmbassyFileCData->passport_no.'</td>
			<td style="font-size:12px;">'.$i.'</td>
		</tr>';

}
}
	$var .= '<tr style="line-height:20px;" >
			<th style=" width:95mm;text-align:center;font-size:13px;">الختم  </th>
			<th style=" width:95mm;text-align:right;font-size:14px;"><b> '.$i.' :</b> المستلم</th>
		</tr>'; //TABLE HEAD
		
	$var .= '<tr style="line-height:20px;" >
			<th style=" width:95mm;text-align:center;font-size:13px;"><b> :</b>المدقق   </th>
			<th style=" width:95mm;text-align:center;font-size:13px;"><b> :</b> التعبة </th>
		</tr>'; //TABLE HEAD
		
	$var .= '<tr style="line-height:22px;" >
			<th style=" width:95mm;text-align:center;font-size:13px;"><b> :</b>التسجيل   </th>
			<th style=" width:95mm;text-align:center;font-size:13px;"><b> :</b> المسنول </th>
		</tr>'; //TABLE HEAD
		

$var .= '</table>';





$pdf->writeHTMLCell(190,0,12,20,'<small style="font-size:14px;">&nbsp;&nbsp;&nbsp;1029 :</small><br>'.'<b  style="font-size:16px;">التاريخ   :      '.$arabic_date.'</b>',0,0); 
$pdf->writeHTMLCell(190,0,10,20,'<b style="text-align:right;font-size:18px;">صفا مروة انتراناشيونال</b> <small style="font-size:16px;"> اسم مقدم الجوازات </small>'.'<br>'.'<small style="text-align:right;font-size:16px;">   '.'     الــتـــوقـيـــع       :'.' &nbsp; &nbsp;</small>',0,0); 

$pdf->writeHTMLCell(190,20,7,10,'<b style="font-size:18px;text-align:center;">بيـان بالجـوازات المقدمـة</b>',0,0); 

$pdf->writeHTMLCell(190,0,12,40,$var,0,0); 

$pdf->Output();  
	    
	}

?>
