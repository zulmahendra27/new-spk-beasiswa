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
    $this->load->model('Kriteria_model');
    $this->load->model('Mhs_model');
  }

  public function index()
  {
    $rs_mhs = $this->Seleksi_model->getMhsInSeleksi();
    $rs_kriteria = $this->Seleksi_model->getKriteria();
    $rs_seleksi = $this->Seleksi_model->getAll();

    $arr_seleksi = array();
    $arr_normalisasi = array();
    $arr_pref = array();

    if ($rs_mhs->num_rows()) {
      foreach ($rs_mhs->result() as $key => $mhs) {
        $arr_pref[$key][0] = $mhs->nama;
        $arr_seleksi[$key][0] = $mhs->nama;
        $arr_normalisasi[$key][0] = $mhs->nama;
        $arr_seleksi[$key][1] = $mhs->id_mhs;

        $i = 0;
        if ($rs_seleksi->num_rows() > 0) {
          foreach ($rs_seleksi->result() as $seleksi) {
            if ($seleksi->id_mhs == $mhs->id_mhs) {
              $arr_seleksi[$key][2][$i] = $seleksi->nama_sub;

              foreach ($rs_kriteria->result() as $kriteria) {
                if ($kriteria->id_kriteria == $seleksi->id_kriteria) {
                  if ($kriteria->type == 'benefit') {
                    $normal = $seleksi->bobot_sub / $kriteria->max_bobot;
                  } else {
                    $normal = $kriteria->min_bobot / $seleksi->bobot_sub;
                  }
                }
              }

              $arr_normalisasi[$key][1][$i] = $normal;
              $arr_normalisasi[$key][2][$i] = $seleksi->bobot_sub;

              $i++;
            }
          }
        }
      }
    }

    $data = array(
      'page' => 'seleksi',
      'title' => 'Seleksi',
      'root' => 'seleksi',
      'seleksi' => $arr_seleksi,
      'normalisasi' => $arr_normalisasi,
      'preferensi' => $arr_pref,
      'rs_kriteria' => $rs_kriteria
    );

    $this->load->view('page', $data);
  }

  public function add()
  {
    if (!empty($_POST)) {
      $this->form_validation->set_rules('mhs', 'Mahasiswa', 'trim|required');

      if ($this->form_validation->run() == true) {
        $mhs = htmlspecialchars($this->input->post('mhs', true));
        $kriterias = html_escape($this->input->post('kriteria', true));

        $data = array();

        foreach ($kriterias as $kriteria) {
          $data[] = array(
            'id_mhs' => $mhs,
            'id_subkriteria' => $kriteria
          );
        }

        $result = $this->Seleksi_model->insert($data);

        if ($result) {
          $this->session->set_flashdata('alt', 'success');
          $this->session->set_flashdata('msg', 'Sukses!');
        } else {
          $this->session->set_flashdata('alt', 'danger');
          $this->session->set_flashdata('msg', 'Gagal!');
        }

        redirect('seleksi', 'refresh');
      }
    }

    $this->load->model('Subkriteria_model');

    $rs_mhsInSeleksi = $this->Seleksi_model->getMhsInSeleksi();

    foreach ($rs_mhsInSeleksi->result() as $mhsInSeleksi) {
      $id_mhs[] = $mhsInSeleksi->id_mhs;
    }

    $rs_kriteria = $this->Kriteria_model->getAll();
    $id_kriteria = array();

    foreach ($rs_kriteria->result() as $kriteria) {
      $id_kriteria[] = $kriteria->id_kriteria;
    }

    $data = array(
      'page' => 'seleksi_add',
      'title' => 'Seleksi',
      'root' => 'seleksi',
      'rs_mhs' => $this->Mhs_model->getNotInSeleksi($id_mhs),
      'rs_kriteria' => $rs_kriteria,
      'rs_subkriteria' => $this->Subkriteria_model->getInKriteria($id_kriteria)
    );

    $this->load->view('page', $data);
  }

  public function delete($id)
  {
    $result = $this->Seleksi_model->delete($id);

    if ($result) {
      $this->session->set_flashdata('alt', 'success');
      $this->session->set_flashdata('msg', 'Sukses!');
    } else {
      $this->session->set_flashdata('alt', 'danger');
      $this->session->set_flashdata('msg', 'Gagal!');
    }

    redirect('seleksi', 'refresh');
  }
}


  /* End of file Seleksi.php */
  /* Location: ./application/controllers/Seleksi.php */