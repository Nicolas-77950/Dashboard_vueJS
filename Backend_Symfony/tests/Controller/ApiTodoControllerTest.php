<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class ApiTodoControllerTest extends WebTestCase
{
    public function testGetTasksList(): void
    {
        // 1. On crée un client qui simule un navigateur
        $client = static::createClient();

        // 2. On lance une requête GET sur ton API
        $client->request('GET', '/api/tasks');

        // 3. On vérifie que le code HTTP est 200 (Success)
        self::assertResponseIsSuccessful();

        // 4. On vérifie que c'est bien du JSON qui est renvoyé
        self::assertResponseHeaderSame('content-type', 'application/json');

        // 5. On peut même vérifier le contenu du JSON
        $responseContent = $client->getResponse()->getContent();
        $this->assertJson($responseContent);
        
        $data = json_decode($responseContent, true);

        $this->assertIsArray($data);
    }
}