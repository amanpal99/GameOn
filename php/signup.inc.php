<?php
if(isset($_POST['signup-submit'])) {
  require 'db.inc.php';

  $uname = $_POST['uid'];
  $ueml = $_POST['ueml'];
  $upwd = $_POST['upwd'];

  if(empty($uname) || empty($ueml) || empty($upwd)){
    header("location: ../main/signin.php?error=emptyfields");
    exit();
  }
  else if(!filter_var($ueml, FILTER_VALIDATE_EMAIL)){
    header("location: ../main/signin.php?error=invalidemail");
    exit();
  }
  else {
    $sql = "select uid from usersdata where uname=?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql))
    {
      header("location: ../main/signin.php?error=sqlerror");
      exit();
    }
    else{
      mysqli_stmt_bind_param($stmt, "s", $uname);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $resCheck = mysqli_stmt_num_rows();
      if($resCheck>0)
      {
        header("location: ../main/signin.php?error=usertaken");
        exit();
      }
      else {
        $sql = "insert into usersdata(uname, upswd, uemail) values(?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql))
        {
          header("location: ../main/signin.php?error=sqlerror");
          exit();
        }
        else {
          $hashedpwd = password_hash($upwd, PASSWORD_DEFAULT);
          mysqli_stmt_bind_param($stmt, "sss", $uname, $hashedpwd, $ueml);
          mysqli_stmt_execute($stmt);
          session_start();
          $_SESSION['id'] = $row['uid'];
          $_SESSION['name'] = $row['uname'];
          $_SESSION['email'] = $row['uemail'];
          header("location: ../main/index.php?signup=success");
          exit();
        }
      }
    }
  }
}
else{
  header("location: ../main/index.php");
  exit();
}
?>
