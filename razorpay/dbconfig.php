<?php
class Database
{
     
    private $host = "localhost";
    private $db_name = "gvsoft_rgb_oos";
    private $username = "gvsoft_root";
    private $password = "gvsoft@2023";
    public $conn;
     
    public function dbConnection()
	{
     
	    $this->conn = null;    
        try
		{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
        }
		catch(PDOException $exception)
		{
            echo "Connection error: " . $exception->getMessage();
        }
         
        return $this->conn;
    }
}

$DB_HOST = 'localhost';
	$DB_USER = 'gvsoft_root';
	$DB_PASS = 'gvsoft@2023';
	$DB_NAME = 'gvsoft_rgb_oos';
	
	try{
		$DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
		$DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}
$connection=mysqli_connect("localhost","gvsoft_root","gvsoft@2023","gvsoft_rgb_oos");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

?>