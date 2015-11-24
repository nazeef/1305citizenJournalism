<div class="wrapper row3">
  <div id="container"  ng-app="myApp" ng-controller="customersCtrl">
    <!-- ################################################################################################ -->
    <div id="homepage" class="clear">
	
	<?php echo validation_errors(); 
  // var_dump($this->session->all_userdata());
  
 
if($this->session->userdata('msg')){
	    echo $this->session->userdata('msg');
		$this->session->unset_userdata('msg');
	}	
   ?>   
	
	
<div class="screen-pad">


<div>
	<div>
		<div class="boxholder push20 rnd8"><img class="img-responsive rnd8" style="border 6px grey" src="<?php echo base_url();?>css/capture.jpg" ></div>
	</div>
	
</div>
<div class="row">
<div class="col-xs-6 col-md-4">
	<form  id="advertise" name="advertise" action="uploadAdvertise" method="post" enctype="multipart/form-data">
		<input type='file' name="userfile" onchange="readURL(this);" /><br/>
			<div class="form-group">
                            <div class="input-group" >
                                 <input id="name" name="name" type="text" class="form-control " placeholder="Enter name">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                            </div>
                        </div>
						<div style="width:200px;height:200px;">
	<img id="blah" src="<?php echo base_url();?>css/download.jpg" alt="your image" style="width:200px;height:200px"/>
</div>
	<br/><input class="button small gradient orange rnd8" type="submit" id="submit" name="submit"/>
	
	</form>
</div>
</div>
					

	</div>
	
	
	
</div>
</div>
</div>
	

<script>
function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
					//.attr('display','block')
                    .width(150)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>