<?php

namespace App\Controller;

use App\Routing\Attribute\Route;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends AbstractController
{
    // La route '/' appelle la fonction 'home' ci dessous
    #[Route('/', 'home')]
    public function home(): string
    {
        // La fonction renvoie l'url du template Twig à utiliser 
        return $this->twig->render('index/home.html.twig');
    }

    // La route '/contact' appelle la fonction 'contact' ci dessous
    #[Route('/contact', 'contact')]
    public function contact(): string
    {
        // La fonction renvoie l'url du template Twig à utiliser
        return $this->twig->render('index/contact.html.twig');
    }

    // La route '/products/list' appelle la fonction 'product_list' ci dessous
    #[Route('/products/list', 'product_list')]
    public function product_list(): string
    {
        // La fonction renvoie l'url du template Twig à utiliser
        return $this->twig->render('products/list.html.twig');
    }

    // La route '/newsletter/subscribe' appelle la fonction 'newsletter' ci dessous
    #[Route('/newsletter/subscribe', 'newsletter')]
    public function newsletter(): string
    {
        // La fonction renvoie l'url du template Twig à utiliser
        return $this->twig->render('newsletter/subscribe.html.twig');
    }
}
