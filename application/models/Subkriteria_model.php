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
  public function getByKriteria($id)
  {
    $this->db->select('*');
    $this->db->from('subkriteria a');
    $this->db->join('kriteria b', 'a.id_kriteria = b.id_kriteria', 'left');
    $this->db->where('a.id_kriteria', $id);
    return $this->db->get();
  }

  // ------------------------------------------------------------------------

}

/* End of file Subkriteria_model.php */
/* Location: ./application/models/Subkriteria_model.php */