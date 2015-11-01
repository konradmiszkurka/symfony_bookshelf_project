<?php

namespace BookshelfProjectBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

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

}
