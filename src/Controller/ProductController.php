<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    private ProductRepository $repository;

    public function __construct()
    {
        $this->repository = new ProductRepository();
    }

    #[Route('/products', name: 'product_list')]
    public function index(): Response
    {
        $products = $this->repository->findAll();
        return $this->render('product/index.html.twig', ['products' => $products]);
    }

    #[Route('/products/create', name: 'product_create', methods: ['POST'])]
    public function create(Request $request): Response
    {
        $data = json_decode($request->getContent(), true);
        $product = new Product(rand(1, 1000000), $data['category'], $data['num'], $data['price']);
        $this->repository->save($product);

        return $this->json(['message' => 'produit correctement ajputé']);
    }
}
