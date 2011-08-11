PHP_ARG_ENABLE(bonzai, whether to enable bonzai support,
[ --enable-bonzai   Enable Bonzai support])

if test "$PHP_BONZAI" = "yes"; then
  sources="bonzai.c"

  BCOMPILER_PATH="../bcompiler/"
  if test -z "$BCOMPILER_PATH"; then
    sources="$sources bcompiler.c bcompiler_zend.c"
  fi

  ifdef([PHP_ADD_EXTENSION_DEP], [
    PHP_ADD_EXTENSION_DEP(bonzai, bcompiler)
  ])

  AC_DEFINE(HAVE_BONZAI, 1, [ ])
  PHP_NEW_EXTENSION(bonzai, $sources, $ext_shared)
fi
