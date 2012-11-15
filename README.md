This PHP Library will allow you to simulate different PHP server configuration.

In a CLI environment (where you run PHPUnit for instance), you could have some
difficulties to test a class that uses some $_SERVER values. This global
variable does not contain the same thing as if the script is called in an Apache
environment for example. Moreover the content of $_SERVER is not the same
between a server configured with mod_php, and a server running PHP as a CGI, as FPM etc..

FakeServerConf allow you to fill automatically $_SERVER with good values, only by given an
URL and the type of a PHP server.

You don't need anymore to setup several real PHP HTTP server to test your libraries in
different environment. Just call FakeServerConf in your unit tests.

For example, in your test, you want to have a $_SERVER filled as if
the URL "http://testapp.local/info.php/foo/bar?baz=2" was requested. In your
PHPUnit/Atoum/Simpletest/whatever class, call this:

```php
    // let's says we are running an Apache server configured with mod_php.
    // Indicate to this server the script name (it can be hidden in the http request)
    $server = new \jelix\FakeServerConf\ApacheMod(null, '/info.php');
    
    // now simulate an HTTP request
    $server->setHttpRequest('http://testapp.local/info.php/foo/bar?baz=2');
```

$_SERVER is now filled correctly, and you can test your classes (routers, url parser etc...)

You can also set the document root and other things...


## Supported servers

- Apache + mod_php
- Apache + php-cgi
- Apache + mod_fastcgi + php-fpm

## Adding servers

You don't find your server configuration in FakeServerConf? Help us to provide
additionnal support.

* first configure your server. It's better if it's a fresh installation in an virtual machine
   you should install the curl extension for php.
* configure a virtual host named testapp.local. It should accept multiviews queries (without .php)
* the document root of the server should be /var/www/ and it should content files you can find in tests/www.
   you can also set the document root to tests/www
* in your browser, call http://testapp.local/generateserverdata.php. It generates some PHP code that
   you have to add into a test class in tests/. See existing test class
* create a new class in src/jelix/FakeServerConf, that inherits from FakeServerConf
* in your test class, you should instantiate this class
* run tests with phpunit, and fix in your new class the issues detected in your tests.
* don't touch FakeServerConf except if it makes sens for all server configuration.

