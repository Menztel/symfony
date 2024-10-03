<?php

declare(strict_types=1);

namespace App\Controller\Movie;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route(path: "/movies", name: "movies")]
class MovieController extends AbstractController
{
    #[Route(path: "/category", name: "movie_category")]
    public function category(): Response
    {
        return $this->render("movie/category.html.twig");
    }

    #[Route(path: "/detail", name: "movie_detail")]
    public function detail(): Response
    {
        return $this->render("movie/detail.html.twig");
    }

    #[Route(path: "/detailserie", name: "detail_serie")]
    public function detailSerie(): Response
    {
        return $this->render("movie/detail_serie.html.twig");
    }
}
