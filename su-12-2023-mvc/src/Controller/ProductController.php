<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use App\Routing\Attribute\Route;
use App\Routing\Exception\RouteNotFoundException;
use Doctrine\ORM\EntityManager;

use Symfony\Component\HttpFoundation\Response;

class ProductController extends AbstractController
{
    #[Route('/products/new', 'products_new')]
    public function new(EntityManager $em): string
    {
        $product = new Product();
        $product
            ->setName(name: "sIgTKZNDZrr")
            ->setPrice(76.24);

        $em->persist(entity: $product);
        $em->flush();

        return $this->twig->render("products/new.html.twig", [
            'product' => $product
        ]);
    }

    #[Route('/products/list', 'products_list')]
    public function list(ProductRepository $productRepository): string
    {
        return $this->twig->render('products/list.html.twig', [
            'products' => $productRepository->findAll()
        ]);
    }


    // La route '/products/{id}' appelle la fonction 'product_details' ci dessous en ayant en parametre {id}
    #[Route('/products/{id}', name: 'product_details')]
    public function product_details(ProductRepository $productRepository, $id): string
    {
        // Trouver le produit en cherchant par son id 
        $product = $productRepository->find($id);

        // Vérifiez si le produit a été trouvé
        if (!$product) {
            throw new RouteNotFoundException('Le produit n\'a pas été trouvé.');
        }

        // La fonction renvoie l'url du template Twig à utiliser avec une tableau ['products' => [$product]
        return $this->twig->render('products/item.html.twig', 
            ['products' => [$product], 
        ]);
    }

}
