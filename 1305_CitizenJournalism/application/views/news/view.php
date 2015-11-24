	<!-- Add jQuery library -->
	<script type="text/javascript" src="../../js/lib/jquery-1.10.1.min.js"></script>

	<!-- Add mousewheel plugin (this is optional) -->
	<script type="text/javascript" src="../../js/lib/jquery.mousewheel-3.0.6.pack.js"></script>

	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="../../js/source/jquery.fancybox.js?v=2.1.5"></script>
	<link rel="stylesheet" type="text/css" href="../../js/source/jquery.fancybox.css?v=2.1.5" media="screen" />

	<!-- Add Button helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="../../js/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
	<script type="text/javascript" src="../../js/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>

	<!-- Add Thumbnail helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="../../js/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
	<script type="text/javascript" src="../../js/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

	<!-- Add Media helper (this is optional) -->
	<script type="text/javascript" src="../../js/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */

			$('.fancybox').fancybox();

			/*
			 *  Different effects
			 */

			// Change title type, overlay closing speed
			$(".fancybox-effects-a").fancybox({
				helpers: {
					title : {
						type : 'outside'
					},
					overlay : {
						speedOut : 0
					}
				}
			});

			// Disable opening and closing animations, change title type
			$(".fancybox-effects-b").fancybox({
				openEffect  : 'none',
				closeEffect	: 'none',

				helpers : {
					title : {
						type : 'over'
					}
				}
			});

			// Set custom style, close if clicked, change title type and overlay color
			$(".fancybox-effects-c").fancybox({
				wrapCSS    : 'fancybox-custom',
				closeClick : true,

				openEffect : 'none',

				helpers : {
					title : {
						type : 'inside'
					},
					overlay : {
						css : {
							'background' : 'rgba(238,238,238,0.85)'
						}
					}
				}
			});

			// Remove padding, set opening and closing animations, close if clicked and disable overlay
			$(".fancybox-effects-d").fancybox({
				padding: 0,

				openEffect : 'elastic',
				openSpeed  : 150,

				closeEffect : 'elastic',
				closeSpeed  : 150,

				closeClick : true,

				helpers : {
					overlay : null
				}
			});

			/*
			 *  Button helper. Disable animations, hide close button, change title type and content
			 */

			$('.fancybox-buttons').fancybox({
				openEffect  : 'none',
				closeEffect : 'none',

				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,

				helpers : {
					title : {
						type : 'inside'
					},
					buttons	: {}
				},

				afterLoad : function() {
					this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
				}
			});


			/*
			 *  Thumbnail helper. Disable animations, hide close button, arrows and slide to next gallery item if clicked
			 */

			$('.fancybox-thumbs').fancybox({
				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,
				arrows    : false,
				nextClick : true,

				helpers : {
					thumbs : {
						width  : 50,
						height : 50
					}
				}
			});

			/*
			 *  Media helper. Group items, disable animations, hide arrows, enable media and button helpers.
			*/
			$('.fancybox-media')
				.attr('rel', 'media-gallery')
				.fancybox({
					openEffect : 'none',
					closeEffect : 'none',
					prevEffect : 'none',
					nextEffect : 'none',

					arrows : false,
					helpers : {
						media : {},
						buttons : {}
					}
				});

			/*
			 *  Open manually
			 */

			$("#fancybox-manual-a").click(function() {
				$.fancybox.open('1_b.jpg');
			});

			$("#fancybox-manual-b").click(function() {
				$.fancybox.open({
					href : 'iframe.html',
					type : 'iframe',
					padding : 5
				});
			});

			$("#fancybox-manual-c").click(function() {
				$.fancybox.open([
					{
						href : '1_b.jpg',
						title : 'My title'
					}, {
						href : '2_b.jpg',
						title : '2nd title'
					}, {
						href : '3_b.jpg'
					}
				], {
					helpers : {
						thumbs : {
							width: 75,
							height: 50
						}
					}
				});
			});


		});
	</script>
	<style type="text/css">
		.fancybox-custom .fancybox-skin {
			box-shadow: 0 0 50px #222;
		}


	</style>
	
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
	<div style="color:green;font-size:20px;">
	     <?php
				echo $this->session->userdata('message'); 
				$this->session->unset_userdata('message');		   
         ?>	
	</div>
<h2 class="nospace"><strong>News</strong></h2>
	<div class="divide"></div>
	<div style="float:right">
