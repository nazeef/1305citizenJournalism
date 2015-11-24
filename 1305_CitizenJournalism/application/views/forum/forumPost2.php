<?php echo validation_errors(); 
 if($this->session->userdata('name'))
	    $author=$this->session->userdata('fname')." ".$this->session->userdata('mname')." ".$this->session->userdata('lname');
     else
	    $author="Anon";
?>

<div class="container">

<form  id="forumPost" name="forumPost" action="upload" method="post"  enctype="multipart/form-data">

<fieldset id="field1">

<legend align="center"><h2><span class="label label-primary">CITIZEN JOURNALISM</span></h2></legend>

    <div ng-app="myApp" ng-controller="customersCtrl"> 
		 <h4><span class="label label-info">Category</span></h4>
		 <select id="category" name="category">
				<option ng-repeat="x in names" value="{{ x.Name }}"> {{ x.Country }}</option>
		</select>
	</div>

<h4><span class="label label-info">Author</span></h4>
		<?php if($author=="Anon") {?>
			<input id="author" type="text" name="author" value="<?php echo $author; ?>">
		<?php }?>
		<?php if($author!="Anon") {?>
			<input id="author" type="text" readonly name="author" value="<?php echo $author; ?>">
		<?php }?>

<h4><span class="label label-info">Post</span></h4><textarea rows="3" cols="60" name="fpost"></textarea>

<br/><input type="submit" id="submit" name="submit" value="Upload"/><input type="reset" id="reset" name="reset"/>
     
</fieldset>
</form>

</div>


<script>
var app = angular.module('myApp', []);
app.controller('customersCtrl', function($scope, $http) {
    $http.get("http://localhost/citizen/category.php")
    .success(function (response) {$scope.names = response.records;});
});
</script>
