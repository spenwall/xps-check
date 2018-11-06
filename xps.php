<?php

require 'vendor/autoload.php';
use Mailgun\Mailgun;

$mgClient = new Mailgun('key-47dc1ad540f22802c839deceaea7a1eb');
$domain = 'sandboxdca0a0687661489296bf7ec5330dafee.mailgun.org';

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://www.dellrefurbished.ca/laptops');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$output = curl_exec($ch);

$xps = strpos($output, 'xps');
$XPS = strpos($output, 'XPS');


if ($xps || $XPS) {
  var_dump('found');
  $result = $mgClient->sendMessage($domain, [
    'from' => 'Dell Checker <dude.wallace@gmail.com>',
    'to' => 'Spencer <dude.wallace@gmail.com>',
    'subject' => 'Refurbished Dell found',
    'text' => 'https://www.dellrefurbished.ca/laptops'
  ]);
  return 0;
}

var_dump('not found');
return 0;