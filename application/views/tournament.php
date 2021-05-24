<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<script src="http://localhost/diplominis/public/js/bootstrap.js" type="text/javascript"></script>
		<link href="http://localhost/diplominis/public/css/bootstrap.css"); type="text/css" rel="stylesheet">

	<meta charset="utf-8">
	<title><?php echo $tournament[0]['tournament_name']; ?> | DDoser</title>

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
	
	.footer-basic ul {
  padding:0;
  list-style:none;
  text-align:center;
  font-size:18px;
  line-height:1.6;
  margin-bottom:0;
}

.footer-basic ul {
  padding:0;
  list-style:none;
  text-align:center;
  font-size:18px;
  line-height:1.6;
  margin-bottom:0;
}

.footer-basic li {
  padding:0 10px;
}

.footer-basic ul a {
  color:inherit;
  text-decoration:none;
  opacity:0.8;
}

.footer-basic ul a:hover {
  opacity:1;
}

.footer-basic .social {
  text-align:center;
  padding-bottom:25px;
}

.footer-basic .social > a {
  font-size:24px;
  width:40px;
  height:40px;
  line-height:40px;
  display:inline-block;
  text-align:center;
  border-radius:50%;
  border:1px solid #ccc;
  margin:0 8px;
  color:inherit;
  opacity:0.75;
}

.footer-basic .social > a:hover {
  opacity:0.9;
}

.footer-basic .copyright {
  margin-top:15px;
  text-align:center;
  font-size:13px;
  color:#aaa;
  margin-bottom:0;
}

.content{
    min-height: calc(100vh - 180px);
}
.floated {
   float:left;
   margin-right:5px;
}
	</style>
</head>
<body>

<div class="header">
	<div class="container">
		<a class="logo" href="http://localhost/diplominis/home/index">DDoser</a>
		<a href="http://localhost/diplominis/home/index" style="text-decoration: none;"> News </a>
		<a href="http://localhost/diplominis/matches/index" style="text-decoration: none;"> Matches </a>
		<a class="active" href="http://localhost/diplominis/tournaments/index" style="text-decoration: none;"> Tournaments </a>
		<a href="http://localhost/diplominis/forums/index" style="text-decoration: none;"> Forums </a>
		<?php if ($this->session->userdata('status') == 1): ?>
		  <a href="http://localhost/diplominis/adm/getallusers" style="text-decoration: none;"> Users </a>
		<?php endif ?>
		<div class="pull-right">
			<?php if ($this->session->userdata('isLoged')): ?>
			 <a  href="http://localhost/diplominis/user/index" style="text-decoration: none;"> <?php echo $this->session->userdata('name');?> </a>
			  <a href="http://localhost/diplominis/login/logout" style="text-decoration: none;"> Logout </a>
			<?php else: ?>
			  <a href="http://localhost/diplominis/login/index" style="text-decoration: none;"> Login </a>
			<?php endif ?>
		</div> 
	</div>
</div>

<div class="container" style="background-color: #e6e6e6;">
	<?php if ($this->session->userdata('status') == 1): ?>
		<form action="http://localhost/diplominis/adm/deletetournament" method="post">
			<input type="hidden" value="<?php echo $tournament[0]['tournamentinfo_id']; ?>" name="tournamentdelId">
			<input type="submit" class="floated btn btn-danger pull-right" value="Delete" style="font-size: 20px">
		</form>
		<form action="http://localhost/diplominis/adm/loadedittournament?id=<?php echo $tournament[0]['tournamentinfo_id']; ?>">
			<input type="hidden" value="<?php echo $tournament[0]['tournamentinfo_id']; ?>" name="editId">
			<input type="submit" class="floated btn btn-success pull-right" value="Edit" style="font-size: 20px"> 
		</form>
	<?php endif ?>

	<?php if ($this->session->userdata('isLoged')): ?>
		<?php if ($isFav == 0): ?>
			<form action="http://localhost/diplominis/tournament/addfavouritetournament" method="post">
				<input type="hidden" value="<?php echo $tournament[0]['tournamentinfo_id']; ?>" name="favId">
				<input type="submit" class="floated btn btn-info pull-right" value="Favorite" name="favorite" style="font-size: 20px">
			</form>
		<?php elseif ($isFav == 1): ?>
			<form action="http://localhost/diplominis/tournament/removefavouritetournament" method="post">
				<input type="hidden" value="<?php echo $tournament[0]['tournamentinfo_id']; ?>" name="removeId">
				<input type="submit" class="floated btn btn-info pull-right" value="&#10003 Favorite" style="font-size: 20px">
			</form>
		<?php endif ?>
	<?php endif ?>
