<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
	*{margin:0px auto;}
		@media print{ @page { margin:0px;}}
		
		th b{font-size:18px;text-transform: capitalize;}
		th{text-transform: uppercase;font-size:17px;}
	</style>
</head>
<body>
<div class="profile-userbuttons" style="width:100%;">
    <div style="width:20%;color:#fff;text-align:center;float:left;">
		<a class="btn"  onclick="printDiv('printMe')" style="display:block;padding:10px;background:green;">Print</a>
		</div>
	<div style="width:100%;float:left;"></div>
</div>
	<div class="" style="width:100%;" id="printMe" >
	    <div style="width:90%;margin:0px auto;margin-top: 60px;">
        <table cellspacing="0" cellpadding="1" style="line-height:35px;border-color:white;">
            <tr>
                    <th style="text-align:center;">
                        <img src="<?php echo base_url();?>images/icon/1.png" alt="n/a" style="height:150px;">
                        <p style="font-size:28px;font-weight:bold;text-transform: capitalize;">Goverment of the peopl's republic of Bangladesh</p>
                        <p style="font-size:20px;text-transform: capitalize;">Bureau of Manpower,Employment and Training (BMET)</p>
                        <P style="font-weight:bold;font-size:38px;text-transform: capitalize;">JOB SEEKER REGISTRATION FORM</p>
                    </th>
            </tr>
        </table>
<br/>
        <table  style="border-top:2px solid #000;border-left:2px solid #000;border-right:2px solid #000;border-bottom:1px solid #000;width:100%;" >
            <tr>
                 <th style="font-size:12;text-align:center;"><b>Personal Information</b></th>
            </tr>
        </table>


        <table cellspacing="0" cellpadding="1" style="border-top:0px solid #000;border-left:2px solid #000;border-right:2px solid #000;border-bottom:1px solid #000;font-size:12px;line-height:22px;text-align:left;">
            <tr>
                    <th style=" width:50mm;"><b>&nbsp;&nbsp;&nbsp;Name:</b></th>
                    <th style=" width:140mm;">&nbsp;<?php echo $CustomerDataInfo->fullname; ?></th>
                    
            </tr>
            <tr>
                    <th style=" width:50mm;"><b>&nbsp;&nbsp;&nbsp;Father Name:</b></th>
                    <th style=" width:140mm;">&nbsp;<?php echo $CustomerDataInfo->father_name; ?></th>
                    
            </tr>
            <tr>
                    <th style=" width:50mm;"><b>&nbsp;&nbsp;&nbsp;Mother Name:</b></th>
                    <th style=" width:140mm;">&nbsp;<?php echo $CustomerDataInfo->mother_name; ?></th>
                    
            </tr>
            <tr>
                    <th style=" width:50mm;"><b>&nbsp;&nbsp;&nbsp;Spouse's Name:</b></th>
                    <th style=" width:140mm;">&nbsp;<?php echo $CustomerDataInfo->spouse_name; ?></th>
                    
            </tr>
            <tr>
                    <th style=" width:90mm;"><b>&nbsp;&nbsp;&nbsp;Passport Issue Date:</b></th>
                    <th style=" width:100mm;">&nbsp;<?php echo $CustomerDataInfo->D_of_passport_issue; ?></th>
                    
            </tr>
            <tr>
                    <th style=" width:50mm;"><b>&nbsp;&nbsp;&nbsp;Birth Distric:</b></th>
                    <th style=" width:140mm;">&nbsp;<?php echo $CustomerDataInfo->place_of_birth; ?></th>
                    
            </tr>
            <tr>
                    <th style=" width:50mm;"><b>&nbsp;&nbsp;&nbsp;Date of Birth:</b></th>
                    <th style=" width:140mm;">&nbsp;<?php echo $CustomerDataInfo->date_of_birth;?></th>
                    
            </tr>
            <tr>
                    <th style=" width:50mm;"><b>&nbsp;&nbsp;&nbsp;Nationality:</b></th>
                    <th style=" width:55mm;">&nbsp;<?php echo $CustomerDataInfo->pesent_nationality; ?></th>
                    <th style=" width:50mm;text-align:right">&nbsp;<b>SEX:</b></th>
                    <th style=" width:35mm;">&nbsp;<?php echo $CustomerDataInfo->gender; ?></th>
                    
            </tr>
            <tr>
                    <th style=" width:50mm;"><b>&nbsp;&nbsp;&nbsp;Birth of Country:</b></th>
                    <th style=" width:55mm;">&nbsp;<?php echo  $CustomerDataInfo->pesent_nationality; ?></th>
                    <th style=" width:50mm;text-align:right">&nbsp;<b>Marital Status:</b></th>
                    <th style=" width:35mm;">&nbsp;<?php echo  $CustomerDataInfo->marital_status; ?></th>
                    
            </tr>
            <tr>
                    <th style=" width:50mm;"><b>&nbsp;&nbsp;&nbsp;Religion:</b></th>
                    <th style=" width:55mm;">&nbsp;<?php echo $CustomerDataInfo->religion; ?></th>
                    <th style=" width:50mm;text-align:right">&nbsp;<b>Passport No:</b></th>
                    <th style=" width:35mm;">&nbsp;<?php echo $CustomerDataInfo->passport_no; ?></th>
                    
            </tr>
            
            
        </table>
