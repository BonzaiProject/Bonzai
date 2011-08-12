--TEST--
Test the public method bonzai_get_bytecode
--DESCRIPTION--
N/A
--CREDITS--
Fabio Cicerchia <cicerchia@php.net>
--FILE--
<?php
var_dump(bonzai_get_bytecode(null));
var_dump(bonzai_get_bytecode(''));
var_dump(bonzai_get_bytecode(array()));
var_dump(bonzai_get_bytecode(0));
var_dump(bonzai_get_bytecode(1));
var_dump(bonzai_get_bytecode(' '));
var_dump(bonzai_get_bytecode('a'));

$filename = tempnam('.', 'test_');
file_put_contents($filename, 'content');
chmod($filename, 0333); // -wx-wx-wx
var_dump(bonzai_get_bytecode($filename));
chmod($filename, 0777); // rwxrwxrwx
unlink($filename);

$filename = tempnam('.', 'test_');
file_put_contents($filename, 'content');
chmod($filename, 0555); // r-xr-xr-x
var_dump(bonzai_get_bytecode($filename));
chmod($filename, 0777); // rwxrwxrwx
unlink($filename);

$filename = tempnam('.', 'test_');
file_put_contents($filename, '');
var_dump(bonzai_get_bytecode($filename));
chmod($filename, 0777); // rwxrwxrwx
unlink($filename);

$filename = tempnam('.', 'test_');
file_put_contents($filename, 'aaaaaaaaaaaaaaaaaa');
var_dump(bonzai_get_bytecode($filename));
chmod($filename, 0777); // rwxrwxrwx
unlink($filename);

$filename = tempnam('.', 'test_');
file_put_contents($filename, '<?php echo "it works"; ?>');
var_dump(bonzai_get_bytecode($filename));
chmod($filename, 0777); // rwxrwxrwx
unlink($filename);
?>
--EXPECTREGEX--
Notice: bonzai_get_bytecode\(\): The file \`\` is invalid\. in .+\/tests\/bonzai_get_bytecode_001\.php on line 2
NULL

Notice: bonzai_get_bytecode\(\): The file \`\` is invalid\. in .+\/tests\/bonzai_get_bytecode_001.php on line 3
NULL

Warning: bonzai_get_bytecode\(\) expects parameter 1 to be string, array given in .+\/tests\/bonzai_get_bytecode_001\.php on line 4
NULL

Notice: bonzai_get_bytecode\(\): The file \`0\` is invalid\. in .+\/tests\/bonzai_get_bytecode_001.php on line 5
NULL

Notice: bonzai_get_bytecode\(\): The file \`1\` is invalid\. in .+\/tests\/bonzai_get_bytecode_001.php on line 6
NULL

Notice: bonzai_get_bytecode\(\): The file \` \` is invalid\. in .+\/tests\/bonzai_get_bytecode_001.php on line 7
NULL

Notice: bonzai_get_bytecode\(\): The file \`a\` is invalid\. in .+\/tests\/bonzai_get_bytecode_001.php on line 8
NULL

Notice: bonzai_get_bytecode\(\): The file \`.+\/test_[a-zA-Z0-9]{6}\` is not readable\. in .+\/tests\/bonzai_get_bytecode_001.php on line 13
NULL
string\(\d+\) \"(?:[A-Za-z0-9+\/]{4})*(?:[A-Za-z0-9+\/]{2}==|[A-Za-z0-9+\/]{3}=)?\"

Notice: bonzai_get_bytecode\(\): The file \`.+\/test_[a-zA-Z0-9]{6}\` is empty\. in .+\/tests\/bonzai_get_bytecode_001.php on line 26
NULL
string\(\d+\) \"(?:[A-Za-z0-9+\/]{4})*(?:[A-Za-z0-9+\/]{2}==|[A-Za-z0-9+\/]{3}=)?\"
string\(\d+\) \"(?:[A-Za-z0-9+\/]{4})*(?:[A-Za-z0-9+\/]{2}==|[A-Za-z0-9+\/]{3}=)?\"
