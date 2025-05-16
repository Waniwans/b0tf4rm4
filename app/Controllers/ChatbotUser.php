<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;

class ChatbotUser extends BaseController
{
    public function index()
    {
        return view('chatbot'); 
    }

    public function ask()
{
    $question = $this->request->getPost('question');

    $client = \Config\Services::curlrequest();

    $apiUrl = 'https://cloud.flowiseai.com/api/v1/prediction/48aa876f-4652-4ece-9776-b9ada6e393a7'; // ID bot

    try {
        $response = $client->post($apiUrl, [
            'headers' => ['Content-Type' => 'application/json'],
            'body' => json_encode(['question' => $question])
        ]);

        $body = json_decode($response->getBody(), true);
        return $this->response->setJSON(['reply' => $body['text'] ?? 'Tidak ada jawaban']);
    } catch (\Exception $e) {
        return $this->response->setStatusCode(500)
            ->setJSON(['error' => 'Gagal menghubungi chatbot']);
    }
}
}
