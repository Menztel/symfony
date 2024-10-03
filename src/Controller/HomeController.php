<?php
declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route(path: "/", name: "home")]
    public function home(): Response
    {
        return $this->render("index.html.twig");
    }

    #[Route(path: "/movies", name: "movies")]
    public function movies(): Response
    {
        return $this->render("movie/discover.html.twig");
    }
}
