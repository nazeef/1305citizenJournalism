<?php
//  var_dump($this->session->userdata('profile_image'));
?>

<div class="wrapper row3">
  <div id="container">
    <!-- ################################################################################################ -->
    <div id="homepage" class="clear">
	
<div class="screen-pad">

<form  id="forumPost" name="forumPost" action="upload" method="post"  enctype="multipart/form-data">

<fieldset id="field1">

<legend align="center"><h2><span class="label label-primary">CITIZEN JOURNALISM</span></h2></legend>

<br/>
<!--<a href="<?php echo base_url().'index.php/forum/upload'?>">
<input style="color:black;font-size:1.5em;font-weight:bold;" type="button" id="button" name="button" value="POST IN FORUM"/></a>-->
  	<h2 class="nospace"><strong>Forum Post</strong></h2>
	<div class="divide"></div>
     
</fieldset>

</form>





<?php foreach ($forum as $forum_item): ?>

    <div class="main">
	
		<figure class="imgl boxholder" >
		  <?php if($forum_item['profile_image']){ ?>
			   <img style="height:140px;width:120px;" src="<?php echo base_url().'profile/'.$forum_item['profile_image'] ?>" alt="">
			<?php } 
			else { ?>
			    <img style="height:140px;width:120px;" src="<?php echo base_url().'profile/default.jpg' ?>" alt="">
			<?php } ?>
		</figure>
		<br/>
	    <br/>
        <h2  style="padding-left:18%;"><?php echo $forum_item['fpost'] ?></h2><br/><br/>
    </div>
    <p style="padding-left:18%;"><a href="<?php echo base_url().'index.php/forum/'.$forum_item['f_id'] ?>" style="font-size:18px;">View Forum</a></p><br/>

<?php endforeach ?>

	</div>
	<!--
<div class="screen-pad">-->
		
	<p><?php //echo $links; ?></p>
	<div class="imagesClear"></div>
	
  </div>

       
	
	
	</div>
	</div>