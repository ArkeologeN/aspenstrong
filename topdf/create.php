<?php
$id=convert_uudecode(base64_decode($_REQUEST['id']));

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

/*$result_email =$conn->query("SELECT user_email FROM users WHERE `id` = $id ");
$row_email =$result_email->fetch_assoc();*/
//echo $row_email['user_email'];die;
if($id !=""){
$sql = "SELECT con.id as entry,con.entry_type,con.first_name,con.middle_name,con.last_name,con.organization,con.phone_numbers,con.addresses,us.user_email,acm.* FROM as_connections as con INNER JOIN users as us ON con.owner= us.id JOIN as_connections_metas as acm ON acm.entry_id=con.id where us.id=".$id;
//echo $sql;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
	$i=1;
$html='';
$html.='<table border="0">';
    while($row = $result->fetch_assoc()) {
		//print_r($row);die;
//$get_emails=$conn->query("SELECT address,type FROM as_connections_emails WHERE entry_id=".$row['entry']);
$allemail=array();
$get_emails=$conn->query("SELECT address,type FROM as_connections_emails WHERE entry_id=".$row['entry']);
//print_r($get_emails->fetch_assoc());die;

while($emails=$get_emails->fetch_assoc()){
$allemail[$emails['type']]=$emails['address'];

//$allemail['type']=$emails['type'];
}

$insurance_providers=getMetaData('insurance_providers',$row['insurance_provider']);
$modality=getMetaData('modalities',$row['modality']);	
$age_group=getMetaData('ages',$row['age_group']);	

$phone_numbers=unserialize($row['phone_numbers']);
$addresses=unserialize($row['addresses']);
$html.='<tr>
<td>Name : </td>
<td>'.$row["first_name"].' '.$row["middle_name"].' '.$row["last_name"].'</td>
</tr>';		
$html.='<tr>
<td>Type : </td>
<td>'.$row['entry_type'].'</td>
</tr>';
/*$html.='<tr>
<td>Email : </td>
<td>'.$row['user_email'].'</td>
</tr>';*/
foreach($allemail as $emailkey => $value){
$html.='<tr>
<td>'.$emailkey.' Email : </td>
<td>'.$value.'</td>
</tr>';	
	}
$html.='<tr>
<td>Business Name : </td>
<td>'.$row["organization"].'</td>
</tr>';
$html.='<tr>
<td>Phone : </td>
<td>'.$phone_numbers['type'].' : '.$row["number"].'</td>
</tr>';

foreach($addresses as $addresse){
if($addresse['city'] != ""){
$html.='<tr><td>Address : </td><td>'.$addresse['address'].' , '.$addresse['state'].' , '.$addresse['zipcode'].' , '.$addresse['city'].' , '.$addresse['country'].'</td></tr>';
}else{
$html.='<tr><td>Address : </td><td>'.$addresse['address'].' , '.$addresse['state'].' , '.$addresse['zipcode'].' , '.$addresse['country'].'</td></tr>';
	}
}
$html.='<tr>
<td>School : </td>
<td>'.$row['school'].'</td>
</tr>';
$html.='<tr>
<td>School Passin Year : </td>
<td>'.$row['school_year'].'</td>
</tr>';
$html.='<tr>
<td>Malpractice Insurance : </td>
<td>'.$row['malpractice_insurance'].'</td>
</tr>';
$html.='<tr>
<td>Malpractice Carrer : </td>
<td>'.$row['malpractice_carrer'].'</td>
</tr>';
$html.='<tr>
<td>Malpractice Expiry : </td>
<td>'.$row['malpractice_expiry'].'</td>
</tr>';
$html.='<tr>
<td>Session Cost : </td>
<td>'.$row['session_cost'].'</td>
</tr>';
$html.='<tr>
<td>Modality : </td>
<td>'.$modality.'</td>
</tr>';
$html.='<tr>
<td>Age Group : </td>
<td>'.$age_group.'</td>
</tr>';
$html.='<tr>
<td>Insurance : </td>
<td>'.$row['insurance'].'</td>
</tr>';
$html.='<tr>
<td>Insurance Provider : </td>
<td>'.$insurance_providers.'</td>
</tr>';
	}
$html.='</table>';
}
$size=array(200,200);
$font=10;
}else{
//$sql = "SELECT con.entry_type,con.first_name,con.middle_name,con.last_name,con.organization,con.phone_numbers,con.addresses,us.user_email,ace.address FROM as_connections as con INNER JOIN users as us ON con.owner= us.id JOIN as_connections_emails as ace ON con.id=ace.entry_id WHERE ace.preferred=1 ";

$sql = "SELECT con.id,con.entry_type,con.first_name,con.middle_name,con.last_name,con.organization,con.phone_numbers,con.addresses,us.user_email,us.user_nicename,con.status FROM as_connections as con RIGHT JOIN users as us ON con.owner= us.id ";

$result = $conn->query($sql);
$html='';
$html='<table border="0">
<tr>
<td align="left" width="40"><strong>Sr No.</strong></td>
<td align="left" width="330"><strong>Business Name</strong></td>
<td align="left" width="150"><strong>Name</strong></td>
<td align="left" width="70"><strong>Type</strong></td>
<td align="left" width="220"><strong>Email</strong></td>
<td align="left" width="120"><strong>Phone</strong></td>
<td align="left" width="200"><strong>Address</strong></td>
</tr>';
if ($result->num_rows > 0) {
    // output data of each row
	$i=1;
    while($row = $result->fetch_assoc()) {
		$phone_numbers=unserialize($row['phone_numbers']);
		$addresses=unserialize($row['addresses']);
		
		
		if(isset($row['id']) && $row['id'] != ""){
		$email_sql="SELECT * FROM as_connections_emails where entry_id=".$row['id']." AND preferred=1";
		$result_email = $conn->query($email_sql);
		$result_email=$result_email->fetch_assoc();
		if($row["first_name"]!="" || $row["middle_name"]!=""||$row["last_name"]!=""){
		$name=$row["first_name"].' '.$row["middle_name"].' '.$row["last_name"];
		}else{
		$name="";	
			}
		if($result_email['address']!=""){
		$result_email_val=$result_email['address'];
		}else{
		$result_email_val='&nbsp;';	
			}
		$status=$row["status"];
		}else{
		$result_email_val=$row['user_email'];
		$name=$row['user_nicename'];
		$status="Need to create profile";	
			}
		
		
		//print_r($addresses);die;
        //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
if(isset($row["organization"]) && $row["organization"]!=""){
$html.='<tr><td align="left" width="40">'.$i.'</td><td align="left" width="300">'.$row["organization"].'</td>';
}else{
$html.='<tr><td align="left" width="40">'.$i.'</td><td align="left" width="300">&nbsp;</td>';	
	}
if(isset($name) && $name !=""){
$html.='<td align="left" width="150" style="display: inline-block;">'.$name.'</td>';
}else{
$html.='<td align="left" width="150">&nbsp;</td>';
	}
if(isset($row["entry_type"]) && $row["entry_type"]!=""){
$html.='<td align="left" width="70">'.$row["entry_type"].'</td>';
}else{
$html.='<td align="left" width="70">&nbsp;</td>';	
	}
$html.='<td align="left" width="220">'.$result_email_val.'</td>';
$html.='<td align="left" width="120">';
if(isset($phone_numbers['type']) && $phone_numbers['type'] !=''){
$html.=$phone_numbers['number'];
}else{
$html.='&nbsp;';
	}
$html.='</td>';
//print_r($addresses);die;
if(!empty($addresses)){
$html.='<td align="left" width="200">';
foreach($addresses as $addresse){
if($addresse['city'] != ""){
$html.=$addresse['address'].' , '.$addresse['state'].' , '.$addresse['zipcode'].' , '.$addresse['city'].' , '.$addresse['country'];
}else{
$html.=$addresse['address'].' , '.$addresse['state'].' , '.$addresse['zipcode'].' , '.$addresse['country'];
	}
}
$html.='</td>';
}else{
$html.='<td align="left" width="200">&nbsp;</td>';		
	}
//$html.='<td align="right" width="60">'.$status.'</td>';
$html.='</tr>';

   $i++; }
} else {
    echo "0 results";
}
$html.='</table>';
$size=array(340,340);
$font=8;
}
function getMetaData($tableName="",$ids=''){
$servername = "localhost";
$username = "aspenstr_pdf_gen";
$password = "B?P5]58#*3p]";
$dbname = "aspenstr_directory";

// Create connection
$conn2 = new mysqli($servername, $username, $password, $dbname);
$ids=str_replace('|',',',$ids);
$ids='('.$ids.')';

$sql1 = "SELECT * FROM ".$tableName." WHERE id IN ".$ids ;
//echo "SELECT * FROM ".$tableName." WHERE id IN ".$ids;die;
$result1 = $conn2->query($sql1);
$name="";
while($row = $result1->fetch_assoc()) {
	$name.=$row['name'].' , ';
	}
$conn2->close();
return $name;exit;
	}

//echo $html;die;
$conn->close();


require('html_table.php');

$pdf=new PDF('P','mm',$size);
$pdf->AddPage();
$pdf->SetFont('Arial','',$font);


$pdf->WriteHTML($html);
$pdf->Output();


?>