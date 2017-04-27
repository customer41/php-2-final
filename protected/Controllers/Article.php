<?php

namespace App\Controllers;

use T4\Mvc\Controller;

class Article
    extends Controller
{

    public function actionAll()
    {
        $this->data->articles = \App\Models\Article::findAll(['order' => 'published desc']);
    }

    public function actionOne($id = 0)
    {
        $article = \App\Models\Article::findByPK($id);
        if (false == $article) {
            $this->redirect('/error/404/');
        }
        $this->data->article = $article;
        $this->data->errors = $this->app->flash->errors;
    }

}