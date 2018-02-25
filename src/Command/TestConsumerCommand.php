<?php

namespace App\Command;


use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TestConsumerCommand extends ContainerAwareCommand
{
    /**
     * @inheritDoc
     */
    protected function interact(InputInterface $input, OutputInterface $output)
    {
        $this
            ->setName('app:test-consumer')
            ->setDescription('Hello PhpStorm');
    }

    /**
     * @inheritDoc
     */
    protected function initialize(InputInterface $input, OutputInterface $output)
    {
        $this->getContainer()
            ->get('old_sound_rabbit_mq.send_email_producer')
            ->publish('Ура, сообщенька...');

        $this->getContainer()
            ->get('old_sound_rabbit_mq.send_email_producer')
            ->publish('bad');
    }

}