<?php

$count = count($_POST);
$html = '';
for ($i=1; $i <= $count-1; $i++) { 
   $html .= $_POST['key_'.$i].",";
}

$vars = array(
    "prompt" => "".$_POST['category']." alanında bir makale oluşturur musun ? Anahtar Kelimeler: ".rtrim($html,",")." ",
    "max_tokens" => 1000,
    "temperature" => 0.5,
   );
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://api.openai.com/v1/engines/text-davinci-003/completions");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($vars));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$headers = [
    
    'Authorization: Bearer OPENAI_API_KEY',
    'Content-Type: application/json',
];

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$server_output = curl_exec($ch);

curl_close ($ch);

echo $server_output;
die();
?>
