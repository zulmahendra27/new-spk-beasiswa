<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Mhs
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

class Mhs extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
    is_not_login();
    $this->load->model('Mhs_model');
    
  }

  public function index()
  {
    $data = array(
      'page' => 'mhs',
      'title' => 'Mahasiswa',
      'root' => 'mhs',
      'result' => $this->Mhs_model->getAll()
    );
    $this->load->view('page', $data);
  }

  public function add()
  {
    if (!empty($_POST)) {
      $this->form_validation->set_rules('nim', 'NIM', 'trim|required|is_unique[mhs.nim]|numeric');
      $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
      $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required');
      $this->form_validation->set_rules('prodi', 'Prodi', 'trim|required');
      $this->form_validation->set_rules('nohp', 'No. HP', 'trim|required|numeric');
      $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
      $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');

      
      if ($this->form_validation->run() == true) {
        $nim = htmlspecialchars($this->input->post('nim', true));
        $nama = htmlspecialchars($this->input->post('nama', true));
        $tgl_lahir = htmlspecialchars($this->input->post('tgl_lahir', true));
        $prodi = htmlspecialchars($this->input->post('prodi', true));
        $nohp = htmlspecialchars($this->input->post('nohp', true));
        $email = htmlspecialchars($this->input->post('email', true));
        $alamat = htmlspecialchars($this->input->post('alamat', true));

        $data = array(
          'nim' => $nim,
          'nama' => $nama,
          'tgl_lahir' => $tgl_lahir,
          'prodi' => $prodi,
          'nohp' => $nohp,
          'email' => $email,
          'alamat' => $alamat
        );

        $result = $this->Mhs_model->insert($data);

        if ($result) {
          $this->session->set_flashdata('alt', 'success');
          $this->session->set_flashdata('msg', 'Sukses!');
        } else {
          $this->session->set_flashdata('alt', 'danger');
          $this->session->set_flashdata('msg', 'Gagal!');
        }

        redirect('mhs','refresh');        
      }
    }
    
    $data = array(
      'page' => 'mhs_add',
      'title' => 'Mahasiswa',
      'root' => 'mhs',
    );
    $this->load->view('page', $data);
  }

  public function edit($nim)
  {
    if (!empty($_POST)) {
      $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
      $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required');
      $this->form_validation->set_rules('prodi', 'Prodi', 'trim|required');
      $this->form_validation->set_rules('nohp', 'No. HP', 'trim|required|numeric');
      $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
      $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
      
      if ($this->form_validation->run() == true) {
        $nama = htmlspecialchars($this->input->post('nama', true));
        $tgl_lahir = htmlspecialchars($this->input->post('tgl_lahir', true));
        $prodi = htmlspecialchars($this->input->post('prodi', true));
        $nohp = htmlspecialchars($this->input->post('nohp', true));
        $email = htmlspecialchars($this->input->post('email', true));
        $alamat = htmlspecialchars($this->input->post('alamat', true));

        $data = array(
          'nama' => $nama,
          'tgl_lahir' => $tgl_lahir,
          'prodi' => $prodi,
          'nohp' => $nohp,
          'email' => $email,
          'alamat' => $alamat
        );

        $result = $this->Mhs_model->update($data, $nim);

        if ($result) {
          $this->session->set_flashdata('alt', 'success');
          $this->session->set_flashdata('msg', 'Sukses!');
        } else {
          $this->session->set_flashdata('alt', 'danger');
          $this->session->set_flashdata('msg', 'Gagal!');
        }

        redirect('mhs','refresh');        
      }
    }
    
    $data = array(
      'page' => 'mhs_edit',
      'title' => 'Mahasiswa',
      'root' => 'mhs',
      'result' => $this->Mhs_model->getById($nim)
    );
    $this->load->view('page', $data);
  }

  public function delete($nim)
  {
    $result = $this->Mhs_model->delete($nim);

    if ($result) {
      $this->session->set_flashdata('alt', 'success');
      $this->session->set_flashdata('msg', 'Sukses!');
    } else {
      $this->session->set_flashdata('alt', 'danger');
      $this->session->set_flashdata('msg', 'Gagal!');
    }
    
    redirect('mhs','refresh');
  }

}


/* End of file Mhs.php */
/* Location: ./application/controllers/Mhs.php */