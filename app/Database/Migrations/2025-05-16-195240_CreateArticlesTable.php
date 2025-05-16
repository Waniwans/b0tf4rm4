<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateArticlesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'         => ['type' => 'INT', 'auto_increment' => true],
            'title'      => ['type' => 'VARCHAR', 'constraint' => 200],
            'slug'       => ['type' => 'VARCHAR', 'constraint' => 200],
            'content'    => ['type' => 'TEXT'],
            'pdf_file'   => ['type' => 'VARCHAR', 'constraint' => 255],
            'category_id'=> ['type' => 'INT', 'null' => true],
            'user_id'    => ['type' => 'INT', 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'default' => 'CURRENT_TIMESTAMP'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('category_id', 'categories', 'id');
        $this->forge->addForeignKey('user_id', 'users', 'id');
        $this->forge->createTable('articles');
    }

    public function down()
    {
        $this->forge->dropTable('articles');
    }
}
