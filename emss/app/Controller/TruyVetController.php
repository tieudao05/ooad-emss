<?php

namespace App\Controller;

use App\Core\Auth;
use App\Core\Controller;
use App\Core\Request;

class TruyVetController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        Auth::checkAuthentication();
        $this->View->render('truyvet/index');
    }
    public function getOneByID()
    {
    }
    public function add()
    {
    }
    public function getList()
    {
        Auth::checkAuthentication();
        $current_page = Request::get('current_page');
        $row_per_page = Request::get('row_per_page');
        
    }
    public function update()
    {
    }
    public function delete()
    {
    }
}
