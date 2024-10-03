<?php

declare(strict_types=1);

namespace App\Controller\Other;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PhotoController extends AbstractController
{
    #[Route(path: "/upload", name: "upload")]
    public function upload(): Response
    {
        return $this->render("other/upload.html.twig");
    }
}
