<?php

namespace App\Command;


use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateUserPassCommand extends Command
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * CreateUserPassCommand constructor.
     *
     * @param null|string     $name
     * @param LoggerInterface $logger
     */
    public function __construct(?string $name = null, LoggerInterface $logger)
    {
        parent::__construct($name);
        $this->logger = $logger;
    }

    protected function configure()
    {
        $this
            ->setName('app:create-user-pass')
            ->setDescription('Creates a new user')
            ->setHelp('This command to create a user password')
            ->addArgument('username', true, 'The username of the user.')
            ->addArgument('plain_password', true, 'User password.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        [$userName, $plainPass] = [$input->getArgument('username'), $input->getArgument('plain_password')];




        $output->writeln('Username: '.$input->getArgument('username'));

        $message = sprintf(
            "Command name: %s, input: %s, username: %s",
            $this->getName(),
            json_encode($input),
            $input->getArgument('username')
        );
        $this->logger->debug($message);
        $break = true;
    }




}