<?php

namespace BookshelfProjectBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Coderslab\BookshelfProjectBundle\Entity\Review;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/*
 * @Route("/review")
 */

class reviewController extends Controller
{
    /**
     * @Route("/show")
     * @Template()
     */
    public function showAction($reviewId)
    {
       $repo = $this->getDoctrine()->getRepository("BookshelfProject:Review");
        $review = $repo->find($reviewId);

        return array(
            "review" => $review

        );
         }

    /**
     * @Route("/add")
     * @Template()
     */
    public function addAction()
    {
        $review = new Review();
        $form = $this->createFormBuilder($review)
            ->add("subject", "text")
            ->add("description", "text")
            ->add("review", "entity", array("class" => "BookshelfProjectBundle:Book", "choice_label" => "name"))
            ->add("create", "submit", array("label" => "Add new review"))
            ->getForm();
        return array(
            "form" => $form->createView()
        );
    }

    /**
     * @Route("/delete")
     * @Template()
     */
    public function deleteAction($reviewId)
    {
        $em = $this->getDoctrine()->getManager();

        $reviewToDelete = $this->getDoctrine()->getRepository("BookshelftProjectBundle:Review")->find($reviewId);
        $em->remove($reviewToDelete);
        $em->flush();
        return $this->redirectToRoute("bookshelfproject_bookshelf_showall");
    }

}
