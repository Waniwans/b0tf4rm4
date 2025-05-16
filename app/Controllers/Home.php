<?php

namespace App\Controllers;

use App\Models\ArticleModel;
use App\Models\CategoryModel;

class Home extends BaseController
{
    protected $articleModel;
    protected $categoryModel;

    public function __construct()
    {
        $this->articleModel = new ArticleModel();
        $this->categoryModel = new CategoryModel();
    }

    public function index()
    {
  
        helper('text');

        $data = [
            'title' => 'Beranda',
            'artikel_terbaru' => $this->articleModel
                ->orderBy('created_at', 'DESC')
                ->limit(3)
                ->findAll(),
            'kategori' => $this->categoryModel->findAll()
        ];

        return view('home', $data);
    }
}
