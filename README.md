## BONZAI (was phpGuardian) [![Build Status](https://secure.travis-ci.org/BonzaiProject/Bonzai.png)](http://travis-ci.org/BonzaiProject/Bonzai)

**URL:** <http://www.bonzai-project.org>
**E-MAIL:** <info@bonzai-project.org>

**COPYRIGHT:** 2006-2012 Bonzai - Fabio Cicerchia. All rights reserved.

**LICENSES**

The MIT License is recommended for most projects, it's simple and
easy to understand  and it places  almost no restrictions on what
you can do with Bonzai.
If the GPL  suits your project  better you are  also free to  use
Bonzai under that license.
You don't have  to do anything  special to choose  one license or
the other  and you don't have to notify  anyone which license you
are using.  You are free  to use Bonzai in commercial projects as
long as the copyright header is left intact.

The licenses mentioned are available online at
http://www.opensource.org/licenses/mit-license.php and
http://www.opensource.org/licenses/gpl-2.0.php
or offline in the files MIT-LICENSE and GPL-LICENSE.

**DESCRIPTION**

Protect your PHP source code
This project allow you to protect effectively your sources, without losing
performances. The only FREE, OPEN-SOURCE and EVERYONE ACCESSIBLE, solution
that lets you sleep soundly.

**REQUIREMENTS & DEPENDENCIES**

System requirements:

* PHP 5.x

The only one dependency is the PHP compiler
[_bcompiler_](http://pecl.php.net/package/bcompiler) (a PECL extension) used to
generate the bytecode.

**INSTALL**

No install process is needed. You can simply download the source code and run
as-is.  
To install the application as system-binary simply launch the commad `sudo make install`.

**UNINSTALL**
To uninstall the application launch the command `sudo make uninstall`.

**CONFIGURATION**

No configuration is needed.

**USAGE**

```
--------------------------------------------------------------------------------
BONZAI                                                         (was phpGuardian)
--------------------------------------------------------------------------------
Version: 0.2
Copyright (C) 2006 - 2012 Bonzai (Fabio Cicerchia). All rights reserved.
License MIT or GNU GPL 2
--------------------------------------------------------------------------------

Usage:
./bonzai-cli [OPTIONS]... [FILES|DIRECTORIES]...

Options:
-b, --backup         Backup the original file, generate a .bak file
-d, --dry            Perform a trial run with no changes made
-r, --report         Generate a full report
    --colors         Use colors in output
    --log=<value>    Log execution messages in textual format
    --stderr         Write to STDERR instead of STDOUT
-q, --quiet          Quiet mode. Don't output anything
-h, --help           Show the help
-v, --version        Show the version

Report bugs to info@bonzai-project.org
```

**DOCUMENTATION**

The documentation available as of the date of this release is included in HTML
format in the docs/ directory. The most up-to-date documentation can be found at
[online](http://docs.bonzai-project.org).

**SOURCE-CODE**

To obtain the most recent source-code you can visit
[our GitHub repository](https://github.com/BonzaiProject/Bonzai).
Or simply do `git clone git://github.com/BonzaiProject/Bonzai.git`.

**AUTHORS**

* Fabio Cicerchia <info@fabiocicerchia.it>

**SUPPORT**

For all support questions please use drop us a mail to info@bonzai-project.org.  
For bug reports and issues is available
[the issue tracker](https://github.com/BonzaiProject/Bonzai/issues).  
Changes between versions are described in the
[ChangeLog](https://github.com/BonzaiProject/Bonzai/blob/master/CHANGELOG).  
*We are doing everything possible to make this documentation detailed and we are increasing the project's
quality level. Your help is invaluable!*  
If you want to do more and to participate actively in the project you'll be welcome.

**DONATION**

Bonzai is distributed for free and you can use it however you want(see the
LICENSES section for more informations).  
If you really like it and want to support its developers or if you want to
support a particular feature to be implemented, you can send a small donation
using your credit/debit card by clicking on the button below.  
The actual amount is fully up to you.

[![Click here to lend your support to: Bonzai and make a donation at www.pledgie.com](http://pledgie.com/campaigns/16386.png?skin_name=chrome)](http://www.pledgie.com/campaigns/16386)

Thank you.
