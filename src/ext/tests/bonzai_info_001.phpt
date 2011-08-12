--TEST--
Test the public method bonzai_info
--DESCRIPTION--
N/A
--CREDITS--
Fabio Cicerchia <cicerchia@php.net>
--FILE--
<?php
bonzai_info();
?>
--EXPECTREGEX--
bonzai_info\(\)
Bonzai Version => \d\.\d

Build Date => [A-Z][a-z]{2} +\d+ \d{4} \d{2}:\d{2}:\d{2}
PHP Version => 5\.\d\.\d.*
PHP API => \d{8}
PHP Extension => \d{8}
Zend Extension => \d{9}
Debug Build => (yes|no)
Thread Safety => (en|dis)abled

Bonzai License


MIT or GNU GPL 2
The MIT License is recommended for most projects, it's simple
and  easy  to understand and it places almost no restrictions
on  what  you  can do with Bonzai\.
If  the  GPL  suits  your project better you are also free to
use Bonzai under that license.
You   don't  have  to  do  anything  special  to  choose  one
license  or  the  other  and  you don't have to notify anyone
which   license   you   are   using\.  You  are  free  to  use
Bonzai  in  commercial  projects  as  long  as  the copyright
header is left intact\.
<http:\/\/www.opensource.org\/licenses\/mit-license\.php>
<http:\/\/www.opensource.org\/licenses\/gpl-2\.0\.php>
