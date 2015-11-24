<?php echo validation_errors(); 
 if($this->session->userdata('name'))
	    $author=$this->session->userdata('fname')." ".$this->session->userdata('mname')." ".$this->session->userdata('lname');
     else
	    $author="Anon";
?>

<div class="wrapper row3">
  <div id="container" ng-app="myApp" ng-controller="customersCtrl">
    <!-- ################################################################################################ -->
    <div id="homepage " class="clear screen-pad">
	<div class="screen-pad">
	

<form  id="forumPost" name="forumPost" action="upload" method="post"  enctype="multipart/form-data"  ng-submit="submitForm(forumPost.$valid)" novalidate>
		
	<h2 class="nospace"><strong>Forum Post</strong></h2>
	<div class="divide"></div>
	<br/>
<fieldset id="field1">

<legend align="center"><h2><span class="label label-primary">CITIZEN JOURNALISM</span></h2></legend>
<div class="tab-container">
<div class="row">
<div class="col-xs-6 col-xs-6">
    <div ng-app="myApp" ng-controller="customersCtrl"> 
		 <h4><span class="label label-default">Category</span></h4>
		 <select id="category" name="category" class="form-control">
				<option ng-repeat="x in names" value="{{ x.Name }}"> {{ x.Country }}</option>
		</select>
	</div>
<br><br>
<h4><span class="label label-default">Author</span></h4>
		<?php if($author=="Anon") {?>
			<input class="form-control input-lg" class="form-control" id="author" type="text" name="author" value="<?php echo $author; ?>">
		<?php }?>
		<?php if($author!="Anon") {?>
			<input class="form-control input-lg" class="form-control" id="author" type="text" readonly name="author" value="<?php echo $author; ?>">
		<?php }?>
<br><br>

		<div class="form-group"  ng-class="{ 'has-error' : forumPost.title.$invalid && !forumPost.title.$pristine }"  >
			
				   <h4><span class="label label-default">Post</span></h4>
				   <textarea class="form-control" rows="3" cols="60" name="fpost" placeholder="" ng-class="{ 'has-error' : forumPost.fpost.$invalid && !forumPost.fpost.$pristine }" ng-model="fpost" ng-minlength="10" required></textarea>
				   
				  <p ng-show="forumPost.fpost.$invalid && !forumPost.fpost.$pristine" class="help-block"></p>	  
				  <p ng-show="forumPost.fpost.$error.minlength" class="help-block" style="border:red">Forum post cannot be shorter then 10 characters</p>
		
		</div>


<br/><input class="button small gradient orange rnd8" type="submit" id="submit" name="submit" value="Upload" ng-disabled="forumPost.$invalid"/>
<input class="button small gradient orange rnd8" type="reset" id="reset" name="reset"/>
     
</div>
</div>	 
</div>
</fieldset>
</div>
</form>

	</div>
	<div class="imagesClear"></div>
	
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
    //if (isValid) {
      //alert('form uploaded successfully');
    //}

  };

});


</script>