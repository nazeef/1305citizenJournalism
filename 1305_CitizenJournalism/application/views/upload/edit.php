<?php //echo base_url();?>
<?php //echo validation_errors(); 
//var_dump($this->session->userdata('msg'));
//var_dump($news);
$this->session->set_userdata('n_id',$news['n_id']);			
$i=0;
echo $this->session->userdata('msg');
?>




<div class="wrapper row3" style="color:black;">
  <div id="container" ng-app="myApp" ng-controller="customersCtrl">
    <!-- ################################################################################################ -->
    <div id="homepage" class="clear">

<form  id="uploadForm" name="uploadForm" action="<?php $news['n_id']?>" method="post" enctype="multipart/form-data" ng-submit="submitForm(uploadForm.$valid)" novalidate>


<fieldset id="field1">

<legend align="center"><h2><span class="label label-primary">CITIZEN JOURNALISM</span></h2></legend>

	<h2 class="nospace"><strong>Edit News</strong></h2>
	<div class="divide"></div>
	
	<div style="float:right;width:40%;height:10%;position:relative;">
	<div class="boxholder push20 rnd8"><img class="img-responsive rnd8" style="border 6px grey" src="<?php echo base_url();?>css/scraper.jpg" ></div>
		
	
	</div>
<div class="col-xs-6 col-xs-6">

	<div class="form-group"  ng-class="{ 'has-error' : uploadForm.title.$invalid && !uploadForm.title.$pristine }"  >
		<h4><span class="label label-default">Title</span></h4>
			 <div class="input-group">
				<input id="title" class="form-control" ng-class="{ 'has-error' : uploadForm.title.$invalid && !uploadForm.title.$pristine }" type="text"  name="title" value="<?php echo $news['title']?>"  ng-maxlength="100" required>
				<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
           	</div>
		<p ng-show="uploadForm.title.$invalid && !uploadForm.title.$pristine" class="help-block"></p>	  
		<p ng-show="uploadForm.title.$error.maxlength" class="help-block" style="color:red">Title is too long.</p>
	</div>

	<br/>
            <div class="form-group">
                 <div class="input-group">
                     <input id="email" type="email" readonly value="<?php echo $email;?>" class="form-control " placeholder="Enter Email" name="email" ng-class="{ 'has-error' : uploadForm.email.$invalid && !uploadForm.email.$pristine }"/>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>


	<div class="form-group">
		
			 <h4><span class="label label-default">Category</span></h4>
        <div class="input-group"  ng-controller="customersCtrl"> 
			 <select id="category" class="form-control" name="category">
					<option ng-repeat="x in names" value="{{ x.Name }}"> {{ x.Country }}</option>
			</select>
			<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                            
			
		</div>
	</div>

<br/>
	<div class="form-group">
		<h4><span class="label label-default">Author</span></h4>
        <div class="input-group" >
		<input id="author" class="form-control" type="text" name="author" value="<?php echo $author ;?>" readonly>
		<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
		</div>
		 
    </div>
	<br/>
</div>	
<div style="clear:both;padding:18px;">
	<div class="form-group"  ng-class="{ 'has-error' :uploadForm.body.$invalid && !uploadForm.body.$pristine }"  >
		<h4><span class="label label-default">News</span></h4>
		<textarea rows="12" cols=150" class="form-control" ng-class="{ 'has-error' :uploadForm.body.$invalid && !uploadForm.body.$pristine }" name="body"  ng-minlength="20" ng-maxlength="300" required>
		<?php echo $news['body']?></textarea>
		 <p ng-show="uploadForm.body.$error.minlength" class="help-block">News cannot be shorter than 20 characters.</p>
		 <p ng-show="uploadForm.body.$error.maxlength" class="help-block">News cannot be longer than 300 characters.</p>
	</div>
</div>	


 <div class="main" style="padding:18px;">
   <?php foreach ($multimedia as $mult_item): ?>
         <?php $i++; ?>
   
         <?php if(substr($mult_item['type'],0,5)=="image"){ ?>
			<!--a href="<?php echo base_url().''.$mult_item['url'] ?>"-->
				<img class="multimedia" src="<?php echo base_url().''.$mult_item['url'] ?>" style="height:150px;width:150px;"/>
			<!--/a-->
	    <?php } ?>
	  
        <?php if(substr($mult_item['type'],0,5)!="image"){ ?>
			<a href="<?php echo base_url().''.$mult_item['url'] ?>" target="_blank">
				<img class="multimedia" src="<?php echo base_url().'uploads/default.jpg' ?>" style="height:150px;width:150px;"/>
			</a>
	    <?php } ?>
	<?php endforeach ;?>		
  </div>


  
  <div class="del" style="padding:18px;">
   <?php for($j=0;$j<$i;$j++){ ?>
        <a href="<?php echo base_url().'index.php/news/deleteMedia/'.$mult_item['n_id'].'/'.$mult_item['media_id'] ?>" style="color:red;font-weight:bold;font-size:1.2em">
		   Delete
        </a>		
	<?php }?>		
  </div>
  <div style="padding:18px;">
<h4><span class="label label-default" >Attachments</span></h4>
<input type="file" name="userfile"/>
<br/>
<input class="button small gradient orange rnd8" type="submit" id="submit" name="submit" value="Save" ng-disabled="uploadForm.$invalid"/>
<input class="button small gradient orange rnd8" type="reset" id="reset" name="reset"/>
  </div>   
</fieldset>

</form>
</div>
</div>
</div>

<script>
var app = angular.module('myApp', []);
app.controller('customersCtrl', function($scope, $http) {
    $http.get("http://localhost/citizen/category.php")
    .success(function (response) {$scope.names = response.records;});
	
  // function to submit the form after all validation has occurred            
  $scope.submitForm = function(isValid) {

    // check to make sure the form is completely valid
  //  if (isValid) {
    //  alert('form uploaded successfully');
    //}

  };

});


</script>


