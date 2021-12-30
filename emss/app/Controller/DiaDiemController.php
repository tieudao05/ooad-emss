<?php

namespace App\Controller;

use App\Core\Auth;
use App\Core\Controller;

use App\Core\Request;
use App\Model\DiaDiemModel;

class DiaDiemController extends Controller
{
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        Auth::checkAuthentication();
        $this->View->render('diadiem/index');
    }
    
    public function getOneByID(){
        Auth::checkAuthentication();
        $id = Request::post('id');
        $kq = DiaDiemModel::getOneByID($id);
        $response = ['thanhcong' => false];
        if ($kq == null) {
            $response['thanhcong'] = false;
        } else {
            $response['ma_dia_diem'] = $kq->ma_dia_diem;
            $response['ten_dia_diem'] = $kq->ten_dia_diem;
            $response['tp_tinh'] = $kq->tp_tinh;
            $response['quan_huyen'] = $kq->quan_huyen;
            $response['phuong_xa'] = $kq->phuong_xa;
            $response['ap_thon'] = $kq->ap_thon;
            $response['so_nha'] = $kq->so_nha;
            $response['phan_loai'] = $kq->phan_loai;
            $response['suc_chua'] = $kq->suc_chua;
            $response['so_luong_trong'] = $kq->so_luong_trong;
            $response['thanhcong'] = true;
        }
        $this->View->renderJSON($response);
    }
    
    public function add(){
        Auth::checkAuthentication();
        //Auth::ktraquyen("CN02");
        $ten = Request::post('addten');
        $tinh = Request::post('addtinh');
        $huyen = Request::post('addhuyen');
        $xa = Request::post('addxa');
        $thon = Request::post('addthon');
        $sonha = Request::post('addsonha');
        $loai = Request::post('addloai');
        $succhua = Request::post('addsucchua');
        $trong = Request::post('addtrong');
        $kq = DiaDiemModel::create($ten, $tinh, $huyen , $xa, $thon, $sonha, $loai, $succhua, $trong);
        $response = [
            'thanhcong' => $kq
        ];
        $this->View->renderJSON($response);
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
    
    public function update(){
        Auth::checkAuthentication();
        //Auth::ktraquyen("CN02");
        $ma = Request::post('upma');
        $ten = Request::post('upten');
        $tinh = Request::post('uptinh');
        $huyen = Request::post('uphuyen');
        $xa = Request::post('upxa');
        $thon = Request::post('upthon');
        $sonha = Request::post('upsonha');
        $loai = Request::post('uploai');
        $succhua = Request::post('upsucchua');
        $trong = Request::post('uptrong');
        $kq = DiaDiemModel::update($ma,$ten, $tinh, $huyen , $xa, $thon, $sonha, $loai, $succhua, $trong);
        $response = [
            'thanhcong' => $kq
        ];
        $this->View->renderJSON($response);
    }
    
    public function delete(){
        Auth::checkAuthentication();
       // Auth::ktraquyen("CN02");
        $id = Request::post('id');
        $kq= DiaDiemModel::delete($id);
        $response = [
            'thanhcong' => $kq
        ];
        $this->View->renderJSON($response);  
    }

    public function deletes(){
        Auth::checkAuthentication();       
        //Auth::ktraquyen("CN02");
        $ids = Request::post('ids');
        $ids = json_decode($ids);
        $kq = DiaDiemModel::deletes($ids);
        $response = [
            'thanhcong' => $kq
        ];
        $this->View->renderJSON($response);       
    }
}