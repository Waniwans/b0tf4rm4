<?php
namespace App\Models;

use CodeIgniter\Model;

class ChatbotModel extends Model
{
    protected $table = 'chatbot_qna';
    protected $allowedFields = ['question', 'answer'];

    public function getAnswer($userQuestion)
    {
        return $this->like('question', $userQuestion)
                    ->first(); // ambil pertanyaan yang paling mirip
    }
}
