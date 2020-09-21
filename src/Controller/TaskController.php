<?php


namespace App\Controller;


use Exception;
use Symfony\Component\Routing\Annotation\Route;

class TaskController
{
    /**
     * @Route("/", name="list")
     */
    public function index( array $currentRoute)
    {
//        dd("index de la liste des taches");
        $generator = $currentRoute['generator'];
        $data = require_once 'data.php';
        require __DIR__ . '/../../pages/list.html.php';
    }

    /**
     * @Route("/show/{id}", name="show", requirements={"id": "\d+"})
     */
    public function show(array $currentRoute)
    {
//        dd('Affichage d\'une tâche');
        $generator = $currentRoute['generator'];

        $data = require_once "data.php";
        $id = $currentRoute['id'];
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }

        if (!$id || !array_key_exists($id, $data)) {
            throw new Exception("La tâche demandée n'existe pas !");
        }

        $task = $data[$id];
        require __DIR__ . '/../../pages/show.html.php';
    }

    /**
     * @Route("/create", name="create", host="localhost", methods={"GET", "POST"}, schemes={"https", "http"})
     */
    public function create(array $currentRoute)
    {
//        dd('Création d\'une tâche');
        $generator = $currentRoute['generator'];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Traitement à la con (enregistrement en base de données, redirection, envoi d'email, etc)...
            var_dump("Bravo, le formulaire est soumis (TODO : traiter les données)", $_POST);

            // Arrêt du script
            return;
        }
        require __DIR__ . '/../../pages/create.html.php';
    }
}