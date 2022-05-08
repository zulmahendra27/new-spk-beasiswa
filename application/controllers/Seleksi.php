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
    $rs_mhs_seleksi = $this->Seleksi_model->getMhsInSeleksi();
    $id_mhs = array();

    foreach ($rs_mhs_seleksi->result() as $mhs) {
      $id_mhs[] = $mhs->id_mhs;
    }

    $rs_kriteria = $this->Kriteria_model->getAll();
    $rs_mhs = $this->Mhs_model->getByWhereIn($id_mhs);
    $rs_seleksi = $this->Seleksi_model->getAll();
    $rs_max_min = $this->Seleksi_model->getMaxMin();
    
    $html = '';
    $normalisasi = '';
    $arr_pref = array(array());
    
    if ($rs_mhs->num_rows()) {
      $i = 0;
      foreach ($rs_mhs->result() as $key => $mhs) {
        $nilai = 0;
        $arr_pref[$key][0] = ($mhs->nama);
        $html .= '
          <tr>
            <td>'.($i+1).'</td>
            <td>'.$mhs->nama.'</td>';

        $normalisasi .= '
          <tr>
            <td>'.($i+1).'</td>
            <td>'.$mhs->nama.'</td>';

        foreach ($rs_seleksi->result() as $seleksi) {
          if ($seleksi->id_mhs == $mhs->id_mhs) {
            $html .= '<td>'.htmlspecialchars_decode($seleksi->nama_sub).'</td>';

            foreach ($rs_max_min->result() as $max_min) {
              if ($max_min->id_kriteria == $seleksi->id_kriteria) {
                if ($max_min->type == 'benefit') {
                  $normal = $seleksi->bobot_sub / $max_min->max_bobot;
                } else {
                  $normal = $max_min->min_bobot / $seleksi->bobot_sub;
                }
              }
            }

            foreach ($rs_kriteria->result() as $keys => $kriteria) {
              if ($kriteria->id_kriteria == $seleksi->id_kriteria) {
                $kali = $normal * $kriteria->bobot;
                $nilai += $kali;
              }
            }
            
            $normalisasi .= '<td>'.$normal.'</td>';
          }

        }
        $arr_pref[$key][1] = $nilai;

        $html .= '</tr>';
        $normalisasi .= '</tr>';
          
        $i++;
      }

    } else {
      $html .= '
        <tr class="text-center">
          <td colspan="'.(3+$rs_kriteria->num_rows()).'">Tidak ada data</td>
        </tr>';

      $normalisasi .= '
        <tr class="text-center">
          <td colspan="'.(2+$rs_kriteria->num_rows()).'">Tidak ada data</td>
        </tr>';
    }

    $pref = array_column($arr_pref, 1);
    array_multisort($pref, SORT_DESC, $arr_pref);

    // echo '<pre>';
    //   print_r($pref);
    //   echo '</pre>';
    //   die;

    $data = array(
    'page' => 'seleksi',
    'title' => 'Seleksi',
    'root' => 'seleksi',
    'html' => $html,
    'normalisasi' => $normalisasi,
    'preferensi' => $arr_pref,
    'rs_kriteria' => $rs_kriteria,
    'rs_mhs' => $rs_mhs,
    'rs_max_min' => $rs_max_min,
    'result' => $rs_seleksi
    );

    // print_r($data['result']->result_array());
    // die;

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
            'id_mhs'=> $mhs,
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

        redirect('seleksi','refresh');
      }
    }

    $this->load->model('Subkriteria_model');

    $rs_kriteria = $this->Kriteria_model->getAll();
    $id_kriteria = array();

    foreach ($rs_kriteria->result() as $kriteria) {
      $id_kriteria[] = $kriteria->id_kriteria;
    }

    $data = array(
      'page' => 'seleksi_add',
      'title' => 'Seleksi',
      'root' => 'seleksi',
      'rs_mhs' => $this->Mhs_model->getAll(),
      'rs_kriteria' => $rs_kriteria,
      'rs_subkriteria' => $this->Subkriteria_model->getInKriteria($id_kriteria)
    );

    $this->load->view('page', $data);
  }

}


  /* End of file Seleksi.php */
  /* Location: ./application/controllers/Seleksi.php */