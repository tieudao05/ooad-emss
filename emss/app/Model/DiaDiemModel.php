<?php

namespace App\Model;

use App\Core\Cookie;
use App\Core\DatabaseFactory;
use PDO;

class DiaDIemModel
{
    public static function create($ten, $tinh, $huyen , $xa, $thon, $sonha, $loai, $succhua, $trong){
        $database = DatabaseFactory::getFactory()->getConnection();
        $sql = "INSERT INTO dia_diem (ten_dia_diem, tp_tinh, quan_huyen, phuong_xa, ap_thon, so_nha, phan_loai, suc_chua, so_luong_trong)
                VALUES (:ten,:tinh, :huyen, :xa, :thon, :sonha, :loai, :succhua, :trong)";
        $query = $database->prepare($sql);
        $query->execute([':ten' => $ten, ':tinh' => $tinh, ':huyen' => $huyen, ':xa' => $xa, ':thon' => $thon, ':sonha' => $sonha, ':loai' => $loai, ':succhua' => $succhua, ':trong' => $trong]);
        $count = $query->rowCount();
        if ($count == 1) {
            return true;
        }

        return false;
    }

    public static function getAllPagination($search, $search2, $page , $rowsPerPage){
        // tính limit và offset dựa trên số trang và số lương dòng trên mỗi trang
        $limit = $rowsPerPage;
        $offset = $rowsPerPage * ($page - 1);

        $database = DatabaseFactory::getFactory()->getConnection();

        $search = '%' . $search . '%';
        
        if ($search2 == "") {
            $sql = 'SELECT ma_dia_diem, ten_dia_diem, tp_tinh, quan_huyen, phuong_xa, ap_thon, so_nha, phan_loai
                FROM dia_diem WHERE (ma_dia_diem LIKE :search OR ten_dia_diem LIKE :search OR tp_tinh LIKE :search OR quan_huyen LIKE :search OR phuong_xa LIKE :search OR ap_thon LIKE :search OR so_nha LIKE :search OR phan_loai LIKE :search) 
                AND trang_thai=1';
        } else if ($search2 == "ma") {
            $sql = 'SELECT ma_dia_diem, ten_dia_diem, tp_tinh, quan_huyen, phuong_xa, ap_thon, so_nha, phan_loai
            FROM dia_diem WHERE (ma_dia_diem LIKE :search) AND trang_thai=1';
        } else if ($search2 == "ten") {
            $sql = 'SELECT ma_dia_diem, ten_dia_diem, tp_tinh, quan_huyen, phuong_xa, ap_thon, so_nha, phan_loai
            FROM dia_diem WHERE (ten_dia_diem LIKE :search) AND trang_thai=1';
        } else if ($search2 == "tinh") {
            $sql = 'SELECT ma_dia_diem, ten_dia_diem, tp_tinh, quan_huyen, phuong_xa, ap_thon, so_nha, phan_loai
            FROM dia_diem WHERE (tp_tinh LIKE :search) AND trang_thai=1';
        } else  if ($search2 == "huyen") {
            $sql = 'SELECT ma_dia_diem, ten_dia_diem, tp_tinh, quan_huyen, phuong_xa, ap_thon, so_nha, phan_loai
            FROM dia_diem WHERE (quan_huyen LIKE :search) AND trang_thai=1';
        } else if ($search2 == "xa") {
            $sql = 'SELECT ma_dia_diem, ten_dia_diem, tp_tinh, quan_huyen, phuong_xa, ap_thon, so_nha, phan_loai
            FROM dia_diem WHERE (phuong_xa LIKE :search) AND trang_thai=1';
        } else if ($search2 == "thon") {
            $sql = 'SELECT ma_dia_diem, ten_dia_diem, tp_tinh, quan_huyen, phuong_xa, ap_thon, so_nha, phan_loai
            FROM dia_diem WHERE (ap_thon LIKE :search) AND trang_thai=1';
        }else if ($search2 == "sonha") {
            $sql = 'SELECT ma_dia_diem, ten_dia_diem, tp_tinh, quan_huyen, phuong_xa, ap_thon, so_nha, phan_loai
            FROM dia_diem WHERE (so_nha LIKE :search) AND trang_thai=1';
        }else if ($search2 == "loai") {
            $sql = 'SELECT ma_dia_diem, ten_dia_diem, tp_tinh, quan_huyen, phuong_xa, ap_thon, so_nha, phan_loai
            FROM dia_diem WHERE (phan_loai LIKE :search) AND trang_thai=1';
        }

        $sql .= ' ORDER BY ma_dia_diem ASC LIMIT :limit OFFSET :offset'; //DESC giảm ASC tăng

        $query = $database->prepare($sql);

        $query->bindValue(':limit', $limit, PDO::PARAM_INT);
        $query->bindValue(':offset', $offset, PDO::PARAM_INT);
        $query->bindValue(':search', $search, PDO::PARAM_STR);

        $query->execute();
        $data = $query->fetchAll();

        // đếm số lượng tất cả user để tính số trang
        $count = "";
        if ($search2 == "") {
            $count = 'SELECT COUNT(*) FROM dia_diem 
            WHERE (ma_dia_diem LIKE :search OR ten_dia_diem LIKE :search OR tp_tinh LIKE :search OR quan_huyen LIKE :search OR phuong_xa LIKE :search OR ap_thon LIKE :search OR so_nha LIKE :search OR phan_loai LIKE :search) 
                AND trang_thai=1';
        } else if ($search2 == "ma") {
            $count = 'SELECT COUNT(*) FROM dia_diem WHERE (ma_dia_diem LIKE :search) AND trang_thai=1';
        } else if ($search2 == "ten") {
            $count = 'SELECT COUNT(*) FROM dia_diem WHERE (ten_dia_diem LIKE :search) AND trang_thai=1';
        } else if ($search2 == "tinh") {
            $count = 'SELECT COUNT(*) FROM dia_diem WHERE (tp_tinh LIKE :search) AND trang_thai=1';
        } else  if ($search2 == "huyen") {
            $count = 'SELECT COUNT(*) FROM dia_diem WHERE (quan_huyen LIKE :search) AND trang_thai=1';
        } else if ($search2 == "xa") {
            $count = 'SELECT COUNT(*) FROM dia_diem WHERE (phuong_xa LIKE :search) AND trang_thai=1';
        } else if ($search2 == "thon") {
            $count = 'SELECT COUNT(*) FROM dia_diem WHERE (ap_thon LIKE :search) AND trang_thai=1';
        }else if ($search2 == "sonha") {
            $count = 'SELECT COUNT(*) FROM dia_diem WHERE (so_nha LIKE :search) AND trang_thai=1';
        }else if ($search2 == "loai") {
            $count = 'SELECT COUNT(*) FROM dia_diem WHERE (phan_loai LIKE :search) AND trang_thai=1';
        }

        $countQuery = $database->prepare($count);
        $countQuery->bindValue(':search', $search, PDO::PARAM_STR);

        $countQuery->execute();
        $totalRows = $countQuery->fetch(PDO::FETCH_COLUMN);

        $response = [
            'page' => $page,
            'rowsPerPage' => $rowsPerPage,
            'totalPage' => ceil(intval($totalRows) / $rowsPerPage),
            'data' => $data,
        ];
        return $response;
    }

    
}