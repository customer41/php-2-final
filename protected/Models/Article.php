<?php

namespace App\Models;

use T4\Core\Exception;
use T4\Orm\Model;

/**
 * Class AdminArticle
 * @package App\Models
 *
 * @property string $title
 * @property string $lead
 * @property string $content
 * @property string $published
 *
 */
class Article
    extends Model
{

    protected static $schema = [
        'table' => 'articles',
        'columns' => [
            'title' => ['type' => 'string'],
            'lead' => ['type' => 'text'],
            'content' => ['type' => 'text'],
            'published' => ['type' => 'datetime'],
        ],

        'relations' => [
            'comments' => ['type' => self::HAS_MANY, 'model' => Comment::class],
        ],
    ];

    protected function validateTitle($val)
    {
        if ('' == $val) {
            throw new Exception('Заголовок не может быть пустым');
        }
        return true;
    }

    protected function validateLead($val)
    {
        if ('' == $val) {
            throw new Exception('Введение не может быть пустым');
        }
        return true;
    }

    protected function validateContent($val)
    {
        if ('' == $val) {
            throw new Exception('Содержимое не может быть пустым');
        }
        return true;
    }

}