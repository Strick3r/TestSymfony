<?php
/**
 * Created by PhpStorm.
 * User: strick3r
 * Date: 18/02/19
 * Time: 20:36
 */

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/page")
 */
class PageController extends AbstractController
{

    /**
     * @Route("/1", name="page_1", methods={"GET"})
     */
    public function page1(): Response
    {
        return $this->render('page/1.html.twig', [
            'user' => $this->get('security.token_storage')->getToken()->getUser(),
        ]);
    }

    /**
     * @Route("/2", name="page_2", methods={"GET"})
     */
    public function page2(): Response
    {
        return $this->render('page/2.html.twig', [
            'user' => $this->get('security.token_storage')->getToken()->getUser(),
        ]);
    }

}