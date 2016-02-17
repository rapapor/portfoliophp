<?php

namespace Bundles\UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Bundles\UserBundle\Entity\Foto;
use Bundles\UserBundle\Form\FotoType;

/**
 * Foto controller.
 *
 * @Route("/foto")
 */
class FotoController extends Controller
{
    /**
     * Lists all Foto entities.
     *
     * @Route("/", name="foto_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $fotos = $em->getRepository('UserBundle:Foto')->findAll();

        return $this->render('foto/index.html.twig', array(
            'fotos' => $fotos,
        ));
    }

    /**
     * Creates a new Foto entity.
     *
     * @Route("/new", name="foto_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $foto = new Foto();
        $form = $this->createForm('Bundles\UserBundle\Form\FotoType', $foto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($foto);
            $em->flush();

            return $this->redirectToRoute('foto_show', array('id' => $foto->getId()));
        }

        return $this->render('foto/new.html.twig', array(
            'foto' => $foto,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Foto entity.
     *
     * @Route("/{id}", name="foto_show")
     * @Method("GET")
     */
    public function showAction(Foto $foto)
    {
        $deleteForm = $this->createDeleteForm($foto);

        return $this->render('foto/show.html.twig', array(
            'foto' => $foto,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Foto entity.
     *
     * @Route("/{id}/edit", name="foto_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Foto $foto)
    {
        $deleteForm = $this->createDeleteForm($foto);
        $editForm = $this->createForm('Bundles\UserBundle\Form\FotoType', $foto);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($foto);
            $em->flush();

            return $this->redirectToRoute('foto_edit', array('id' => $foto->getId()));
        }

        return $this->render('foto/edit.html.twig', array(
            'foto' => $foto,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Foto entity.
     *
     * @Route("/{id}", name="foto_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Foto $foto)
    {
        $form = $this->createDeleteForm($foto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($foto);
            $em->flush();
        }

        return $this->redirectToRoute('foto_index');
    }

    /**
     * Creates a form to delete a Foto entity.
     *
     * @param Foto $foto The Foto entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Foto $foto)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('foto_delete', array('id' => $foto->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
