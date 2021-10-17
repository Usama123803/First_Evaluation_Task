<?php
// $data=json_decode(file_get_contents("php://input"),true);
// Making the connection with db
$con=mysqli_connect("localhost","root","","employee");
	//Getting the name of person for which we have to search
	$str=$_POST['name'];
	//Query on Db
	$sql="SELECT * from employees where name like '%$str%' ";
	//Fetching the rows from DB
	$res=mysqli_query($con,$sql);

	if(mysqli_num_rows($res)>0){
		//Getting all of the rows that matched name
		while($row=mysqli_fetch_assoc($res))   
		{
			echo json_encode($row);  //Outputing the fetched rows on screen
			echo "</br>";
		}
	} 
	else{
		echo "No data found";
	}

?>