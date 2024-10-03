<?php

declare(strict_types=1);

namespace App\Controller\Other;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SubscriptionController extends AbstractController
{
    #[Route(path: "/subscriptions", name: "show")]
    public function show(): Response
    {
        return $this->render("other/abonnement.html.twig");
    }
}
