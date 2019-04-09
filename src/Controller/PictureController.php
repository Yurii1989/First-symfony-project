<?php

namespace App\Controller;


use App\Entity\Picture;
use App\Form\PictureFormType;
use Ramsey\Uuid\Uuid;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class PictureController extends AbstractController
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
        $picture = new Picture();
        $form = $formFactory->create(PictureFormType::class, $picture, ['standalone' => true] );
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /**
             * @var UploadedFile $file
             */
            $file = $form->get('file')->getData();
            $fileName = Uuid::uuid4()->toString() . '.' . $file->getExtension();
            $picture->setPath($fileName);
            $picture->setSharer($this->getUser());
            $picture->setMimeType($file->getMimeType());
            $file->move($this->getParameter('upload_directory'), $fileName);
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($picture);
            $manager->flush();

            return $this->redirectToRoute('homepage');
        }

        return new Response($twig->render('picture/add-picture.html.twig', ['Form' => $form->createView()]));
    }

    /**
     * @Route("/picture/{picture}", name="get_picture_content")
     */
    public function gimmePic(Picture $picture)
    {
        $path = $this->getParameter('upload_directory') . $picture->getPath();
        return new Response(
            file_get_contents($path),
            200,
            [
                'Content-Type' => $picture->getMimeType()
            ]
        );
    }

}