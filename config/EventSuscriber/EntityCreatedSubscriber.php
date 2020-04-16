<?php

namespace App\EventSubscriber;

use App\Entity\Album;
use App\Entity\Style;
use App\Entity\Artist;
use DateTime;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Events;

class EntityCreatedSubscriber implements EventSubscriber {

    public function getSubscribedEvents()
    {
        return [
            Events::prePersist
        ];
    }

    public function prePersist(LifecycleEventArgs $args)
    {
        $object = $args->getObject();

        if ($object instanceof Album) {
            $object->setCreated(new DateTime());
        }

        if ($object instanceof Style) {
            $object->setCreated(new DateTime());
        }

        if ($object instanceof Artist) {
          $object->setCreated(new DateTime());
        }
  }
}
