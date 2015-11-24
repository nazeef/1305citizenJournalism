
<div class="container">

<form  id="forumPost" name="forumPost" action="upload" method="post"  enctype="multipart/form-data">

<fieldset id="field1">

<legend align="center"><h2><span class="label label-primary">CITIZEN JOURNALISM</span></h2></legend>

<br/><a href="<?php echo base_url().'index.php/forum/upload'?>"><input style="color:black;font-size:1.5em;font-weight:bold;" type="button" id="button" name="button" value="POST IN FORUM"/></a>
     
</fieldset>
</form>

</div>



<?php foreach ($forum as $forum_item): ?>

    <div class="main">
        <?php echo $forum_item['fpost'] ?>
    </div>
    <p><a href="<?php echo base_url().'index.php/forum/'.$forum_item['f_id'] ?>" style="color:red;">View Forum</a></p>

<?php endforeach ?>