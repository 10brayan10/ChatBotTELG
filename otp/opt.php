<?php
if(isset($text)&& $text== '/entrar'){

	// Authorisation details.
	$username = "sanchezquintero1010@gmail.com";
	$hash = "0e94a36504cef88355b9cb12c6cbbd600e5750442c9374d213fb9e5b708036e0";

	// Config variables. Consult http://api.txtlocal.com/docs for more info.
	$test = "0";
	$name;

	// Data for text message. This is the text message data.
	$sender = "API Test"; // This is who the message appears to be from.
	$numbers = $datos->numero_teleg; // A single number or a comma-seperated list of numbers
    setcookie("otp",$otp);
	$otp=mt_rand(100000,999999);
    $message = "hola".$name. "tu opt es: ".$otp;

	// 612 chars or less
	// A single number or a comma-seperated list of numbers
	$message = urlencode($message);
	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	$ch = curl_init('https://api.txtlocal.com/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); 
	sendMessage($id,"muy bien " .$name. "\n tu accseso a sido autorizado",$token) ;
	curl_close($ch);
}
if(isset($_POST['ver'])){
	$verotp=$_POST['otp'];
	if($verotp==$_COOKIE['otp']) {
		sendMessage($id,"muy bien " .$name. "\n tu accseso a sido autorizado",$token) ;

	}
}
?>