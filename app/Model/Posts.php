<?php

namespace App\Model;

use App\Helpers\Parser;
use Moloquent\Eloquent\Model;

class Posts extends Model
{
    protected $table = 'posts';

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
    }

    public function setHtmlContentAttribute($value)
    {
        $parser = new Parser;
        $this->attributes['html_content'] = $parser->makeHtml($value);
    }





}
