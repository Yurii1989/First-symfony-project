<?php

namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController
{
    /**
     * @Route("/", name="homepage")
     * @return Response
     */
    public function homepageAction()
    {
        return new Response('<!DOCTYPE>
        <html>
            <head>
            <title>My homepage</title>
            <style>
                #ball {
                    background-color: #8959A8;
                    width: 3rem;
                    height: 3rem;
                    border: 2px solid darkred;
                    border-radius: 50%;
                    transform: rotate(90deg);
                }
                #ball:hover {
                    transform: translateX(150px);
                    background-color: #5eb5e0;
                }
            </style>
            </head>
            <body>
                <h2 style="color: darkturquoise">Hello World!</h2> 
                <a href="/terms">Terms</a>
                <p>Some text here would be nice...</p>
                <div id="ball"></div>
            </body>
        </html>
        ');
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