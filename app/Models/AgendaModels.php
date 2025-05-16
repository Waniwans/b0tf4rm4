<?php

namespace App\Models;
use CodeIgniter\Model;

class AgendaModel extends Model
{
    protected $table = 'agenda';
    protected $primaryKey = 'id';
    protected $allowedFields = ['judul', 'isi', 'slug', 'tanggal'];
}
