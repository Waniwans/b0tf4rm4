<?php

namespace App\Controllers;

use App\Models\CategoryModel;

class CategoryController extends BaseController
{
    protected $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
    }

    public function index()
    {
        $categories = $this->categoryModel->findAll();
        return view('admin/category/index', compact('categories'));
    }

    public function create()
    {
        return view('admin/category/create');
    }

    public function store()
    {
        $data = $this->request->getPost();
        $data['slug'] = url_title($data['name'], '-', true);
        $this->categoryModel->insert($data);
        return redirect()->to('/admin/category')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $category = $this->categoryModel->find($id);
        return view('admin/category/edit', compact('category'));
    }

    public function update($id)
    {
        $data = $this->request->getPost();
        $data['slug'] = url_title($data['name'], '-', true);
        $this->categoryModel->update($id, $data);
        return redirect()->to('/admin/category')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function delete($id)
    {
        $this->categoryModel->delete($id);
        return redirect()->to('/admin/category')->with('success', 'Kategori berhasil dihapus.');
    }
}
