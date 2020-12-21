<?php 

include_once 'Classes/MailClasse.php';
use Classes\MailClasse;

$cc = array('said.chafouai@um5s.net.ma','chafouaisaid.97@gmail.com');
$reciver = 'saidchafouai@gmail.com';
$body =  'un nouvelle message avec bq<br>avec bq de changement';


MailClasse::fctsendMail($reciver,$cc,$body);

?>