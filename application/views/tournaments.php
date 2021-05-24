<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<script src="http://localhost/diplominis/public/js/bootstrap.js" type="text/javascript"></script>
		<link href="http://localhost/diplominis/public/css/bootstrap.css"); type="text/css" rel="stylesheet">

	<meta charset="utf-8">
	<title>DotA 2 Tournaments | DDoser</title>

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
    min-height: calc(100vh - 230px);
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

<div class="container content" style="background-color: #e6e6e6;">
	<div class="card">
		<div class="card-head" style="font-size:30px; margin: 0px 0px 15px 0px">Tournaments</div>
	</div>
	<?php if ($this->session->userdata('status') == 1): ?>
		<form action="http://localhost/diplominis/adm/createtournament">
			<div class="form-group pull-right">
				<input type="submit" class="btn btn-primary" value="Create" style="font-size: 20px">
			</div>
		</form>
	<?php endif ?>
	
	<div class="tab">
		<button class="tablinks" onclick="Display(event, 'Schedule')" id="defaultOpen">Schedule</button>
		<button class="tablinks" onclick="Display(event, 'Finished')">Finished</button>
	</div>
	
	<div id="Schedule" class="tabcontent">
		<?php foreach ($tournaments AS $key=>$tournament): ?>
			<?php if($pageFrom <=  $key && $pageTo > $key) {?>
				<?php if ( ($tournament['date_start'] > date("Y-m-d")) || ($tournament['date_start'] <= date("Y-m-d") && ($tournament['date_finish'] >= date("Y-m-d"))) ): ?>
					<a href="http://localhost/diplominis/tournament/index?id=<?php echo $tournament['tournamentinfo_id'];?>" style=" text-decoration: none;">
					<table class="table">
						<tr>
							<td style="width: 80px">
								<img style="mix-blend-mode: multiply" src="<?php echo $tournament['link'];?>" height="40" width="40">
							</td>
							<td style="color: black; width: 400px">
								<p style="font-size:15px; margin: 8px 0px 0px auto"><strong><?php echo $tournament['tournament_name'];?></strong></p>
								<p style="font-size:15px; margin: 8px 0px 0px auto"><strong><?php echo $tournament['location'];?></strong></p>
							</td>
							<td style="color: black; width: 250px">
								<p style="font-size:15px; margin: 8px 0px 0px auto"><strong><?php echo $tournament['date_start'];?> - <strong><?php echo $tournament['date_finish'];?></strong></p>
							</td>
							<td style="color: black; width: 100px">
								<p style="font-size:15px; margin: 8px 0px 0px auto"><?php echo $tournament['participants_num'];?> Teams</p>
							</td>
							<td>
								<p style="color: black; font-size:15px; margin: 8px 0px 0px auto"><strong><?php echo $tournament['prizepool'];?>$</strong></p>
							</td>
							<td style="color: black;">
								<p style="font-size:15px; margin: 8px 0px 0px auto"><?php echo $tournament['tournament_status'];?></p>
							</td>
						<tr>
					</table>
					</a>
				<?php endif ?>
			<?php } ?>
		<?php endforeach ?>
	</div>
	
	<div id="Finished" class="tabcontent">
		<?php foreach ($tournaments AS $key=>$tournament): ?>
			<?php if($pageFrom <=  $key && $pageTo > $key) {?>
				<?php if (!( ($tournament['date_start'] > date("Y-m-d")) || ($tournament['date_start'] <= date("Y-m-d") && ($tournament['date_finish'] >= date("Y-m-d"))) ) ): ?>
					<a href="http://localhost/diplominis/tournament/index?id=<?php echo $tournament['tournamentinfo_id'];?>" style=" text-decoration: none;">
					<table class="table">
						<tr>
							<td style="width: 80px">
								<img style="mix-blend-mode: multiply" src="<?php echo $tournament['link'];?>" height="40" width="40">
							</td>
							<td style="color: black; width: 400px">
								<p style="font-size:15px; margin: 8px 0px 0px auto"><strong><?php echo $tournament['tournament_name'];?></strong></p>
								<p style="font-size:15px; margin: 8px 0px 0px auto"><strong><?php echo $tournament['location'];?></strong></p>
							</td>
							<td style="color: black;">
								<p style="font-size:15px; margin: 8px 0px 0px auto"><strong><?php echo $tournament['date_start'];?> - <strong><?php echo $tournament['date_finish'];?></strong></p>
							</td>
							<td style="color: black;">
								<p style="font-size:15px; margin: 8px 0px 0px auto"><?php echo $tournament['participants_num'];?></p>
								<p>Teams</p>
							</td>
							<td style="color: black;">
								<p style="font-size:15px; margin: 8px 0px 0px auto"><strong><?php echo $tournament['prizepool'];?>$</strong></p>
							</td>
							<td style="color: black;">
								<p style="font-size:15px; margin: 8px 0px 0px auto"><?php echo $tournament['tournament_status'];?></p>
							</td>
						<tr>
					</table>
					</a>
				<?php endif ?>
			<?php } ?>
		<?php endforeach ?>
	</div>
</div>

<div class="container">	
	<ul class="nav nav-tabs">
		<?php if($page != 1 && $page != 0){?>
			<li class="nav-item">
			  <a class="nav-link" href="http://localhost/diplominis/tournaments?page=<?php echo $page-1; ?>"
				role="tab" data-toggle="tab"><</a>
			</li>
		<?php }?>
		<li class="nav-item">
		  <a class="nav-link" href="http://localhost/diplominis/tournaments?page=<?php echo $page+1; ?>" role="tab"
			data-toggle="tab">></a>
		</li>
	</ul>
</div>

<div class="footer footer-basic" id="footer">
	<footer>
		<p class="copyright">© Copyright 2021 DDoser</p>
	</footer>
 </div>

<script>
function Display(evt, showTournaments) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(showTournaments).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>

</body>
</html>