<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Seleksi
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

class Seleksi extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
    is_not_login();
    $this->load->model('Seleksi_model');
    
  }

  public function index()
  {
    $data = array(
      'page' => 'seleksi',
      'title' => 'Seleksi',
      'root' => 'seleksi',
      'result' => $this->Seleksi_model->getAll()
    );
    $this->load->view('page', $data);
  }

}


/* End of file Seleksi.php */
/* Location: ./application/controllers/Seleksi.php */