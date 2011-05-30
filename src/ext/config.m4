PHP_ARG_ENABLE(phpg, whether to enable phpGuardian support,
[ --enable-phpg   Enable phpGuardian support])

if test "$PHP_PHPG" = "yes"; then
  AC_DEFINE(HAVE_PHPG, 1, [Whether you have phpGuardian])
  PHP_NEW_EXTENSION(phpg, phpg.c, $ext_shared)
fi
