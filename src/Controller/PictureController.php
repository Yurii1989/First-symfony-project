<?php

namespace App\Controller;


use App\Entity\Picture;
use App\Form\PictureFormType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class PictureController
{
    /**
     * @Route("/add/picture", name="add_picture")
     */
    public function addPicture(
        Request $request,
        FormFactoryInterface $formFactory,
        Environment $twig
    )
    {
        $image = new Picture();
        $form = $formFactory->create(PictureFormType::class, $image, ['standalone' => true] );
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //TODO
        }

        return new Response($twig->render('picture/add-picture.html.twig', ['Form' => $form->createView()]));
    }

}