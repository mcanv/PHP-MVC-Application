<?php

namespace Controllers;

use Core\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{
    /**
     * @Route("/")
     * @param Response $response
     * @return Response
     */
    public function index(Response $response) : Response {
        return $response->setContent("Hello world");
    }

    /**
     * @Route("/posts")
     * @param Response $response
     * @return Response
     */
    public function posts(Response $response): string
    {
        $posts = array(
            array(
                "id" => 1,
                "title" => "Hello world",
            ),
            array(
                "id" => 2,
                "title" => "Hello world 2",
            ),
        );

        $response->headers->set("Content-Type", "application/json");
        $response->setContent(json_encode($posts));
        return $response;
    }

    /**
     * @Route("/posts/{id}")
     * @param Response $response
     * @param int $id
     * @return Response
     */
    public function show(Response $response, int $id) : Response {
        $response->headers->set("Content-Type", "application/json");
        $posts = array(
            array(
                "id" => 1,
                "title" => "Hello world",
            ),
            array(
                "id" => 2,
                "title" => "Hello world 2",
            ),
        );
        $post = array_search($id, array_column($posts, "id"));
        if($post === false) {
            return $response->setContent(json_encode(
                array(
                    "error" => true,
                    "msg" => "Post not found"
                )
            ));
        }
        $response->setContent(json_encode($posts[$post]));
        return $response;
    }

    public function test() {
        return $this->view("home");
    }
}