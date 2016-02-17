<?php

namespace Bundles\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="index")
     */
    public function indexAction()
    {
        return $this->render('UserBundle:Default:index.html.twig');
    }

    /**
     * @Route("/kontakt", name="kontakt")
     */
    public function kontaktAction()
    {
        return $this->render('UserBundle:Default:kontakt.html.twig');
    }
}
