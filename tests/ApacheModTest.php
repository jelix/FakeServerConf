<?php
require_once(__DIR__.'/../src/jelix/FakeServerConf/FakeServerConf.php');
require_once(__DIR__.'/../src/jelix/FakeServerConf/ApacheMod.php');

/**
 * See www/README to modify this file
*/

/*
 urls to test :
 Url1: /
 Url2: /index.php
 Url3: /index.php/foo/bar
 Url4: /index.php/foo/bar?baz=2
 Url5: /index
 Url6: /index/foo/bar
 Url7: /index/foo/bar?baz=2
 Url8: /info/
 Url9: /info/index.php
 Url10: /info/index.php/foo/bar
 Url11: /info/index.php/foo/bar?baz=2
 url12: /info/index
 url13: /info/index/foo/bar
 url14: /info/index/foo/bar?baz=2
 url15: https://testapp.local:8080/index.php/foo/bar
*/

class ApacheModTest extends PHPUnit_Framework_TestCase {

    protected function getFakeServer($scriptName, $url) {
        $server = new \jelix\FakeServerConf\ApacheMod(null, $scriptName);
        $server->setHttpRequest($url);
        return $server;
    }

    function testUrl1() {
        $server = $this->getFakeServer('/index.php','http://testapp.local/');
        $this->assertEquals('testapp.local',                            $_SERVER['HTTP_HOST']);
        $this->assertFalse(                                       isset($_SERVER['HTTPS']));
        $this->assertEquals('GET',                                      $_SERVER['REQUEST_METHOD']);
        $this->assertEquals('testapp.local',                            $_SERVER['SERVER_NAME']);
        $this->assertEquals('127.0.0.1',                                $_SERVER['SERVER_ADDR']);
        $this->assertEquals('80',                                       $_SERVER['SERVER_PORT']);
        $this->assertEquals('/',                                        $_SERVER['REQUEST_URI']);
        $this->assertEquals('',                                         $_SERVER['QUERY_STRING']);
        $this->assertEquals('/var/www/',                                $_SERVER['DOCUMENT_ROOT']);
        $this->assertEquals('/index.php',                               $_SERVER['SCRIPT_NAME']);
        $this->assertEquals('/var/www/index.php',                       $_SERVER['SCRIPT_FILENAME']);
        $this->assertFalse(                                       isset($_SERVER['PATH_INFO']));
        $this->assertFalse(                                       isset($_SERVER['PATH_TRANSLATED']));
        $this->assertEquals('/index.php',                               $_SERVER['PHP_SELF']);
        $this->assertFalse(                                       isset($_SERVER['ORIG_PATH_INFO']));
        $this->assertFalse(                                       isset($_SERVER['ORIG_PATH_TRANSLATED']));
        $this->assertFalse(                                       isset($_SERVER['ORIG_SCRIPT_FILENAME']));
        $this->assertFalse(                                       isset($_SERVER['PHPRC']));
        $this->assertFalse(                                       isset($_SERVER['REDIRECT_URL']));

    }
    
    function testUrl2() {
        $server = $this->getFakeServer('/index.php','http://testapp.local/index.php');
        $this->assertEquals('testapp.local',                            $_SERVER['HTTP_HOST']);
        $this->assertFalse(                                       isset($_SERVER['HTTPS']));
        $this->assertEquals('GET',                                      $_SERVER['REQUEST_METHOD']);
        $this->assertEquals('testapp.local',                            $_SERVER['SERVER_NAME']);
        $this->assertEquals('127.0.0.1',                                $_SERVER['SERVER_ADDR']);
        $this->assertEquals('80',                                       $_SERVER['SERVER_PORT']);
        $this->assertEquals('/index.php',                               $_SERVER['REQUEST_URI']);
        $this->assertEquals('',                                         $_SERVER['QUERY_STRING']);
        $this->assertEquals('/var/www/',                                $_SERVER['DOCUMENT_ROOT']);
        $this->assertEquals('/index.php',                               $_SERVER['SCRIPT_NAME']);
        $this->assertEquals('/var/www/index.php',                       $_SERVER['SCRIPT_FILENAME']);
        $this->assertFalse(                                       isset($_SERVER['PATH_INFO']));
        $this->assertFalse(                                       isset($_SERVER['PATH_TRANSLATED']));
        $this->assertEquals('/index.php',                               $_SERVER['PHP_SELF']);
        $this->assertFalse(                                       isset($_SERVER['ORIG_PATH_INFO']));
        $this->assertFalse(                                       isset($_SERVER['ORIG_PATH_TRANSLATED']));
        $this->assertFalse(                                       isset($_SERVER['ORIG_SCRIPT_FILENAME']));
        $this->assertFalse(                                       isset($_SERVER['PHPRC']));
        $this->assertFalse(                                       isset($_SERVER['REDIRECT_URL']));

    }
    
