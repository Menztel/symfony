<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Language;
use App\Entity\Media;
use App\Entity\Movie;
use App\Entity\Playlist;
use App\Entity\User;
use App\Entity\Serie;
use App\Enum\UserAccountStatusEnum;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        // Création des catégories
        $categoryAction = new Category();
        $categoryAction->setName('Action');
        $categoryAction->setLabel('Films et séries d\'action');
        $manager->persist($categoryAction);

        $categoryAventure = new Category();
        $categoryAventure->setName('Aventure');
        $categoryAventure->setLabel('Films et séries d\'aventure');
        $manager->persist($categoryAventure);

        // Création des langues
        $languages = [
            ['name' => 'Français', 'code' => 'FR'],
            ['name' => 'Anglais', 'code' => 'EN'],
            ['name' => 'Espagnol', 'code' => 'ES'],
            ['name' => 'Allemand', 'code' => 'DE'],
            ['name' => 'Italien', 'code' => 'IT']
        ];
        $languageObjects = [];
        
        foreach ($languages as $languageData) {
            $language = new Language();
            $language->setName($languageData['name']);
            $language->setCode($languageData['code']);
            $manager->persist($language);
            $languageObjects[] = $language;
        }

        // Création d'un utilisateur
        $user = new User();
        $user->setUsername('johndoe');
        $user->setEmail('user@example.com');
        $user->setPassword($this->passwordHasher->hashPassword($user, 'password123'));
        $user->setAccountStatus(UserAccountStatusEnum::ACTIVE);
        $manager->persist($user);

        // Création des films
        $movies = [
            [
                'title' => 'The Shawshank Redemption',
                'shortDescription' => 'Two imprisoned men bond over a number of years.',
                'longDescription' => 'Over the course of several years, two convicts form a friendship, seeking consolation and, eventually, redemption through basic compassion.',
                'releaseDate' => '1994-09-23',
                'coverImage' => 'shawshank_redemption.jpg',
                'staff' => ['Frank Darabont'],
                'castt' => ['Tim Robbins', 'Morgan Freeman']
            ],
            [
                'title' => 'The Godfather',
                'shortDescription' => 'The aging patriarch of an organized crime dynasty transfers control to his son.',
                'longDescription' => 'Don Vito Corleone, head of a mafia family, decides to hand over his empire to his youngest son Michael. However, his decision unintentionally puts the lives of his loved ones in grave danger.',
                'releaseDate' => '1972-03-24',
                'coverImage' => 'godfather.jpg',
                'staff' => ['Francis Ford Coppola'],
                'castt' => ['Marlon Brando', 'Al Pacino']
            ],
            [
                'title' => 'Inception',
                'shortDescription' => 'A thief who steals corporate secrets through dream-sharing technology.',
                'longDescription' => 'A skilled thief is offered a chance to regain his old life as payment for a task considered to be impossible: "inception", the implantation of another person\'s idea into a target\'s subconscious.',
                'releaseDate' => '2010-07-16',
                'coverImage' => 'inception.jpg',
                'staff' => ['Christopher Nolan'],
                'castt' => ['Leonardo DiCaprio', 'Joseph Gordon-Levitt']
            ],
            [
                'title' => 'Pulp Fiction',
                'shortDescription' => 'The lives of two mob hitmen, a boxer, and a pair of diner bandits intertwine.',
                'longDescription' => 'Various interconnected stories of criminal Los Angeles are told in a non-linear fashion, involving hitmen, a boxer, and small-time criminals.',
                'releaseDate' => '1994-10-14',
                'coverImage' => 'pulp_fiction.jpg',
                'staff' => ['Quentin Tarantino'],
                'castt' => ['John Travolta', 'Samuel L. Jackson']
            ]
        ];

        foreach ($movies as $movieData) {
            $movie = new Movie();
            $movie->setTitle($movieData['title']);
            $movie->setShortDescription($movieData['shortDescription']);
            $movie->setLongDescription($movieData['longDescription']);
            $movie->setReleaseDate(new \DateTime($movieData['releaseDate']));
            $movie->setCoverImage($movieData['coverImage']);
            $movie->setStaff($movieData['staff']);
            $movie->setCastt($movieData['castt']);
            $manager->persist($movie);
        }

        // Création des séries
        $series = [
            [
                'title' => 'Breaking Bad',
                'shortDescription' => 'A high school chemistry teacher turned methamphetamine manufacturer.',
                'longDescription' => 'A high school chemistry teacher diagnosed with inoperable lung cancer turns to manufacturing and selling methamphetamine in order to secure his family\'s future.',
                'releaseDate' => '2008-01-20',
                'coverImage' => 'breaking_bad.jpg',
                'staff' => ['Vince Gilligan'],
                'castt' => ['Bryan Cranston', 'Aaron Paul']
            ],
            [
                'title' => 'Game of Thrones',
                'shortDescription' => 'Nine noble families fight for control over the lands of Westeros.',
                'longDescription' => 'Nine noble families wage war against each other in order to gain control over the mythical land of Westeros. Meanwhile, a force is rising after millenniums and threatens the existence of living men.',
                'releaseDate' => '2011-04-17',
                'coverImage' => 'got.jpg',
                'staff' => ['David Benioff', 'D. B. Weiss'],
                'castt' => ['Peter Dinklage', 'Emilia Clarke']
            ],
            [
                'title' => 'Stranger Things',
                'shortDescription' => 'When a young boy disappears, his mother, a police chief, and his friends must confront terrifying supernatural forces.',
                'longDescription' => 'In a small town where everyone knows everyone, a peculiar incident starts a chain of events that leads to the disappearance of a child, which begins to tear at the fabric of an otherwise peaceful community.',
                'releaseDate' => '2016-07-15',
                'coverImage' => 'stranger_things.jpg',
                'staff' => ['The Duffer Brothers'],
                'castt' => ['Winona Ryder', 'David Harbour']
            ],
            [
                'title' => 'The Crown',
                'shortDescription' => 'Follows the political rivalries and romance of Queen Elizabeth II\'s reign.',
                'longDescription' => 'This drama follows the political rivalries and romance of Queen Elizabeth II\'s reign and the events that shaped the second half of the twentieth century.',
                'releaseDate' => '2016-11-04',
                'coverImage' => 'the_crown.jpg',
                'staff' => ['Peter Morgan'],
                'castt' => ['Claire Foy', 'Matt Smith']
            ]
        ];

        foreach ($series as $serieData) {
            $serie = new Serie();
            $serie->setTitle($serieData['title']);
            $serie->setShortDescription($serieData['shortDescription']);
            $serie->setLongDescription($serieData['longDescription']);
            $serie->setReleaseDate(new \DateTime($serieData['releaseDate']));
            $serie->setCoverImage($serieData['coverImage']);
            $serie->setStaff($serieData['staff']);
            $serie->setCastt($serieData['castt']);
            $manager->persist($serie);
        }

        $manager->flush();
    }
}
