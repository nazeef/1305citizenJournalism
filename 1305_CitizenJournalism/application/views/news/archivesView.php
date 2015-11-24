
		
<div class="wrapper row3">
  <div id="container">
    <!-- ################################################################################################ -->
    <div id="homepage" class="clear ">
	<div class="screen-pad">

  
  	<h2 class="nospace"><strong>News Archives</strong></h2>
	<div class="divide"></div>
  <div id="body">
  

<div class="alert-msg rnd8 success" >
	<div id="search">
		<form class="form form-horizontal" id="searchForm" name="searchForm" action="<?php echo base_url().'index.php/news/search'?>" method="post">
			<div class="form-group"">
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
						<button type="submit" class="button small gradient orange rnd8">Search</button>
					</div>
			</div>
		</form>	
	</div>
</div>

<div style="padding:28px;">
<ul class="list arrow">
<?php
foreach($results as $data) {?>
    <div>
		<li><a style="color:#777;font-size:18px;" href="<?php echo base_url().'index.php/news/'.$data->n_id ?>" >
		<?php
			echo $data->title ;   ?>
		</a>
		</li>
	</div>	
	<?php
}
?>
   <p><?php echo $links; ?></p>
</ul>   
   </div>
  </div>
  <p class="footer" style="padding:18px">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
 </div>
 </div>
 </div>
 </div>