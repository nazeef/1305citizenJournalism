		<style type="text/css">
			@font-face {
				font-family: tamilFont1;
				src:url("<?php echo base_url(); ?>fonts/hindi.ttf");
			}
			@font-face {
				font-family: tamilFont2;
				src:url("<?php echo base_url(); ?>fonts/hindi.ttf");
			}
		</style>
		
		<div class="wrapper row3">
  <div id="container">
    <!-- ################################################################################################ -->
    <div id="homepage" class="clear" style="padding:18px;">
	
	  	<h2 class="nospace"><strong>Category</strong></h2>
	<div class="divide"></div>
	<div id="body">
  

<div class="alert-msg rnd8 success" >
	<div id="search">
		<form class="form form-horizontal" id="searchForm" name="searchForm" action="<?php echo base_url().'index.php/news/search'?>" method="post">
			<div class="form-group">
				<div class="one_half input-group-lg" style="padding-left:13px;">
				<h3><span class="label label-default">Search</span></h3>
					<input id="searchTxt" class="rnd8 form-control input-group-lg" placeholder="Search News" type="text" name="searchTxt" value="">
					
				</div>
				<div class="one_half input-group-sm">
					<h3><span class="label label-default">Search By Date</span></h3>
					<input class="rnd8 " type="date" name="date" value="Search by Date"/>
				</div>
			</div>
			</div>
			<div class="form-group">
					<div class="">
						<button type="submit" class="button small gradient orange rnd8" name="search" value="Search">Search</button>
					</div>
			</div>
		</form>	
	</div>

<!--<div id="search">
    <form  id="searchForm" name="searchForm" action="<?php echo base_url().'index.php/news/search'?>" method="post">
		<input id="searchTxt" type="text" name="searchTxt" value="">
		<span style="color:blue;">Search By Date</span>
		<input type="date" name="date" value="Search by Date"/>
		<input type="submit" name="search" value="Search"/>
	</form>	
</div>
-->



<div style="color: #666666;">
<?php foreach ($news as $news_item): ?>

    <h2><?php echo $news_item['title'] ?></h2>
	<?php if($news_item['font']=="2"){
				echo ' <div class="main" style="font-size:17px;font-family:tamilFont1">';
				 echo $news_item['body'] ;
				echo ' </div>';
	}
		 else{
				echo ' <div class="main">';
				 echo $news_item['body']; 
				echo ' </div>';
			 
			 
		 }
	?>	 
	
	<p><a href="<?php echo base_url().'index.php/news/'.$news_item['n_id'] ?>"style="color:#FF9900;font-weight:bold;font-size:1.1em;">View article</a></p>
	
	
	
	<?php if($this->session->userdata('fname')==true && $this->session->userdata('role')=="admin"){ ?>
		<div>
			<a href="<?php echo base_url().'index.php/news/approve/'.$news_item['n_id'] ?>"><input class="button small gradient orange rnd8" type="button" value="Approve"></a>
			<a href="<?php echo base_url().'index.php/news/delete/'.$news_item['n_id'] ?>"><input class="button small gradient orange rnd8" type="button" value="Delete"></a>
		</div>
	<?php } ?>
	
	<br><br>
<?php endforeach ?>
</div>
	</div>
	<div class="imagesClear"></div>
	
  </div>

       
	
	
	
	</div>