<?php

namespace App\Models\Blog\Services;

use App\Models\BaseService;
use App\Models\Blog\Model\BlogModel;

class BlogService extends  BaseService
{
    public $blogs;
    public function __construct()
    {
        parent::__construct();
        $blog = new BlogModel();
        $this->model = $blog;
    }


}
