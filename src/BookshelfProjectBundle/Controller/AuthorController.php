<?php

namespace BookshelfProjectBundle\Controller;

use BookshelfProjectBundle\Entity\Author;
use Coderslab\BookshelfProjectBundle\Entity\Book;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
 * @Route("/author")
 */

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
    public function showBestAction($raiting)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery("
        SELECT b FROM BookshelfBundleProject:Book b
        WHERE b.raiting > :raiting
        ")->setParameter("raiting", $raiting);
        $books = $query->getResult();
        return array(
            "books" => $books
        );
    }

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

        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();
        $em->persist($author);
        $em->flush();

        return $this->redirectToRoute("bookshelfproject_author_show", array("authorId" => $author->getId()));
    }
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
    /**
     * @Route("/add")
     * @Template()
     */
    public function addAction(Request $request)
    {
        $author = new Author();
        $form = $this->createFormBuilder($author)
            ->add("name", "text")
            ->add("age", "integer")
            ->add("description", "text")
            ->add("create", "submit", array("label" => "Add new Author"))
            ->getForm();
        return array(
            "form" => $form->createView()
        );



    }

}
