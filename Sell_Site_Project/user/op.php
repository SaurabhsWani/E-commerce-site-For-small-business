<?php
include('security.php');
require('../admin/functions.php');
$url=$_SERVER['HTTP_REFERER'];
$bid=$_SESSION['usr']['bid'];
$date=Date('m/d/Y h:i:s a',Time());
function addtolist($col,$val,$bid){ 
	$wcb=select("*","wishcartbuy","WHERE id='$bid'");
	if (mysqli_num_rows($wcb)>0)
	{
		while($row=mysqli_fetch_assoc($wcb))
		{
			$l=0;
			$b = array();
			$flag=0;
			$wisharr=unserialize($row[$col]);
			$y=count($wisharr);
			if ($y==0) {
				array_push($b,$val);
				$cp= serialize($b); 
				if (update("wishcartbuy",$col,"'$cp'","WHERE id='$bid'")) 
				{
					header('Location:'.$GLOBALS['url'].'');
					$flag=1;
				}
				else{echo "fail1";}
			}
			else
			{
				for ($i=0; $i <$y ; $i++) 
				{ 
					$b[$i]=intval($wisharr[$i]);
				}
				for ($i=0; $i <$y ; $i++) 
				{ 
					if($b[$i]==$val)
					{
						$l=1;
						$aid=$i;
						break;
					}
				}
				if ($l==0) 
				{        
					array_push($b,$val);
					$cp= serialize($b); 
					if (update("wishcartbuy",$col,"'$cp'","WHERE id='$bid'")) 
					{
						header('Location:'.$GLOBALS['url'].'');
					}else{echo "fail1";}
				}
				else
				{
					unset($b[$aid]);
					$cp1=array_values($b);
					$cp= serialize($cp1); 
					if (update("wishcartbuy",$col,"'$cp'","WHERE id='$bid'")) 
					{
						header('Location:'.$url.'');
					}else{echo "fail1";}header('Location:'.$GLOBALS['url'].'');
				}
			}	
		}
	}
}
if ($_SERVER["REQUEST_METHOD"]=="POST") 
{
	$op=isset($_POST['wishlist'])?$_POST['wishlist']:(isset($_POST['cart'])?$_POST['cart']:(isset($_POST['buynow'])?$_POST['buynow']:""));
	$val=intval(substr($op,1));
	$catgry=substr($op, 0,1);	
	if ($catgry=='W')
		addtolist('wish',$val,$bid);
	elseif($catgry=='C')
		addtolist('cart',$val,$bid);
	elseif($catgry=='B')
		header('Location:prddetail.php?val='.$val);
	elseif ($_POST['pay']=='yes') 
	{
		$uname=$_POST['uname'];
		$row=$_POST['prd'];
		$count=$_POST['count'];
		$TPrice=$_POST['count']*$row['price'];
		$img=$row['image'];
		$umob=$_POST['umob'];
		$uemail=$_POST['uemail'];
		$uadd=$_POST['uaddress'];
		$pm=$_POST['pm'];
		$ip=$_SERVER['REMOTE_ADDR'];
		echo $count."<br/>".$uname."<br/>".$umob."<br/>".$uemail."<br/>".$uadd."<br/>".$pm;
		foreach ($row as $key => $value) {
			echo "<br/>".$key."->".$value;
		}
		$insertone=$col->insertOne(['uid'=>$bid,'DateTime'=>$date,'Prname'=>$row['name'],'Pid'=>$row['id'],'Pweight'=>$row['pname'],'Pcount'=>$count,'Price'=>$row['price'],'TotalPrice'=>$TPrice,'Paymethod'=>$pm,'Address'=>$uadd,'UEmail'=>$uemail,'Uname'=>$uname,'Umono'=>$umob,'Pimg'=>$img]);//to insert many document in collection
		printf("Inserted %d Documents",$insertone->getInsertedCount());// to get count of inserted documents
		var_dump($insertone->getInsertedId());
		if ($insertone->getInsertedCount()==1) 
		{
			//echo "success\n This is your Payment id ".$insertone->getInsertedId();
			header('Location:order.php');
		}
	}
	else
		echo "choose one";
}
?>