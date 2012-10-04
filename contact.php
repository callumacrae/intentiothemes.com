<?php

require('vendor/autoload.php');
require('contactConfig.php');

header('Content-type: application/json');

if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	echo '"Invalid email address"';
	exit;
}

if (empty($_POST['name'])) {
	echo '"Please specify a name"';
	exit;
}

if (empty($_POST['message'])) {
	echo '"Please write a message"';
	exit;
}

$message = <<<EOT
New contact from Intentio from {$_POST['name']} ({$_POST['email']}). Message as follows:

{$_POST['message']}
EOT;

$sns = new AmazonSNS();
$response = $sns->publish($topic_arn, $message, array(
	'Subject'	=> 'Contact from ' . $_POST['name']
));

echo json_encode($response->isOK());
