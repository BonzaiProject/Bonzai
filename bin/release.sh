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

echo -e "$TOPROW CLEAN WORKSPACE $BOTROW"
rm -rf ../release/*

echo -e "$TOPROW CREATE STRUCTURE $BOTROW"
mkdir ../release/src
mkdir ../release/docs
mkdir ../release/report

echo -e "$TOPROW POPULATE WORKSPACE $BOTROW"
cp -r cli/* ../release/src/
cp ../CHANGELOG ../release/
cp ../*-LICENSE ../release/
cp ../README ../release/
cp ../TODO ../release/
cp -r ../report/cli/code_coverage ../release/report/
cp -r ../report/cli/docs ../release/docs/

echo -e "$TOPROW GENERATE ARCHIVES $BOTROW"
cd ../release/
tar -zcf /tmp/bonzai_0.1.tar.gz *
zip -rq /tmp/bonzai_0.1.zip *
mv /tmp/bonzai_0* .

echo -e "$TOPROW CLEAN WORKSPACE $BOTROW"
rm -rf ../release/src ../release/docs ../release/report ../release/CHANGELOG ../release/*-LICENSE ../release/README ../release/TODO
