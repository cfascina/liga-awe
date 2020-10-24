<?php

function getInfo($url) {
    $options = array(
        CURLOPT_RETURNTRANSFER => true,     // return web page
        CURLOPT_HEADER         => false,    // don't return headers
        CURLOPT_FOLLOWLOCATION => true,     // follow redirects
        CURLOPT_ENCODING       => "",       // handle all encodings
        CURLOPT_USERAGENT      => "spider", // who am i
        CURLOPT_AUTOREFERER    => true,     // set referer on redirect
        CURLOPT_CONNECTTIMEOUT => 120,      // timeout on connect
        CURLOPT_TIMEOUT        => 120,      // timeout on response
        CURLOPT_MAXREDIRS      => 10,       // stop after 10 redirects
        CURLOPT_SSL_VERIFYPEER => false     // Disabled SSL Cert checks
    );
    
    $ch = curl_init($url);
    curl_setopt_array($ch, $options);
    
    $content = curl_exec($ch);
    $err     = curl_errno($ch);
    $errmsg  = curl_error($ch);
    $header  = curl_getinfo($ch);
    curl_close($ch);
    
    $header['errno']   = $err;
    $header['errmsg']  = $errmsg;
    $header['content'] = $content;

    return $header;
}

$url = "https://api.cartolafc.globo.com/time/id/6126264";
$response = getInfo($url);
$jsonData = json_decode($response['content'], true);

echo intval($jsonData['time']['assinante']) . '<br/>';
echo $jsonData['time']['foto_perfil'] . '<br/>';
echo $jsonData['time']['nome'] . '<br/>';
echo $jsonData['time']['nome_cartola'] . '<br/>';
echo $jsonData['time']['url_camisa_svg'] . '<br/>';
echo $jsonData['time']['url_escudo_svg'] . '<br/>';
echo $jsonData['time']['temporada_inicial'] . '<br/>';