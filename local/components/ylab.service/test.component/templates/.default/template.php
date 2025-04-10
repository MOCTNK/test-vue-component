<?php

(defined('B_PROLOG_INCLUDED') && B_PROLOG_INCLUDED === true) || die();

use Bitrix\Main\Application;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\UI\Extension;
use Bitrix\Main\Web\Json;

/**
 * @var array $arResult
 * @var \Ylab\Service\Components\TestComponent $component
 */

Extension::load(['ylab.test-component']);
?>

<div id="test-component">
    <test-component
            signed-parameters="<?= $component->getSignedParameters() ?>"
            component="<?= $component->getName() ?>"
            messages='<?= Json::encode( //FIXME Вынести в класс Helper
                    array_merge(
                            Loc::loadLanguageFile(Application::getDocumentRoot() . '/local/common.php'),
                            Loc::loadLanguageFile(__FILE__))
            ) ?>'
            base-data='<?= Json::encode($arResult['baseData']) ?>'
    ></test-component>
</div>
