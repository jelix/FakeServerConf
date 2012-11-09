<?php

/*
 * copy this script into your server, as index.php info/index.php and info/news.php,
 * and call it with your browser, to generate data to include new FakeServer tests
 * with new server configurations
 */

 
$varsToTest = array('HTTP_HOST', 'HTTPS', 'REQUEST_METHOD', 'SERVER_NAME','SERVER_ADDR',
              'SERVER_PORT', 'REQUEST_URI', 'QUERY_STRING', 'DOCUMENT_ROOT', 
              'SCRIPT_NAME', 'SCRIPT_FILENAME', 'PATH_INFO', 'PATH_TRANSLATED',
              'PHP_SELF', 'ORIG_PATH_INFO', 'ORIG_PATH_TRANSLATED', 'ORIG_SCRIPT_FILENAME',
              'PHPRC', 'REDIRECT_URL'
              );
 
header('Content-type: text/plain');
foreach($varsToTest as $name) {
    if (isset($_SERVER[$name])) {
        $l = 40-strlen($_SERVER[$name]);
        if ($l  < 0)
            $l =1;
        echo '        $this->assertEquals(\''.$_SERVER[$name].'\','.str_repeat(' ',$l).' $_SERVER[\''.$name."']);\n";
    }
    else {
        echo '        $this->assertFalse('.str_repeat(' ', 38).' isset($_SERVER[\''.$name."']));\n";
    }
}
