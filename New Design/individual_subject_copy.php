<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<?php
    include("../connection.php");
	$course=trim($_GET['course']);
	$course_id='';
	$full='';
	if(isset($_GET['select']))
	{
	   $full=$_GET['select'];
	}
	if($course == trim('TestQ CBSE(Mega)'))
	{
	  $course_id='testq_mega';
          $course_name='TestQ CBSE (Prime)';
	}
	else if($course == trim('TestQ CBSE(Mini)'))
	{
	  $course_id='testq_mini';
          $course_name='TestQ CBSE (Basic)';
	}
	else if(strcmp(str_replace(' ','',$course),str_replace(' ','','Conquer CBSE TestQ CBSE(Mega)')) == 0)
	{
	  $course_id='conquer_testq';
          $course_name='Booster CBSE (Prime)'; 
	}
	else if(strcmp(str_replace(' ','',$course),str_replace(' ','','Conquer CBSE TestQ CBSE(Mini)')) == 0)
	{
	  $course_id='conquer_testq_mini';
          $course_name='Booster CBSE (Basic)';  
	}
	else if(strcmp(str_replace(' ','',$course),str_replace(' ','','TestQ CBSE(Mega) DoubtFire')) == 0)
	{
	  $course_id='testq_doubtfire';
         $course_name='TestQ CBSE (Superior)';
	}
	else if(strcmp(str_replace(' ','',$course),str_replace(' ','','Conquer CBSE  DoubtFire TestQ CBSE(Mega)')) == 0)
	{
	  $course_id='conquer_doubt_testq';
          $course_name='Triumph CBSE';  
	}
	else if(strcmp(str_replace(' ','',$course),str_replace(' ','','Conquer CBSE Doubt Fire')) == 0)
	{
	  $course_id='conquer_doubt_fire';
          $course_name='Conquer CBSE (Superior)';
	}
	else if($course == trim('Conquer CBSE'))
	{
	  $course_id='conquer_cbse';
          $course_name='Conquer CBSE';
	}
	else
	{
	}
         $course_code=$course_id;
         $course_code=substr($course_code,0,7);
?>
<html>
<head>
<script language="javascript" src="jquery.js"></script>
</head>

<h1 class="select-subject-text">Please select the subject for following
                    course:</h1>
                <div class="select-div">
                    <div class="checkboxes">
                        <label class="pure-material-checkbox">
                            <input type="checkbox" name="Physics" id="Physics" value="p" onClick="get_fee();"
                                onDblClick="fun_uncheck('Physics');">
                            <span>Physics</span>
                        </label>
                    </div>
                    <div class="checkboxes">
                        <label class="pure-material-checkbox">
                            <input type="checkbox" name="Chemistry" id="Chemistry" value="c" onClick="get_fee();"
                                onDblClick="fun_uncheck('Chemistry');">
                            <span>Chemistry </span>
                        </label>
                    </div>
                    <div class=" checkboxes">
                        <label class="pure-material-checkbox">
                            <input type="checkbox" name="Maths" id="Maths" value="m" onClick="get_fee();"
                                onDblClick="fun_uncheck('Maths');">
                            <span>Maths</span>
                        </label>
                    </div>
                    <div class="md-radio-new">
                        <input type="radio" name="Biology" id="Biology" value="b" onClick="get_fee();"
                            onDblClick="fun_uncheck('Biology');">
                        <label for="Biology" class="md-radio-text">Biology</label>
                    </div>
                    <div class="md-radio-new">
                        <input type="radio" name="English" id="English" value="e" onClick="get_fee();"
                            onDblClick="fun_uncheck('English');">
                        <label for="English" class="md-radio-text">English </label>
                    </div>
                </div>
                <table id="hor-minimalist-b" class="table">
                    <!-- <tr><td colspan="2" align="center"><b style="font-size:14px">Please select the subject for following course: <?php echo $course_name; ?></b></td></tr>
 -->
                    <!-- <tr><td><b style="font-size:14px;">Select Subject</b></td>
