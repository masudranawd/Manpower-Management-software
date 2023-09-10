
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
<div class="profile-userbuttons" style="width:100%;">
    <div style="width:20%;color:#fff;text-align:center;float:left;">
		<a class="btn"  onclick="printDiv('printMe')" style="display:block;padding:10px;background:green;">Print</a>
	</div>

</div><br><br>
<?php
 $total = 0; 
	foreach ($AllManpowerCustomerList as $ManpowerCustomer) {
		$total = (int)$total + (int)$ManpowerCustomer->status;
}
?>

	<div class="" style="width:100%;" id="printMe" >
	    <div style="width:80%;margin:0px auto;margin-top: 60px;">
	    <!-- start --->

	    <div class="page_one" style="margin-top:300px;height: 100vh;">
	    	<div class="page_sl">
	    			<center><strong>পাতা -0১</strong></center><br>
	    			<p style="font-family: SutonnyOMJ">সৌদি আরব গামী নিম্নলিখিত <?php echo $total; ?>(এগার) জন র্কমী প্ররেণ সংক্রান্ত রিক্রুটিং এজন্সেী হোপ-২১ লমিটিডে (আর এল নং- ১২১৫ এর অঙ্গীকারনামা ,সৌদি আরব-গামী সত্যায়িত ১১(এগার) জন পুরুষ কর্মীর তালিকা:</p>
	    	</div><!--end-->
	    	<!--start--->
	    	<div class="table_section">
	    		<table>
	    			<tr>
	    				<th style="width: 15mm;">ক্র.নং</th>
	    				<th style="width: 70mm;">কর্মীর নাম</th>
	    				<th style="width: 150mm;">নািয়ােগর্কতার নাম </th>
	    				<th style="width: 40mm;">ভিসা নাম্বার</th>
	    				<th style="width: 65mm;">পদের নাম ও বেতন</th>
	    				<th style="width: 40mm;">অভিবাসন ব্যয়</th>
	    			</tr>
<?php
$i = 0; $total = 0; 
foreach ($AllManpowerCustomerList as $ManpowerCustomer) {
  $i++; 
 $CustomerInfo = $this->Accounts_model->Customer_info_for_invoice($ManpowerCustomer->customer_id);
?>

	    			<tr>
	    				<td><?php echo $i; ?></td>
	    				<td><?php echo  $CustomerInfo->fullname; ?></td>
	    				<td><?php echo  $CustomerInfo->Kofile_name_eng; ?></td>
	    				<td><?php echo  $CustomerInfo->visa_no; ?></td>
	    				<td>WORKER SR-1000</td>
	    				<td style="text-align: center;">1,65,000</td>
	    			</tr>
<?php } ?>

	    		</table>
	    		<!-- start-->
	    	</div>
			<br>
			<br>
			<br>
	    	<div class="page_sl" style="text-align: right;">
	    			<strong>চলমান পাতা-02</strong><br>
	    	</div>
	    </div><!-- page one --- end--->



	    <!-- end  --->
	    <div class="page_one" style="margin-top:90px;height: 100vh;">
	    	<div class="page_sl">
	    			<center><strong>পাতা -0১</strong></center><br>
	    			<p style="font-family: SutonnyOMJ">সৌদি আরব গামী নিম্নলিখিত <?php echo $total; ?>(এগার) জন র্কমী প্ররেণ সংক্রান্ত রিক্রুটিং এজন্সেী হোপ-২১ লমিটিডে (আর এল নং- ১২১৫ এর অঙ্গীকারনামা ,সৌদি আরব-গামী সত্যায়িত ১১(এগার) জন পুরুষ কর্মীর তালিকা:</p>
	    	</div><!--end-->
	    	<!--start--->
	    	<div class="table_section">
	    		<table>
	    			<tr>
	    				<th style="width: 15mm;">ক্র.নং</th>
	    				<th style="width: 90mm;">কর্মীর নাম</th>
	    				<th style="width: 50mm;">পাসর্পোট নাম্বার </th>
	    				<th style="width: 40mm;">প্রশক্ষিণ সনদ নাম্বার</th>
	    				<th style="width: 65mm;">ব্যাচ নম্বর ও তানখি</th>
	    				<th style="width: 40mm;">সিরিয়াল </th>
	    				<th style="width: 100mm;">টিটিসি’র নাম </th>
	    			</tr>

<?php
	
$i = 0; $total = 0; 
foreach ($AllManpowerCustomerList as $ManpowerCustomer) {
  $i++; 
 $CustomerInfo = $this->Accounts_model->Customer_info_for_invoice($ManpowerCustomer->customer_id);
?>
	    			<tr>
	    				<td><?php echo $i;?></td>
	    				<td><?php echo $CustomerInfo->fullname;?></td>
	    				<td><?php echo $CustomerInfo->passport_no;?></td>
	    				<td><?php echo $CustomerInfo->certificate_no;?></td>
	    				<td><?php echo $CustomerInfo->batch_no;?></td>
	    				<td style="text-align: center;"><?php echo $CustomerInfo->batch_sl;?></td>
	    				<td> <?php echo $CustomerInfo->ttc_name;?></td>
	    			</tr>
<?php } ?>
	    			
	    		</table>
	    	</div>
<br>
<br>
<br>
	    	<div class="page_sl" style="text-align: right;">
	    			<strong>চলমান পাতা-02</strong><br>
	    	</div>
	    </div><!-- page one --- end--->


<!----- page tow start-------------------->
	<div class="page_second" style="height: 100vh;">
		<div class="page_sl" style="text-align: center;">
	    	<strong> পাতা-02</strong><br>
	    	<h3 style="text-align: justify;line-height: 35px;">
	    		আমি রিক্রুটিং  এজেন্সী হোপ-২১ লমিটিডে (আর এল নং- ১২১৫) এর স্বত্তাধিকারি/ব্যবস্থাপনা অংশীদার /ব্যবস্থাপনা পরিচালক এই মর্মে অঙ্গীকার করছি যে , চাকুরির উদ্যেশে সৌদি আরব দেশের বিভিন্ন নিয়োগকর্তার অধীনে বর্ণিত ১১(এগার) জন কর্মীর একক বহির্গমন ছাড়পত্র গ্রহনরে নমিত্তি র্কমীদরে ভিসা, চুক্তপিত্রসহ  অন্যান্য প্রয়োজনীয় কাগজপত্র দাখিল করিলাম যাহা সঠিক আছে |উপরোক্ত কর্মীদের সৌদি আরব বিমানবন্দরে নিয়োগকর্তা/নিয়োগকর্তার প্রতিনিধি গ্রহণ করবেন এবং বর্ণিত  র্কমীগণকে  সৌদি আরব দশেে প্ররেণরে জন্য বহির্গমন ছাড়পত্র গ্রহনরে পর উক্ত দেশ ব্যতীত অন্যকোন দেশে প্ররেণ করবনা র্মমে অঙ্গীকার করছি | আমি আরও অংগীকার করছি যে উপরোক্ত র্কমীদরে ভিসা,নিয়োগপত্র, চুক্তিপত্র সঠিক আছে। কর্মীগণ বিদেশে যাওয়ার পর সংশ্লষ্টি নিয়োগকর্তার অধীনে নির্ধারিত পশোয় চাকরি প্রদানের নিশ্চয়তা প্রদান করছি, এবংকর্মীগণ বিদেশ যাওয়ার পর চুক্তিপত্র অনুযায়ী বেতন ভাতাদি এবং অন্যান্য সুযোগ সুবধিা প্রাপ্য না হলে তার সকল দায়-দায়ত্বি বহন করব এবংকর্মীদের যাবতীয় ক্ষতিপূরণ দিতে বাধ্য থাকবি। আরও অংগীকার করছি যে ,কর্মীদের নিকট হতে সরকার কর্তৃক নির্ধারিত অভিবাসন ব্যয় এর বেশি  ব্যয় গ্রহণ করা হয়নি |
	    	</h3>  
	    	 </div>

	    	<div class="page_sl " style="text-align: right;">
	    			<strong>চলমান পাতা-03</strong><br>
	    	</div>
	</div>
<!------page tow end---------------------->
<br><br><br><br>
<!--- page three -------------------->
	<div class="page_three">
		<div class="page_sl" style="text-align: center;">
	    	<strong> পাতা-03</strong><br>
	    	<h2 style="text-align: justify;line-height: 60px;">
	    		উপরোক্ত অংগীকার নামায় বর্ণিত বিষয়ের কোন ব্যাতয় ঘটলে প্রবাসী কল্যাণ ও বৈদেশিক কর্মসংস্থান মন্ত্রণালয় অথবা জনশক্তি কর্মসংস্থাণ ও প্রশিক্ষণ ব্যুারো আমার বা আমার রিক্রুটিং  এজেন্সির বিরুদ্ধে বৈদেশিক কর্মসংস্থান ও অভিবাসী আইন-2013 অনুযায়ী যেকোন ব্যাবস্থা গ্রহণ করতে পারবে।
				এই অংগীকারনামায় আমি স্বেচ্ছায়,স্ব-জ্ঞানে, সুস্থ মস্তিষ্কে এবং কারো কথায় প্ররোচিত না হয়ে সাক্ষর করলাম। 
	    	</h2>
	    </div>
	    <div class="" style="margin-top: 30px;padding-left: 140px;">
	    	<h2>
	    		রিক্রুটিং এজেন্সির নামঃ হোপ-২১ লিমিটেড<br><br>
                মালিকের  নামঃ  মোঃ মাকবুল আহাম্মেদ<br><br>
                মালিকের  সাক্ষর ও সীলঃ<br><br>
                তারখিঃ<br><br>
                ফোন নাম্বার-০১৭১১১৭৫৩৪৬<br><br>

	    	</h2>
	    </div>
	</div>
<!-- end page three------------------>

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
	  			তারিখ :- ০১-১২-২০২০  ইং     
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
			    		<td>তারিখঃ</td>
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
	  			তারিখ :- ০১-১২-২০২০  ইং     
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
$si = 0; $total = 0; 
   foreach ($AllManpowerCustomerList as $ManpowerCustomer) {
  $i++; 
  if ($i>=12) {
 $CustomerInfo = $this->Accounts_model->Customer_info_for_invoice($ManpowerCustomer->customer_id);
 	$si++;
?>
<?php 
	if($si<=11){
 	$total =(int)$total + (int)$ManpowerCustomer->status;
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
			    		<td>তারিখঃ</td>
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
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
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
	  			তারিখ :- ০১-১২-২০২০  ইং     
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
  if ($i>=22){
 $CustomerInfo = $this->Accounts_model->Customer_info_for_invoice($ManpowerCustomer->customer_id);
 		$total =(int)$total + (int)$ManpowerCustomer->status;
?>
	    		
<?php 
	if($si<=11){
 	$total =(int)$total + (int)$ManpowerCustomer->status;
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
			    		<td>তারিখঃ</td>
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
	<div class="part_four" style="margin-top:450px;">
	  <div class="page_sl" style="text-align: center;">
	    <strong> একক বর্হিগমন ছাড়পত্রের আবেদন ফরম </strong><br>
	  </div>
	  <div class="part_four_table">
	  	<table style="width: 100%;border: 0px">
	  		<th style="text-align: left;border: none;">নিয়োগকারী দেশের নাম  :  সৌদি আরব	<br>                                                                                                                                                             
জমাদানকারী রিক্রুটিং এজেন্সি নাম  : হোপ-২১ লমিটিডে- লাইসেন্স নম্বর :  ১২১৫</th>
	  		<th style="border:none;">
	  			তারিখ :- ০১-১২-২০২০  ইং     
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
  if ($i>=32) {
 $CustomerInfo = $this->Accounts_model->Customer_info_for_invoice($ManpowerCustomer->customer_id);
?>
<?php 
	if($si<=11){
 	$total =(int)$total + (int)$ManpowerCustomer->status;
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
			    		<td>তারিখঃ</td>
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


<br>
<!-- part-five start---->
	<div class="part-five" style="margin-top: 680px;">
		<div class="part_five_sl_one">
			<div class="page_sl" style="text-align: center;">
	    		<strong>01s</strong><br>
	 		 </div>
	 		<div class="flag_details">
	 			<p>
	 				০১/ রিক্রুটিং এজেন্সী হোপ-২১ লিমিটেড (আর এল-1215) এর স্বত্বাধিকারী সৌদি আরবগামী 11(এগারো) জন পূরুষ কর্মীর অনূকূলে একক বহির্গমন ছাড়পত্র গ্রহণের জন্য আবেদন পত্র সহ নিম্নে বর্ণিত কাগজপত্রাদি দাখিল করেছেন।
	 			</p>
	 			<p>ক) রিক্রুটিং এজেন্সির আবেদন পত্র- পতাকা (খ)</p>
	 			<p>খ) কর্মীর পাসপোর্টের ফটোকপি- পতাকা (খ)</p>
	 			<p>গ) ভিসার কপি- পতাকা (গ)</p>
	 			<p>ঘ) পুটআপ লিস্ট- পতাকা (ঘ)</p>
	 			<p>ঙ) চুক্তিপত্রের ফটোকপি- পতাকা (ঙ)</p>
	 			<p>চ) আয়কর চালান, কল্যাণ ও বীমা ফি এবং স্মার্ট কার্ড ফি বাবদ প্রাপ্ত পে অর্ডারের ফটোকপি- পতাকা (চ)</p>
	 			<p>ছ) প্রশিক্ষন সনদ- পতাকা (ছ)</p>
	 			<p>জ) রিক্রুটিং এজেন্সী কর্তৃক দাখিলকৃত 300/- টাকার নন জুডিশিয়াল স্ট্যাম্পে অঙ্গীকারনামা- পতাকা (জ)</p>
	 			<p>ঝ) ইনজাজ কপি- পতাকা (ঝ)</p>
	 			<p>ঞ) রিক্রুটিং এজেন্সির লাইসেন্স নবায়নের মেয়াদ 31/12/2022 পর্যন্ত বলবৎ আছে - পতাকা (ঞ)।</p>
	 		
	 		<!-- end -->
	 		<p>02/ কর্মীর বিবরণ</p>
	    	<!--start--->
	    	<div class="table_section">
	    		<table class="pageBreak">
	    			<tr>
	    				<th style="width: 10mm;">ক্র.নং</th>
	    				<th style="width: 100mm;"> নাম</th>
	    				<th style="width: 40mm;">পাসপোর্ট নম্বর</th>
	    				<th style="width: 60mm">জন্ম তারিখ</th>
	    				<th style="width: 40mm;">ভিসা নাম্বার</th>
	    				<th style="width: 70mm;">পেশা</th>
	    				<th style="width: 40mm;">সত্যায়নরে ক্রমকি নং</th>
	    				<th style="width: 40mm;">সত্যায়নরে তারিখ</th>
	    			</tr>

