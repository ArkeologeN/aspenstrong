<?php
/*    $data = array(
        array("First Name" => "Natly", "Last Name" => "Jones", "Email" => "natly@gmail.com", "Message" => "Test message by Natly"),
        array("First Name" => "Codex", "Last Name" => "World", "Email" => "info@codexworld.com", "Message" => "Test message by CodexWorld"),
        array("First Name" => "John", "Last Name" => "Thomas", "Email" => "john@gmail.com", "Message" => "Test message by John"),
        array("First Name" => "Michael", "Last Name" => "Vicktor", "Email" => "michael@gmail.com", "Message" => "Test message by Michael"),
        array("First Name" => "Sarah", "Last Name" => "David", "Email" => "sarah@gmail.com", "Message" => "Test message by Sarah")
    );*/
	
	$servername = "localhost";
$username = "aspenstr_pdf_gen";
$password = "uDOglgbT*RIR";
$dbname = "directory_aspen_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//$sql = "SELECT con.entry_type,con.first_name,con.middle_name,con.last_name,con.organization,con.phone_numbers,con.addresses,us.user_email,ace.address FROM as_connections as con INNER JOIN users as us ON con.owner= us.id JOIN as_connections_emails as ace ON con.id=ace.entry_id WHERE ace.preferred=1 AND con.status='approved' ";

//$sql = "SELECT con.id,con.entry_type,con.first_name,con.middle_name,con.last_name,con.organization,con.phone_numbers,con.addresses,us.user_email FROM as_connections as con INNER JOIN users as us ON con.owner= us.id WHERE con.status='approved' ";

$sql = "SELECT con.id,con.entry_type,con.first_name,con.middle_name,con.last_name,con.organization,con.phone_numbers,con.addresses,con.status,us.user_email,us.user_nicename FROM as_connections as con RIGHT JOIN users as us ON con.owner= us.id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	$i=1;
    while($row = $result->fetch_assoc()) {
		//print_r($row);
		//echo "SELECT * FROM as_connections_emails where entry_id=".$row['id']." AND preferred=1";
		if(isset($row['id']) && $row['id'] != ""){
		$email_sql="SELECT * FROM as_connections_emails where entry_id=".$row['id']." AND preferred=1";
		$result_email = $conn->query($email_sql);
		$result_email=$result_email->fetch_assoc();
		$name=$row["first_name"].' '.$row["middle_name"].' '.$row["last_name"];
		$result_email_val=$result_email['address'];
		$status=$row["status"];
		}else{
		$result_email_val=$row['user_email'];
		$name=$row['user_nicename'];
		$status="Need to create profile";	
			}
				
		$phone_numbers=unserialize($row['phone_numbers']);
		$addresses=unserialize($row['addresses']);
		if($phone_numbers['type'] !=''){
        $phone_number=$phone_numbers['number'];
        }else{
        $phone_number='&nbsp;';
	    }
		$html="";
		foreach($addresses as $addresse){
        if($addresse['city'] != ""){
        $html.=$addresse['address'].' , '.$addresse['state'].' , '.$addresse['zipcode'].' , '.$addresse['city'].' , '.$addresse['country'];
        }else{
        $html.=$addresse['address'].' , '.$addresse['state'].' , '.$addresse['zipcode'].' , '.$addresse['country'];
	    }
        }
		
		
		
    $data[] = array("Business Name" =>$row["organization"], "Name" => $name, "Type" => $row["entry_type"], "Email" => $result_email_val,"Phone"=>$phone_number,"Address"=>$html,"Status"=>$status);
	}
	//print_r($data);die;
	//die;
}
	
    //print_r($data);die;
    function filterData(&$str)
    {
        $str = preg_replace("/\t/", "\\t", $str);
        $str = preg_replace("/\r?\n/", "\\n", $str);
        if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
    }
    
    // file name for download
	
    $fileName = "codexworld_export_data" . date('Ymd') . ".xls";
    
    // headers for download
    header("Content-Disposition: attachment; filename=\"$fileName\"");
    header("Content-Type: application/vnd.ms-excel");
    
    $flag = false;
    foreach($data as $row) {
        if(!$flag) {
            // display column names as first row
            echo implode("\t", array_keys($row)) . "\n";
            $flag = true;
        }
        // filter data
        array_walk($row, 'filterData');
        echo implode("\t", array_values($row)) . "\n";

    }
    
    exit;
?>