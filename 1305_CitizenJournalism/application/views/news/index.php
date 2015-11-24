
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
    <div id="homepage" class="clear">


	  
	  
	  <div class="two_third first">
        <!-- ################################################################################################ -->
        <section class="main_slider">
          <div class="rslides_container clear" style="width:650px;height:400px;">
            <ul class="rslides clear" id="rslides">
			<?php foreach ($images as $news_item): ?>
              <li>
              	<img class="multimedia" src="<?php echo base_url().''.$news_item['url'] ?>" >
              	<div style="position:absolute;background:rgba(0, 0, 0, .7);color:white;margin:340px 10px;font-size:15px;width:625px;height:50px;"><a style="margin:10px 15px;color:#FF9900;" href="<?php echo base_url().'index.php/news/'.$news_item['n_id'] ?>"> <?php echo $news_item['title']; ?> </a> </div>
              </li>
              
			  <?php endforeach ?>
            </ul>
          </div>
        </section>
		</div>
	  
	  
	  

	   <div class="one_third">
 			  <div class="panel-group">
				

				<div class="panel panel-primary">
				
				  <div class="panel-heading" style="background-color:#FF9900">Headlines</div>
				  <div class="panel-body">
			<?php foreach ($news as $news_item): ?>
              <article class="clear push20">
                <h2 class="font-medium nospace"><a href="<?php echo base_url().'index.php/news/'.$news_item['n_id'] ?>"><?php echo $news_item['title'] ?></a></h2>
                <p class="nospace"><?php if($news_item['font']=="2"){
									echo ' <div class="main" style="font-size:17px;font-family:tamilFont1">';
									 echo substr($news_item['body'],0,30) ."...";
									  
									echo ' </div>';
						}
							 else{
									echo ' <div class="main">';
									echo substr($news_item['body'],0,30) ."...";
									echo ' </div>';
								 
								 
							 }
						?>	</p>
              </article>
			<?php endforeach ?>
            </div>


        <!-- ################################################################################################ -->
      </div></div></div>
    
	
	

		<div class="nospace clear">

					<!--Category-->
						<div class="one_half first">
			  <div class="panel-group">
				

				<div class="panel panel-primary">
				
				  <div class="panel-heading" style="background-color:#FF9900">State</div>
				  <div class="panel-body">
				  <?php foreach ($newsState as $news_item): ?>
				  
				               <article class="clear push20">
								<h2 class="font-medium nospace">
								<a href="<?php echo base_url().'index.php/news/'.$news_item['n_id'] ?>"><?php echo $news_item['title'] ?></a></h2>
								<p class="nospace">
								<?php if($news_item['font']=="2"){
									echo ' <div class="main" style="font-size:17px;font-family:tamilFont1">';
									 echo substr($news_item['body'],0,150) ."...";
									  
									echo ' </div>';
						}
							 else{
									echo ' <div class="main">';
									echo substr($news_item['body'],0,150) ."...";
									echo ' </div>';
								 
								 
							 }
						?>	
								
								</p>
							  </article>
				 
				  <?php endforeach ?>
				   </div>
				</div>

			  </div>
			</div>
		
		
		

			<div class="one_half ">
			  <div class="panel-group">
				

				<div class="panel panel-primary">
				
				  <div class="panel-heading" style="background-color:#FF9900">Nation</div>
				  <div class="panel-body">
				  <?php foreach ($newsNation as $news_item): ?>
				  
				               <article class="clear push20">
								<h2 class="font-medium nospace">
								<a href="<?php echo base_url().'index.php/news/'.$news_item['n_id'] ?>"><?php echo $news_item['title'] ?></a></h2>
								<p class="nospace">
								<?php if($news_item['font']=="2"){
									echo ' <div class="main" style="font-size:17px;font-family:tamilFont1">';
									 echo substr($news_item['body'],0,150) ."...";
									  
									echo ' </div>';
						}
							 else{
									echo ' <div class="main">';
									echo substr($news_item['body'],0,150) ."...";
									echo ' </div>';
								 
								 
							 }
						?>	
								
								</p>
							  </article>
				 
				  <?php endforeach ?>
				   </div>
				</div>

			  </div>
			</div>

			<!--Category-->
			<div class="one_half first">
			  <div class="panel-group">
				

				<div class="panel panel-primary">
				
				  <div class="panel-heading" style="background-color:#FF9900">Sports</div>
				  <div class="panel-body">
				  <?php foreach ($newsSports as $news_item): ?>
				  
				               <article class="clear push20">
								<h2 class="font-medium nospace">
								<a href="<?php echo base_url().'index.php/news/'.$news_item['n_id'] ?>"><?php echo $news_item['title'] ?></a></h2>
								<p class="nospace">
								<?php if($news_item['font']=="2"){
									echo ' <div class="main" style="font-size:17px;font-family:tamilFont1">';
									 echo substr($news_item['body'],0,150)."..." ;
									  
									echo ' </div>';
						}
							 else{
									echo ' <div class="main">';
									echo substr($news_item['body'],0,150) ."...";
									echo ' </div>';
								 
								 
							 }
						?>	
								
								</p>
							  </article>
				 
				  <?php endforeach ?>
				   </div>
				</div>

			  </div>
			</div>
			<!--Category-->
						<div class="one_half">
			  <div class="panel-group">
				

				<div class="panel panel-primary">
				
				  <div class="panel-heading" style="background-color:#FF9900">Life</div>
				  <div class="panel-body">
				  <?php foreach ($newsLife as $news_item): ?>
				  
				               <article class="clear push20">
								<h2 class="font-medium nospace">
								<a href="<?php echo base_url().'index.php/news/'.$news_item['n_id'] ?>"><?php echo $news_item['title'] ?></a></h2>
								<p class="nospace">
								<?php if($news_item['font']=="2"){
									echo ' <div class="main" style="font-size:17px;font-family:tamilFont1">';
									 echo substr($news_item['body'],0,150) ."...";
									  
									echo ' </div>';
						}
							 else{
									echo ' <div class="main">';
									echo substr($news_item['body'],0,150) ."...";
									echo ' </div>';
								 
								 
							 }
						?>	
								
								</p>
							  </article>
				 
				  <?php endforeach ?>
				   </div>
				</div>

			  </div>
			</div>
			
			
			
			<!--Category:Politics-->
			<div class="one_half first">
			  <div class="panel-group">
				

				<div class="panel panel-primary">
				
				  <div class="panel-heading" style="background-color:#FF9900">Politics</div>
				  <div class="panel-body">
				  <?php foreach ($newsPolitics as $news_item): ?>
				  
				               <article class="clear push20">
								<h2 class="font-medium nospace">
								<a href="<?php echo base_url().'index.php/news/'.$news_item['n_id'] ?>"><?php echo $news_item['title'] ?></a></h2>
								<p class="nospace">
								<?php if($news_item['font']=="2"){
									echo ' <div class="main" style="font-size:17px;font-family:tamilFont1">';
									 echo substr($news_item['body'],0,150) ."...";
									  
									echo ' </div>';
						}
							 else{
									echo ' <div class="main">';
									echo substr($news_item['body'],0,150) ."...";
									echo ' </div>';
								 
								 
							 }
						?>	
								
								</p>
							  </article>
				 
				  <?php endforeach ?>
				   </div>
				</div>

			  </div>
			</div>
			<!--Category-->
			
			
						<!--Category:Education-->
			<div class="one_half">
			  <div class="panel-group">
				

				<div class="panel panel-primary">
				
				  <div class="panel-heading" style="background-color:#FF9900">Education</div>
				  <div class="panel-body">
				  <?php foreach ($newsEducation as $news_item): ?>
				  
				               <article class="clear push20">
								<h2 class="font-medium nospace">
								<a href="<?php echo base_url().'index.php/news/'.$news_item['n_id'] ?>"><?php echo $news_item['title'] ?></a></h2>
								<p class="nospace">
								<?php if($news_item['font']=="2"){
									echo ' <div class="main" style="font-size:17px;font-family:tamilFont1">';
									 echo substr($news_item['body'],0,150) ."...";
									  
									echo ' </div>';
						}
							 else{
									echo ' <div class="main">';
									echo substr($news_item['body'],0,150) ."...";
									echo ' </div>';
								 
								 
							 }
						?>	
								
								</p>
							  </article>
				 
				  <?php endforeach ?>
				   </div>
				</div>

			  </div>
			</div>
			<!--Category-->
			
			
			
						<!--Category:Local-->
			<div class="one_half first">
			  <div class="panel-group">
				

				<div class="panel panel-primary">
				
				  <div class="panel-heading" style="background-color:#FF9900">Local</div>
				  <div class="panel-body">
				  <?php foreach ($newsLocal as $news_item): ?>
				  
				               <article class="clear push20">
								<h2 class="font-medium nospace">
								<a href="<?php echo base_url().'index.php/news/'.$news_item['n_id'] ?>"><?php echo $news_item['title'] ?></a></h2>
								<p class="nospace">
								<?php if($news_item['font']=="2"){
									echo ' <div class="main" style="font-size:17px;font-family:tamilFont1">';
									 echo substr($news_item['body'],0,150) ."...";
									  
									echo ' </div>';
						}
							 else{
									echo ' <div class="main">';
									echo substr($news_item['body'],0,150) ."...";
									echo ' </div>';
								 
								 
							 }
						?>	
								
								</p>
							  </article>
				 
				  <?php endforeach ?>
				   </div>
				</div>

			  </div>
			</div>
			<!--Category-->
			
						<!--Category:General-->
			<div class="one_half">
			  <div class="panel-group">
				

				<div class="panel panel-primary">
				
				  <div class="panel-heading" style="background-color:#FF9900">General</div>
				  <div class="panel-body">
				  <?php foreach ($newsGeneral as $news_item): ?>
				  
				               <article class="clear push20">
								<h2 class="font-medium nospace">
								<a href="<?php echo base_url().'index.php/news/'.$news_item['n_id'] ?>"><?php echo $news_item['title'] ?></a></h2>
								<p class="nospace">
								<?php if($news_item['font']=="2"){
									echo ' <div class="main" style="font-size:17px;font-family:tamilFont1">';
									 echo substr($news_item['body'],0,150) ."...";
									  
									echo ' </div>';
						}
							 else{
									echo ' <div class="main">';
									echo substr($news_item['body'],0,150) ."...";
									echo ' </div>';
								 
								 
							 }
						?>	
								
								</p>
							  </article>
				 
				  <?php endforeach ?>
				   </div>
				</div>

			  </div>
			</div>
			<!--Category-->
			
		</div>
	
	
	
	
	
	
	
	
	
	
	
	
	
		<div class="divide"></div>
      <div class="two_third first">
		
		<?php
			$i=0; $j=0;
		foreach ($images as $news_item): ?>
		
       <?php
          
          $storedNew[$i][0] = $news_item['title'] ;
          $storedNew[$i][1] = $news_item['body'] ;
		  $storedNew[$i][2] = $news_item['n_id'] ;
		  $storedNew[$i++][3] = $news_item['url'] ; ?>		
	
		<?php endforeach ?>
		
		<?php for($i=0;$i<count($storedNew);$i=$i+2){ 
		   $j=$i+1;
		?>
			
			  <article class="one_half push30 first" style="padding:18px">
			  <div class="push20">
				  <img src="<?php echo base_url().''. $storedNew[$i][3]; ?>" alt="" style="height:200px;width:250px;"></div>
				  <h2><?php echo  $storedNew[$i][0]; ?></h2>
				  <p><?php echo  substr($storedNew[$i][1],0,300); ?></p>
				  <footer class="read-more"><a href="<?php echo base_url().'index.php/news/'. $storedNew[$i][2]; ?>">Read More &raquo;</a></footer>
			</article>
			
			<article class="one_half push30" style="padding:18px">
			  <div class="push20">
				  <img src="<?php echo base_url().''. $storedNew[$j][3]; ?>" alt="" style="height:200px;width:250px;"></div>
				  <h2><?php echo  $storedNew[$j][0]; ?></h2>
				  <p><?php echo  substr($storedNew[$j][1],0,300); ?></p>
				  <footer class="read-more"><a href="<?php echo base_url().'index.php/news/'. $storedNew[$j][2]; ?>">Read More &raquo;</a></footer>
			</article>
			
			
		
		<?php }?>

		
   
	   
	</div>
		   <div class="one_third">
					   
			<div class="tab-wrapper clear">
				  
				<div class="tab-container">

				<div id="tab-1" class="tab-content clear">
				<div><p style="color:#FF9900;"> Business Ads </p></div>
				<?php foreach ($homeAds as $homeAd): ?>
					<img class="multimedia" style="height:300px; width:250px" src="<?php echo base_url().''.$homeAd['path'] ?>" >
					<
				<?php endforeach ?>
				<div style="margin:10px 10px;font-size:12px;color:#FF9900;"> Want your Ads to be displayed?</br><a href="<?php echo base_url().'index.php/news/advertise'; ?>" title="ads">click here!</a> </div>
				</div>
			   </div>
			</div>
	

		   

	   </div>
	   
	   
        <div class="clear push30"></div>
	   	<div class="accordion-wrapper"><a href="javascript:void(0)" class="accordion-title orange"><span>Times Of India</span></a>
          <div class="accordion-content">
            <?php

			include('simple_html_dom.php');
 
			// Retrieve the DOM from a given URL
			$html = file_get_html('http://timesofindia.indiatimes.com/');

			foreach($html->find('div.top-story ul.list8 a') as $e)
			echo "<p>$e->innertext </p>";
			?>
			</div>
        </div>
		
        <div class="accordion-wrapper"><a href="javascript:void(0)" class="accordion-title orange"><span>Herald Goa</span></a>
          <div class="accordion-content">
            <?php
		

			//$html = file_get_html('http://www.navhindtimes.in/category/goanews/');
			
			$html = file_get_html('http://www.heraldgoa.in/index.php');
			$i=0;
			foreach($html->find('div#home-right ul.top-news a') as $e)
			{
				if($i < 5)
				{
					echo "<p>$e->innertext</p>";
					$i++;
				}
			}
			?>	
			
          </div>
        </div>
	    <div class="clear push30"></div>
	   	
	  
	   
	<!--Images-->  
	<div class="push30">
        <ul class="nospace clear">

			<?php foreach ($images as $news_item): ?>
          <li class="one_quarter"><a href="<?php echo base_url().'index.php/news/'.$news_item['n_id'] ?>"><img class="multimedia" src="<?php echo base_url().''.$news_item['url'] ?>" style="height:150px;width:150px;"/>
            <p class="bold"><?php echo $news_item['title'] ?></p>
            </a></li>
			<?php endforeach ?>
        </ul>
    </div>
	  
	<!--Videos--> 
      <div class="push30">
        <ul class="nospace clear">

			<?php foreach ($videos as $news_item): ?>
          <li class="one_quarter">
		  <a href="news/viewVideo?videoLink=<?php echo base_url().''.$news_item['url'] ?>" target="_blank">
		 <img class="multimedia" src="<?php echo base_url().'uploads/default.jpg'?>" style="height:150px;width:150px;"/>
            <p><a href="<?php echo base_url().'index.php/news/'.$news_item['n_id'] ?>"><?php echo $news_item['title'] ?></a></p>
            </a></li>
			<?php endforeach ?>
        </ul>
      </div>
	  
	  
		


	<div class="imagesClear"></div>
	
  </div>

       
	
	
	
	</div>
	
<script>
    var links=document.getElementsByTagName('a');
	/*
	for(var i=0;i<links.length;i++){
	    links[i].href="#";
		links[i].style.textDecoration="none";
	}*/
	
	
	
</script>