
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
<div class="profile-userbuttons" style="width:100%;">
    <div style="width:20%;color:#fff;text-align:center;float:left;">
		<a class="btn"  onclick="printDiv('printMe')" style="display:block;padding:10px;background:green;">Print</a>
	</div>

</div><br><br>
<?php
 $total = 0; 
	foreach ($AllManpowerCustomerList as $ManpowerCustomer) {       
	$manpower_sl = $ManpowerCustomer->manpower_sl;
    $mptotal = $this->Setting_model->CountSlAll($manpower_sl);
}
?>


	<div class="" style="width:100%;" id="printMe" >
	    <div style="width:80%;margin:0px auto;margin-top: 60px;">
	    <!-- start --->

<?php if($mptotal <= 20){ ?>

<!-- part-five start---->
	<div class="part-five" style="margin-top: 60px;">
		<div class="part_five_sl_one">
			<div class="page_sl" style="text-align: center;">
	    		<strong>০১</strong><br>
	 		 </div>
	 		<div class="flag_details" style="height: 90vh;">
	 			<p>
	 				০১/ রিক্রুটিং এজেন্সী হোপ-২১ লিমিটেড (আর এল-1215) এর স্বত্বাধিকারী সৌদি আরবগামী <b style="font-size: 22px;"><u><?php echo $mptotal;?></u></b>জন পূরুষ কর্মীর অনূকূলে একক বহির্গমন ছাড়পত্র গ্রহণের জন্য আবেদন পত্র সহ নিম্নে বর্ণিত কাগজপত্রাদি দাখিল করেছেন।
	 			</p>
	 			<p>ক) রিক্রুটিং এজেন্সির আবেদন পত্র- পতাকা (খ)</p>
	 			<p>খ) কর্মীর পাসপোর্টের ফটোকপি- পতাকা (খ)</p>
	 			<p>গ) ভিসার কপি- পতাকা (গ)</p>
	 			<p>ঘ) পুটআপ লিস্ট- পতাকা (ঘ)</p>
	 			<p>ঙ) চুক্তিপত্রের ফটোকপি- পতাকা (ঙ)</p>
	 			<p>চ) আয়কর চালান, কল্যাণ ও বীমা ফি এবং স্মার্ট কার্ড ফি বাবদ প্রাপ্ত পে অর্ডারের ফটোকপি- পতাকা (চ)</p>
	 			<p>ছ) প্রশিক্ষন সনদ- পতাকা (ছ)</p>
	 			<p>জ) রিক্রুটিং এজেন্সী কর্তৃক দাখিলকৃত ৩০০/- টাকার নন জুডিশিয়াল স্ট্যাম্পে অঙ্গীকারনামা- পতাকা (জ)</p>
	 			<p>ঝ) ইনজাজ কপি- পতাকা (ঝ)</p>
	 			<p>ঞ) রিক্রুটিং এজেন্সির লাইসেন্স নবায়নের মেয়াদ ৩১/১২/২০২২ পর্যন্ত বলবৎ আছে - পতাকা (ঞ)।</p>
	 		
	 		<!-- end -->
	 		<p>০২/ কর্মীর বিবরণ</p>


	    	<!--start--->
	    	<div class="table_section_flag">
	    		<table class="">
	    			<tr>
	    				<th style="width: 10mm;">ক্র.নং</th>
	    				<th style="width: 150mm;"> নাম</th>
	    				<th style="width: 40mm;">পাসপোর্ট নম্বর</th>
	    				<th style="width: 60mm">জন্ম তারিখ</th>
	    				<th style="width: 40mm;">ভিসা নাম্বার</th>
	    				<th style="width: 80mm;">পেশা</th>
	    				<th style="width: 10mm;">সত্যায়নরে ক্রমকি নং</th>
	    				<th style="width: 10mm;">সত্যায়নরে তারিখ</th>
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
	    		<p>০৩/ প্রশিক্ষণ সনদের বিবরণঃ</p>
	    		<table>
	    			<tr>
	    				<th style="width: 15mm;">ক্র.নং</th>
	    				<th style="width: 150mm;">কর্মীর নাম</th>
	    				<th style="width: 40mm;">পাসর্পোট নাম্বার </th>
	    				<th style="width: 40mm;">সনদ নাম্বার</th>
	    				<th style="width: 40mm;">ব্যাচ নম্বর </th>
	    				<th style="width: 40mm;">সিরিয়াল </th>
	    				<th style="width: 140mm;">টিটিসি’র নাম </th>
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
	   <!-- start--->
	   <br>
	    		<p>০৪/ আয়কর চালান, কল্রাণ ফি, বীমা ফি ও স্মান্ট কাড এর বিববরণী</p>
	    		<table>
	    			<tr>
	    				<th style="width: 75mm;">ফি সমূহ</th>
	    				<th style="width: 100mm;">জন প্রতি হার</th>
	    				<th style="width: 20mm;">কর্মীর সংখ্যা</th>
	    				<th style="width: 50mm;">মোট টাকা</th>
	    				<th style="width: 50mm;"> পে অর্ডার  নম্বর ও তারিখ </th>
	    				<th style="width: 100mm;">ব্যাংক এর নাম ও শাখা </th>
	    			</tr>
	    			<tr>
	    				<td>আয়কর চালাণ</td>
	    				<td>৫০০</td>
	    				<td><?php echo $mptotal;?></td>
	    				<td><?php echo 500 * $mptotal;?></td>
	    				<td>214</td>
	    				<td>সোনালী ব্যাংক, কাকরাইল</td>
	    			</tr>
	    			<tr>
	    				<td>কল্যাণ ও বীমা ফি/td>
	    				<td>(৩৫০০+৪৯০)=৩৯৯০</td>
	    				<td><?php echo $mptotal;?></td>
	    				<td><?php echo  3990 * $mptotal;?></td>
	    				<td>৬১৮১৭৯</td>
	    				<td>উত্তরা ব্যাংক, রাজমনি ঈশাখা</td>
	    			</tr>

	    			<tr>
	    				<td>স্মার্ট কার্ড ফী</td>
	    				<td>২৫০</td>
	    				<td><?php echo $mptotal;?></td>
	    				<td><?php echo  250 * $mptotal;?></td>
	    				<td>৬১৮১৮০</td>
	    				<td>উত্তরা ব্যাংক, রাজমনি ঈশাখা</td>
	    			</tr>
	    		
	    		</table>
	    	</div>
	    </div>
