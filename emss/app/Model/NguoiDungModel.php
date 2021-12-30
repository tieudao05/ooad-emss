<?php

namespace App\Model;

use App\Core\Cookie;
use App\Core\DatabaseFactory;
use PDO;
use stdClass;

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
    public static function getOneByID($ma_nguoi_dung)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $query = $database->prepare("SELECT * FROM nguoi_dung WHERE ma_nguoi_dung = :mnd LIMIT 1");
        $query->execute([':mnd' => $ma_nguoi_dung]);

        if ($row = $query->fetch()) {
            return $row;
        }
        return null;
    }
    public static function add($username, $password, $vaitro, $holot, $ten, $cmnd, $ngaysinh, $phai, $diachi, $email, $sdt)
    {
        $database = DatabaseFactory::getFactory()->getConnection();
        $data = [
            'thanhcong' => false,
        ];
        $sql = "SELECT * FROM nguoi_dung WHERE user_name='" . $username . "'";
        $query = $database->prepare($sql);
        $query->execute();
        $count = $query->rowCount();
        if ($count == 1) {
            $data['thanhcong'] = false;
            $data['error'] = "Số điện thoại đã được sử dụng";
            return $data;
        }
        $sql = "SELECT * FROM nguoi_dung WHERE cmnd='" . $cmnd . "'";
        $query = $database->prepare($sql);
        $query->execute();
        $count = $query->rowCount();
        if ($count == 1) {
            $data['thanhcong'] = false;
            $data['error'] = "CMND đã tồn tại";
            return $data;
        }

        // Mã hóa password bằng thuật toán bcrypt
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        $sql_ = "INSERT INTO nguoi_dung (user_name, password, ma_vai_tro, ho_lot, ten, cmnd, ngay_sinh, phai, dia_chi, email, so_dien_thoai, trang_thai)
                VALUES ('" . $username . "','" . $hashed_password . "'," . $vaitro . ", '" . $holot . "', '" . $ten . "', '" . $cmnd . "', '" . $ngaysinh . "','" . $phai . "', '" . $diachi . "', '" . $email . "', '" . $sdt . "', 1)";
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
    public static function update($user_name, $role, $lastname, $firstname, $cmnd, $birthday, $sex, $address, $email, $phone_number)
    {
        $database = DatabaseFactory::getFactory()->getConnection();
        $query = $database->prepare("UPDATE nguoi_dung SET user_name='".$user_name."', ma_vai_tro=".$role.", ho_lot='".$lastname."', ten='".$firstname."', cmnd='".$cmnd."' , ngay_sinh='".$birthday."', phai='".$sex."', dia_chi='".$address."', email='".$email."', so_dien_thoai= '".$phone_number."' WHERE user_name='".$user_name."'");
        return $query->execute();
    }
    public static function delete($ma_nguoi_dung)
    {
        $database = DatabaseFactory::getFactory()->getConnection();
        $query = $database->prepare("UPDATE nguoi_dung SET trang_thai=0 WHERE ma_nguoi_dung='" . $ma_nguoi_dung . "'");
        return $query->execute();
    }
    public static function getList($current_page, $row_per_page)
    {
        $limit = $row_per_page;
        $offset = ($current_page - 1) * $row_per_page;
        $database = DatabaseFactory::getFactory()->getConnection();
        $sql = "SELECT * FROM nguoi_dung WHERE trang_thai = 1 ORDER BY ten LIMIT " . $offset . ", " . $limit;
        $query = $database->prepare($sql);
        $query->execute();
        $result = new stdClass;
        if ($data = $query->fetchAll(PDO::FETCH_ASSOC)) {
            $result = $data;
        }
        $sql_ = "SELECT COUNT(*) AS SL FROM nguoi_dung WHERE trang_thai =1";
        $query = $database->prepare($sql_);
        $query->execute();
        $totalRow = $query->fetch(PDO::FETCH_COLUMN);
        $response = [
            'totalPage' => ceil(intval($totalRow) / $row_per_page),
            'data' => $result
        ];
        return $response;
    }
}
