<?php

namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class DefaultController
{
    /**
     * @Route("/", name="homepage")
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function homepageAction(Environment $twig)
    {
        $color = 'blue';
        return new Response(
            $twig->render(
                'default/homepage.html.twig',
                [
                    'color' => $color,
                    'itemList' => [0, 1, 2, 34, 5, 7, 99]
                ]));
    }
    /**
     * @Route("/terms", name="term_of_service")
     * @return Response
     */
    public function termsOfServiceAction()
    {
        return new Response('
            <p>Terms of service...</p>
            <a href="/">Home</a>
            ');
    }
}