<?php

declare(strict_types=1);

namespace App\Controller\Movie;

use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route(path: "/category", name: "categories")]
class CategoryController extends AbstractController
{
    #[Route(path: "/", name: "categories_page")]
    public function show(CategoryRepository $categoryRepository): Response
    {
        $categories = $categoryRepository->findAll();
        return $this->render("movie/category.html.twig", [
            "categories" => $categories,
        ]);
    }
}
