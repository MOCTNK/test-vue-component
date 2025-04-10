<?php
/** @global CMain $APPLICATION */

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");


$APPLICATION->IncludeComponent(
    'ylab.service:test.component',
    '',
    [],
    false
);


require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");
