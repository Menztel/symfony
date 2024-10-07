<?php

namespace App\Entity;

use App\Repository\MovieRepository;
use Doctrine\ORM\Mapping as ORM;

#[Entity]
#[ORM\Entity(repositoryClass: MovieRepository::class)]
class Movie extends Media
{
}
