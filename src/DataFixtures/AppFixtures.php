<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Produit;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Données pour les catégories
        $categories_data = [
            [
                'name' => 'Format papier',
                'produits' => [
                    ['titre' => 'Se construire',
                    'description' => 'Oeuvre de couleurs rouge, jaune, verte et blanche, de motif géométrique, grands aplats de couleurs',
                    'price' => 250.00,
                    'stock' => 1,
                    'img' => 'Construire.jpg',
                    ],
                    ['titre' => 'Respirer dans la nature',
                    'description' => 'Oeuvre de couleur verte, noire et doréee, montrant en son milieu un motif de feuille',
                    'price' => 250.00,
                    'stock' => 1,
                    'img' => '',
                    ],
                    ['titre' => 'Raconte-moi une histoire',
                    'description' => 'Oeuvre aux tons bleutés, rouges, jaune et blanc, de formes géométriques',
                    'price' => 250.00,
                    'stock' => 1,
                    'img' => 'Histoire.jpg',
                    ],
                 ],
            ],
             
            [
                'name' => 'Format toile',
                'produits' => [
                ['titre' => 'Paradise',
                'description' => 'Oeuvre de couleurs jaune, bleuté et blanc, aux motifs géométriques',
                'price' => 250.00,
                'stock' => 1,
                'img' => 'Paradise.webp',
                ],
                ['titre' => 'I-Scream',
                'description' => 'Oeuvre de dégradés de bleu, aux motifs géométriques',
                'price' => 250.00,
                'stock' => 0,
                'img' => 'Scream.webp', 
                ],
                ['titre' => 'Nowhere else but with you',
                'description' => 'Oeuvre de couleurs orangés et vert turquoise, de motifs géométriques',
                'price' => 250.00,
                'stock' => 1,
                'img' => '',
                ],
                ['titre' => 'La Colombe',
                'description' => 'Oeuvre de couleur blanche, bleue et doréee',
                'price' => 250.00,
                'stock' => 1,
                'img' => 'Colombe.jpg',
                ],
            ],
        ],
        ];

        // Créer les catégories et produits
        foreach ($categories_data as $category_data) {
            $category = new Category();
            $category->setName($category_data['name']);

            foreach ($category_data['produits'] as $produit_data) {
                $produit = new Produit();
                $produit->setTitre($produit_data['titre']);
                $produit->setDescription($produit_data['description']);
                $produit->setPrice($produit_data['price']);
                $produit->setStock($produit_data['stock']);
                $produit->setImg($produit_data['img']);
                $produit->setCategory($category);

                $manager->persist($produit);
            }
            $manager->persist($category);
        }


        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
