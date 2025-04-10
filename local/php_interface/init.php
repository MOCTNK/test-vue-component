<?php
/**@global CMain $APPLICATION */

use Bitrix\Main\Application;
use Bitrix\Main\Loader;

$request = Application::getInstance()->getContext()->getRequest();

if (!$request->isAdminSection()) {

    Loader::requireModule('highloadblock');
    Loader::requireModule('ylab.mentoring');

};
