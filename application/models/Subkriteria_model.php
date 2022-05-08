<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Subkriteria_model
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

class Subkriteria_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function getById($id_kriteria, $id)
  {
    $this->db->select('a.*, b.*');
    $this->db->from('subkriteria a');
    $this->db->join('kriteria b', 'a.id_kriteria = b.id_kriteria');
    $this->db->where(['a.id_kriteria' => $id_kriteria, 'id_subkriteria' => $id]);
    return $this->db->get();
  }
  
  public function getByKriteria($id)
  {
    $this->db->select('*');
    $this->db->from('subkriteria a');
    $this->db->join('kriteria b', 'a.id_kriteria = b.id_kriteria', 'right');
    $this->db->where('b.id_kriteria', $id);
    return $this->db->get();
  }

  public function getInKriteria($id)
  {
    $this->db->where_in('id_kriteria', $id);
    return $this->db->get('subkriteria');
    
  }

  public function insert($data)
  {
    return $this->db->insert('subkriteria', $data);
  }

  public function update($data, $where)
  {
    $this->db->where($where);
    return $this->db->update('subkriteria', $data);
  }

  public function delete($id_kriteria, $id)
  {
    $this->db->where(['id_kriteria' => $id_kriteria, 'id_subkriteria' => $id]);
    return $this->db->delete('subkriteria');
  }

  // ------------------------------------------------------------------------

}

/* End of file Subkriteria_model.php */
/* Location: ./application/models/Subkriteria_model.php */