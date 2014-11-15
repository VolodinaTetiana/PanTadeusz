<?php
$con=pg_connect("host=sbazy.uek.krakow.pl dbname=s175606 user=s175606 password=volodina898");
$title=$_POST["title"];
$reflection=$_POST["reflection"];
$query="insert into refleksja(title,reflection)values('$title','$reflection')";
$result=pg_exec($con,$query);
if($result){
echo("Done");
}
else{
echo("Fail");
}
	
$url = 'https://mandrillapp.com/api/1.0/messages/send.json'; $params = [ 'message' => array( 'subject' => $title, 'text' => $reflection, 'html' => '<p>'.$reflection.'</p>', 'from_email' => 'uek@no-replay.com', 'to' => array( array( 'email' => 'tetianavolodina@gmail.com', 'name' => 'Tetiana' ) ) ) ];

$params['key'] = 'HEpZLrPrRBEa7W9fLAJKeQ'; $params = json_encode($params); $ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url); curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); curl_setopt($ch, CURLOPT_POSTFIELDS, $params);

$head = curl_exec($ch); $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE); curl_close($ch);

?>