<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Cadeau;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Cadeau controller.
 *
 * @Route("cadeau")
 */
class CadeauController extends Controller
{
    /**
     * Lists all cadeau entities.
     *
     * @Route("/", name="cadeau_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cadeaus = $em->getRepository('AppBundle:Cadeau')->findAll();

        return $this->render('cadeau/index.html.twig', array(
            'cadeaus' => $cadeaus,
        ));
    }

    /**
     * Finds and displays a cadeau entity.
     *
     * @Route("/{id}", name="cadeau_show")
     * @Method("GET")
     */
    public function showAction(Cadeau $cadeau)
    {

        return $this->render('cadeau/show.html.twig', array(
            'cadeau' => $cadeau,
        ));
    }
}