<?php
$i = 0; $total = 0; 
   foreach ($AllManpowerCustomerList as $ManpowerCustomer) {
  $i++; 
 $CustomerInfo = $this->Accounts_model->Customer_info_for_invoice($ManpowerCustomer->customer_id);
?>
	    			<tr>
	    				<td><?php echo $i;?></td>
	    				<td style="text-align: left;padding-left: 10px;"><?php echo $CustomerInfo->fullname;?></td>
	    				<td style="text-align: left;padding-left: 10px;"><?php echo $CustomerInfo->passport_no;?></td>
	    				<td style="text-align: left;padding-left: 10px;"><?php echo $CustomerInfo->date_of_birth;?></td>
	    				<td style="text-align: left;padding-left: 10px;"><?php echo $CustomerInfo->visa_no;?></td>
	    				<td style="text-align: left;padding-left: 10px;"><?php echo $CustomerInfo->profession;?></td>
	    				<td style="text-align: center;">..</td>
	    				<td style="text-align: center;">..</td>
	    			</tr>
<?php  } ?>

	    		</table>
	    		<!-- start-->
	    		<br>
	    		<p>03/ প্রশিক্ষণ সনদের বিবরণঃ</p>
	    		<table>
	    			<tr>
	    				<th style="width: 15mm;">ক্র.নং</th>
	    				<th style="width: 90mm;">কর্মীর নাম</th>
	    				<th style="width: 50mm;">পাসর্পোট নাম্বার </th>
	    				<th style="width: 40mm;">সনদ নাম্বার</th>
	    				<th style="width: 65mm;">ব্যাচ নম্বর </th>
	    				<th style="width: 40mm;">সিরিয়াল </th>
	    				<th style="width: 100mm;">টিটিসি’র নাম </th>
	    			</tr>