    function testUrl3() {
        $server = $this->getFakeServer('/index.php','http://testapp.local/index.php/foo/bar');
        $this->assertEquals('testapp.local',                            $_SERVER['HTTP_HOST']);
        $this->assertFalse(                                       isset($_SERVER['HTTPS']));
        $this->assertEquals('GET',                                      $_SERVER['REQUEST_METHOD']);
        $this->assertEquals('testapp.local',                            $_SERVER['SERVER_NAME']);
        $this->assertEquals('127.0.0.1',                                $_SERVER['SERVER_ADDR']);
        $this->assertEquals('80',                                       $_SERVER['SERVER_PORT']);
        $this->assertEquals('/index.php/foo/bar',                       $_SERVER['REQUEST_URI']);
        $this->assertEquals('',                                         $_SERVER['QUERY_STRING']);
        $this->assertEquals('/var/www/',                                $_SERVER['DOCUMENT_ROOT']);
        $this->assertEquals('/index.php',                               $_SERVER['SCRIPT_NAME']);
        $this->assertEquals('/var/www/index.php',                       $_SERVER['SCRIPT_FILENAME']);
        $this->assertEquals('/foo/bar',                                 $_SERVER['PATH_INFO']);
        $this->assertEquals('/var/www/foo/bar',                         $_SERVER['PATH_TRANSLATED']);
        $this->assertEquals('/index.php/foo/bar',                       $_SERVER['PHP_SELF']);
        $this->assertFalse(                                       isset($_SERVER['ORIG_PATH_INFO']));
        $this->assertFalse(                                       isset($_SERVER['ORIG_PATH_TRANSLATED']));
        $this->assertFalse(                                       isset($_SERVER['ORIG_SCRIPT_FILENAME']));
        $this->assertFalse(                                       isset($_SERVER['PHPRC']));
        $this->assertFalse(                                       isset($_SERVER['REDIRECT_URL']));

    }
    
    function testUrl4() {
        $server = $this->getFakeServer('/index.php','http://testapp.local/index.php/foo/bar?baz=2');
        $this->assertEquals('testapp.local',                            $_SERVER['HTTP_HOST']);
        $this->assertFalse(                                       isset($_SERVER['HTTPS']));
        $this->assertEquals('GET',                                      $_SERVER['REQUEST_METHOD']);
        $this->assertEquals('testapp.local',                            $_SERVER['SERVER_NAME']);
        $this->assertEquals('127.0.0.1',                                $_SERVER['SERVER_ADDR']);
        $this->assertEquals('80',                                       $_SERVER['SERVER_PORT']);
        $this->assertEquals('/index.php/foo/bar?baz=2',                 $_SERVER['REQUEST_URI']);
        $this->assertEquals('baz=2',                                    $_SERVER['QUERY_STRING']);
        $this->assertEquals('/var/www/',                                $_SERVER['DOCUMENT_ROOT']);
        $this->assertEquals('/index.php',                               $_SERVER['SCRIPT_NAME']);
        $this->assertEquals('/var/www/index.php',                       $_SERVER['SCRIPT_FILENAME']);
        $this->assertEquals('/foo/bar',                                 $_SERVER['PATH_INFO']);
        $this->assertEquals('/var/www/foo/bar',                         $_SERVER['PATH_TRANSLATED']);
        $this->assertEquals('/index.php/foo/bar',                       $_SERVER['PHP_SELF']);
        $this->assertFalse(                                       isset($_SERVER['ORIG_PATH_INFO']));
        $this->assertFalse(                                       isset($_SERVER['ORIG_PATH_TRANSLATED']));
        $this->assertFalse(                                       isset($_SERVER['ORIG_SCRIPT_FILENAME']));
        $this->assertFalse(                                       isset($_SERVER['PHPRC']));
        $this->assertFalse(                                       isset($_SERVER['REDIRECT_URL']));

    }
    
