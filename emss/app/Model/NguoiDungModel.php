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

        // Mã hóa password bằng thuật toán bcrypt
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        $sql = "INSERT INTO nguoi_dung (user_name, password, ma_vai_tro, ho_lot, ten, cmnd, ngay_sinh, phai, dia_chi, email, so_dien_thoai, trang_thai)
                VALUES (:user_name, :hashed_password, :role, :holot, :ten, :cmnd, :ngay_sinh, :phai, :diachi, :email, :so_dien_thoai, 1)";
        
        $sql_ = "INSERT INTO nguoi_dung (user_name, password, ma_vai_tro, ho_lot, ten, cmnd, ngay_sinh, phai, dia_chi, email, so_dien_thoai, trang_thai)
                VALUES ('admin','".$hashed_password."',1, 'admin', 'admin', '0000', '2001-01-01', 'Nam', 'TPHCM', 'ef.tieudao@gmail.com', '012345', 1)";
        $query = $database->prepare($sql_);
       // $query->execute([':user_name' => $username, ':hashed_password' => $hashed_password, ':role' => $vaitro, ':holot'=> $holot, ':ten'=> $ten, ':cmnd'=> $cmnd, ':ngay_sinh'=> $ngaysinh, ':phai'=> $phai, ':dia_chi'=>$diachi, ':email'=>$email, ':so_dien_thoai'=>$sdt]);
       $query->execute();
        $count = $query->rowCount();
        if ($count == 1) {
            return true;
        }

        return false;
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
