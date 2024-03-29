<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Kriteria_model
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

class Kriteria_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  
  public function getAll()
  {
    return $this->db->get('kriteria');
  }

  public function getById($id)
  {
    return $this->db->get_where('kriteria', ['id_kriteria' => $id]);
  }

  public function insert($data)
  {
    return $this->db->insert('kriteria', $data);
  }

  public function update($data, $where)
  {
    $this->db->where('id_kriteria', $where);
    return $this->db->update('kriteria', $data);
  }

  public function delete($id)
  {
    $this->db->where('id_kriteria', $id);
    return $this->db->delete('kriteria');
  }

  // ------------------------------------------------------------------------

}

/* End of file Kriteria_model.php */
/* Location: ./application/models/Kriteria_model.php */