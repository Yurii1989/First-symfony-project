<?php

namespace App\Controller;


use App\Repository\PictureRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function homepageAction(
        Request $request,
        Environment $twig,
        PictureRepository $repository,
        PaginatorInterface $paginator
        )
    {
        return new Response(
            $twig->render(
                'default/homepage.html.twig',
                [
                    'pictures' => $repository->findPaginated(
                        $request,
                        $paginator
                    )
                ]
            ));
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