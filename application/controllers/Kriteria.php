<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Kriteria
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

class Kriteria extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
    is_not_login();
    $this->load->model('Kriteria_model');
    
  }

  public function index()
  {
    $data = array(
      'page' => 'kriteria',
      'title' => 'Kriteria',
      'root' => 'kriteria',
      'result' => $this->Kriteria_model->getAll()
    );
    $this->load->view('page', $data);
  }

  public function add()
  {
    if (!empty($_POST)) {
      $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
      $this->form_validation->set_rules('bobot', 'Bobot', 'trim|required|numeric');
      $this->form_validation->set_rules('type', 'Type', 'trim|required');
      
      if ($this->form_validation->run() == true) {
        $nama = htmlspecialchars($this->input->post('nama', true));
        $bobot = htmlspecialchars($this->input->post('bobot', true));
        $type = htmlspecialchars($this->input->post('type', true));

        $data = array(
          'nama' => $nama,
          'bobot' => $bobot,
          'type' => $type,
        );

        $result = $this->Kriteria_model->insert($data);

        if ($result) {
          $this->session->set_flashdata('alt', 'success');
          $this->session->set_flashdata('msg', 'Sukses!');
        } else {
          $this->session->set_flashdata('alt', 'danger');
          $this->session->set_flashdata('msg', 'Gagal!');
        }

        redirect('kriteria','refresh');        
      }
    }
    
    $data = array(
      'page' => 'kriteria_add',
      'title' => 'Kriteria',
      'root' => 'kriteria',
    );
    $this->load->view('page', $data);
  }

  public function edit($id)
  {
    if (!empty($_POST)) {
      $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
      $this->form_validation->set_rules('bobot', 'Bobot', 'trim|required|numeric');
      $this->form_validation->set_rules('type', 'Type', 'trim|required');
      
      if ($this->form_validation->run() == true) {
        $nama = htmlspecialchars($this->input->post('nama', true));
        $bobot = htmlspecialchars($this->input->post('bobot', true));
        $type = htmlspecialchars($this->input->post('type', true));

        $data = array(
          'nama' => $nama,
          'bobot' => $bobot,
          'type' => $type,
        );

        $result = $this->Kriteria_model->update($data, $id);

        if ($result) {
          $this->session->set_flashdata('alt', 'success');
          $this->session->set_flashdata('msg', 'Sukses!');
        } else {
          $this->session->set_flashdata('alt', 'danger');
          $this->session->set_flashdata('msg', 'Gagal!');
        }

        redirect('kriteria','refresh');        
      }
    }
    
    $data = array(
      'page' => 'kriteria_edit',
      'title' => 'Kriteria',
      'root' => 'kriteria',
      'result' => $this->Kriteria_model->getById($id)
    );
    $this->load->view('page', $data);
  }

  public function delete($id)
  {
    $result = $this->Kriteria_model->delete($id);

    if ($result) {
      $this->session->set_flashdata('alt', 'success');
      $this->session->set_flashdata('msg', 'Sukses!');
    } else {
      $this->session->set_flashdata('alt', 'danger');
      $this->session->set_flashdata('msg', 'Gagal!');
    }
    
    redirect('kriteria','refresh');
  }

}


/* End of file Kriteria.php */
/* Location: ./application/controllers/Kriteria.php */