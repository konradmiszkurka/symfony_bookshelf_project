<?php

namespace BookshelfProjectBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class BookshelfController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function showAllAction()
    {
        return array(
                // ...
            );    }

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
     * @Route("/Add")
     * @Template()
     */
    public function AddAction()
    {
        return array(
                // ...
            );    }

    /**
     * @Route("/Delete")
     * @Template()
     */
    public function DeleteAction()
    {
        return array(
                // ...
            );    }

}
