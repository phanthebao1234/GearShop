<?php
    class User{
        function __construct(){}

        function getListUsers(){
            $db = new connect();
            $select = "select * from user";
            $result = $db->getList($select);
            return $result;
        }
        function deleteUser($user_id){
            $db=new connect();
            $query="delete from user where user_id=$user_id";
            $db->exec($query);
        }
    }
?>