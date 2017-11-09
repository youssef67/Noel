<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Enfant;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Enfant controller.
 *
 * @Route("enfant")
 */
class EnfantController extends Controller
{
    /**
     * Lists all enfant entities.
     *
     * @Route("/", name="enfant_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $enfants = $em->getRepository('AppBundle:Enfant')->findAll();

        return $this->render('enfant/index.html.twig', array(
            'enfants' => $enfants,
        ));
    }

    /**
     * Creates a new enfant entity.
     *
     * @Route("/new", name="enfant_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $enfant = new Enfant();
        $form = $this->createForm('AppBundle\Form\EnfantType', $enfant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($enfant);
            $em->flush();

            return $this->redirectToRoute('enfant_show', array('id' => $enfant->getId()));
        }

        return $this->render('enfant/new.html.twig', array(
            'enfant' => $enfant,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a enfant entity.
     *
     * @Route("/{id}", name="enfant_show")
     * @Method("GET")
     */
    public function showAction(Enfant $enfant)
    {
        $deleteForm = $this->createDeleteForm($enfant);

        return $this->render('enfant/show.html.twig', array(
            'enfant' => $enfant,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing enfant entity.
     *
     * @Route("/{id}/edit", name="enfant_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Enfant $enfant)
    {
        $deleteForm = $this->createDeleteForm($enfant);
        $editForm = $this->createForm('AppBundle\Form\EnfantType', $enfant);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('enfant_edit', array('id' => $enfant->getId()));
        }

        return $this->render('enfant/edit.html.twig', array(
            'enfant' => $enfant,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a enfant entity.
     *
     * @Route("/{id}", name="enfant_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Enfant $enfant)
    {
        $form = $this->createDeleteForm($enfant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($enfant);
            $em->flush();
        }

        return $this->redirectToRoute('enfant_index');
    }

    /**
     * Creates a form to delete a enfant entity.
     *
     * @param Enfant $enfant The enfant entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Enfant $enfant)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('enfant_delete', array('id' => $enfant->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
