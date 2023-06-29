<?php

//$config['protocol'] = 'smtp';iso-8859-1
//$config['mailpath'] = '/usr/sbin/sendmail';
/*$config['protocol']  = 'smtp';
$config['smtp_host'] = 'smtp.zoho.com';
$config['smtp_port'] = 465;
$config['smtp_user'] = 'info@inetworkexperts.com';
$config['smtp_pass'] = 'uinet@12';

$config['charset']   = 'utf-8';
$config['wordwrap']  = TRUE;
$config['mailtype']  = 'html';
$config['newline']   = "\r\n";*/


$config = Array (
                'protocol' => 'smtp',
                '_smtp_auth' =>TRUE,
                'smtp_host' => 'inetworkexperts.com',
                'smtp_port' => 465,
                'smtp_user' => 'info@inetworkexperts.com',
                'smtp_pass' => ';?q(,&c{p9GW',
                'charset' => 'utf-8',
                'mailtype' => 'html',
                'newline' => "\r\n",
                'wordwrap' => TRUE,
                'wrapchars'=>76,
                'validate' => FALSE,
                'priority' => 3,
                'crlf' => '\r\n',
                'newline' => '\r\n',
                'bcc_batch_mode' => TRUE,
                'bcc_batch_size' => '200'
                );