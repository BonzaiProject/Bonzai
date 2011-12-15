## BONZAI (previously phpGuardian)

**URL:** <http://www.bonzai-project.org>
**E-MAIL:** <info@bonzai-project.org>

**COPYRIGHT:** 2006-2011 Bonzai - Fabio Cicerchia. All rights reserved.

**LICENSING**

The MIT License is recommended for most projects, it's simple and easy to
understand and it places almost no restrictions on what you can do with
Bonzai. If the GPL suits your project better you are also free to use
Bonzai under that license. You don't have to do anything special to
choose one license or the other and you don't have to notify anyone which
license you are using. You are free to use Bonzai in commercial projects
as long as the copyright header is left intact.

The licenses mentioned are available online at
http://www.opensource.org/licenses/mit-license.php and
http://www.opensource.org/licenses/gpl-2.0.php or offline in the files
MIT-LICENSE and GPL-LICENSE.

**DESCRIPTION**

Protect your PHP source code
This project allow you to protect effectively your sources, without losing
performances. The only FREE, OPEN-SOURCE and EVERYONE ACCESSIBLE, solution
that lets you sleep soundly.

**USAGE**

```
--------------------------------------------------------------------------------
BONZAI                                                  (previously phpGuardian)
--------------------------------------------------------------------------------
Version: 0.1
Copyright (C) 2006 - 2011 Bonzai (Fabio Cicerchia). All rights reserved.
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

**DEPENDENCIES**

The only one dependencies is the PHP compiler
[_bcompiler_](http://php.net/manual/en/book.bcompiler.php) to generate the
bytecode.

**DOCUMENTATION (TBW)**

The documentation available as of the date of this release is included in HTML
format in the docs/manual/ directory.
The most up-to-date documentation can be found at http://httpd.apache.org/docs/trunk/.

**INSTALL**

No install process is needed.

**CONFIGURATION**

No configuration is needed.

**SOURCE-CODE**

To obtain the most recent source-code you can visit
[the GitHub repository](https://github.com/BonzaiProject/Bonzai).
Or simply do `git clone git://github.com/BonzaiProject/Bonzai.git`.

**AUTHORS**

* Fabio Cicerchia <info@fabiocicerchia.it>

**REQUEST**

To submit bugs, feature-request or anything else please send an email to
info@bonzai-project.org.
