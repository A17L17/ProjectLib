<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\models\BorrowModel;
use App\models\BorrowerModel;
use App\models\BookModel;
use App\models\StaffModel;

class Borrow extends BaseController
{

    protected $borrowmodel;
    protected $borrowermodel;
    protected $bookmodel;
    protected $staffmodel;

    public function __construct()
    {
        $this->borrowmodel = new BorrowModel();
        $this->borrowermodel = new BorrowerModel();
        $this->bookmodel = new BookModel();
        $this->staffmodel = new StaffModel();
    }

    public function index()
    {
        if(!session('id'))
        {
            return redirect()->to(base_url())->with('error','anda harus login');
        }

        $data = array(
            'borrow' => $this->borrowmodel
                    ->select('borrow.id as id,borrower.name,book.title,staff.email,borrow.release_date,borrow.due_date,borrow.note')
                    ->join('borrower', 'borrow.id_borrower=borrower.id','left')
                    ->join('book', 'borrow.id_book=book.id','left')
                    ->join('staff', 'borrow.id_staff=staff.id','left')
                    ->findAll(),
        );

        return view('borrow/index', $data);
    }

    public function add()
    {
        if (!session('id')) {
            return redirect()->to(base_url())->with('error', 'Anda harus login');
        }

        $data = array(
            'borrower' => $this->borrowermodel->findAll(),
            'book' => $this->bookmodel->findAll(),
            'staff' => $this->staffmodel->findAll(),
        );

        return view('borrow/form', $data);
    }

    public function addpro()
    {
        if (!session('id')) {
            return redirect()->to(base_url())->with('error', 'Anda Harus Login');
        }

        $post = $this->request->getPost();

        if (!$this->validate([
            'id_borrower' => [
                'rules' => 'required',
                'errors' => ['required' => 'wajib diisi',],
            ],
            'id_book' => [
                'rules' => 'required',
                'errors' => ['required' => 'wajib diisi'],
            ],
            'id_staff' => [
                'rules' => 'required',
                'errors' => ['required' => 'wajib diisi'],
            ],
            'release_date' => [
                'rules' => 'required',
                'errors' => ['required' => 'wajib diisi'],
            ],
            'due_date' => [
                'rules' => 'required',
                'errors' => ['required' => 'wajib diisi'],
            ],
            'note' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'wajib diisi',
                    'alpha_numeric' => 'khusus angka',
                ],
            ],
        ])) {
            $validation = \config\Services::validation();
            session()->setFlashdata('validation', $validation->getErrors());
            return redirect()->to('borrow-add')->withInput();
        }

        $this->borrowmodel->save([
            'id_borrower' => $post['id_borrower'],
            'id_book' => $post['id_book'],
            'id_staff' => $post['id_staff'],
            'release_date' => $post['release_date'],
            'due_date' => $post['due_date'],
            'note' => $post['note'],
        ]);
        return redirect()->to('borrow')->with('info', 'data berhasil ditambah');
    }

    public function edit($id)
    {
        if (!session('id')) {
            return redirect()->to(base_url())->with('error', 'Anda harus login');
        }

        $data = array(
            'item'  => $this->borrowmodel->where(['id' => $id])->first(),
            'id'    => $id,
            'borrower' => $this->borrowermodel->findAll(),
            'book' => $this->bookmodel->findAll(),
            'staff' => $this->staffmodel->findAll(),
        );

        return view('borrow/form', $data);
    }

    public function editpro()
    {
        if (!session('id')) {
            return redirect()->to(base_url())->with('error', 'Anda Harus Login');
        }

        $post = $this->request->getPost();
        $datapost = $this->borrowmodel->where(['id' => $post['id']])->first();

        if ($post['id_borrower'] == $datapost['id_borrower']) {
            if (!$this->validate([
                'id_borrower' => [
                    'rules' => 'required',
                    'errors' => ['required' => 'wajib diisi'],
                ],
                'id_book' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'wajib diisi',
                        'alpha_numeric' => 'khusus angka',
                    ],
                ],
            ])) {
                $validation = \config\Services::validation();
                session()->setFlashdata('validation', $validation->getErrors());
                return redirect()->to('borrow-edit'/$post['id'])->withInput();
            }
            $this->borrowmodel->save([
                'id'    => $post['id'],
                'id_borrower' => $post['id_borrower'],
                'id_book' => $post['id_book'],
                'id_staff' => $post['id_staff'],
                'release_date' => $post['release_date'],
                'due_date' => $post['due_date'],
                'note' => $post['note'],
            ]);
            return redirect()->to('borrow')->with('info', 'data berhasil ditambah');
        } else {
            if (!$this->validate([
                'id_borrower' => [
                    'rules' => 'required',
                    'errors' => ['required' => 'wajib diisi',],
                ],
                'id_book' => [
                    'rules' => 'required',
                    'errors' => ['required' => 'wajib diisi'],
                ],
                'id_staff' => [
                    'rules' => 'required',
                    'errors' => ['required' => 'wajib diisi'],
                ],
                'release_date' => [
                    'rules' => 'required',
                    'errors' => ['required' => 'wajib diisi'],
                ],
                'due_date' => [
                    'rules' => 'required',
                    'errors' => ['required' => 'wajib diisi'],
                ],
                'note' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'wajib diisi',
                        'alpha_numeric' => 'khusus angka',
                    ],
                ],
            ])) {
                $validation = \config\Services::validation();
                session()->setFlashdata('validation', $validation->getErrors());
                return redirect()->to('borrow-edit'/$post['id'])->withInput();
            }
            $this->borrowmodel->save([
                'id'    => $post['id'],
                'id_borrower' => $post['id_borrower'],
                'id_book' => $post['id_book'],
                'id_staff' => $post['id_staff'],
                'release_date' => $post['release_date'],
                'due_date' => $post['due_date'],
                'note' => $post['note'],
            ]);
            return redirect()->to('borrow')->with('info', 'data berhasil ditambah');
        }
    }
    
    public function retbook($id)
    {
        if (!session('id')) {
            return redirect()->to(base_url())->with('error', 'Anda Harus Login');
        }

        $this->borrowmodel->save([
            'id'    =>$id,
            'note'  =>'Selesai Pinjam'
        ]);

        return redirect()->to('borrow');

    }

    public function del($id)
    {
        if (!session('id')) {
            return redirect()->to(base_url())->with('error', 'Anda Harus Login');
        }

        $delete = $this->borrowmodel->delete($id);
        if ($delete) {
            return redirect()->to('borrow');
        }
    }
}