PHP_ARG_ENABLE(bonzai, whether to enable bonzai support,
[ --enable-bonzai   Enable Bonzai support])

if test "$PHP_BONZAI" = "yes"; then
  sources="bonzai.c"

  ifdef([PHP_ADD_EXTENSION_DEP], [
    PHP_ADD_EXTENSION_DEP(bonzai, pcre, true)
  ])

  AC_DEFINE(HAVE_BONZAI, 1, [ ])
  PHP_NEW_EXTENSION(bonzai, $sources, $ext_shared)
fi