    function testUrl5() {
        $server = $this->getFakeServer('/index.php','http://testapp.local/index');
        $this->assertEquals('testapp.local',                            $_SERVER['HTTP_HOST']);
        $this->assertFalse(                                       isset($_SERVER['HTTPS']));
        $this->assertEquals('GET',                                      $_SERVER['REQUEST_METHOD']);
        $this->assertEquals('testapp.local',                            $_SERVER['SERVER_NAME']);
        $this->assertEquals('127.0.0.1',                                $_SERVER['SERVER_ADDR']);
        $this->assertEquals('80',                                       $_SERVER['SERVER_PORT']);
        $this->assertEquals('/index',                                   $_SERVER['REQUEST_URI']);
        $this->assertEquals('',                                         $_SERVER['QUERY_STRING']);
        $this->assertEquals('/var/www/',                                $_SERVER['DOCUMENT_ROOT']);
        $this->assertEquals('/index.php',                               $_SERVER['SCRIPT_NAME']);
        $this->assertEquals('/var/www/index.php',                       $_SERVER['SCRIPT_FILENAME']);
        $this->assertFalse(                                       isset($_SERVER['PATH_INFO']));
        $this->assertFalse(                                       isset($_SERVER['PATH_TRANSLATED']));
        $this->assertEquals('/index.php',                               $_SERVER['PHP_SELF']);
        $this->assertFalse(                                       isset($_SERVER['ORIG_PATH_INFO']));
        $this->assertFalse(                                       isset($_SERVER['ORIG_PATH_TRANSLATED']));
        $this->assertFalse(                                       isset($_SERVER['ORIG_SCRIPT_FILENAME']));
        $this->assertFalse(                                       isset($_SERVER['PHPRC']));
        $this->assertFalse(                                       isset($_SERVER['REDIRECT_URL']));

    }
    
    function testUrl6() {
        $server = $this->getFakeServer('/index.php','http://testapp.local/index/foo/bar');
        $this->assertEquals('testapp.local',                            $_SERVER['HTTP_HOST']);
        $this->assertFalse(                                       isset($_SERVER['HTTPS']));
        $this->assertEquals('GET',                                      $_SERVER['REQUEST_METHOD']);
        $this->assertEquals('testapp.local',                            $_SERVER['SERVER_NAME']);
        $this->assertEquals('127.0.0.1',                                $_SERVER['SERVER_ADDR']);
        $this->assertEquals('80',                                       $_SERVER['SERVER_PORT']);
        $this->assertEquals('/index/foo/bar',                           $_SERVER['REQUEST_URI']);
        $this->assertEquals('',                                         $_SERVER['QUERY_STRING']);
        $this->assertEquals('/var/www/',                                $_SERVER['DOCUMENT_ROOT']);
        $this->assertEquals('/index.php',                               $_SERVER['SCRIPT_NAME']);
        $this->assertEquals('/var/www/index.php',                       $_SERVER['SCRIPT_FILENAME']);
        $this->assertEquals('/foo/bar',                                 $_SERVER['PATH_INFO']);
        $this->assertEquals('/var/www/foo/bar',                         $_SERVER['PATH_TRANSLATED']);
        $this->assertEquals('/index.php/foo/bar',                       $_SERVER['PHP_SELF']);
        $this->assertFalse(                                       isset($_SERVER['ORIG_PATH_INFO']));
        $this->assertFalse(                                       isset($_SERVER['ORIG_PATH_TRANSLATED']));
        $this->assertFalse(                                       isset($_SERVER['ORIG_SCRIPT_FILENAME']));
        $this->assertFalse(                                       isset($_SERVER['PHPRC']));
        $this->assertFalse(                                       isset($_SERVER['REDIRECT_URL']));

    }
    