<br/>
<br/>

        <table style="border-top:2px solid #000;border-left:2px solid #000;border-right:2px solid #000;border-bottom:1px solid #000; width:100%;" >
            <tr>
                 <th style="font-size:12;text-align:center;"><b>Address</b></th>
            </tr>
        </table>


        <table style="border-top:0px solid #000;border-left:2px solid #000;border-right:2px solid #000;border-bottom:2px solid #000;font-size:12px;line-height:22px;text-align:left;">
            <tr>
                    <th style=" width:50mm;"><b>&nbsp;&nbsp;&nbsp;Street/Para:</b></th>
                    <th style=" width:140mm;">&nbsp;<?php echo $CustomerDataInfo->para; ?></th>
                    
            </tr>
            <tr>
                    <th style=" width:50mm;"><b>&nbsp;&nbsp;&nbsp;Division:</b></th>
                    <th style=" width:140mm;">&nbsp;<?php echo $CustomerDataInfo->division; ?></th>
                    
            </tr>
            <tr>
                    <th style=" width:50mm;"><b>&nbsp;&nbsp;&nbsp;District:</b></th>
                    <th style=" width:140mm;">&nbsp;<?php echo $CustomerDataInfo->place_of_birth; ?></th>
                    
            </tr>
            <tr>
                    <th style=" width:50mm;"><b>&nbsp;&nbsp;&nbsp;Thana/Upazilla:</b></th>
                    <th style=" width:140mm;">&nbsp;<?php echo $CustomerDataInfo->thana; ?></th>
                    
            </tr>
            <tr>
                    <th style=" width:50mm;"><b>&nbsp;&nbsp;&nbsp;Word/Union:</b></th>
                    <th style=" width:140mm;">&nbsp;<?php echo $CustomerDataInfo->word_union; ?></th>
                    
            </tr>
            <tr>
                    <th style=" width:50mm;"><b>&nbsp;&nbsp;&nbsp;Area/Village:</b></th>
                    <th style=" width:140mm;">&nbsp;<?php echo $CustomerDataInfo->village; ?></th>
                    
            </tr>
            <tr>
                    <th style=" width:50mm;"><b>&nbsp;&nbsp;&nbsp;Post Office:</b></th>
                    <th style=" width:140mm;">&nbsp;<?php echo $CustomerDataInfo->postoffice;?></th>
                    
            </tr>
            <tr>
                    <th style=" width:50mm;"><b>&nbsp;&nbsp;&nbsp;Mobile phone:</b></th>
                    <th style=" width:140mm;">&nbsp;<?php echo $CustomerDataInfo->mobile_no;?></th>
                    <th style=" width:110mm;"></th>
                    
            </tr>
            
        </table>
