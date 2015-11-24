<?php

class Upload_1 extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('registration_model');
        $this->load->library('upload');
        $this->load->library('form_validation');
        $this->load->model('news_model');
        $this->load->library('session');
    }

    function index() {
        //$this->load->view('upload_form', array('error' => ' '));
    }

    function do_upload() {
        $hi = 'hi';

        if ($this->input->post('upload')) {

            $config['upload_path'] = './profile/';
            $config['allowed_types'] = 'gif|jpg|jpeg||png';
            $config['max_size'] = '1024';
            $config['max_width'] = '1024';
            $config['max_height'] = '768';

            $this->load->library('upload', $config);

            $this->upload->initialize($config);

            if (!$this->upload->do_upload()) {
                // var_dump($hi);
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('registration');
                // echo '<script> alert("Registration Successful !")</script>';
            } else {
                $data = $this->upload->data();

                $file = array(
                    //'full_path' => $data['raw_name']
                    'img_name' => $data['raw_name'],
                    // 'thumb_name' => $data['raw_name'] . '_thumb',
                    'ext' => $data['file_ext'],
                        //'upload_date' => date(DATE_RSS)
                );
                //$this->upload_model->add_image($file);
                $data = array('upload_data' => $this->upload->data());

                $x = $file['img_name'] . $file['ext'];

                $this->output->set_content_type('application_json');


                $this->form_validation->set_rules('InputName', 'Login', 'required|min_length[2]|max_length[30]');
                $this->form_validation->set_rules('InputEmail', 'Email', 'required|valid_email|is_unique[login.email]');
                $this->form_validation->set_rules('InputPassword', 'InputPassword', 'required|min_length[4]|max_length[100]|matches[InputConfirmPassword]');
                $this->form_validation->set_rules('InputConfirmPassword', 'InputConfirmPassword', 'required|min_length[4]|max_length[100]');
                $this->form_validation->set_rules('InputPin', 'Pin', 'required|min_length[6]|max_length[6]|numeric');

                $InputEmail = "InputEmail";
                /* $this->form_validation->set_message('valid_email','Cats dont know how to type');
                  $this->form_validation->set_message('required','only a dog knows you nedd this!');
                 */
                if ($this->form_validation->run() == false) {
                    //echo validation_errors();
                    //$this->output->set_output(json_encode(['result' => 0, 'error' => $this->form_validation->error_array()]));
                    //$error[] = $this->form_validation->error_array();
                    $this->load->view('registration');
                    //redirect(site_url('/'));
                    echo '<script> alert("plz check ur email id and pass it is already used : ' . $InputEmail . '")</script>';

                    return false;
                }
                //----------------------------------------------------------------
                $name = $this->input->post('InputName');
                $email = $this->input->post('InputEmail');
                $password = $this->input->post('InputPassword');
                //$confirm_password = $this->input->post('InputConfirmPassword');       
                $mobile = $this->input->post('InputMobile');
                $dob = $this->input->post('InputDOB');
                $address = $this->input->post('InputAddress');
                $pin = $this->input->post('InputPin');
                $city = $this->input->post('InputCity');
                $state = $this->input->post('InputState');

                //----------------------------------------------------------------
                //splitting name

                $name = $name . " ";
                list( $fname, $mname, $lname ) = explode(' ', $name, 3);
                if (is_null($lname) && !is_null($mname)) { //Meaning only two names were entered...
                    $lname = $mname;
                    $mname = $mname . " ";
                } else if (is_null($mname) && is_null($lname)) { // only first has entered
                    $lname = $lname . " ";
                    $mname = $mname . " ";
                } else if ($lname == "") {
                    $lname = $mname;
                    $mname = $mname . " ";
                }
                //----------------------------------------------------------------

                $this->load->model('registration_model');

                $m_id = $this->registration_model->insert_member_info([
                    'fname' => $fname,
                    'mname' => $mname,
                    'lname' => $lname,
                    'dob' => $dob,
                    'contact' => $mobile,
                    'profile_image' => $x
                ]);

                $user_id = $this->registration_model->insert_login([
                    'm_id' => $m_id,
                    'email' => $email,
                    'password' => $password
                ]);

                $m_id = $this->registration_model->insert_member_address([
                    'm_id' => $m_id,
                    'address_line' => $address,
                    'city' => $city,
                    'pin' => $pin,
                    'state' => $state
                ]);
                //----------------------------------------------------------------
                if ($user_id) {
                    echo '<script>alert("You have registered successfully now login!")</script>';
                    $this->session->set_userdata(['l_id' => $user_id[0]['l_id']]);
                    // $this->session->set_userdata(['user_id' => $user_id[0]['user_id']]);
                    //$this->output->set_output(json_encode(['result' => 1]));
                    
                    redirect(site_url('login/index'));
                    
                   

                        // if admin, show admin's profile page
                        // $this->load->view('profile/admin');	 
                        // if citizen, show citizen's profile page
                        // $this->load->view('profile/citizen');				   
                        // $this->load->view('templates/footer');
                        $this->load->view('profile');
                        $this->load->view('templates/footer');
                 
                    return false;
                } else {
                    //echo 'hi kaushal';
                    $this->output->set_output(json_encode(['result' => 0, 'error' => 'User not created!']));
                    redirect(site_url('api/regis'));
                }
            }
        } else
            redirect(site_url('api/regis'));
    }

    function thumb($data) {
        $config['image_library'] = 'gd2';
        $config['source_image'] = $data['full_path'];
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 275;
        $config['height'] = 250;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
    }

}
