<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Seleksi_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Seleksi_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function getAll()
  {
    $this->db->select('a.*, b.*, c.type');
    $this->db->from('seleksi a');
    $this->db->join('subkriteria b', 'a.id_subkriteria = b.id_subkriteria');
    $this->db->join('kriteria c', 'b.id_kriteria = c.id_kriteria');
    $this->db->order_by('c.id_kriteria', 'asc');
    return $this->db->get();
  }

  public function getMhs($id)
  {
    $this->db->where_in('id_mhs', $id);
    return $this->db->get('mhs');
  }

  public function getMhsInSeleksi()
  {
    // $this->db->distinct();
    $this->db->select('DISTINCT(id_mhs)');
    return $this->db->get('seleksi');
  }

  public function getById($id)
  {
    return $this->db->get_where('seleksi', ['id_seleksi' => $id]);
  }

  public function getMaxMin()
  {
    // $this->db->select('MAX(bobot_sub), MIN(bobot_sub)');
    $this->db->select_max('a.bobot_sub', 'max_bobot');
    $this->db->select_min('a.bobot_sub', 'min_bobot');
    $this->db->select('a.id_kriteria, b.type');
    $this->db->from('subkriteria a');
    $this->db->join('kriteria b', 'a.id_kriteria = b.id_kriteria');
    $this->db->group_by('id_kriteria');
    return $this->db->get('subkriteria');
  }

  public function insert($data)
  {
    return $this->db->insert_batch('seleksi', $data);
  }

  public function update($data, $where)
  {
    $this->db->where('seleksi', $where);
    return $this->db->update('seleksi', $data);
  }

  public function delete($id)
  {
    $this->db->where('seleksi', $id);
    return $this->db->delete('seleksi');
  }

  // ------------------------------------------------------------------------

}

/* End of file Seleksi_model.php */
/* Location: ./application/models/Seleksi_model.php */