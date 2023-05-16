<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\models\BookModel;
use App\models\PublisherModel;
use App\models\CategoryModel;

class Book extends BaseController
{

    protected $bookmodel;
    protected $publishermodel;
    protected $categorymodel;

    public function __construct()
    {
        $this->bookmodel = new BookModel();
        $this->publishermodel = new PublisherModel();
        $this->categorymodel = new CategoryModel();
    }

    public function index()
    {
        if(!session('id'))
        {
            return redirect()->to(base_url())->with('error','anda harus login');
        }

        $data = array(
            'book' => $this->bookmodel
                    ->select('book.id as id,book.title,book.author,book.publisher_year,publisher.name,category.category,book.quantity')
                    ->join('publisher', 'book.id_publisher=publisher.id','left')
                    ->join('category', 'book.id_category=category.id','left')
                    ->findAll(),
        );

        return view('book/index', $data);
    }

    public function add()
    {
        if (!session('id')) {
            return redirect()->to(base_url())->with('error', 'Anda harus login');
        }

        $data = array(
            'publisher' => $this->publishermodel->findAll(),
            'category' => $this->categorymodel->findAll(),
        );

        return view('book/form', $data);
    }

    public function addpro()
    {
        if (!session('id')) {
            return redirect()->to(base_url())->with('error', 'Anda Harus Login');
        }

        $post = $this->request->getPost();

        if (!$this->validate([
            'title' => [
                'rules' => 'required',
                'errors' => ['required' => 'wajib diisi',],
            ],
            'author' => [
                'rules' => 'required',
                'errors' => ['required' => 'wajib diisi'],
            ],
            'publisher_year' => [
                'rules' => 'required',
                'errors' => ['required' => 'wajib diisi'],
            ],
            'id_publisher' => [
                'rules' => 'required',
                'errors' => ['required' => 'wajib diisi'],
            ],
            'id_category' => [
                'rules' => 'required',
                'errors' => ['required' => 'wajib diisi'],
            ],
            'quantity' => [
                'rules' => 'required|alpha_numeric',
                'errors' => [
                    'required' => 'wajib diisi',
                    'alpha_numeric' => 'khusus angka',
                ],
            ],
        ])) {
            $validation = \config\Services::validation();
            session()->setFlashdata('validation', $validation->getErrors());
            return redirect()->to('book-add')->withInput();
        }

        $this->bookmodel->save([
            'title' => $post['title'],
            'author' => $post['author'],
            'publisher_year' => $post['publisher_year'],
            'id_publisher' => $post['id_publisher'],
            'id_category' => $post['id_category'],
            'quantity' => $post['quantity'],
        ]);
        return redirect()->to('book')->with('info', 'data berhasil ditambah');
    }

    public function edit($id)
    {
        if (!session('id')) {
            return redirect()->to(base_url())->with('error', 'Anda harus login');
        }

        $data = array(
            'item'  => $this->bookmodel->where(['id' => $id])->first(),
            'id'    => $id,
            'publisher' => $this->publishermodel->findAll(),
            'category' => $this->categorymodel->findAll(),
        );

        return view('book/form', $data);
    }

    public function editpro()
    {
        if (!session('id')) {
            return redirect()->to(base_url())->with('error', 'Anda Harus Login');
        }

        $post = $this->request->getPost();
        $datapost = $this->bookmodel->where(['id' => $post['id']])->first();

        if ($post['title'] == $datapost['title']) {
            if (!$this->validate([
                'title' => [
                    'rules' => 'required',
                    'errors' => ['required' => 'wajib diisi'],
                ],
                'author' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'wajib diisi',
                        'alpha_numeric' => 'khusus angka',
                    ],
                ],
            ])) {
                $validation = \config\Services::validation();
                session()->setFlashdata('validation', $validation->getErrors());
                return redirect()->to('book-edit'/$post['id'])->withInput();
            }
            $this->bookmodel->save([
                'id'    => $post['id'],
                'title' => $post['title'],
                'author' => $post['author'],
                'publisher_year' => $post['publisher_year'],
                'id_publisher' => $post['id_publisher'],
                'id_category' => $post['id_category'],
                'quantity' => $post['quantity'],
            ]);
            return redirect()->to('book')->with('info', 'data berhasil ditambah');
        } else {
            if (!$this->validate([
                'title' => [
                    'rules' => 'required',
                    'errors' => ['required' => 'wajib diisi'],
                ],
                'author' => [
                    'rules' => 'required',
                    'errors' => ['required' => 'wajib diisi'],
                ],
                'publisher_year' => [
                    'rules' => 'required',
                    'errors' => ['required' => 'wajib diisi'],
                ],
                'id_publisher' => [
                    'rules' => 'required',
                    'errors' => ['required' => 'wajib diisi'],
                ],
                'id_category' => [
                    'rules' => 'required|alpha_numeric',
                    'errors' => [
                        'required' => 'wajib diisi',
                        'alpha_numeric' => 'khusus angka',
                    ],
                ],
                'quantity' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'wajib diisi',
                        'is_unique' => 'email sudah terdaftar'
                    ],
                ],
            ])) {
                $validation = \config\Services::validation();
                session()->setFlashdata('validation', $validation->getErrors());
                return redirect()->to('book-edit'/$post['id'])->withInput();
            }
            $this->bookmodel->save([
                'title' => $post['title'],
                'author' => $post['author'],
                'publisher_year' => $post['publisher_year'],
                'id_publisher' => $post['id_publisher'],
                'id_category' => $post['id_category'],
                'quantity' => $post['quantity'],
            ]);
            return redirect()->to('book')->with('info', 'data berhasil ditambah');
        }
    }

    public function del($id)
    {
        if (!session('id')) {
            return redirect()->to(base_url())->with('error', 'Anda Harus Login');
        }

        $delete = $this->bookmodel->delete($id);
        if ($delete) {
            return redirect()->to('book');
        }
    }
}