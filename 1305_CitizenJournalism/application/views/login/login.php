<?php echo validation_errors(); 
  // var_dump($this->session->all_userdata());
  
 
if($this->session->userdata('msg'))
	    echo $this->session->userdata('msg');
   ?>   


    

<div class="wrapper row3">
  <div id="container">
    <!-- ################################################################################################ -->
    <div id="homepage" class="clear" style="padding:18px;">

	<form  id="uploadForm" name="uploadForm" action="login" method="post">

		<fieldset id="field1"  >

				
	
	<div style="padding-left:250px;padding-right:250px;">
	<h2 class="nospace"><strong>Login</strong></h2>
	<div class="divide"></div>
	<br/>
             <?php if($this->session->userdata('message')){
	                   echo $this->session->userdata('message');
                       $this->session->unset_userdata('message');					   
					}   
					   ?>
			
			
			

                        <div class="form-group">
                            <div class="input-group">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value="" required/>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope" style="color:#23527C"></span></span>
                            </div>
                        </div>			
			

                        <div class="form-group">
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required/>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                            </div>
                        </div>			
			
		
			<br/><input class="button small gradient orange rnd8" type="submit" id="submit" name="submit" value="Login"/>
			<input class="button small gradient orange rnd8" type="reset" id="reset" name="reset"/>
			</div>
		</fieldset>
	</form>
	</div>
	<div class="imagesClear"></div>
	</div>
  </div>

       
	
	
	
	</div>