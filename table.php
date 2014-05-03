<html>

<head>

</style>
<script type='text/javascript' src='https://www.google.com/jsapi'></script>

<script type='text/javascript'>

google.load('visualization', '1', {packages:['table']});

google.setOnLoadCallback(drawTable);

 

function drawTable() {

var data = new google.visualization.DataTable();

data.addColumn('number', 'CustomerID');
data.addColumn('string', 'Name');
data.addColumn('string', 'Address');
data.addColumn('string', 'TelNo');
data.addColumn('string', 'Mobile');
data.addColumn('string', 'Fax');
data.addColumn('string', 'Email');
data.addColumn('string', 'Balance');
data.addRows([

 

<?php

$con = mysql_connect("localhost","user_name","password");

if (!$con)

{

die('Could not connect: ' . mysql_error());

}

mysql_select_db("db_name", $con);

$result = mysql_query("select cust_id as CustomerID, cust_name as Name, adrs as Address, 
					tel_no as TelNo, mobile as Mobile, cust_fax as Fax, email as Email, cust_bal as Balance from db_name.table_name");
$output = array();
//$t = array();
//$t[]='"'.'ID'.'"';
//$t[]='"'.'NAME'.'"';
//$output[] = '[' . implode(', ', $t) . ']';

while($row = mysql_fetch_array($result)) {
    // create a temp array to hold the data
    $temp = array();
     
    // add the data
    $temp[] = $row['CustomerID'];
    $temp[] = '"' . $row['Name'] . '"';
	$temp[] = '"' . $row['Address'] . '"';
    $temp[] = '"' . $row['TelNo'] . '"';
	$temp[] = '"' . $row['Mobile'] . '"';
	$temp[] = '"' . $row['Fax'] . '"';
	$temp[] = '"' . $row['Email'] . '"';
	$temp[] = '"' . $row['Balance'] . '"';
    
    // implode the temp array into a comma-separated list and add to the output array
    $output[] = '[' . implode(', ', $temp) . ']';
}

// implode the output into a comma-newline separated list and echo
echo implode(",\n", $output);

mysql_close($con);
?>

 

]);

//var options = {'width':800,'is3D':true,'height':300};
var formatter = new google.visualization.NumberFormat({prefix: '$'});
formatter.format(data, 7); 

var table = new google.visualization.Table(document.getElementById('table_div'));

table.draw(data);

}

</script>

</head>

<body>

<div id='table_div'></div>

</body>

</html>