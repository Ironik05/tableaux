<?php

namespace App\Controller;

Use App\Repository\CategoryRepository;
Use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class TableauxController extends AbstractController
{
    #[Route('/categories_de_tableaux', name: 'app_categories')]
    public function categories(CategoryRepository $CategoryRepository): Response
    {
        //Récupérer tous les tableaux via le repository
        $categories_data = $CategoryRepository->findAll();



        //Retourner le rendu avec la liste
        return $this->render('tableaux/categories.html.twig', [
            'controller_name' => 'TableauxController',
            'categories' => $categories_data,
        ]);
    }

    #[Route('/categories_de_tableaux/{id}', name: 'app_tableaux_par_categorie')]
    
    public function produitsByCategory(ProduitRepository $ProduitRepository, int $id): Response
    {
        //Récupérer les produits de la catégorie via le repository
        $produit_data = $ProduitRepository->findBy(['category' => $id]);

      

        //Retourner le rendu avec la liste
        return $this->render('tableaux/produits_par_categorie.html.twig', [
            'controller_name' => 'TableauxController',
            'produits' => $produit_data,
        ]);
    }


     //Récupérer l'image du produit via le repository
    #[Route('/categories_de_tableaux/{id}/img/{img}', requirements: ['img' => '.+'], name: 'app_img_par_tableaux')]
    public function imgByProduit(ProduitRepository $ProduitRepository, int $id, string $img): Response
    {
        //Récupérer les produits de la catégorie via le repository
        $produit_data = $ProduitRepository->findBy(['id' => $id, 'img' => $img]);

      

        //Retourner le rendu avec la liste
        return $this->render('tableaux/img_par_tableaux.html.twig', [
            'controller_name' => 'TableauxController',
            'produits' => $produit_data,
        ]);
    }
}