    function testUrl7() {
        $server = $this->getFakeServer('/index.php','http://testapp.local/index/foo/bar?baz=2');
        $this->assertEquals('testapp.local',                            $_SERVER['HTTP_HOST']);
        $this->assertFalse(                                       isset($_SERVER['HTTPS']));
        $this->assertEquals('GET',                                      $_SERVER['REQUEST_METHOD']);
        $this->assertEquals('testapp.local',                            $_SERVER['SERVER_NAME']);
        $this->assertEquals('127.0.0.1',                                $_SERVER['SERVER_ADDR']);
        $this->assertEquals('80',                                       $_SERVER['SERVER_PORT']);
        $this->assertEquals('/index/foo/bar?baz=2',                     $_SERVER['REQUEST_URI']);
        $this->assertEquals('baz=2',                                    $_SERVER['QUERY_STRING']);
        $this->assertEquals('/var/www/',                                $_SERVER['DOCUMENT_ROOT']);
        $this->assertEquals('/index.php',                               $_SERVER['SCRIPT_NAME']);
        $this->assertEquals('/var/www/index.php',                       $_SERVER['SCRIPT_FILENAME']);
        $this->assertEquals('/foo/bar',                                 $_SERVER['PATH_INFO']);
        $this->assertEquals('/var/www/foo/bar',                         $_SERVER['PATH_TRANSLATED']);
        $this->assertEquals('/index.php/foo/bar',                       $_SERVER['PHP_SELF']);
        $this->assertFalse(                                       isset($_SERVER['ORIG_PATH_INFO']));
        $this->assertFalse(                                       isset($_SERVER['ORIG_PATH_TRANSLATED']));
        $this->assertFalse(                                       isset($_SERVER['ORIG_SCRIPT_FILENAME']));
        $this->assertFalse(                                       isset($_SERVER['PHPRC']));
        $this->assertFalse(                                       isset($_SERVER['REDIRECT_URL']));

    }
    
    function testUrl8() {
        $server = $this->getFakeServer('/info/index.php','http://testapp.local/info/');
        $this->assertEquals('testapp.local',                            $_SERVER['HTTP_HOST']);
        $this->assertFalse(                                       isset($_SERVER['HTTPS']));
        $this->assertEquals('GET',                                      $_SERVER['REQUEST_METHOD']);
        $this->assertEquals('testapp.local',                            $_SERVER['SERVER_NAME']);
        $this->assertEquals('127.0.0.1',                                $_SERVER['SERVER_ADDR']);
        $this->assertEquals('80',                                       $_SERVER['SERVER_PORT']);
        $this->assertEquals('/info/',                                   $_SERVER['REQUEST_URI']);
        $this->assertEquals('',                                         $_SERVER['QUERY_STRING']);
        $this->assertEquals('/var/www/',                                $_SERVER['DOCUMENT_ROOT']);
        $this->assertEquals('/info/index.php',                          $_SERVER['SCRIPT_NAME']);
        $this->assertEquals('/var/www/info/index.php',                  $_SERVER['SCRIPT_FILENAME']);
        $this->assertFalse(                                       isset($_SERVER['PATH_INFO']));
        $this->assertFalse(                                       isset($_SERVER['PATH_TRANSLATED']));
        $this->assertEquals('/info/index.php',                          $_SERVER['PHP_SELF']);
        $this->assertFalse(                                       isset($_SERVER['ORIG_PATH_INFO']));
        $this->assertFalse(                                       isset($_SERVER['ORIG_PATH_TRANSLATED']));
        $this->assertFalse(                                       isset($_SERVER['ORIG_SCRIPT_FILENAME']));
        $this->assertFalse(                                       isset($_SERVER['PHPRC']));
        $this->assertFalse(                                       isset($_SERVER['REDIRECT_URL']));

    }
    
