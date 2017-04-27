<?php

namespace App\Migrations;

use T4\Orm\Migration;

class m_1493304149_createCommentsTable
    extends Migration
{

    public function up()
    {
        $this->createTable('comments', [
            'body' => ['type' => 'text'],
            'published' => ['type' => 'datetime'],
            '__article_id' => ['type' => 'link'],
        ]);
    }

    public function down()
    {
        $this->dropTable('comments');
    }
    
}