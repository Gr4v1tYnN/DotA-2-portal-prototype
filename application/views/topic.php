<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<script src="http://localhost/diplominis/public/js/bootstrap.js" type="text/javascript"></script>
		<link href="http://localhost/diplominis/public/css/bootstrap.css"); type="text/css" rel="stylesheet">

	<meta charset="utf-8">
	<title><?php echo $topic[0]['topic'];?> | DDoser</title>

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
		<a href="http://localhost/diplominis/tournaments/index" style="text-decoration: none;"> Tournaments </a>
		<a class="active" href="http://localhost/diplominis/forums/index" style="text-decoration: none;"> Forums </a>
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
	<?php if ($this->session->userdata('status') == 1): ?>
		<form action="http://localhost/diplominis/adm/deletetopic" method="post">
			<input type="hidden" value="<?php echo $topic[0]['forum_id']; ?>" name="forumId">
			<input type="submit" class="floated btn btn-danger pull-right"" value="Delete" style="font-size: 20px">
		</form>
	<?php elseif ($this->session->userdata('user_id') == $author[0]['users_id']): ?>
		<form action="http://localhost/diplominis/topic/deletemytopic" method="post">
			<input type="hidden" value="<?php echo $topic[0]['forum_id']; ?>" name="forumsId">
			<input type="submit" class="floated btn btn-danger pull-right"" value="Delete" style="font-size: 20px">
		</form>
	<?php endif ?>

	<?php if ($this->session->userdata('isLoged')): ?>
		<?php if ($isFav == 0): ?>
			<form action="http://localhost/diplominis/topic/addfavouritetopic" method="post">
				<input type="hidden" value="<?php echo $topic[0]['forum_id']; ?>" name="favId">
				<input type="submit" class="floated btn btn-info pull-right" value="Favorite" name="favorite" style="font-size: 20px">
			</form>
		<?php elseif ($isFav == 1): ?>
			<form action="http://localhost/diplominis/topic/removefavouritetopic" method="post">
				<input type="hidden" value="<?php echo $topic[0]['forum_id']; ?>" name="removeId">
				<input type="submit" class="floated btn btn-info pull-right" value="&#10003 Favorite" style="font-size: 20px">
			</form>
		<?php endif ?>
	<?php endif ?>


	<div class="card">
	
		<div class="card-head" style="font-size:40px; margin: 0px 0px 15px 0px"><?php echo $topic[0]['topic'];?></div>
	</div>

	<table class="table">
		<tr>
			<td>
				<p>by <?php echo $topic[0]['author'];?></p>
				<p><?php echo $topic[0]['created'];?></p>
				<p><?php echo $topic[0]['description'];?></p>
			</td>
		<tr>
	</table>

	<?php foreach ($topic AS $key=>$comment): ?>
		<?php if($pageFrom <=  $key && $pageTo > $key){?>
			<?php if($comment['forum_comment'] != null){?>
				<table class="table">
					<tr>
						<td>
							<p><?php echo $comment['forum_comment'];?></p>
							<?php if ($this->session->userdata('status') == 1): ?>
							<p class="floated"><a href="http://localhost/diplominis/adm/userprofile?id=<?php echo $comment['user_id'];?>" style="text-decoration: none;"><?php echo $comment['name'];?></a>
												<?php echo $comment['comment_date'];?></p>
								<form action="http://localhost/diplominis/adm/deleteforumcomment" method="post">
									<input type="hidden" value="<?php echo $comment['forum_id']; ?>" name="forumId">
									<input type="hidden" value="<?php echo $comment['forum_comments_id']; ?>" name="commentId">
									<input type="submit" class="floated modinput btn btn-danger pull-right" value="Delete" style="font-size: 10px"> 
								</form>
							<?php elseif (($comment['user_id'] == $this->session->userdata('user_id')) && $this->session->userdata('status') != 1): ?>
								<p class="floated"><?php echo $comment['name'];?> <?php echo $comment['comment_date'];?></p>
								<form action="http://localhost/diplominis/topic/deletecomment" method="post">
									<input type="hidden" value="<?php echo $comment['forum_id']; ?>" name="forumId">
									<input type="hidden" value="<?php echo $comment['forum_comments_id']; ?>" name="delcomId">
									<input type="submit" class="floated modinput btn btn-danger pull-right" value="Delete" style="font-size: 10px"> 
								</form>
							<?php else: ?>
								<p><?php echo $comment['name'];?> <?php echo $comment['comment_date'];?></p>
							<?php endif ?>
						</td>
					</tr>
				</table>
			<?php }?>
		<?php } ?>
	<?php endforeach ?>	
	
	<?php if ($this->session->userdata('isLoged')): ?>
		<form action="http://localhost/diplominis/topic/post" method="post">
			<input type="hidden" value="<?php echo $topic[0]['forum_id']; ?>" name="topicId">
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
	<div class="container">
	<ul class="nav nav-tabs">
		<?php if($page != 1 && $page != 0){?>
			<li class="nav-item">
			  <a class="nav-link" href="http://localhost/diplominis/topic?page=<?php echo $page-1; ?>"
				role="tab" data-toggle="tab"><</a>
			</li>
		<?php }?>
		<li class="nav-item">
		  <a class="nav-link" href="http://localhost/diplominis/topic?page=<?php echo $page+1; ?>" role="tab"
			data-toggle="tab">></a>
		</li>
	
	</ul>
</div>

<div class="footer footer-basic" id="footer">
	<footer>
		<p class="copyright">© Copyright 2021 DDoser</p>
	</footer>
 </div>
	
</body>
</html>