<?php echo validation_errors(); 
  // var_dump($this->session->all_userdata());
   
   if($this->session->userdata('msg'))
	    echo $this->session->userdata('msg');
		
	
     
?>
<div class="container">

	<form  id="uploadForm" name="uploadForm" action="login" method="post">

		<fieldset id="field1">

			<legend align="center"><h2><span class="label label-primary">MEMBER LOGIN</span></h2></legend>
             <?php if($this->session->userdata('message')){
	                   echo $this->session->userdata('message');
                       $this->session->unset_userdata('message');					   
					}   
					   ?>
			
			<h4><span class="label label-default">Email</span></h4><input id="email" type="email" name="email" value="">
			
			<h4><span class="label label-default">Password</span></h4><input id="password" type="password" name="password" value="">
			<br>
			


			<br/><input type="submit" class="button medium gradient purple rnd8" id="submit" name="submit" value="Login"/><input type="reset" id="reset" name="reset"/>
     
		</fieldset>
	</form>

</div>