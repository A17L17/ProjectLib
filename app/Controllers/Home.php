<?php

namespace App\Controllers;
use App\models\StaffModel;
use App\models\BorrowerModel;
use App\models\BookModel;
use App\models\PublisherModel;
use App\models\Categorymodel;
use App\models\Borrowmodel;

class Home extends BaseController
{

    protected $staffmodel;
    protected $borrowermodel;
    protected $bookmodel;
    protected $publishermodel;
    protected $categorymodel;
    protected $borrowmodel;

    public function __construct()
    {
        $this->staffmodel = new StaffModel();
        $this->borrowermodel = new BorrowerModel();
        $this->bookmodel = new BookModel();
        $this->publishermodel = new PublisherModel();
        $this->categorymodel = new CategoryModel();
        $this->borrowmodel = new BorrowModel();
    }


    public function index()
    {
        if(session('id'))
        {
            return redirect()->to(base_url('home'));
        }
        
        return view('login');
    }
    
    public function home()
    {
        if(!session('id'))
        {
            return redirect()->to(base_url())->with('error', 'lu jangan maksa');
        }


        $data = array(
            'qstaff'    => $this->staffmodel->countAllResults(),
            'qborrower'    => $this->borrowermodel->countAllResults(),
            'qbook'    => $this->bookmodel->countAllResults(),
            'qpublisher'    => $this->publishermodel->countAllResults(),
            'qcategory'    => $this->categorymodel->countAllResults(),
            'qborrow'    => $this->borrowmodel->countAllResults(),
        );

        return view('home', $data);
        
    }
}
