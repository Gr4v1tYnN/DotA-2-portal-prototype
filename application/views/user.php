<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<script src="http://localhost/diplominis/public/js/bootstrap.js" type="text/javascript"></script>
		<link href="http://localhost/diplominis/public/css/bootstrap.css"); type="text/css" rel="stylesheet">

	<meta charset="utf-8">
	<title>Your Profile | DDoser</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}
	
	li{
	  display: inline;
	  list-style-type: none;  
	  margin: 0 0.1vw;
	  font-size: 2vh;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}

	.tab {
	  overflow: hidden;
	  border: 1px solid #ccc;
	  background-color: #f1f1f1;
	}

	/* Style the buttons inside the tab */
	.tab button {
	  background-color: inherit;
	  float: left;
	  border: none;
	  outline: none;
	  cursor: pointer;
	  padding: 14px 16px;
	  transition: 0.3s;
	  font-size: 17px;
	}

	/* Change background color of buttons on hover */
	.tab button:hover {
	  background-color: #ddd;
	}

	/* Create an active/current tablink class */
	.tab button.active {
	  background-color: #ccc;
	}

	/* Style the tab content */
	.tabcontent {
	  display: none;
	  padding: 6px 12px;
	  border: 1px solid #ccc;
	  border-top: none;
	}
	
	* {box-sizing: border-box;}
	
	body { 
	  margin: 0;
	  font-family: Arial, Helvetica, sans-serif;
	  background-image: linear-gradient(#8c8c8c, #bfbfbf);
	}
	
	.header {
	  overflow: hidden;
	  background-color: #f1f1f1;
	  padding: 20px 10px;
	  height: 100px;
	}

	.header a {
	  float: left;
	  color: black;
	  text-align: center;
	  padding: 12px;
	  text-decoration: none;
	  font-size: 18px; 
	  line-height: 25px;
	  border-radius: 4px;
	}

	.header a.logo {
	  font-size: 25px;
	  font-weight: bold;
	}

	.header a:hover {
	  background-color: #ddd;
	  color: black;
	}

	.header a.active {
	  background-color: dodgerblue;
	  color: white;
	}

	.header-right {
	  float: right;
	}

	@media screen and (max-width: 500px) {
	  .header a {
		float: none;
		display: block;
		text-align: left;
	  }
  
	  .header-right {
		float: none;
	  }
	}
	
	**
	.footer {
		background-color: #f1f1f1;
		
	}
	
	#footer {
		bottom: 0;
		width: 100%;
		height: 10px;		
	}
	.footer-basic {
	  padding:40px 0;
	  background-color:#ffffff;
	  color:#4b4c4d;
	  text-align:center;
	}
	



.footer-basic .copyright {
  margin-top:15px;
  text-align:center;
  font-size:13px;
  color:#aaa;
  margin-bottom:0;
}

.content{
    min-height: calc(100vh - 160px);
}
	</style>
</head>
<body>

<div class="header">
	<div class="container">
		<a class="logo" href="http://localhost/diplominis/home/index">DDoser</a>
		<a href="http://localhost/diplominis/home/index" style="text-decoration: none;"> News </a>
		<a href="http://localhost/diplominis/matches/index" style="text-decoration: none;"> Matches </a>
		<a href="http://localhost/diplominis/tournaments/index" style="text-decoration: none;"> Tournaments </a>
		<a href="http://localhost/diplominis/forums/index" style="text-decoration: none;"> Forums </a>
		<?php if ($this->session->userdata('status') == 1): ?>
		  <a href="http://localhost/diplominis/adm/getallusers" style="text-decoration: none;"> Users </a>
		<?php endif ?>
		<div class="pull-right">
			<?php if ($this->session->userdata('isLoged')): ?>
			 <a class="active"  href="http://localhost/diplominis/user/index" style="text-decoration: none;"> <?php echo $this->session->userdata('name');?> </a>
			  <a href="http://localhost/diplominis/login/logout" style="text-decoration: none;"> Logout </a>
			<?php else: ?>
			  <a href="http://localhost/diplominis/login/index" style="text-decoration: none;"> Login </a>
			<?php endif ?>
		</div> 
	</div>
</div>

