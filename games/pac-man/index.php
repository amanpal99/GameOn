<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
	  <script type="text/javascript" src="../libraries/p5.js"></script>
	  <script type="text/javascript" src="sketch.js"></script>
	  <script type="text/javascript" src="Tile.js"></script>
		<style media="screen">
			body{
				margin-left: 30%;
				margin-top: 4%;
			}

			#score_table {
	      font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	      border-collapse: collapse;
	      width: 40%;
	      margin-right: 30px;
	      float: right;
	    }

	    #score_table td, #score_table th {
	      border: 1px solid #aaa;
	      padding: 8px;
	    }

	    #score_table caption{
	      font-size: 35px;
	    }

	    #score_table tr:nth-child(even){background-color: #fff;}

	    #score_table tr{background-color: #ddd;}

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
		<table id="score_table">
	    <caption>Top Scores</caption>
	    <tr>
	      <th>Username</th>
	      <th>Score</th>
	    </tr>
	    <?php
	    if ($_SESSION['id']) {
	      require '../../php/db.inc.php';
	      $sql = "select * from game_user_data where gid=4 order by uscore desc";
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
