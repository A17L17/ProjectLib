<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\models\StaffModel;

class Staff extends BaseController
{

    protected $staffmodel;

    public function __construct()
    {
        $this->staffmodel = new StaffModel();
    }

    public function index()
    {
        if(!session('id'))
        {
            return redirect()->to(base_url())->with('error','anda harus login');
        }

        $data = array(
            'staff' => $this->staffmodel->findAll(),
        );

        return view('staff/index', $data);
    }

    public function add()
    {
        if(!session('id'))
        {
            return redirect()->to(base_url())->with('error','anda harus login');
        }

        return view('staff/form');
    }

    public function addpro()
    {
        if(!session('id'))
        {
            return redirect()->to(base_url())->with('error','Anda Harus Login');
        }

        $post = $this->request->getPost();

        if(!$this->validate([
            'name' => [
                'rules' => 'required',
                'errors' => ['required' => 'wajib diisi'],
            ],
            'email' => [
                'rules' => 'required|is_unique[staff.email]',
                'errors' => [
                    'required' => 'wajib diisi',
                    'is_unique' => 'email sudah terdaftar'
                ],
            ],
            'password' => [
                'rules' => 'required|alpha_numeric|min_length[6]',
                'errors' => [
                    'required' => 'wajib diisi',
                    'alpha_numeric' => 'khusus huruf dan angka',
                    'min_length' => 'minimal 6 karakter'
                ],
            ],            
        ])){
            $validation = \config\Services::validation();
            session()->setFlashdata('validation',$validation->getErrors());
            return redirect()->to('staff-add')->withInput();
        }

            $this->staffmodel->save([
                'name' => $post['name'],
                'email' => $post['email'],
                'password' => md5($post['password']),
            ]);
        return redirect()->to('staff')->with('info','data berhasil ditambah');

    }
}