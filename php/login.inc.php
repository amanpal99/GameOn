<?php
if(isset($_POST['login-submit'])) {
  require 'db.inc.php';

  $uid = $_POST['uid'];
  $upwd = $_POST['upwd'];

  if(empty($uid) || empty($upwd)){
    header("location: ../main/signin.php?error=emptyfields");
    exit();
  }
  else {
    $sql = "select * from usersdata where uname=? or uemail=?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql))
    {
      header("location: ../main/signin.php?error=sqlerror");
      exit();
    }
    else{
      mysqli_stmt_bind_param($stmt, "ss", $uid, $uid);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      if($row = mysqli_fetch_assoc($result))
      {
        $pwdCheck = password_verify($upwd, $row['upswd']);
        if($pwdCheck==false)
        {
          header("location: ../main/signin.php?error=pwderror");
          exit();
        }
        else if($pwdCheck == true){
          session_start();
          $_SESSION['id'] = $row['uid'];
          $_SESSION['name'] = $row['uname'];
          $_SESSION['email'] = $row['uemail'];
          header("location: ../main/index.php?login=success");
          exit();
        }

      }
      else {
        header("location: ../main/signin.php?nouser");
        exit();
      }
    }
  }
}
else {
  header("location: ../main/index.html");
  exit();
}
?>
