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

<div id="container" style="color:black">

<?php 
//var_dump($this->session->all_userdata());
echo $this->session->userdata('message'); 
           $this->session->unset_userdata('message');
?>


<div id="body">
<br/>
	<div style="font-size:18px;color:grey;font-weight:bold">Moderate News :</div>
	<div class="divide"></div>
<div class="alert-msg rnd8 success" >
	<div id="search">
	
	
		<form class="form form-horizontal" id="searchForm" name="searchForm" action="<?php echo base_url().'index.php/news/search'?>" method="post">
		
			<div class="form-group">
				<div class="one_half input-group-lg" style="padding-left:13px;">
					<h3><span class="label label-default">Search</span></h3>
					<input id="searchTxt" class="rnd8 form-control input-group-lg" placeholder="Search News" type="text" name="searchTxt" value="">
					
				</div>
				
			</div>
			</div>
			<div class="form-group">
					<div class="">
						<button type="submit" class="button small gradient orange rnd8">Search</button>
					</div>
			</div>
		</form>	
	</div>

<!--
<div id="search">
    <form  id="searchForm" name="searchForm" action="<?php echo base_url().'index.php/news/search'?>" method="post">
		<input id="searchTxt" type="text" name="searchTxt" value="">
		<input class="button small gradient blue" type="submit" name="search" value="Search"/>
		
	</form>	
</div>
-->

<br>
<div style="padding:18px">
<?php foreach ($news as $news_item): ?>

    <h2><?php echo '<div style="color:grey;font-weight:bold;font-size:16px;">'. $news_item['title'] .'</div>'?></h2>
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
    <p><a href="<?php echo base_url().'index.php/news/edit/'.$news_item['n_id'] ?>" style="color:#FF9900;;font-weight:bold;font-size:1.1em;">Edit article</a></p>
    <div>
	    <a href="<?php echo base_url().'index.php/news/approve/'.$news_item['n_id'] ?>"><input class="button small gradient orange rnd8" type="button" value="Approve"></a>
		<a href="<?php echo base_url().'index.php/news/delete/'.$news_item['n_id'] ?>"><input class="button small gradient orange rnd8" type="button" value="Delete"></a>
	</div>
	<br><br>
<?php endforeach ?>
</div>
</div>
</div>