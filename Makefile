#
# BONZAI
# (was phpGuardian)
#
# CODENAME:  caffeine
# VERSION:   0.2
#
# URL:       http://www.bonzai-project.org
# E-MAIL:    info@bonzai-project.org
#
# COPYRIGHT: 2006 - 2012 Bonzai (Fabio Cicerchia). All rights reserved.
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

RM=rm -rf
MKDIR=mkdir -p
CP=cp -r
CHMOD=chmod
ECHO=@echo
LN=ln -s

PECL=-pecl
PEAR=-pear
PHPUNIT=phpunit
PHPCS=phpcs -s -v
PHPMD=phpmd
PHPLOC=phploc
PHPCPD=phpcpd
PDEPEND=pdepend
PHPCB=phpcb
DOCBLOX=docblox
MSGFMT=msgfmt

PEAR_INSTALL_FLAGS=--alldeps

CURRENTDIR=.
REPORTDIR=$(CURRENTDIR)/report
SOURCEDIR=$(CURRENTDIR)/src
LOCALEDIR=$(CURRENTDIR)/locales
PEARDIR=$(CURRENTDIR)/pear
INSTALLDIR=/opt/bonzai
BINDIR=/bin

################################################################################
# GENERAL ACTIONS
################################################################################

all: .info build-environment test sca docs gettext

.info:
	$(ECHO) "--------------------------------------------------------------------------------"
	$(ECHO) "BONZAI                                                         (was phpGuardian)"
	$(ECHO) "--------------------------------------------------------------------------------"

install-environment: install-bcompiler install-imagick install-phpunit install-docblox install-pdepend install-phpmd install-phpcs

build-environment:
	$(ECHO) "CREATE THE ENVIRONMENT STRUCTURE"
	+@[ -d $(REPORTDIR) ] || $(RM) $(REPORTDIR)
	$(MKDIR) $(REPORTDIR)
	$(MKDIR) $(REPORTDIR)/cli
	$(MKDIR) $(REPORTDIR)/cli/code_coverage
	$(MKDIR) $(REPORTDIR)/cli/code_browser
	$(MKDIR) $(REPORTDIR)/cli/log

test:
	$(ECHO) "RUN THE TESTS"
	$(PHPUNIT) --log-junit "$(REPORTDIR)/cli/log/phpunit.xml"

sca: run-phpcs run-phpmd run-phploc run phpcpd run-pdepend run-phpcb

docs:
	$(ECHO) "BUILD THE DOCUMENTATION"
	$(DOCBLOX) run -d "$(SOURCEDIR)" -t "$(REPORTDIR)/cli/docs"
#	phpdoc -d "./src/" -t "./report/cli/docs" -ti "Bonzai CLI Documentation" -dn "bonzai"

gettext:
	$(ECHO) "BUILD THE TRANSLATIONS"
	$(MSGFMT) "$(LOCALEDIR)/it_IT/LC_MESSAGES/messages.po" -o "$(LOCALEDIR)/it_IT/LC_MESSAGES/messages.mo"`

install:
	+@[ ! -d $(INSTALLDIR) ] || $(MKDIR) $(INSTALLDIR)
	$(CP) $(CURRENTDIR) $(INSTALLDIR)
	$(CHMOD) 777 $(INSTALLDIR)/bin/bonzai-cli
	$(LN) $(INSTALLDIR)/bin/bonzai-cli $(BINDIR)/bonzai-cli
	$(ECHO) "INSTALLED"

uninstall:
	$(RM) $(INSTALLDIR)
	$(RM) $(BINDIR)/bonzai-cli
	$(ECHO) "UNINSTALLED"

################################################################################
# SPECIFIC ACTIONS
################################################################################

install-bcompiler:
	$(PECL) install bcompiler

install-imagick:
	$(PECL) install imagick

install-phpunit:
	$(PEAR) channel-discover pear.phpunit.de
	$(PEAR) install $(PEAR_INSTALL_FLAGS) phpunit/PHPUnit phpunit/PHP_CodeBrowser phpunit/PHP_CodeCoverage phpunit/phpcov phpunit/phpcpd phpunit/phploc

install-docblox:
	$(PEAR) channel-discover pear.docblox-project.org
	$(PEAR) install $(PEAR_INSTALL_FLAGS) docblox/DocBlox

install-pdepend:
	$(PEAR) channel-discover pear.pdepend.org
	$(PEAR) install $(PEAR_INSTALL_FLAGS) pdepend/PHP_Depend-beta

install-phpmd:
	$(PEAR) channel-discover pear.phpmd.org
	$(PEAR) install $(PEAR_INSTALL_FLAGS) phpmd/PHP_PMD

install-phpcs:
	$(PEAR) install $(PEAR_INSTALL_FLAGS) PHP_CodeSniffer-1.3.2

run-phpcs:
	$(PHPCS) --standard="./bonzai_ruleset.xml" --report-file="$(REPORTDIR)/cli/violations.txt" --report-xml="$(REPORTDIR)/cli/log/phpcs.xml" "$(SOURCEDIR)"

run-phpmd:
	$(PHPMD) "$(SOURCEDIR)" xml codesize,design,naming,unusedcode --reportfile "$(REPORTDIR)/cli/log/phpmd.xml"

run-phploc:
	$(PHPLOC) --log-xml "$(REPORTDIR)/cli/log/phploc.xml" "$(SOURCEDIR)" > "$(REPORTDIR)/cli.loc.txt"

run-phpcpd:
	$(PHPCPD) --log-pmd "$(REPORTDIR)/cli/log/phpcpd.xml" "$(SOURCEDIR)" > "$(REPORTDIR)/cli/cli.duplications.txt"

run-pdepend:
	$(PDEPEND) --jdepend-chart="$(REPORTDIR)/cli/cli.pdepend-chart.svg" --overview-pyramid="$(REPORTDIR)/cli/cli.pdepend-pyramid.svg" --jdepend-xml="$(REPORTDIR)/cli/log/pdepend.xml" "$(SOURCEDIR)"

run-phpcb:
	$(PHPCB) --log="$(REPORTDIR)/cli/log" --source="$(SOURCEDIR)" --output="$(REPORTDIR)/cli/code_browser"
