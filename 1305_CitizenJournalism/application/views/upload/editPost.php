<?php //echo base_url();?>
<?php //echo validation_errors(); 
//var_dump($news);
$this->session->set_userdata('n_id',$news['n_id']);			
$i=0;
echo $this->session->userdata('msg');
?>


<div class="wrapper row3">
  <div id="container" ng-app="myApp" ng-controller="customersCtrl">
    <!-- ################################################################################################ -->
    <div id="homepage" class="clear">
	<div class="screen-pad">
<form  id="uploadForm" name="uploadForm" action="<?php $news['n_id']?>" method="post" enctype="multipart/form-data" ng-submit="submitForm(uploadForm.$valid)" novalidate>

<fieldset id="field1">

<legend align="center"><h2><span class="label label-primary">CITIZEN JOURNALISM</span></h2></legend>

<div class="imagediv">
<img src="scraper.jpg" width="100px" height="100px">
</div>

	<div class="form-group"  ng-class="{ 'has-error' : uploadForm.title.$invalid && !uploadForm.title.$pristine }"  >
		<h4><span class="label label-default">Title</span></h4>
		<input id="title" class="form-control" ng-class="{ 'has-error' : uploadForm.title.$invalid && !uploadForm.title.$pristine }" type="text" placeholder="title" name="title" value="<?php echo $news['title']?>"  ng-maxlength="100" required>
		<p ng-show="uploadForm.title.$invalid && !uploadForm.title.$pristine" class="help-block"></p>	  
		<p ng-show="uploadForm.title.$error.maxlength" class="help-block">Title is too long.</p>
	</div>


<h4><span class="label label-info">Category</span></h4>

	<div ng-app="myApp" ng-controller="customersCtrl"> 
		 <h4><span class="label label-info">Category</span></h4>
		 <select id="category" name="category" class="form-group" >
				<option ng-repeat="x in names" value="{{ x.Name }}"> {{ x.Country }}</option>
		</select>
	</div>

<h4><span class="label label-info">Author</span></h4>
<input id="author" type="text" name="author" class="form-group"  value="<?php echo $author ;?>" readonly>
<br><br><br>

	<div class="form-group"  ng-class="{ 'has-error' :uploadForm.body.$invalid && !uploadForm.body.$pristine }"  >
		<h4><span class="label label-default">News</span></h4>
		<textarea rows="12" cols=150" class="form-control" ng-class="{ 'has-error' :uploadForm.body.$invalid && !uploadForm.body.$pristine }" name="body"  ng-minlength="20" ng-maxlength="300" required>
		<?php echo $news['body']?></textarea>
		 <p ng-show="uploadForm.body.$error.minlength" class="help-block">News cannot be shorter than 20 characters.</p>
		 <p ng-show="uploadForm.body.$error.maxlength" class="help-block">News cannot be longer than 300 characters.</p>
	</div>

 <div class="main">
   <?php foreach ($multimedia as $mult_item): ?>
         <?php $i++; ?>
   
         <?php if(substr($mult_item['type'],0,5)=="image"){ ?>
			<!--a href="<?php echo base_url().''.$mult_item['url'] ?>"-->
				<img class="multimedia img-responsive" src="<?php echo base_url().''.$mult_item['url'] ?>" style="height:150px;width:150px;"/>
			<!--/a-->
	    <?php } ?>
	  
        <?php if(substr($mult_item['type'],0,5)!="image"){ ?>
			<a href="<?php echo base_url().''.$mult_item['url'] ?>" target="_blank">
				<img class="multimedia img-responsive" src="<?php echo base_url().'uploads/default.jpg' ?>" style="height:150px;width:150px;"/>
			</a>
	    <?php } ?>
	<?php endforeach ;?>		
  </div>

  
  
  <div class="del">
   <?php for($j=0;$j<$i;$j++){ ?>
        <a href="<?php echo base_url().'index.php/news/deleteMedia/'.$mult_item['n_id'].'/'.$mult_item['media_id'] ?>">
		   Delete
        </a>		
	<?php }?>		
  </div>
<h4><span class="label label-info">Attachments</span></h4>
<input type="file" name="userfile"/>
<br/>
<input type="submit" class="button small gradient orange rnd8" id="submit" name="submit" value="Save"/>
<input type="reset" class="button small gradient orange rnd8" id="reset" name="reset"/>
     
</fieldset>
</form>
</div>
</div>
</div></div>

<script>
var app = angular.module('myApp', []);
app.controller('customersCtrl', function($scope, $http) {
    $http.get("http://localhost/citizen/category.php")
    .success(function (response) {$scope.names = response.records;});
});

</script>
