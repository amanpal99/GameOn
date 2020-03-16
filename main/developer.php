<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}

a{
  text-decoration: none;
}

.back{
  font-size: 30px;
  position: absolute;
  top: 20px;
  right: 100px;
  width:300px;

  background-color: rgba(0, 156, 189, 0.8);
  transition: all 0.3s ease 0s;

  padding: 9px 25px;
  border: none;
  border-radius: 50px;
  cursor: pointer;
}
.back:hover{
  background-color: rgba(0, 136, 169, 1);
}

</style>
</head>
<body>

<h2 style="text-align:center"></h2>
<a href="index.php"><button type="button" class="back">Back To Games</button></a>
<div class="card">
  <img src="images/me.jfif" alt="Aman Pal" style="width:100%">
  <h1>Aman Pal</h1>
  <p class="title">Developer</p>
  <p>Game ON</p>
  <div style="margin: 24px 0;">
    <a href="#"><i class="fa fa-dribbble"></i></a>
    <a href="#"><i class="fa fa-twitter"></i></a>
    <a href="#"><i class="fa fa-linkedin"></i></a>
    <a href="#"><i class="fa fa-facebook"></i></a>
  </div>
  <p><button><i class="fa fa-phone"></i>  8146319039</button></p>
</div>

</body>
</html>