<?php
 $i = 0;
 $total = 0; 
   foreach ($AllManpowerCustomerList as $ManpowerCustomer) {
  $i++; 
 $CustomerInfo = $this->Accounts_model->Customer_info_for_invoice($ManpowerCustomer->customer_id);
?>
	    			<tr>
	    				<td><?php echo $i;?></td>
	    				<td style="text-align: left;padding-left: 10px;"><?php echo $CustomerInfo->fullname;?></td>
	    				<td style="text-align: left;padding-left: 10px;"><?php echo $CustomerInfo->passport_no;?></td>
	    				<td style="text-align: left;padding-left: 10px;"><?php echo $CustomerInfo->certificate_no;?></td>
	    				<td style="text-align: left;padding-left: 10px;"><?php echo $CustomerInfo->batch_no;?></td>
	    				<td style="text-align: left;padding-left: 10px;"><?php echo $CustomerInfo->batch_sl;?></td>
	    				<td style="text-align: left;padding-left: 10px;"><?php echo $CustomerInfo->ttc_name;?></td>
	    			</tr>
<?php  } ?>
	    		</table>
	    	</div>
	    </div>
<br>

	
<!-- part-five end---->

<!-- part-six-start -->
<!-- part-five start---->
	<div class="part-six">
		<div class="part_six_one">
