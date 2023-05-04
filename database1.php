<?php
$servername="localhost";
$username="root";
$password="";
$database_name="fashion_hub";

$conn=mysqli_connect($servername,$username,$password,$database_name);
if(!$conn)
{
	die("Connection Failed:" . mysqli_connect_error());

}
if(isset($_POST['submit']))
{	
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password1=$_POST['password1'];
	$password2 = $_POST['password2'];

	 $sql_query = "INSERT INTO signup (username,email,password,password2)VALUES ('$username','$email','$password1','$password2')";
	 if (mysqli_query($conn, $sql_query)) 
	 {
		header("location: index.php");
	 } 
	 else
     {
		echo "Error: "  . "" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}
?>