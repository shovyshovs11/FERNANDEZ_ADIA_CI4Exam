<?php

namespace App\Models;

use CodeIgniter\Model;

class RecordModel extends Model
{
    protected $table            = 'records';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['title', 'description', 'category', 'status', 'priority', 'created_at', 'updated_at'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    
    protected $validationRules = [
        'title'       => 'required|min_length[3]|max_length[200]',
        'description' => 'permit_empty',
        'category'    => 'permit_empty|max_length[50]',
        'status'      => 'required|in_list[active,inactive,pending]',
        'priority'    => 'required|integer|greater_than[0]|less_than[6]',
    ];
    
    protected $validationMessages = [
        'title' => [
            'required'   => 'Title is required.',
            'min_length' => 'Title must be at least 3 characters.',
            'max_length' => 'Title cannot exceed 200 characters.'
        ],
        'status' => [
            'required' => 'Please select a status.',
            'in_list'  => 'Invalid status selected.'
        ],
        'priority' => [
            'required'     => 'Priority is required.',
            'integer'      => 'Priority must be a number.',
            'greater_than' => 'Priority must be at least 1.',
            'less_than'    => 'Priority must be 5 or less.'
        ]
    ];
}