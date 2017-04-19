<?php
//phpinfo();
error_reporting(E_ALL);
ini_set('display_errors', 1);
$dsn = 'pgsql:dbname=compose;user=admin;password=RAYCLNKFPLBYGYQJ;host=bluemix-sandbox-dal-9-portal.7.dblayer.com;port=25745;';
try{
	// create a PostgreSQL database connection
	$conn = new PDO($dsn);
	//$conn = new PDO("pgsql:dbname=compose;host=sl-us-dal-9-portal.6.dblayer.com", 'admin', 'WUHZQQUELISSUWGO'); 
	//$conn = pg_connect($dsn);
 
	// display a message if connected to the PostgreSQL successfully
	if($conn){
		echo "Connected to the <strong>compose</strong> database successfully!";
	}
}catch (PDOException $e){
	var_dump($e);
	// report error message
	echo $e->getMessage(); 
}
	
$name=$_POST['name']; // Fetching Values from URL.
$email=$_POST['email'];
$number= $_POST['number']; 	
	
	 try {	
$stmt=$conn->prepare("CREATE TABLE IF NOT EXISTS appusers(
		email 			varchar(40),
		mobile_number  	varchar(40),
		social_profile 	varchar(40),
		status 			integer
	");
$stmt->execute();
$statement = $conn->prepare("INSERT INTO appusers(username,
            email,
            mobile_number,
            social_profile,
            status)
    VALUES(:username, :email, :mobile_number,:social_profile,:status)");
$statement->execute(array(
    "username" => $name,
    "email" => $email,
    "mobile_number" => $number,
	"social_profile" => "instagram",
	"status" => "1"
));		
		
   //echo $statement->queryString;die;
   $statement->debugDumpParams();echo '<hr>';
 } catch(PDOException $e) {
        echo $e->getMessage();
    }
$sql= "SELECT * FROM appusers";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();
return json_encode($result);	
?>