<?php

namespace Ylab\Service\Components;

use Bitrix\Main\Engine\ActionFilter\Csrf;
use Bitrix\Main\Engine\ActionFilter\HttpMethod;
use Bitrix\Main\Engine\Contract\Controllerable;
use Bitrix\Main\Engine\Response\AjaxJson;
use Bitrix\Main\Error;
use Bitrix\Main\Errorable;
use Bitrix\Main\ErrorCollection;
use Bitrix\Main\Loader;
use Bitrix\Main\LoaderException;
use CBitrixComponent;
use Throwable;
use Ylab\Mentoring\Dto\User\UpdateUserLastNameDto;
use Ylab\Mentoring\Services\Test\TestService;

/**

 */
class TestComponent extends CBitrixComponent implements Controllerable, Errorable
{

    private TestService $testService;
    /** @var ErrorCollection $errorCollection */
    protected ErrorCollection $errorCollection;

    /**
     * @inheritDoc
     *
     * @throws LoaderException
     */
    public function __construct($component = null)
    {
        Loader::requireModule('ylab.mentoring');
        $this->testService = new TestService();
        $this->errorCollection = new ErrorCollection();

        parent::__construct($component);
    }

    /**
     * @inheritDoc
     *
     * @return array
     */
    public function configureActions(): array
    {
        $csrf = new Csrf();
        $onlyPost = new HttpMethod([HttpMethod::METHOD_POST]);

        return [
            /** @see self::updateLastNameAction() */
            'updateLastName' => [
                'prefilters' => [
                    $csrf,
                    $onlyPost,
                ]
            ],
        ];
    }

    /**
     * @inheritDoc
     *
     * @return array
     */
    protected function listKeysSignedParameters(): array
    {
        return [
            'ELEMENT_ID',
        ];
    }

    /**
     * @inheritDoc
     *
     * @param array $arParams
     *
     * @return array
     */
    public function onPrepareComponentParams($arParams): array
    {
        return $arParams;
    }

    /**
     * @return void
     * @throws \Bitrix\Main\ObjectPropertyException
     * @throws \Bitrix\Main\SystemException
     */
    public function executeComponent(): void
    {

        $this->arResult['baseData'] = $this->buildResult();

        if (!$this->errorCollection->isEmpty()) {
            $this->arResult['ERRORS'] = $this->getErrors();
        }

        $this->includeComponentTemplate();
    }

    protected function buildResult(): array
    {
        $result = [];

        try {
            $result = $this->testService->getFormData();

        } catch (Throwable $e) {
            $this->setError($e->getMessage());
        }

        return $result;
    }

    public function updateLastNameAction(string $lastName): AjaxJson
    {
        $result = [];

        try {
            $this->testService->updateUserLastName(new UpdateUserLastNameDto(lastName: $lastName));
        } catch (Throwable $e) {
            $this->setError($e->getMessage());
        }

        return $this->responseAjax($result);
    }

    /**
     * @param string $message
     */
    protected function setError(string $message): void
    {
        $this->errorCollection->setError(new Error($message));
    }

    /**
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errorCollection->toArray();
    }

    /**
     * @param string $code Code of error.
     *
     * @return Error
     */
    public function getErrorByCode($code): Error
    {
        return $this->errorCollection->getErrorByCode($code);
    }

    /**
     * @param array $data
     *
     * @return AjaxJson
     */
    protected function responseAjax(array $data = []): AjaxJson
    {
        return new AjaxJson(
            $data,
            $this->errorCollection->isEmpty() ? AjaxJson::STATUS_SUCCESS : AjaxJson::STATUS_ERROR,
            $this->errorCollection
        );
    }
}
