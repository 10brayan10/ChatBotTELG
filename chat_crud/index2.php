<?php
//error_reporting(0);
header("Cahe-Control: no-cahe, muts-revalidate"); //HTTP/1.1
header("Expire: Sat, 26 jul 1997 05:00:00 GTM"); //Date in the past
header("Pragma: no-cahe");
//header("Accsess-Control-Allow-Origen: *");

  $token="bot6287603602:AAFvIqTn2m2etVMGH2A6BUSO1AOYU_cE2k8";
  $data=file_get_contents("php://input");
  $update= json_decode($data,true);
  $message= $update['message'];


  $id = $message ["from"]["id"];

  $name = $message ["from"]["first_name"];

  $text = $message["text"];

//sendMessage($id,$data,$token) ;



/////////////////////////////////////

use function PHPSTORM_META\exitPoint;
include('conexion_be.php');
$objeto =new conexion();
$conexion = $objeto->Conectar();


$stmt = $conexion->prepare("SELECT * FROM usuarios WHERE id_telegram='$id'");
$stmt->execute();
$userExists = $stmt->fetchColumn();








if ($userExists){
  
  if(isset($text)&& $text== '/entrar'){
function tokenG($leng=10){
  $cadena= "ABCDEFGHIJKLMNÑOPQRSTUVWXYZ0123456789";
  $tokenn="";
  for ($i=0; $i< $leng; $i++){
    $tokenn .= $cadena[rand(0,36)];
  }
return $tokenn;
}
$log=tokenG();
  $respuesta= "hola ✋" .$name. "\n tu token es:".$log;
  sendMessage($id,$respuesta,$token) ;
   
  }
 
  
  
  
}else{
  sendMessage($id,"no estas registrado en ss",$token) ;
}

//if ($userExists){
  

//  if(isset($text)&& $text=='hola')
//  {
//  $respuesta= "hola ✋" .$name. "\n--Bienvenido \n que necesitas";
//  sendMessage($id,$respuesta,$token) ;

//  }
//  if(isset($text)&& $text=='cual es tu nombre')
//  {
//  $respuesta= "me llamo metrobot \n" .$name;
//  sendMessage($id,$respuesta,$token) ;
  
//  }
  
//  if(isset($text)&& $text=='/entrar')
//  {
//  $respuesta= "muy bien " .$name. "\n tu accseso a sido autorizado";
//  sendMessage($id,$respuesta,$token) ;
  
//  }
  
//}else{
//  sendMessage($id,"no estas registrado en ss",$token) ;
//}
/////////////////////////////////




function sendMessage($chatID, $messaggio, $token, &$k= ''){
$url = "https://api.telegram.org/" . $token . "/sendMessage?disable_web_page_preview=false&parse_mode=HTML&chat_id=" . $chatID;
/*
if (isset($k)){
  $url = $url."&reply_markup=",$k;
}
*/
 $url = $url."&text=" . urlencode($messaggio);
 $ch = curl_init();
 $optArray = array(
 CURLOPT_URL =>$url,
 CURLOPT_RETURNTRANSFER => true
 );
 curl_setopt_array($ch, $optArray);
 $result = curl_exec($ch);
 curl_close($ch);

}
?>