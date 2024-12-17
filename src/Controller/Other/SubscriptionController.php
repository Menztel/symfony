<?php

declare(strict_types=1);

namespace App\Controller\Other;

use App\Repository\SubscriptionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route("/subscription")]
class SubscriptionController extends AbstractController
{
    #[Route("/", name: "subscription_list")]
    public function list(SubscriptionRepository $subscriptionRepository): Response
    {
        $subscriptions = $subscriptionRepository->findAll();
        
        return $this->render('other/subscription/list.html.twig', [
            'subscriptions' => $subscriptions
        ]);
    }
}
