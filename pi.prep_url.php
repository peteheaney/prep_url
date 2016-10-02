<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$plugin_info = array(
	'pi_name' => 'Prep URL',
	'pi_version' =>'1.0',
	'pi_author' =>'Pete Heaney',
	'pi_description' => 'Adds http:// to a URL in the event that a scheme is missing from the URL',
	'pi_usage' => Prep_url::usage()
);

class Prep_url {

	public function __construct()
	{
		$this->EE =& get_instance();
	}

	public function prep()
	{
		$this->EE->load->helper('url');
		$url = $this->EE->TMPL->tagdata;
		return prep_url($url);
	}

	static function usage()
  {
  ob_start();
  ?>

=============
TO PREP A URL
=============

{exp:prep_url:prep}www.example.com{/exp:prep_url:prep}

OR

{exp:prep_url:prep}{my_custom_url_field}{/exp:prep_url:prep}


  <?php
  $buffer = ob_get_contents();

  ob_end_clean();

  return $buffer;
  }

}

/* End of file pi.prep_url.php */
