<?php
session_start();
?>

<!DOCTYPE html><html><head>
  <script src="p5.js"></script>
  <script src="p5.dom.min.js"></script>
  <script src="p5.sound.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="utf-8">
  <style>
    #score_table {
      position: absolute;
      top: 200px;
      right: 10px;
      font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 25%;
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

    #score_table tr:hover {background-color: #ddd;}

    #score_table th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: center;
      background-color: #000;
      color: white;
    }
</style>
</head>

<body>

  <div id="game-container" class="center">
    <div id="title" class="center">
      <p>Tic - Tac - Toe</p>
    </div>
    <div id="canvas-container" class="center">
    </div>
    <div id="info-bar" class="center">
      <p id="winner"></p>
      <p>The AI plays X</p>
      <button id="reset-button">Reset</button>
      <div class="form-inline">
      </div>

    </div>
  </div>
  <table id="score_table">
    <caption>Top Scores</caption>
    <tr>
      <th>Username</th>
      <th>No. of Times Won</th>
    </tr>
    <?php
    if ($_SESSION['id']) {
      require '../../php/db.inc.php';
      $sql = "select * from game_user_data where gid=3 order by uscore desc";
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
            echo "";
        }
    }
?>
  <script src="minimax.js"></script>
  <script src="sketch.js"></script>


</body></html>
