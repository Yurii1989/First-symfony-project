<?php

namespace App\Controller;


use App\Entity\Tag;
use App\Form\TagFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TagController extends AbstractController
{
    /**
     * @Route("/tag", name="api_tag_getAll", methods={"GET"})
     */
    public function getTags()
    {
        $repository = $this->getDoctrine()->getManager()->getRepository(Tag::class);
        $tags = $repository->findAll();
        return $this->json($tags);
    }

    /**
     * @Route("/tag/{tag}", name="api_tag_getOne", methods={"GET"})
     */
    public function getTag(Tag $tag)
    {
        return $this->json($tag);
    }

    /**
     * @Route("/tag/{tag}", name="api_tag_delete", methods={"DELETE"})
     */
    public function deleteTag(Tag $tag)
    {
        $manager = $this->getDoctrine()->getManager();
        $manager->remove($tag);
        $manager->flush();
        return $this->json(null, 200, ['content-type' => 'application/json']);
    }

    /**
     * @Route("/tag", name="api_tag_create", methods={"POST"})
     * @param Request $request
     * @return JsonResponse
     */
    public function createTag(Request $request)
    {
        $tag = new Tag();
        $form = $this->createForm(TagFormType::class, $tag);

        $form->submit($request->request->all());

        if ($form->isSubmitted() && $form->isValid()) {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($tag);
            $manager->flush();
            return $this->json($tag);
        }
        $errorMessages = [];
        foreach ($form->getErrors(true) as $error) {
            $errorMessages[$error->getCause()->getPropertyPath()] = $error->getMessage();
        }
        return $this->json($errorMessages);
    }

    /**
     * @Route("/tag/{tag}", name="api_tag_put", methods={"PUT"})
     */
    public function putTag(Request $request, Tag $tag)
    {
        $form = $this->createForm(TagFormType::class, $tag);
        $form->submit($request->request->all());

        if ($form->isSubmitted() && $form->isValid()) {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($tag);
            $manager->flush();
            return $this->json($tag);
        }
        $errorMessages = [];
        foreach ($form->getErrors(true) as $error) {
            $errorMessages[$error->getCause()->getPropertyPath()] = $error->getMessage();
        }
        return $this->json($errorMessages);
    }

    /**
     * @Route("/tag/{tag}", name="api_tag_patch", methods={"PATCH"})
     * @param Request $request
     * @param Tag $tag
     * @return JsonResponse
     */
    public function patchTag(Request $request, Tag $tag)
    {
        $form = $this->createForm(TagFormType::class, $tag);
        $form->submit($request->request->all(), false);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($tag);
            $manager->flush();
            return $this->json($tag);
        }
        $errorMessages = [];
        foreach ($form->getErrors(true) as $error) {
            $errorMessages[$error->getCause()->getPropertyPath()] = $error->getMessage();
        }
        return $this->json($errorMessages);
    }
}