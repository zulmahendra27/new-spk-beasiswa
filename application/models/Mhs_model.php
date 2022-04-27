<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Mhs_model
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

class Mhs_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function getAll()
  {
    $this->db->order_by('nama', 'asc');
    return $this->db->get('mhs');
  }

  public function getById($id)
  {
    return $this->db->get_where('mhs', ['nim' => $id]);
  }

  public function insert($data)
  {
    return $this->db->insert('mhs', $data);
  }

  public function update($data, $where)
  {
    $this->db->where('nim', $where);
    return $this->db->update('mhs', $data);
  }

  public function delete($nim)
  {
    $this->db->where('nim', $nim);
    return $this->db->delete('mhs');
  }

  // ------------------------------------------------------------------------

}

/* End of file Mhs_model.php */
/* Location: ./application/models/Mhs_model.php */