<?php

declare(strict_types=1);

namespace App\Controller\Movie;

use App\Entity\Media;
use App\Entity\Movie;
use App\Repository\MediaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route("/movie")]
class MovieController extends AbstractController
{
    #[Route("/", name: "movie_list")]
    public function list(MediaRepository $mediaRepository): Response
    {
        $movies = $mediaRepository->findAll();
        $movies = array_filter($movies, fn($media) => $media instanceof Movie);
        
        return $this->render("movie/list.html.twig", [
            'movies' => $movies
        ]);
    }

    #[Route("/{id}", name: "movie_detail")]
    public function detail(Media $media): Response
    {
        if (!($media instanceof Movie)) {
            throw $this->createNotFoundException('Ce média n\'est pas un film');
        }

        return $this->render("movie/detail.html.twig", [
            'movie' => $media
        ]);
    }
}