    function testUrl9() {
        $server = $this->getFakeServer('/info/index.php','http://testapp.local/info/index.php');
        $this->assertEquals('testapp.local',                            $_SERVER['HTTP_HOST']);
        $this->assertFalse(                                       isset($_SERVER['HTTPS']));
        $this->assertEquals('GET',                                      $_SERVER['REQUEST_METHOD']);
        $this->assertEquals('testapp.local',                            $_SERVER['SERVER_NAME']);
        $this->assertEquals('127.0.0.1',                                $_SERVER['SERVER_ADDR']);
        $this->assertEquals('80',                                       $_SERVER['SERVER_PORT']);
        $this->assertEquals('/info/index.php',                          $_SERVER['REQUEST_URI']);
        $this->assertEquals('',                                         $_SERVER['QUERY_STRING']);
        $this->assertEquals('/var/www/',                                $_SERVER['DOCUMENT_ROOT']);
        $this->assertEquals('/info/index.php',                          $_SERVER['SCRIPT_NAME']);
        $this->assertEquals('/var/www/info/index.php',                  $_SERVER['SCRIPT_FILENAME']);
        $this->assertFalse(                                       isset($_SERVER['PATH_INFO']));
        $this->assertFalse(                                       isset($_SERVER['PATH_TRANSLATED']));
        $this->assertEquals('/info/index.php',                          $_SERVER['PHP_SELF']);
        $this->assertFalse(                                       isset($_SERVER['ORIG_PATH_INFO']));
        $this->assertFalse(                                       isset($_SERVER['ORIG_PATH_TRANSLATED']));
        $this->assertFalse(                                       isset($_SERVER['ORIG_SCRIPT_FILENAME']));
        $this->assertFalse(                                       isset($_SERVER['PHPRC']));
        $this->assertFalse(                                       isset($_SERVER['REDIRECT_URL']));

    }
    
    function testUrl10() {
        $server = $this->getFakeServer('/info/index.php','http://testapp.local/info/index.php/foo/bar');
        $this->assertEquals('testapp.local',                            $_SERVER['HTTP_HOST']);
        $this->assertFalse(                                       isset($_SERVER['HTTPS']));
        $this->assertEquals('GET',                                      $_SERVER['REQUEST_METHOD']);
        $this->assertEquals('testapp.local',                            $_SERVER['SERVER_NAME']);
        $this->assertEquals('127.0.0.1',                                $_SERVER['SERVER_ADDR']);
        $this->assertEquals('80',                                       $_SERVER['SERVER_PORT']);
        $this->assertEquals('/info/index.php/foo/bar',                  $_SERVER['REQUEST_URI']);
        $this->assertEquals('',                                         $_SERVER['QUERY_STRING']);
        $this->assertEquals('/var/www/',                                $_SERVER['DOCUMENT_ROOT']);
        $this->assertEquals('/info/index.php',                          $_SERVER['SCRIPT_NAME']);
        $this->assertEquals('/var/www/info/index.php',                  $_SERVER['SCRIPT_FILENAME']);
        $this->assertEquals('/foo/bar',                                 $_SERVER['PATH_INFO']);
        $this->assertEquals('/var/www/foo/bar',                         $_SERVER['PATH_TRANSLATED']);
        $this->assertEquals('/info/index.php/foo/bar',                  $_SERVER['PHP_SELF']);
        $this->assertFalse(                                       isset($_SERVER['ORIG_PATH_INFO']));
        $this->assertFalse(                                       isset($_SERVER['ORIG_PATH_TRANSLATED']));
        $this->assertFalse(                                       isset($_SERVER['ORIG_SCRIPT_FILENAME']));
        $this->assertFalse(                                       isset($_SERVER['PHPRC']));
        $this->assertFalse(                                       isset($_SERVER['REDIRECT_URL']));

    }
    
