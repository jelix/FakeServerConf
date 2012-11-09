<?php
require_once(__DIR__.'/../src/jelix/FakeServerConf/FakeServerConf.php');
require_once(__DIR__.'/../src/jelix/FakeServerConf/ApacheCGI.php');


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

class ApacheCGITest extends PHPUnit_Framework_TestCase {
/*
    protected function getFakeServer($scriptName, $url) {
        $server = new \jelix\FakeServerConf\ApacheCGI(null, $scriptName);
        $server->setHttpRequest($url);
        return $server;
    }
*/

}
