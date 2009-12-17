<?php

if ( ! defined('EXT')) exit('Invalid file request');

/**
* LG TinyMCE Class for BK FieldFrame
*
* @package   FieldFrame
* @author    Leevi Graham <http://leevigraham.com>
* @copyright Copyright (c) 2009 Leevi Graham
* @license   http://creativecommons.org/licenses/by-sa/3.0/ Attribution-Share Alike 3.0 Unported
*/
class lg_tiny_mce extends Fieldframe_Fieldtype 
{
	/**
	* FieldType information
	* @var array
	*/
	var $info = array(
		'name'             => 'LG TinyMCE',
		'version'          => '2.0.0',
		'desc'             => 'Integrates Moxicodes TinyMCE into ExpressionEngine providing WYSIWYG content editing',
		'docs_url'         => 'http://leevigraham.com/cms-customisation/expressionengine/addon/lg-tinymce/',
		'versions_xml_url' => 'http://leevigraham.com/version-check/versions.xml'
	);

	/**
	* Site settings for this FieldType
	* @var array
	*/
	var $default_site_settings = array();

	var $default_field_settings = array
	(
		"tiny_mce_conf"	=> ""
	);

	var $default_cell_settings = array
	(
		"tiny_mce_conf"	=> ""
	);

	var $required_configs = array();

	/**
	 * Hooks
	 * @var array
	 */
	var $hooks = array(
		'show_full_control_panel_end' => array('priority' => 99, 'method' => 'show_full_control_panel_end')
	);

	/**
	 * Constructor
	 */
	function __construct()
	{
		global $PREFS;

		# Set the paths to the TinyMCE scripts
		$this->tiny_mce_url 	= FT_URL . 'lg_tiny_mce/tiny_mce/tiny_mce.js';
		$this->config_url 		= FT_URL . 'lg_tiny_mce/tiny_mce_config/';
		$this->config_path 		= FT_PATH . 'lg_tiny_mce/tiny_mce_config/';
		
		# User-defined paths override the defaults
		
		if($PREFS->ini('lg_tiny_mce_script_url'))
		{
			$this->tiny_mce_url = $PREFS->ini('lg_tiny_mce_script_url');
		}
		
		if($PREFS->ini('lg_tiny_mce_config_url'))
		{
			$this->config_url = $PREFS->ini('lg_tiny_mce_config_url') ;
		}
		
		if($PREFS->ini('lg_tiny_mce_config_path'))
		{
			$this->config_path = $PREFS->ini('lg_tiny_mce_config_path') ;
		}
	}

	/**
	 * Display Field
	 *
	 * Create the custom field HTML for the Publish form.
	 * 
	 * @param  string  $field_name      The field's name
	 * @param  mixed   $field_data      The field's current value
	 * @param  array   $field_settings  The field's settings
	 * @return string  The field's HTML
	 */
	function display_field($field_name, $field_data, $field_settings)
	{
		global $DSP, $i;

		// new string
		$r = "\n";

		// split the filename to give this textfield a specific class
		$filename_parts = explode(".", $field_settings["tiny_mce_conf"]);

		$this->required_configs[] = $field_settings["tiny_mce_conf"];

		// add the textarea
		$r .= "<textarea class='lg_tinymce_".$filename_parts[0]."' name='". $field_name ."' style='' rows='5'>" . $field_data . "</textarea>";

		// return the string
		return $r;
	}

	/**
	 * Display Cell
	 *
	 * Create the custom FF Matrix cell HTML for the Publish form.
	 *
	 * @param 	$cell_name (string)		name you give your cell input
	 * @param 	$cell_data (string)		previously-saved cell data
	 * @param 	$cell_settings (array)	the cell settings
	 * @since 	version 2.0.0
	 */
	function display_cell($cell_name, $cell_data, $cell_settings)
	{
		$this->insert_js('(function($){$.fn.ffMatrix.onDisplayCell.lg_tinymce = function(cell){};})(jQuery);');
	
		return $this->display_field($cell_name, $cell_data, $cell_settings);
	}

	/**
	 * Display Field Settings
	 *
	 * Add custom settings to the Edit Field form
	 * 
	 * @param  	$field_settings (array)	previously-saved field settings
	 * @since 	version 2.0.0
	 */
	function display_field_settings($field_settings)
	{
		return array
		(
			'cell2' => $this->_build_field_settings($field_settings)
		);
	}

