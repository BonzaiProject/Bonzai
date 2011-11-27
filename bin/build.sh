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

### BUILDING ###################################################################
echo -e "${txtbld}BUILDING CLI ---------------------------------------$txtrst"

echo -en "Clean structure ..............................."
CMD01=`rm -rf "$FULL_PATH/report" 2>&1`
if [ "$CMD01" == "" ]; then
    echo "$txtgrn done$txtrst"
else
    echo "$txtred fail$txtrst"
fi

echo -en "Create structure .............................."
CMD02=`mkdir -p "$FULL_PATH/report/cli/code_coverage" 2>&1`
CMD03=`mkdir -p "$FULL_PATH/report/cli/code_browser" 2>&1`
CMD04=`mkdir -p "$FULL_PATH/report/cli/log" 2>&1`
if [ "$CMD02" == "" -a "$CMD03" == "" -a "$CMD04" == "" ]; then
    echo "$txtgrn done$txtrst"
else
    echo "$txtred fail$txtrst"
fi

echo -en "Run phpunit ..................................."
CMD05=`phpunit --verbose --configuration "$FULL_PATH/tests/Test.xml" --log-junit "$FULL_PATH/report/cli/log/phpunit.xml" 2>&1`
RES=`grep " failures=\"0\" errors=\"0\"" "$FULL_PATH/report/cli/log/phpunit.xml" | grep "testsuite" | grep "BonzaiCLI" | wc -l`
if [ "$RES" == "1" ]; then
    echo "$txtgrn done$txtrst"
else
    echo "$txtred fail$txtrst"
fi

echo -en "Generate violations ..........................."
CMD06=`phpcs -s -v --report-file="$FULL_PATH/report/cli.violations.txt" --report-xml="$FULL_PATH/report/cli/log/phpcs.xml" "$FULL_PATH/src" 2>&1`
CMD07=`phpmd "$FULL_PATH/src" xml codesize,design,naming,unusedcode --reportfile "$FULL_PATH/report/cli/log/phpmd.xml" 2>&1`
echo "$txtgrn done$txtrst"

echo -en "Generate phpdoc ..............................."
CMD08=`phpdoc -d "$FULL_PATH/src" -t "$FULL_PATH/report/cli/docs" -ti "Bonzai CLI Documentation" -dn "bonzai" 2>&1`
echo "$txtylw done, but take a look on $FULL_PATH/report/cli/docs/errors.html$txtrst"

echo -en "Generating software's metrics ................."
CMD09=`phploc --log-xml "$FULL_PATH/report/cli/log/phploc.xml" "$FULL_PATH/src" > "$FULL_PATH/report/cli.loc.txt" 2>&1`
#phploc "$FULL_PATH/tests" > "$FULL_PATH/report/cli_tests.loc.txt"
CMD10=`phpcpd --log-pmd "$FULL_PATH/report/cli/log/phpcpd.xml" "$FULL_PATH/src" > "$FULL_PATH/report/cli.duplications.txt" 2>&1`
CMD11=`pdepend --jdepend-chart="$FULL_PATH/report/cli.pdepend-chart.svg" --overview-pyramid="$FULL_PATH/report/cli.pdepend-pyramid.svg" --jdepend-xml="$FULL_PATH/report/cli/log/pdepend.xml" "$FULL_PATH/src" 2>&1`
echo "$txtgrn done$txtrst"

echo -en "Generate codebrowser .........................."
CMD12=`phpcb --log="$FULL_PATH/report/cli/log" --source="$FULL_PATH/src" --output="$FULL_PATH/report/cli/code_browser" 2>&1`
echo "$txtgrn done$txtrst"

### RELEASING ##################################################################
echo ""
echo -e "${txtbld}RELEASING CLI --------------------------------------$txtrst"

echo -en "Clean workspace ..............................."
CMD13=`rm -rf "$FULL_PATH/release/*" 2>&1`
echo "$txtgrn done$txtrst"

echo -en "Create structure .............................."
CMD14=`mkdir -p "$FULL_PATH/release/report" 2>&1`
echo "$txtgrn done$txtrst"

echo -en "Populate workspace ............................"
CMD15=`cp -r "$FULL_PATH/src" "$FULL_PATH/release/" 2>&1`
CMD16=`cp "$FULL_PATH/CHANGELOG" "$FULL_PATH/release/" 2>&1`
CMD17=`cp "$FULL_PATH/GPL-LICENSE" "$FULL_PATH/release/" 2>&1`
CMD18=`cp "$FULL_PATH/MIT-LICENSE" "$FULL_PATH/release/" 2>&1`
CMD19=`cp "$FULL_PATH/README" "$FULL_PATH/release/" 2>&1`
CMD20=`cp "$FULL_PATH/TODO" "$FULL_PATH/release/" 2>&1`
CMD21=`cp -r "$FULL_PATH/report/cli/code_coverage" "$FULL_PATH/release/report/" 2>&1`
echo "$txtgrn done$txtrst"

echo -en "Generate archives ............................."
CMD22=`tar -zcf /tmp/bonzai_0.1.tar.gz $FULL_PATH/release/* 2>&1`
CMD23=`zip -rq /tmp/bonzai_0.1.zip $FULL_PATH/release/* 2>&1`
CMD24=`mv /tmp/bonzai_0* "$FULL_PATH/release/" 2>&1`
echo "$txtgrn done$txtrst"

echo -en "Clean workspace ..............................."
CMD25=`rm -rf "$FULL_PATH/release/src" "$FULL_PATH/release/report" "$FULL_PATH/release/CHANGELOG" "$FULL_PATH/release/GPL-LICENSE" "$FULL_PATH/release/MIT-LICENSE" "$FULL_PATH/release/README" "$FULL_PATH/release/TODO" 2>&1`
echo "$txtgrn done$txtrst"

END_TIME=$(date +%s)
echo ""
echo -e "${txtbld}Time duration: $((END_TIME - START_TIME)) secs.$txtrst"