<div class="container content" style="background-color: #e6e6e6;">
<div class="card">
	
		<div class="card-head" style="font-size:40px; margin: 0px 0px 15px 0px">Your profile</div>
	</div>
	
	<form>
		<div class="form-group">
			<label style="font-size:16px">Nickname:</label>
			<input type="text" name="name" rows="1" cols="40" readonly value="<?php echo $user[0]['name']; ?>"></input>
		</div>
		<div class="form-group">
			<label style="font-size:16px">Email:</label>
			<input type="text" name="email" rows="1" cols="40" readonly value="<?php echo $user[0]['email']; ?>"></input>
			<a href="http://localhost/diplominis/profile/changee">Change</a>
		</div>
		<div class="form-group">
			<label style="font-size:16px">Password:</label>
			<input type="password" name="password" rows="1" cols="40" readonly value="<?php echo $user[0]['password']; ?>"></input>
			<a href="http://localhost/diplominis/profile/changep">Change</a>
		</div>
	</form>

	<div class="tab">
		<button class="tablinks" onclick="Display(event, 'News')" id="defaultOpen">News</button>
		<button class="tablinks" onclick="Display(event, 'Matches')">Matches</button>
		<button class="tablinks" onclick="Display(event, 'Tournaments')">Tournaments</button>
		<button class="tablinks" onclick="Display(event, 'Forums')">Forums</button>
	</div>
	
	<div id="News" class="tabcontent">
		<?php foreach ($news AS $article): ?>
			<a href="http://localhost/diplominis/article/index?id=<?php echo $article['article_id'];?>" style=" text-decoration: none;">
			<table class="table">
				<tr>
					<td style="color: black;">
						<p style="font-size:15px; margin: 8px 0px 0px auto"><strong><?php echo $article['title'];?></strong></p>
					</td>
					<td style="color: black;">
						<p style="font-size:15px; margin: 8px 0px 0px auto"><?php echo $article['insert_date'];?></p>
					</td>
				<tr>
			</table>
			</a>
		<?php endforeach ?>	
	</div>
	
	<div id="Matches" class="tabcontent">
		<?php foreach ($matches AS $match): ?>
			<a href="http://localhost/diplominis/matchinfo/index?id=<?php echo $match['matchinfo_id'];?>" style=" text-decoration: none;">
			<table class="table">
				<tr>
					<td>
						<img class="img-thumbnail" src="<?php echo $match['team1_image'];?>" height="40" width="40">
					</td>
					<td style="color: black;">
						<p style="font-size:15px; margin: 8px 0px 0px auto"><strong><?php echo $match['team1_name'];?></strong></p>
					</td>
					<td style="color: black;">
						<p style="font-size:15px; margin: 8px 0px 0px auto"><strong>vs</strong></p>
					</td>
					<td style="color: black;">
						<p style="font-size:15px; margin: 8px 0px 0px auto"><strong><?php echo $match['team2_name'];?></strong></p>
					</td>
					<td>
						<img class="img-thumbnail" src="<?php echo $match['team2_image'];?>" height="40" width="40">
					</td>
					<td style="color: black;">
						<p style="font-size:15px; margin: 8px 0px 0px auto"><strong><?php echo $match['tournament_name'];?></strong></p>
					</td>
					<td style="color: black;">
						<p style="font-size:15px; margin: 8px 0px 0px auto"><?php echo $match['match_date'];?></p>
					</td>
					<td style="color: black;">
						<p style="font-size:15px; margin: 8px 0px 0px auto"><?php echo $match['match_time'];?></p>
					</td>
				<tr>
			</table>
			</a>
		<?php endforeach ?>	
	</div>
	
	<div id="Tournaments" class="tabcontent">
		<?php foreach ($tournaments AS $tournament): ?>
			<a href="http://localhost/diplominis/tournament/index?id=<?php echo $tournament['tournamentinfo_id'];?>" style=" text-decoration: none;">
			<table class="table">
				<tr>
					<td>
						<img class="img-thumbnail" src="<?php echo $tournament['link'];?>" height="40" width="40">
					</td>
					<td style="color: black;">
						<p style="font-size:15px; margin: 8px 0px 0px auto"><strong><?php echo $tournament['tournament_name'];?></strong></p>
					</td>
					<td style="color: black;">
						<p style="font-size:15px; margin: 8px 0px 0px auto"><?php echo $tournament['date_start'];?> - <strong><?php echo $tournament['date_finish'];?></strong></p>
					</td>
					<td style="color: black;">
						<p style="font-size:15px; margin: 8px 0px 0px auto"><strong><?php echo $tournament['participants_num'];?></strong></p>
					</td>
					<td style="color: black;">
						<p style="font-size:15px; margin: 8px 0px 0px auto"><?php echo $tournament['prizepool'];?></p>
					</td>
				<tr>
			</table>
			</a>
		<?php endforeach ?>	
	</div>
	
	<div id="Forums" class="tabcontent">
		<?php foreach ($forums AS $forum): ?>
			<a href="http://localhost/diplominis/topic/index?id=<?php echo $forum['forum_id'];?>" style=" text-decoration: none;">
				<table class="table">
					<tr>
						<td style="color: black;">
							<p style="font-size:15px; margin: 8px 0px 0px auto"><strong><?php echo $forum['topic'];?></strong></p>
						</td>
						<td style="color: black;">
							<p style="font-size:15px; margin: 8px 0px 0px auto"><strong><?php echo $forum['topicCount'];?> Replies</strong></p>
						</td>
						<td style="color: black;">
							<p style="font-size:15px; margin: 8px 0px 0px auto"><strong>Active ago</strong></p>
						</td>
						<td style="color: black;">
							<p style="font-size:15px; margin: 8px 0px 0px auto"><strong>Created by: <?php echo $forum['name'];?></strong></p>
						</td>
					<tr>
				</table>
			</a>
		<?php endforeach ?>
	</div>
</div>

<div class="footer-basic" id="footer">
	<footer>
		<p class="copyright">© Copyright 2021 DDoser</p>
	</footer>
 </div>

<script>
function Display(evt, showFavorites) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(showFavorites).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>

</body>
</html>