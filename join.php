<!doctype HTML>
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
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<section id="main">
						<header>
							<span class="avatar"><img src="images2/youtube2.png" alt="" /></span>
							<h1><a href="home.php" style="text-decoration:none">YouView</a></h1>
							<p>join membership</p>
						<form name="signUp" action="memberSave.php" method="post" onsubmit="return checkSubmit()">
							<div class="fields">
								<div class="field">
									<input type="text" name="memberId" class="memberId" id="memberId" placeholder="Id" />
								</div>
								<div class="field">
                                    <input type="password" name="memberPw" class="memberPw" id="memberPw" placeholder="Password"/>
								</div>
								<div class="field">
                                    <input type="password" name="memberPw2" class="memberPw2" id="memberPw2" placeholder="password check" />
								</div>
								<div class="field">
									<input type="text" name="memberNickName" class="memberNickName" id="memberNickName" placeholder="Nickname" />
								</div>
							</div>
							<div class="actions special">
								<input type="submit" value="join" class="submit"/>
							</div>
						</form>
						<hr />
					</section>

				
			</div>

		<!-- Scripts -->
			<script>
				function checkSubmit(){
    				var idCheck = document.getElementById("memberId");
    				var pwCheck1 = document.getElementById("memberPw");
    				var pwCheck2 = document.getElementById("memberPw2");
    				var memberNickName = document.getElementById("memberNickName");
 
 
    				if(idCheck.value.length == 0){
        				alert('아이디를 입력해주세요.');
        				return false;
    				}
    				if(pwCheck1.value.length == 0){
        				alert('비밀번호를 입력해주세요.');
        				return false;
    				}
    				if(pwCheck2.value != pwCheck1.value){
    				    alert('비밀번호 확인을 다시 해주세요.');
        				return false;
    				}
    				if(memberNickName.value.length == 0){
    				    alert('닉네임을 입력해주세요.');
    				    return false;
					}
					alert('회원가입이 완료되었습니다!');
    				return true;	
					}
					if ('addEventListener' in window) {
						window.addEventListener('load', function() { document.body.className = document.body.className.replace(/\bis-preload\b/, ''); });
						document.body.className += (navigator.userAgent.match(/(MSIE|rv:11\.0)/) ? ' is-ie' : '');
					}
				
            </script>

	</body>
</html>
