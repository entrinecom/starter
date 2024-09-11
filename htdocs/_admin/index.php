<?php

use diCore\Data\Http\HttpCode;
use diCore\Tool\Logger;
use NewProject\Admin\Base;
use NewProject\Base\CMS;

error_reporting(E_ALL);

try {
    require '../../vendor/dimaninc/di_core/php/functions.php';
    require '../../_cfg/common.php';

    $X = new Base();
    $X->work();
} catch (Exception $e) {
    HttpCode::header(HttpCode::INTERNAL_SERVER_ERROR);
    echo '<h1>Error</h1>';
    echo CMS::isProd() ? 'See logs for details' : $e->getMessage();
    Logger::getInstance()->variable($e);
}