    function testUrl11() {
        $server = $this->getFakeServer('/info/index.php','http://testapp.local/info/index.php/foo/bar?baz=2');
        $this->assertEquals('testapp.local',                            $_SERVER['HTTP_HOST']);
        $this->assertFalse(                                       isset($_SERVER['HTTPS']));
        $this->assertEquals('GET',                                      $_SERVER['REQUEST_METHOD']);
        $this->assertEquals('testapp.local',                            $_SERVER['SERVER_NAME']);
        $this->assertEquals('127.0.0.1',                                $_SERVER['SERVER_ADDR']);
        $this->assertEquals('80',                                       $_SERVER['SERVER_PORT']);
        $this->assertEquals('/info/index.php/foo/bar?baz=2',            $_SERVER['REQUEST_URI']);
        $this->assertEquals('baz=2',                                    $_SERVER['QUERY_STRING']);
        $this->assertEquals('/var/www/',                                $_SERVER['DOCUMENT_ROOT']);
        $this->assertEquals('/info/index.php',                          $_SERVER['SCRIPT_NAME']);
        $this->assertEquals('/var/www/info/index.php',                  $_SERVER['SCRIPT_FILENAME']);
        $this->assertEquals('/foo/bar',                                 $_SERVER['PATH_INFO']);
        $this->assertEquals('/var/www/foo/bar',                         $_SERVER['PATH_TRANSLATED']);
        $this->assertEquals('/info/index.php/foo/bar',                  $_SERVER['PHP_SELF']);
        $this->assertFalse(                                       isset($_SERVER['ORIG_PATH_INFO']));
        $this->assertFalse(                                       isset($_SERVER['ORIG_PATH_TRANSLATED']));
        $this->assertFalse(                                       isset($_SERVER['ORIG_SCRIPT_FILENAME']));
        $this->assertFalse(                                       isset($_SERVER['PHPRC']));
        $this->assertFalse(                                       isset($_SERVER['REDIRECT_URL']));

    }
    
    function testUrl12() {
        $server = $this->getFakeServer('/info/index.php','http://testapp.local/info/index');
        $this->assertEquals('testapp.local',                            $_SERVER['HTTP_HOST']);
        $this->assertFalse(                                       isset($_SERVER['HTTPS']));
        $this->assertEquals('GET',                                      $_SERVER['REQUEST_METHOD']);
        $this->assertEquals('testapp.local',                            $_SERVER['SERVER_NAME']);
        $this->assertEquals('127.0.0.1',                                $_SERVER['SERVER_ADDR']);
        $this->assertEquals('80',                                       $_SERVER['SERVER_PORT']);
        $this->assertEquals('/info/index',                              $_SERVER['REQUEST_URI']);
        $this->assertEquals('',                                         $_SERVER['QUERY_STRING']);
        $this->assertEquals('/var/www/',                                $_SERVER['DOCUMENT_ROOT']);
        $this->assertEquals('/info/index.php',                          $_SERVER['SCRIPT_NAME']);
        $this->assertEquals('/var/www/info/index.php',                  $_SERVER['SCRIPT_FILENAME']);
        $this->assertFalse(                                       isset($_SERVER['PATH_INFO']));
        $this->assertFalse(                                       isset($_SERVER['PATH_TRANSLATED']));
        $this->assertEquals('/info/index.php',                          $_SERVER['PHP_SELF']);
        $this->assertFalse(                                       isset($_SERVER['ORIG_PATH_INFO']));
        $this->assertFalse(                                       isset($_SERVER['ORIG_PATH_TRANSLATED']));
        $this->assertFalse(                                       isset($_SERVER['ORIG_SCRIPT_FILENAME']));
        $this->assertFalse(                                       isset($_SERVER['PHPRC']));
        $this->assertFalse(                                       isset($_SERVER['REDIRECT_URL']));

    }
    