<br>

<?php }else{ ?> 

<!-- part-five start---->
	<div class="part-five" style="margin-top: 60px;">
		<div class="part_five_sl_one">
			<?php $marginbottom = "<br><br><br><br>"?>
			<div style="height: 100vh;<?php 
			if($mptotal <= 20){echo  $marginbottom; }else{'';}?>">
				<div class="page_sl" style="text-align: center;">
	    			<strong>০১</strong><br>
	 			</div>
	 		<div class="flag_details">
	 			<p>
	 				০১/ রিক্রুটিং এজেন্সী হোপ-২১ লিমিটেড (আর এল-1215) এর স্বত্বাধিকারী সৌদি আরবগামী<b style="font-size: 22px;"><u><?php echo $mptotal;?></u></b>জন পূরুষ কর্মীর অনূকূলে একক বহির্গমন ছাড়পত্র গ্রহণের জন্য আবেদন পত্র সহ নিম্নে বর্ণিত কাগজপত্রাদি দাখিল করেছেন।
	 			</p>
	 			<p>ক) রিক্রুটিং এজেন্সির আবেদন পত্র- পতাকা (খ)</p>
	 			<p>খ) কর্মীর পাসপোর্টের ফটোকপি- পতাকা (খ)</p>
	 			<p>গ) ভিসার কপি- পতাকা (গ)</p>
	 			<p>ঘ) পুটআপ লিস্ট- পতাকা (ঘ)</p>
	 			<p>ঙ) চুক্তিপত্রের ফটোকপি- পতাকা (ঙ)</p>
	 			<p>চ) আয়কর চালান, কল্যাণ ও বীমা ফি এবং স্মার্ট কার্ড ফি বাবদ প্রাপ্ত পে অর্ডারের ফটোকপি- পতাকা (চ)</p>
	 			<p>ছ) প্রশিক্ষন সনদ- পতাকা (ছ)</p>
	 			<p>জ) রিক্রুটিং এজেন্সী কর্তৃক দাখিলকৃত ৩০০/- টাকার নন জুডিশিয়াল স্ট্যাম্পে অঙ্গীকারনামা- পতাকা (জ)</p>
	 			<p>ঝ) ইনজাজ কপি- পতাকা (ঝ)</p>
	 			<p>ঞ) রিক্রুটিং এজেন্সির লাইসেন্স নবায়নের মেয়াদ 31/12/2022 পর্যন্ত বলবৎ আছে - পতাকা (ঞ)।</p>
	 		
	 		<!-- end -->
	 		<p>০২/ কর্মীর বিবরণ</p>


	    	<!--start--->
	    	<div class="table_section">
	    		<table class="">
	    			<tr>
	    				<th style="width: 10mm;">ক্র.নং</th>
	    				<th style="width: 150mm;"> নাম</th>
	    				<th style="width: 40mm;">পাসপোর্ট নম্বর</th>
	    				<th style="width: 60mm">জন্ম তারিখ</th>
	    				<th style="width: 40mm;">ভিসা নাম্বার</th>
	    				<th style="width: 80mm;">পেশা</th>
	    				<th style="width: 10mm;">সত্যায়নরে ক্রমকি নং</th>
	    				<th style="width: 10mm;">সত্যায়নরে তারিখ</th>
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

	    	</div>
	    </div>
	</div>
	    		<!-- start-->
	    		<div style="height: 100vh; ">
	    		<p>০৩/ প্রশিক্ষণ সনদের বিবরণঃ</p>

	    		<div class="table_section">
	    		<table>
	    			<tr>
	    				<th style="width: 15mm;">ক্র.নং</th>
	    				<th style="width: 150mm;">কর্মীর নাম</th>
	    				<th style="width: 40mm;">পাসর্পোট নাম্বার </th>
	    				<th style="width: 40mm;">সনদ নাম্বার</th>
	    				<th style="width: 40mm;">ব্যাচ নম্বর </th>
	    				<th style="width: 40mm;">সিরিয়াল </th>
	    				<th style="width: 140mm;">টিটিসি’র নাম </th>
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

	   <!-- start--->
	   <br>
	    		<p>০৪/ আয়কর চালান, কল্রাণ ফি, বীমা ফি ও স্মান্ট কাড এর বিববরণী</p>
	    		<table>
	    			<tr>
	    				<th style="width: 75mm;">ফি সমূহ</th>
	    				<th style="width: 100mm;">জন প্রতি হার</th>
	    				<th style="width: 20mm;">কর্মীর সংখ্যা</th>
	    				<th style="width: 50mm;">মোট টাকা</th>
	    				<th style="width: 50mm;"> পে অর্ডার  নম্বর ও তারিখ </th>
	    				<th style="width: 100mm;">ব্যাংক এর নাম ও শাখা </th>
	    			</tr>
	    			<tr>
	    				<td>আয়কর চালাণ</td>
	    				<td>৫০০</td>
	    				<td><?php echo $mptotal;?></td>
	    				<td><?php echo 500 * $mptotal;?></td>
	    				<td>214</td>
	    				<td>সোনালী ব্যাংক, কাকরাইল</td>
	    			</tr>
	    			<tr>
	    				<td>কল্যাণ ও বীমা ফি/td>
	    				<td>(৩৫০০+৪৯০)=৩৯৯০</td>
	    				<td><?php echo $mptotal;?></td>
	    				<td><?php echo  3990 * $mptotal;?></td>
	    				<td>৬১৮১৭৯</td>
	    				<td>উত্তরা ব্যাংক, রাজমনি ঈশাখা</td>
	    			</tr>

	    			<tr>
	    				<td>স্মার্ট কার্ড ফী</td>
	    				<td>২৫০</td>
	    				<td><?php echo $mptotal;?></td>
	    				<td><?php echo  250 * $mptotal;?></td>
	    				<td>৬১৮১৮০</td>
	    				<td>উত্তরা ব্যাংক, রাজমনি ঈশাখা</td>
	    			</tr>
	    		
	    		</table>
	    	</div>
	    </div>
