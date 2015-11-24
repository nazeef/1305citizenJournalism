
<!DOCTYPE HTML>
<html>
    <head>
        <title>Citizen Journalism</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?= base_url() ?>public/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>public/registration/registration.css">
        <link rel="stylesheet" href="<?= base_url() ?>public/registration/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet"  href="<?= base_url() ?>public/style/style.css">
        <link rel="icon" type="image/ico" href="<?= base_url() ?>public/images/favicon.ico">

    </head>

    <body  onload="initialize();
            Captcha('mainCaptcha');">


    <div class="well well-sm" style="font-size:2em; text-align:center;"><strong>Journalist Registration</strong></div>


    <div class="container" style="background-color:white;height:65em;border:1px solid black;margin-top:2em;">
        <div class="row">
            <div style="background-color:white;height:62em;margin:2em;">

                <!form action="" method="post">
                <div id ="register_form_error" class="alert alert-error"><!---------------------------------Dynamic --></div>



                <?php echo form_open_multipart('upload_1/do_upload'); ?>    
                <div class="col-lg-6" >


                    <div  class="profilecontainer">			
                        <div class="form-group">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-preview thumbnail " style="width: 120px; height:120px;margin-left:auto;margin-right:auto;border:1px dashed #5c5c8a;">
                                    <img id="output" src="<?= base_url() ?>public/registration/defaultprofile.png"  />
                                    <script>

                                        var loadFile = function (event) {

                                            var output = document.getElementById('output');
                                            output.src = URL.createObjectURL(event.target.files[0]);

                                            output.style.width = "152px";
                                            output.style.height = "122px";
                                        };
                                    </script>

                                </div>
                                <div style="margin-left:30%; "> 

                                    <!input type="file" name="userfile" style="color:transparent;" onchange="this.style.color = 'black';"/>
                                    <input type="file" name="userfile" onchange="loadFile(event)" required>

                                    <div><a href="#" class="btn-sm fileupload-exists" data-dismiss="fileupload" style="color:transparent;">Remove</a> </div></div>
                            </div>
                        </div>
                    </div> 


                    <div class="upBox">
                        <div class="form-group">

                            <div class="input-group">
                                <input type="text" class="form-control" name="InputName" id="Name" placeholder="Enter Name" onblur="nameValidate(this.id)" required>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-user" style="color:#23527C"></span></span>
                            </div>
                        </div>


                        <div class="form-group">

                            <div class="input-group">
                                <input type="email" class="form-control" id="EmailFirst" name="InputEmail" placeholder="Enter Email" onblur="emailValidate(this.id)"required>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope" style="color:#23527C"></span></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <input type="password" class="form-control" id="Password" name="InputPassword" placeholder="Enter Password" required>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                            </div>
                        </div>


                        <div class="form-group">

                            <div class="input-group">
                                <input type="password" class="form-control" id="ConfirmPassword" name="InputConfirmPassword" placeholder="Confirm Password" onblur="passwordValidate()" required>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="input-group">
                                <input type="text" class="form-control" name="InputMobile" id="Mobile" placeholder="Enter Mobile Number" onblur="mobileValidate(this.id)"required>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-phone" style="color:red"></span></span>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="input-group dob">

                                <input type="text" class="form-control" name="InputDOB" id="DOB"  this.type='text' placeholder="DOB" required>	
                                <span class="input-group-addon"><span class="glyphicon glyphicon-time" style="color:#1947A3"></span></span>
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="input-group">
                                <input type="text" class="form-control" name="InputAddress" id="Address" placeholder="Address Line"  onFocus="geolocate()"required>
                                <span class="input-group-addon"><span class="glyphicon  glyphicon-home" style="color:green"></span></span>
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="input-group">
                                <input type="text" class="form-control" name="InputPin" id="postal_code" placeholder="PIN"  onblur="pinValidate(this.id)" required>
                                <span class="input-group-addon"><span class="glyphicon  glyphicon-home" style="color:green"></span></span>
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="input-group">
                                <input type="text" class="form-control" name="InputCity" id="locality" placeholder="City" onblur="cityValidate(this.id)" required>
                                <span class="input-group-addon"><span class="glyphicon  glyphicon-home"style="color:green" ></span></span>
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="input-group">
                                <input type="text" class="form-control" name="InputState" id="administrative_area_level_1" placeholder="State" list="hosting-plan" required>
                                <span class="input-group-addon"><span class="glyphicon  glyphicon-home" style="color:green"></span></span>
                                <datalist id="hosting-plan" autocomplete="off">
                                    <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                    <option value="Assam">Assam</option>
                                    <option value="Bihar">Bihar</option>
                                    <option value="Chandigarh">Chandigarh</option>
                                    <option value="Chhattisgarh">Chhattisgarh</option>
                                    <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                                    <option value="Daman and Diu">Daman and Diu</option>
                                    <option value="Delhi">Delhi</option>
                                    <option value="Goa">Goa</option>
                                    <option value="Gujarat">Gujarat</option>
                                    <option value="Haryana">Haryana</option>
                                    <option value="Himachal Pradesh">Himachal Pradesh</option>
                                    <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                    <option value="Jharkhand">Jharkhand</option>
                                    <option value="Karnataka">Karnataka</option>
                                    <option value="Kerala">Kerala</option>
                                    <option value="Lakshadweep">Lakshadweep</option>
                                    <option value="Madhya Pradesh">Madhya Pradesh</option>
                                    <option value="Maharashtra">Maharashtra</option>
                                    <option value="Manipur">Manipur</option>
                                    <option value="Meghalaya">Meghalaya</option>
                                    <option value="Mizoram">Mizoram</option>
                                    <option value="Nagaland">Nagaland</option>
                                    <option value="Orissa">Orissa</option>
                                    <option value="Pondicherry">Pondicherry</option>
                                    <option value="Punjab">Punjab</option>
                                    <option value="Rajasthan">Rajasthan</option>
                                    <option value="Sikkim">Sikkim</option>
                                    <option value="Tamil Nadu">Tamil Nadu</option>
                                    <option value="Tripura">Tripura</option>
                                    <option value="Uttaranchal">Uttaranchal</option>
                                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                                    <option value="West Bengal">West Bengal</option>

                                </datalist>


                            </div>
                        </div>

                        <div class="form-group">

                            <div class="input-group" style="font-size:20px" >
                                <input type="text"  class="text-center"  name="Captcha" id="mainCaptcha"  style="background-image:url('<?= base_url() ?>public/api/captcha/captcha.jpg')"  readonly> 
                                <input type="text"   name="Captcha" id="txtInput"   onblur="ValidCaptcha()" required>

                            </div>
                        </div>


                        <div class="form-group">
                            <div class="input-group" style="margin-left:auto;margin-right:auto">
                                <input type="submit" value="upload" name="upload" class="btn-info pull-right">
                            </div>
                        </div>
                    </div>
                </div>
                </form>

            </div>


        </div>  <!--formdiv -->




    </div>  <!-- row -->

