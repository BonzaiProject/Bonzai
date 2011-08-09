phpunit --syntax-check --colors --coverage-html='../bench/code_coverage/cli/' "./cli/tests/cliSuite.php"

TEST_PHP_EXECUTABLE=`whereis php | cut -d " " -f 2`
#export TEST_PHP_USER='./ext/tests/'
export TEST_PHP_DETAILED='0'
#export NO_INTERACTION='1'
php ext/tests/run-tests.php -m -p "$TEST_PHP_EXECUTABLE" -q "./ext/tests/"
