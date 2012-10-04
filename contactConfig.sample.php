<?php if (!class_exists('CFRuntime')) die('No direct access allowed.');

$topic_arn = '';

CFCredentials::set(array(
	'production'	=> array(
		'key'			=> '',
		'secret'		=> '',

		'default_cache_config'	=> '',
		'certificate_authority'	=> false
	),

	'@default'	=> 'production'
));
