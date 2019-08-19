<?php
date_default_timezone_set("Asia/Jakarta");
function request($url, $post = null, $cookies = null, $headers = null)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_HEADER, 1);
    if(!is_null($headers))
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    if(!is_null($cookies))
        curl_setopt($ch, CURLOPT_COOKIE, $cookies);
    if(!is_null($post)){
    	curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    }
    $resp = curl_exec($ch);
    $header_len = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    $header = substr($resp, 0, $header_len);
    $body = substr($resp, $header_len);
    curl_close($ch);
    preg_match_all('#Set-Cookie: ([^;]+)#', $header, $d);
    $cookie = '';
    for ($o=0;$o<count($d[0]);$o++) {
        $cookie.=$d[1][$o].";";
    }

    return [$header, $body, $cookie];
}
function request_post_without_params($url, $post = null, $cookies = null, $headers = null)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_HEADER, 1);
    if(!is_null($headers))
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    if(!is_null($cookies))
        curl_setopt($ch, CURLOPT_COOKIE, $cookies);
    if(!is_null($post)){
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    }
    $resp = curl_exec($ch);
    $header_len = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    $header = substr($resp, 0, $header_len);
    $body = substr($resp, $header_len);
    curl_close($ch);
    preg_match_all('#Set-Cookie: ([^;]+)#', $header, $d);
    $cookie = '';
    for ($o=0;$o<count($d[0]);$o++) {
        $cookie.=$d[1][$o].";";
    }

    return [$header, $body, $cookie];
}
function request_options($url, $post = null, $cookies = null, $headers = null)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'OPTIONS');
    curl_setopt($ch, CURLOPT_HEADER, 1);
    if(!is_null($headers))
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    if(!is_null($cookies))
        curl_setopt($ch, CURLOPT_COOKIE, $cookies);
    if(!is_null($post)){
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    }
    $resp = curl_exec($ch);
    $header_len = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    $header = substr($resp, 0, $header_len);
    $body = substr($resp, $header_len);
    curl_close($ch);
    preg_match_all('#Set-Cookie: ([^;]+)#', $header, $d);
    $cookie = '';
    for ($o=0;$o<count($d[0]);$o++) {
        $cookie.=$d[1][$o].";";
    }

    return [$header, $body, $cookie];
}
function generate_password()
{
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < 8; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function generate_voucher($lenght)
{
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890'; //
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $lenght; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
?>