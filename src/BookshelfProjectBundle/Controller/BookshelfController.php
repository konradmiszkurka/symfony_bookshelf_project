<?php

namespace BookshelfProjectBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Coderslab\BookshelfProjectBundle\Entity\Bookshelf;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
 * @Route("/bookshelf")
 */

class BookshelfController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function showAllAction()
    {
        {
            $repo = $this->getDoctrine()->getRepository("BookshelfProjectBundle:Bookshelf");
            $bookshelf = $repo->findAll();
            return array(
                "bookshelf" => $bookshelf
            );
        }
    }

    /**
     * @Route("/show")
     * @Template()
     */
    public function showAction($bookshelfId)
    {
        $repo = $this->getDoctrine()->getRepository("BookshelfProjectBundle:Bookshelf");
        $bookshelf = $repo->find($bookshelfId);


        return array(
            "bookshelf" => $bookshelf
        );    }

    /**
     * @Route("/Add")
     * @Template()
     */
    public function AddAction()
    {
        $bookshelf = new Bookshelf();
        $form = $this->createFormBuilder($bookshelf)
                     ->add("name", "text")
                     ->add("create", "submit", array("label" => "Add new bookshelf"))
                     ->getForm();

        return array(
                "form" => $form->createView()
            );    }

    /**
     * @Route("/Delete")
     * @Template()
     */
    public function DeleteAction($bookshelfId)
    {
        $em = $this->getDoctrine()->getManager();
        $bookshelfToDelete = $this->getDoctrine()->getRepository("BookshelfProjectBundle:Bookshelf")->find($bookshelfId);
        $em->remove($bookshelfToDelete);
        $em->flush();

        return $this->redirectToRoute("bookshelfproject_bookshelf_showall");
}
}
