<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Annotation\Method;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use App\Entity\Article;
use App\Utils\Serializer;

class ArticleController extends Controller
{
  /**
   * @Route("/articles/{id}", name="article_show")
   */
  public function showAction(Article $article)
  {
    $data = $this->get('serializer')->serialize($article, 'json');

    $response = new Response($data);
    $response->headers->set('Content-Type', 'application/json');

    return $response;
  }

  /**
   * @Route("/articles", name="article_list", methods={"GET"})
   */
  public function listAction()
  {
    $articles = $this->getDoctrine()->getRepository(Article::class)->findAll();
    $data = $this->get('serializer')->serialize($articles, 'json');

    $response = new Response($data);
    $response->headers->set('Content-Type', 'application/json');

    return $response;
  }

  /**
   * @Route("/articles", name="article_create", methods={"post"})
   */
  public function createAction(Request $request)
  {
    $data = $request->getContent();
    $article = $this->get('serializer')->deserialize($data, Article::class, 'json');

    // VALIDATE DATE

    $em = $this->getDoctrine()->getManager();
    $em->persist($article);
    $em->flush();

    return new Response('', Response::HTTP_CREATED);
  }
}
