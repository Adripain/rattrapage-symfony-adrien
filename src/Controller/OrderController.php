<?php

namespace App\Controller;

use App\Entity\Order;
use App\Repository\OrderRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OrderController extends AbstractController
{
    private OrderRepository $repository;

    public function __construct()
    {
        $this->repository = new OrderRepository();
    }

    #[Route('/orders', name: 'order_list')]
    public function index(): Response
    {
        $orders = $this->repository->findAll();
        return $this->render('order/index.html.twig', ['orders' => $orders]);
    }

    #[Route('/orders/create', name: 'order_create', methods: ['POST'])]
    public function create(Request $request): Response
    {
        $data = json_decode($request->getContent(), true);
        if (!preg_match('/^0[1-68]([-. ]?[0-9]{2}){4}$/', $data['phoneNumber'])) {
            return $this->json(['error' => 'erreur : numero invalide'], 400);
        }

        $order = new Order(rand(1, 1000), $data['products'], date('Y-m-d H:i:s'), $data['phoneNumber']);
        $this->repository->save($order);

        return $this->json(['message' => 'commande correctement créer']);
    }
}
