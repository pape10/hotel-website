<?php
session_start();
   if(isset($_POST['submit']))
   {
      $uid=$_POST['username'];
      $pwd=$_POST['password'];
      $sql="SELECT * FROM username WHERE userName='".$uid."' and pass='".$pwd."'";
      $con=mysql_connect('localhost','root','');
      mysql_select_db('hotel',$con);
      $i=mysql_query($sql);
      if($arr=mysql_fetch_array($i))
      {
         if($pwd=$arr['pass']&&$uid=$arr['userName'])
         {
            $_SESSION['userName']= $arr['userName'];
            header('Location:index.php');
         }
      }
      else
      {
         $_SESSION['msg']="* invalid username or password *";
         header('Location:login_for_order.php');
      }
   }
?>