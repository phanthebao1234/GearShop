<?php
    class Menu {
        function __construct() {}

        function getListMenu() {
            $db = new connect();
            $select = "SELECT * FROM menu ";
            $result = $db->getList($select);
            return $result;
        }

        function getNameMenu($id_menu) {
            $db = new connect();
            $select = "SELECT menu_name FROM menu WHERE id_menu = $id_menu";
            $result = $db->getInstance($select);
            return $result;
        }
    }
?>