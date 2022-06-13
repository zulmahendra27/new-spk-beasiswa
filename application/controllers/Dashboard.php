<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Dashboard
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

class Dashboard extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_not_login();
    $this->load->model('Seleksi_model');
  }

  public function index()
  {
    $rs_mhs = $this->Seleksi_model->getMhsInSeleksi();
    $rs_kriteria = $this->Seleksi_model->getKriteria();
    $rs_seleksi = $this->Seleksi_model->getAll();

    $arr_pref = array();

    if ($rs_mhs->num_rows()) {
      foreach ($rs_mhs->result() as $key => $mhs) {
        $nilai = 0;
        $arr_pref[$key][0] = $mhs->nama;

        foreach ($rs_seleksi->result() as $seleksi) {
          if ($seleksi->id_mhs == $mhs->id_mhs) {
            foreach ($rs_kriteria->result() as $kriteria) {
              if ($kriteria->id_kriteria == $seleksi->id_kriteria) {
                if ($kriteria->type == 'benefit') {
                  $normal = $seleksi->bobot_sub / $kriteria->max_bobot;
                } else {
                  $normal = $kriteria->min_bobot / $seleksi->bobot_sub;
                }

                $kali = $normal * $kriteria->bobot;
                $nilai += $kali;
              }
            }
          }
        }

        $arr_pref[$key][1] = $nilai;
      }
    }

    $pref = array_column($arr_pref, 1);
    if (count($pref) > 0) {
      array_multisort($pref, SORT_DESC, $arr_pref);
    }

    // print_r($arr_pref);
    // die;

    $data = array(
      'page' => 'dashboard',
      'title' => 'Dashboard',
      'root' => 'dashboard',
      'preferensi' => $arr_pref,
    );

    $this->load->view('page', $data);
  }
}


/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */