<?php

declare(strict_types=1);

namespace App\Core\User\UserInterface\Cli;

use App\Common\Bus\QueryBusInterface;
use App\Core\User\Application\DTO\UserDTO;
use App\Core\User\Application\Query\GetInActiveUsersEmail\GetInActiveUsersEmailQuery;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:user:get-inactive-users-email',
    description: 'Pobieranie adresów email nieaktywnych użytkoników'
)]
class GetInactiveUsers extends Command
{
    public function __construct(private readonly QueryBusInterface $bus)
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $users = $this->bus->dispatch(new GetInActiveUsersEmailQuery());

        /** @var UserDTO $user */
        foreach ($users as $user) {
            $output->writeln($user->email);
        }

        return Command::SUCCESS;
    }

}
