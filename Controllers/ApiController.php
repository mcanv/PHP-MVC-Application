<?php

namespace Controllers;

use Buki\Router\Http\Controller;
use Symfony\Component\HttpFoundation\Response;

class ApiController extends Controller
{
    /**
     * @Route("/")
     * @param Response $response
     * @return Response
     */
    public function index(Response $response) : Response {
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent(json_encode(['message' => 'Hello World!']));
        return $response;
    }
}