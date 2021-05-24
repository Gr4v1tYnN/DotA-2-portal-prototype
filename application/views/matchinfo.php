<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<script src="http://localhost/diplominis/public/js/bootstrap.js" type="text/javascript"></script>
		<link href="http://localhost/diplominis/public/css/bootstrap.css"); type="text/css" rel="stylesheet">

	<meta charset="utf-8">
	<title><?php echo $match[0]['team1_name'];?> vs <?php echo $team2[0]['team2_name'];?> <?php echo $match[0]['match_date'];?> <?php echo $match[0]['match_time'];?> | DDoser</title>

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
    min-height: calc(100vh - 160px);
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
		<a class="active" href="http://localhost/diplominis/matches/index" style="text-decoration: none;"> Matches </a>
		<a href="http://localhost/diplominis/tournaments/index" style="text-decoration: none;"> Tournaments </a>
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
<?php if ($this->session->userdata('isLoged')): ?>
<div class="container" style="background-color: #e6e6e6;">
	<div>
	<?php if ($this->session->userdata('status') == 1): ?>		
		<form action="http://localhost/diplominis/adm/deletematch" method="post">
			<input type="hidden" value="<?php echo $match[0]['matchinfo_id']; ?>" name="matchdelId">
			<input type="submit" class="floated btn btn-danger pull-right" value="Delete" style="font-size: 20px">
		</form>
		<form action="http://localhost/diplominis/adm/loadeditmatch?id=<?php echo $match[0]['matchinfo_id']; ?>">
			<input type="hidden" value="<?php echo $match[0]['matchinfo_id']; ?>" name="editId">
			<input type="submit" class="floated btn btn-success pull-right" value="Edit" style="font-size: 20px"> 
		</form>
	<?php endif ?>
	
	
		<?php if ($isFav == 0): ?>
			<form action="http://localhost/diplominis/matchinfo/addfavouritematch" method="post">
				<input type="hidden" value="<?php echo $match[0]['matchinfo_id']; ?>" name="favId">
				<input type="submit" class="floated btn btn-info pull-right" value="Favorite" name="favorite" style="font-size: 20px">
			</form>
		<?php elseif ($isFav == 1): ?>
			<form action="http://localhost/diplominis/matchinfo/removefavouritematch" method="post">
				<input type="hidden" value="<?php echo $match[0]['matchinfo_id']; ?>" name="removeId">
				<input type="submit" class="floated btn btn-info pull-right" value="&#10003 Favorite" style="font-size: 20px">
			</form>
		<?php endif ?>
	
	</div>
	</div>
<?php endif ?>

