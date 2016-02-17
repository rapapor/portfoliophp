<?php

namespace Bundles\NewsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {

        $em = $this->getDoctrine()->getManager();

        $news = $em->getRepository('NewsBundle:News')->findOneBy(
            array(), array('date' => 'DESC'));

        return $this->render('NewsBundle:Default:index.html.twig', array(
            'news' => $news,
        ));


    }

    /**
     * @Route("/news", name="news")
     */
    public function newsAction()
    {

        $em = $this->getDoctrine()->getManager();

        $news = $em->getRepository('NewsBundle:News')->findAll();

        return $this->render('NewsBundle:Default:news.html.twig', array(
            'news' => $news,
        ));
    }

}

