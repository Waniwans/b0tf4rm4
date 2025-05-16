<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateChatbotQnaTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'         => ['type' => 'INT', 'auto_increment' => true],
            'question'   => ['type' => 'TEXT'],
            'answer'     => ['type' => 'TEXT'],
            'created_at' => ['type' => 'DATETIME', 'default' => 'CURRENT_TIMESTAMP'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('chatbot_qna');
    }

    public function down()
    {
        $this->forge->dropTable('chatbot_qna');
    }
}
