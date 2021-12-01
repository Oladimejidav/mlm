<!DOCTYPE html>
<html lang="en" class="app">
<head>
<meta charset="utf-8" />
<title>SAPVIEW</title>
<meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<link rel="stylesheet" href="css/app.v1.css" type="text/css" />
<!--[if lt IE 9]> <script src="js/ie/html5shiv.js"></script> <script src="js/ie/respond.min.js"></script> <script src="js/ie/excanvas.js"></script> <![endif]-->
<style type="text/css">html {
    overflow-y: scroll;
background: url(images/login2.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}

</style>
<div id="google_translate_element" align="right"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, multilanguagePage: true}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        
</head>
<body>
<section id="content" class="m-t-lg wrapper-md animated fadeInUp">
  <div class="container aside-xl"> <a class="navbar-brand block" href="index.php">Admin Login</a>
    <section class="m-b-lg">
      <header class="wrapper text-center"> <strong>Sign in to View details</strong> </header>
      <form action="loginproc.php" method="post" >
        <div class="list-group">
          <div class="list-group-item">
            <input type="text" placeholder="Username" class="form-control no-border" name="username" required>
          </div>
          <div class="list-group-item">
            <input type="password" placeholder="Password" class="form-control no-border" name="password" required>
          </div>
        </div>
        <button type="submit" class="btn btn-lg btn-primary btn-block">Sign in</button>
        <div class="text-center m-t m-b"><a href="forgotpassword.php"><small>Forgot password?</small></a></div>
        <div class="line line-dashed"></div>
        
      </form>
    </section>
  </div>
</section>
<!-- footer -->
<footer id="footer">
  <div class="text-center padder">
    <p style="color: white; "> <small> >SAPVIEW &copy; 2020</small> </p>
  </div>
</footer>
<!-- / footer -->
<!-- Bootstrap -->
<!-- App -->
<script src="js/app.v1.js"></script>
<script src="js/app.plugin.js"></script>
</body>
</html>