<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Subkriteria
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

class Subkriteria extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
    is_not_login();
    $this->load->model('Subkriteria_model');
  }

  public function index($id)
  {
    $data = array(
      'page' => 'subkriteria',
      'title' => 'Subkriteria',
      'root' => 'kriteria',
      'result' => $this->Subkriteria_model->getByKriteria($id)
    );
    $this->load->view('page', $data);
  }

  public function add($kriteria)
  {
    if (!empty($_POST)) {
      $this->form_validation->set_rules('nama_sub', 'Nama', 'trim|required');
      $this->form_validation->set_rules('bobot', 'Bobot', 'trim|required|numeric');
      
      if ($this->form_validation->run() == true) {
        $nama_sub = htmlspecialchars($this->input->post('nama_sub', true));
        $bobot = htmlspecialchars($this->input->post('bobot', true));

        $data = array(
          'nama_sub' => $nama_sub,
          'bobot' => $bobot
        );

        $result = $this->Kriteria_model->insert($data);

        if ($result) {
          $this->session->set_flashdata('alt', 'success');
          $this->session->set_flashdata('msg', 'Sukses!');
        } else {
          $this->session->set_flashdata('alt', 'danger');
          $this->session->set_flashdata('msg', 'Gagal!');
        }

        redirect('subkriteria/'.$kriteria,'refresh');        
      }
    }
    
    $data = array(
      'page' => 'subkriteria_add',
      'title' => 'Subkriteria',
      'root' => 'kriteria',
    );
    $this->load->view('page', $data);
  }

}


/* End of file Subkriteria.php */
/* Location: ./application/controllers/Subkriteria.php */