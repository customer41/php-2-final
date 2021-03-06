<?php

namespace App\Controllers;

use App\Models\Article;
use T4\Mvc\Controller;

class Index
    extends Controller
{

    public function actionDefault()
    {
        $this->data->article = Article::find(['order' => 'published desc']);
    }

}