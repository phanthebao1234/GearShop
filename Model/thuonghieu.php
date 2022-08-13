<?php
    class ThuongHieu {

        function __construct() {}
        function getListAllThuongHieu() {
            $db = new connect();
            $select = "SELECT * FROM thuonghieu";
            $result = $db->getList($select);
            return $result;
        }
        function getListThuongHieuLimit8(){
            $db=new connect();
            $select="SELECT * FROM thuonghieu ORDER by id_thuonghieu DESC limit 8 ";
            $result=$db->getList($select);
            return $result;// trả về đc 8 sản phẩm mới nhất
        }
    }
