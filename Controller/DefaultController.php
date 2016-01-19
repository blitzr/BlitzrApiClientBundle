<?php

namespace Blitzr\ApiClientBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BlitzrApiClientBundle:Default:index.html.twig');
    }
}
