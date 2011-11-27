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

START_TIME=$(date +%s)
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

### BUILDING ###################################################################
echo -e "$TOPROW BUILDING CLI - CREATE STRUCTURE $BOTROW"
mkdir -p "$CURRENT_PATH/../report/cli/code_coverage"
mkdir -p "$CURRENT_PATH/../report/cli/code_browser"
mkdir -p "$CURRENT_PATH/../report/cli/log"

echo -e "$TOPROW BUILDING CLI - RUN PHPUNIT $BOTROW"
phpunit --configuration "$CURRENT_PATH/../tests/Test.xml" --log-junit "$CURRENT_PATH/../report/cli/log/phpunit.xml"

echo -e "$TOPROW BUILDING CLI - GENERATE VIOLATIONS $BOTROW"
phpcs -s -v --report-file="$CURRENT_PATH/../report/cli.violations.txt" --report-xml="$CURRENT_PATH/../report/cli/log/phpcs.xml" "$CURRENT_PATH/../src"
#phpcs -s --report-file="$CURRENT_PATH/../report/cli_tests.violations.txt" --report-xml="$CURRENT_PATH/../report/cli/log/tests.phpcs.xml" "$CURRENT_PATH/../tests"
phpmd "$CURRENT_PATH/../src" xml codesize,design,naming,unusedcode --reportfile "$CURRENT_PATH/../report/cli/log/phpmd.xml"

echo -e "$TOPROW BUILDING CLI - GENERATE PHPDOC $BOTROW"
phpdoc -d "$CURRENT_PATH/../src" -t "$CURRENT_PATH/../report/cli/docs" -ti "Bonzai CLI Documentation" -dn "bonzai"

echo -e "$TOPROW BUILDING CLI - GENERATING SOFTWARE'S METRICS $BOTROW"
phploc --log-xml "$CURRENT_PATH/../report/cli/log/phploc.xml" "$CURRENT_PATH/../src" > "$CURRENT_PATH/../report/cli.loc.txt"
#phploc "$CURRENT_PATH/../tests" > "$CURRENT_PATH/../report/cli_tests.loc.txt"
phpcpd --log-pmd "$CURRENT_PATH/../report/cli/log/phpcpd.xml" "$CURRENT_PATH/../src" > "$CURRENT_PATH/../report/cli.duplications.txt"
pdepend --jdepend-chart="$CURRENT_PATH/../report/cli.pdepend-chart.svg" --overview-pyramid="$CURRENT_PATH/../report/cli.pdepend-pyramid.svg" --jdepend-xml="$CURRENT_PATH/../report/cli/log/pdepend.xml" "$CURRENT_PATH/../src"

echo -e "$TOPROW BUILDING CLI - GENERATE CODEBROWSER $BOTROW"
phpcb --log="$CURRENT_PATH/../report/cli/log" --source="$CURRENT_PATH/../src" --output="$CURRENT_PATH/../report/cli/code_browser"

### RELEASING ##################################################################
echo -e "$TOPROW RELEASE - CLEAN WORKSPACE $BOTROW"
rm -rf "$CURRENT_PATH/../release/*"

echo -e "$TOPROW RELEASE - CREATE STRUCTURE $BOTROW"
mkdir -p "$CURRENT_PATH/../release/report"

echo -e "$TOPROW RELEASE - POPULATE WORKSPACE $BOTROW"
cp -r "$CURRENT_PATH/../src" "$CURRENT_PATH/../release/"
cp "$CURRENT_PATH/../CHANGELOG" "$CURRENT_PATH/../release/"
cp "$CURRENT_PATH/../GPL-LICENSE" "$CURRENT_PATH/../release/"
cp "$CURRENT_PATH/../MIT-LICENSE" "$CURRENT_PATH/../release/"
cp "$CURRENT_PATH/../README" "$CURRENT_PATH/../release/"
cp "$CURRENT_PATH/../TODO" "$CURRENT_PATH/../release/"
cp -r "$CURRENT_PATH/../report/cli/code_coverage" "$CURRENT_PATH/../release/report/"

echo -e "$TOPROW RELEASE - GENERATE ARCHIVES $BOTROW"
tar -zcf /tmp/bonzai_0.1.tar.gz $CURRENT_PATH/../release/*
zip -rq /tmp/bonzai_0.1.zip $CURRENT_PATH/../release/*
mv /tmp/bonzai_0* "$CURRENT_PATH/../release/"

echo -e "$TOPROW CLEAN WORKSPACE $BOTROW"
rm -rf "$CURRENT_PATH/../release/src" "$CURRENT_PATH/../release/report" "$CURRENT_PATH/../release/CHANGELOG" "$CURRENT_PATH/../release/GPL-LICENSE" "$CURRENT_PATH/../release/MIT-LICENSE" "$CURRENT_PATH/../release/README" "$CURRENT_PATH/../release/TODO"

END_TIME=$(date +%s)
echo -e "$TOPROW Time duration: $((END_TIME - START_TIME)) secs. $BOTROW"
