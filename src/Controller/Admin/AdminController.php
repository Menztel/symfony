<?php

declare(stricttypes=1);

namespace App\Controller\Admin;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route(path: "/admin", name: "admin")]
class AdminController extends AbstractController
{
    #[Route(path: "/", name: "admin_homepage")]
    public function homepage(): Response
    {
        return $this->render("admin/homepage.html.twig");
    }

    #[Route(path: "/movies", name: "admin_movies")]
    public function movies(): Response
    {
        return $this->render("admin/admin_films.html.twig");
    }

    #[Route(path: "/movies/add", name: "admin_movies_add")]
    public function addMovie(): Response
    {
        return $this->render("admin/admin_add_films.html.twig");
    }

    #[Route(path: "/users", name: "admin_users")]
    public function users(): Response
    {
        return $this->render("admin/admin_users.html.twig");
    }
}
