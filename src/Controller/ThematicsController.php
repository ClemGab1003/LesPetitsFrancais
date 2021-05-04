<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ThematicsController extends AbstractController
{
    /**
     * @Route("/thematics", name="thematics")
     */
    public function index(): Response
    {
        return $this->render('thematics/index.html.twig', [
            'controller_name' => 'ThematicsController',
        ]);
    }

    /**
     * @Route("/accueil", name="accueil")
     */
    public function home() {
        return $this->render('thematics/accueil.html.twig');
    }

    /**
     * @Route("/thematiques", name="thematiques")
     */
    public function thematics() {
        return $this->render('thematics/thematiques.html.twig');
    }

    /**
     * @Route("/galerie", name="galerie")
     */
    public function galery() {
        return $this->render('thematics/galerie.html.twig');
    }

    /**
     * @Route("/profil", name="profil")
     */
    public function profile() {
        return $this->render('thematics/profil.html.twig');
    }

    /**
     * @Route("/exercicelire", name="exercicelire")
     */
    public function exercicelire() {
        return $this->render('thematics/exercicelire.html.twig');
    }

    /**
     * @Route("/usercreate", name="usercreate")
     */
    public function usercreate() {
        return $this->render('thematics/usercreate.html.twig');
    }

    
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @Route("/userlist", name="userlist")
     */
    public function userlist(): array
    {
        $response = $this->client->request(
            'GET',
            'http://localhost:5000/users/read'
        );

        $statusCode = $response->getStatusCode();
        // $statusCode = 200
        $contentType = $response->getHeaders()['content-type'][0];
        // $contentType = 'application/json'
        $content = $response->getContent();
        // $content = '{"id":521583, "name":"symfony-docs", ...}'
        $content = $response->toArray();
        // $content = ['id' => 521583, 'name' => 'symfony-docs', ...]

        print_r ($content);
    }

    /**
     * @Route("/usercreation", name="usercreation")
     */
    public function usercreation(): array
    {
        $response = $this->client->request(
            'GET',
            'http://localhost:5000/users/create'
        );

        $statusCode = $response->getStatusCode();
        // $statusCode = 200
        $contentType = $response->getHeaders()['content-type'][0];
        // $contentType = 'application/json'
        $content = $response->getContent();
        // $content = '{"id":521583, "name":"symfony-docs", ...}'
        $content = $response->toArray();
        // $content = ['id' => 521583, 'name' => 'symfony-docs', ...]

        print_r ($content);
    }

    /**
     * @Route("/userdelete", name="userdelete")
     */
    public function userdelete(): array
    {
        $response = $this->client->request(
            'GET',
            'http://localhost:5000/users/delete'
        );

        $statusCode = $response->getStatusCode();
        // $statusCode = 200
        $contentType = $response->getHeaders()['content-type'][0];
        // $contentType = 'application/json'
        $content = $response->getContent();
        // $content = '{"id":521583, "name":"symfony-docs", ...}'
        $content = $response->toArray();
        // $content = ['id' => 521583, 'name' => 'symfony-docs', ...]

        print_r ($content);
    }

    /**
     * @Route("/users", name="users")
     */
    public function users() {
        return $this->render('thematics/users.html.twig');
    }
}
