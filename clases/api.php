<?php 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://borgoarquitectura.com.ar/categoria");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$res = curl_exec($ch);
curl_close($ch);