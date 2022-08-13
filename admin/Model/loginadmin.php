<?php
    class Admin{

        function __construct(){}

        function test_input($data) {
      
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
           
        function login($username, $password) {
            $db = new connect();
            $select="select * from adminlogin where adminname='$username' and password='$password'";
            // vì là lệnh select nên pt dạng cơ bản thì query thực thi mà query nằm trong pt của connect
            // mỗi user chỉ trả đúng thông tin của 1 người, getInsant
            $result=$db->getList($select);
            // lấy đúng 1 user nên fetch()
            $set=$result->fetch();
            return $set;
        }
    }
?>