<?php

declare(strict_types=1);

namespace App\Controller\Other;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ListController extends AbstractController
{
    #[Route(path: "/list", name: "list")]
    public function list(): Response
    {
        return $this->render("other/lists.html.twig");
    }
}
