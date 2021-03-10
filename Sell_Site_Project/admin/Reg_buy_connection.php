<?php
include('security.php');
$First_Name = filter_input(INPUT_POST,'First_Name');
$Last_Name = filter_input(INPUT_POST,'Last_Name');
$State= filter_input(INPUT_POST,'State');
$Email=filter_input(INPUT_POST,'Email');
$Mobile = filter_input(INPUT_POST,'Mobile');
$Password=filter_input(INPUT_POST,'password');
$Adhaar=filter_input(INPUT_POST,'Adhaar');
$Password2=filter_input(INPUT_POST,'password2');
if(!empty($Password)&&($Password==$Password2))
{
  if (mysqli_connect_error())
  {
   die('connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
 }
 else
 {
   if(is_uploaded_file($_FILES['adimg']['tmp_name']))
   {
    $image=$_FILES['adimg']['tmp_name'];
    $image2=$_FILES['adimg']['name'];
  }
  $target="image/".$_FILES['adimg']['name'];
  $query="SELECT Email FROM b_person ";
  $result=mysqli_query($connection,$query);
  $passcode=mysqli_fetch_array($result);
  if($passcode['Email']==$Email)
  {
    $_SESSION['Status']="Already Register With This Email Please Enter Different Email OR login";
    header("refresh:1; url=tables.php");
  }
  else
  {
    $sql="INSERT INTO b_person(First_Name,Last_Name,Adhaar,Mobile,Email,Password,image) VALUES ('$First_Name','$Last_Name','$Adhaar','$Mobile','$Email','$Password','$image2')";

    if ($connection->query($sql)) 
    {
      if(move_uploaded_file($image,$target))
      {
        $_SESSION['Success']="User profile added";
        echo '<script>window.location="tables.php"</script>';
      }
    }
    else
    {
      $_SESSION['Status']="User profile Not added";
    }
    $conection->close();
  }
}
}
else
{
  if(!($Password==$Password2))
    $_SESSION['Status']="Password Do not Match";
  else
   $_SESSION['Status']="Enter Password";
}
?>