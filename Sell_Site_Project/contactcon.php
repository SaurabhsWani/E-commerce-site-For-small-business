<?php 
include('security.php');
$query="SELECT * FROM footer";
$sql=mysqli_query($connection,$query);
if (mysqli_num_rows($sql)>0) 
{
	while ($row=mysqli_fetch_assoc($sql)) 
	{

		$to=$row['email'];
	}
}
else
{
	echo "No Contact Found From Admin Site";
	echo '<script>window.location="akihdar"</script>';
}

   	// $to="radhikabadgujar12@gmail.com";
$name=$_POST['fname'];
$email=$_POST['eml'];
$message=$_POST['message'];
$contact=$_POST['phne'];
$headers='From:'.$name.'<'.$email.'>'."\r\n".'Reply-To:'.$email."\r\n".'X-Mailer:PHP'.phpversion();
// Comment this part--
$sql="INSERT INTO distributer (name,email,mobile,msg,status,`DATE`) VALUES('$_POST[fname]','$_POST[eml]','$_POST[phne]','$_POST[message]','unread', CURRENT_TIMESTAMP)";
	mysqli_query($connection,$sql);
	--// Comment this part
$subject="Response from website";
$body="You hace recived follwing details:-\nVisitor Name:-".$name."\nVisitor Email:-".$email."\nVisitor contact:-".$contact."\nVisitor Message:-".$message;
if (mail($to,$subject,$body,$headers)) 
{
	$sql="INSERT INTO distributer (name,email,mobile,msg) VALUES('$_POST[fname]','$_POST[eml]','$_POST[phne]','$_POST[message]')";
	mysqli_query($connection,$sql);
	echo "<script>alert('We Received Your submission.');</script>";
	echo '<script>window.location="akihdar"</script>';
}
else
{
	echo "<script>alert('Sorry, Could not process Submission');</script>";
	echo '<script>window.location="akihdar"</script>';
}

?>