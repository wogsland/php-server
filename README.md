PHP Server
==========

Javascript has Node.js, shouldn't php have something?

Okay so I know about hhvm, but this sounded like phun.

##Installation

Install [composer](https://getcomposer.org/) if you don't have it already. Then

    composer install
    php run.php

You'll now find your server up and running on [http://127.0.0.1:7355/](http://127.0.0.1:7355/).
Start putting php files in the public directory and you'll find them available at that URL.

##Caveats

1. Nothing that takes more than 1 line is supported. You'll need to minimize your class files before using them.
2. ```die();```  and ```exit;``` will also shut down your server.
3. Nothing other than php files are supported.
3. Others???

##Contributing

I'd love some pull requests - submit away!
