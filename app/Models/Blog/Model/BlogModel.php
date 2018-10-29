<?php

namespace App\Models\Blog\Model;

use Illuminate\Database\Eloquent\Model;

class BlogModel extends Model
{
    protected $table = 'blogs';

    public $timestamps = true;

    /**
     * 模型日期咧的存储格式
     * @var string
     */
    protected $dateFormat = 'U';
}
