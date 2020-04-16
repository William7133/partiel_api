<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;
use App\Entity\Artist;
use App\Entity\Album;
use App\Entity\Style;
use App\Entity\User;
use DateTime;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{

    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder) {
    $this->encoder = $encoder;
  }


    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        $artists = [];
        $styles = [];

        for ($i = 0; $i < 50; $i++) {
            $article = new Artist();
            $article->setName($faker->Name())
                ->setStartYear($faker->numberBetween(1950, 2000));

            $manager->persist($article);
            $artists[] = $article;
        }

        for ($i = 0; $i < 20; $i++) {
            $style = new Style();
            $style->setName($faker->Name());

            $manager->persist($style);
            $styles[] = $style;
        }

        for ($i = 0; $i < 200; $i++) {
            $album = new Album();
            $album->setName($faker->Name())
                ->setReleaseYear($faker->date(1951, 2020));

            $manager->persist($album);
        }

        $user = new User();
        $user->setMail('test@test.com')
            ->setPassword($this->encoder->encodePassword($user, '1234'))
            ->setBirthDate(new DateTime('1990-05-15'))
            ->setFailedAuth(0);

            $manager->persist($user);

        $manager->flush();
    }
}
