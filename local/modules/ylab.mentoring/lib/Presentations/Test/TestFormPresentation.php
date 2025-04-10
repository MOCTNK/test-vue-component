<?php
namespace Ylab\Mentoring\Presentations\Test;

class TestFormPresentation
{

    public function __construct(
        private string $lastName
    )
    {
    }

    public function toArray(): array
    {
        return [
            'lastName' => $this->lastName
        ];
    }
}