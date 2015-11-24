<?php echo validation_errors(); 
    //var_dump($this->session->all_userdata());
	$email="";
     if($this->session->userdata('name')){
	    $author=$this->session->userdata('fname')." ".$this->session->userdata('mname')." ".$this->session->userdata('lname');
		$email=$this->session->userdata('email');
	}	
     else
	    $author="Anon";
	
?>
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
  <div id="container"  ng-app="myApp" ng-controller="customersCtrl">
    <!-- ################################################################################################ -->
    <div id="homepage" class="clear">
<div class="screen-pad">
<form  id="uploadForm" name="uploadForm" action="upload" method="post"  enctype="multipart/form-data" ng-submit="submitForm(uploadForm.$valid)" novalidate>

	<fieldset id="field1">

	<legend align="center"><h2><span class="label label-default">CITIZEN JOURNALISM</span></h2></legend>
	
	<!--<h4><span class="label label-info">Title</span></h4><input id="title" type="text" name="title" value="">-->
	<h2 class="nospace"><strong>Upload News</strong></h2>
	<div class="divide"></div>
	
	<div style="float:right;width:40%;height:10%;position:relative;">
	<div class="boxholder push20 rnd8"><img class="img-responsive rnd8" style="border 6px grey" src="<?php echo base_url();?>css/scraper.jpg" ></div>
		
	
	</div>
	<br/>
	<br/>
	
<div class="col-xs-6 col-xs-6">
	<div>
	<br/><input class="button small gradient orange rnd8" type="button" id="hindi" name="hindi" value="hindi" onClick="changefont1()"/>
	<input class="button small gradient orange rnd8" type="button" id="english" name="english" value="english" onClick="changefont2()"/>
	</div>
	<br/>
		<div class="form-group" ng-class="{ 'has-error' : uploadForm.title.$invalid && !uploadForm.title.$pristine }" >
            <div class="input-group">
                <input id="title" class="form-control" placeholder="Enter title" ng-class="{ 'has-error' : uploadForm.title.$invalid && !uploadForm.title.$pristine }" type="text" name="title" value="" ng-model="title" ng-maxlength="100" required>
				<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
            </div>
				<p ng-show="uploadForm.title.$invalid && !uploadForm.title.$pristine" class="help-block"></p>	  
				<p ng-show="uploadForm.title.$error.maxlength" class="help-block">Title is too long.</p>
				
        </div>
		
		<br/>
			

		
	
		
			<?php if($author=="Anon") {?>
	            <div class="form-group" ng-class="{ 'has-error' :uploadForm.author.$invalid && !uploadForm.author.$pristine }">
                    <div class="input-group">
					
                            <input id="author" placeholder="Enter author" ng-model="author" ng-class="{ 'has-error' :uploadForm.author.$invalid && !uploadForm.author.$pristine }"	type="text" class="form-control " name="author" value="<?php echo $author; ?>" ng-maxlength="25" required>
							<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
							
                    </div>
					<p ng-show="uploadForm.author.$invalid && !uploadForm.author.$pristine" class="help-block"></p>	  
					<p ng-show="uploadForm.author.$error.maxlength" class="help-block">Author is too long.</p>
                </div>
			<?php }?>
			
			
			<?php if($author!="Anon") {?>	
			<div class="form-group">
                 <div class="input-group">
                     <input id="author" type="text" class="form-control " readonly name="author" value="<?php echo $author; ?>">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
			<?php }?>
			

		
		<br/>
		
			<div class="form-group">
                 <div class="input-group">
                     <input  id="email" type="email" value="<?php echo $email;?>" class="form-control " ng-model="email.email" placeholder="Enter Email" name="email" ng-class="{ 'has-error' : uploadForm.email.$invalid && !uploadForm.email.$pristine } required"/>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span>
					</span>
                </div>
				  <p style="color:red" ng-show="uploadForm.email.$error.required" class="help-block">required</p>
      <p style="color:red" ng-show="uploadForm.email.$error.email" class="help-block" >invalid email</p>

            </div>
			
			
			
			
                        <div class="form-group">
                            <div class="input-group" ng-app="myApp" ng-controller="customersCtrl">
                                <select id="category"  class="form-control " name="category">
									<option ng-repeat="x in names" value="{{ x.Name }}"> {{ x.Country }}</option>
								</select>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                            </div>
                        </div>

		<br/>
		
	
	
	</div>
	
	<div class="form-group"  ng-class="{ 'has-error' :uploadForm.body.$invalid && !uploadForm.body.$pristine }"  >
		<h4  style="clear:both;" >
		<textarea class="form-control" id="body" placeholder="Enter news" ng-class="{ 'has-error' :uploadForm.body.$invalid && !uploadForm.body.$pristine }" rows="12" cols="150" name="body" ng-model="body" ng-minlength="20"  required></textarea>
		 <p ng-show="uploadForm.body.$error.minlength" class="help-block">News cannot be shorter than 20 characters.</p>
	</div>

<!---Hidden-->
      <input id="hidden" type="hidden" name="hidden" class="form-control " value="1">
                    


	</div><!--row-->
	<h4><span class="label label-default">Attachments</span></h4>
	
	<div class="row">
		<div class="col-xs-6 col-md-4">
	<input type="file" name="userfile"/><br/>
	<input type="file"  name="userfile2"/><br/>
	<input type="file" name="userfile3"/>
	</div>
	</div>
	<div>
	<br/><input class="button small gradient orange rnd8" type="submit" id="submit" name="submit" value="Upload" ng-disabled="uploadForm.$invalid"/>
	<input class="button small gradient orange rnd8" type="reset" id="reset" name="reset"/>
	</div>
</div>	
	</fieldset>
		
</form>


</div>
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
    //if (isValid) {
      //alert('form uploaded successfully');
    //}

  };

});

	function changefont1(){
		document.getElementById("body").style.fontFamily = "tamilFont1";
		document.getElementById("hidden").value="2";
	}
	function changefont2(){
		document.getElementById("body").style.fontFamily = "Impact,Charcoal,sans-serif";
		document.getElementById("hidden").value='1';
	}
	

</script>