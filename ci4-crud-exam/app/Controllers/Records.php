<?php

namespace App\Controllers;

use App\Models\RecordModel;

class Records extends BaseController
{
    protected $recordModel;

    public function __construct()
    {
        $this->recordModel = new RecordModel();
        helper(['form', 'url']);
    }

    // List all records
    public function index()
    {
        $data['records'] = $this->recordModel->findAll();
        return view('records/index', $data);
    }

    // Show create form
    public function create()
    {
        return view('records/create');
    }

    // Store new record
    public function store()
    {
        $rules = [
            'title'    => 'required|min_length[3]|max_length[200]',
            'status'   => 'required|in_list[active,inactive,pending]',
            'priority' => 'required|integer|greater_than[0]|less_than[6]',
        ];

        if (!$this->validate($rules)) {
            return view('records/create', [
                'validation' => $this->validator
            ]);
        }

        $data = [
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'category'    => $this->request->getPost('category'),
            'status'      => $this->request->getPost('status'),
            'priority'    => $this->request->getPost('priority'),
        ];

        $this->recordModel->insert($data);

        return redirect()->to('records')->with('success', 'Record created successfully!');
    }

    // Show single record
    public function show($id)
    {
        $data['record'] = $this->recordModel->find($id);
        
        if (!$data['record']) {
            return redirect()->to('records')->with('error', 'Record not found.');
        }
        
        return view('records/show', $data);
    }

    // Show edit form
    public function edit($id)
    {
        $data['record'] = $this->recordModel->find($id);
        
        if (!$data['record']) {
            return redirect()->to('records')->with('error', 'Record not found.');
        }
        
        return view('records/edit', $data);
    }

    // Update record
    public function update($id)
    {
        $rules = [
            'title'    => 'required|min_length[3]|max_length[200]',
            'status'   => 'required|in_list[active,inactive,pending]',
            'priority' => 'required|integer|greater_than[0]|less_than[6]',
        ];

        if (!$this->validate($rules)) {
            $data['record'] = $this->recordModel->find($id);
            $data['validation'] = $this->validator;
            return view('records/edit', $data);
        }

        $data = [
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'category'    => $this->request->getPost('category'),
            'status'      => $this->request->getPost('status'),
            'priority'    => $this->request->getPost('priority'),
        ];

        $this->recordModel->update($id, $data);

        return redirect()->to('records')->with('success', 'Record updated successfully!');
    }

    // Delete record (Hard delete - commented for soft delete option)
    public function delete($id)
    {
        // Hard delete
        $this->recordModel->delete($id);
        
        // For soft delete, you would use:
        // $this->recordModel->update($id, ['deleted_at' => date('Y-m-d H:i:s')]);
        
        return redirect()->to('records')->with('success', 'Record deleted successfully!');
    }
}