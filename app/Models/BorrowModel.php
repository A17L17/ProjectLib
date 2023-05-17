<?php

namespace app\models;

use CodeIgniter\Model;

class BorrowModel extends Model
{
    protected $table      = 'borrow';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['id_borrower', 'id_book', 'id_staff', 'release_date', 'due_date', 'note'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

}