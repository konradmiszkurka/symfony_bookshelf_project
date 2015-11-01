<?php

namespace BookshelfProjectBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Coderslab\BookshelfProjectBundle\Entity\Book;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
 * @Route("/book")
 */


class BookController extends Controller
{
    /**
     * @Route("/show")
     * @Template()
     */
    public function showAction($bookId)
    {
        $repo = $this->getDoctrine()->getRepository("BookshelfProjectBundle:Book");
        $book = $repo->find($bookId);


        return array(
                "book" => $bookId
            );    }

    /**
     * @Route("/create")
     * @Template()
     */
    public function createAction(Request $request)
    {
      $myBook = new Book();
        $form = $this->createFormBuilder($myBook)
                     ->add("name", "text")
                     ->add("pagesNo", "integer")
                     ->add("raiting", "integer")
                     ->add("author", "entity" , array("class" => "BookshelfProjectBundle:Author", "choice_label" => "name"))
                     ->add("create", "submit", array("label" => "Add new book"))
                     ->getForm();
        $form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();
        $em->persist($myBook);
        $em->flush();

        return $this->redirectToRoute("bookshelfproject_book_show", array("bookId" => $myBook->getId()));
    }

    /**
     * @Route("/delete")
     * @Template()
     */
    public function deleteAction($bookId)
    {
        $em = $this->getDoctrine()->getManager();
        // Load book to delete
        $bookToDelete = $this->getDoctrine()->getRepository("BookshelfProjectBundle:Book")->find($bookId);
        $em->remove($bookToDelete);
        $em->flush();
        return $this->redirectToRoute("coderslab_bookshelf_book_showall");
    }
    /**
     * @Route("/showAll")
     * @Template()
     */
    public function showAllAction()
    {
        $repo = $this->getDoctrine()->getRepository("BookshelfProjectBundle:Book");
        $books = $repo->findAll();
        return array(
            "books" => $books
        );
    }
    /**
     * @Route("/add")
     * @Template()
     */
    public function addAction()
    {
        $book = new Book();
        $form = $this->createFormBuilder($book)
            ->add("name", "text")
            ->add("pagesNo", "integer")
            ->add("raiting", "integer")
            ->add("author", "entity", array("class" => "BookshelfProjectBundle:Author", "choice_label" => "name"))
            ->add("create", "submit", array("label" => "Add new book"))
            ->getForm();
        return array(
            "form" => $form->createView()
        );



    }

}
