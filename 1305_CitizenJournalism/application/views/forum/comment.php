<?php	//var_dump( $comment); 
 ?>
<div class="wrapper row3">
  <div id="container">
    <!-- ################################################################################################ -->
    <div id="homepage" class="clear"  ng-app="myApp">	
	<div class="screen-pad">
		<div class="screen-pad">
	 <div class="tab-wrapper clear" style="background-color:#f9f9f9;">
          
          <div class="tab-container">

            <div id="tab-1" class="tab-content clear" >
			
	<div style="font-size:18px;font-weight:bold ;color:#FF9900">COMMENTS :</div>
	<div class="divide"></div>
<?php foreach ($comment as $comment_item): ?>

    
	<div class="mname" style="font-size:19px;font-weight:bold;color:grey;padding-top:30px;">
	<?php echo $comment_item['fname']." ".$comment_item['mname']." ".$comment_item['lname']; ?></div>
  
		<br/>
	   <?php echo "<div style=font-size:20px>". $comment_item['comment'] ."</div>"?>
		<br/>
    
	<?php echo "<div style=float:right;font-size:14px;font-weight:bold> <span style='color:#FF9900'> TIME :</span>".$comment_item['time']." <span style='color:#FF9900'> DATE :</span>".$comment_item['date'] ."</div>";?>
 <div class="divide"></div>

<?php endforeach ?>
<br><br>

<?php if($this->session->userdata('fname')){?>

	<form  id="forumCommentPost" name="forumCommentPost" action="commentPost" method="post"  enctype="multipart/form-data"  ng-submit="submitForm(forumCommentPost.$valid)" novalidate>

	<h4><span class="label label-default">Comment : </span></h4>
		<div class="form-group"  ng-class="{ 'has-error' :forumCommentPost.comment.$invalid && !forumCommentPost.comment.$pristine }"  >
		<h4  style="clear:both;" >
		<textarea class="form-control" placeholder="Enter Comment" ng-class="{ 'has-error' :forumCommentPost.comment.$invalid && !forumCommentPost.comment.$pristine }" 
		rows="5" cols=30" name="comment" ng-model="comment"  required></textarea>
	</div>
	
	<input type="hidden" id="fpost" name="fpost" value="<?php echo $forum_item['f_id'];?>"/>
	<input class="button medium gradient orange rnd8" type="submit" id="submit" name="submit" value="Post" ng-disabled="forumCommentPost.$invalid"/>
			 
	</form>
<?php
}
else{
?>
     <div class="alert-msg error rnd8">Please Login to comment</div>
	 <?php
}
?>
</div>
</div>
</div>
	</div>
	</div>
	<div class="imagesClear"></div>
	
  </div>

       </div>
	
	
	
	</div>
	<script>
	
var app = angular.module('myApp', []);
	
	
  // function to submit the form after all validation has occurred            
 



	</script>