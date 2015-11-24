<?php foreach ($comment as $comment_item): ?>

    <div class="main container backgroundimage" style="color:black;">
	    <span class="mname"><?php echo $this->session->userdata('fname')." ".$this->session->userdata('mname')." ".$this->session->userdata('lname') ?></span>
        <?php echo $comment_item['comment'] ?>
		<?php echo $comment_item['time']."  ".$comment_item['date'];?>
    </div>
 

<?php endforeach ?>

<?php if($this->session->userdata('fname')){?>

	<form  id="forumCommentPost" name="forumCommentPost" action="commentPost" method="post"  enctype="multipart/form-data">

	<h4><span class="label label-default">Comment : </span></h4><textarea rows="5" cols=30" name="comment"></textarea>

	<input type="hidden" id="fpost" name="fpost" value="<?php echo $forum_item['f_id'];?>"/>
	<input type="submit" id="submit" name="submit" value="Post"/>
		 
	</form>
<?php
}
else{
?>
     <div class="alert-msg error">Please Login to comment</div>
	 <?php
}
?>