</div> <!-- Fluid -->


<script type="text/javascript">
    $(function () {
        alert('I m in jscript');
        $("#register_form_error").hide();

        $("#register_form").submit(function (evt) {
            evt.preventDefault();
            var url = $(this).attr('action');
            var postData = $(this).serialize();
            //alert('kaushal');
            $.post(url, postData, function (o) {
                if (o.result == 1) {
                    window.location.href = '<?= site_url('api/new_registration') ?>';
                    //alert('You have registered successfully now login!');
                } else {
                    //alert('Invalid Login');
                    $("#register_form_error").show();
                    var output = '<ul>';
                    for (var key in o.error) {
                        var value = o.error[key];
                        output += '<li>' + value + '</li>';
                    }
                    output += '</ul>';
                    $("#register_form_error").html(output);
                }
            }, 'json');
        });
    });
</script>

<script src="<?= base_url() ?>public/jsValidation/jsValidation.js"></script>
<script src="<?= base_url() ?>public/api/captcha/captcha.js"></script>

<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script>

<script>
// This example displays an address form, using the autocomplete1 feature
// of the Google Places API to help users fill in the information.

 var placeSearch, Address;
 var componentForm = {
     locality: 'long_name',
     administrative_area_level_1: 'short_name',
     postal_code: 'short_name'
 };

 function initialize() {
     // Create the autocomplete1 object, restricting the search
     // to geographical location types.
     Address = new google.maps.places.Autocomplete(
             /** @type {HTMLInputElement} */(document.getElementById('Address')),
             {types: ['geocode']});
     // When the user selects an address from the dropdown,
     // populate the address fields in the form.
     google.maps.event.addListener(Address, 'place_changed', function () {
         fillInAddress();
     });
 }

// [START region_fillform]
 function fillInAddress() {
     // Get the place details from the autocomplete1 object.
     var place = Address.getPlace();

     for (var component in componentForm) {
         document.getElementById(component).value = '';
         document.getElementById(component).disabled = false;
     }

     // Get each component of the address from the place details
     // and fill the corresponding field on the form.
     for (var i = 0; i < place.address_components.length; i++) {
         var addressType = place.address_components[i].types[0];
         if (componentForm[addressType]) {
             var val = place.address_components[i][componentForm[addressType]];
             document.getElementById(addressType).value = val;
         }
     }
 }
// [END region_fillform]

// [START region_geolocation]
// Bias the autocomplete1 object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
 function geolocate() {
     if (navigator.geolocation) {
         navigator.geolocation.getCurrentPosition(function (position) {
             var geolocation = new google.maps.LatLng(
                     position.coords.latitude, position.coords.longitude);
             var circle = new google.maps.Circle({
                 center: geolocation,
                 radius: position.coords.accuracy
             });
             Address.setBounds(circle.getBounds());
         });
     }
 }
// [END region_geolocation]

</script>


<script src="<?= base_url() ?>public/js/jquery.js"></script>
<script src="<?= base_url() ?>public/js/bootstrap.min.js"></script>




</body>    


</html>

