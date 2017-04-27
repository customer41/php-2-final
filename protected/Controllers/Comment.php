<?php

namespace App\Controllers;

use App\Models\Article;
use T4\Core\MultiException;
use T4\Mvc\Controller;

class Comment
    extends Controller
{

    public function actionAll($article_id = 0)
    {
        $this->data->comments = \App\Models\Comment::findAll([
            'where' => '__article_id=' . $article_id,
            'order' => 'published desc',
        ]);
    }

    public function actionAdd($article_id = 0)
    {
        $this->data->article_id= $article_id;
    }

    public function actionSave($article_id = 0, $comment = null)
    {
        try {
            $item = new \App\Models\Comment();
            $item->fill($comment);
            $item->published = date('Y-m-d H:i:s');
            $item->article = Article::findByPK($article_id);
            $item->save();
            $this->redirect('/article/one/?id=' . $article_id);
        } catch (MultiException $errors) {
            $this->app->flash->errors = $errors;
            $this->redirect('/article/one/?id=' . $article_id);
        }
    }

}