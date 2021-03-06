<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="description" content="Deskripsi Blog">
<meta name="author" content="Judul Blog">

<!-- Twitter Card -->
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="omfgitsasalmon">
<meta name="twitter:title" content="Simple Blog">
<meta name="twitter:description" content="Deskripsi Blog">
<meta name="twitter:creator" content="Simple Blog">
<meta name="twitter:image:src" content="{{! TODO: ADD GRAVATAR URL HERE }}">

<meta property="og:type" content="article">
<meta property="og:title" content="Simple Blog">
<meta property="og:description" content="Deskripsi Blog">
<meta property="og:image" content="{{! TODO: ADD GRAVATAR URL HERE }}">
<meta property="og:site_name" content="Simple Blog">

<link rel="stylesheet" type="text/css" href="assets/css/screen.css" />
<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">

<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<?php 
    include 'DBConfig.php';
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $result = mysql_query("select * from entries where PID='$id'",$link);
        $row = mysql_fetch_array($result);
    }
    else {
        echo "No id";
    }            
?>
<title> AYE! | <?php echo $row['JUDUL']; ?></title>

</head>

<script type="text/javascript" src="komentar.js"> </script>

<body class="default" onload="javascript:showComment(<?php echo $id?>)">
<div class="wrapper">

<nav class="nav">
  <a style="border:none;" id="logo" href="index.php"><h1>AYE!</h1></a>
  <ul class="nav-primary">
      <li><a href="new_post.php">+ Tambah Post</a></li>
  </ul>
</nav>

<article class="art simple post">
    
    <header class="art-header">
        <div class="art-header-inner" style="margin-top: 0px; opacity: 1;">
            <time class="art-time"><?php echo $row['TANGGAL']; ?></time>
            <h2 class="art-title"><?php echo $row['JUDUL']; ?></h2>
            <p class="art-subtitle"></p>
        </div>
    </header>

    <div class="art-body">
        <div class="art-body-inner">
            <hr class="featured-article" />
            <p><?php echo $row['KONTEN']; ?></p>
            
            <hr />
            
            <h2>Komentar</h2>

            <div id="contact-area">
                <form method="post" action="javascript:addComment(<?php echo $id?>)" id="comment_form">
                    <label for="Nama">Nama:</label>
                    <input type="text" name="Nama" id="Nama">
        
                    <label for="Email">Email:</label>
                    <input type="text" name="Email" id="Email">
                    <p size ="10px" id="errmsg"></p>
                    
                    <label for="Komentar">Komentar:</label><br>
                    <textarea name="Komentar" rows="20" cols="20" id="Komentar"></textarea>

                    <input type="submit" name="submit" value="submit" class="submit-button">
                </form>
            </div>

            <ul class="art-list-body" id="komentar">
                <! Isi komentar nanti disini yg dari javascript!>
            </ul>
        </div>
    </div>

</article>

<footer class="footer">
    <div class="back-to-top"><a href="">Back to top</a></div>
    <!-- <div class="footer-nav"><p></p></div> -->
    <div class="psi">&Psi;</div>
    <aside class="offsite-links">
        Simple Blog By /
        <a class="rss-link" href="#rss">RSS</a> /
        <br>
        <a class="twitter-link" href="http://twitter.com/akuafik">AFIK</a> /
    </aside>
</footer>

<script type="text/javascript" src="assets/js/fittext.js"></script>
<script type="text/javascript" src="assets/js/app.js"></script>
<script type="text/javascript" src="assets/js/respond.min.js"></script>

</div>

</body>
</html>