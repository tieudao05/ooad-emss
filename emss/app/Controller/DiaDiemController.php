<?php

namespace App\Controller;

use App\Core\Auth;
use App\Core\Controller;

class DiaDiemController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        Auth::checkAuthentication();
        $this->View->render('diadiem/index');
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

