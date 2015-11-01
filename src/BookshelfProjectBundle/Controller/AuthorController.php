<?php

namespace BookshelfProjectBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

class AuthorController extends Controller
{

    /**
     * @Route("/show")
     * @Template()
     */
    public function showAction($authorId)
    {
        $repo = $this->getDoctrine()->getRepository("BookshelfProjectBundle:Author");
        $author = $repo->find($authorId);
        return array(
            "authors" => $author
        );
    }


        /**
     * @Route("/delete")
     * @Template()
     */
    public function deleteAction($authorId)
    {
        $em = $this->getDoctrine()->getManager();

        $authorToDelete = $this->getDoctrine()->getRepository("BookshelfProjectBundle:Author")->find($authorId);
        $em->remove($authorToDelete);
        $em->flush();
        return $this->redirectToRoute("coderslab_bookshelf_author_showall");
    }

    /**
     * @Route("/showBest")
     * @Template()
     */
    public function showBestAction()
    {
        return array(
                // ...
            );    }

    /**
     * @Route("/create")
     * @Template()
     */
    public function createAction(Request $request)
    {
        $author = new Author();
        $form = $this->createFormBuilder($author)
            ->add("name", "text")
            ->add("description", "textarea")
            ->add("age", "integer")
            ->add("save", "submit", array("label" => "Add new Author"))
            ->getForm();

        return array(
            "form" => $form->createView()
        );    }
    /**
     * @Route("/edit/{authorId}")
     * @Template()
     */
    public function editAction($authorId)
    {
        $autor = $this->getDoctrine()->getRepository("BookshelfProjectBundle:Author")->find($authorId);
        $form = $this->createFormBuilder($autor)
            ->add("name", "text")
            ->add("description", "textarea")
            ->add("age", "integer")
            ->add("save", "submit", array("label" => "add new Author"))
            ->getForm();

        return array(
            "form" => $form->createView(),
            "authorId" => $authorId
        );


    }

}
