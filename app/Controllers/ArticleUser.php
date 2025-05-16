<?php

namespace App\Controllers;

use App\Models\ArticleModel;

class ArticleUser extends BaseController
{
    protected $articleModel;

    public function __construct()
    {
        $this->articleModel = new ArticleModel();
    }

    /**
     * Tampilkan daftar artikel (semua user)
     */
    public function index()
    {
        $data['articles'] = $this->articleModel
            ->select('id, title, slug, created_at')
            ->orderBy('created_at', 'DESC')
            ->findAll();

        return view('article/index', $data);
    }

    /**
     * Tampilkan detail artikel berdasarkan slug
     */
    public function detail($slug)
{
    $article = $this->articleModel->where('slug', $slug)->first();
    if (! $article) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Artikel tidak ditemukan: ' . $slug);
    }

    // Ambil 5 artikel terbaru selain yang sedang ditampilkan
    $latest = $this->articleModel
        ->select('title, slug, created_at')
        ->where('slug !=', $slug)
        ->orderBy('created_at', 'DESC')
        ->limit(5)
        ->findAll();

    return view('article/detail', [
        'article' => $article,
        'latest'  => $latest,
    ]);
}


}
