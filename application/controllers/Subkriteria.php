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

  public function index($id_kriteria)
  {
    $data = array(
      'page' => 'subkriteria',
      'title' => 'Subkriteria',
      'root' => 'kriteria',
      'result' => $this->Subkriteria_model->getByKriteria($id_kriteria)
    );
    $this->load->view('page', $data);
  }

  public function add($id_kriteria)
  {
    if (!empty($_POST)) {
      $this->form_validation->set_rules('nama_sub', 'Nama', 'trim|required');
      $this->form_validation->set_rules('bobot_sub', 'Bobot', 'trim|required|numeric');
      
      if ($this->form_validation->run() == true) {
        $nama_sub = htmlspecialchars($this->input->post('nama_sub', true));
        $bobot_sub = htmlspecialchars($this->input->post('bobot_sub', true));

        $data = array(
          'id_kriteria' => $id_kriteria,
          'nama_sub' => $nama_sub,
          'bobot_sub' => $bobot_sub
        );

        $result = $this->Subkriteria_model->insert($data);

        if ($result) {
          $this->session->set_flashdata('alt', 'success');
          $this->session->set_flashdata('msg', 'Sukses!');
        } else {
          $this->session->set_flashdata('alt', 'danger');
          $this->session->set_flashdata('msg', 'Gagal!');
        }

        redirect('subkriteria/'.$id_kriteria,'refresh');        
      }
    }
    
    $this->load->model('Kriteria_model');

    $data = array(
      'page' => 'subkriteria_add',
      'title' => 'Subkriteria',
      'root' => 'kriteria',
      'result' => $this->Kriteria_model->getById($id_kriteria)
    );
    $this->load->view('page', $data);
  }

  public function edit($id_kriteria, $id)
  {
    if (!empty($_POST)) {
      $this->form_validation->set_rules('nama_sub', 'Nama', 'trim|required');
      $this->form_validation->set_rules('bobot_sub', 'Bobot', 'trim|required|numeric');
      
      if ($this->form_validation->run() == true) {
        $nama_sub = htmlspecialchars($this->input->post('nama_sub', true));
        $bobot_sub = htmlspecialchars($this->input->post('bobot_sub', true));

        $data = array(
          'nama_sub' => $nama_sub,
          'bobot_sub' => $bobot_sub
        );

        $result = $this->Subkriteria_model->update($data, ['id_kriteria' => $id_kriteria, 'id_subkriteria' => $id]);

        if ($result) {
          $this->session->set_flashdata('alt', 'success');
          $this->session->set_flashdata('msg', 'Sukses!');
        } else {
          $this->session->set_flashdata('alt', 'danger');
          $this->session->set_flashdata('msg', 'Gagal!');
        }

        redirect('subkriteria/'.$id_kriteria,'refresh');
      }
    }
    
    $data = array(
      'page' => 'subkriteria_edit',
      'title' => 'Subkriteria',
      'root' => 'kriteria',
      'result' => $this->Subkriteria_model->getById($id_kriteria, $id)
    );
    $this->load->view('page', $data);
  }

  public function delete($id_kriteria, $id)
  {
    $result = $this->Subkriteria_model->delete($id_kriteria, $id);

    if ($result) {
      $this->session->set_flashdata('alt', 'success');
      $this->session->set_flashdata('msg', 'Sukses!');
    } else {
      $this->session->set_flashdata('alt', 'danger');
      $this->session->set_flashdata('msg', 'Gagal!');
    }
    
    redirect('subkriteria/'.$id_kriteria,'refresh');
  }

}


/* End of file Subkriteria.php */
/* Location: ./application/controllers/Subkriteria.php */