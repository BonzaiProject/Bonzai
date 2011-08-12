#!/bin/bash
#
# BONZAI
# (was phpGuardian)
#
# CODE NAME:  phoenix
# VERSION:    0.1
#
# URL:        http://www.bonzai-project.org
# E-MAIL:     info@bonzai-project.org
#
# COPYRIGHT:  2006 - 2011 Bonzai (Fabio Cicerchia). All rights reserved.
# LICENSE:    MIT or GNU GPL 2
#             The MIT License is recommended for most projects, it's simple and
#             easy to understand  and it places  almost no restrictions on what
#             you can do with Bonzai.
#             If the GPL  suits your project  better you are  also free to  use
#             Bonzai under that license.
#             You don't have  to do anything  special to choose  one license or
#             the other  and you don't have to notify  anyone which license you
#             are using.  You are free  to use Bonzai in commercial projects as
#             long as the copyright header is left intact.
#             <http://www.opensource.org/licenses/mit-license.php>
#             <http://www.opensource.org/licenses/gpl-2.0.php>
#

txtund=`tput sgr 0 1`
txtbld=`tput bold`
txtred=`tput setaf 1`
txtgrn=`tput setaf 2`
txtylw=`tput setaf 3`
txtblu=`tput setaf 4`
txtpur=`tput setaf 5`
txtcyn=`tput setaf 6`
txtwht=`tput setaf 7`
txtrst=`tput sgr0`

TOPROW="$txtblu================================================================================\n$txtbld$txtcyn"
BOTROW="$txtrst\n$txtblu================================================================================$txtrst"

echo -e "$TOPROW CLI - RUN PHPUNIT $BOTROW"
mkdir -p ../report/cli/code_coverage
phpunit --syntax-check --colors --coverage-html="../report/cli/code_coverage" "./cli/tests/cliSuite.php"

echo -e "$TOPROW CLI - GENERATE VIOLATIONS $BOTROW"
phpcs -s ./cli > ../report/cli.violations.txt

echo -e "$TOPROW CLI - GENERATE CODEBROWSER $BOTROW"
mkdir -p ../report/cli/code_browser
phpcb -o ../report/cli/code_browser -s ./cli/

echo -e "$TOPROW CLI - GENERATE PHPDOC $BOTROW"
mkdir -p ../report/cli/docs
phpdoc -d ./cli -t ../report/cli/docs -ti "Bonzai CLI Documentation" -dn "bonzai"

echo -e "$TOPROW EXT - GENERATING SOFTWARE'S METRICS $BOTROW"
phploc --count-tests ./cli/ > ../report/cli.loc.txt
phpcpd ./cli/ > ../report/cli.duplications.txt

echo -e "$TOPROW EXT - BUILD ENVIRONMENT $BOTROW"
cd ext
phpize
./configure --enable-bonzai
make
TEST_PHP_EXECUTABLE=`whereis php | cut -d " " -f 2`
export NO_INTERACTION='1'

echo -e "$TOPROW EXT - RUN PHPTESTS $BOTROW"
php run-tests.php -m -p "$TEST_PHP_EXECUTABLE" -q "./tests/"
cd ..

echo -e "$TOPROW EXT - GENERATE DOXYGEN $BOTROW"
echo ""
mkdir -p ../report/ext/docs
doxygen ./ext/Doxyfile

echo -e "$TOPROW EXT - GENERATING SOFTWARE'S METRICS $BOTROW"
sloccount ./ext/bonzai.? ./ext/config.m4 ./ext/tests/bonzai_*.phpt > ../report/ext.loc.txt

