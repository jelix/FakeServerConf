<?php

$domainName = 'http://testapp.local';
header('Content-type: text/plain');

$urls = array(
    array('/index.php', '/'),
    array('/index.php', '/index.php'),
    array('/index.php', '/index.php/foo/bar'),
    array('/index.php', '/index.php/foo/bar?baz=2'),
    array('/index.php', '/index'),
    array('/index.php', '/index/foo/bar'),
    array('/index.php', '/index/foo/bar?baz=2'),
    array('/info/index.php', '/info/'),
    array('/info/index.php', '/info/index.php'),
    array('/info/index.php','/info/index.php/foo/bar'),
    array('/info/index.php','/info/index.php/foo/bar?baz=2'),
    array('/info/index.php','/info/index'),
    array('/info/index.php','/info/index/foo/bar'),
    array('/info/index.php', '/info/index/foo/bar?baz=2')
 );
 
foreach ($urls as $k=>$url) {
    list($scriptName, $path) = $url;
    $ch = curl_init($domainName.$path);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
    echo '
    function testUrl'.($k+1).'() {
        $server = $this->getFakeServer(\''.$scriptName.'\',\''.$domainName.$path.'\');
'.$result.'
    }
    ';
}

