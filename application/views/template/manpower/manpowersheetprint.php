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
    $mptotal = $this->Setting_model->CountSlAll($manpower_sl);
}
?>

<?php if($mptotal <= 20){ ?>

	<div class="" style="width:100%;" id="printMe" >
	    <div style="width:80%;margin:0px auto;margin-top: 60px;">
	    <!-- start --->

	    <div class="page_one" style="margin-top:300px;height: 100vh;">
	    	<div class="page_sl">
	    			<center><strong>পাতা -০১</strong></center><br>
	    			<p style="color: #000; text-align: justify;">সৌদি আরব গামী নিম্নলিখিত <b style="font-size: 22px;"><u><?php echo $mptotal; ?></u></b> জন র্কমী প্ররেণ সংক্রান্ত রিক্রুটিং এজন্সেী হোপ-২১ লমিটিডে (আর এল নং- ১২১৫ এর অঙ্গীকারনামা ,সৌদি আরব-গামী সত্যায়িত <b style="font-size: 22px;"><u><?php echo $mptotal; ?></u></b> জন পুরুষ কর্মীর তালিকা:</p>
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
	    		<strong>চলমান পাতা-০২</strong><br>
	    	</div>
	    </div><!-- page one --- end--->

<!----- page tow start-------------------->
	<div class="page_second" style="height: 100vh;">
		<div class="page_sl" style="text-align: center;">
	    	<strong> পাতা-০২</strong><br>
	    	<h4 style="text-align: justify;line-height: 35px;">
	    		আমি রিক্রুটিং  এজেন্সী হোপ-২১ লমিটিডে (আর এল নং- ১২১৫) এর স্বত্তাধিকারি/ব্যবস্থাপনা অংশীদার /ব্যবস্থাপনা পরিচালক এই মর্মে অঙ্গীকার করছি যে , চাকুরির উদ্যেশে সৌদি আরব দেশের বিভিন্ন নিয়োগকর্তার অধীনে বর্ণিত <b style="font-size: 22px;"><u><?php echo $mptotal; ?></u></b>  জন কর্মীর একক বহির্গমন ছাড়পত্র গ্রহনরে নমিত্তি র্কমীদরে ভিসা, চুক্তপিত্রসহ  অন্যান্য প্রয়োজনীয় কাগজপত্র দাখিল করিলাম যাহা সঠিক আছে |উপরোক্ত কর্মীদের সৌদি আরব বিমানবন্দরে নিয়োগকর্তা/নিয়োগকর্তার প্রতিনিধি গ্রহণ করবেন এবং বর্ণিত  র্কমীগণকে  সৌদি আরব দশেে প্ররেণরে জন্য বহির্গমন ছাড়পত্র গ্রহনরে পর উক্ত দেশ ব্যতীত অন্যকোন দেশে প্ররেণ করবনা র্মমে অঙ্গীকার করছি | আমি আরও অংগীকার করছি যে উপরোক্ত র্কমীদরে ভিসা,নিয়োগপত্র, চুক্তিপত্র সঠিক আছে। কর্মীগণ বিদেশে যাওয়ার পর সংশ্লষ্টি নিয়োগকর্তার অধীনে নির্ধারিত পশোয় চাকরি প্রদানের নিশ্চয়তা প্রদান করছি, এবংকর্মীগণ বিদেশ যাওয়ার পর চুক্তিপত্র অনুযায়ী বেতন ভাতাদি এবং অন্যান্য সুযোগ সুবধিা প্রাপ্য না হলে তার সকল দায়-দায়ত্বি বহন করব এবংকর্মীদের যাবতীয় ক্ষতিপূরণ দিতে বাধ্য থাকবি। আরও অংগীকার করছি যে ,কর্মীদের নিকট হতে সরকার কর্তৃক নির্ধারিত অভিবাসন ব্যয় এর বেশি  ব্যয় গ্রহণ করা হয়নি |
	    	</h4>  
	    	 </div>

	    	<div class="page_sl " style="text-align: right;">
	    			<strong>চলমান পাতা-০৩</strong><br>
	    	</div>
	</div>
<!------page tow end---------------------->

<br><br><br><br>

<!--- page three -------------------->
	<div class="page_three">
		<div class="page_sl" style="text-align: center;">
	    	<strong> পাতা-০৩</strong><br>
	    	<h3 style="text-align: justify;line-height: 60px;">
	    		উপরোক্ত অংগীকার নামায় বর্ণিত বিষয়ের কোন ব্যাতয় ঘটলে প্রবাসী কল্যাণ ও বৈদেশিক কর্মসংস্থান মন্ত্রণালয় অথবা জনশক্তি কর্মসংস্থাণ ও প্রশিক্ষণ ব্যুারো আমার বা আমার রিক্রুটিং  এজেন্সির বিরুদ্ধে বৈদেশিক কর্মসংস্থান ও অভিবাসী আইন-2013 অনুযায়ী যেকোন ব্যাবস্থা গ্রহণ করতে পারবে।
				এই অংগীকারনামায় আমি স্বেচ্ছায়,স্ব-জ্ঞানে, সুস্থ মস্তিষ্কে এবং কারো কথায় প্ররোচিত না হয়ে সাক্ষর করলাম। 
	    	</h3>
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


<?php }else{ ?> 

	<div class="" style="width:100%;" id="printMe" >
	    <div style="width:80%;margin:0px auto;margin-top: 60px;">
	    <!-- start --->

	    <div class="page_one" style="margin-top:300px;height: 100vh;">
	    	<div class="page_sl">
	    			<center><strong>পাতা -0১</strong></center><br>
	    			<p style="font-family: SutonnyOMJ">সৌদি আরব গামী নিম্নলিখিত <b style="font-size: 22px;"><u><?php echo $mptotal; ?></u></b>  জন র্কমী প্ররেণ সংক্রান্ত রিক্রুটিং এজন্সেী হোপ-২১ লমিটিডে (আর এল নং- ১২১৫ এর অঙ্গীকারনামা ,সৌদি আরব-গামী সত্যায়িত <b style="font-size: 22px;"><u><?php echo $mptotal; ?></u></b>  জন পুরুষ কর্মীর তালিকা:</p>
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
	    		<strong>চলমান পাতা-০২</strong><br>
	    	</div>
	    </div><!-- page one --- end--->


	    <!-- end  --->
	    <div class="page_one" style="margin-top:90px;height: 95vh;">
	    	<div class="page_sl">
	    			<center><strong>পাতা -০২</strong></center><br>
	    			<p style="font-family: SutonnyOMJ">সৌদি আরব গামী নিম্নলিখিত <b style="font-size: 22px;"><u><?php echo $mptotal; ?></u></b> জন র্কমী প্ররেণ সংক্রান্ত রিক্রুটিং এজন্সেী হোপ-২১ লমিটিডে (আর এল নং- ১২১৫ এর অঙ্গীকারনামা ,সৌদি আরব-গামী সত্যায়িত <b style="font-size: 22px;"><u><?php echo $mptotal; ?></u></b>  জন পুরুষ কর্মীর তালিকা:</p>
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
	    			<strong>চলমান পাতা-০৩</strong><br>
	    	</div>
	    </div><!-- page one --- end--->


<!----- page tow start-------------------->
	<div class="page_second" style="height: 100vh;">
		<div class="page_sl" style="text-align: center;">
	    	<strong> পাতা-০৩</strong><br>
	    	<h4 style="text-align: justify;line-height: 35px;">
	    		আমি রিক্রুটিং  এজেন্সী হোপ-২১ লমিটিডে (আর এল নং- ১২১৫) এর স্বত্তাধিকারি/ব্যবস্থাপনা অংশীদার /ব্যবস্থাপনা পরিচালক এই মর্মে অঙ্গীকার করছি যে , চাকুরির উদ্যেশে সৌদি আরব দেশের বিভিন্ন নিয়োগকর্তার অধীনে বর্ণিত <b style="font-size: 22px;"><u><?php echo $mptotal; ?></u></b>  জন কর্মীর একক বহির্গমন ছাড়পত্র গ্রহনরে নমিত্তি র্কমীদরে ভিসা, চুক্তপিত্রসহ  অন্যান্য প্রয়োজনীয় কাগজপত্র দাখিল করিলাম যাহা সঠিক আছে |উপরোক্ত কর্মীদের সৌদি আরব বিমানবন্দরে নিয়োগকর্তা/নিয়োগকর্তার প্রতিনিধি গ্রহণ করবেন এবং বর্ণিত  র্কমীগণকে  সৌদি আরব দশেে প্ররেণরে জন্য বহির্গমন ছাড়পত্র গ্রহনরে পর উক্ত দেশ ব্যতীত অন্যকোন দেশে প্ররেণ করবনা র্মমে অঙ্গীকার করছি | আমি আরও অংগীকার করছি যে উপরোক্ত র্কমীদরে ভিসা,নিয়োগপত্র, চুক্তিপত্র সঠিক আছে। কর্মীগণ বিদেশে যাওয়ার পর সংশ্লষ্টি নিয়োগকর্তার অধীনে নির্ধারিত পশোয় চাকরি প্রদানের নিশ্চয়তা প্রদান করছি, এবংকর্মীগণ বিদেশ যাওয়ার পর চুক্তিপত্র অনুযায়ী বেতন ভাতাদি এবং অন্যান্য সুযোগ সুবধিা প্রাপ্য না হলে তার সকল দায়-দায়ত্বি বহন করব এবংকর্মীদের যাবতীয় ক্ষতিপূরণ দিতে বাধ্য থাকবি। আরও অংগীকার করছি যে ,কর্মীদের নিকট হতে সরকার কর্তৃক নির্ধারিত অভিবাসন ব্যয় এর বেশি  ব্যয় গ্রহণ করা হয়নি |
	    	</h4>  
	    	 </div>

	    	<div class="page_sl " style="text-align: right;">
	    			<strong>চলমান পাতা-০৪</strong><br>
	    	</div>
	</div>
<!------page tow end---------------------->

<br><br><br><br>

<!--- page three -------------------->
	<div class="page_three">
		<div class="page_sl" style="text-align: center;">
	    	<strong> পাতা-০৪</strong><br>
	    	<h3 style="text-align: justify;line-height: 60px;">
	    		উপরোক্ত অংগীকার নামায় বর্ণিত বিষয়ের কোন ব্যাতয় ঘটলে প্রবাসী কল্যাণ ও বৈদেশিক কর্মসংস্থান মন্ত্রণালয় অথবা জনশক্তি কর্মসংস্থাণ ও প্রশিক্ষণ ব্যুারো আমার বা আমার রিক্রুটিং  এজেন্সির বিরুদ্ধে বৈদেশিক কর্মসংস্থান ও অভিবাসী আইন-2013 অনুযায়ী যেকোন ব্যাবস্থা গ্রহণ করতে পারবে।
				এই অংগীকারনামায় আমি স্বেচ্ছায়,স্ব-জ্ঞানে, সুস্থ মস্তিষ্কে এবং কারো কথায় প্ররোচিত না হয়ে সাক্ষর করলাম। 
	    	</h3>
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

<?php }?>

<
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
