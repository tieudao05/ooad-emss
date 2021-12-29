<?php

namespace App\Model;

use App\Core\Cookie;
use App\Core\DatabaseFactory;
use PDO;

class NguoiDungModel
{

    public static function getOneByUserName($username)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $query = $database->prepare("SELECT * FROM nguoi_dung WHERE user_name = :username LIMIT 1");
        $query->execute([':username' => $username]);

        if ($row = $query->fetch()) {
            return $row;
        }
        return null;
    }
    public static function add($username,$password,$vaitro, $holot, $ten, $cmnd, $ngaysinh, $phai, $diachi, $email, $sdt)
    {
        $database = DatabaseFactory::getFactory()->getConnection();
        $data = [
            'thanhcong'=>false,
        ];
        $sql = "SELECT * FROM nguoi_dung WHERE user_name='".$username."'";
        $query = $database->prepare($sql);
        $query->execute();
        $count = $query->rowCount();
        if($count==1){
            $data['thanhcong'] = false;
            $data['error'] = "Số điện thoại đã được sử dụng";
            return $data;
        }
        $sql = "SELECT * FROM nguoi_dung WHERE cmnd='".$cmnd."'";
        $query = $database->prepare($sql);
        $query->execute();
        $count = $query->rowCount();
        if($count==1){
            $data['thanhcong'] = false;
            $data['error'] = "Bạn đã có tài khoản";
            return $data;
        }

        // Mã hóa password bằng thuật toán bcrypt
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        $sql_ = "INSERT INTO nguoi_dung (user_name, password, ma_vai_tro, ho_lot, ten, cmnd, ngay_sinh, phai, dia_chi, email, so_dien_thoai, trang_thai)
                VALUES ('".$username."','".$hashed_password."',".$vaitro.", '".$holot."', '".$ten."', '".$cmnd."', '".$ngaysinh."','".$phai."', '".$diachi."', '".$email."', '".$sdt."', 1)";
        $query = $database->prepare($sql_);
        //$query->execute([':user_name' => $username, ':hashed_password' => $hashed_password, ':role' => $vaitro, ':holot'=> $holot, ':ten'=> $ten, ':cmnd'=> $cmnd, ':ngay_sinh'=> $ngaysinh, ':phai'=> $phai, ':dia_chi'=>$diachi, ':email'=>$email, ':so_dien_thoai'=>$sdt]);
        $query->execute();
        $count = $query->rowCount();    
        if ($count == 1) {
            $data['thanhcong'] = true;
            $data['summary'] = "Thành công";
        }

        return $data;
    }
    public static function update()
    {
    }
    public static function delete()
    {
    }
    public static function getList()
    {
    }
}
