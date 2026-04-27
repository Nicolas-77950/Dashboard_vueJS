<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ApiTodoController extends AbstractController
{
    #[Route('/api/tasks', name: 'app_api_tasks', methods: ['GET'])]
    public function getTasks(): JsonResponse
    {
        $tasks = [
            ['id' => 1, 'title' => 'Finir l\'intégration Symfony', 'done' => false],
            ['id' => 2, 'title' => 'Nettoyer le code Vue.js', 'done' => true],
            ['id' => 3, 'title' => 'Connecter l\'API au Dashboard', 'done' => false],
        ];

        return $this->json($tasks);
    }
}
