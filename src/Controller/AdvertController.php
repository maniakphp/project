<?php declare(strict_types=1);

namespace App\Controller;

use App\Entity\Advert;
use App\Entity\Category;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class AdvertController extends Controller
{
    /**
     * @Route("/", name="advert_index")
     *
     * @return Response
     */
    public function index(): Response
    {
        $options = [
            'decorate' => true,
            'rootOpen' => '<ul>',
            'rootClose' => '</ul>',
            'childOpen' => '<li>',
            'childClose' => '</li>',
            'nodeDecorator' => function ($node) {
                return '<a href="/category/' . $node['slug'] . '">' . $node['title'] . '</a>';
            },
        ];

        $categories = $this->getDoctrine()->getRepository(Category::class)->childrenHierarchy(
            null, /* starting from root nodes */
            false, /* false: load all children, true: only direct */
            $options
        );

        $adverts = $this->getDoctrine()->getRepository(Advert::class)->findAll();

        return $this->render('advert/index.html.twig', ['categories' => $categories, 'adverts' => $adverts]);
    }

    /**
     * @Route("/adverts/{id}", name="advert_details")
     *
     * @param Advert $advert
     *
     * @return Response
     */
    public function details(Advert $advert): Response
    {
        $options = [
            'decorate' => true,
            'rootOpen' => '<ul>',
            'rootClose' => '</ul>',
            'childOpen' => '<li>',
            'childClose' => '</li>',
            'nodeDecorator' => function ($node) {
                return '<a href="/category/' . $node['slug'] . '">' . $node['title'] . '</a>';
            },
        ];

        $categories = $this->getDoctrine()->getRepository(Category::class)->childrenHierarchy(
            null, /* starting from root nodes */
            false, /* false: load all children, true: only direct */
            $options
        );

        return $this->render('advert/details.html.twig', ['categories' => $categories, 'advert' => $advert]);
    }
}
