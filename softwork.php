<?php 
/**
* 
*/

class Store
{
	
	public function storeData ($cat, $pro_name, $descr, $amount, $nego, $pic1, $pic2, $pic3, $pic4, $town, $lga, $name, $phone, $email, $date)
	{
		require "dbconnect.php";
		$conn = mysqli_connect('localhost', 'root', '', 'awawa');

		$result = "";

		if(empty($cat)||empty($pro_name)||empty($descr)||empty($amount)||empty($pic1)||empty($pic2)||empty($pic3)||empty($pic4)||empty($town)||empty($lga)||empty($name)||empty($phone)||empty($email))
		{
			$result = "All field must be filled";
		}else
		{ 
			$save_pro = "INSERT INTO `product` VALUES ('','$cat',$pro_name','$descr','$amount','$nego','$pic1','$pic2','$pic3','$pic4','$town','$lga','$name','$phone','$email',$date)";

		
			if($que_run = mysqli_query($conn, $save_pro)){
				
				$result = "Hello ".$name.", your product has been posted to the home page.";
			
			}else 
			{
				$damn = mysqli_error($save_pro);
				echo "<script> alert('$damn')</script>";
			}
		}
		return $result;
	}
		
}

	function categ($sel)
	{
		$value;
		$result;
		switch ($sel) {
			case 'null':
				$value = '';
				break;
			case 'phones':
				$value = 'phones';
				break;
			case 'vehicles':
				$value = 'vehicles';
				break;
			case 'electronics':
				$value = 'electronics';
				break;
			case 'fashions':
				$value = 'fashions';
				break;
			case 'lands':
				$value = 'lands';
				break;
			case 'animals':
				$value = 'animals';
				break;
			case 'job':
				$value = 'jobs';
				break;
			case 'furniture':
				$value = 'furniture';
				break;
			case 'others':
				$value = 'others';
				break;
		}
		if ($value = "") {
			$result = "A category must be selected";
		}else{$result = $value;} 

		return $result;
	} 



?>