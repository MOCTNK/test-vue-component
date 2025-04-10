<?php
namespace Ylab\Mentoring\Actions\User;

class UpdateUserLastNameAction
{

    public function run(
        int    $userId,
        string $lastName
    ): void
    {
        (new \CUser())->Update($userId, [
            'LAST_NAME' => $lastName
        ]);
    }
}