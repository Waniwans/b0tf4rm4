<?php

namespace App\Controllers;
use App\Models\ArticleModel;
use App\Models\CategoryModel;

class Article extends BaseController
{
    protected $art, $cat;
    public function __construct()
    {
        $this->art = new ArticleModel();
        $this->cat = new CategoryModel();
    }

    public function index()
    {
        $data['articles'] = $this->art
            ->select('articles.*, categories.name as category')
            ->join('categories','categories.id=articles.category_id','left')
            ->orderBy('created_at','DESC')
            ->findAll();
        return view('article/index', $data);
    }
    public function create()
    {
        $data['categories'] = $this->cat->findAll();
        return view('article/create', $data);
    }
    public function store()
    {
        $this->art->save([
            'title'       => $this->request->getPost('title'),
            'slug'        => url_title($this->request->getPost('title'),'-',true),
            'content'     => $this->request->getPost('content'),
            'category_id' => $this->request->getPost('category_id'),
            'user_id'     => session()->get('user_id')
        ]);
        return redirect()->to('/article');
    }
    public function edit($id)
    {
        $data['article'] = $this->art->find($id);
        $data['categories'] = $this->cat->findAll();
        return view('article/edit', $data);
    }
    public function update($id)
    {
        $this->art->update($id, [
            'title'       => $this->request->getPost('title'),
            'slug'        => url_title($this->request->getPost('title'),'-',true),
            'content'     => $this->request->getPost('content'),
            'category_id' => $this->request->getPost('category_id')
        ]);
        return redirect()->to('/article');
    }
    public function delete($id)
    {
        $this->art->delete($id);
        return redirect()->to('/article');
    }
}

