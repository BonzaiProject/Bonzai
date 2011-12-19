#!/bin/bash
#
# BONZAI
# (was phpGuardian)
#
# CODE NAME: phoenix
# VERSION:   0.1
#
# URL:       http://www.bonzai-project.org
# E-MAIL:    info@bonzai-project.org
#
# COPYRIGHT: 2006 - 2011 Bonzai (Fabio Cicerchia). All rights reserved.
# LICENSE:   MIT or GNU GPL 2
#            The MIT License is recommended for most projects, it's simple and
#            easy to understand  and it places  almost no restrictions on what
#            you can do with Bonzai.
#            If the GPL  suits your project  better you are  also free to  use
#            Bonzai under that license.
#            You don't have  to do anything  special to choose  one license or
#            the other  and you don't have to notify  anyone which license you
#            are using.  You are free  to use Bonzai in commercial projects as
#            long as the copyright header is left intact.
#            <http://www.opensource.org/licenses/mit-license.php>
#            <http://www.opensource.org/licenses/gpl-2.0.php>
#

START_TIME=$(date +%s)
CURRENT_PATH=`dirname $0`
FULL_PATH=`realpath "$CURRENT_PATH/../"`

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

### BUILDING ##################################################################
echo -e "${txtbld}BUILDING CLI ---------------------------------------$txtrst"

SRC="$FULL_PATH/src"
REPORT="$FULL_PATH/report"

echo -en "Clean structure ..............................."
CMD01=`rm -rf "$REPORT" 2>&1`
if [ "$CMD01" == "" ]; then
    echo "$txtgrn done$txtrst"
else
    echo "$txtred fail$txtrst"
fi

echo -en "Create structure .............................."
CMD02=`mkdir -p "$REPORT/cli/code_coverage" 2>&1`
CMD03=`mkdir -p "$REPORT/cli/code_browser" 2>&1`
CMD04=`mkdir -p "$REPORT/cli/log" 2>&1`
if [ "$CMD02" == "" -a "$CMD03" == "" -a "$CMD04" == "" ]; then
    echo "$txtgrn done$txtrst"
else
    echo "$txtred fail$txtrst"
fi

echo -en "Run phpunit ..................................."
TCONF="$FULL_PATH/tests/Test.xml"
XML="$REPORT/cli/log/phpunit.xml"
CMD05=`phpunit --verbose --configuration "$TCONF" --log-junit "$XML" 2>&1`
RES=`grep " failures=\"0\" errors=\"0\"" "$XML" | grep "testsuite" | grep "BonzaiCLI" | wc -l`
if [ "$RES" == "1" ]; then
    echo "$txtgrn done$txtrst"
else
    echo "$txtred fail$txtrst"
fi

echo -en "Generate violations ..........................."
RFILE="$REPORT/cli.violations.txt"
XML="$REPORT/cli/log/phpcs.xml"
CMD06=`phpcs --standard=PEAR -s -v --report-file="$RFILE" --report-xml="$XML" "$SRC" 2>&1`
RULES="codesize,design,naming,unusedcode"
XML="$REPORT/cli/log/phpmd.xml"
CMD07=`phpmd "$SRC" xml $RULES --reportfile "$XML" 2>&1`
echo "$txtgrn done$txtrst"

echo -en "Generate phpdoc ..............................."
#CMD08=`phpdoc -d "$SRC" -t "$REPORT/cli/docs" -ti "Bonzai CLI Documentation" -dn "bonzai" 2>&1`
#echo "$txtylw done, but look in $REPORT/cli/docs/errors.html$txtrst"
CMD08=`docblox run -d "$FULL_PATH" -t "$REPORT/cli/docs" 2>&1`
echo "$txtgrn done$txtrst"

echo -en "Generating software's metrics ................."
XML="$REPORT/cli/log/phploc.xml"
CMD09=`phploc --log-xml "$XML" "$SRC" > "$REPORT/cli.loc.txt" 2>&1`
#phploc "$FULL_PATH/tests" > "$REPORT/cli_tests.loc.txt"
CMD10=`phpcpd --log-pmd "$REPORT/cli/log/phpcpd.xml" "$SRC" > "$REPORT/cli.duplications.txt" 2>&1`
SVGC="$REPORT/cli.pdepend-chart.svg"
SVGP="$REPORT/cli.pdepend-pyramid.svg"
XML="$REPORT/cli/log/pdepend.xml"
CMD11=`pdepend --jdepend-chart="$SVGC" --overview-pyramid="$SVGP" --jdepend-xml="$XML" "$SRC" 2>&1`
echo "$txtgrn done$txtrst"

echo -en "Generate codebrowser .........................."
CMD12=`phpcb --log="$REPORT/cli/log" --source="$SRC" --output="$REPORT/cli/code_browser" 2>&1`
echo "$txtgrn done$txtrst"

### RELEASING #################################################################
echo ""
echo -e "${txtbld}RELEASING CLI --------------------------------------$txtrst"

echo -en "Generate PEAR package ........................."
CMD13=`pear package 2>&1`
echo "$txtgrn done$txtrst"

END_TIME=$(date +%s)
echo ""
echo -e "${txtbld}Time duration: $((END_TIME - START_TIME)) secs.$txtrst"
