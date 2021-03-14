<?php
include('security.php');
require('functions.php');
$id1 = $_POST['id'];
$url=$_SERVER['HTTP_REFERER'];
if ($_POST['Update']=="del") 
{
	$sql="DELETE  FROM slider WHERE id=$id1";
	if(mysqli_query($connection,$sql))
		poutput("Content Deleted from Slider",$url);
	else
		noutput("Content Not Deleted from Slider",$url);
}
if ($_POST['Update']=="AddSlider") 
{	
	$target="image/".$_FILES['aimg']['name'];
	if(is_uploaded_file($_FILES['aimg']['tmp_name']))
	{
		$image=$_FILES['aimg']['tmp_name'];
		$image2=$_FILES['aimg']['name'];
	}
	$sql="INSERT INTO slider (image,h1,h2) VALUES('$image2','$_POST[h1]','$_POST[h2]')";

	if(mysqli_query($connection,$sql))
	{
		if(move_uploaded_file($image,$target))
			poutput("New Slider Added",$url);
		else
			noutput("New Slider Not Added",$url);
	}
	else
		noutput("New Slider Not Added",$url);
}
if ($_POST['Update']=="UpdSlider") 
{
	$id1 = $_POST['id'];
	$target="image/".$_FILES['adimg']['name'];
	if(is_uploaded_file($_FILES['adimg']['tmp_name']))
	{
		$image=$_FILES['adimg']['tmp_name'];
		$image2=$_FILES['adimg']['name'];
	}
	$sql="UPDATE slider SET image='$image2',h1='$_POST[h1]',h2='$_POST[h2]' WHERE id=$id1";
	if(mysqli_query($connection,$sql))
	{
		if(move_uploaded_file($image,$target))
			poutput("New Slider Updated",$url);
		else
			noutput("New Slider Not Updated",$url);
	}
	else
		noutput("New Slider Not Updated",$url);
}
if(isset($_POST['show_btn'])) 
{
	$x=$_POST['show_btn']==1?"Will Not Be":"Will Be";
	$st=$_POST['show_btn']==1?"no":"yes";
	if(update('review',"display","'$st'","WHERE id=$id1"))
		poutput("Review ".$x." shown on website",$url);
	else
		noutput("Please Try Again",$url);
}
if ($_POST['Update']=="AddNews") 
{
	$sql="INSERT INTO nupd (l1) VALUES('$_POST[l1]')";

	if(mysqli_query($connection,$sql))
		poutput("New News/Update Get Added",$url);
	else
		noutput("New News/Update Not Added",$url);
}
if ($_POST['Update']=="UpdNews") 
{
	if(update('nupd',"l1","'$_POST[l1]'","WHERE id=$id1"))
		poutput("New News/Update Get Updated",$url);
	else
		noutput("New News/Update Not Updated",$url);
}
if ($_POST['Update']=="UpdNav") 
{
	$sql="UPDATE nav SET h1='$_POST[h1]',h3='$_POST[h3]',h4='$_POST[h4]',h5='$_POST[h5]',h6='$_POST[h6]' WHERE id=$id1";

	if(mysqli_query($connection,$sql))
		poutput("Navigation Bar Updated",$url);
	else
		noutput("Navigation Bar Not Updated",$url);
}
if ($_POST['Update']=="UpdFtr") 
{
	$target="image/".$_FILES['aimg']['name'];
	if(is_uploaded_file($_FILES['aimg']['tmp_name']))
	{
		$image=$_FILES['aimg']['tmp_name'];
		$image2=$_FILES['aimg']['name'];
	}
	$sql="INSERT INTO gallery (image) VALUES('$image2')";
	if(mysqli_query($connection,$sql))
	{
		if(move_uploaded_file($image,$target))
			poutput("new photo added in gallery",$url);
		else
			noutput("new photo not added in gallery",$url);
	}
	else
		noutput("new photo not added in gallery",$url);
}
if ($_POST['Update']=="UpdFtr") 
{
	$sql="UPDATE footer SET phone='$_POST[phone]',email='$_POST[email]',location='$_POST[location]',abtus='$_POST[abtus]',addres='$_POST[addres]',conno='$_POST[conno]',facebk='$_POST[facebk]',twt='$_POST[twt]',linked='$_POST[linked]',gp='$_POST[gp]',insta='$_POST[insta]' WHERE id=$id1";
	if(mysqli_query($connection,$sql))
		poutput("Footer Updated",$url);
	else
		noutput("Footer Not Updated",$url);
}
if ($_POST['Update']=="AddCity") 
{
	$sql="INSERT INTO city (city,code) VALUES('$_POST[c1]','$_POST[c2]')";
	if(mysqli_query($connection,$sql))
		poutput("New City Added",$url);
	else
		noutput("New City Not Added",$url);
}
if ($_POST['Update']=="UpdPrd")
{
	// $target="image/".$_FILES['adimg']['name'];
	// if(is_uploaded_file($_FILES['adimg']['tmp_name']))
	// {
	// 	$image=$_FILES['adimg']['tmp_name'];
	// 	$image2=$_FILES['adimg']['name'];
	// }image='$image2',
	$sql="UPDATE category SET pname='$_POST[pname]',price='$_POST[price]',name='$_POST[pnme]',noofpr='$_POST[ppic]' WHERE id=$id1";
	if(mysqli_query($connection,$sql))
	{
		//if(move_uploaded_file($image,$target))
			poutput("New Content updated",$url);
		//else
		//	noutput("New Content Not updated",$url);
	}
	else
		noutput("New Content Not updated",$url);
}
if ($_POST['Update']=="AddPrd")
{
	$target="image/".$_FILES['aimg']['name'];
	if(is_uploaded_file($_FILES['aimg']['tmp_name']))
	{
		$image=$_FILES['aimg']['tmp_name'];
		$image2=$_FILES['aimg']['name'];
	}
	$sql="INSERT INTO category (image,pname,price,name,noofpr) VALUES('$image2','$_POST[pname]','$_POST[price]','$_POST[pnme]','$_POST[ppic]')";
	if(mysqli_query($connection,$sql))
	{
		if(move_uploaded_file($image,$target))
			poutput("new content added in category",$url);
		else
			noutput("new content not added in category",$url);
	}
	else
		noutput("new content not added in category",$url);

}
if ($_POST['Update']=="UpdInfo") 
{
	$sql="UPDATE aboutus SET title='$_POST[title]',subtitle='$_POST[subtitle]',content='$_POST[content]' WHERE id=$id1";
	if(mysqli_query($connection,$sql))
		poutput("About us Page Updated",$url);
	else
		noutput("About us Page Not Updated",$url);
}
if ($_POST['Update']=="UpdImg")
{
	$type=$_POST['TypeOfImage'];
	if(is_uploaded_file($_FILES['aimg']['tmp_name']))
	{
		$image=$_FILES['aimg']['tmp_name'];
		$image2=$_FILES['aimg']['name'];
	}
	$target="image/".$_FILES['aimg']['name'];
	if(update($type,"image","'$image2'","WHERE id=$id1"))
	{
		if(move_uploaded_file($image,$target))
			poutput("Image Updated",$url);
		else
			noutput("Image Not Updated",$url);
	}
	else
		noutput("Image Not Updated",$url);
}
if ($_POST['Update']=="AddNewAboutUs") 
{
	$target="image/".$_FILES['aimg']['name'];
	if(is_uploaded_file($_FILES['aimg']['tmp_name']))
	{
		$image=$_FILES['aimg']['tmp_name'];
		$image2=$_FILES['aimg']['name'];
	}
	$sql="INSERT INTO aboutus (title,subtitle,content,image) VALUES('$_POST[title]','$_POST[subtitle]','$_POST[content]','$image2')";
	if(mysqli_query($connection,$sql))
	{
		if(move_uploaded_file($image,$target))
			poutput("new content added on about us Page ",$url);
		else
			noutput("new content not added on about us Page ",$url);
	}
	else
		noutput("new content not added on about us Page ",$url);
}
if ($_POST['Update']=="AdmProf") 
{
	$First_Name = filter_input(INPUT_POST,'First_Name');
	$Last_Name = filter_input(INPUT_POST,'Last_Name');
	$State= filter_input(INPUT_POST,'State');
	$id1= filter_input(INPUT_POST,'id');
	$Email=filter_input(INPUT_POST,'Email');
	$Mobile = filter_input(INPUT_POST,'Mobile');
	$Password=filter_input(INPUT_POST,'password');
	$Adhaar=filter_input(INPUT_POST,'Adhaar');
	$sql="UPDATE b_person SET First_Name='$First_Name',Last_Name='$Last_Name',Adhaar='$Adhaar',Mobile='$Mobile',Email='$Email',Password='$Password' WHERE bid=$id1";

	if(mysqli_query($connection,$sql))
		poutput("Profile Updated",$url);
	else
		noutput("Profile Not Updated",$url);
}
if ($_POST['Update']=="UsrProf") 
{

	$sql="UPDATE admin SET username='$_POST[username]',email='$_POST[email]',password='$_POST[password]',usertype='$_POST[update_usertype]' WHERE bid=$id1";
	if(mysqli_query($connection,$sql))
		poutput("Profile Updated",$url);
	else
		noutput("Profile Not Updated",$url);	
}
if ($_POST['Update']=="AdmPic") 
{
	$tbl=$_POST['TypeOfUser'];
	if(is_uploaded_file($_FILES['adimg']['tmp_name']))
	{
		$image=$_FILES['adimg']['tmp_name'];
		$image2=$_FILES['adimg']['name'];
	}
	$target="image/".$_FILES['adimg']['name'];
	if(update($tbl,"image","'$image2'","WHERE bid=$id1"))
	{
		if(move_uploaded_file($image,$target))
			poutput("Profile Updated",$url);
		else
			noutput("Profile Not Updated",$url);
	}
	else
		noutput("Profile Not Updated",$url);
}
if ($_POST['Update']=="registerbtn")
{
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$cpassword = $_POST['confirmpassword'];
	$usertype = $_POST['usertype'];
	$target="image/".basename($_FILES['aimg']['name']);
	$emlrun=select("*","admin","WHERE email='$email'");
	if (mysqli_num_rows($emlrun)>0)
		noutput("Email Already Exist Please Try another one",$url);
	else
	{
		if ($password==$cpassword) 
		{
			$image=$_FILES['aimg']['name'];
			$query="INSERT INTO admin (username,email,password,usertype,image) VALUES('$username','$email','$password','$usertype','$image')";
			$sql=mysqli_query($GLOBALS['connection'], $query);
			if($sql)
			{
				move_uploaded_file($_FILES['image']['tmp_name'],$target);
				poutput("Admin Profile added",$url);
			}
			else
				noutput("Admin Profile Not added",$url);
		}
		else
			noutput("Password and confirm password does not match",$url);
	}
}
?>