<a href="javascript:fbShare('<?php echo $news_item['title']; ?>', 'Fb Share', 'Facebook share popup', 'http://goo.gl/dS52U', 520, 350)">
<img src="<?php echo base_url().'css/fb.jpg'; ?>" class=" rnd8" style="height:30px; width:100px"/>
</a>



<p class="col-xs-5 col-xs-offset-1" id="custom-tweet-button"> 
<a target="_blank" class="twitter-share-button shareButton twitter popup" href="http://twitter.com/share?text=<?php echo $news_item['title']; ?>"  data-text="<?php echo $news_item['title']; ?>" data-count="none" data-url="https://www.google.com">
<img src="<?php echo base_url().'css/tweet.png'; ?>"  class="img-responsive rnd8" alt="" style="height:28px; width:160px" />
</a> 
</p>
</div>
<?php

echo '<h2>'.$news_item['title'].'</h2>';
?>



 <div class="main">
   <div id="main_container">
   <?php foreach ($multimedia as $mult_item): ?>

      <?php if(substr($mult_item['type'],0,5)=="image"){ ?>
						
	<p>
		<a class="fancybox-effects-a" href="<?php echo base_url().''.$mult_item['url'] ?>"  title="">
		<img src="<?php echo base_url().''.$mult_item['url'] ?>" alt="" style="height:150px;width:150px;" onclick= "clicked()"/></a>

	</p>		
			   
	  <?php } ?>
	  
	  
      <?php if(substr($mult_item['type'],0,5)!="image"){ ?>
			<div class="back">
                <a href="<?php echo base_url().''.$mult_item['url'] ?>" target="_blank">
					<img name="<?php echo base_url().''.$mult_item['url'] ?>" class="multimedia" src="<?php echo base_url().'uploads/default.jpg'?>" style="height:150px;width:150px;"/>
                </a>		
		</div>
	  <?php } ?>	
	  
	<?php endforeach ;?>		
  </div>
  
   <div id="new">	
            	</div>
  
  
  
 
    <br/>
<?php
if($news_item['font']=="2"){
     echo "<div style='font-size:17px;font-family:tamilFont1'>".$news_item['body']."</div>";
	// echo "hi";
}	
else{
	echo "<div style='font-size:17px;'>".$news_item['body']."</div>";
}

echo "<br/>";
echo "<div style='font-weight:bold;'>By ".$name." <span style='color:#FF9900'> - At :</span> ".$news_item['time']."  <span style='color:#FF9900'> On </span>".$news_item['date']."</div>";
?>

<?php if($this->session->userdata('fname')==true && $this->session->userdata('role')=="admin"){ ?>
<div id="edit">
     <a href="<?php echo base_url().'index.php/news/edit/'.$news_item['n_id']; ?>">  Edit this post</a>
</div>
<?php } ?>

<?php if($this->session->userdata('fname')==true && $this->session->userdata('role')!="admin" && $this->session->userdata('m_id')== $news_item['m_id']){ ?>
<div id="edit">
     <a href="<?php echo base_url().'index.php/news/edit/'.$news_item['n_id']; ?>">  Edit this post</a>
</div>

<?php } ?>

<div id="report">
     
	 <a href="#" onclick="show(this.id);"><input class="button small gradient orange rnd8" type="button" value="Report this Article!"></a>
</div>

</p>

<div id="reason" style="display:none;">
	<form name="reason" id="reasonFrm" method="post" action="<?php echo base_url().'index.php/news/report/'.$news_item['n_id']; ?>"/>
		<textarea class="form-control" placeholder="Enter Reason"
		rows="5" cols=30" name="reason" required></textarea>
		<input type="email" name="email" id="email"  placeholder="Enter Email"/>
			<input class="button medium gradient orange rnd8" type="submit" id="submit" name="submit" value="Report"/>
	</form>
</div>



</div>

</div>
</div>
</div>


<script>
    function fbShare(url, title, descr, image, winWidth, winHeight) {
        var winTop = (screen.height / 2) - (winHeight / 2);
        var winLeft = (screen.width / 2) - (winWidth / 2);
        window.open('http://www.facebook.com/sharer.php?s=100&p[title]=' + title + '&p[summary]=' + descr + '&p[url]=' + url + '&p[images][0]=' + image, 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width=' + winWidth + ',height=' + winHeight);
    }
	
	function show(idd){
	     document.getElementById('reason').style.display="block";
		 //idd.style.display="none";
	}
</script>






