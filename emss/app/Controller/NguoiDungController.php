<?php

namespace App\Controller;

use App\Core\Auth;
use App\Core\Controller;
use App\Core\Request;
use App\Model\NguoiDungModel;

class NguoiDungController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        Auth::checkAuthentication();
        $this->View->render('nguoidung/index');
    }
    public function getOneByID()
    {
    }
    public function add()
    {
        $data = NguoiDungModel::add('admin','12345678',1,'admin','admin','0','2001-01-01','Nam','TPHCM','ef.tieudao@gmail.com','08624');   
        $this->View->render($data);
    }
    public function getList()
    {
    }
    public function update()
    {
    }
    public function delete()
    {
    }
}
