<?php
 session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Profile</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">
    <script src="../jquery.js" charset="utf-8"></script>
    <style media="screen">
      .user{
        box-shadow: 10px 14px 18px 0 rgba(100, 10, 200, 0.6);
        background-color: #24252A;
        max-width: 500px;
        height: 300px;
        margin: auto;
        margin-top: 14%;
        text-align: center;
        font-family: arial;
        padding: 10px 0px;
      }
      .user form{
        text-align: justify;
        padding-left: 80px;
        color: #fff;

      }
      .user form label{
        font-size: 20px;
        font-family: monospace;
        margin-bottom: 10px;
      }
      .user form input{
        color: inherit;
        background-color: #24252A;
        border: none;
        font-size: 25px;
        font-family: monospace;
        margin-bottom: 10px;
      }
      button{
        margin-left: 25%;
        font-family: "Montserrat", sans-serif;
        font-weight: 500;
        font-size: 20px;
        color: #ecf0f1;

        padding: 9px 25px;
        background-color: grey;
        border: none;
        border-radius: 50px;
        cursor: pointer;
       transition: all 0.3s ease 0s;
     }
      button:hover{
        background-color: rgba(0, 136, 169, 0.8);
      }

      .avatar {
        vertical-align: middle;
        width: 100px;
        height: 100px;
        border-radius: 50%;
        margin-bottom: 10px;
      }

      a{
        text-decoration: none;
      }

      .back{
        font-size: 30px;
        position: absolute;
        top: 20px;
        right: 100px;
        background-color: rgba(0, 156, 189, 0.8);
        transition: all 0.3s ease 0s;
      }
      .back:hover{
        background-color: rgba(0, 136, 169, 1);
      }
    </style>
  </head>
  <body>
    <a href="index.php"><button type="button" class="back">Back To Games</button></a>
    <div class="user">
      <img src="images/avatar.png" alt="Avatar" class="avatar">
      <?php
       if(isset($_SESSION['id'])){
         echo '<form class="uprofile" action="../php/userupdate.inc.php" method="post">
           <label for="uid">Username: </label>
           <input type="text" id="uid" name="uid" value="'.$_SESSION['name'].'"><br>
           <label for="umail">Email: </label>
           <input type="email" id="umail" name="umail" value="'.$_SESSION['email'].'"><br>
           <label for="upwd">Password: </label>
           <input type="text" id="upwd" name="upwd"><br>
           <button type="submit" id="submit" name="update-submit" disabled="disabled">Update</button>
         </form>';
       }
       else {
         header("location: index.php");
         exit();
       }
       ?>
    </div>
    <script src="profile.js"></script>
  </body>
</html>