</div>
<div class="container content" style="text-align: center; background-color: #e6e6e6;">
	<div class="card">
		<div class="card-head" style="font-size:30px;"><?php echo $tournament[0]['name']; ?></div>
	</div>
	<table class="table">
		<tr>
			<img src="<?php echo $tournament[0]['link'];?>" style="mix-blend-mode: multiply;" width="500px">
		</tr>
		<tr>
			<td width="1140px">
				<p style="font-size:16px;"><?php echo $tournament[0]['date_start'];?> - <?php echo $tournament[0]['date_finish'];?> | <?php echo $tournament[0]['tournament_status'];?></p>
				<p style="font-size:15px;"><?php echo $tournament[0]['participants_num'];?> Teams</p>
				<p style="font-size:15px;"><?php echo $tournament[0]['prizepool'];?> $</p>
				<p style="font-size:14px;"><?php echo $tournament[0]['location'];?></p>
			</td>
			<td>
				<p><?php echo $tournament[0]['participants'];?></p>
			</td>
		</tr>
	</table>
	
	<p><b>Related matches</b></p>
		<table class="table">
			<tr>
				<td>
				<table class="table" style="width: 500px">
				<tr>
					<h6 style="width: 500px"><b>Upcoming matches</b></h6>
					<?php foreach ($upcoming AS $up): ?>
						<?php if($tournament[0]['tournamentinfo_id'] == $up['tournament_id']) :?>
							
								<td>
									<img src="<?php echo $up['team1_image'];?>" height="40" width="40" style="mix-blend-mode: multiply;"></img>
								</td>
								<td>
									<p><?php echo $up['t1name'];?></p>
								</td>
								<td>
									<p>vs</p>
								</td>
								<td>
									<p><?php echo $up['t2name'];?></p>
								</td>
								<td>
									<img src="<?php echo $up['team2_image'];?>" height="40" width="40" style="mix-blend-mode: multiply;"></img>
								</td>
							</tr>
						<?php endif ?>
					<?php endforeach ?>	
				</table>
				</td>
				<td>
				<table class="table" style="width: 500px">
					<tr>
					<h6 style="width: 500px"><b>Past matches</b></h6>
					<?php foreach ($post AS $po): ?>
						<?php if($tournament[0]['tournamentinfo_id'] == $po['tournament_id']) :?>
							
								<td>
									<img src="<?php echo $po['team1_image'];?>" height="40" width="40" style="mix-blend-mode: multiply;"></img>
								</td>
								<td>
									<p><?php echo $po['t1name'];?></p>
								</td>
								<td>
									<p><?php echo $po['scoret1'];?></p>
								</td>
								<td>
									<p>-</p>
								</td>
								<td>
									<p><?php echo $po['scoret2'];?></p>
								</td>
								<td>
									<p><?php echo $po['t2name'];?></p>
								</td>
								<td>
									<img src="<?php echo $po['team2_image'];?>" height="40" width="40" style="mix-blend-mode: multiply;"></img>
								</td>
							</tr>
						<?php endif ?>
					<?php endforeach ?>
					
				</table>
				</td>
			</tr>
		</table>
		<h3><b>Format</b></h3>
		<div  style="text-align: left">
			<table class="table">
				
				<?php if(strpos($tournament[0]['format'], 'groupstage')) :?>
					<h5><b>Group stage</b></h5>
					<p>● Eight teams on a single round-robin. All matches are BO2. <br>
						● Top three teams advance to the upper bracket of the playoffs<br>
						● 4th to 7th place teams advance to the lower bracket of the playoffs<br>
						● 8th place team is eliminated</p>
				<?php endif ?>
				<?php if(strpos($tournament[0]['format'], 'playoffs')) :?>
					<h5><b>Playoffs</b></h5>
					<p>● Double-elimination bracket<br>
						● All matches except Grand Final are Bo3<br>
						● Grand Final is Bo5</p>
				<?php endif ?>
				<?php if(strpos($tournament[0]['format'], 'double-elimination')) :?>
					<h5><b>Double-elimination</b></h5>
					<p>● Upper and Lower bracket<br>
						● Lower bracket teams are eliminated instantly after lose<br>
						● Upper bracket loser teams proceed in Lower bracket</p>
				<?php endif ?>
				<?php if(strpos($tournament[0]['format'], 'round-robin')) :?>
					<h5><b>Round-robin</b></h5>
					<p>● Single round-robin. All matches are BO3. <br>
						● 1st place team is qualified to the Major Playoffs<br>
						● 2nd place team is qualified to the Major Group Stage<br>
						● 3rd and 4th place team are qualified to the Major Wild Card</p>
				<?php endif ?>
			</table>
		</div>
</div>

<div class="footer footer-basic" id="footer">
	<footer>
		<p class="copyright">© Copyright 2021 DDoser</p>
	</footer>
 </div>

</body>
</html>