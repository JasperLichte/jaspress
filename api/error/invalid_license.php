<?php

require_once(__DIR__ . '/../../server/base.php');

use util\exceptions\InvalidLicenseException;

echo (new \api\actions\error\ErrorAction(new InvalidLicenseException(), 401))->run();