    function testUrl13() {
        $server = $this->getFakeServer('/info/index.php','http://testapp.local/info/index/foo/bar');
        $this->assertEquals('testapp.local',                            $_SERVER['HTTP_HOST']);
        $this->assertFalse(                                       isset($_SERVER['HTTPS']));
        $this->assertEquals('GET',                                      $_SERVER['REQUEST_METHOD']);
        $this->assertEquals('testapp.local',                            $_SERVER['SERVER_NAME']);
        $this->assertEquals('127.0.0.1',                                $_SERVER['SERVER_ADDR']);
        $this->assertEquals('80',                                       $_SERVER['SERVER_PORT']);
        $this->assertEquals('/info/index/foo/bar',                      $_SERVER['REQUEST_URI']);
        $this->assertEquals('',                                         $_SERVER['QUERY_STRING']);
        $this->assertEquals('/var/www/',                                $_SERVER['DOCUMENT_ROOT']);
        $this->assertEquals('/info/index.php',                          $_SERVER['SCRIPT_NAME']);
        $this->assertEquals('/var/www/info/index.php',                  $_SERVER['SCRIPT_FILENAME']);
        $this->assertEquals('/foo/bar',                                 $_SERVER['PATH_INFO']);
        $this->assertEquals('/var/www/foo/bar',                         $_SERVER['PATH_TRANSLATED']);
        $this->assertEquals('/info/index.php/foo/bar',                  $_SERVER['PHP_SELF']);
        $this->assertFalse(                                       isset($_SERVER['ORIG_PATH_INFO']));
        $this->assertFalse(                                       isset($_SERVER['ORIG_PATH_TRANSLATED']));
        $this->assertFalse(                                       isset($_SERVER['ORIG_SCRIPT_FILENAME']));
        $this->assertFalse(                                       isset($_SERVER['PHPRC']));
        $this->assertFalse(                                       isset($_SERVER['REDIRECT_URL']));

    }
    
    function testUrl14() {
        $server = $this->getFakeServer('/info/index.php','http://testapp.local/info/index/foo/bar?baz=2');
        $this->assertEquals('testapp.local',                            $_SERVER['HTTP_HOST']);
        $this->assertFalse(                                       isset($_SERVER['HTTPS']));
        $this->assertEquals('GET',                                      $_SERVER['REQUEST_METHOD']);
        $this->assertEquals('testapp.local',                            $_SERVER['SERVER_NAME']);
        $this->assertEquals('127.0.0.1',                                $_SERVER['SERVER_ADDR']);
        $this->assertEquals('80',                                       $_SERVER['SERVER_PORT']);
        $this->assertEquals('/info/index/foo/bar?baz=2',                $_SERVER['REQUEST_URI']);
        $this->assertEquals('baz=2',                                    $_SERVER['QUERY_STRING']);
        $this->assertEquals('/var/www/',                                $_SERVER['DOCUMENT_ROOT']);
        $this->assertEquals('/info/index.php',                          $_SERVER['SCRIPT_NAME']);
        $this->assertEquals('/var/www/info/index.php',                  $_SERVER['SCRIPT_FILENAME']);
        $this->assertEquals('/foo/bar',                                 $_SERVER['PATH_INFO']);
        $this->assertEquals('/var/www/foo/bar',                         $_SERVER['PATH_TRANSLATED']);
        $this->assertEquals('/info/index.php/foo/bar',                  $_SERVER['PHP_SELF']);
        $this->assertFalse(                                       isset($_SERVER['ORIG_PATH_INFO']));
        $this->assertFalse(                                       isset($_SERVER['ORIG_PATH_TRANSLATED']));
        $this->assertFalse(                                       isset($_SERVER['ORIG_SCRIPT_FILENAME']));
        $this->assertFalse(                                       isset($_SERVER['PHPRC']));
        $this->assertFalse(                                       isset($_SERVER['REDIRECT_URL']));

    }

}
