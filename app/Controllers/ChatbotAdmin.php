<?php
namespace App\Controllers;
use App\Models\ChatbotModel;

class ChatbotAdmin extends BaseController
{
    protected $chatbotModel;

    public function __construct()
    {
        $this->chatbotModel = new ChatbotModel();
    }

    public function index()
    {
        $data['entries'] = $this->chatbotModel->orderBy('created_at','DESC')->findAll();
        return view('admin/chatbot/index', $data);
    }

    public function create()
    {
        return view('admin/chatbot/create');
    }

    public function store()
    {
        $this->chatbotModel->insert([
            'question'  => $this->request->getPost('question'),
            'answer'    => $this->request->getPost('answer'),
        ]);
        return redirect()->to('/admin/chatbot')->with('success','Entri chat berhasil dibuat.');
    }

    public function edit($id)
    {
        $data['entry'] = $this->chatbotModel->find($id);
        return view('admin/chatbot/edit', $data);
    }

    public function update($id)
    {
        $this->chatbotModel->update($id, [
            'question' => $this->request->getPost('question'),
            'answer'   => $this->request->getPost('answer'),
        ]);
        return redirect()->to('/admin/chatbot')->with('success','Entri chat berhasil diperbarui.');
    }

    public function delete($id)
    {
        $this->chatbotModel->delete($id);
        return redirect()->to('/admin/chatbot')->with('success','Entri chat berhasil dihapus.');
    }
}