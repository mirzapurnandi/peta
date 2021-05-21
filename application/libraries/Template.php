<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template {
	var $template_data = array();
	var $js = array();
	var $css = array();
	
	function set($name, $value) {
		$this->template_data[$name] = $value;
	}

	function view($template = '', $view = '' , $view_data = array(), $return = FALSE){               
		$this->CI =& get_instance();
		$this->set('contents', $this->CI->load->view($view, $view_data, TRUE));			
		return $this->CI->load->view($template, $this->template_data, $return);
	}
	
	function add_js($script, $type = 'import', $defer = FALSE){
		$success = TRUE;
		$js = NULL;
		//$this->CI->load->helper('url');

		switch ($type){
			case 'import':
				$filepath = base_url() . $script;
				$js = '<script type="text/javascript" src="'. $filepath .'"';
				if ($defer)
				{
					$js .= ' defer="defer"';
				}
				$js .= "></script>";
				break;

			case 'embed':
				$js = '<script type="text/javascript"';
				if ($defer)
				{
					$js .= ' defer="defer"';
				}
				$js .= ">";
				$js .= $script;
				$js .= '</script>';
				break;

			default:
				$success = FALSE;
				break;
		}

		// Add to js array if it doesn't already exist
		if ($js != NULL && !in_array($js, $this->js)){
			$this->js[] = $js;
			$this->set('_scripts', $js);
		}
		return $success;
	}
	
	function add_css($style, $type = 'link', $media = FALSE){
		$success = TRUE;
		$css = NULL;

		//$this->CI->load->helper('url');
		$filepath = base_url() . $style;

		switch ($type){
			case 'link':

				$css = '<link type="text/css" rel="stylesheet" href="'. $filepath .'"';
				if ($media)
				{
					$css .= ' media="'. $media .'"';
				}
				$css .= ' />';
				break;

			case 'import':
				$css = '<style type="text/css">@import url('. $filepath .');</style>';
				break;

			case 'embed':
				$css = '<style type="text/css">';
				$css .= $style;
				$css .= '</style>';
				break;

			default:
				$success = FALSE;
				break;
		}

		// Add to js array if it doesn't already exist
		if ($css != NULL && !in_array($css, $this->css)){
			$this->css[] = $css;
			$this->set('_styles', $css);
		}

		return $success;
	}
		
}

/* End of file Template.php */
/* Location: ./system/application/libraries/Template.php */