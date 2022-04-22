<?php

namespace App\Controller;

use App\Core\Auth;
use App\Core\Controller;
use App\Core\Cookie;
use App\Core\Redirect;
use App\Core\Request;
use App\Model\NguoiDungModel;
use App\Model\UserModel;

class AuthController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login()
    {
        Auth::checkNotAuthentication();
        return $this->View->render('auth/login');
    }

    public function checkLogin(){
        $reponse = [
            'thanhcong' => Auth::checkLogin()
        ];
        return $this->View->renderJSON($reponse);
    }

    public function loginPost()
    {
        Auth::checkNotAuthentication();
        $user_name = Request::post('user_name');
        $password = Request::post('password');
       // $user_name = 'admin';
        $result = [
            'thanhcong' => true,
        ];
        // Kiểm tra email có tồn tại không
        $user = NguoiDungModel::getOneByUserName($user_name);
        if (!$user) {
            $result['thanhcong'] = false;
            $result['summary'] = 'Tên đăng nhập hoặc mật khẩu không chính xác';
            return $this->View->renderJSON($result);
        } else if($user->trang_thai == 0){
            $result['thanhcong'] = false;
            $result['summary'] = 'Tài khoản đã bị khóa';
        }

        // Kiểm tra password
        $isValid = password_verify($password, $user->password);
        if (!$isValid) {
            $result['thanhcong'] = false;
            $result['summary'] = 'Tên đăng nhập hoặc mật khẩu không chính xác';
            return $this->View->renderJSON($result);
        }

        Cookie::set('user_id', $user->ma_nguoi_dung);
        Cookie::set('user_fullname', $user->ten);
        Cookie::set('user_email', $user->user_name);
        Cookie::set('user_quyen',$user->ma_vai_tro);
        Cookie::set('user_logged_in', true);
        // can set them nhung cái cần
        return $this->View->renderJSON($result);
    }

    public function register()
    {
        Auth::checkNotAuthentication();
        return $this->View->render('auth/register');
    }

    public function registerPost()
    {
        Auth::checkNotAuthentication(); 
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
        $address = $province."-".$district."-".$ward."-".$home."-".$village;
        $result = NguoiDungModel::add($phone_number,$password,6,$lastname,$firstname,$cmnd,$birthday,$sex,$address,$email,$phone_number);
        return $this->View->renderJSON($result);
    }

    public function logout()
    {
        // Đã đăng nhập thì mới đăng xuất
        Auth::checkAuthentication();
        Cookie::destroy();
        Redirect::home();
    }
}
