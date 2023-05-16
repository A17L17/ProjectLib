<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\models\PublisherModel;

class Publisher extends BaseController
{

    protected $publishermodel;

    public function __construct()
    {
        $this->publishermodel = new PublisherModel();
    }

    public function index()
    {
        if(!session('id'))
        {
            return redirect()->to(base_url())->with('error','anda harus login');
        }

        $data = array(
            'publisher' => $this->publishermodel->findAll(),
        );

        return view('publisher/index', $data);
    }

    public function add()
    {
        if(!session('id'))
        {
            return redirect()->to(base_url())->with('error','anda harus login');
        }

        return view('publisher/form');
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
            'address' => [
                'rules' => 'required|is_unique[staff.email]',
                'errors' => [
                    'required' => 'wajib diisi',
                    'is_unique' => 'email sudah terdaftar'
                ],
            ],
            'contact' => [
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
            return redirect()->to('publisher-add')->withInput();
        }

            $this->publishermodel->save([
                'name' => $post['name'],
                'address' => $post['address'],
                'contact' => $post['contact'],
            ]);
        return redirect()->to('publisher')->with('info','data berhasil ditambah');

    }

    public function edit($id)
    {
        if(!session('id'))
        {
            return redirect()->to(base_url())->with('error', 'anda harus login');
        }

        $data = array(
            'item'  =>$this->publishermodel->where(['id' => $id])->first(),
            'id'    =>$id
        );

        return view('publisher/form', $data);
    }

    public function editpro()
    {
        if(!session('id'))
        {
            return redirect()->to(base_url())->with('error','Anda Harus Login');
        }

        $post = $this->request->getPost();
        $datapost = $this->publishermodel->where(['id' => $post['id']])->first();

        if($post['address'] == $datapost['address'])
        {
            if(!$this->validate([
                'name' => [
                    'rules' => 'required',
                    'errors' => ['required' => 'wajib diisi'],
                ],
                'contact' => [
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
                return redirect()->to('publisher-edit'/$post['id'])->withInput();
            }
            $this->publishermodel->save([
                'id'    => $post['id'],
                'name' => $post['name'],
                'contact' => $post['contact'],
            ]);
            return redirect()->to('publisher')->with('info','data berhasil ditambah');
    
        } else {
            if(!$this->validate([
                'name' => [
                    'rules' => 'required',
                    'errors' => ['required' => 'wajib diisi'],
                ],
                'address' => [
                    'rules' => 'required|is_unique[staff.email]',
                    'errors' => [
                        'required' => 'wajib diisi',
                        'is_unique' => 'email sudah terdaftar'
                    ],
                ],
                'contact' => [
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
                return redirect()->to('publisher-edit'/$post['id'])->withInput();
            }
            $this->publishermodel->save([
                'id'    => $post['id'],
                'name' => $post['name'],
                'address' => $post['address'],
                'contact' => $post['contact'],
            ]);
            return redirect()->to('publisher')->with('info','data berhasil ditambah');
        }       
    }

    public function del($id)
    {
        if(!session('id'))
        {
            return redirect()->to(base_url())->with('error','Anda Harus Login');
        }

        $delete = $this->publishermodel->delete($id);
        if($delete)
        {
            return redirect()->to('publisher');
        }

        
    }
    
}