<br>
<br>
<br>
<br>
<br>
<br>
<br>
			<div class="page_sl" style="text-align: center;">
	    		<strong>02</strong><br>
	 		</div>
	 		<div class="flag_details">
	 			<span>05</span><p>/ দাখিলকৃত ভিসার সঠিকতা উল্লেখ পূর্বক উক্ত ভিসা একক কিনা এবং কি পেশা তা যাচাইয়ের নিমিত্ত নথিখানা অনুবাদক শাখায় প্রেরণ করা হলো।</p>
	 			<center><h4>অনুবাদক পৃষ্ঠা- 01-02 &nbsp;&nbsp;&nbsp;&nbsp; পতাকা-ঝ</h4></center>
	 			<p>06/</p>
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
	 			<p>/নোটানুচ্ছেদ 01-05 সদয় দেখা যেতে পারে।নোটানুচ্ছেদ 01 এর (ক হতে T) পর্যন্ত দাখিলকৃত সকল কাগজপত্রাদি পরীক্ষান্তে সঠিক পাওয়া গিয়েছে। </p>
	 			<p>08/নোটানুচ্ছেদ 06 এ অনুবাদক সৌদি আরবের 11 টি ভিসা আবেদনকারী এজেন্সীর নামে উকালাকৃত, স্ট্যাম্পিংকৃত ও সঠিক। ভিসার ধরণ কাজ এবং ভিসাটি একক ভিসা বলে মতামত প্রদান করেন।</p>
	 			<p>09/এমতাবস্থায়, রিক্রুটিং এজেন্সী হোপ-২১ লিমিটেড (আর এল-1215) কর্তৃক আবেদনকৃত সৌদি আরবগামী ১১(এগারো) জন পূরুষ কর্মীর অনূকুলে একক বহির্গমন ছাড়পত্র প্রদানের সদয় অনুমোদন দেয়া যেতে পারে। নথিটি অতিরিক্ত মহাপরিচালক (বহিঃগমন পর্যায়ে নিষ্পত্তিযোগ¨)|</p>
	 		</div>
	 	</div>
	</div>