	/** 
	 * Display cell settings
	 *
	 * Add custom cell settings to the FF Matrix Configuration setting within the Edit Field form
	 *
	 * @param	$cell_settings (array)	previously-saved cell settings
	 * @since 	version 2.0.0
	 */
	function display_cell_settings($cell_settings)
	{
		return $this->_build_field_settings($cell_settings, TRUE);
	}

	/**
	 * Takes the control panel html and adds the TinyMCE scripts
	 *
	 * @param	string $out The control panel html
	 * @return	string The modified control panel html
	 * @since 	version 2.0.0
	 */
	function show_full_control_panel_end($out)
	{
		global $IN, $PREFS;

		$out = $this->get_last_call($out);
	
		# Which pages do we want to include these scripts in
		if(
			($IN->GBL('C', 'GET') == 'publish' || $IN->GBL('C', 'GET') == 'edit')
			|| (
				$IN->GBL('C', 'GET') == 'admin'
				&& $IN->GBL('M', 'GET') == 'blog_admin'
				&& $IN->GBL('P', 'GET') == 'edit_field'
			)
		)
		{
			# Include the library script
			$r =  "\n\n<!-- START LG TINYMCE 2 -->\n<script src='{$this->tiny_mce_url}'></script>";
			
			# Get each of the TinyMCE configs
			if( $configs = $this->_get_tinymce_configs() )
			{
				# Include the required configs for this page
				foreach( array_unique($this->required_configs) as $filename )
				{
					if( in_array($filename, $configs) )
					{
						$r .= "\n<script src=\"" . $this->config_url . $filename . "\"></script>";
					}
				}
			}

			$r .= "\n<!-- END LG TINYMCE 2 -->\n";

			$out = str_replace('<head>', '<head>' . $r, $out);
		}

		return $out;

	}

	/** 
	 * Builds the field / cell settings form
	 *
	 * @param  	array  $settings  The field's settings
	 * @since 	version 2.0.0
	 */
	function _build_field_settings($settings)
	{
		global $LANG, $REGX;

		# Get the language file
		$LANG->fetch_language_file("lg_tiny_mce");

		# Get the configs
		$configs = $this->_get_tinymce_configs();

		# If there is a config
		if($configs !== FALSE)
		{
			$label = $LANG->line("tiny_mce_conf_label");

			$out = "
				<div class='itemWrapper' style='float:left; margin-right:18px;'>
					<label>{$label}
						<select name='tiny_mce_conf' id='tiny_mce_conf' style='display:block; margin-top:5px'>";

			# Build the select menu
			foreach ($configs as $value)
			{
				$selected = ($value == $settings["tiny_mce_conf"]) ? "selected='selected'" : "";
				$out .= "<option value='{$value}' {$selected}>".ucfirst(str_replace(array("_", ".js"), array(" "), $value))."</option>";
			}

			$out .= "</select></label></div>";
		}

		# Otherwise there is no config, so add an error message
		else
		{
			$out = "<p class='highlight'>".$LANG->line("error_no_configs")."</p><p>".$this->config_path."</p>";
		}

		return $out;
	}

	/**
	 * Checks the tinymce configs path for files
	 * Loops over the files and returns an array of filenames => file contents
	 *
	 * @return 	boolean 	FALSE if no config files are found
	 * @return 	array 		File name => File contents for each configuration 
	 */
	function _get_tinymce_configs()
	{
		# Assume there are no configs
		$configs = FALSE;
		$dir = $this->config_path;

		# Loop over the config directory
		if(is_dir($this->config_path))
		{
			if( $dir_handle = opendir($dir) )
			{
				while (false !== ($file = readdir($dir_handle)))
				{
					# if this is a real file
					if ($file[0] != "." && $file[0] != '-' && substr($file, -3) == ".js")
					{
						# Add the config to the list
						$configs[] = $file;
					}
				}
			}
		}

		return $configs;
	}

}

/* End of file ft.lg_tinymce.php */
/* Location: ./system/fieldtypes/lg_tinymce/ft.lg_tinymce.php */