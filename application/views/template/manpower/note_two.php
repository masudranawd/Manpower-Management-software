<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>Asset/style.css">
	<style type="text/css">
	*{margin:0px auto;}
		@media print{ @page { margin:0px; size: legal; }
		.pageBreak {
		   page-break-after: always;
		}
		}

		ul li{display: inline;padding:20px;background:black;margin-left: 4px;}
		ul li a{color: #fff;font-weight: 800;text-decoration: none;}
	</style>
</head>
<body>
<ul>
	<li><a href="<?php echo base_url('Dashboard/ManPowerSheetPrint/');?><?php echo $manpower_sl;?>">Note One</a></li>

	<li><a href="<?php echo base_url('Dashboard/ManPowerSheetPrinttwo/');?><?php echo $manpower_sl;?>">Note Two</a></li>
	<li><a href="<?php echo base_url('Dashboard/ManPowerSheetPrintthree/');?><?php echo $manpower_sl;?>">Note Three</a></li>
</ul>
<br>
<br>
<br>
<br>

<div class="profile-userbuttons" style="width:100%;">
    <div style="width:20%;color:#fff;text-align:center;float:left;">
		<a class="btn"  onclick="printDiv('printMe')" style="display:block;padding:10px;background:green;">Print</a>
	</div>

</div><br><br>
<?php
 $total = 0; 
	foreach ($AllManpowerCustomerList as $ManpowerCustomer) {             
	$manpower_sl = $ManpowerCustomer->manpower_sl;
    $total = $this->Setting_model->CountSlAll($manpower_sl);
}
?>



	<div class="" style="width:100%;" id="printMe" >
	    <div style="width:80%;margin:0px auto;margin-top: 60px;">
	    <!-- start --->
<?php if($total<=5){
?><!-- less then five-->
	<!--- part four start ----->
	<div class="part_four" style="margin-top: 400px;">
	  <div class="page_sl" style="text-align: center;">
	    <strong> একক বর্হিগমন ছাড়পত্রের আবেদন ফরম </strong><br>
	  </div>
	  <div class="part_four_table">
	  	<table style="width: 100%;border: 0px">
	  		<th style="text-align: left;border: none;">নিয়োগকারী দেশের নাম  :  সৌদি আরব	<br>                                                                                                                                                             
জমাদানকারী রিক্রুটিং এজেন্সি নাম  : হোপ-২১ লমিটিডে- লাইসেন্স নম্বর :  ১২১৫</th>
	  		<th style="border:none;">
	  			তারিখ :- <?php echo $MPData->date;?> ইং     
	  		</th>

	  		<th style="border: none;">ক্লিয়ারেন্স নংঃ </th>
	  	</table>
	  </div>
	  <!--- start --->
	  	<div class="table_section_four">
	    	<table>
	    			<tr>
	    				<th style="width: 15mm;">ক্র.নং</th>
	    				<th style="width: 120mm;">বিদেশগামী কর্মীর নাম </th>
	    				<th style="width: 50mm;">পাসর্পোট নাম্বার</th>
	    				<th style="width: 40mm;">ভিসা নং </th>
	    				<th style="width: 165mm;">নিয়োগকর্তার নাম</th>
	    				<th style="width: 15mm;">ভিসা সংখ্যা</th>
	    				<th style="width: 20mm;">পদের নাম </th>
	    				<th style="width: 20mm;"> বেতন</th>
	    				<th style="width: 20mm;">উৎস আয়কর</th>
	    				<th style="width: 20mm;">কল্যান ফি  ও বীমা</th>
	    				<th style="width: 20mm;">মন্তব্য</th>
	    			</tr>

	    			<tr>
	    				<td style="text-align: center;">০১</td>
	    				<td style="text-align: center;">০২</td>
	    				<td style="text-align: center;">০৩</td>
	    				<td style="text-align: center;">০৪</td>
	    				<td style="text-align: center;">০৫</td>
	    				<td style="text-align: center;">০৬</td>
	    				<td style="text-align: center;">০৭</td>
	    				<td style="text-align: center;">০৮</td>
	    				<td style="text-align: center;">০৯</td>
	    				<td style="text-align: center;">১০</td>
	    				<td style="text-align: center;">১১</td>
	    			</tr>

<?php
$i = 0;  
   foreach ($AllManpowerCustomerList as $ManpowerCustomer) {
  $i++; 
  if ($i<=11) {
 $CustomerInfo = $this->Accounts_model->Customer_info_for_invoice($ManpowerCustomer->customer_id);
 		
?>
	    			<tr>
	    				<td><?php echo $i;?></td>
	    				<td><?php echo $CustomerInfo->fullname;?></td>
	    				<td><?php echo $CustomerInfo->passport_no;?></td>
	    				<td><?php echo $CustomerInfo->visa_no;?></td>
	    				<td><?php echo $CustomerInfo->Kofile_name_eng;?></td>
	    				<td>০১</td>
	    				<td style="text-align: left;"><?php echo $CustomerInfo->profession;?></td>
	    				<td style="text-align: center;">১০০০</td>
	    				<td style="text-align: center;">৫০০</td>
	    				<td style="text-align: center;">৩৯৯০</td>
	    				<td style="text-align: center;"></td>
	    			</tr>
<?php } } ?>
	    	</table>

	    	<!--- start --->
	    	<div class="Exit_data">
		    	<table>
		    		<tr>
			    		<td>এজেন্সী অংগীকারঃ পে অডার টাকাঃ  <b style="font-size: 18px;"><?php echo $total * 3990;?></b></td>
			    		<td>নং</td>
			    		<td>আয়কর টাকাঃ <b style="font-size: 18px;"><?php echo $total * 500;?></b></td>
			    		<td>নং</td>
			    		<td>তারিখঃ <?php echo $MPData->date;?></td>
		    		</tr>
		    	</table>
	    		<table>
	    			<td style="width: 100%;">বর্ণিত কর্মী গ্রপ ভিসার অšর্তভূক্ত নয় । কর্মীদের পাসপোর্ট, ভিসা, চাকুরীর চুক্তি পত্রের বর্ণিত বেতন ও শর্তাদি সঠিক আছে । উক্ত বিষয়ে ক্রটির কারনে কর্মীদের কোন প্রকার সমস্যা হইলে আমার হোপ-২১ লমিটিডে-, আর এল নং ১২১৫ স¤পূর্ন দায় দায়িত্ব গ্রহন ও কর্মীদের ক্ষতিপূরন দান করিতে বাধ্য থাকিব |</td>
	    	</table>
	    	<!-- end -->
			<table>
	    		<tr>
	    			<td>পরীক্ষিত হয়েছে কাগজপত্র  <br> সঠিক আছে </td>
	    			<td>বর্ণিত তথ্যাদি যথাযথ আছে </td>
	    			<td>বহির্গমনের ছাড়পত্র দেওয়া যায়  </td>
	    			<td>বহির্গমনের ছাড়পত্র দেওয়া যায়  </td>
	    			<td></td>
	    		</tr>
	    	</table>
	    	<br>
	    	<table>
	    		<tr>
	    			<td>সহকারীর স্বাক্ষর </td>
	    			<td>সহকারী পরিচালকের স্বাক্ষর  </td>
	    			<td>উপ-পরিচালকের স্বাক্ষর   </td>
	    			<td>পরিচালকের স্বাক্ষর </td>
	    			<td>এজেন্সীর মালিক/প্রতিনিধির <br>
              স্বাক্ষর প্রস্তাবমত</td>
	    		</tr>
	    	</table>
	    	<!-- end -->
	    </div>
	</div><!--- end --->
</div><!--end part -four--->
<?php }elseif($total<=7){
?>

	<!--- part four start ----->
<div class="part_four" style="margin-top: 350px;">
	  <div class="page_sl" style="text-align: center;">
	    <strong> একক বর্হিগমন ছাড়পত্রের আবেদন ফরম </strong><br>
	  </div>
	  <div class="part_four_table">
	  	<table style="width: 100%;border: 0px">
	  		<th style="text-align: left;border: none;">নিয়োগকারী দেশের নাম  :  সৌদি আরব	<br>                                                                                                                                                             
জমাদানকারী রিক্রুটিং এজেন্সি নাম  : হোপ-২১ লমিটিডে- লাইসেন্স নম্বর :  ১২১৫</th>
	  		<th style="border:none;">
	  			তারিখ :- <?php echo $MPData->date;?>  ইং     
	  		</th>

	  		<th style="border: none;">ক্লিয়ারেন্স নংঃ </th>
	  	</table>
	  </div>
	  <!--- start --->
	  	<div class="table_section_four">
	    	<table>
	    			<tr>
	    				<th style="width: 15mm;">ক্র.নং</th>
	    				<th style="width: 120mm;">বিদেশগামী কর্মীর নাম </th>
	    				<th style="width: 50mm;">পাসর্পোট নাম্বার</th>
	    				<th style="width: 40mm;">ভিসা নং </th>
	    				<th style="width: 165mm;">নিয়োগকর্তার নাম</th>
	    				<th style="width: 15mm;">ভিসা সংখ্যা</th>
	    				<th style="width: 20mm;">পদের নাম </th>
	    				<th style="width: 20mm;"> বেতন</th>
	    				<th style="width: 20mm;">উৎস আয়কর</th>
	    				<th style="width: 20mm;">কল্যান ফি  ও বীমা</th>
	    				<th style="width: 20mm;">মন্তব্য</th>
	    			</tr>

	    			<tr>
	    				<td style="text-align: center;">০১</td>
	    				<td style="text-align: center;">০২</td>
	    				<td style="text-align: center;">০৩</td>
	    				<td style="text-align: center;">০৪</td>
	    				<td style="text-align: center;">০৫</td>
	    				<td style="text-align: center;">০৬</td>
	    				<td style="text-align: center;">০৭</td>
	    				<td style="text-align: center;">০৮</td>
	    				<td style="text-align: center;">০৯</td>
	    				<td style="text-align: center;">১০</td>
	    				<td style="text-align: center;">১১</td>
	    			</tr>

<?php
$i = 0; 
   foreach ($AllManpowerCustomerList as $ManpowerCustomer) {
  $i++; 
  if ($i<=11) {
 $CustomerInfo = $this->Accounts_model->Customer_info_for_invoice($ManpowerCustomer->customer_id);
?>
	    			<tr>
	    				<td><?php echo $i;?></td>
	    				<td><?php echo $CustomerInfo->fullname;?></td>
	    				<td><?php echo $CustomerInfo->passport_no;?></td>
	    				<td><?php echo $CustomerInfo->visa_no;?></td>
	    				<td><?php echo $CustomerInfo->Kofile_name_eng;?></td>
	    				<td>০১</td>
	    				<td style="text-align: left;"><?php echo $CustomerInfo->profession;?></td>
	    				<td style="text-align: center;">১০০০</td>
	    				<td style="text-align: center;">৫০০</td>
	    				<td style="text-align: center;">৩৯৯০</td>
	    				<td style="text-align: center;"></td>
	    			</tr>
<?php } } ?>
	    	</table>

	    	<!--- start --->
	    	<div class="Exit_data">
		    	<table>
		    		<tr>
			    		<td>এজেন্সী অংগীকারঃ পে অডার টাকাঃ  <?php echo $total * 3990;?></td>
			    		<td>নং</td>
			    		<td>আয়কর টাকাঃ <?php echo $total * 500;?></td>
			    		<td>নং</td>
			    		<td>তারিখঃ <?php echo $MPData->date;?></td>
		    		</tr>
		    	</table>
	    		<table>
	    			<td style="width: 100%;">বর্ণিত কর্মী গ্রপ ভিসার অšর্তভূক্ত নয় । কর্মীদের পাসপোর্ট, ভিসা, চাকুরীর চুক্তি পত্রের বর্ণিত বেতন ও শর্তাদি সঠিক আছে । উক্ত বিষয়ে ক্রটির কারনে কর্মীদের কোন প্রকার সমস্যা হইলে আমার হোপ-২১ লমিটিডে-, আর এল নং ১২১৫ স¤পূর্ন দায় দায়িত্ব গ্রহন ও কর্মীদের ক্ষতিপূরন দান করিতে বাধ্য থাকিব |</td>
	    	</table>
	    	<!-- end -->
			<table>
	    		<tr>
	    			<td>পরীক্ষিত হয়েছে কাগজপত্র  <br> সঠিক আছে </td>
	    			<td>বর্ণিত তথ্যাদি যথাযথ আছে </td>
	    			<td>বহির্গমনের ছাড়পত্র দেওয়া যায়  </td>
	    			<td>বহির্গমনের ছাড়পত্র দেওয়া যায়  </td>
	    			<td></td>
	    		</tr>
	    	</table>
	    	<br>
	    	<table>
	    		<tr>
	    			<td>সহকারীর স্বাক্ষর </td>
	    			<td>সহকারী পরিচালকের স্বাক্ষর  </td>
	    			<td>উপ-পরিচালকের স্বাক্ষর   </td>
	    			<td>পরিচালকের স্বাক্ষর </td>
	    			<td>এজেন্সীর মালিক/প্রতিনিধির <br>
              স্বাক্ষর প্রস্তাবমত</td>
	    		</tr>
	    	</table>
	    	<!-- end -->
	    </div>
	</div><!--- end --->
</div><!--end part -four--->
<?php }elseif($total<=11){
?>

	<!--- part four start ----->
<div class="part_four" style="margin-top: 320px;">
	  <div class="page_sl" style="text-align: center;">
	    <strong> একক বর্হিগমন ছাড়পত্রের আবেদন ফরম </strong><br>
	  </div>
	  <div class="part_four_table">
	  	<table style="width: 100%;border: 0px">
	  		<th style="text-align: left;border: none;">নিয়োগকারী দেশের নাম  :  সৌদি আরব	<br>                                                                                                                                                             
জমাদানকারী রিক্রুটিং এজেন্সি নাম  : হোপ-২১ লমিটিডে- লাইসেন্স নম্বর :  ১২১৫</th>
	  		<th style="border:none;">
	  			তারিখ :- <?php echo $MPData->date;?>  ইং     
	  		</th>

	  		<th style="border: none;">ক্লিয়ারেন্স নংঃ </th>
	  	</table>
	  </div>
	  <!--- start --->
	  	<div class="table_section_four">
	    	<table>
	    			<tr>
	    				<th style="width: 15mm;">ক্র.নং</th>
	    				<th style="width: 120mm;">বিদেশগামী কর্মীর নাম </th>
	    				<th style="width: 50mm;">পাসর্পোট নাম্বার</th>
	    				<th style="width: 40mm;">ভিসা নং </th>
	    				<th style="width: 165mm;">নিয়োগকর্তার নাম</th>
	    				<th style="width: 15mm;">ভিসা সংখ্যা</th>
	    				<th style="width: 20mm;">পদের নাম </th>
	    				<th style="width: 20mm;"> বেতন</th>
	    				<th style="width: 20mm;">উৎস আয়কর</th>
	    				<th style="width: 20mm;">কল্যান ফি  ও বীমা</th>
	    				<th style="width: 20mm;">মন্তব্য</th>
	    			</tr>

	    			<tr>
	    				<td style="text-align: center;">০১</td>
	    				<td style="text-align: center;">০২</td>
	    				<td style="text-align: center;">০৩</td>
	    				<td style="text-align: center;">০৪</td>
	    				<td style="text-align: center;">০৫</td>
	    				<td style="text-align: center;">০৬</td>
	    				<td style="text-align: center;">০৭</td>
	    				<td style="text-align: center;">০৮</td>
	    				<td style="text-align: center;">০৯</td>
	    				<td style="text-align: center;">১০</td>
	    				<td style="text-align: center;">১১</td>
	    			</tr>

<?php
$i = 0;  
   foreach ($AllManpowerCustomerList as $ManpowerCustomer) {
  $i++; 
  if ($i<=11) {
 $CustomerInfo = $this->Accounts_model->Customer_info_for_invoice($ManpowerCustomer->customer_id);
?>
	    			<tr>
	    				<td><?php echo $i;?></td>
	    				<td><?php echo $CustomerInfo->fullname;?></td>
	    				<td><?php echo $CustomerInfo->passport_no;?></td>
	    				<td><?php echo $CustomerInfo->visa_no;?></td>
	    				<td><?php echo $CustomerInfo->Kofile_name_eng;?></td>
	    				<td>০১</td>
	    				<td style="text-align: left;"><?php echo $CustomerInfo->profession;?></td>
	    				<td style="text-align: center;">১০০০</td>
	    				<td style="text-align: center;">৫০০</td>
	    				<td style="text-align: center;">৩৯৯০</td>
	    				<td style="text-align: center;"></td>
	    			</tr>
<?php } } ?>
	    	</table>

	    	<!--- start --->
	    	<div class="Exit_data">
		    	<table>
		    		<tr>
			    		<td>এজেন্সী অংগীকারঃ পে অডার টাকাঃ  <?php echo $total * 3990;?></td>
			    		<td>নং</td>
			    		<td>আয়কর টাকাঃ <?php echo $total * 500;?></td>
			    		<td>নং</td>
			    		<td>তারিখঃ <?php echo $MPData->date;?></td>
		    		</tr>
		    	</table>
	    		<table>
	    			<td style="width: 100%;">বর্ণিত কর্মী গ্রপ ভিসার অšর্তভূক্ত নয় । কর্মীদের পাসপোর্ট, ভিসা, চাকুরীর চুক্তি পত্রের বর্ণিত বেতন ও শর্তাদি সঠিক আছে । উক্ত বিষয়ে ক্রটির কারনে কর্মীদের কোন প্রকার সমস্যা হইলে আমার হোপ-২১ লমিটিডে-, আর এল নং ১২১৫ স¤পূর্ন দায় দায়িত্ব গ্রহন ও কর্মীদের ক্ষতিপূরন দান করিতে বাধ্য থাকিব |</td>
	    	</table>
	    	<!-- end -->
			<table>
	    		<tr>
	    			<td>পরীক্ষিত হয়েছে কাগজপত্র  <br> সঠিক আছে </td>
	    			<td>বর্ণিত তথ্যাদি যথাযথ আছে </td>
	    			<td>বহির্গমনের ছাড়পত্র দেওয়া যায়  </td>
	    			<td>বহির্গমনের ছাড়পত্র দেওয়া যায়  </td>
	    			<td></td>
	    		</tr>
	    	</table>
	    	<br>
	    	<table>
	    		<tr>
	    			<td>সহকারীর স্বাক্ষর </td>
	    			<td>সহকারী পরিচালকের স্বাক্ষর  </td>
	    			<td>উপ-পরিচালকের স্বাক্ষর   </td>
	    			<td>পরিচালকের স্বাক্ষর </td>
	    			<td>এজেন্সীর মালিক/প্রতিনিধির <br>
              স্বাক্ষর প্রস্তাবমত</td>
	    		</tr>
	    	</table>
	    	<!-- end -->
	    </div>
	</div><!--- end --->
</div><!--end part -four--->
<?php }elseif($total<=20){
?>

	<?php 
		$sl = 0;
		$pl = 0;
   		foreach ($AllManpowerCustomerList as $ManpowerCustomer){
   		$sl ++;
   		$pl++;
   	if ($sl<=1) {
   ?><!--end--->
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
	<!--- part four start ----->
	<div class="part_four">
	  <div class="page_sl" style="text-align: center;">
	    <strong> একক বর্হিগমন ছাড়পত্রের আবেদন ফরম </strong><br>
	  </div>
	  <div class="part_four_table">
	  	<table style="width: 100%;border: 0px">
	  		<th style="text-align: left;border: none;">নিয়োগকারী দেশের নাম  :  সৌদি আরব	<br>                                                                                                                                                             
জমাদানকারী রিক্রুটিং এজেন্সি নাম  : হোপ-২১ লমিটিডে- লাইসেন্স নম্বর :  ১২১৫</th>
	  		<th style="border:none;">
	  			তারিখ :-<?php echo $MPData->date;?>  ইং     
	  		</th>

	  		<th style="border: none;">ক্লিয়ারেন্স নংঃ </th>
	  	</table>
	  </div>
	  <!--- start --->
	  	<div class="table_section_four">
	    	<table>
	    			<tr>
	    				<th style="width: 15mm;">ক্র.নং</th>
	    				<th style="width: 120mm;">বিদেশগামী কর্মীর নাম </th>
	    				<th style="width: 50mm;">পাসর্পোট নাম্বার</th>
	    				<th style="width: 40mm;">ভিসা নং </th>
	    				<th style="width: 165mm;">নিয়োগকর্তার নাম</th>
	    				<th style="width: 15mm;">ভিসা সংখ্যা</th>
	    				<th style="width: 20mm;">পদের নাম </th>
	    				<th style="width: 20mm;"> বেতন</th>
	    				<th style="width: 20mm;">উৎস আয়কর</th>
	    				<th style="width: 20mm;">কল্যান ফি  ও বীমা</th>
	    				<th style="width: 20mm;">মন্তব্য</th>
	    			</tr>

	    			<tr>
	    				<td style="text-align: center;">০১</td>
	    				<td style="text-align: center;">০২</td>
	    				<td style="text-align: center;">০৩</td>
	    				<td style="text-align: center;">০৪</td>
	    				<td style="text-align: center;">০৫</td>
	    				<td style="text-align: center;">০৬</td>
	    				<td style="text-align: center;">০৭</td>
	    				<td style="text-align: center;">০৮</td>
	    				<td style="text-align: center;">০৯</td>
	    				<td style="text-align: center;">১০</td>
	    				<td style="text-align: center;">১১</td>
	    			</tr>

<?php
$i = 0;  
   foreach ($AllManpowerCustomerList as $ManpowerCustomer) {
  $i++; 
  if ($i<=11) {
 $CustomerInfo = $this->Accounts_model->Customer_info_for_invoice($ManpowerCustomer->customer_id);
?>
	    			<tr>
	    				<td><?php echo $i;?></td>
	    				<td><?php echo $CustomerInfo->fullname;?></td>
	    				<td><?php echo $CustomerInfo->passport_no;?></td>
	    				<td><?php echo $CustomerInfo->visa_no;?></td>
	    				<td><?php echo $CustomerInfo->Kofile_name_eng;?></td>
	    				<td>০১</td>
	    				<td style="text-align: left;"><?php echo $CustomerInfo->profession;?></td>
	    				<td style="text-align: center;">১০০০</td>
	    				<td style="text-align: center;">৫০০</td>
	    				<td style="text-align: center;">৩৯৯০</td>
	    				<td style="text-align: center;"></td>
	    			</tr>
<?php } } ?>
	    	</table>

	    	<!--- start --->
	    	<div class="Exit_data">
		    	<table>
		    		<tr>
			    		<td>এজেন্সী অংগীকারঃ পে অডার টাকাঃ  <?php echo $total * 39990;?></td>
			    		<td>নং</td>
			    		<td>আয়কর টাকাঃ <?php echo $total * 500;?></td>
			    		<td>নং</td>
			    		<td>তারিখঃ <?php echo $MPData->date;?></td>
		    		</tr>
		    	</table>
	    		<table>
	    			<td style="width: 100%;">বর্ণিত কর্মী গ্রপ ভিসার অšর্তভূক্ত নয় । কর্মীদের পাসপোর্ট, ভিসা, চাকুরীর চুক্তি পত্রের বর্ণিত বেতন ও শর্তাদি সঠিক আছে । উক্ত বিষয়ে ক্রটির কারনে কর্মীদের কোন প্রকার সমস্যা হইলে আমার হোপ-২১ লমিটিডে-, আর এল নং ১২১৫ স¤পূর্ন দায় দায়িত্ব গ্রহন ও কর্মীদের ক্ষতিপূরন দান করিতে বাধ্য থাকিব |</td>
	    	</table>
	    	<!-- end -->
			<table>
	    		<tr>
	    			<td>পরীক্ষিত হয়েছে কাগজপত্র  <br> সঠিক আছে </td>
	    			<td>বর্ণিত তথ্যাদি যথাযথ আছে </td>
	    			<td>বহির্গমনের ছাড়পত্র দেওয়া যায়  </td>
	    			<td>বহির্গমনের ছাড়পত্র দেওয়া যায়  </td>
	    			<td></td>
	    		</tr>
	    	</table>
	    	<br>
	    	<table>
	    		<tr>
	    			<td>সহকারীর স্বাক্ষর </td>
	    			<td>সহকারী পরিচালকের স্বাক্ষর  </td>
	    			<td>উপ-পরিচালকের স্বাক্ষর   </td>
	    			<td>পরিচালকের স্বাক্ষর </td>
	    			<td>এজেন্সীর মালিক/প্রতিনিধির <br>
              স্বাক্ষর প্রস্তাবমত</td>
	    		</tr>
	    	</table>
	    	<!-- end -->
	    </div>
	</div><!--- end --->
</div><!--end part -four--->

	<?php //end 1 page
	   }elseif(($sl<=2)){
	?>


<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
	<!--- part four start ----->
	<div class="part_four" style="margin-top: 270px;">
	  <div class="page_sl" style="text-align: center;">
	    <strong> একক বর্হিগমন ছাড়পত্রের আবেদন ফরম </strong><br>
	  </div>
	  <div class="part_four_table">
	  	<table style="width: 100%;border: 0px">
	  		<th style="text-align: left;border: none;">নিয়োগকারী দেশের নাম  :  সৌদি আরব	<br>                                                                                                                                                             
জমাদানকারী রিক্রুটিং এজেন্সি নাম  : হোপ-২১ লমিটিডে- লাইসেন্স নম্বর :  ১২১৫</th>
	  		<th style="border:none;">
	  			তারিখ :- <?php echo $MPData->date;?>  ইং     
	  		</th>

	  		<th style="border: none;">ক্লিয়ারেন্স নংঃ </th>
	  	</table>
	  </div>
	  <!--- start --->
	  	<div class="table_section_four">
	    	<table>
	    			<tr>
	    				<th style="width: 15mm;">ক্র.নং</th>
	    				<th style="width: 120mm;">বিদেশগামী কর্মীর নাম </th>
	    				<th style="width: 50mm;">পাসর্পোট নাম্বার</th>
	    				<th style="width: 40mm;">ভিসা নং </th>
	    				<th style="width: 165mm;">নিয়োগকর্তার নাম</th>
	    				<th style="width: 15mm;">ভিসা সংখ্যা</th>
	    				<th style="width: 20mm;">পদের নাম </th>
	    				<th style="width: 20mm;"> বেতন</th>
	    				<th style="width: 20mm;">উৎস আয়কর</th>
	    				<th style="width: 20mm;">কল্যান ফি  ও বীমা</th>
	    				<th style="width: 20mm;">মন্তব্য</th>
	    			</tr>

	    			<tr>
	    				<td style="text-align: center;">০১</td>
	    				<td style="text-align: center;">০২</td>
	    				<td style="text-align: center;">০৩</td>
	    				<td style="text-align: center;">০৪</td>
	    				<td style="text-align: center;">০৫</td>
	    				<td style="text-align: center;">০৬</td>
	    				<td style="text-align: center;">০৭</td>
	    				<td style="text-align: center;">০৮</td>
	    				<td style="text-align: center;">০৯</td>
	    				<td style="text-align: center;">১০</td>
	    				<td style="text-align: center;">১১</td>
	    			</tr>

<?php
$i = 0;
$si = 0; 
   foreach ($AllManpowerCustomerList as $ManpowerCustomer) {
  $i++; 
  if ($i>=12) {
 $CustomerInfo = $this->Accounts_model->Customer_info_for_invoice($ManpowerCustomer->customer_id);
 	$si++;
?>
<?php 
	if($si<=11){
	?>
	    			<tr>
	    				<td><?php echo $si;?></td>
	    				<td><?php echo $CustomerInfo->fullname;?></td>
	    				<td><?php echo $CustomerInfo->passport_no;?></td>
	    				<td><?php echo $CustomerInfo->visa_no;?></td>
	    				<td><?php echo $CustomerInfo->Kofile_name_eng;?></td>
	    				<td>০১</td>
	    				<td style="text-align: left;"><?php echo $CustomerInfo->profession;?></td>
	    				<td style="text-align: center;">১০০০</td>
	    				<td style="text-align: center;">৫০০</td>
	    				<td style="text-align: center;">৩৯৯০</td>
	    				<td style="text-align: center;"></td>
	    			</tr>
	    <?php  } ?>
<?php } } ?>
	    	</table>

	    	<!--- start --->
	    	<div class="Exit_data">
		    	<table>
		    		<tr>
			    		<td>এজেন্সী অংগীকারঃ পে অডার টাকাঃ  <?php echo $total * 39990;?></td>
			    		<td>নং</td>
			    		<td>আয়কর টাকাঃ <?php echo $total * 500;?></td>
			    		<td>নং</td>
			    		<td>তারিখঃ <?php echo $MPData->date;?></td>
		    		</tr>
		    	</table>
	    		<table>
	    			<td style="width: 100%;">বর্ণিত কর্মী গ্রপ ভিসার অšর্তভূক্ত নয় । কর্মীদের পাসপোর্ট, ভিসা, চাকুরীর চুক্তি পত্রের বর্ণিত বেতন ও শর্তাদি সঠিক আছে । উক্ত বিষয়ে ক্রটির কারনে কর্মীদের কোন প্রকার সমস্যা হইলে আমার হোপ-২১ লমিটিডে-, আর এল নং ১২১৫ স¤পূর্ন দায় দায়িত্ব গ্রহন ও কর্মীদের ক্ষতিপূরন দান করিতে বাধ্য থাকিব |</td>
	    	</table>
	    	<!-- end -->
			<table>
	    		<tr>
	    			<td>পরীক্ষিত হয়েছে কাগজপত্র  <br> সঠিক আছে </td>
	    			<td>বর্ণিত তথ্যাদি যথাযথ আছে </td>
	    			<td>বহির্গমনের ছাড়পত্র দেওয়া যায়  </td>
	    			<td>বহির্গমনের ছাড়পত্র দেওয়া যায়  </td>
	    			<td></td>
	    		</tr>
	    	</table>
	    	<br>
	    	<table>
	    		<tr>
	    			<td>সহকারীর স্বাক্ষর </td>
	    			<td>সহকারী পরিচালকের স্বাক্ষর  </td>
	    			<td>উপ-পরিচালকের স্বাক্ষর   </td>
	    			<td>পরিচালকের স্বাক্ষর </td>
	    			<td>এজেন্সীর মালিক/প্রতিনিধির <br>
              স্বাক্ষর প্রস্তাবমত</td>
	    		</tr>
	    	</table>
	    	<!-- end -->
	    </div>
	</div><!--- end --->
</div><!--end part -four--->
	
<?php } } ?> <!--end if 2page-->
<?php }elseif($total<=33){
?>

	<?php 
		$sl = 0;
		$pl = 0;
   		foreach ($AllManpowerCustomerList as $ManpowerCustomer){
   		$sl ++;
   		$pl++;
   	if ($sl<=1) {
   ?><!--end--->
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
	<!--- part four start ----->
	<div class="part_four">
	  <div class="page_sl" style="text-align: center;">
	    <strong> একক বর্হিগমন ছাড়পত্রের আবেদন ফরম </strong><br>
	  </div>
	  <div class="part_four_table">
	  	<table style="width: 100%;border: 0px">
	  		<th style="text-align: left;border: none;">নিয়োগকারী দেশের নাম  :  সৌদি আরব	<br>                                                                                                                                                             
জমাদানকারী রিক্রুটিং এজেন্সি নাম  : হোপ-২১ লমিটিডে- লাইসেন্স নম্বর :  ১২১৫</th>
	  		<th style="border:none;">
	  			তারিখ :- <?php echo $MPData->date;?>  ইং     
	  		</th>

	  		<th style="border: none;">ক্লিয়ারেন্স নংঃ </th>
	  	</table>
	  </div>
	  <!--- start --->
	  	<div class="table_section_four">
	    	<table>
	    			<tr>
	    				<th style="width: 15mm;">ক্র.নং</th>
	    				<th style="width: 120mm;">বিদেশগামী কর্মীর নাম </th>
	    				<th style="width: 50mm;">পাসর্পোট নাম্বার</th>
	    				<th style="width: 40mm;">ভিসা নং </th>
	    				<th style="width: 165mm;">নিয়োগকর্তার নাম</th>
	    				<th style="width: 15mm;">ভিসা সংখ্যা</th>
	    				<th style="width: 20mm;">পদের নাম </th>
	    				<th style="width: 20mm;"> বেতন</th>
	    				<th style="width: 20mm;">উৎস আয়কর</th>
	    				<th style="width: 20mm;">কল্যান ফি  ও বীমা</th>
	    				<th style="width: 20mm;">মন্তব্য</th>
	    			</tr>

	    			<tr>
	    				<td style="text-align: center;">০১</td>
	    				<td style="text-align: center;">০২</td>
	    				<td style="text-align: center;">০৩</td>
	    				<td style="text-align: center;">০৪</td>
	    				<td style="text-align: center;">০৫</td>
	    				<td style="text-align: center;">০৬</td>
	    				<td style="text-align: center;">০৭</td>
	    				<td style="text-align: center;">০৮</td>
	    				<td style="text-align: center;">০৯</td>
	    				<td style="text-align: center;">১০</td>
	    				<td style="text-align: center;">১১</td>
	    			</tr>

<?php
$i = 0; $total = 0; 
   foreach ($AllManpowerCustomerList as $ManpowerCustomer) {
  $i++; 
  if ($i<=11) {
 $CustomerInfo = $this->Accounts_model->Customer_info_for_invoice($ManpowerCustomer->customer_id);
 		$total =(int)$total + (int)$ManpowerCustomer->status;
?>
	    			<tr>
	    				<td><?php echo $i;?></td>
	    				<td><?php echo $CustomerInfo->fullname;?></td>
	    				<td><?php echo $CustomerInfo->passport_no;?></td>
	    				<td><?php echo $CustomerInfo->visa_no;?></td>
	    				<td><?php echo $CustomerInfo->Kofile_name_eng;?></td>
	    				<td>০১</td>
	    				<td style="text-align: left;"><?php echo $CustomerInfo->profession;?></td>
	    				<td style="text-align: center;">১০০০</td>
	    				<td style="text-align: center;">৫০০</td>
	    				<td style="text-align: center;">৩৯৯০</td>
	    				<td style="text-align: center;"></td>
	    			</tr>
<?php } } ?>
	    	</table>

	    	<!--- start --->
	    	<div class="Exit_data">
		    	<table>
		    		<tr>
			    		<td>এজেন্সী অংগীকারঃ পে অডার টাকাঃ  <?php echo $total * 39990;?></td>
			    		<td>নং</td>
			    		<td>আয়কর টাকাঃ <?php echo $total * 500;?></td>
			    		<td>নং</td>
			    		<td>তারিখঃ <?php echo $MPData->date;?></td>
		    		</tr> 
		    	</table>
	    		<table>
	    			<td style="width: 100%;">বর্ণিত কর্মী গ্রপ ভিসার অšর্তভূক্ত নয় । কর্মীদের পাসপোর্ট, ভিসা, চাকুরীর চুক্তি পত্রের বর্ণিত বেতন ও শর্তাদি সঠিক আছে । উক্ত বিষয়ে ক্রটির কারনে কর্মীদের কোন প্রকার সমস্যা হইলে আমার হোপ-২১ লমিটিডে-, আর এল নং ১২১৫ স¤পূর্ন দায় দায়িত্ব গ্রহন ও কর্মীদের ক্ষতিপূরন দান করিতে বাধ্য থাকিব |</td>
	    	</table>
	    	<!-- end -->
			<table>
	    		<tr>
	    			<td>পরীক্ষিত হয়েছে কাগজপত্র  <br> সঠিক আছে </td>
	    			<td>বর্ণিত তথ্যাদি যথাযথ আছে </td>
	    			<td>বহির্গমনের ছাড়পত্র দেওয়া যায়  </td>
	    			<td>বহির্গমনের ছাড়পত্র দেওয়া যায়  </td>
	    			<td></td>
	    		</tr>
	    	</table>
	    	<br>
	    	<table>
	    		<tr>
	    			<td>সহকারীর স্বাক্ষর </td>
	    			<td>সহকারী পরিচালকের স্বাক্ষর  </td>
	    			<td>উপ-পরিচালকের স্বাক্ষর   </td>
	    			<td>পরিচালকের স্বাক্ষর </td>
	    			<td>এজেন্সীর মালিক/প্রতিনিধির <br>
              স্বাক্ষর প্রস্তাবমত</td>
	    		</tr>
	    	</table>
	    	<!-- end -->
	    </div>
	</div><!--- end --->
</div><!--end part -four--->

	<?php //end 1 page
	   }elseif(($sl<=2)){
	?>


<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
	<!--- part four start ----->
	<div class="part_four" style="margin-top: 270px;">
	  <div class="page_sl" style="text-align: center;">
	    <strong> একক বর্হিগমন ছাড়পত্রের আবেদন ফরম </strong><br>
	  </div>
	  <div class="part_four_table">
	  	<table style="width: 100%;border: 0px">
	  		<th style="text-align: left;border: none;">নিয়োগকারী দেশের নাম  :  সৌদি আরব	<br>                                                                                                                                                             
জমাদানকারী রিক্রুটিং এজেন্সি নাম  : হোপ-২১ লমিটিডে- লাইসেন্স নম্বর :  ১২১৫</th>
	  		<th style="border:none;">
	  			তারিখ :- <?php echo $MPData->date;?>  ইং     
	  		</th>

	  		<th style="border: none;">ক্লিয়ারেন্স নংঃ </th>
	  	</table>
	  </div>
	  <!--- start --->
	  	<div class="table_section_four">
	    	<table>
	    			<tr>
	    				<th style="width: 15mm;">ক্র.নং</th>
	    				<th style="width: 120mm;">বিদেশগামী কর্মীর নাম </th>
	    				<th style="width: 50mm;">পাসর্পোট নাম্বার</th>
	    				<th style="width: 40mm;">ভিসা নং </th>
	    				<th style="width: 165mm;">নিয়োগকর্তার নাম</th>
	    				<th style="width: 15mm;">ভিসা সংখ্যা</th>
	    				<th style="width: 20mm;">পদের নাম </th>
	    				<th style="width: 20mm;"> বেতন</th>
	    				<th style="width: 20mm;">উৎস আয়কর</th>
	    				<th style="width: 20mm;">কল্যান ফি  ও বীমা</th>
	    				<th style="width: 20mm;">মন্তব্য</th>
	    			</tr>

	    			<tr>
	    				<td style="text-align: center;">০১</td>
	    				<td style="text-align: center;">০২</td>
	    				<td style="text-align: center;">০৩</td>
	    				<td style="text-align: center;">০৪</td>
	    				<td style="text-align: center;">০৫</td>
	    				<td style="text-align: center;">০৬</td>
	    				<td style="text-align: center;">০৭</td>
	    				<td style="text-align: center;">০৮</td>
	    				<td style="text-align: center;">০৯</td>
	    				<td style="text-align: center;">১০</td>
	    				<td style="text-align: center;">১১</td>
	    			</tr>

<?php
$i = 0;
$si = 0; 
   foreach ($AllManpowerCustomerList as $ManpowerCustomer) {
  $i++; 
  if ($i>=12) {
 $CustomerInfo = $this->Accounts_model->Customer_info_for_invoice($ManpowerCustomer->customer_id);
 	$si++;
?>
<?php 
	if($si<=11){
	?>
	    			<tr>
	    				<td><?php echo $si;?></td>
	    				<td><?php echo $CustomerInfo->fullname;?></td>
	    				<td><?php echo $CustomerInfo->passport_no;?></td>
	    				<td><?php echo $CustomerInfo->visa_no;?></td>
	    				<td><?php echo $CustomerInfo->Kofile_name_eng;?></td>
	    				<td>০১</td>
	    				<td style="text-align: left;"><?php echo $CustomerInfo->profession;?></td>
	    				<td style="text-align: center;">১০০০</td>
	    				<td style="text-align: center;">৫০০</td>
	    				<td style="text-align: center;">৩৯৯০</td>
	    				<td style="text-align: center;"></td>
	    			</tr>
	    <?php  } ?>
<?php } } ?>
	    	</table>

	    	<!--- start --->
	    	<div class="Exit_data">
		    	<table>
		    		<tr>
			    		<td>এজেন্সী অংগীকারঃ পে অডার টাকাঃ  <?php echo $total * 39990;?></td>
			    		<td>নং</td>
			    		<td>আয়কর টাকাঃ <?php echo $total * 500;?></td>
			    		<td>নং</td>
			    		<td>তারিখঃ <?php echo $MPData->date;?></td>
		    		</tr>
		    	</table>
	    		<table>
	    			<td style="width: 100%;">বর্ণিত কর্মী গ্রপ ভিসার অšর্তভূক্ত নয় । কর্মীদের পাসপোর্ট, ভিসা, চাকুরীর চুক্তি পত্রের বর্ণিত বেতন ও শর্তাদি সঠিক আছে । উক্ত বিষয়ে ক্রটির কারনে কর্মীদের কোন প্রকার সমস্যা হইলে আমার হোপ-২১ লমিটিডে-, আর এল নং ১২১৫ স¤পূর্ন দায় দায়িত্ব গ্রহন ও কর্মীদের ক্ষতিপূরন দান করিতে বাধ্য থাকিব |</td>
	    	</table>
	    	<!-- end -->
			<table>
	    		<tr>
	    			<td>পরীক্ষিত হয়েছে কাগজপত্র  <br> সঠিক আছে </td>
	    			<td>বর্ণিত তথ্যাদি যথাযথ আছে </td>
	    			<td>বহির্গমনের ছাড়পত্র দেওয়া যায়  </td>
	    			<td>বহির্গমনের ছাড়পত্র দেওয়া যায়  </td>
	    			<td></td>
	    		</tr>
	    	</table>
	    	<br>
	    	<table>
	    		<tr>
	    			<td>সহকারীর স্বাক্ষর </td>
	    			<td>সহকারী পরিচালকের স্বাক্ষর  </td>
	    			<td>উপ-পরিচালকের স্বাক্ষর   </td>
	    			<td>পরিচালকের স্বাক্ষর </td>
	    			<td>এজেন্সীর মালিক/প্রতিনিধির <br>
              স্বাক্ষর প্রস্তাবমত</td>
	    		</tr>
	    	</table>
	    	<!-- end -->
	    </div>
	</div><!--- end --->
</div><!--end part -four--->
	<?php //end 3 page
	   }elseif(($sl<=3)){
	?>


<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
	<!--- part four start ----->
	<div class="part_four" style="margin-top: 280px;">
	  <div class="page_sl" style="text-align: center;">
	    <strong> একক বর্হিগমন ছাড়পত্রের আবেদন ফরম </strong><br>
	  </div>
	  <div class="part_four_table">
	  	<table style="width: 100%;border: 0px">
	  		<th style="text-align: left;border: none;">নিয়োগকারী দেশের নাম  :  সৌদি আরব	<br>                                                                                                                                                             
জমাদানকারী রিক্রুটিং এজেন্সি নাম  : হোপ-২১ লমিটিডে- লাইসেন্স নম্বর :  ১২১৫</th>
	  		<th style="border:none;">
	  			তারিখ :- <?php echo $MPData->date;?>  ইং     
	  		</th>

	  		<th style="border: none;">ক্লিয়ারেন্স নংঃ </th>
	  	</table>
	  </div>
	  <!--- start --->
	  	<div class="table_section_four">
	    	<table>
	    			<tr>
	    				<th style="width: 15mm;">ক্র.নং</th>
	    				<th style="width: 120mm;">বিদেশগামী কর্মীর নাম </th>
	    				<th style="width: 50mm;">পাসর্পোট নাম্বার</th>
	    				<th style="width: 40mm;">ভিসা নং </th>
	    				<th style="width: 165mm;">নিয়োগকর্তার নাম</th>
	    				<th style="width: 15mm;">ভিসা সংখ্যা</th>
	    				<th style="width: 20mm;">পদের নাম </th>
	    				<th style="width: 20mm;"> বেতন</th>
	    				<th style="width: 20mm;">উৎস আয়কর</th>
	    				<th style="width: 20mm;">কল্যান ফি  ও বীমা</th>
	    				<th style="width: 20mm;">মন্তব্য</th>
	    			</tr>

	    			<tr>
	    				<td style="text-align: center;">০১</td>
	    				<td style="text-align: center;">০২</td>
	    				<td style="text-align: center;">০৩</td>
	    				<td style="text-align: center;">০৪</td>
	    				<td style="text-align: center;">০৫</td>
	    				<td style="text-align: center;">০৬</td>
	    				<td style="text-align: center;">০৭</td>
	    				<td style="text-align: center;">০৮</td>
	    				<td style="text-align: center;">০৯</td>
	    				<td style="text-align: center;">১০</td>
	    				<td style="text-align: center;">১১1</td>
	    			</tr>


<?php
$i = 0;
$si = 0;
   foreach ($AllManpowerCustomerList as $ManpowerCustomer) {
  $i++; 
  if ($i>=23) {
 $CustomerInfo = $this->Accounts_model->Customer_info_for_invoice($ManpowerCustomer->customer_id);
 	$si++;
?>
<?php 
	if($si<=11){
	?>
	    			<tr>
	    				<td><?php echo $si;?></td>
	    				<td><?php echo $CustomerInfo->fullname;?></td>
	    				<td><?php echo $CustomerInfo->passport_no;?></td>
	    				<td><?php echo $CustomerInfo->visa_no;?></td>
	    				<td><?php echo $CustomerInfo->Kofile_name_eng;?></td>
	    				<td>০১</td>
	    				<td style="text-align: left;"><?php echo $CustomerInfo->profession;?></td>
	    				<td style="text-align: center;">১০০০</td>
	    				<td style="text-align: center;">৫০০</td>
	    				<td style="text-align: center;">৩৯৯০</td>
	    				<td style="text-align: center;"></td>
	    			</tr>
	    <?php  } ?>
<?php } } ?>
	    	</table>

	    	<!--- start --->
	    	<div class="Exit_data">
		    	<table>
		    		<tr>
			    		<td>এজেন্সী অংগীকারঃ পে অডার টাকাঃ  <?php echo $total * 39990;?></td>
			    		<td>নং</td>
			    		<td>আয়কর টাকাঃ <?php echo $total * 500;?></td>
			    		<td>নং</td>
			    		<td>তারিখঃ <?php echo $MPData->date;?></td>
		    		</tr>
		    	</table>
	    		<table>
	    			<td style="width: 100%;">বর্ণিত কর্মী গ্রপ ভিসার অšর্তভূক্ত নয় । কর্মীদের পাসপোর্ট, ভিসা, চাকুরীর চুক্তি পত্রের বর্ণিত বেতন ও শর্তাদি সঠিক আছে । উক্ত বিষয়ে ক্রটির কারনে কর্মীদের কোন প্রকার সমস্যা হইলে আমার হোপ-২১ লমিটিডে-, আর এল নং ১২১৫ স¤পূর্ন দায় দায়িত্ব গ্রহন ও কর্মীদের ক্ষতিপূরন দান করিতে বাধ্য থাকিব |</td>
	    	</table>
	    	<!-- end -->
			<table>
	    		<tr>
	    			<td>পরীক্ষিত হয়েছে কাগজপত্র  <br> সঠিক আছে </td>
	    			<td>বর্ণিত তথ্যাদি যথাযথ আছে </td>
	    			<td>বহির্গমনের ছাড়পত্র দেওয়া যায়  </td>
	    			<td>বহির্গমনের ছাড়পত্র দেওয়া যায়  </td>
	    			<td></td>
	    		</tr>
	    	</table>
	    	<br>
	    	<table>
	    		<tr>
	    			<td>সহকারীর স্বাক্ষর </td>
	    			<td>সহকারী পরিচালকের স্বাক্ষর  </td>
	    			<td>উপ-পরিচালকের স্বাক্ষর   </td>
	    			<td>পরিচালকের স্বাক্ষর </td>
	    			<td>এজেন্সীর মালিক/প্রতিনিধির <br>
              স্বাক্ষর প্রস্তাবমত</td>
	    		</tr>
	    	</table>
	    	<!-- end -->
	    </div>
	</div><!--- end --->
</div><!--end part -four--->

<?php } } ?> <!--end if 2page-->

<?php }elseif($total<=11){
?>

	<?php 
		$sl = 0;
		$pl = 0;
   		foreach ($AllManpowerCustomerList as $ManpowerCustomer){
   		$sl ++;
   		$pl++;
   	if ($sl<=1) {
   ?><!--end--->
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
	<!--- part four start ----->
	<div class="part_four">
	  <div class="page_sl" style="text-align: center;">
	    <strong> একক বর্হিগমন ছাড়পত্রের আবেদন ফরম </strong><br>
	  </div>
	  <div class="part_four_table">
	  	<table style="width: 100%;border: 0px">
	  		<th style="text-align: left;border: none;">নিয়োগকারী দেশের নাম  :  সৌদি আরব	<br>                                                                                                                                                             
জমাদানকারী রিক্রুটিং এজেন্সি নাম  : হোপ-২১ লমিটিডে- লাইসেন্স নম্বর :  ১২১৫</th>
	  		<th style="border:none;">
	  			তারিখ :- <?php echo $MPData->date;?> ইং     
	  		</th>

	  		<th style="border: none;">ক্লিয়ারেন্স নংঃ </th>
	  	</table>
	  </div>
	  <!--- start --->
	  	<div class="table_section_four">
	    	<table>
	    			<tr>
	    				<th style="width: 15mm;">ক্র.নং</th>
	    				<th style="width: 120mm;">বিদেশগামী কর্মীর নাম </th>
	    				<th style="width: 50mm;">পাসর্পোট নাম্বার</th>
	    				<th style="width: 40mm;">ভিসা নং </th>
	    				<th style="width: 165mm;">নিয়োগকর্তার নাম</th>
	    				<th style="width: 15mm;">ভিসা সংখ্যা</th>
	    				<th style="width: 20mm;">পদের নাম </th>
	    				<th style="width: 20mm;"> বেতন</th>
	    				<th style="width: 20mm;">উৎস আয়কর</th>
	    				<th style="width: 20mm;">কল্যান ফি  ও বীমা</th>
	    				<th style="width: 20mm;">মন্তব্য</th>
	    			</tr>

	    			<tr>
	    				<td style="text-align: center;">০১</td>
	    				<td style="text-align: center;">০২</td>
	    				<td style="text-align: center;">০৩</td>
	    				<td style="text-align: center;">০৪</td>
	    				<td style="text-align: center;">০৫</td>
	    				<td style="text-align: center;">০৬</td>
	    				<td style="text-align: center;">০৭</td>
	    				<td style="text-align: center;">০৮</td>
	    				<td style="text-align: center;">০৯</td>
	    				<td style="text-align: center;">১০</td>
	    				<td style="text-align: center;">১১</td>
	    			</tr>

<?php
$i = 0; 
   foreach ($AllManpowerCustomerList as $ManpowerCustomer) {
  $i++; 
  if ($i<=11) {
 $CustomerInfo = $this->Accounts_model->Customer_info_for_invoice($ManpowerCustomer->customer_id);
?>
	    			<tr>
	    				<td><?php echo $i;?></td>
	    				<td><?php echo $CustomerInfo->fullname;?></td>
	    				<td><?php echo $CustomerInfo->passport_no;?></td>
	    				<td><?php echo $CustomerInfo->visa_no;?></td>
	    				<td><?php echo $CustomerInfo->Kofile_name_eng;?></td>
	    				<td>০১</td>
	    				<td style="text-align: left;"><?php echo $CustomerInfo->profession;?></td>
	    				<td style="text-align: center;">১০০০</td>
	    				<td style="text-align: center;">৫০০</td>
	    				<td style="text-align: center;">৩৯৯০</td>
	    				<td style="text-align: center;"></td>
	    			</tr>
<?php } } ?>
	    	</table>

	    	<!--- start --->
	    	<div class="Exit_data">
		    	<table>
		    		<tr>
			    		<td>এজেন্সী অংগীকারঃ পে অডার টাকাঃ  <?php echo $total * 39990;?></td>
			    		<td>নং</td>
			    		<td>আয়কর টাকাঃ <?php echo $total * 500;?></td>
			    		<td>নং</td>
			    		<td>তারিখঃ <?php echo $MPData->date;?></td>
		    		</tr>
		    	</table>
	    		<table>
	    			<td style="width: 100%;">বর্ণিত কর্মী গ্রপ ভিসার অšর্তভূক্ত নয় । কর্মীদের পাসপোর্ট, ভিসা, চাকুরীর চুক্তি পত্রের বর্ণিত বেতন ও শর্তাদি সঠিক আছে । উক্ত বিষয়ে ক্রটির কারনে কর্মীদের কোন প্রকার সমস্যা হইলে আমার হোপ-২১ লমিটিডে-, আর এল নং ১২১৫ স¤পূর্ন দায় দায়িত্ব গ্রহন ও কর্মীদের ক্ষতিপূরন দান করিতে বাধ্য থাকিব |</td>
	    	</table>
	    	<!-- end -->
			<table>
	    		<tr>
	    			<td>পরীক্ষিত হয়েছে কাগজপত্র  <br> সঠিক আছে </td>
	    			<td>বর্ণিত তথ্যাদি যথাযথ আছে </td>
	    			<td>বহির্গমনের ছাড়পত্র দেওয়া যায়  </td>
	    			<td>বহির্গমনের ছাড়পত্র দেওয়া যায়  </td>
	    			<td></td>
	    		</tr>
	    	</table>
	    	<br>
	    	<table>
	    		<tr>
	    			<td>সহকারীর স্বাক্ষর </td>
	    			<td>সহকারী পরিচালকের স্বাক্ষর  </td>
	    			<td>উপ-পরিচালকের স্বাক্ষর   </td>
	    			<td>পরিচালকের স্বাক্ষর </td>
	    			<td>এজেন্সীর মালিক/প্রতিনিধির <br>
              স্বাক্ষর প্রস্তাবমত</td>
	    		</tr>
	    	</table>
	    	<!-- end -->
	    </div>
	</div><!--- end --->
</div><!--end part -four--->

	<?php //end 1 page
	   }elseif(($sl<=2)){
	?>


<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
	<!--- part four start ----->
	<div class="part_four" style="margin-top: 270px;">
	  <div class="page_sl" style="text-align: center;">
	    <strong> একক বর্হিগমন ছাড়পত্রের আবেদন ফরম </strong><br>
	  </div>
	  <div class="part_four_table">
	  	<table style="width: 100%;border: 0px">
	  		<th style="text-align: left;border: none;">নিয়োগকারী দেশের নাম  :  সৌদি আরব	<br>                                                                                                                                                             
জমাদানকারী রিক্রুটিং এজেন্সি নাম  : হোপ-২১ লমিটিডে- লাইসেন্স নম্বর :  ১২১৫</th>
	  		<th style="border:none;">
	  			তারিখ :-<?php echo $MPData->date;?>  ইং     
	  		</th>

	  		<th style="border: none;">ক্লিয়ারেন্স নংঃ </th>
	  	</table>
	  </div>
	  <!--- start --->
	  	<div class="table_section_four">
	    	<table>
	    			<tr>
	    				<th style="width: 15mm;">ক্র.নং</th>
	    				<th style="width: 120mm;">বিদেশগামী কর্মীর নাম </th>
	    				<th style="width: 50mm;">পাসর্পোট নাম্বার</th>
	    				<th style="width: 40mm;">ভিসা নং </th>
	    				<th style="width: 165mm;">নিয়োগকর্তার নাম</th>
	    				<th style="width: 15mm;">ভিসা সংখ্যা</th>
	    				<th style="width: 20mm;">পদের নাম </th>
	    				<th style="width: 20mm;"> বেতন</th>
	    				<th style="width: 20mm;">উৎস আয়কর</th>
	    				<th style="width: 20mm;">কল্যান ফি  ও বীমা</th>
	    				<th style="width: 20mm;">মন্তব্য</th>
	    			</tr>

	    			<tr>
	    				<td style="text-align: center;">০১</td>
	    				<td style="text-align: center;">০২</td>
	    				<td style="text-align: center;">০৩</td>
	    				<td style="text-align: center;">০৪</td>
	    				<td style="text-align: center;">০৫</td>
	    				<td style="text-align: center;">০৬</td>
	    				<td style="text-align: center;">০৭</td>
	    				<td style="text-align: center;">০৮</td>
	    				<td style="text-align: center;">০৯</td>
	    				<td style="text-align: center;">১০</td>
	    				<td style="text-align: center;">১১</td>
	    			</tr>

<?php
$i = 0;
$si = 0; 
   foreach ($AllManpowerCustomerList as $ManpowerCustomer) {
  $i++; 
  if ($i>=12) {
 $CustomerInfo = $this->Accounts_model->Customer_info_for_invoice($ManpowerCustomer->customer_id);
 	$si++;
?>
<?php 
	if($si<=11){
	?>
	    			<tr>
	    				<td><?php echo $si;?></td>
	    				<td><?php echo $CustomerInfo->fullname;?></td>
	    				<td><?php echo $CustomerInfo->passport_no;?></td>
	    				<td><?php echo $CustomerInfo->visa_no;?></td>
	    				<td><?php echo $CustomerInfo->Kofile_name_eng;?></td>
	    				<td>০১</td>
	    				<td style="text-align: left;"><?php echo $CustomerInfo->profession;?></td>
	    				<td style="text-align: center;">১০০০</td>
	    				<td style="text-align: center;">৫০০</td>
	    				<td style="text-align: center;">৩৯৯০</td>
	    				<td style="text-align: center;"></td>
	    			</tr>
	    <?php  } ?>
<?php } } ?>
	    	</table>

	    	<!--- start --->
	    	<div class="Exit_data">
		    	<table>
		    		<tr>
			    		<td>এজেন্সী অংগীকারঃ পে অডার টাকাঃ  <?php echo $total * 39990;?></td>
			    		<td>নং</td>
			    		<td>আয়কর টাকাঃ <?php echo $total * 500;?></td>
			    		<td>নং</td>
			    		<td>তারিখঃ <?php echo $MPData->date;?></td>
		    		</tr>
		    	</table>
	    		<table>
	    			<td style="width: 100%;">বর্ণিত কর্মী গ্রপ ভিসার অšর্তভূক্ত নয় । কর্মীদের পাসপোর্ট, ভিসা, চাকুরীর চুক্তি পত্রের বর্ণিত বেতন ও শর্তাদি সঠিক আছে । উক্ত বিষয়ে ক্রটির কারনে কর্মীদের কোন প্রকার সমস্যা হইলে আমার হোপ-২১ লমিটিডে-, আর এল নং ১২১৫ স¤পূর্ন দায় দায়িত্ব গ্রহন ও কর্মীদের ক্ষতিপূরন দান করিতে বাধ্য থাকিব |</td>
	    	</table>
	    	<!-- end -->
			<table>
	    		<tr>
	    			<td>পরীক্ষিত হয়েছে কাগজপত্র  <br> সঠিক আছে </td>
	    			<td>বর্ণিত তথ্যাদি যথাযথ আছে </td>
	    			<td>বহির্গমনের ছাড়পত্র দেওয়া যায়  </td>
	    			<td>বহির্গমনের ছাড়পত্র দেওয়া যায়  </td>
	    			<td></td>
	    		</tr>
	    	</table>
	    	<br>
	    	<table>
	    		<tr>
	    			<td>সহকারীর স্বাক্ষর </td>
	    			<td>সহকারী পরিচালকের স্বাক্ষর  </td>
	    			<td>উপ-পরিচালকের স্বাক্ষর   </td>
	    			<td>পরিচালকের স্বাক্ষর </td>
	    			<td>এজেন্সীর মালিক/প্রতিনিধির <br>
              স্বাক্ষর প্রস্তাবমত</td>
	    		</tr>
	    	</table>
	    	<!-- end -->
	    </div>
	</div><!--- end --->
</div><!--end part -four--->
	
<?php } } ?> <!--end if 2page-->
<?php 
	}else{
?>

	<?php 
		$sl = 0;
		$pl = 0;
   		foreach ($AllManpowerCustomerList as $ManpowerCustomer){
   		$sl ++;
   		$pl++;
   	if ($sl<=1) {
   ?><!--end--->
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
	<!--- part four start ----->
	<div class="part_four">
	  <div class="page_sl" style="text-align: center;">
	    <strong> একক বর্হিগমন ছাড়পত্রের আবেদন ফরম </strong><br>
	  </div>
	  <div class="part_four_table">
	  	<table style="width: 100%;border: 0px">
	  		<th style="text-align: left;border: none;">নিয়োগকারী দেশের নাম  :  সৌদি আরব	<br>                                                                                                                                                             
জমাদানকারী রিক্রুটিং এজেন্সি নাম  : হোপ-২১ লমিটিডে- লাইসেন্স নম্বর :  ১২১৫</th>
	  		<th style="border:none;">
	  			তারিখ :- <?php echo $MPData->date;?> ইং     
	  		</th>

	  		<th style="border: none;">ক্লিয়ারেন্স নংঃ </th>
	  	</table>
	  </div>
	  <!--- start --->
	  	<div class="table_section_four">
	    	<table>
	    			<tr>
	    				<th style="width: 15mm;">ক্র.নং</th>
	    				<th style="width: 120mm;">বিদেশগামী কর্মীর নাম </th>
	    				<th style="width: 50mm;">পাসর্পোট নাম্বার</th>
	    				<th style="width: 40mm;">ভিসা নং </th>
	    				<th style="width: 165mm;">নিয়োগকর্তার নাম</th>
	    				<th style="width: 15mm;">ভিসা সংখ্যা</th>
	    				<th style="width: 20mm;">পদের নাম </th>
	    				<th style="width: 20mm;"> বেতন</th>
	    				<th style="width: 20mm;">উৎস আয়কর</th>
	    				<th style="width: 20mm;">কল্যান ফি  ও বীমা</th>
	    				<th style="width: 20mm;">মন্তব্য</th>
	    			</tr>

	    			<tr>
	    				<td style="text-align: center;">০১</td>
	    				<td style="text-align: center;">০২</td>
	    				<td style="text-align: center;">০৩</td>
	    				<td style="text-align: center;">০৪</td>
	    				<td style="text-align: center;">০৫</td>
	    				<td style="text-align: center;">০৬</td>
	    				<td style="text-align: center;">০৭</td>
	    				<td style="text-align: center;">০৮</td>
	    				<td style="text-align: center;">০৯</td>
	    				<td style="text-align: center;">১০</td>
	    				<td style="text-align: center;">১১</td>
	    			</tr>

<?php
$i = 0; 
   foreach ($AllManpowerCustomerList as $ManpowerCustomer) {
  $i++; 
  if ($i<=11) {
 $CustomerInfo = $this->Accounts_model->Customer_info_for_invoice($ManpowerCustomer->customer_id);
?>
	    			<tr>
	    				<td><?php echo $i;?></td>
	    				<td><?php echo $CustomerInfo->fullname;?></td>
	    				<td><?php echo $CustomerInfo->passport_no;?></td>
	    				<td><?php echo $CustomerInfo->visa_no;?></td>
	    				<td><?php echo $CustomerInfo->Kofile_name_eng;?></td>
	    				<td>০১</td>
	    				<td style="text-align: left;"><?php echo $CustomerInfo->profession;?></td>
	    				<td style="text-align: center;">১০০০</td>
	    				<td style="text-align: center;">৫০০</td>
	    				<td style="text-align: center;">৩৯৯০</td>
	    				<td style="text-align: center;"></td>
	    			</tr>
<?php } } ?>
	    	</table>

	    	<!--- start --->
	    	<div class="Exit_data">
		    	<table>
		    		<tr>
			    		<td>এজেন্সী অংগীকারঃ পে অডার টাকাঃ  <?php echo $total * 39990;?></td>
			    		<td>নং</td>
			    		<td>আয়কর টাকাঃ <?php echo $total * 500;?></td>
			    		<td>নং</td>
			    		<td>তারিখঃ <?php echo $MPData->date;?></td>
		    		</tr>
		    	</table>
	    		<table>
	    			<td style="width: 100%;">বর্ণিত কর্মী গ্রপ ভিসার অšর্তভূক্ত নয় । কর্মীদের পাসপোর্ট, ভিসা, চাকুরীর চুক্তি পত্রের বর্ণিত বেতন ও শর্তাদি সঠিক আছে । উক্ত বিষয়ে ক্রটির কারনে কর্মীদের কোন প্রকার সমস্যা হইলে আমার হোপ-২১ লমিটিডে-, আর এল নং ১২১৫ স¤পূর্ন দায় দায়িত্ব গ্রহন ও কর্মীদের ক্ষতিপূরন দান করিতে বাধ্য থাকিব |</td>
	    	</table>
	    	<!-- end -->
			<table>
	    		<tr>
	    			<td>পরীক্ষিত হয়েছে কাগজপত্র  <br> সঠিক আছে </td>
	    			<td>বর্ণিত তথ্যাদি যথাযথ আছে </td>
	    			<td>বহির্গমনের ছাড়পত্র দেওয়া যায়  </td>
	    			<td>বহির্গমনের ছাড়পত্র দেওয়া যায়  </td>
	    			<td></td>
	    		</tr>
	    	</table>
	    	<br>
	    	<table>
	    		<tr>
	    			<td>সহকারীর স্বাক্ষর </td>
	    			<td>সহকারী পরিচালকের স্বাক্ষর  </td>
	    			<td>উপ-পরিচালকের স্বাক্ষর   </td>
	    			<td>পরিচালকের স্বাক্ষর </td>
	    			<td>এজেন্সীর মালিক/প্রতিনিধির <br>
              স্বাক্ষর প্রস্তাবমত</td>
	    		</tr>
	    	</table>
	    	<!-- end -->
	    </div>
	</div><!--- end --->
</div><!--end part -four--->

	<?php //end 1 page
	   }elseif(($sl<=2)){
	?>


<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
	<!--- part four start ----->
	<div class="part_four" style="margin-top: 360px;">
	  <div class="page_sl" style="text-align: center;">
	    <strong> একক বর্হিগমন ছাড়পত্রের আবেদন ফরম </strong><br>
	  </div>
	  <div class="part_four_table">
	  	<table style="width: 100%;border: 0px">
	  		<th style="text-align: left;border: none;">নিয়োগকারী দেশের নাম  :  সৌদি আরব	<br>                                                                                                                                                             
জমাদানকারী রিক্রুটিং এজেন্সি নাম  : হোপ-২১ লমিটিডে- লাইসেন্স নম্বর :  ১২১৫</th>
	  		<th style="border:none;">
	  			তারিখ :- <?php echo $MPData->date;?> ইং     
	  		</th>

	  		<th style="border: none;">ক্লিয়ারেন্স নংঃ </th>
	  	</table>
	  </div>
	  <!--- start --->
	  	<div class="table_section_four">
	    	<table>
	    			<tr>
	    				<th style="width: 15mm;">ক্র.নং</th>
	    				<th style="width: 120mm;">বিদেশগামী কর্মীর নাম </th>
	    				<th style="width: 50mm;">পাসর্পোট নাম্বার</th>
	    				<th style="width: 40mm;">ভিসা নং </th>
	    				<th style="width: 165mm;">নিয়োগকর্তার নাম</th>
	    				<th style="width: 15mm;">ভিসা সংখ্যা</th>
	    				<th style="width: 20mm;">পদের নাম </th>
	    				<th style="width: 20mm;"> বেতন</th>
	    				<th style="width: 20mm;">উৎস আয়কর</th>
	    				<th style="width: 20mm;">কল্যান ফি  ও বীমা</th>
	    				<th style="width: 20mm;">মন্তব্য</th>
	    			</tr>

	    			<tr>
	    				<td style="text-align: center;">০১</td>
	    				<td style="text-align: center;">০২</td>
	    				<td style="text-align: center;">০৩</td>
	    				<td style="text-align: center;">০৪</td>
	    				<td style="text-align: center;">০৫</td>
	    				<td style="text-align: center;">০৬</td>
	    				<td style="text-align: center;">০৭</td>
	    				<td style="text-align: center;">০৮</td>
	    				<td style="text-align: center;">০৯</td>
	    				<td style="text-align: center;">১০</td>
	    				<td style="text-align: center;">১১</td>
	    			</tr>

<?php
$i = 0;
$si = 0;
   foreach ($AllManpowerCustomerList as $ManpowerCustomer) {
  $i++; 
  if ($i>=12) {
 $CustomerInfo = $this->Accounts_model->Customer_info_for_invoice($ManpowerCustomer->customer_id);
 	$si++;
?>
<?php 
	if($si<=11){
	?>
	    			<tr>
	    				<td><?php echo $si;?></td>
	    				<td><?php echo $CustomerInfo->fullname;?></td>
	    				<td><?php echo $CustomerInfo->passport_no;?></td>
	    				<td><?php echo $CustomerInfo->visa_no;?></td>
	    				<td><?php echo $CustomerInfo->Kofile_name_eng;?></td>
	    				<td>০১</td>
	    				<td style="text-align: left;"><?php echo $CustomerInfo->profession;?></td>
	    				<td style="text-align: center;">১০০০</td>
	    				<td style="text-align: center;">৫০০</td>
	    				<td style="text-align: center;">৩৯৯০</td>
	    				<td style="text-align: center;"></td>
	    			</tr>
	    <?php  } ?>
<?php } } ?>
	    	</table>

	    	<!--- start --->
	    	<div class="Exit_data">
		    	<table>
		    		<tr>
			    		<td>এজেন্সী অংগীকারঃ পে অডার টাকাঃ  <?php echo $total * 39990;?></td>
			    		<td>নং</td>
			    		<td>আয়কর টাকাঃ <?php echo $total * 500;?></td>
			    		<td>নং</td>
			    		<td>তারিখঃ <?php echo $MPData->date;?></td>
		    		</tr>
		    	</table>
	    		<table>
	    			<td style="width: 100%;">বর্ণিত কর্মী গ্রপ ভিসার অšর্তভূক্ত নয় । কর্মীদের পাসপোর্ট, ভিসা, চাকুরীর চুক্তি পত্রের বর্ণিত বেতন ও শর্তাদি সঠিক আছে । উক্ত বিষয়ে ক্রটির কারনে কর্মীদের কোন প্রকার সমস্যা হইলে আমার হোপ-২১ লমিটিডে-, আর এল নং ১২১৫ স¤পূর্ন দায় দায়িত্ব গ্রহন ও কর্মীদের ক্ষতিপূরন দান করিতে বাধ্য থাকিব |</td>
	    	</table>
	    	<!-- end -->
			<table>
	    		<tr>
	    			<td>পরীক্ষিত হয়েছে কাগজপত্র  <br> সঠিক আছে </td>
	    			<td>বর্ণিত তথ্যাদি যথাযথ আছে </td>
	    			<td>বহির্গমনের ছাড়পত্র দেওয়া যায়  </td>
	    			<td>বহির্গমনের ছাড়পত্র দেওয়া যায়  </td>
	    			<td></td>
	    		</tr>
	    	</table>
	    	<br>
	    	<table>
	    		<tr>
	    			<td>সহকারীর স্বাক্ষর </td>
	    			<td>সহকারী পরিচালকের স্বাক্ষর  </td>
	    			<td>উপ-পরিচালকের স্বাক্ষর   </td>
	    			<td>পরিচালকের স্বাক্ষর </td>
	    			<td>এজেন্সীর মালিক/প্রতিনিধির <br>
              স্বাক্ষর প্রস্তাবমত</td>
	    		</tr>
	    	</table>
	    	<!-- end -->
	    </div>
	</div><!--- end --->
</div><!--end part -four--->
	<?php //end 3 page
	   }elseif(($sl<=3)){
	?>


<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
	<!--- part four start ----->
	<div class="part_four" style="margin-top: 280px;">
	  <div class="page_sl" style="text-align: center;">
	    <strong> একক বর্হিগমন ছাড়পত্রের আবেদন ফরম </strong><br>
	  </div>
	  <div class="part_four_table">
	  	<table style="width: 100%;border: 0px">
	  		<th style="text-align: left;border: none;">নিয়োগকারী দেশের নাম  :  সৌদি আরব	<br>                                                                                                                                                             
জমাদানকারী রিক্রুটিং এজেন্সি নাম  : হোপ-২১ লমিটিডে- লাইসেন্স নম্বর :  ১২১৫</th>
	  		<th style="border:none;">
	  			তারিখ :- <?php echo $MPData->date;?>  ইং     
	  		</th>

	  		<th style="border: none;">ক্লিয়ারেন্স নংঃ </th>
	  	</table>
	  </div>
	  <!--- start --->
	  	<div class="table_section_four">
	    	<table>
	    			<tr>
	    				<th style="width: 15mm;">ক্র.নং</th>
	    				<th style="width: 120mm;">বিদেশগামী কর্মীর নাম </th>
	    				<th style="width: 50mm;">পাসর্পোট নাম্বার</th>
	    				<th style="width: 40mm;">ভিসা নং </th>
	    				<th style="width: 165mm;">নিয়োগকর্তার নাম</th>
	    				<th style="width: 15mm;">ভিসা সংখ্যা</th>
	    				<th style="width: 20mm;">পদের নাম </th>
	    				<th style="width: 20mm;"> বেতন</th>
	    				<th style="width: 20mm;">উৎস আয়কর</th>
	    				<th style="width: 20mm;">কল্যান ফি  ও বীমা</th>
	    				<th style="width: 20mm;">মন্তব্য</th>
	    			</tr>

	    			<tr>
	    				<td style="text-align: center;">০১</td>
	    				<td style="text-align: center;">০২</td>
	    				<td style="text-align: center;">০৩</td>
	    				<td style="text-align: center;">০৪</td>
	    				<td style="text-align: center;">০৫</td>
	    				<td style="text-align: center;">০৬</td>
	    				<td style="text-align: center;">০৭</td>
	    				<td style="text-align: center;">০৮</td>
	    				<td style="text-align: center;">০৯</td>
	    				<td style="text-align: center;">১০</td>
	    				<td style="text-align: center;">১১1</td>
	    			</tr>


<?php
$i = 0;
$si = 0;
   foreach ($AllManpowerCustomerList as $ManpowerCustomer) {
  $i++; 
  if ($i>=23) {
 $CustomerInfo = $this->Accounts_model->Customer_info_for_invoice($ManpowerCustomer->customer_id);
 	$si++;
?>
<?php 
	if($si<=11){
	?>
	    			<tr>
	    				<td><?php echo $si;?></td>
	    				<td><?php echo $CustomerInfo->fullname;?></td>
	    				<td><?php echo $CustomerInfo->passport_no;?></td>
	    				<td><?php echo $CustomerInfo->visa_no;?></td>
	    				<td><?php echo $CustomerInfo->Kofile_name_eng;?></td>
	    				<td>০১</td>
	    				<td style="text-align: left;"><?php echo $CustomerInfo->profession;?></td>
	    				<td style="text-align: center;">১০০০</td>
	    				<td style="text-align: center;">৫০০</td>
	    				<td style="text-align: center;">৩৯৯০</td>
	    				<td style="text-align: center;"></td>
	    			</tr>
	    <?php  } ?>
<?php } } ?>
	    	</table>

	    	<!--- start --->
	    	<div class="Exit_data">
		    	<table>
		    		<tr>
			    		<td>এজেন্সী অংগীকারঃ পে অডার টাকাঃ  <?php echo $total * 39990;?></td>
			    		<td>নং</td>
			    		<td>আয়কর টাকাঃ <?php echo $total * 500;?></td>
			    		<td>নং</td>
			    		<td>তারিখঃ <?php echo $MPData->date;?></td>
		    		</tr>
		    	</table>
	    		<table>
	    			<td style="width: 100%;">বর্ণিত কর্মী গ্রপ ভিসার অšর্তভূক্ত নয় । কর্মীদের পাসপোর্ট, ভিসা, চাকুরীর চুক্তি পত্রের বর্ণিত বেতন ও শর্তাদি সঠিক আছে । উক্ত বিষয়ে ক্রটির কারনে কর্মীদের কোন প্রকার সমস্যা হইলে আমার হোপ-২১ লমিটিডে-, আর এল নং ১২১৫ স¤পূর্ন দায় দায়িত্ব গ্রহন ও কর্মীদের ক্ষতিপূরন দান করিতে বাধ্য থাকিব |</td>
	    	</table>
	    	<!-- end -->
			<table>
	    		<tr>
	    			<td>পরীক্ষিত হয়েছে কাগজপত্র  <br> সঠিক আছে </td>
	    			<td>বর্ণিত তথ্যাদি যথাযথ আছে </td>
	    			<td>বহির্গমনের ছাড়পত্র দেওয়া যায়  </td>
	    			<td>বহির্গমনের ছাড়পত্র দেওয়া যায়  </td>
	    			<td></td>
	    		</tr>
	    	</table>
	    	<br>
	    	<table>
	    		<tr>
	    			<td>সহকারীর স্বাক্ষর </td>
	    			<td>সহকারী পরিচালকের স্বাক্ষর  </td>
	    			<td>উপ-পরিচালকের স্বাক্ষর   </td>
	    			<td>পরিচালকের স্বাক্ষর </td>
	    			<td>এজেন্সীর মালিক/প্রতিনিধির <br>
              স্বাক্ষর প্রস্তাবমত</td>
	    		</tr>
	    	</table>
	    	<!-- end -->
	    </div>
	</div><!--- end --->
</div><!--end part -four--->

<?php if ($sl<=4){?><!--end--->

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
	<!--- part four start ----->
	<div class="part_four" style="margin-top:350px;">
	  <div class="page_sl" style="text-align: center;">
	    <strong> একক বর্হিগমন ছাড়পত্রের আবেদন ফরম </strong><br>
	  </div>
	  <div class="part_four_table">
	  	<table style="width: 100%;border: 0px">
	  		<th style="text-align: left;border: none;">নিয়োগকারী দেশের নাম  :  সৌদি আরব	<br>                                                                                                                                                             
জমাদানকারী রিক্রুটিং এজেন্সি নাম  : হোপ-২১ লমিটিডে- লাইসেন্স নম্বর :  ১২১৫</th>
	  		<th style="border:none;">
	  			তারিখ :- <?php echo $MPData->date;?>  ইং     
	  		</th>

	  		<th style="border: none;">ক্লিয়ারেন্স নংঃ </th>
	  	</table>
	  </div>
	  <!--- start --->
	  	<div class="table_section_four">
	    	<table>
	    			<tr>
	    				<th style="width: 15mm;">ক্র.নং</th>
	    				<th style="width: 120mm;">বিদেশগামী কর্মীর নাম </th>
	    				<th style="width: 50mm;">পাসর্পোট নাম্বার</th>
	    				<th style="width: 40mm;">ভিসা নং </th>
	    				<th style="width: 165mm;">নিয়োগকর্তার নাম</th>
	    				<th style="width: 15mm;">ভিসা সংখ্যা</th>
	    				<th style="width: 20mm;">পদের নাম </th>
	    				<th style="width: 20mm;"> বেতন</th>
	    				<th style="width: 20mm;">উৎস আয়কর</th>
	    				<th style="width: 20mm;">কল্যান ফি  ও বীমা</th>
	    				<th style="width: 20mm;">মন্তব্য</th>
	    			</tr>

	    			<tr>
	    				<td style="text-align: center;">০১</td>
	    				<td style="text-align: center;">০২</td>
	    				<td style="text-align: center;">০৩</td>
	    				<td style="text-align: center;">০৪</td>
	    				<td style="text-align: center;">০৫</td>
	    				<td style="text-align: center;">০৬</td>
	    				<td style="text-align: center;">০৭</td>
	    				<td style="text-align: center;">০৮</td>
	    				<td style="text-align: center;">০৯</td>
	    				<td style="text-align: center;">১০</td>
	    				<td style="text-align: center;">১১</td>
	    			</tr>

<?php
$i = 0;
$si = 0;
   foreach ($AllManpowerCustomerList as $ManpowerCustomer) {
  $i++; 
  if ($i>=34) {
 $CustomerInfo = $this->Accounts_model->Customer_info_for_invoice($ManpowerCustomer->customer_id);
 	$si++;
?>
<?php 
	if($si<=11){
	?>
	    			<tr>
	    				<td><?php echo $si;?></td>
	    				<td><?php echo $CustomerInfo->fullname;?></td>
	    				<td><?php echo $CustomerInfo->passport_no;?></td>
	    				<td><?php echo $CustomerInfo->visa_no;?></td>
	    				<td><?php echo $CustomerInfo->Kofile_name_eng;?></td>
	    				<td>০১</td>
	    				<td style="text-align: left;"><?php echo $CustomerInfo->profession;?></td>
	    				<td style="text-align: center;">১০০০</td>
	    				<td style="text-align: center;">৫০০</td>
	    				<td style="text-align: center;">৩৯৯০</td>
	    				<td style="text-align: center;"></td>
	    			</tr>
	    <?php  } ?>
<?php } } ?>
	    	</table>

	    	<!--- start --->
	    	<div class="Exit_data">
		    	<table>
		    		<tr>
			    		<td>এজেন্সী অংগীকারঃ পে অডার টাকাঃ  <?php echo $total * 39990;?></td>
			    		<td>নং</td>
			    		<td>আয়কর টাকাঃ <?php echo $total * 500;?></td>
			    		<td>নং</td>
			    		<td>তারিখঃ <?php echo $MPData->date;?></td>
		    		</tr>
		    	</table>
	    		<table>
	    			<td style="width: 100%;">বর্ণিত কর্মী গ্রপ ভিসার অšর্তভূক্ত নয় । কর্মীদের পাসপোর্ট, ভিসা, চাকুরীর চুক্তি পত্রের বর্ণিত বেতন ও শর্তাদি সঠিক আছে । উক্ত বিষয়ে ক্রটির কারনে কর্মীদের কোন প্রকার সমস্যা হইলে আমার হোপ-২১ লমিটিডে-, আর এল নং ১২১৫ স¤পূর্ন দায় দায়িত্ব গ্রহন ও কর্মীদের ক্ষতিপূরন দান করিতে বাধ্য থাকিব |</td>
	    	</table>
	    	<!-- end -->
			<table>
	    		<tr>
	    			<td>পরীক্ষিত হয়েছে কাগজপত্র  <br> সঠিক আছে </td>
	    			<td>বর্ণিত তথ্যাদি যথাযথ আছে </td>
	    			<td>বহির্গমনের ছাড়পত্র দেওয়া যায়  </td>
	    			<td>বহির্গমনের ছাড়পত্র দেওয়া যায়  </td>
	    			<td></td>
	    		</tr>
	    	</table>
	    	<br>
	    	<table>
	    		<tr>
	    			<td>সহকারীর স্বাক্ষর </td>
	    			<td>সহকারী পরিচালকের স্বাক্ষর  </td>
	    			<td>উপ-পরিচালকের স্বাক্ষর   </td>
	    			<td>পরিচালকের স্বাক্ষর </td>
	    			<td>এজেন্সীর মালিক/প্রতিনিধির <br>
              স্বাক্ষর প্রস্তাবমত</td>
	    		</tr>
	    	</table>
	    	<!-- end -->
	    </div>
	</div><!--- end --->
</div><!--end part -four--->

	<?php } //end ?>

	
	<?php } ?> <!--end if 2page-->

<?php
   }//foreach 
?>



<?php
	} 
?>

<!-- part-six-start -->
	    </div><!---++++++--->
	</div>









<script>
    function printDiv(divName){
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>			
</body>
</html>
