<?php
/**@global CMain $APPLICATION */

use Bitrix\Main\Loader;
use Bitrix\Main\Localization\Loc;

/**
 * Модуль личных кабинетов коуча и ментора
 */
class ylab_mentoring extends CModule
{
    /**
     * @var string
     */
    public $MODULE_ID = 'ylab.mentoring';

    /**
     * Конструктор модуля
     */
    public function __construct()
    {
        $arModuleVersion = [];
        include(__DIR__ . "/version.php");
        $this->MODULE_VERSION = $arModuleVersion["VERSION"];
        $this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
        $this->MODULE_NAME = Loc::getMessage('YLAB_MENTORING_MODULE_NAME');
        $this->MODULE_DESCRIPTION = Loc::getMessage('YLAB_MENTORING_MODULE_DESCRIPTION');
        $this->PARTNER_NAME = Loc::getMessage('YLAB_MENTORING_PARTNER_NAME');
        $this->PARTNER_URI = Loc::getMessage('YLAB_MENTORING_PARTNER_URI');
    }

    /**
     * Установка модуля
     * @return void
     */
    public function DoInstall(): void
    {
        RegisterModule($this->MODULE_ID);
    }

    /**
     * Удаление модуля
     * @return void
     */
    public function DoUninstall(): void
    {
        unRegisterModule($this->MODULE_ID);
    }
}