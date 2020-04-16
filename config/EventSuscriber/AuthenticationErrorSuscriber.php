<?php

namespace AppBundle\EventSubscriber;

use App\Entity\User;
use Doctrine\ORM\EntityManager;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Core\AuthenticationEvents;
use Symfony\Component\Security\Core\Event\AuthenticationFailureEvent;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class AuthenticationErrorListener implements EventSubscriberInterface
{
  private $em;
  private $authenticationUtils;

  public function __construct(EntityManager $em, AuthenticationUtils $authenticationUtils)
  {
    $this->em = $em;
    $this->authenticationUtils = $authenticationUtils;
  }

  public static function getSubscribedEvents()
  {
    return array(
      AuthenticationEvents::AUTHENTICATION_FAILURE => 'onAuthenticationFailure',
    );
  }

  public function onAuthenticationFailure(AuthenticationFailureEvent $event)
  {
    $username = $this->authenticationUtils->getLastUsername();
    $user = $this->entityManager->getRepository(User::class)->findOneBy(['mail' => $username]);

    if ($user != null) {
      $user->setFailedAuth($user->getFailedAuth());
    }

    $this->em->flush();
  }
}
