<?php

   $config = [
       'host'  =>  '127.0.0.1',
       'port'  =>  '3306',
       'dbname' =>  'shop',
       'user' =>  'root',
       'pass' => 'rootroot',
   ];

   $link = mysqli_connect($config['host'],$config['user'],$config['pass'],$config['dbname']);

   if(!$link){
       die('Connect Error(' . mysqli_connect_error() . ')'
         . mysqli_connect_error());
   }

        $user_name = $_POST['user_name'];
        $password = $_POST['password'];
        if(!$user_name || !$password){
            die('用户名或密码不能为空');exit;
        }
        $sql = "select * from p_users where user_name=?";
        $sql = "select * from p_users where user_name=".$user_name;
    print_r($sql);
        $stmt = mysqli_prepare($link,$sql);
        mysqli_stmt_bind_param($stmt,"s",$user_name);
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
        $date = mysqli_fetch_array($res,MYSQLI_ASSOC);

        if(!$date){
            die('此用户名不存在');exit;
        }else{

        }
print_r($date);







//
//$config = [
//    'host'  =>  '127.0.0.1',
//    'port'  =>  '3306',
//    'dbname' =>  'shop',
//    'user' =>  'root',
//    'pass' => 'rootroot',
//];
//
//
//$dbh = new PDO("mysql:host={$config['host']};dbname={$config['dbname']}",$config['user'],$config['pass']);
//
//
//$user_name = $_POST['user_name'];
//$password = $_POST['password'];
//
//$sql = "select * from p_users where user_name="."'$user_name'".'   '.'||'.'  '.'password='."'$password'";
////$stmt = $dbh->prepare($sql);
////$stmt->bindParam('user_name',$user_name);
////$stmt->bindParam('password',$password);
////$stmt->execute();
////$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
////print_r($res);
//
//
//
//
//$stmt = $dbh->prepare($sql);
//$stmt->bindParam('user_name',$user_name);
//$stmt->bindParam('password',$password);
//$stmt->execute();
//$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
//print_r($res);


?>
