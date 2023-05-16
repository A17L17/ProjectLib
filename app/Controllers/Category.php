<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\models\CategoryModel;

class Category extends BaseController
{

    protected $categorymodel;

    public function __construct()
    {
        $this->categorymodel = new CategoryModel();
    }

    public function index()
    {
        if(!session('id'))
        {
            return redirect()->to(base_url())->with('error','anda harus login');
        }

        $data = array(
            'category' => $this->categorymodel->findAll(),
        );

        return view('category/index', $data);
    }

    public function add()
    {
        if(!session('id'))
        {
            return redirect()->to(base_url())->with('error','anda harus login');
        }

        return view('category/form');
    }

    public function addpro()
    {
        if(!session('id'))
        {
            return redirect()->to(base_url())->with('error','Anda Harus Login');
        }

        $post = $this->request->getPost();

        if(!$this->validate([
            'category' => [
                'rules' => 'required',
                'errors' => ['required' => 'wajib diisi'],
            ]
        ])){
            $validation = \config\Services::validation();
            session()->setFlashdata('validation',$validation->getErrors());
            return redirect()->to('category-add')->withInput();
        }

            $this->categorymodel->save([
                'category' => $post['category'],
            ]);
        return redirect()->to('category')->with('info','data berhasil ditambah');

    }

    public function edit($id)
    {
        if(!session('id'))
        {
            return redirect()->to(base_url())->with('error', 'anda harus login');
        }

        $data = array(
            'item'  =>$this->categorymodel->where(['id' => $id])->first(),
            'id'    =>$id
        );

        return view('category/form', $data);
    }

    public function editpro()
    {
        if(!session('id'))
        {
            return redirect()->to(base_url())->with('error','Anda Harus Login');
        }

        $post = $this->request->getPost();
        $datapost = $this->categorymodel->where(['id' => $post['id']])->first();

        if($post['category'] == $datapost['category'])
        {
            if(!$this->validate([
                'category' => [
                    'rules' => 'required',
                    'errors' => ['required' => 'wajib diisi'],
                ]    
            ])){
                $validation = \config\Services::validation();
                session()->setFlashdata('validation',$validation->getErrors());
                return redirect()->to('category-edit'/$post['id'])->withInput();
            }
            $this->categorymodel->save([
                'id'    => $post['id'],
                'category' => $post['category'],
            ]);
            return redirect()->to('category')->with('info','data berhasil ditambah');
    
        } else {
            if(!$this->validate([
                'category' => [
                    'rules' => 'required',
                    'errors' => ['required' => 'wajib diisi'],
                ],      
            ])){
                $validation = \config\Services::validation();
                session()->setFlashdata('validation',$validation->getErrors());
                return redirect()->to('category-edit'/$post['id'])->withInput();
            }
            $this->categorymodel->save([
                'id'    => $post['id'],
                'category' => $post['category'],
            ]);
            return redirect()->to('category')->with('info','data berhasil ditambah');
        }       
    }

    public function del($id)
    {
        if(!session('id'))
        {
            return redirect()->to(base_url())->with('error','Anda Harus Login');
        }

        $delete = $this->categorymodel->delete($id);
        if($delete)
        {
            return redirect()->to('category');
        }

        
    }
    
}