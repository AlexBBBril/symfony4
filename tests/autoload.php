<?php

declare(strict_types=1);

function println($command = '')
{
    echo $command."\n";
}

if (isset($_ENV['BOOTSTRAP_CLEAR_CACHE_ENV']) && 'test' === $_ENV['BOOTSTRAP_CLEAR_CACHE_ENV']) {
    $command = sprintf(
        'php "%s/../bin/console" cache:clear --env=%s --no-warmup',
        __DIR__,
        $_ENV['BOOTSTRAP_CLEAR_CACHE_ENV']
    );

    println($command);
    passthru($command);
}

passthru(sprintf('php "%1$s/../vendor/bin/php-cs-fixer" fix --config=%1$s/../.php_cs.dist  ', __DIR__));
passthru(sprintf('php "%s/../bin/console" cache:clear --env=test --no-interaction -vvv', __DIR__));
// passthru(sprintf('php "%s/../bin/console" doctrine:schema:update --env=test -f --no-interaction -vvv', __DIR__));

//passthru(sprintf('php "%1$s%2$svendor%2$sbin%2$sphp-cs-fixer" fix --verbose --config="%1$s%2$s.php_cs.dist"', dirname(__DIR__), DIRECTORY_SEPARATOR));
//passthru(sprintf('vendor/bin/php-cs-fixer fix --config=./../.php_cs.dist --verbose', dirname(__DIR__)));
//try {
//    passthru(sprintf('php -r "vendor/bin/php-cs-fixer" fix --config=.php_cs.dist --verbose'));
//} catch (Exception $e) {
//    $break = true;
//    throw $e;
//}

//$fp = fopen(__DIR__.'/test.txt', 'w');
//fwrite($fp, sprintf('php "%1$s%2$svendor%2$sbin%2$sphp-cs-fixer" fix --verbose --config="%1$s%2$s.php_cs.dist"', dirname(__DIR__), DIRECTORY_SEPARATOR));
//fclose($fp);

//passthru(sprintf('php "%s/console" cache:clear --env=%s --no-warmup', __DIR__));

//$str = sprintf('php "%1$s%2$svendor%2$sbin%2$sphp-cs-fixer" fix --config="%1$s%2$s.php_cs.dist" --verbose', dirname(__DIR__), DS);
// passthru($str);
// passthru(sprintf('php "%s/console" doctrine:database:drop --env=test --force', __DIR__)); // force used to avoid interaction

require_once __DIR__.'/../vendor/autoload.php';
