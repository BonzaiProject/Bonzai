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

CURRENT_PATH=`dirname $0`

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
mkdir -p $CURRENT_PATH/../report/cli/code_coverage
phpunit --coverage-html="$CURRENT_PATH/../report/cli/code_coverage" --configuration $CURRENT_PATH/../tests/Test.xml

echo -e "$TOPROW CLI - GENERATE VIOLATIONS $BOTROW"
phpcs -s $CURRENT_PATH/../src/ --report-file=$CURRENT_PATH/../report/cli.violations.txt --report-width=1000

echo -e "$TOPROW CLI - GENERATE CODEBROWSER $BOTROW"
mkdir -p $CURRENT_PATH/../report/cli/code_browser
phpcb -o $CURRENT_PATH/../report/cli/code_browser -s $CURRENT_PATH/../src/

echo -e "$TOPROW CLI - GENERATE PHPDOC $BOTROW"
mkdir -p $CURRENT_PATH/../report/cli/docs
phpdoc -d $CURRENT_PATH/../src/ -t $CURRENT_PATH/../report/cli/docs -ti "Bonzai CLI Documentation" -dn "bonzai"

echo -e "$TOPROW CLI - GENERATING SOFTWARE'S METRICS $BOTROW"
phploc --count-tests $CURRENT_PATH/../src/ > $CURRENT_PATH/../report/cli.loc.txt
phpcpd $CURRENT_PATH/../src/ > $CURRENT_PATH/../report/cli.duplications.txt
