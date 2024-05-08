#!/usr/local/bin/php-cgi
 
<?php
 
$content = null;
$fp=fopen("php://stdin",'r') or die('File Open Error');
$fpw=fopen("mail.txt",'w');
 
while( !feof($fp) ){
    $content .= fgets( $fp ,1024);
}
fputs($fpw,$content);
 
?>