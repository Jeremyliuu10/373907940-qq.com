<!DOCTYPE html>
<html lang="en">

<head>
		<title>Travelnotes sharing</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="_token" content="{{ csrf_token() }}">
		<link rel="stylesheet" href="/assets/css/main.css" />
		<link rel="stylesheet" href="/assets/css/noscript.css" />
		<!-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script src="/js/jquery-ui-1.10.0.custom.min.js"></script>
		<script type="text/javascript" src="/js/jquery-3.4.1.min.js"></script>
		<link rel="stylesheet" href="/css/theme.blue.css">
		<script src="/js/jquery.tablesorter.js"></script>



</head>

	<body class="is-preload">
		<!-- Wrapper -->
			<div id="wrapper" class="fade-in">
				<!-- Intro -->
					<div id="intro">
						<h1> welcome to<br />
						tourist paradise</h1>
						<p>I would like to recommend the best travel notes websites in the world</p>
						<ul class="actions">
							<li><a href="#header" class="button icon solid solo fa-arrow-down scrolly">Continue</a></li>
						</ul>
					</div>

				<!-- Header -->
					<header id="header">
						<a href="/" class="logo">Travel around the world</a>
					</header>

				<!-- Nav -->
					<nav id="nav">
						<ul class="links">
							<li id="a_posts"><a href="/travels">Sharing from others</a></li>
							<li id="a_create"><a href="/travels/create">Post a new note</a></li>
							<li id="a_self"><a href="/users">Personal Center</a></li>
						</ul>
						<ul class="icons">
							<li><a href="https://www.twitter.com" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="https://www.facebook.com" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
							<li><a href="https://www.instagram.com" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
							<li><a href="https://www.github.com" class="icon brands fa-github"><span class="label">GitHub</span></a></li>
            </ul>
            <script>
              var a_posts=document.getElementById("a_posts");
              var a_create=document.getElementById("a_create");
              var a_self=document.getElementById("a_self");

              a_posts.onclick=function(){
                a_posts.className="active";
                a_create.className="";
                a_self.className="";
              };
              a_create.onclick=function(){
                a_posts.className="";
                a_create.className="active";
                a_self.className="";
              };
              a_self.onclick=function(){
                a_posts.className="";
                a_create.className="";
                a_self.className="active";
              };
              
            </script>
					</nav>

                    <div class="container">
                      @yield('content')
                    </div>


				<!-- Copyright -->
					<div id="copyright">
						<ul><li>&copy; Travelnotes</li><li>Design: Team L</li></ul>
					</div>

			</div>

		<!-- Scripts -->
			<script src="/assets/js/jquery.min.js"></script>
			<script src="/assets/js/jquery.scrollex.min.js"></script>
			<script src="/assets/js/jquery.scrolly.min.js"></script>
			<script src="/assets/js/browser.min.js"></script>
			<script src="/assets/js/breakpoints.min.js"></script>
			<script src="/assets/js/util.js"></script>
			<script src="/assets/js/main.js"></script>

	</body>
</html>

