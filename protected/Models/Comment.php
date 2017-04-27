<?php

namespace App\Models;

use T4\Core\Exception;
use T4\Orm\Model;

/**
 * Class Comment
 * @package App\Models
 *
 * @property string $body
 * @property string $published
 * @property string $author
 * @property \App\Models\Article $article
 */
class Comment
    extends Model
{

    static protected $schema = [
        'columns' => [
            'body' => ['type' => 'text'],
            'published' => ['type' => 'datetime'],
            'author' => ['type' => 'string'],
        ],

        'relations' => [
            'article' => ['type' => self::BELONGS_TO, 'model' => Article::class],
        ],
    ];

    protected function validateBody($val)
    {
        if ('' == $val) {
            throw new Exception('Комментарий не может быть пустым');
        }
        return true;
    }

    protected function validateAuthor($val)
    {
        if ('' == $val) {
            throw new Exception('Отсутствует автор комментария');
        }
        return true;
    }

}