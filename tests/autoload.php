<?php

passthru(sprintf('php -r %1$s/vendor/bin/php-cs-fixer fix --config=%1$s/.php_cs.dist -v --dry-run --stop-on-violation --using-cache=no', __DIR__));

include_once __DIR__ . '/../vendor/autoload.php';