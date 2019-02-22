<?php
    $servername = "192.168.1.100";
    $server_username = "flowcollections";
    $server_password = "7BqcQaLMuOlvKJFB";
    $dbname = "Flow_data";

    $conn = new mysqli($servername, $server_username, $server_password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

        // $promise_sql = "INSERT INTO ptp_info(placement_id_fk, date_promised, amt_promised, notes, PROMISE_BY, created_on, Agent)
        //     VALUES('".$row ["BILL_NO"]."','".$_POST["date_promised"]."','".$_POST["amt_promised"]."','".$_POST["notes"]."','".$_POST["PROMISE_BY"]."','".$_POST["created_on"]."','".$_POST["Agent"]."')";
    $promise_sql = "INSERT INTO ptp_info(placement_id_fk, date_promised, amt_promised, notes, PROMISE_BY, created_on, Agent) VALUES ('".$row ["BILL_NO"]."','".$_POST["date_promised"]."','".$_POST["amt_promised"]."','"SYSDATETIME()"','"Agent"')";
    

    if ($conn->query($promise_sql) === TRUE) {
        header("Location: formsearch.php");
    } else {
    }

    $conn->close();
?>