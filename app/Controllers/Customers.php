<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class Customers extends BaseController
{
    public function index(): string
    {
        $customerModel = new CustomerModel();

        return view('customers/index', [
            'title' => 'Customer Accounts',
            'customers' => $customerModel->orderBy('full_name', 'ASC')->findAll(),
        ]);
    }

    public function create()
    {
        $data = ['title' => 'New Customer', 'customer' => null];

        if ($this->request->getMethod() === 'POST') {
            $rules = [
                'full_name' => 'required|max_length[100]',
                'email' => 'required|valid_email|max_length[100]',
                'phone' => 'permit_empty|max_length[20]',
            ];

            if ($this->validate($rules)) {
                (new CustomerModel())->insert([
                    'full_name' => trim((string) $this->request->getPost('full_name')),
                    'email' => trim((string) $this->request->getPost('email')),
                    'phone' => trim((string) $this->request->getPost('phone')) ?: null,
                    'created_at' => date('Y-m-d H:i:s'),
                ]);

                return redirect()->to('/customers')->with('message', 'Customer created successfully.');
            }
        }

        return view('customers/form', $data);
    }

    public function edit(int $id)
    {
        $model = new CustomerModel();
        $customer = $model->find($id);

        if ($customer === null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Customer not found.');
        }

        if ($this->request->getMethod() === 'POST') {
            $rules = [
                'full_name' => 'required|max_length[100]',
                'email' => 'required|valid_email|max_length[100]',
                'phone' => 'permit_empty|max_length[20]',
            ];

            if ($this->validate($rules)) {
                $model->update($id, [
                    'full_name' => trim((string) $this->request->getPost('full_name')),
                    'email' => trim((string) $this->request->getPost('email')),
                    'phone' => trim((string) $this->request->getPost('phone')) ?: null,
                ]);

                return redirect()->to('/customers')->with('message', 'Customer updated successfully.');
            }
        }

        return view('customers/form', ['title' => 'Edit Customer', 'customer' => $customer]);
    }
}
