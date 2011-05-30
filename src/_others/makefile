#
#           _            ____                     _ _             ____  
#     _ __ | |__  _ __  / ___|_   _  __ _ _ __ __| (_) __ _ _ __ |___ \ 
#    | '_ \| '_ \| '_ \| |  _| | | |/ _` | '__/ _` | |/ _` | '_ \  __) |
#    | |_) | | | | |_) | |_| | |_| | (_| | | | (_| | | (_| | | | |/ __/ 
#    | .__/|_| |_| .__/ \____|\__,_|\__,_|_|  \__,_|_|\__,_|_| |_|_____|
#    |_|         |_| phpGuardian %MODULE%
#
#
# PHPGUARDIAN2
# 
# CODE NAME:          %codename%
# ENGINE VERSION:     %engine_ver%
# MODULE VERSION:     %module_ver%
#
# URL:                http://www.phpguardian.org
# E-MAIL:             info@phpguardian.org
#
# COPYRIGHT:          2006-%curr_year% Fabio Cicerchia
# LICENSE:            GNU GPL 3+
#                     This program is free software: you can redistribute it and/or modify
#                     it under the terms of the GNU General Public License as published by
#                     the Free Software Foundation, either version 3 of the License, or
#                     (at your option) any later version.
#
#                     This program is distributed in the hope that it will be useful,
#                     but WITHOUT ANY WARRANTY; without even the implied warranty of
#                     MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
#                     GNU General Public License for more details.
#
#                     You should have received a copy of the GNU General Public License
#                     along with this program.  If not, see <http://www.gnu.org/licenses/>.
#
# $Id: $
 
#PRG
CC=@gcc
CCCC=@cccc
CHOWN=@chown
CP=@cp
DOXY=doxygen
ECHO=@echo
ECHO_N=@echo -n
GCOV=@gcov
GENHTML=genhtml
INSTALL=install
LCOV=lcov --capture
MKDIR=@mkdir -p
MSGFMT=@msgfmt
MV=@mv
OWNER=bin
RM=@rm -rf
SCA=splint

#ARGS
C_FLAGS=$(DEBUG) -c -Wall
DEBUG=-g
GCOV_FLAGS=-fprofile-arcs -ftest-coverage
GROUP=bin
MATHLIB=-lm
SCA_FLAGS=+quiet +posixlib -unrecog -preproc +trytorecover

