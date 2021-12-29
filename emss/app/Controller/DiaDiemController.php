<?php

namespace App\Controller;

use App\Core\Auth;
use App\Core\Controller;

use App\Core\Request;
use App\Model\DiaDiemModel;

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
    public function getAddress(){
        Auth::checkAuthentication();
        //Auth::ktraquyen("CN02");
        $search = Request::get('search');
        $search2 = Request::get('search2');
        $page = Request::get('page');
        $rowsPerPage = Request::get('rowsPerPage');
        $data = DiaDiemModel::getAllPagination($search, $search2, $page, $rowsPerPage);
        $this->View->renderJSON($data);
    }
    public function update()
    {
    }
    public function delete()
    {
    }
}