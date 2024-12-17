<?php

declare(strict_types=1);

namespace App\Controller\Movie;

use App\Repository\CategoryRepository;
use App\Entity\Category;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route(path: "/category")]
class CategoryController extends AbstractController
{
    #[Route(path: "/", name: "categories")]
    public function show(CategoryRepository $categoryRepository): Response
    {
        $categories = $categoryRepository->findAll();
        return $this->render("movie/category.html.twig", [
            "categories" => $categories,
        ]);
    }

    #[Route(path: "/{id}", name: "category_detail")]
    public function detail(Category $category): Response
    {
        return $this->render("movie/category-detail.html.twig", [
            'category' => $category
        ]);
    }
}