<div class="container content" style="background-color: #e6e6e6;">

	<div class="card" style="text-align: center;">
		<div class="card-head" style="text-align: center; font-size:30px; margin: 0px 0px 15px 0px">Match page</div>
	</div>
	
	<?php if ( ($match[0]['match_date'] > date("Y-m-d")) || ($match[0]['match_date'] == date("Y-m-d") && ($match[0]['match_time'] >= date("h:i:s"))) ): ?>
		<div style="text-align: center;">
			<table class="table" style="height: 200px">
				<tr style="vertical-align: middle;">
					<td style="width:350px; height:200px">
						<img src="<?php echo $match[0]['team1_image'];?>" height="175" width="175" style="mix-blend-mode: multiply;">
						<p style="font-size: 18px;"><b><?php echo $match[0]['team1_name'];?></b></p>
					</td>
					<td>
						<p style="font-size: 50px" id="match_time"><?php echo $match[0]['match_time'];?></p>
						<p id="match_date"><?php echo $match[0]['match_date'];?></p>
						<p style="font-size: 17px"><?php echo $match[0]['tournament_name'];?></p>
						<p style="font-size: 16px"><?php echo $match[0]['match_type'];?></p>
						<p><?php echo $match[0]['match_status'];?></p>
						<p id="showTime"></p>
					</td>
					<td style="width:350px; height:200px">
						<img src="<?php echo $team2[0]['team2_image'];?>" height="175" width="175" style="mix-blend-mode: multiply;">
						<p style="font-size: 18px;"><b><?php echo $team2[0]['team2_name'];?></b></p>
					</td>
				</tr>
				</table>
				<p style="font-size: 16px; text-align: left"><b>Streams</b></p>
				<p><?php $match[0]['streams']; ?></p>
				<table class="table">		
					<tr>
					<p style="font-size: 16px; text-align: left"><b><?php echo $match[0]['team1_name'];?> lineup</b></p>
						<?php foreach ($match AS $player): ?>
						<td>
							<img  src="<?php echo $player['player_image'];?>" height="125" width="125" style="mix-blend-mode: multiply;">
							<p style="padding: 7px"><b><?php echo $player['nickname'];?></b></p>
						</td>
						<?php endforeach ?>
					</tr>
				</table>
				<table class="table">
					<tr>
					<p style="font-size: 16px; text-align: left"><b><?php echo $team2[0]['team2_name'];?> lineup</b></p>
						<?php foreach ($team2 AS $player): ?>
						<td>
							<img  src="<?php echo $player['player_image2'];?>" height="125" width="125" style="mix-blend-mode: multiply;">
							<p style="padding: 7px;" ><b><?php echo $player['nickname2'];?><b></p>
						</td>
						<?php endforeach ?>
					</tr>
				</table>
		</div>
		
		<p><b>Past matches</b></p>
		<table class="table">
			<tr>
				<td>
				<table class="table" style="width: 500px">
					<tr>
					<p><b><?php echo $match[0]['team1_name']; ?></b></p>
					<?php foreach ($matches AS $matched): ?>
						<?php if(($match[0]['team1_id'] == $matched['team1_id'] && $matched['match_status'] == 'Finished' && $match[0]['match_date'] > $matched['match_date']) ||
						($match[0]['team1_id'] == $matched['team2_id'] && $matched['match_status'] == 'Finished' && $match[0]['match_date'] > $matched['match_date'])) :?>
								<td>
									<p><?php echo $matched['t1name'];?></p>
								</td>
								<td>
									<p><?php echo $matched['scoret1'];?></p>
								</td>
								<td>
									<p>-</p>
								</td>
								<td>
									<p><?php echo $matched['scoret2'];?></p>
								</td>
								<td>
									<p><?php echo $matched['t2name'];?></p>
								</td>
							
						<?php endif ?>
					<?php endforeach ?>
					</tr>
				</table>
				</td>
				<td>
				<table class="table" style="width: 500px">
					<tr>
					<p><b><?php echo $team2[0]['team2_name']; ?></b></p>
					<?php foreach ($matches AS $matched): ?>
						<?php if(($team2[0]['team2_id'] == $matched['team2_id'] && $matched['match_status'] == 'Finished' && $match[0]['match_date'] > $matched['match_date']) || 
						($team2[0]['team2_id'] == $matched['team1_id'] && $matched['match_status'] == 'Finished' && $match[0]['match_date'] > $matched['match_date'])) :?>
								<td>
									<p><?php echo $matched['t1name'];?></p>
								</td>
								<td>
									<p><?php echo $matched['scoret1'];?></p>
								</td>
								<td>
									<p>-</p>
								</td>
								<td>
									<p><?php echo $matched['scoret2'];?></p>
								</td>
								<td>
									<p><?php echo $matched['t2name'];?></p>
								</td>
							
						<?php endif ?>
					<?php endforeach ?>
					</tr>
				</table>
				</td>
			</tr>
		</table>
	
	<?php elseif (!( ($match[0]['match_date'] > date("Y-m-d")) || ($match[0]['match_date'] == date("Y-m-d") && ($match[0]['match_time'] >= date("h:i:s"))) ) ): ?>
		<div style="text-align: center;">
			<table class="table" style="height: 200px">
				<tr style="vertical-align: middle;">
					<td style="width:250px; height:200px">
						<img src="<?php echo $match[0]['team1_image'];?>" height="175" width="175" style="mix-blend-mode: multiply;">
						<p style="font-size: 18px;"><b><?php echo $match[0]['team1_name'];?></b></p>
					</td>
					<td style="width: 180px;">
						<?php if ($match[0]['team1_id'] == $match[0]['winner_id']) : ?>
							<p style="font-size: 50px; color: green"><b><?php echo $match[0]['scoret1'];?></b></p>
							<p style="font-size: 35px; color: green"> WON </p>
						<?php elseif ($match[0]['winner_id'] == 0) : ?>
							<p style="font-size: 50px; color: orange"><b><?php echo $match[0]['scoret1'];?></b></p>
						<?php else : ?>
							<p style="font-size: 50px; color: red"><b><?php echo $match[0]['scoret1'];?></b></p>
						<?php endif ?>
					</td>
					<td style="width:330px; height:200px">
						<p style="font-size: 50px" id="match_time"><?php echo $match[0]['match_time'];?></p>
						<p id="match_date"><?php echo $match[0]['match_date'];?></p>
						<p style="font-size: 17px"><?php echo $match[0]['tournament_name'];?></p>
						<p style="font-size: 16px"><?php echo $match[0]['match_type'];?></p>
						<p><?php echo $match[0]['match_status'];?></p>
						<p id="showTime"></p>
					</td>
					<td style="width: 180px;">
						<?php if ($team2[0]['team2_id'] == $match[0]['winner_id']) : ?>
							<p style="font-size: 50px; color: green"><b><?php echo $match[0]['scoret2'];?></b></p>
							<p style="font-size: 35px; color: green"> WON </p>
						<?php elseif ($match[0]['winner_id'] == 0) : ?>
							<p style="font-size: 50px; color: orange"><b><?php echo $match[0]['scoret2'];?></b></p>
						<?php else : ?>
							<p style="font-size: 50px; color: red"><b><?php echo $match[0]['scoret2'];?></b></p>
						<?php endif ?>
					</td>
					<td style="width:250px; height:200px">
						<img src="<?php echo $team2[0]['team2_image'];?>" height="175" width="175" style="mix-blend-mode: multiply;">
						<p style="font-size: 18px;"><b><?php echo $team2[0]['team2_name'];?></b></p>
					</td>
				</tr>
				</table>
				<p style="font-size: 16px; text-align: left"><b>Streams</b></p>
				<p style="text-align: left"><?php echo $match[0]['streams'];?></p>
				<table class="table">
				<tr>
					<p style="font-size: 16px; text-align: left"><b><?php echo $match[0]['team1_name'];?> lineup</b></p>
						<?php foreach ($match AS $player): ?>
						<td>
							<img src="<?php echo $player['player_image'];?>" height="125" width="125" style="mix-blend-mode: multiply;">
							<p style="padding: 7px"><b><?php echo $player['nickname'];?><b></p>
						</td>
						<?php endforeach ?>
					</tr>
				</table>
				<table class="table">
					<tr>
					<p style="font-size: 16px; text-align: left"><b><?php echo $team2[0]['team2_name'];?> lineup</b></p>
						<?php foreach ($team2 AS $player): ?>
						<td>
							<img  src="<?php echo $player['player_image2'];?>" height="125" width="125" style="mix-blend-mode: multiply;">
							<p style="padding: 7px"><b><?php echo $player['nickname2'];?><b></p>
						</td>
						<?php endforeach ?>
					</tr>
				</table>
		</div>
		
		<p><b>Past matches</b></p>
		<table class="table">
			<tr>
				<td>
				<table class="table" style="width: 500px">
					<tr>
					<p><b><?php echo $match[0]['team1_name']; ?></b></p>
					<?php foreach ($matches AS $matched): ?>
						<?php if(($match[0]['team1_id'] == $matched['team1_id'] && $matched['match_status'] == 'Finished' && $match[0]['match_date'] > $matched['match_date']) || 
						($match[0]['team1_id'] == $matched['team2_id'] && $matched['match_status'] == 'Finished' && $match[0]['match_date'] > $matched['match_date'])) :?>
								<td>
									<p><?php echo $matched['t1name'];?></p>
								</td>
								<td>
									<p><?php echo $matched['scoret1'];?></p>
								</td>
								<td>
									<p>-</p>
								</td>
								<td>
									<p><?php echo $matched['scoret2'];?></p>
								</td>
								<td>
									<p><?php echo $matched['t2name'];?></p>
								</td>
							
						<?php endif ?>
					<?php endforeach ?>
					</tr>
				</table>
				</td>
				<td>
				<table class="table" style="width: 500px">
					<tr>
					<p><b><?php echo $team2[0]['team2_name']; ?></b></p>
					<?php foreach ($matches AS $matched): ?>
						<?php if(($team2[0]['team2_id'] == $matched['team2_id'] && $matched['match_status'] == 'Finished' && $match[0]['match_date'] > $matched['match_date']) || 
						($team2[0]['team2_id'] == $matched['team1_id'] && $matched['match_status'] == 'Finished' && $match[0]['match_date'] > $matched['match_date'])) :?>
								<td>
									<p><?php echo $matched['t1name'];?></p>
								</td>
								<td>
									<p><?php echo $matched['scoret1'];?></p>
								</td>
								<td>
									<p>-</p>
								</td>
								<td>
									<p><?php echo $matched['scoret2'];?></p>
								</td>
								<td>
									<p><?php echo $matched['t2name'];?></p>
								</td>
							
						<?php endif ?>
					<?php endforeach ?>
					
					</tr>
				</table>
				</td>
			</tr>
		</table>
	<?php endif ?>
	
	<h2>Comments</h2><br>
	<?php foreach ($comments AS $comment): ?>
	<?php if($comment['match_comment'] != null){?>
	<table class="table">
		<tr>
			<td>
				<p><?php echo $comment['match_comment'];?></p>
				<?php if ($this->session->userdata('status') == 1): ?>
				<p class="floated"><a href="http://localhost/diplominis/adm/userprofile?id=<?php echo $comment['users_id'];?>" style="text-decoration: none;"><?php echo $comment['name'];?></a>
									<?php echo $comment['comment_date'];?></p>
					<form action="http://localhost/diplominis/adm/deletematchcomment" method="post">
						<input type="hidden" value="<?php echo $comment['matchinfo_id']; ?>" name="matchId">
						<input type="hidden" value="<?php echo $comment['match_comments_id']; ?>" name="commentId">
						<input type="submit" class="floated modinput btn btn-danger pull-right" value="Delete" style="font-size: 10px"> 
					</form>
				<?php elseif (($comment['users_id'] == $this->session->userdata('user_id')) && $this->session->userdata('status') != 1): ?>
					<p class="floated"><?php echo $comment['name'];?> <?php echo $comment['comment_date'];?></p>
					<form action="http://localhost/diplominis/matchinfo/deletecomment" method="post">
						<input type="hidden" value="<?php echo $comment['matchinfo_id']; ?>" name="matchId">
						<input type="hidden" value="<?php echo $comment['match_comments_id']; ?>" name="delcomId">
						<input type="submit" class="floated modinput btn btn-danger pull-right" value="Delete" style="font-size: 10px"> 
					</form>
				<?php else: ?>
					<p class="floated"><?php echo $comment['name'];?> <?php echo $comment['comment_date'];?></p>
				<?php endif ?>
			</td>
		</tr>
	</table>
	<?php } ?>
	<?php endforeach ?>
	
	<?php if ($this->session->userdata('isLoged')): ?>
		<form action="http://localhost/diplominis/matchinfo/post" method="post">
			<input type="hidden" value="<?php echo $match[0]['matchinfo_id']; ?>" name="matchId">
			<h3>Your comment</h3>
			<div class="form-group">	
				<textarea rows="3" cols="120" name="comment" required></textarea>
			</div>    
			<div class="form-group">
				<input type="submit" class="btn btn-primary" value="Submit" >
			</div>
		</form>
	<?php endif ?>
</div>

<div class="footer footer-basic" id="footer">
	<footer>
		<p class="copyright">© Copyright 2021 DDoser</p>
	</footer>
 </div>

</body>
</html>