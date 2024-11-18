<?php

declare(strict_types=1);

namespace App\Core\User\Application\Query\GetInActiveUsersEmail;

use App\Core\User\Application\DTO\UserDTO;
use App\Core\User\Application\Query\GetInActiveUsersEmail\GetInActiveUsersEmailQuery;
use App\Core\User\Domain\Repository\UserRepositoryInterface;
use App\Core\User\Domain\User;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class GetInActiveUsersEmailHandler
{
    public function __construct(
        private readonly UserRepositoryInterface $userRepository
    ) {
    }

    public function __invoke(GetInActiveUsersEmailQuery $query): array
    {
        $users = $this->userRepository->getInactiveUsersEmail();

        return array_map(function (User $user): UserDTO {
            return new UserDTO(
                $user->getEmail()
            );
        }, $users);
    }
}
