 <?php
require_once("connect.php");
require_once("function.php");
?>﻿
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>FUTBOL FEDERASYONU</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">


    <!-- Le styles -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">

    <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">

    <link rel="shortcut icon" href="photo/tff.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="photo/tff.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="photo/tff.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="photo/tff.png">
    <link rel="apple-touch-icon-precomposed" href="photo/tff.png">
  
      <style type="text/css">
      body {
       
      }
      .sidebar-nav {
        padding: 9px 0;
      }
	  .container{
	  background-color:white;
	  color:#E41B17;
	  padding-right:195px;
	  }
	  th{
	  background-color:white;color:#E41B17;
	  }
	.tab-content input{
		height:30px;}
	
	  
    </style>


<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
    <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
  <script>
    $(function() {
        $( "#datepicker" ).datepicker();
    });
    </script>
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#"></a>
          <div class="nav-collapse collapse">
            <h4 align="center">
			<img style="width:50px;height;50px;margin-left;20px;" src="photo/tff.png">
              <a style="color:#E41B17;text-decoration:none" href="index.php">FUTBOL FEDERASYONU</a>
            </h4>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
<br><br><br><br><br>

    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span2">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
			  <li><a href="?go=futbolcu"><i class="icon-user"></i></i> Futbolcular</a></li>
			  <li><a href="?go=takim"><i class="icon-flag"></i> Takımlar</a></li>
			  <li><a href="?go=mac"><i class="icon-th"></i> Maçlar</a></li>
			  <li><a href="?go=ceza"><i class="icon-comment"></i> Cezalar</a></i>
			  <li><a href="?go=kupalar"><i class="icon-star"></i> Kupalar</a></li>
			  <li><a href="?go=hakem"><i class="icon-hand-up"></i> Hakemler</a></li>
			  <li><a href="?go=teknik"><i class="icon-hand-right"></i> Teknik Adamlar</a></li>
			  <li><a href="?go=stadyum"><i class="icon-map-marker"></i> Stadyumlar</a></li>

			  
			</ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="span10">
          <div class="well">
           <?php 
		   $go=@$_GET['go'];
		   if($go=='takim'){ include("takimlar.php");}
		   else if($go=='mac_detay'){ include("macDetay.php");}
		   else if($go=='hakem'){ include("hakem.php");}
		   else if($go=='stadyum'){ include("stadyum.php");}
 else if($go=='mac'){ include("maclar.php");}
 else if($go=='futbolcu'){ include("oyuncu.php");}
 else if($go=='ceza'){ include("cezalar.php");}
 else if($go=='teknik'){ include("teknikEkip.php");}
  else if($go=='takim_duzelt'){ include("takimDuzelt.php");}
  else if($go=='takim_sil'){ include("takim_sil.php");}
  else if($go=='kupalar'){ include("kupa.php");}
		  
		  
		  else 
		
		 include("puan.php");



mysql_close($connect);
?>﻿
		   
          </div>
     </div>


		
 <div></div>
   
</div></div>


      <hr>

      <footer>
        <p>Copyright &copy; ZVBC 2012</p>
      </footer>

    </div><!--/.fluid-container-->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap-transition.js"></script>
    <script src="bootstrap/js/bootstrap-alert.js"></script>
    <script src="bootstrap/js/bootstrap-modal.js"></script>
    <script src="bootstrap/js/bootstrap-dropdown.js"></script>
    <script src="bootstrap/js/bootstrap-scrollspy.js"></script>
    <script src="bootstrap/js/bootstrap-tab.js"></script>
    <script src="bootstrap/js/bootstrap-tooltip.js"></script>
    <script src="bootstrap/js/bootstrap-popover.js"></script>
    <script src="bootstrap/js/bootstrap-button.js"></script>
    <script src="bootstrap/js/bootstrap-collapse.js"></script>
    <script src="bootstrap/js/bootstrap-carousel.js"></script>
    <script src="bootstrap/js/bootstrap-typeahead.js"></script>

  </body>
</html>

