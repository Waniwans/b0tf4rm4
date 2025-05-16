<?php

namespace App\Models;

use CodeIgniter\Model;

class ArticleModel extends Model
{
    protected $table      = 'articles';
    protected $primaryKey = 'id';

    // Sesuaikan field yang boleh diisi
    protected $allowedFields = [
        'title',
        'slug',
        'content',
        'category_id',
        'user_id',
        'pdf_file',
        'thumbnail',
        'created_at'
    ];

    // Aktifkan timestamp otomatis (jika ingin CI otomatis isi created_at)
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = ''; // Kosongkan jika tidak pakai updated_at
}
