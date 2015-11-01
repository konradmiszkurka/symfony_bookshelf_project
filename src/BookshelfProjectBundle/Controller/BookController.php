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
    public function showAction()
    {
        return array(
                // ...
            );    }

    /**
     * @Route("/create")
     * @Template()
     */
    public function createAction()
    {
        return array(
                // ...
            );    }

    /**
     * @Route("/delete")
     * @Template()
     */
    public function deleteAction()
    {
        return array(
                // ...
            );    }

    /**
     * @Route("/showAll")
     * @Template()
     */
    public function showAllAction()
    {
        return array(
                // ...
            );    }
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
