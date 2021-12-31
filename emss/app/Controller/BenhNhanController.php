<?php

namespace App\Controller;

use App\Core\Auth;
use App\Core\Controller;

class BenhNhanController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        Auth::checkAuthentication();
    }

    //Dieuhuongden benhnhan/index
    public function index()
    {
        $this->View->render('benhnhan/index');
    }

    public function getOneByID()
    {
    }
    public function add()
    {
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
