<?php

declare(strict_types=1);

namespace App\Core\User\Application\DTO;

class UserDTO
{
    public function __construct(
        public readonly string $email,
    ) {
    }
}
