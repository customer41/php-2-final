<?php

namespace App\Controllers;

use App\Models\Article;
use T4\Core\MultiException;
use T4\Mvc\Controller;

class AdminArticle
    extends Controller
{

    public function actionDefault()
    {
        $this->data->articles = Article::findAll(['order' => 'published desc']);
    }

    public function actionAdd()
    {
        $this->data->article = $this->app->flash->article;
        $this->data->errors = $this->app->flash->errors;
    }

    public function actionEdit($id = 0)
    {
        $article = Article::findByPK($id);
        if (false == $article) {
            $this->redirect('/error/404/');
        }
        $this->data->article = $this->app->flash->article ?? $article;
        $this->data->errors = $this->app->flash->errors;
    }

    public function actionSave($id = null, $post = null)
    {
        if (null == $post) {
            $this->redirect('/admin/article');
        }

        if (null == $id) {
            $article = new Article();
            $article->published = date('Y-m-d H:i:s');
        } else {
            $article = Article::findByPK($id);
            if (false == $article) {
                $this->redirect('/admin/article');
            }
        }

        try {
            $article->fill($post);
            $article->save();
            $this->redirect('/admin/article');
        } catch (MultiException $errors) {
            $this->app->flash->errors = $errors;
            $this->app->flash->article = $article;
            if ($article->isNew()) {
                $this->redirect('/admin/article/add');
            } else {
                $this->redirect('/admin/article/edit/' . $article->getPk());
            }
        }
    }

    public function actionDelete($id = 0)
    {
        $article = Article::findByPK($id);
        if (false == $article) {
            $this->redirect('/error/404/');
        }
        $article->delete();
        $this->redirect('/admin/article');
    }

}