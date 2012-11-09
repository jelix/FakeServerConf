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
    $server = new \jelix\FakeServerConf\ApacheMod(null, '/info.php');
    $server->setHttpRequest('http://testapp.local/info.php/foo/bar?baz=2');
```

$_SERVER is now filled correctly, and you can test your classes (routers, url parser etc...)

You can also set the document root and other things...


## Supported servers

- Apache + mod_php
