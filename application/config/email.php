<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['email'] = Array(
	/*'protocol' => 'smtp',
	//'smtp_crypto' => 'tls',
    'smtp_host' => 'tls://smtp.gmail.com',
    'smtp_port' => 465,
    'smtp_user' => 'sied.ad.imss@gmail.com',
    'smtp_pass' => 's13d.4d.1mss',
    'mailtype'  => 'html',
    'charset'   => 'utf-8',
    'validate'  => false*/

 //   'host' => 'smtp.gmail.com',
 //   'port' => 587,
    //'port' => 465,
//    'crypt' => 'tls',
 //   'username' => "sied.ad.imss@gmail.com",
  //  'password' => "s13d.4d.1mss",
  //  'setFrom' => array('email'=>'sied.ad.imss@gmail.com', 'name'=>'SIPIMSS')
    //'username' => "cenitluis.pumas@gmail.com",
    //'password' => "el#:(vlaluna2vces",
//    'setFrom' => array('email'=>'cenitluis.pumas@gmail.com', 'name'=>'SIPIMSS')

	//Correo IMSS
    // 'debug' => 1,
    'host' => 'smtp.1and1.mx',
    'port' => "587",
    'crypt' => 'TLS',
    'username' => "postmaster@kaliashop.me",
    'password' => "Banana123.",
    'setFrom' => array('email'=>'soporte.sipimss@gmail.com', 'name'=>'SIPIMSS')
);
