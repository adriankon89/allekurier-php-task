<?php

declare(strict_types=1);

namespace App\Core\User\Domain\Event;

class UserCreatedEvent extends AbstractUserEvent
{
    public function getUserEmail(): string
    {
        return $this->user->getEmail();
    }
}