<!-- part-six-end -->
<div class="part-seven" style="margin-top: 200px;">
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
	<p>
বরাবর<br>
মহা-পরিচালক	<br>						
জনশক্তি কর্মসংস্থান ও প্রশিক্ষণ ব্যুরো<br>
৮৯/২, কাকরাইল, ঢাকা।<br>
<br>
দৃষ্টি আর্কষণ  উপ-পরিচালক (বহিঃর্গমন)।<br>
বিষয় : সৌদি আরবগামী অসত্যায়তি ভিসায় ১১(এগারো)  জন পুরুষ কর্মীর একক বহিঃর্গমন ছাড়পত্র প্রদানের জন্য আবেদন।<br>জনাব,
<br>
<br>
&nbsp;&nbsp;&nbsp;বিনীত নিবেদন এই যে, সৌদি আরব গমনেচ্ছু 11(এগারো) জন কর্মী তাদের স্ব উদ্যেগে সংগৃহীত ভিসা, মূল পাসপোর্ট সহ অন্যান্য কাগজপত্রাদি আমার রিক্রুটিং এজেন্সি হোপ-21 লিমিটেড (আর এল 1215)এর মাধ্যমে বহির্গমন ছাড়পত্র গ্রহনের জন্য জমা দিয়েছে। কর্মীদের নিকট হতে প্রাপ্ত ভিসা সহ নিম্নে বর্ণিত কাগজপত্রাদি এতদসঙ্গে দাখিল করিলাম। ভিসা গুলো আমার অফিসে পরীক্ষান্তে সঠিক পাওয়া গিয়েছে।। কর্মীদের ভিসা ও চুক্তিপত্রে বর্ণিত কোম্পানি, পেশা ,বেতন ভাতাদিসহ অন্যান্য সুযোগ সুবিধা যাচাই করে সঠিক পাওয়া গিয়েছে। উল্যেখ্য যে, ভিসাগুলো 25 এর অধিক বা গ্রুপ ভিসা নহে, এবং কর্মীদের সকল দায় দায়িত্ব রিক্রুটিং এজেন্সী বহন করবে। 
<br>
<br>
&nbsp;&nbsp;&nbsp;অতএব মহোদয় সমীপে বিনীত আরজ  সৌদি আরব গমনেচ্ছু  11(এগারো) জন পুরুষ  কর্মীর  অনুকুলে একক প্রদানের বিষয়ে সদয় মর্জি হয়। 

	</p>
	<br>
	<table style="width: 100%;">
		<tr>
			<td>
				সংযুক্তিঃ<br>
				1) 300 টাকার নন-জুডিশিয়াল সট্যাম্পে অঙ্গীকারনামা।<br>
				2) পাসপোর্ট, চুক্তিপত্র ও ভিসার ফটোকপি।<br>
				3)পে-অর্ডার ও চালানের মূল কপি।<br>
				4) প্রশিক্ষন সনদের মূলকপি।<br>
				5) উপস্থাপিত(PUT UP)তালিকা<br>
				6) কর্মীর ডাটা শীট<br>
			</td>
			<td style="text-align: center;">
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				রিক্রুটিং এজেন্সীর নামঃ হোপ-21 লিমিটেড লিমিটেড<br>
                মালিকের নামঃ মাকবুল আহাম্মেদ<br>
                মালিকের সাক্ষর ও শীলঃ<br>
				তারিখঃ <br>
               টেলিফোন/মোবাইল নাম্বারঃ01711175346   <br>                                                                

			</td>
		</tr>
	</table>
</div>
<!-- part seven end -->
	    </div>
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