<br>

<?php } ?>

	
<!-- part-five end---->

<!-- part-six-start -->

<?php if($mptotal <= 20){ ?>

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
	    		<strong>০২</strong><br>
	 		</div>
	 		<div class="flag_details">
	 			<span>০৫</span><p>/ দাখিলকৃত ভিসার সঠিকতা উল্লেখ পূর্বক উক্ত ভিসা একক কিনা এবং কি পেশা তা যাচাইয়ের নিমিত্ত নথিখানা অনুবাদক শাখায় প্রেরণ করা হলো।</p>
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
	 			<p>08/নোটানুচ্ছেদ 06 এ অনুবাদক সৌদি আরবের <b style="font-size: 22px;"><u><?php echo $mptotal;?></u></b> টি ভিসা আবেদনকারী এজেন্সীর নামে উকালাকৃত, স্ট্যাম্পিংকৃত ও সঠিক। ভিসার ধরণ কাজ এবং ভিসাটি একক ভিসা বলে মতামত প্রদান করেন।</p>
	 			<p>09/এমতাবস্থায়, রিক্রুটিং এজেন্সী হোপ-২১ লিমিটেড (আর এল-1215) কর্তৃক আবেদনকৃত সৌদি আরবগামী  <b style="font-size: 22px;"><u><?php echo $mptotal;?></u></b> জন পূরুষ কর্মীর অনূকুলে একক বহির্গমন ছাড়পত্র প্রদানের সদয় অনুমোদন দেয়া যেতে পারে। নথিটি অতিরিক্ত মহাপরিচালক (বহিঃগমন পর্যায়ে নিষ্পত্তিযোগ¨)|</p>
	 		</div>
	 	</div>
	</div>
<?php }else{?>

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
	    		<strong>০৩</strong><br>
	 		</div>
	 		<div class="flag_details">
	 			<span>০৫</span><p>/ দাখিলকৃত ভিসার সঠিকতা উল্লেখ পূর্বক উক্ত ভিসা একক কিনা এবং কি পেশা তা যাচাইয়ের নিমিত্ত নথিখানা অনুবাদক শাখায় প্রেরণ করা হলো।</p>
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
	 			<p>08/নোটানুচ্ছেদ 06 এ অনুবাদক সৌদি আরবের <b style="font-size: 22px;"><u><?php echo $mptotal;?></u></b> টি ভিসা আবেদনকারী এজেন্সীর নামে উকালাকৃত, স্ট্যাম্পিংকৃত ও সঠিক। ভিসার ধরণ কাজ এবং ভিসাটি একক ভিসা বলে মতামত প্রদান করেন।</p>
	 			<p>09/এমতাবস্থায়, রিক্রুটিং এজেন্সী হোপ-২১ লিমিটেড (আর এল-1215) কর্তৃক আবেদনকৃত সৌদি আরবগামী  <b style="font-size: 22px;"><u><?php echo $mptotal;?></u></b> জন পূরুষ কর্মীর অনূকুলে একক বহির্গমন ছাড়পত্র প্রদানের সদয় অনুমোদন দেয়া যেতে পারে। নথিটি অতিরিক্ত মহাপরিচালক (বহিঃগমন পর্যায়ে নিষ্পত্তিযোগ¨)|</p>
	 		</div>
	 	</div>
	</div>
<?php } ?>
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
&nbsp;&nbsp;&nbsp;অতএব মহোদয় সমীপে বিনীত আরজ  সৌদি আরব গমনেচ্ছু  <b style="font-size: 22px;"><u><?php echo $mptotal;?></u></b> জন পুরুষ  কর্মীর  অনুকুলে একক প্রদানের বিষয়ে সদয় মর্জি হয়। 

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
				তারিখঃ <?php echo $MPData->date;?><br>
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