#PATHS
BINDIR=/usr/bin
LANGDIR=$(SWDIR)/locale
PHPG_CLI=./bin/phpg-cli
PHPG_CLI_LANGS=./phpg-cli/locale/*
PHPG_CONV=./bin/phpg-converter
PHPG_CONV_LANGS=./phpg-converter/locale/*
PHPG_HASH=./bin/phpg-hash
PHPG_HASH_LANGS=./phpg-hash/locale/*
SWDIR=/usr/local/phpguardian

all: prepare phpguardian clean
	$(ECHO)
	$(ECHO) "Build complete."
	$(ECHO) "Now you can run 'make install'."
	$(ECHO)

prepare:
	$(MKDIR) bin
	$(ECHO_N) "Checking source code..."
	$(SCA) $(SCA_FLAGS) phpg-cli/main.c
	$(SCA) $(SCA_FLAGS) phpg-converter/main.c
	$(SCA) $(SCA_FLAGS) phpg-hash/main.c
	$(ECHO) "done"

phpguardian: phpg-cli phpg-converter phpg-hash
	$(ECHO)

phpg-cli: cli_gettext cli_main.o
	$(ECHO_N) "Compiling CLI... "
	$(CC) $(MATHLIB) main.o -o $(PHPG_CLI)
	$(ECHO) "done"

cli_main.o: phpg-cli/main.c
	$(CC) $(C_FLAGS) phpg-cli/main.c
	$(GCOV) phpg-cli/main.c

cli_gettext:
	$(ECHO_N) "Compiling Gettext... "
	$(MKDIR) phpg-cli/locale/compiled/it_IT/LC_MESSAGES
	$(MSGFMT) -cC "phpg-cli/locale/phpg-cli-it_IT.po" -o "phpg-cli/locale/compiled/it_IT/LC_MESSAGES/phpg-cli.mo"
	$(ECHO) "done"

phpg-converter: conv_gettext conv_main.o
	$(ECHO_N) "Compiling CONVERTER... "
	$(CC) $(MATHLIB) main.o -o $(PHPG_CONV)
	$(ECHO) "done"

conv_main.o: phpg-converter/main.c
	$(CC) $(C_FLAGS) phpg-converter/main.c
	$(GCOV) phpg-converter/main.c

conv_gettext:
	$(ECHO_N) "Compiling Gettext... "
	$(MKDIR) phpg-converter/locale/compiled/it_IT/LC_MESSAGES
	$(MSGFMT) -cC "phpg-converter/locale/phpg-conv-it_IT.po" -o "phpg-converter/locale/compiled/it_IT/LC_MESSAGES/phpg-conv.mo"
	$(ECHO) "done"

phpg-hash: hash_gettext hash_main.o
	$(ECHO_N) "Compiling HASH... "
	$(CC) $(MATHLIB) main.o -o $(PHPG_HASH)
	$(ECHO) "done"

hash_main.o: phpg-hash/main.c
	$(CC) $(C_FLAGS) phpg-hash/main.c
	$(GCOV) phpg-hash/main.c

hash_gettext:
	$(ECHO_N) "Compiling Gettext... "
	$(MKDIR) phpg-hash/locale/compiled/it_IT/LC_MESSAGES
	$(MSGFMT) -cC "phpg-hash/locale/phpg-hash-it_IT.po" -o "phpg-hash/locale/compiled/it_IT/LC_MESSAGES/phpg-hash.mo"
	$(ECHO) "done"

coverage: codecov clean

codecov:
	$(ECHO_N) "Starting Code Coverage..."
	$(CC) $(GCOV_FLAGS) phpg-cli/main.c
	$(GCOV) phpg-cli/main.c
	./a.out > /dev/null
	$(LCOV) --directory . --output-file phpg-cli.info
	$(CC) $(GCOV_FLAGS) phpg-converter/main.c
	$(GCOV) phpg-converter/main.c
	./a.out > /dev/null
	$(LCOV) --directory . --output-file phpg-converter.info
	$(CC) $(GCOV_FLAGS) phpg-hash/main.c
	$(GCOV) phpg-hash/main.c
	./a.out > /dev/null
	$(LCOV) --directory . --output-file phpg-hash.info
	$(MKDIR) codecoverage
	$(GENHTML) phpg-*.info -o codecoverage
	$(RM) *.gcov *.gcno *.gcda *.out
	$(ECHO) "done"

sloc:
	$(ECHO_N) "Generating SLOC report..."
	$(MKDIR) report_sloc
	$(CCCC) --outdir=report_sloc --html_outfile=report_sloc/index.html --lang=c phpg-*/*.c shared_libs/*.c
	$(ECHO) "done"

doxygen:
	$(ECHO_N) "Generating docs..."
	$(RM) docs
	$(DOXY) doxygen_docs
	$(MV) html docs
	$(ECHO) "done"

test: unittest clean

unittest:
	$(ECHO_N) "Compiling Tests... "
	$(CC) $(MATHLIB) -lcunit tests/tests.c -o tests/tests
	$(ECHO) "done"
	$(ECHO) "Launch... "
	@./tests/tests
	$(RM) tests/tests
	$(MKDIR) tests/reports
	$(MV) *-Listing.xml tests/reports/
	$(MV) *-Results.xml tests/reports/
	$(ECHO) "Reports are saved in ./tests/reports/"

install:
	$(ECHO_N) "Installing..."
	$(MKDIR) -m 755 $(SWDIR)
	$(MKDIR) -m 755 $(LANGDIR)
	$(INSTALL) -c -o $(OWNER) -g $(GROUP) -m 755 $(PHPG_CLI) $(SWDIR)
	$(CP) -r $(PHPG_CLI_LANGS) $(LANGDIR)
	$(INSTALL) -c -o $(OWNER) -g $(GROUP) -m 755 $(PHPG_CONV) $(SWDIR)
	$(CP) -r $(PHPG_CONV_LANGS) $(LANGDIR)
	$(INSTALL) -c -o $(OWNER) -g $(GROUP) -m 755 $(PHPG_HASH) $(SWDIR)
	$(CP) -r $(PHPG_HASH_LANGS) $(LANGDIR)
	$(CHOWN) -R $(OWNER):$(GROUP) $(LANGDIR)
	$(ECHO_N) "PATH=$$" >> ~/.bashrc
	$(ECHO) "PATH:$(SWDIR)" >> ~/.bashrc
	$(ECHO) "export PATH" >> ~/.bashrc
	$(ECHO) "done"

uninstall:
	$(ECHO_N) "Uninstalling..."
	$(RM) $(SWDIR)
	$(RM) $(LANGDIR)
	grep -v $(SWDIR) ~/.bashrc > /tmp/.bashrc
	$(CP) /tmp/.bashrc ~/.bashrc
	$(ECHO) "done"

.PHONY: clean
clean:
	$(ECHO_N) "Cleaning... "
	$(RM) $(FILENAME) *.o *~ *.info *.gcov *.gcno *.gcda *.out *#
	$(ECHO) "done"
