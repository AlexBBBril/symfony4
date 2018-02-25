<?php

namespace App\Consumer;


use OldSound\RabbitMqBundle\RabbitMq\ConsumerInterface;
use OldSound\RabbitMqBundle\RabbitMq\ProducerInterface;
use PhpAmqpLib\Message\AMQPMessage;

class MailSenderConsumer implements ConsumerInterface
{
    /**
     * @var ProducerInterface
     */
    private $delayedProducer;

    /**
     * MailSenderConsumer constructor.
     *
     * @param ProducerInterface $delayedProducer
     */
    public function __construct(ProducerInterface $delayedProducer)
    {
        $this->delayedProducer = $delayedProducer;
    }

    /**
     * @param AMQPMessage $msg
     *
     * @return void
     */
    public function execute(AMQPMessage $msg): void
    {
        $body = $msg->getBody();

        echo 'Ну тут типа сообщение отправляю ' . $body . ' ...' . PHP_EOL;

        try {
            if ($body == 'bad') {
                throw new \Exception();
            }

            echo 'Успешно отправлено...' . PHP_EOL;
        } catch (\Exception $exception) {
            echo 'ERROR' . PHP_EOL;
            $this->delayedProducer->publish($body);
        }
    }
}