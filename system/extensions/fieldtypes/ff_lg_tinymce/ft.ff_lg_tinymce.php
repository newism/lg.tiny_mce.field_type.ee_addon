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
class Ff_lg_tinymce extends Fieldframe_Fieldtype {

	/**
	* FieldType information
	* @var array
	*/
	var $info = array(
		'name'             => 'LG TinyMCE (FieldFrame)',
		'version'          => '1.0.0',
		'desc'             => 'Integrates Moxicodes TinyMCE into ExpressionEngine providing WYSIWYG content editing',
		'docs_url'         => 'http://leevigraham.com/cms-customisation/expressionengine/addon/lg-tinymce/',
		'versions_xml_url' => 'http://leevigraham.com/version-check/versions.xml'
	);

	/**
	* Site settings for this FieldType
	* @var array
	*/
	var $default_site_settings 		= array(
		"tinymce_global_scripts"			=> "<script src='/scripts/tiny_mce/tiny_mce_gzip.js' type='text/javascript' charset='utf-8'></script>
<script type='text/javascript'>
tinyMCE_GZ.init({
	plugins : 'safari,pagebreak,style,layer,table,save,advhr,advimage,'
	+ 'advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,'
	+ 'searchreplace,print,contextmenu,paste,directionality,fullscreen,'
	+ 'noneditable,visualchars,nonbreaking,xhtmlxtras,template',
	themes : 'advanced',
	languages : 'en',
	disk_cache : true,
	debug : false
});
</script>",
	"tinymce_configs_path"					=> "/Library/WebServer/WebDocuments/Internal/dev.cmsfever.com/ee-admin/extensions/fieldtypes/ff_lg_tinymce/tinymce_config/"
);

	/**
	* Constructor - Adds a closing slash to the tinymce configs path if needed
	*/
	function __construct()
	{
		//
		$this->site_settings["tinymce_configs_path"] = FT_PATH . "ff_lg_tinymce/tinymce_config/";

		global $SESS;

		// create a $SESS array element for lg addons
		if(isset($SESS->cache['lg']) === FALSE) $SESS->cache['lg'] = array();

		// add a trailing slash to the tinymce configs path if required
		if(substr($this->site_settings["tinymce_configs_path"], -1, 1) != "/")
		{
			$this->site_settings["tinymce_configs_path"] .= "/";
		}
	}

	/**
	* Display Site Settings
	*/
	function display_site_settings()
	{
		$SD = new Fieldframe_SettingsDisplay();
		$r = $SD->block("LG TinyMCE settings")
			. $SD->row(array(
				$SD->label('TinyMCE config server path', ''),
				$SD->text('tinymce_configs_path', $this->site_settings['tinymce_configs_path'], array('width' => '99%'))
			))
			. $SD->row(array(
				$SD->label('TinyMCE Global Scripts', ''),
				$SD->textarea('tinymce_global_scripts', $this->site_settings['tinymce_global_scripts'], array('rows' => '20', 'width' => '99%'))
			))
		. $SD->block_c();
		return $r;
	}
	/**
	* Display Field
	* 
	* @param  string  $field_name      The field's name
	* @param  mixed   $field_data      The field's current value
	* @param  array   $field_settings  The field's settings
	* @return string  The field's HTML
	*/
	function display_field($field_name, $field_data, $field_settings)
	{
		global $DSP, $SESS;

		// new string
		$r = "\n";

		// if the library script has not been included
		if(isset($SESS->cache['lg']['ff_tinymce']['script_included']) === FALSE)
		{
			// include the library script
			$r .= $this->site_settings['tinymce_global_scripts'];
			// flag included
			$SESS->cache['lg']['ff_tinymce']['script_included'] = TRUE;
		}

		// get the configs
		$configs = $this->_get_tinymce_configs();

		// if configs
		if($configs !== FALSE)
		{
			// if this config has not been included
			if(isset($SESS->cache['lg']['ff_tinymce']['included_configs'][$field_settings["tiny_mce_conf"]]) === FALSE)
			{
				// include it
				$r .= $configs[$field_settings["tiny_mce_conf"]];
				// flag included
				$SESS->cache['lg']['ff_tinymce']['included_configs'][$field_settings["tiny_mce_conf"]] = TRUE;
			}
		}

		// split the filename to give this textfield a specific class
		$filename_parts = explode(".", $field_settings["tiny_mce_conf"]);

		// add the textarea
		$r .= $DSP->input_textarea($field_name, $field_data, 16, 'lg_tinymce_' . $filename_parts[0], '99%');

		// return the string
		return $r;
	}

	/**
	* Display Field Settings
	* 
	* @param  array  $settings  The field's settings
	* @return array  Settings HTML (col1, col2, rows)
	*/
	function display_field_settings($settings)
	{
		// open the cell
		$cell2 = "<label for=''>TinyMCE Configuration:</label> ";

		// get the configs
		$configs = $this->_get_tinymce_configs();

		// if configs
		if($configs !== FALSE)
		{
			// create select
			$cell2 .= "<select name='tiny_mce_conf'>";
			// loop over each config
			foreach ($configs as $key => $value)
			{
				// add an option with the filename as the key
				$cell2 .= "<option value='".$key."'>".$key."</option>";
			}
			// close the select
			$cell2 .= "</select>";
		}
		// no configs
		else
		{
			// add an error message
			$cell2 .= "<span class='highlight'>No configuration files found in: ".$this->settings["tinymce_configs_path"].".</span>";
		}

		// return the array
		return array('cell2' => $cell2);
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
		global $SESS;

		// have the configs been processed?
		if(isset($SESS->cache['lg']['ff_tinymce']['configs']) === FALSE)
		{
			// assume there are no configs
			$configs = FALSE;
			// if the provided string an actual directory
			if(is_dir($dir = $this->site_settings["tinymce_configs_path"]))
			{
				// open the directory and assign it to a handle
				$dir_handle = opendir($dir);
				// if there is a dir handle
				if($dir_handle)
				{
					/* This is the correct way to loop over the directory. */
		    		// loop over the files
					while (false !== ($file = readdir($dir_handle)))
					{
						// if this is a real file
						if ($file != "." && $file != ".." && $file != "Thumb.db" && substr($file, 0, 1) != '-')
						{
							// add the config to the list
							$configs[$file] = file_get_contents($dir.$file);
						}
					}
				}
			}
			// assign the configs to a session var
			$SESS->cache['lg']['ff_tinymce']['configs'] = $configs;
		}

		// return the session var
		return $SESS->cache['lg']['ff_tinymce']['configs'];
	}

}

/* End of file ft.ff_lg_tinymce.php */
/* Location: ./system/fieldtypes/ff_lg_tinymce/ft.ff_lg_tinymce.php */