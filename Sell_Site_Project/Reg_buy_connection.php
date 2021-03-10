<?php
include('security.php');
$Name = filter_input(INPUT_POST,'First_Name');
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
  $target="admin/image/".$_FILES['adimg']['name'];
  $query="SELECT Email FROM b_person";
  $result=mysqli_query($connection,$query);
  $passcode=mysqli_fetch_array($result);
  if($passcode['Email']==$Email)
  {
   echo "<script>alert(\"Already Register With This Email Please Enter Different Email OR login\")</script>";
   header("refresh:1; url=barwas");
 }
 else
 {
  $sql="INSERT INTO b_person(Name,Adhaar,Mobile,Email,Password,image) VALUES ('$Name','$Adhaar','$Mobile','$Email','$Password','$image2')";

  if ($connection->query($sql)) 
  {
    if(move_uploaded_file($image,$target))
    {
      $last_id = $connection->insert_id;
      $b = array();
      $cp=serialize($b);
      $sqla="INSERT INTO wishcartbuy(id,wish,cart,buy) VALUES('$last_id','$cp','$cp','$cp')";
      if ($connection->query($sqla)) 
      {
        echo '<script>alert(\"You can Login now\")</script>';
        echo '<script>window.location="user/ulogin.php"</script>';
      }
    }
  }
  else
  {
    echo "Error: ".$sql."<br>".$connection->error;
  }
  $connection->close();
}
}
}
else
{
  if(!($Password==$Password2))
  {
   echo "<script>alert(\"Password Do not Match\")</script>";
 }
 else
 {
   echo "<script>alert(\"Enter Password\")</script>";
 }
}
?>