<td> -->
                    <!-- <input type="checkbox" name="Physics" id="Physics" value="p" onClick="get_fee();" onDblClick="fun_uncheck('Physics');"> Phy <input type="checkbox" name="Chemistry" id="Chemistry" value="c" onClick="get_fee();" onDblClick="fun_uncheck('Chemistry');"> Chem <input type="checkbox" name="Maths" id="Maths" value="m" onClick="get_fee();" onDblClick="fun_uncheck('Maths');"> Maths <input type="checkbox" name="Biology" id="Biology" value="b" onClick="get_fee();" onDblClick="fun_uncheck('Biology');"> Bio <input type="checkbox" name="English" id="English" value="e" onClick="get_fee();" onDblClick="fun_uncheck('English');"> Eng
 &nbsp; &nbsp; <label id="choose" style="display:none; color:#993300">(Choose Maths or Bio)</label></td> </tr> -->

                    <?php
     if($full =='full')
	 {
	   echo "<script language='javascript'>$('#choose').show(); $('#Physics').attr('checked','checked');$('#Chemistry').attr('checked','checked');$('#English').attr('checked','checked'); get_fee();</script>";
	 }
	 ?>
                    <input type="hidden" name="course" id="course" value="<?php echo $course; ?>">
                    <input type="hidden" name="course_code" id="course_code" value="<?php echo $course_code; ?>">
                    <tr>
                        <td>
                            <table class="table table-striped table-bordered">
                                <tr>
                                    <td><span>Net Amount</span></td>
                                    <td><span data-prefix>Rs. </span><span id="net_amount"> </span></td>
                                </tr>
                                <tr>
                                    <td><span>GST</span></td>
                                    <td><span data-prefix>Rs. </span><span id="service_tax"> </span></td>
                                </tr>
                                <tr id="courier_charges">
                                    <td><span>Courier Charges</span></td>
                                    <td><span data-prefix>Rs. </span><span id="courier"></span></td>
                                </tr>
                                <tr>
                                    <td><span>Amount Received</span></td>
                                    <td><span data-prefix>Rs. </span><span id="amount_to_pay"> </span></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <!-- <tr  valign="top"><td  valign="top" colspan="2" align="right" style="padding-right:30px; height:50px; padding-top:20px;  padding-bottom:20px; vertical-align:top"> 
 -->
                </table>

                <input type="button" class="btn btn-dark" style="margin:0 auto;display:block" id="register"
                    name="register" value="PAY NOW" onClick="pay_now();">
</body>
</html>

<script language="javascript">
get_fee();
function fun_uncheck(p)
{
   if(document.getElementById(p).checked==true)
   {
      document.getElementById(p).checked=false;
   }
   get_fee();
}

function pay_now()
{
       var net_amount=$('#net_amount').html();
      var amount_pay=$('#amount_to_pay').html();
       var subject = '';
	       if($('#Physics').is(':checked'))
		   {
			  subject = 'P';
		   }
		   if($('#Chemistry').is(':checked')){
			  subject = subject+'C';
		   }
		   if($('#Maths').is(':checked')){
			  subject = subject+'M';
		   }
		   if($('#Biology').is(':checked')){
			  subject = subject+'B';
		   }
		   if($('#English').is(':checked')){
			  subject = subject+'E';
		   }
	          var course=$('#course').val();
                  var course_code=$('#course_code').val();
		        var today = new Date();
				var dd = today.getDate();
				var mm = today.getMonth()+1;     //January is 0!
				var yyyy = today.getFullYear();
				 if(dd<10) {
					dd='0'+dd
				 }  
				 if(mm<10) {
					mm='0'+mm
			   	} 
			today = Math.floor((Math.random()*100)+1)+mm+'-'+dd+'-'+yyyy;
		        var code=course_code+'_'+subject+'_'+today;
	   if(net_amount != '' && subject != '')
	   {
	       parent.window.location='paynow_ccavenue.php?code='+code+'&fees='+amount_pay;
	   }
}

function get_fee()
{
   var subject=0;
   if($('#Physics').is(':checked')){
      subject = subject+1;
   }
   if($('#Chemistry').is(':checked')){
      subject = subject+1;
   }
   if($('#Maths').is(':checked')){
      subject = subject+1;
   }
   if($('#Biology').is(':checked')){
      subject = subject+1;
   }
   if($('#English').is(':checked')){
      subject = subject+1;
   }
     var course="<?php echo $course_id; ?>";
     $.ajax({
      type: 'POST',
      url: '../get_fee_detail.php',
      data: 'subject='+subject+'&course='+course,
      beforeSend: function() {
	  },
      success: function(response){
 	        var amount_1 = response.split("::");
                var amount_to_pay=parseInt(amount_1[0]);
                var courier=parseInt(amount_1[1]);
                        if(courier == '0' || isNaN(courier))
                        {
                           $('#courier_charges').hide();    
                        }
                       else
                        { 
                           $('#courier_charges').show();      
                           $('#courier').html(courier);
                        }   
		var net_amount=Math.round((amount_to_pay/118)*100);
		var service_tax=Math.round(amount_to_pay) - Math.round((amount_to_pay/118)*100);  // Math.round(amount_to_pay/12.36);
	          if(!isNaN(amount_to_pay))
		  {
		     $('#amount_to_pay').html(amount_to_pay+courier);   
		  }
		  else
		  {
		      $('#amount_to_pay').html('0');   
		  }
		  if(!isNaN(net_amount))
		  {
		     $('#net_amount').html(net_amount);
		  }
		  else
		  {
		        $('#net_amount').html('0');
		  }
	         if(!isNaN(service_tax))
		  {
		     $('#service_tax').html(service_tax);
		  }
		  else
		  {
		       $('#service_tax').html('0');
		  }
		} 
      });     
}
</script>