<?php
namespace Ylab\Mentoring\Dto\User;

class UpdateUserLastNameDto
{

    public function __construct(
        public readonly string $lastName
    )
    {
    }

    public static function fromArray($data): UpdateUserLastNameDto
    {
        return new UpdateUserLastNameDto(
            lastName: $data['lastName'] ?? ''
        );
    }
}