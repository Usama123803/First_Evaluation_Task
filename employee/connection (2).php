<?php
// $data=json_decode(file_get_contents("php://input"),true);
// Making the connection with db
$con=mysqli_connect("localhost","root","","employee");
	$str=$_POST['name'];
	$sql="SELECT * from employees where name like '%$str%' ";
	$res=mysqli_query($con,$sql);
	if(mysqli_num_rows($res)>0){
		while($row=mysqli_fetch_assoc($res))
		{
			echo json_encode($row);
			echo "</br>";
		}
	} 
	else{
		echo "No data found";
	}

?>