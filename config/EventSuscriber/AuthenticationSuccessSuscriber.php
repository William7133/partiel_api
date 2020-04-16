<?php

namespace App\EventListener;

use App\Entity\User;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationSuccessEvent;

class AuthenticationSuccessListener
{
  private $em;

  public function __construct(EntityManagerInterface $em) {
    $this->em = $em;
  }

  /**
   * @param AuthenticationSuccessEvent $event
   */
  public function onAuthenticationSuccessResponse(AuthenticationSuccessEvent $event)
  {
    $user = $event->getUser();

    if ($user instanceof User) {
      $user->setLastconnection(new DateTime());
      return;
    }

    $this->em->flush();
  }
}
