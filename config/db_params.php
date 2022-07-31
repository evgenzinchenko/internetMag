<?php

return array(

	'host' => stristr(php_uname('a'), 'darwin') ? '127.0.0.1' : 'localhost',
	'dbname' => 'test',
	'user' => 'user',
	'password' => 'password',
);
