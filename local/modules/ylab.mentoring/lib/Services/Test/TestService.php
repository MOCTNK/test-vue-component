<?php

namespace Ylab\Mentoring\Services\Test;
use Bitrix\Main\UserTable;
use Ylab\Mentoring\Actions\User\UpdateUserLastNameAction;
use Ylab\Mentoring\Dto\User\UpdateUserLastNameDto;
use Ylab\Mentoring\Presentations\Test\TestFormPresentation;

/**
 *
 */
class TestService
{

    /**
     *
     */
    public function __construct()
    {

    }

    public function getFormData(): array
    {
        //FIXME Это просто пример, реализация не корректная
        global $USER;
        $userLastName = UserTable::query()
            ->addSelect('LAST_NAME')
            ->where('ID', $USER->GetID())
            ->setLimit(1)
            ->exec()
            ->fetch()['LAST_NAME'] ?? 'Not found';

        return (new TestFormPresentation(
            lastName: $userLastName
        ))->toArray();
    }

    public function updateUserLastName(UpdateUserLastNameDto $updateUserLastNameDto): void
    {
        global $USER;
        (new UpdateUserLastNameAction())->run(
            userId  : $USER->GetID(),
            lastName: $updateUserLastNameDto->lastName
        );
    }



}
