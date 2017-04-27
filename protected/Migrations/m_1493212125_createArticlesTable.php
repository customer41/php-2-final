<?php

namespace App\Migrations;

use T4\Orm\Migration;

class m_1493212125_createArticlesTable
    extends Migration
{

    public function up()
    {
        $this->createTable('articles', [
            'title' => ['type' => 'string', 'length' => 1024],
            'content' => ['type' => 'text'],
            'published' => ['type' => 'datetime'],
        ]);
    }

    public function down()
    {
        $this->dropTable('articles');
    }
    
}