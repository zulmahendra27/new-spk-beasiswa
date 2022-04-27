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
    $this->db->select('a.*, b.*, c.*, c.nama as nama_mhs');
    $this->db->from('seleksi a');
    $this->db->join('kriteria b', 'a.id_kriteria = b.id_kriteria', 'left');
    $this->db->join('mhs c', 'a.id_mhs = c.id_mhs', 'left');
    $this->db->order_by('c.nama', 'asc');
    return $this->db->get();
  }

  public function getById($id)
  {
    return $this->db->get_where('seleksi', ['id_seleksi' => $id]);
  }

  public function insert($data)
  {
    return $this->db->insert('seleksi', $data);
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