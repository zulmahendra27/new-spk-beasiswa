<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Login
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Login extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_login();
    $this->load->model('Login_model');
  }

  public function index()
  {
    if (!empty($_POST)) {
      $this->form_validation->set_rules('username', 'Username', 'trim|required');
      $this->form_validation->set_rules('password', 'Password', 'trim|required');
      
      if ($this->form_validation->run() == true) {
        $username = htmlspecialchars($this->input->post('username', true));
        
        // $data = array('username' => $username);
        $data = $this->Login_model->check(['username' => $username]);
        
        if ($data->num_rows()) {
          $password = htmlspecialchars($this->input->post('password', true));
          $pw = $data->row()->password;
          if (password_verify($password, $pw)) {
            $level = array(
              1 => 'admin'
            );

            $array = array(
              'login' => true,
              'level' => $level[$data->row()->level]
            );
            
            $this->session->set_userdata( $array );
            redirect('dashboard','refresh');
            
            
          } else {
            
            redirect('login','refresh');
            
          }
        } else {
          
          redirect('login','refresh');
          
        }
        
      } else {
        # code...
      }
    } else {
      $this->load->view('login');
    }
  }

}


/* End of file Login.php */
/* Location: ./application/controllers/Login.php */