<?php

(defined('B_PROLOG_INCLUDED') && B_PROLOG_INCLUDED === true) || die();

use Bitrix\Main\UI\Extension;

/**
 * @var array $arResult
 * @var \Ylab\Service\Components\TestComponent $component
 */

Extension::load(['ylab.test-component']);
?>

<div id="test-component">
    <test-component></test-component>
</div>
