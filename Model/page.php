<?php
class Page{
    // tính tổng số trang là bao nhiêu, muốn tính đc ra bao nhiêu page thì cần có 
  // tổng số sp/limit
  function findPage($count,$limit)
  {
    //25/8=4 
    $page=($count%$limit)==0?($count/$limit):floor($count/$limit)+1;
    return $page;
  }
  // tính start $current_page-1*$limit
  // $_GET['page'] là trang hiện hiện tại tức là $current_page
  function findStart($limit)
  {
    if(!isset($_GET['page'])||($_GET['page']==1))
    {
      $start=0;
      $_GET['page']=1;
    }
    // ngược lại trang hiện tại có
    else{
      $start=($_GET['page']-1)*$limit;
    }
    return $start;
  }
}
?>