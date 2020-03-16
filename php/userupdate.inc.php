<?php
session_start();

if(isset($_POST['update-submit'])) {
  require 'db.inc.php';

  if(isset($_SESSION['id']))
  {
    $olduname = $_SESSION['name'];
    $uname = $_POST['uid'];
    $ueml = $_POST['umail'];
    $upwd = $_POST['upwd'];

    $sql = "select * from usersdata where uname=?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql))
    {
      header("location: ../main/userprofile.php?error=somethingWentWrong");
      exit();
    }
    else{
      mysqli_stmt_bind_param($stmt, "s", $olduname);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      if($row = mysqli_fetch_assoc($result))
      {
        $sql = "update usersdata SET uname=?, upswd=?, uemail=? where uname=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql))
        {
          header("location: ../main/userprofile.php?error=CouldnotUpdateData");
          exit();
        }
        else {
          $hashedpwd = password_hash($upwd, PASSWORD_DEFAULT);
          mysqli_stmt_bind_param($stmt, "ssss", $uname, $hashedpwd, $ueml, $olduname);
          mysqli_stmt_execute($stmt);
          session_start();
          $_SESSION['id'] = $_SESSION['id'];
          $_SESSION['name'] = $uname;
          $_SESSION['email'] = $ueml;
          header("location: ../main/userprofile.php?updated");
          exit();
        }
      }
      else {
        header("location: ../main/index.php");
        exit();
      }
    }
  }
}


?>
