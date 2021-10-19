<?php
	error_reporting(0);
    include("connection.php");
?>
<html>
	<body bgcolor="lightpink">
	<head>
		<title>Pixel6 Assignment</title>
	</head>
	<!-- form and there content -->
	<form method="post" action="submission.php">
	<table border="1" align="center">
		<h1 align="center">Animal Information</h1>
		<tr>
			<td>Name  </td><td><input type="text" name="name" required></td>
		</tr>
		<tr>
			<td>Category</td>
			<td>
				<input type="radio" id="ma" name="r1" value="Herbivores" required><span id="ma">Herbivores</span><br>
				<input type="radio" id="ma" name="r1" value="Omnivores"><span id="ma">Omnivores</span><br>
				<input type="radio" id="ma" name="r1" value="Carnivores"><span id="ma">Carnivores</span><br><br>
			</td>
		</tr>
		<tr>
			<td>Select image to upload:</td>
			<td><input type="file" name="fileToUpload" id="fileToUpload" required>
				  <!-- <input type="submit" value="Upload Image" name="submit"> -->
			</td>
		</tr>
		<tr>
			<td>Description</td><td><Textarea name="descri" rows="2" cols="40" required></Textarea></td>
		</tr>
		<tr>
			<td>Life Expectancy</td>
			<td>
				<select name="lifeExpectancy" size="1" required>
				<option>0-1 year</option>
				<option>1-5 year</option>
				<option>5-10 year</option>
				<option>10+ year</option>
			</td>
		</tr>
		<tr>
			<td>Submit Date:</td>
			<td><input type="date" id="date1" name="date1"></td>
		</tr>
	<!-- form end here -->

	<!-- Capcha start here -->
		<input id="skip_SnapHostID" name="skip_SnapHostID" type="hidden" value="DEMO12345678">
		<input id="skip_WhereToSend" name="skip_WhereToSend" type="hidden" value="support[[]]snaphost.com">
		<input id="skip_WhereToReturn" name="skip_WhereToReturn" type="hidden" value="https://www.snaphost.com/captcha/ThankYou.aspx?isSent=success">
		<input id="skip_Subject" name="skip_Subject" type="hidden" value="Subject test">

<table border="0" cellpadding="5" cellspacing="0">
<tr>
    <td colspan="2" align="center">  </td>
</tr>


<table cellspacing="0" border="0" cellpadding="8" align="center">
<tr style="background-color:#ffcc66; vertical-align:bottom;">
    <td>
        <input id="skip_CaptchaCode" name="skip_CaptchaCode" type="text" style="width:130px;height:48px;font-size:38px;" maxlength="6" required><br>
        <i>Enter web form code</i>
    </td>
    <td>
        <a href="#" onclick="return ReloadCaptchaImage('CaptchaImage');"><span style="font-size:12px;">reload image</span></a><br>
        <a href="https://www.SnapHost.com/captcha/ProCaptchaOverview.aspx"><img id="CaptchaImage" alt="Web Form Code" style="border-width:0px;" src="https://www.SnapHost.com/captcha/CaptchaImage.aspx?id=DEMO12345678"></a>
        <script type="text/javascript" async="" src="https://ssl.google-analytics.com/ga.js"></script><script type="text/javascript">
            function ReloadCaptchaImage(captchaImageId) {
                var obj = document.getElementById(captchaImageId);
                var src = '' + obj.src;
                obj.src = '';
                var date = new Date();
                var pos = src.indexOf('&rad=');
                if (pos >= 0) { src = src.substr(0, pos); }
                obj.src = src + '&rad=' + date.getTime();
                return false;
            }
        </script>
    </td>
</tr>
<!-- Capcha end here -->
		<tr>
			<td colspan="2"><center><input type="submit" name="submit" value="submit"></center></td>
		</tr>
		
	</table>
	</form>
	</body>
</html>

<!-- Code for insert value in database -->
<?php
session_start();
if(isset($_POST["submit"]))
{

	$_SESSION["cnt"]=$_SESSION["cnt"]+1;  //Here pass the value of visits
	

	$name=$_POST['name'];
	$ca=$_POST['r1'];
	$img=$_POST['fileToUpload'];
	$desc=$_POST['descri'];
	$lifeex=$_POST['lifeExpectancy'];
	$date=$_POST['date1'];
	
	$query="insert into animal values ('$name','$ca','$img','$desc','$lifeex','$date')";
	$data=mysqli_query($conn,$query);
	
	if($data)
	{
		// echo "Data Inserted into Database";
		
		header('location:animal.php');  //here redirect the page to animal.php
	}
	else
	{
		echo "Data failed to Inserted in database";
	}
}
?>