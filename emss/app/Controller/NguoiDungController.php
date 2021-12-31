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
        Auth::checkAuthentication();
        $ma_nguoi_dung = Request::post('ma_nguoi_dung');
        $data = NguoiDungModel::getOneByID($ma_nguoi_dung);
        return $this->View->renderJSON($data);
    }
    public function add()
    {
        Auth::checkAuthentication();
        $lastname = Request::post('lastname');
        $firstname = Request::post('firstname');
        $cmnd = Request::post('cmnd');
        $birthday = Request::post('birthday');
        $sex = Request::post('sex');
        $phone_number = Request::post('phone_number');
        $province = Request::post('province');
        $district = Request::post('district');
        $ward = Request::post('ward');
        $village = Request::post('village');
        $home = Request::post('home');
        $email = Request::post('email');
        $password = Request::post('password');
        $address = $province . "-" . $district . "-" . $ward . "-" . $home . "-" . $village;
        $role = Request::post('role');
        $result = NguoiDungModel::add($phone_number, $password, $role, $lastname, $firstname, $cmnd, $birthday, $sex, $address, $email, $phone_number);
        return $this->View->renderJSON($result);
    }
    public function getList()
    {
        Auth::checkAuthentication();
        $current_page = Request::get('current_page');
        $row_per_page = Request::get('row_per_page');
        $data = NguoiDungModel::getList($current_page, $row_per_page);
        $this->View->renderJSON($data);
    }
    public function update()
    {
        Auth::checkAuthentication();
        $lastname = Request::post('lastname');
        $firstname = Request::post('firstname');
        $cmnd = Request::post('cmnd');
        $birthday = Request::post('birthday');
        $sex = Request::post('sex');
        $phone_number = Request::post('phone_number');
        $province = Request::post('province');
        $district = Request::post('district');
        $ward = Request::post('ward');
        $village = Request::post('village');
        $home = Request::post('home');
        $email = Request::post('email');
        $address = $province . "-" . $district . "-" . $ward . "-" . $home . "-" . $village;
        $role = Request::post('role');
        $data = NguoiDungModel::update($phone_number, $role, $lastname, $firstname, $cmnd, $birthday, $sex, $address, $email, $phone_number);
        $this->View->renderJSON($data);
    }
    public function delete()
    {
        Auth::checkAuthentication();
        $list = Request::post('list_user');
        $list_user = explode('-', $list);
        foreach ($list_user as $value) {
            $data = NguoiDungModel::delete($value);
            if ($data = false) $this->View->renderJSON($data);
        }
        $this->View->renderJSON($data);
    }
    public function getAll()
    {
        Auth::checkAuthentication();
        $data = NguoiDungModel::getAll();
        foreach ($data as $value) {
            $data["ma_" . $value['ma_nguoi_dung']] = $value;
        }
        return $this->View->renderJSON($data);
    }
}
