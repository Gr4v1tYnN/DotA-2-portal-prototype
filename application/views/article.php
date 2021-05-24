<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<script src="http://localhost/diplominis/public/js/bootstrap.js" type="text/javascript"></script>
		<link href="http://localhost/diplominis/public/css/bootstrap.css"); type="text/css" rel="stylesheet">
		
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<meta charset="utf-8">
	<title><?php echo $articles[0]['title'];?> | DDoser</title>

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
		<a class="active" href="http://localhost/diplominis/home/index" style="text-decoration: none;"> News </a>
		<a href="http://localhost/diplominis/matches/index" style="text-decoration: none;"> Matches </a>
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

<div class="container content" style="background-color: #e6e6e6;">
	<?php if ($this->session->userdata('status') == 1): ?>
		<form action="http://localhost/diplominis/adm/deletearticle" method="post">
			<input type="hidden" value="<?php echo $articles[0]['article_id']; ?>" name="articleId">
			<input type="submit" class="floated btn btn-danger pull-right" value="Delete" style="font-size: 20px">
		</form>
		<form action="http://localhost/diplominis/adm/loadeditarticle?id=<?php echo $articles[0]['article_id']; ?>">
			<input type="hidden" value="<?php echo $articles[0]['article_id']; ?>" name="editId">
			<input type="submit" class="floated btn btn-success pull-right" value="Edit" style="font-size: 20px"> 
		</form>
	<?php endif ?>

	<?php if ($this->session->userdata('isLoged')): ?>
		<?php if ($isFav == 0): ?>
			<form action="http://localhost/diplominis/article/addfavouritearticle" method="post">
				<input type="hidden" value="<?php echo $articles[0]['article_id']; ?>" name="favId">
				<input type="submit" class="floated btn btn-info pull-right" value="Favorite" style="font-size: 20px">
			</form>
		<?php elseif ($isFav == 1): ?>
			<form action="http://localhost/diplominis/article/removefavouritearticle" method="post">
				<input type="hidden" value="<?php echo $articles[0]['article_id']; ?>" name="removeId">
				<input type="submit" class="floated btn btn-info pull-right" value="&#10003 Favorite" style="font-size: 20px">
			</form>
		<?php endif ?>
	<?php endif ?>

	<table >
		<tr>
			<td width="855px">
				<h1 style="font-size: 44px"><b><?php echo $articles[0]['title'];?></b></h1>
				<p><?php echo $articles[0]['insert_date'];?></p>
				<h4 style="font-size: 24px"><b><?php echo $articles[0]['header'];?></b></h4>
				<?php if($articles[0]['image_id'] != 0) : ?>
					<img class="img-thumbnail" src="<?php echo $articles[0]['link'];?>" width="1200">
				<?php endif ?>
				<p style="font-size: 16px"><i><?php echo $articles[0]['description'];?></i></p>
				<p style="font-size: 19px"><?php echo $articles[0]['body'];?></p>
			</td>
		<tr>
		</table>
		<h2>Comments</h2><br>
	<?php foreach ($articles AS $article): ?>
	<?php if($article['article_comment'] != null){?>
	<table >
		
		<tr>
			<td width="870px">
				<div>
					<p><?php echo $article['article_comment'];?></p>	
				</div>	
				<?php if ($this->session->userdata('status') == 1): ?>
					<p class="floated"><a href="http://localhost/diplominis/adm/userprofile?id=<?php echo $article['users_id'];?>" style="text-decoration: none;"><?php echo $article['name'];?></a> 
									<?php echo $article['comment_date'];?></p>
					<form action="http://localhost/diplominis/adm/deletearticlecomment" method="post">
						<input type="hidden" value="<?php echo $articles[0]['article_id']; ?>" name="artId">
						<input type="hidden" value="<?php echo $article['article_comments_id']; ?>" name="commentId">
						<input type="submit" class="floated modinput btn btn-danger pull-right" value="Delete" style="font-size: 10px"> 
					</form>
				<?php elseif (($article['users_id'] == $this->session->userdata('user_id')) && $this->session->userdata('status') != 1): ?>
					<p class="floated"><?php echo $article['name'];?> <?php echo $article['comment_date'];?></p>	
					<form action="http://localhost/diplominis/article/deletecomment" method="post">
						<input type="hidden" value="<?php echo $articles[0]['article_id']; ?>" name="artId">
						<input type="hidden" value="<?php echo $article['article_comments_id']; ?>" name="delcomId">
						<input type="submit" class="floated modinput btn btn-danger pull-right" value="Delete" style="font-size: 10px"> 
					</form>
				<?php else: ?>
					<p class="floated"><?php echo $article['name'];?> <?php echo $article['comment_date'];?></p>
				<?php endif ?>
			</td>
		</tr>
	</table>
	<?php } ?>
	<?php endforeach ?>	
	
	<?php if ($this->session->userdata('isLoged')): ?>
		<form action="http://localhost/diplominis/article/post" method="post">
			<input type="hidden" value="<?php echo $articles[0]['article_id']; ?>" name="articleId">	
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

<div class="footer-basic" id="footer">
	<footer>
		<p class="copyright">© Copyright 2021 DDoser</p>
	</footer>
 </div>
	
</body>
</html>