--TEST--
Test the public method bonzai_exec
--DESCRIPTION--
N/A
--CREDITS--
Fabio Cicerchia <cicerchia@php.net>
--FILE--
<?php
bonzai_exec(null);
bonzai_exec('');
bonzai_exec(array());
bonzai_exec(0);
bonzai_exec(1);
bonzai_exec(' ');
bonzai_exec('INVALID');
bonzai_exec(base64_encode('INVALID'));

for($i = 0, $array = array(); $i < 255; $i++) $array[] = dechex($i);
shuffle($array);
$str = strtoupper(implode('', $array));

bonzai_exec(base64_encode($str));

$filename = tempnam('.', 'test_');
file_put_contents($filename, '<?php echo "it works"; ?' . '>');
$bytecode = bonzai_get_bytecode($filename);
unlink($filename);
bonzai_exec($bytecode);
?>
--EXPECT--
Warning: bonzai_exec(): The compiled code is invalid. in /home/fabio/Scrivania/phpGuardian/php_dev/ext/bonzai/tests/bonzai_exec_001.php on line 2

Warning: bonzai_exec(): The compiled code is invalid. in /home/fabio/Scrivania/phpGuardian/php_dev/ext/bonzai/tests/bonzai_exec_001.php on line 3

Warning: bonzai_exec() expects parameter 1 to be string, array given in /home/fabio/Scrivania/phpGuardian/php_dev/ext/bonzai/tests/bonzai_exec_001.php on line 4

Warning: bonzai_exec(): The compiled code is invalid. in /home/fabio/Scrivania/phpGuardian/php_dev/ext/bonzai/tests/bonzai_exec_001.php on line 5

Warning: bonzai_exec(): The compiled code is invalid. in /home/fabio/Scrivania/phpGuardian/php_dev/ext/bonzai/tests/bonzai_exec_001.php on line 6

Warning: bonzai_exec(): The compiled code is invalid. in /home/fabio/Scrivania/phpGuardian/php_dev/ext/bonzai/tests/bonzai_exec_001.php on line 7

Warning: bonzai_exec(): The compiled code is invalid. in /home/fabio/Scrivania/phpGuardian/php_dev/ext/bonzai/tests/bonzai_exec_001.php on line 8

Warning: bonzai_exec(): The compiled code is invalid. in /home/fabio/Scrivania/phpGuardian/php_dev/ext/bonzai/tests/bonzai_exec_001.php on line 9

Warning: bonzai_exec(): The compiled code is invalid. in /home/fabio/Scrivania/phpGuardian/php_dev/ext/bonzai/tests/bonzai_exec_001.php on line 15
it works
