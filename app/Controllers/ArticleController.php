<?php

namespace App\Controllers;

use App\Models\ArticleModel;
use App\Models\CategoryModel;

class ArticleController extends BaseController
{
    protected $articleModel;
    protected $categoryModel;

    public function __construct()
    {
        $this->articleModel  = new ArticleModel();
        $this->categoryModel = new CategoryModel();
    }

    /**
     * Display list of articles with categories for modal CRUD
     */
    public function index()
    {
        $data = [
            'articles'   => $this->articleModel->orderBy('created_at', 'DESC')->findAll(),
            'categories' => $this->categoryModel->findAll(),
        ];
        return view('admin/article/index', $data);
    }

    /**
     * Handle create and update from single modal form
     */
    public function store()
    {
        $post = $this->request->getPost();
        $slug = url_title($post['title'], '-', true);
        $data = [
            'title'       => $post['title'],
            'slug'        => $slug,
            'content'     => $post['content'],
            'category_id' => $post['category_id'],
            'user_id'     => session()->get('user_id'),
        ];

        if (!empty($post['id'])) {
            // update existing
            $this->articleModel->update($post['id'], $data);
            session()->setFlashdata('success', 'Artikel berhasil diperbarui.');
        } else {
            // insert new
            $this->articleModel->insert($data);
            session()->setFlashdata('success', 'Artikel berhasil ditambahkan.');
        }

        return redirect()->to('/admin/article');
    }

    /**
     * Delete article
     */
    public function delete($id)
    {
        $this->articleModel->delete($id);
        session()->setFlashdata('success', 'Artikel berhasil dihapus.');
        return redirect()->to('/admin/article');
    }

    /**
     * Show PDF import form
     */
    public function createFromPdf()
    {
        $data['categories'] = $this->categoryModel->findAll();
        return view('admin/article/upload_pdf', $data);
    }

    /**
     * Process PDF upload and insert article
     */
    public function storeFromPdf()
    {
        $pdfFile = $this->request->getFile('pdf');
        if ($pdfFile && $pdfFile->isValid() && !$pdfFile->hasMoved()) {
            $newName = $pdfFile->getRandomName();
            $pdfFile->move('uploads/pdf', $newName);

            $title = pathinfo($pdfFile->getClientName(), PATHINFO_FILENAME);

            $this->articleModel->insert([
                'title'       => $title,
                'slug'        => url_title($title, '-', true),
                'content'     => '[Konten diisi dari PDF]',
                'category_id' => $this->request->getPost('category_id'),
                'user_id'     => session()->get('user_id'),
                'pdf_file'    => $newName,
            ]);

            session()->setFlashdata('success', 'Artikel dari PDF berhasil dibuat.');
        } else {
            session()->setFlashdata('error', 'Gagal upload file PDF.');
        }

        return redirect()->to('/admin/article/upload-pdf');
    }
}
