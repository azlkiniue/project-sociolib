<html>
<style type="text/css">

.ball {
    background-color: rgba(0,0,0,0);
    border:5px solid blue;
    opacity:.9;
    border-top:5px solid rgba(0,0,0,0);
    border-bottom:5px solid rgba(0,0,0,0);
    border-radius:50px;
    box-shadow: 0 0 25px blue;
    width:60px;
    height:60px;
    margin:0 auto;
    -moz-animation:spin .5s infinite linear;
    -webkit-animation:spin .5s infinite linear;
}
.ball1 {
    background-color: rgba(0,0,0,0);
    border:5px solid blue;
    opacity:.9;
    border-top:5px solid rgba(0,0,0,0);
    border-bottom:5px solid rgba(0,0,0,0);
    border-radius:50px;
    box-shadow: 0 0 15px blue;
    width:40px;
    height:40px;
    margin:0 auto;
    position:relative;
    top:-60px;
    -moz-animation:spinoff .5s infinite linear;
    -webkit-animation:spinoff .5s infinite linear;
}
.ball2 {
    background-color: rgba(0,0,0,0);
    border:5px solid blue;
    opacity:.9;
    border-top:5px solid rgba(0,0,0,0);
    border-bottom:5px solid rgba(0,0,0,0);
    border-radius:50px;
    box-shadow: 0 0 10px blue;
    width:20px;
    height:20px;
    margin:0 auto;
    position:relative;
    top:-100px;
    -moz-animation:spin .5s infinite linear;
    -webkit-animation:spin .5s infinite linear;
}
.ball3 {
    background-color: rgba(0,0,0,0);
    border:5px solid blue;
    opacity:.9;
    border-top:5px solid rgba(0,0,0,0);
    border-bottom:5px solid rgba(0,0,0,0);
    border-radius:50px;
    box-shadow: 0 0 5px blue;
    width:1px;
    height:1px;
    margin:0 auto;
    position:relative;
    top:-120px;
    -moz-animation:spinoff .5s infinite linear;
    -webkit-animation:spinoff .5s infinite linear;
}

@-moz-keyframes spin {
    0% { -moz-transform:rotate(0deg); }
    100% { -moz-transform:rotate(360deg); }
}
@-moz-keyframes spinoff {
    0% { -moz-transform:rotate(0deg); }
    100% { -moz-transform:rotate(-360deg); }
}
@-webkit-keyframes spin {
 0% { -webkit-transform:rotate(0deg); }
 100% { -webkit-transform:rotate(360deg); }
}
@-webkit-keyframes spinoff {
 0% { -webkit-transform:rotate(0deg); }
 100% { -webkit-transform:rotate(-360deg); }
}

    .container {margin-top: 10px; overflow: hidden; text-align: center; font-family:sans-serif;background-color: white;color: blue;}
    .content {height: 100px; margin-top: 35px;}

</style>

  <body class="container">
    <?php
      header("Refresh:2; url=".site_url('dbase/index'));
    ?>
    <h1>Data sudah masuk</h1>
    <h3>Redirecting...</h3>
    <div class="content">
    <div class="ball"></div>
    <div class="ball1"></div>
    <div class="ball2"></div>
    <div class="ball3"></div>
    </div>
  </body>
</html>
