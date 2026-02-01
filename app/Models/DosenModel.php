<?php

namespace App\Models;

use CodeIgniter\Model;

class DosenModel extends Model
{
    protected $table            = 'dosen';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['nidn', 'nama', 'gelar', 'mata_kuliah'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}