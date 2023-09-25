<?php

namespace App\EventSubscriber\Admin;

use App\Entity\Message;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeCrudActionEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class MessageCrudSubscriber implements EventSubscriberInterface
{
    public function __construct(
        private readonly EntityManagerInterface $entityManager
    ){}

    public static function getSubscribedEvents(): array
    {
        return [
            BeforeCrudActionEvent::class => ['readMessage'],
        ];
    }

    public function readMessage(BeforeCrudActionEvent $event): void
    {
        $entity = $event->getAdminContext()->getEntity()->getInstance();
        $pageName = $event->getAdminContext()->getCrud()->getCurrentPage();
        if(!($entity instanceof Message) || $pageName !== 'detail'){
            return;
        }
        /** @var Message $message */
        $message = $entity;
        $message->setIsRead(true);
        $this->entityManager->persist($message);
        $this->entityManager->flush();
    }
}