</div>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>

     <div style="width:90%;margin:0px auto;margin-top: 60px;">
        <table  style="text-align:center;line-height:2px;">
            <tr>
                    <th style="text-align:center;">
                    <img src="<?php echo base_url();?>images/icon/2.png" alt="N/A" style="height:120px;">
                        <br/>
                    <p style="font-size:24px;padding-top:20px;">EMPLOYMENT CONTACT</p>
                    </th>

            </tr>
          </table>
          
    <table style="border-top:1px solid #000;text-align:left;">
        <br/>
        <br>
            <tr>
                    <th style=" width:60mm;"> &nbsp;&nbsp;&nbsp;<b>1<sup>st</sup>Party</b></th>
                    <th style=" width:200mm;font-size:14;"><b>:</b>&nbsp;<?php echo $CustomerDataInfo->Kofile_name_eng; ?></th>

            </tr>

            <tr>
                    <th style=" width:60mm;"> &nbsp;&nbsp;&nbsp;<b>2<sup>nd</sup>Party</b></th>
                    <th style=" width:200mm;font-size:14;"><b>:</b>&nbsp;<?php echo $CustomerDataInfo->fullname; ?> </th>

            </tr>
            <tr>
                    <th style=" width:60mm;"> &nbsp;&nbsp;&nbsp;<b>Passport No</b></th>
                    <th style=" width:200mm;font-size:14px;"><b>:</b>&nbsp;<?php echo $CustomerDataInfo->passport_no; ?></th>

            </tr>
            <tr>
                    <th style=" width:60mm;"> &nbsp;&nbsp;&nbsp;<b>Profession</b></th>
                    <th style=" width:200mm;font-size:10.9;"><b>:</b>&nbsp;<?php echo $CustomerDataInfo->profession; ?></th>

            </tr>
            <tr>
                    <th style=" width:60mm;"> &nbsp;&nbsp;&nbsp;<b>Nationality</b></th>
                    <th style=" width:200mm;font-size:14;"><b>:</b>&nbsp;<?php echo $CustomerDataInfo->pesent_nationality; ?></th>
                    <th style="width:70mm"></th>

            </tr>
    </table>
        <br>
        <table style="text-align:left; line-height:23px;margin-top:0px;" >
            <tr>
                    <th style=" width:10mm;font-size:16px;"><b>1.</b></th>
                    <th style=" width:144mm;font-size:16px;text-transform: none;text-align:justify;font-family:Times New Roman;">That the 1<sup>st</sup> Party shall pay to the 2<sup>2nd</sup> Party a Monthly Salary of SR-1200.
                    </th>

                    <th style=" width:6mm;"></th>
                    <th style=" width:144mm;font-size:16px;text-transform: none;text-align:right;font-family:Times New Roman;">أن يدفع الطرف الأول للطرف الثاني راتبًا شهريًا قدره 1200 ريال
                    </th>
                    <th style="  width:10mm;font-size:10.9;text-align:right;">.1</b></th>

            </tr>

            <tr>
                    <th style=" width:10mm;"><b>2.</b></th>
                    <th style=" width:144mm;font-size:16px;text-transform: none;text-align:justify;font-family:Times New Roman;">The 1<sup>st</sup> party should povide  2<sup>2nd</sup> party free medical,free fooding facilities during the peridod of contract in the Kingdom of Saudi Arabia.
                    </th>

                    <th style=" width:6mm;"></th>
                    <th style=" width:144mm;font-size:16px;text-transform: none;text-align:right;font-family:Times New Roman;">
                     يجب على الطرف الأول توفير مرافق طبية مجانية مجانية للطعام خلال فترة العقد في المملكة العربية السعودية
                   </th>

                    <th style=" width:10mm;font-size:10.9;text-align:right;"><b>.2</b></th>

            </tr>

            <tr>
                    <th style=" width:10mm;font-size:10.9;"><b>3.</b></th>
                    <th style=" width:144mm;font-size:16px;text-transform: none;text-align:justify;font-family:Times New Roman;">That 1<sup>st</sup> shall provide free transportation from resident to the worksite.
                        
                    </th>

                    <th style=" width:6mm;font-size:10.9;"></th>
                    <th style=" width:144mm;font-size:16px;text-transform: none;text-align:right;font-family:Times New Roman;">
                      أن 1 يجب أن توفر مجانا النقل من المقيم إلى موقع العمل. 
                    </th>

                    <th style=" width:10mm;font-size:10.9;text-align:right;"><b>.3</b></th>

            </tr>

            <tr>
                    <th style=" width:10mm;font-size:10.9;font-family:times;"><b>4.</b></th>
                    <th style=" width:144mm;font-size:16px;text-transform: none;text-align:justify;font-family:Times New Roman;">The period of contract is 2(two) years.
                        
                    </th>

                    <th style=" width:6mm;font-size:10.9;"></th>
                    <th style=" width:144mm;font-size:16px;text-transform: none;text-align:right;font-family:Times New Roman;">
                      مدة العقد هي 2 (سنتان).
                    </th>

                    <th style=" width:10mm;font-size:10.9;text-align:right;font-family:times;"><b>.4</b></th>

            </tr>
            <tr>
                    <th style=" width:10mm;font-size:10.9;font-family:times;"><b>5.</b></th>
                    <th style=" width:144mm;font-size:16px;text-transform: none;text-align:justify;font-family:Times New Roman;">That the 1<sup>st</sup> party shall bear the passage cost from Dhaka to K.S.A and back to for joining the service and the return ticket would provide and after completion of this agreement. 
                    </th>

                    <th style=" width:6mm;font-size:10.9;"></th>
                    <th style=" width:144mm;font-size:16px;text-transform: none;text-align:right;font-family:Times New Roman;">
                     أن يتحمل الطرف الأول تكلفة المرور من دكا إلى K.S.A والعودة إلى للانضمام إلى الخدمة وستوفر تذكرة r eturnn بعد الانتهاء من هذا 
                    </th>

                    <th style=" width:10mm;font-size:10.9;text-align:right;font-family:times;"><b>.5</b></th>

            </tr>

            <tr>
                    <th style=" width:10mm;font-size:10.9;font-family:times;"><b>6.</b></th>
                    <th style=" width:144mm;font-size:16px;text-transform: none;text-align:justify;font-family:Times New Roman;">Daily working hours shall be eight hours.
                        
                    </th>

                    <th style=" width:6mm;font-size:10.9;"></th>
                    <th style=" width:144mm;font-size:16px;text-transform: none;text-align:right;font-family:Times New Roman;">
                     يجب أن تكون ساعات العمل اليومية ثماني ساعات
                        
                    </th>

                    <th style="width:10mm;font-size:10.9;text-align:right;font-family:times;"><b>.6</b></th>

            </tr>

            <tr>
                    <th style=" width:10mm;font-size:10.9;font-family:times;"><b>7.</b></th>
                    <th style=" width:144mm;font-size:16px;text-transform: none;text-align:justify;font-family:Times New Roman;">That this agreement shall come in effect from the date of arrival of the 2<sup>nd</sup> party in the K.S.A.
                    
                    </th>

                    <th style=" width:6mm;font-size:10.9;"></th>
                    <th style=" width:144mm;font-size:16px;text-transform: none;text-align:justify;font-family:Times New Roman;">
                         يبدأ سريان مفعول هذه الاتفاقية من تاريخ وصول الطرف الثاني إلى الولايات المتحدة
                    </th>

                    <th style=" width:10mm;font-size:10.9;text-align:right;font-family:times;"><b>.7</b></th>

            </tr>


            <tr>
                    <th style=" width:10mm;font-size:10px;font-family:times;"><b>8.</b></th>
                    <th style=" width:144mm;font-size:16px;text-transform: none;text-align:justify;font-family:Times New Roman;">That the 2<sup>nd</sup> party should under take to abide by the instruction and rules enforced in the kingdom or Saudi Arabia.
                    
                    </th>

                    <th style=" width:6mm;font-size:10.9;"></th>
                    <th style=" width:144mm;font-size:16px;text-transform: none;text-align:justify;font-family:Times New Roman;">
                     أن يلتزم الطرف الثاني بالالتزام بالتعليمات والقواعد المعمول بها في المملكة أو المملكة العربية السعودية
                    
                    </th>

                    <th style=" width:10mm;font-size:10px;text-align:right;font-family:times;"><b>.8</b></th>

            </tr>

            <tr>
                    <th style=" width:10mm;font-size:10.9;"><b>9.</b></th>
                    <th style=" width:144mm;font-size:16px;text-transform: none;text-align:justify;font-family:Times New Roman;">That the any other terms and conditions not mentioned in the demmand letter shall be following as.
                    
                    </th>

                    <th style=" width:6mm;font-size:10.9;"></th>
                    <th style=" width:144mm;font-size:16px;text-transform: none;text-align:justify;font-family:Times New Roman;">
                    أن أي شروط وأحكام أخرى لم يرد ذكرها في خطاب  يجب أن تتبع وفقا لقوانين العمل السعودية 
                      
                    </th>

                    <th style=" width:10mm;font-size:10.9;text-align:right;"><b>.9</b></th>

            </tr>

            
        </table>

        <table cellspacing="0" cellpadding="1" >
            <tr>
                    <th style=" width:95mm;font-size:16;font-wieght:bold;text-align:left;text-transform: none;"><u>Signature of the the 1<sup>st</sup> Party</u></th>

                    <th style=" width:90mm;font-size:16;font-wieght:bold;text-align:center;text-transform: none;">
                        
                <img src="<?php echo base_url();?>images/<?php echo $SiteData->stemp_image;?>" style="height:140px;">
                    </th>
                    <th style=" width:110mm;font-size:16; text-align:right;font-wieght:bold;text-transform: none;"><u>Signature of the 2<sup>nd</sup> Party </u></th>

            </tr>
            
        </table>
