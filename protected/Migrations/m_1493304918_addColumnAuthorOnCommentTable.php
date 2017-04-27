<?php

namespace App\Migrations;

use T4\Orm\Migration;

class m_1493304918_addColumnAuthorOnCommentTable
    extends Migration
{

    public function up()
    {
        $this->addColumn('comments', [
            'author' => ['type' => 'string'],
        ]);
    }

    public function down()
    {
        $this->dropColumn('comments', 'author');
    }
    
}