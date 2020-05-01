<?php defined('BASEPATH') OR exit('No direct script access
	allowed');
/**
* CodeIgniter PDF Library
*
* Generate PDF's in your CodeIgniter applications.
*
* @package
* @subpackage
* @category
* @author
* @license
* @link
Library
*/
require_once(dirname(__FILE__)
	'/dompdf/dompdf_config.inc.php');
class Pdf extends DOMPDF{
/**
* Get an instance of CodeIgniter
*
* @access
* @return
*/
}
/**
* Load a CodeIgniter view into domPDF
*
* @access
* @param
public string 
$view The view to load
protected void
protected function ci(){
return get_instance();
.
CodeIgniter
Libraries
Libraries
Chris Harvey
MIT License
https://github.com/chrisnharvey/CodeIgniter-P
* @param
* @return
*/
public function load_view($view, $data = array()){
	$html = $this->ci()->load->view($view, $data, TRUE);
	$this->load_html($html);
}
}
?>