</div>

   <!-- <div class="cover_image">
        <img src="<?php echo base_url();?>images/cover/pad_header.png" style="width:100%;">
    </div>--><br><br><br><br><br><br><br><br><br>
            <div  style="font-size:10.9;text-align:left;width:80%;margin:0px auto;margin-top: 120px;margin-bottom: 255px;">
                 <div  style="font-size:10.9;text-align:left;width:80%;margin:0px auto;margin-top: 120px;margin-bottom: 255px;">
            বরাবর  <br>
            সহকারী পরিচালক<br>
            কর্মসংস্থান ও প্রশিক্ষণ ব্যুরো<br>
            বিষয়: তিন দিনের ব্রিফিং ও ট্রেনিং এর জন্য আবেদন ।
            <br><br>    মহোদয়,<br><br>

            বিনীত নিবেদন এই যে, তিন দিনের ট্রেনিংয়ের নিমিত্তে সৌদি আরবগামী একজন কর্মীর তালিকা প্রদান করা হলো |

          <br>
        <table style="border-spacing: 0px;width:100%;height:80px;">
         <br> <br>
            <tr style="line-height:9px;">
              <th style=" width:20mm;font-size:12;border:1px solid #000;text-align:center;"><b>SL.NO.</b></th>
              <th style=" width:110mm;font-size:12;text-align:center;border:1px solid #000;"><b>NAME</b></th>
              <th style=" width:60mm;font-size:12;text-align:center;border:1px solid #000;"><b>PASSPORT NO.</b></th>

            </tr>
            <tr style="line-height:9px;">
              <th style=" width:20mm;font-size:12;border:1px solid #000;text-align:center;"><b>01</b></th>
              <th style=" width:110mm;font-size:12;text-align:center;border:1px solid #000;"><b><?php echo $CustomerDataInfo->fullname; ?></b></th>
              <th style=" width:60mm;font-size:12;text-align:center;border:1px solid #000;"><b><?php echo $CustomerDataInfo->passport_no; ?></b></th>

            </tr>
          
       
        </table>
             <br>
            <div>
               অতএব, উক্ত তালিকা মোতাবেক ট্রেনিং করার জন্য আপনার একান্ত সহযোগিতা এবং সু মর্জি কামনা করছি |
            </div>
 
          <div style="width:30%;float:left;">
                <img src="<?php echo base_url();?>images/<?php echo $SiteData->stemp_image;?>" style="height:140px;margin-top: 100px;margin-left: 40px;">
         </div>   

         <div style="width:70%;float:left;text-align: right;">

              <br>
                <br>
                <br>
              <br>
                <br>
                <br>
             <b style="padding-right:40px;color:purple;font-size:22px;">MR-21 LIMITED</b>
                <br>
                
            <b style="padding-right:45px;color:purple;font-size:22px;">General Manager </b>
            <br>
            <b style="padding-right:40px;font-size:22px;">বিনীত নিবেদক </b>
            <br>
                <img src="<?php echo base_url();?>images/<?php echo $SiteData->signature_image;?>" style="height:140px;margin-top: 10px;margin-left: 40px;">
         </div>
      </div>

   <!-- <div class="cover_image" style="margin-top: 50px;" >
        <img src="<?php echo base_url();?>images/cover/pad_footer.png" style="width:100%;">
    </div>-->
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