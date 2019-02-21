<?php
        session_start();
        session_regenerate_id();
        if(!isset($_SESSION['user']))      // if there is no valid session
        {
            header("Location: index.php");
        }
?>
<?php
$servername = "192.168.1.100";
$username = "flowcollections";
$password = "7BqcQaLMuOlvKJFB";
$dbname = "Flow_data";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO ptp_info (placement_id_fk,date_promised,amt_promised,notes)
VALUES (
  
    
    '50365597-19421357',
'".$_POST["date_promised"]."',
'".$_POST["amt_promised"]."',
'".$_POST["notes"]."'
)";


if ($conn->query($sql) === TRUE) {
    header("Location: Promise-to-pay-form.php");
} else {
}

$conn->close();
?>