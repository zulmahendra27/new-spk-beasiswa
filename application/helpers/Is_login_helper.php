<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Helpers Is_login_helper
 *
 * This Helpers for ...
 * 
 * @package   CodeIgniter
 * @category  Helpers
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 *
 */

// ------------------------------------------------------------------------

if (!function_exists('is_login')) {
  /**
   * Test
   *
   * This test helpers
   *
   * @param   ...
   * @return  ...
   */
  function is_login()
  {
    $ci = get_instance();

    if ($ci->session->has_userdata('login')) {
      redirect('dashboard');
    }
  }
}

if (!function_exists('is_not_login')) {
  /**
   * Test
   *
   * This test helpers
   *
   * @param   ...
   * @return  ...
   */
  function is_not_login()
  {
    $ci = get_instance();

    if (!$ci->session->has_userdata('login')) {
      redirect('login');
    }
  }
}

// ------------------------------------------------------------------------

/* End of file Is_login_helper.php */
/* Location: ./application/helpers/Is_login_helper.php */