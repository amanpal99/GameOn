<?php
session_start();

if(isset($_SESSION['id']))
{
  require 'db.inc.php';
  $uid = $_SESSION['id'];
  if(isset($_GET['gid']))
  {
    $gid = $_GET['gid'];
    $scr = $_GET['scr'];

    $sql = "select * from game_user_data where uid=? and gid=?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql))
    {
      header("location: ../main/index.php?error=ohhhNo");
      exit();
    }
    else{
      mysqli_stmt_bind_param($stmt, "ss", $uid, $gid);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      if($row = mysqli_fetch_assoc($result))
      {
        if($gid == 3)
        {
           $scr = (int)$row['uscore'] + 1;
        }

        if((int)$row['uscore'] < (int)$scr)
        {
          $sql = "update game_user_data SET uscore=? where uid=? and gid=?";
          $stmt = mysqli_stmt_init($conn);
          if(!mysqli_stmt_prepare($stmt, $sql))
          {
            header("location: ../main/userprofile.php?error=CouldnotUpdateData");
            exit();
          }
          else {
            mysqli_stmt_bind_param($stmt, "sss", $scr, $uid, $gid);
            mysqli_stmt_execute($stmt);
            echo "if score greater";
            header("location:javascript://history.go(-1)");
            exit();
          }
        }
        else {
          echo "score not greater";
          header("location:javascript://history.go(-1)");
          exit();
        }

      }
      else {
        $sql = "insert into game_user_data(gid, uid, uscore) values(?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql))
        {
          header("location: ../main/index.php?error=sqlerror");
          exit();
        }
        else {
          if($gid == 3)
          {
             $scr = 1;
          }
          mysqli_stmt_bind_param($stmt, "sss", $gid, $uid, $scr);
          mysqli_stmt_execute($stmt);
          echo "new data";
          header("location:javascript://history.go(-1)");
          exit();
        }
      }
    }
  }
  else {
    header("location: ../main/index.php");
    exit();
  }
}
else {
  header("location: ../main/index.php");
  exit();
}
?>
