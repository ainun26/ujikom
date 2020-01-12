<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <style type="text/css">
    body{
  font-family: sans-serif;
  background: gray;
}

h1{
  text-align: center;
  /*ketebalan font*/
  font-weight: 300;
}

.tulisan_login{
  text-align: center;
  /*membuat semua huruf menjadi kapital*/
  text-transform: uppercase;
}

.kotak_login{
  width: 350px;
  background: white;
  /*meletakkan form ke tengah*/
  margin: 80px auto;
  padding: 30px 20px;
  box-shadow: 0px 0px 100px 4px #d6d6d6;
}

label{
  font-size: 11pt;
}

.form_login{
  /*membuat lebar form penuh*/
  box-sizing : border-box;
  width: 100%;
  padding: 10px;
  font-size: 11pt;
  margin-bottom: 20px;
  border-radius: 5px;
}

.tombol_login{
  background: #2aa7e2;
  color: white;
  font-size: 11pt;
  width: 100%;
  border: none;
  border-radius: 5px;
  padding: 10px 20px;
}

.link{
  color: #232323;
  text-decoration: none;
  font-size: 10pt;
}

.alert{
  background: #e44e4e;
  color: white;
  padding: 10px;
  text-align: center;
  border:1px solid orange;
}
  </style>
</head>
<body>

  <?php 
  if(isset($_GET['pesan'])){
    if($_GET['pesan']=="gagal"){
      echo "<div class='alert'>Username dan Password tidak sesuai !!!</div>";
    }
  }
  ?>
 
  <div class="kotak_login">
    <p class="tulisan_login">login</p>
 
    <form action="cek_login.php" method="post">
      <input type="text" name="username" class="form_login" placeholder="Username" required="required">
 
      <input type="password" name="password" class="form_login" placeholder="Password" required="required">
 
      <input type="submit" class="tombol_login" value="Login">
 
      <br/>
      <br/>
      <center>
        <a class="link" href="forgot-password.html">forgot-password</a>
      </center>
    </form>
    
  </div>
 
 
</body>
</html>