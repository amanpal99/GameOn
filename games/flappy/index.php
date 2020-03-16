<?php session_start(); ?>

<html>
  <head>
    <title>Flappy Bird</title>

    <script src="p5/p5.js"></script>
    <script src="p5/addons/p5.dom.js"></script>
    <script src="sketch.js"></script>
    <script src="bg.js"></script>
    <script src="bird.js"></script>
    <script src="pipe.js"></script>
    <style media="screen">
			body{
				margin-left: 20%;
				margin-top: 4%;
			}
      #score_table {
        position: absolute;
        top: 100px;
        right: 20px;
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 30%;
        margin-right: 30px;
      }

      #score_table td, #score_table th {
        border: 1px solid #aaa;
        padding: 8px;
      }

      #score_table caption{
        font-size: 35px;
      }

      #score_table tr:nth-child(even){background-color: #f2f2f2;}

      #score_table tr {background-color: #ddd;}

      #score_table th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: center;
        background-color: #000;
        color: white;
      }
		</style>

  </head>
  <body bgcolor=#000>
    <table width=680 border=0 cellspacing=0>
      <tr>
        <td colspan=3 height=20><center>Flappy Bird</center></td>
      </tr>
      <tr>
        <td width=20></td>
        <td width=640>
          <div id="sketch-holder" style="position: relative;">
            <!-- Our sketch will go here! -->
          </div>
        </td>
        <td width=20></td>
      </tr>
    </table>
    <table id="score_table">
      <caption>Top Scores</caption>
      <tr>
        <th>Username</th>
        <th>Score</th>
      </tr>
      <?php
      if ($_SESSION['id']) {
        require '../../php/db.inc.php';
        $sql = "select * from game_user_data where gid=5 order by uscore desc";
        $stmt = mysqli_stmt_init($conn);
        $rows = [];
        if(!mysqli_stmt_prepare($stmt, $sql))
        {
          header("location: ../main/index.php?error=sqlerror");
          exit();
        }
        else{
          mysqli_stmt_execute($stmt);
          $result = mysqli_stmt_get_result($stmt);
          while ($row = mysqli_fetch_assoc($result)) {
                $rows[] = $row;
          }
        }
        if (count($rows)){
              foreach ($rows as $row) {

                $sql = "select uname from usersdata where uid=?";
                $stmt = mysqli_stmt_init($conn);
                $rows = [];
                if(!mysqli_stmt_prepare($stmt, $sql))
                {
                  header("location: ../main/index.php?error=sqlerrorInInside");
                  exit();
                }
                else{
                  mysqli_stmt_bind_param($stmt, "s", $row["uid"]);
                  mysqli_stmt_execute($stmt);
                  $result = mysqli_stmt_get_result($stmt);
                  if($rowm = mysqli_fetch_assoc($result)) {
                        $uname = $rowm['uname'];
                  }
                }

                  echo "<tr>" .
                      "<td>" . $uname . "</td>" .
                      "<td>" . $row['uscore'] . "</td>" .
                      "</tr>";
              }
          } else {
              echo "don't exist records for list on the table";
          }
      }
  ?>
  </table>
  </body>
</html>
