  
<?php
//var_dump()
    if($this->session->userdata('back_url')){                        // if user is not logged in redirect
	       $back=$this->session->userdata('back_url');
		   $this->session->unset_userdata('back_url');
	        redirect($back, 'refresh');
		}

?> 
         <link rel="stylesheet" href="<?= base_url() ?>public/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>public/registration/registration.css">
        <link rel="stylesheet" href="<?= base_url() ?>public/registration/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet"  href="<?= base_url() ?>public/style/style.css">
        <link rel="icon" type="image/ico" href="<?= base_url() ?>public/images/favicon.ico">
			
			<div class="wrapper row3">
			  <div id="container" id="container" >
				<!-- ################################################################################################ -->
				<div id="homepage" class="clear" style="padding:18px;color:black;">

			
			
			
                <div style="height:62em;margin:2em;color:black;font-weight:bold;">

                    <!form action="" method="post">
                    <div id ="register_form_error" class="alert alert-error"><!---------------------------------Dynamic --></div>

                    <?php echo form_open_multipart('upload/do_upload'); ?>    
                    <div class="col-lg-6" >

                        <div  class="profilecontainer">			
                            <div class="form-group">
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    
                                    <?php
                                            $this->db->select("*")
                                                    ->from("login l , member m , member_address a")
                                                    ->where("l.m_id = m.m_id and l.m_id = a.m_id ")
                                                    ->where("l_id ", $this->session->userdata('l_id'));

                                            $q = $this->db->get();
                                      
                                            foreach ($q->result() as $row) {
                                                
                                         ?> 
                                    
                                    <div class="fileupload-preview thumbnail " style="width: 120px; height:120px;margin-left:auto;margin-right:auto;border:1px dashed #5c5c8a;">
                                        <img id="output" src="<?php echo base_url() . 'profile/' . $row->profile_image;  ?>"  />
									</div>
                                </div>
                            </div> 

                            <div class="upBox">
                                <div class="form-group">

                                    <div class="input-group">
                                               
                                        Name  <input type="text" class="rnd8 form-control input-group-lg" name="InputName" id="Name" value="<?= $row->fname . " " . $row->mname . " " . $row->lname;?> " readonly >
                                        
                                               
                                    </div>
                                </div>


                                <div class="form-group">

                                    <div class="input-group">
                                        Email  <input type="text" class="rnd8 form-control input-group-lg" id="EmailFirst" name="InputEmail" value="<?= $row->email; ?>" readonly >

                                    </div>
                                </div>

                                <div class="form-group">

                                    <div class="input-group">
                                        Mobile No. <input type="text" class="rnd8 form-control input-group-lg" name="InputMobile" id="Mobile" value="<?= $row->contact; ?>" readonly>

                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="input-group dob">

                                        DOB <input type="text" class="rnd8 form-control input-group-lg" name="InputDOB" id="DOB" value="<?= $row->dob; ?>" readonly>	

                                    </div>
                                </div>

                                <div class="form-group">

                                    <div class="input-group">
                                        Address <input type="text" class="rnd8 form-control input-group-lg" name="InputAddress" id="Address" value="<?= $row->address_line; ?>" readonly>

                                    </div>
                                </div>

                                <div class="form-group">

                                    <div class="input-group">
                                        Pin <input type="text" class="form-control" name="InputPin" id="postal_code" value="<?= $row->pin; ?>" readonly>

                                    </div>
                                </div>

                                <div class="form-group">

                                    <div class="input-group">
                                        City <input type="text" class="rnd8 form-control input-group-lg" name="InputCity" id="locality" value="<?= $row->city; ?>" readonly>

                                    </div>
                                </div>

                                <div class="form-group">

                                    <div class="input-group">
                                        State <input type="text" class="rnd8 form-control input-group-lg" name="InputState" id="administrative_area_level_1" value="<?= $row->state; ?>" readonly>

                                    </div>
                                </div>
                               <?php
                                            }
                                         ?> 
                            </div>
                        </div>
                    </div>
                </div>  <!--formdiv -->
            </div>  <!-- row -->
        </div> <!-- Fluid -->
		</div>
   
