#!/usr/local/bin/php-cgi
 
<?php
include_once('qdmail_receiver.php');
 
qd_receive_mail( 'stdin' );
 
//メール件名
$subject = qd_receive_mail( 'header' , array('subject','name') );
 
//送信者
$from = qd_receive_mail( 'header' , array('from','mail') );

//受信者
$to = qd_receive_mail( 'header' , array('to','mail') );
 
//メール本文の取得
$body = qd_receive_mail( 'body' );
 
$fp = fopen('mail_simple.txt', 'w');
fwrite($fp, "【差出人】\n".$from."\n\n------\n\n【受信者】\n".$to."\n\n------\n\n【件名】\n".$subject."\n\n------\n\n【本文】\n".$body );
fclose($fp);
 

//添付ファイルの取得
$attach = qd_receive_mail( 'attach' );
 
foreach($attach as $att){
    $fp=fopen('../mail_attach/'.$att['filename_safe'],'w');
    fputs($fp,$att['value']);
    fclose($fp);
}
 

?>