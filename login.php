<!DOCTYPE HTML>
<!--
	Identity by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>YouView</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets2/css/main.css" />
		<noscript><link rel="stylesheet" href="assets2/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<section id="main">
						<header>
							<span class="avatar"><img src="images2/youtube2.png" alt="" /></span>
							<h1><a href="home2.php" style="text-decoration:none">YouView</a></h1>
							<p>login</p>
						<form name="singIn" action="SignIn.php" method="post" onsubmit="return checkSubmit()">
							<div class="fields">
								<div class="field">
									<input type="text" name="memberId" class="memberId" id="memberId" placeholder="Id" />
								</div>
								<div class="field">
									<input type="password" name="memberPw" class="memberPw" id="memberPw" placeholder="Password" />
								</div>

							</div>
							<div class="actions special">
								<input type="submit" value="login" class="submit" />
							</div>
						</form>
						<hr />
					</section>
			</div>

		<!-- Scripts -->
			<script>
				function checkSubmit(){

				var memberId = document.getElementById("memberId");
				var memberPw = document.getElementById("memberPw");

				if(memberId.value.length == 0){
					alert('아이디를 입력해 주세요.');
					return false;
				}
				if(memberPw.value.length == 0){
					alert('비밀번호를 입력해 주세요.');
					return false;
				}

				return true;
				}
				if ('addEventListener' in window) {
					window.addEventListener('load', function() { document.body.className = document.body.className.replace(/\bis-preload\b/, ''); });
					document.body.className += (navigator.userAgent.match(/(MSIE|rv:11\.0)/) ? ' is-ie' : '');
				}
				
				
            </script>

	</body>
</html>