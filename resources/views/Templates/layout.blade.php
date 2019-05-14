<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" type="text/css" href="{{asset('css\app.css')}}">
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.all.min.js"></script>
	<title></title>

<style type="text/css">
	.sidebar {
	  height: 100%;
	  width: 160px;
	  position: fixed;
	  z-index: 1;
	  top: 0;
	  left: 0;
	  background-color: #111;
	  overflow-x: hidden;
	  padding-top: 16px;
	}

	/* Style sidebar links */
	.sidebar a {
	  padding: 6px 8px 6px 16px;
	  text-decoration: none;
	  font-size: 20px;
	  color: #818181;
	  display: block;
	}

	/* Style links on mouse-over */
	.sidebar a:hover {
	  color: #f1f1f1;
	}

	/* Style the main content */
	.main {
	  margin-left: 160px; /* Same as the width of the sidenav */
	  padding: 0px 10px;
	}

	/* Add media queries for small screens (when the height of the screen is less than 450px, add a smaller padding and font-size) */
	@media screen and (max-height: 450px) {
	  .sidebar {padding-top: 15px;}
	  .sidebar a {font-size: 18px;}
	}
</style>
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="#">WebSiteName</a>
	    </div>
	  </div>
	</nav>

	<div class = "container-fluid" style="margin-top: 5%;">
		<div class="row" >
			<div class="col-md-2">
				<div class="sidebar">
				  <a href="#home"><i class="fa fa-fw fa-home"></i> Home</a>
				  <a href="#services"><i class="fa fa-fw fa-wrench"></i> Services</a>
				  <a href="#clients"><i class="fa fa-fw fa-user"></i> Clients</a>
				  <a href="#contact"><i class="fa fa-fw fa-envelope"></i> Contact</a>
				</div>
			</div>

			<div class="col-md-10">
				@yield('body')
			</div>
		</div>
		
	</div>
</body>
</html>