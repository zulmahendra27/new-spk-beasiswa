<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Logout
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

class Logout extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $this->session->sess_destroy();
    redirect('login','refresh');
  }

}


/* End of file Logout.php */
/* Location: ./application/controllers/Logout.php */