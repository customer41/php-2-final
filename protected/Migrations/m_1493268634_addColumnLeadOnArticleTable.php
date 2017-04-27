<?php

namespace App\Migrations;

use T4\Orm\Migration;

class m_1493268634_addColumnLeadOnArticleTable
    extends Migration
{

    public function up()
    {
        $this->addColumn('articles', [
            'lead' => ['type' => 'text'],
        ]);
    }

    public function down()
    {
        $this->dropColumn('articles', 'lead');
    }
    
}