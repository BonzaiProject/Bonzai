<?php
require_once 'PHPUnit/Framework.php';

require_once 'libs/Controller/PG_ControllerTest.php';
require_once 'libs/Hash/PG_HashTest.php';
require_once 'libs/Decoder/PG_DecoderTest.php';
require_once 'libs/Utils/PG_UtilsTest.php';
require_once 'libs/Utils/PG_Utils_OptionsTest.php';
require_once 'libs/Utils/PG_Utils_HelpTest.php';
require_once 'libs/Encoder/PG_EncoderTest.php';
require_once 'libs/Exception/PG_ExceptionTest.php';
require_once 'libs/Script/PG_Script_ParserTest.php';
require_once 'libs/Script/PG_Script_GeneratorTest.php';
require_once 'libs/Task/PG_TaskTest.php';
require_once 'libs/Converter/PG_ConverterTest.php';

class AllTests
{
    public static function suite()
    {
        $suite = new PHPUnit_Framework_TestSuite('phpGuardian CLI');

        $suite->addTestSuite('PG_ControllerTest');
        $suite->addTestSuite('PG_HashTest');
        $suite->addTestSuite('PG_DecoderTest');
        $suite->addTestSuite('PG_UtilsTest');
        $suite->addTestSuite('PG_Utils_OptionsTest');
        $suite->addTestSuite('PG_Utils_HelpTest');
        $suite->addTestSuite('PG_EncoderTest');
        $suite->addTestSuite('PG_ExceptionTest');
        $suite->addTestSuite('PG_Script_ParserTest');
        $suite->addTestSuite('PG_Script_GeneratorTest');
        $suite->addTestSuite('PG_TaskTest');
        $suite->addTestSuite('PG_ConverterTest');

        return $suite;
    }
}
