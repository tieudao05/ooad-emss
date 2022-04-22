<?php

namespace App\Model;

use App\Core\Cookie;
use App\Core\DatabaseFactory;
use PDO;
use stdClass;

class BenhNhanModel
{

    public static function getList($current_page, $row_per_page)
    {
        $limit = $row_per_page;
        $offset = ($current_page - 1) * $row_per_page;
        $database = DatabaseFactory::getFactory()->getConnection();
        $sql = "SELECT * FROM benh_nhan WHERE trang_thai = 1 LIMIT " . $offset . ", " . $limit;
        $query = $database->prepare($sql);
        $query->execute();
        $result = new stdClass;
        if ($data = $query->fetchAll(PDO::FETCH_ASSOC)) {
            $result = $data;
        }
        $sql_ = "SELECT COUNT(*) AS SL FROM thong_tin_truy_vet WHERE trang_thai =1";
        $query = $database->prepare($sql_);
        $query->execute();
        $totalRow = $query->fetch(PDO::FETCH_COLUMN);
        $response = [
            'totalPage' => ceil(intval($totalRow) / $row_per_page),
            'data' => $result
        ];
        return $response;
    }
    public static function getAll()
    {
        $database = DatabaseFactory::getFactory()->getConnection();
        $sql = "SELECT ma_benh_nhan, ma_benh_vien, ho_lot, ten FROM benh_nhan, nguoi_dung WHERE nguoi_dung.ma_nguoi_dung = benh_nhan.ma_benh_nhan";
        $query = $database->prepare($sql);
        $query->execute();  
        if ($data = $query->fetchAll(PDO::FETCH_ASSOC)) {
            return $data;
        }
        return null;
    }
    
}
