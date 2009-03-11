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
	var $default_site_settings 		= array(
		"tinymce_global_scripts"			=> "<script src='/scripts/tiny_mce/tiny_mce_gzip.js' type='text/javascript' charset='utf-8'></script>
<script type='text/javascript'>
//<![CDATA[
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
//]]>
</script>");

	var $required_configs = array();

	/**
	* Hooks
	* @var array
	*/
	var $hooks = array(
		'show_full_control_panel_end' => array('priority' => 99, 'method' => 'show_full_control_panel_end')
	);

	/**
	* Constructor - Adds a closing slash to the tinymce configs path if needed
	*/
	function __construct()
	{
		global $SESS;

		// create a $SESS array element for lg addons
		if(isset($SESS->cache['lg']) === FALSE) $SESS->cache['lg'] = array();
	}

	/**
	* Display Site Settings
	*/
	function display_site_settings()
	{
		global $LANG;
		$SD = new Fieldframe_SettingsDisplay();
		$r = $SD->block($LANG->line("lg_tinymce_settings_title"))
			. $SD->row(array(
				'<div class="box" style="border-width:0 0 1px 0; margin:0; padding:10px 5px">'
				. $LANG->line("lg_tinymce_settings_info")
				. '</div>'
				), '')
			. $SD->row(array(
				$SD->label($LANG->line("lg_tinymce_global_scripts_label"), ''),
				$SD->textarea('tinymce_global_scripts', $this->site_settings['tinymce_global_scripts'], array('rows' => '15', 'width' => '99%'))
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
	function display_field($field_name, $field_data, $field_settings, $row = array())
	{
		global $DSP;

		// new string
		$r = "\n";

		// split the filename to give this textfield a specific class
		$filename_parts = explode(".", $field_settings["tiny_mce_conf"]);

		$this->required_configs[] = $field_settings["tiny_mce_conf"];

		// add the textarea
		$r .= $DSP->input_textarea($field_name, $field_data, (isset($row['tiny_mce_rows']) ? $row['tiny_mce_rows'] : 20), 'lg_tinymce_' . $filename_parts[0], '99%');

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
		global $LANG, $REGX, $SESS;

		$SESS->cache['lg']['ff_tinymce']['require_scripts'] = TRUE;

		$settings = array_merge(array("tiny_mce_conf" => "", "tiny_mce_rows" => "20"), $settings);

		// open the cell
		$cell2 = "<label for='tiny_mce_conf'>".$LANG->line("tiny_mce_conf_label")."</label> ";

		// get the configs
		$configs = $this->_get_tinymce_configs();

		// if configs
		if($configs !== FALSE)
		{
			// create select
			$cell2 .= "<select name='tiny_mce_conf' id='tiny_mce_conf'>";
			// loop over each config
			foreach ($configs as $key => $value)
			{
				$selected = ($key == $settings["tiny_mce_conf"]) ? " selected='selected'" : "";
				// add an option with the filename as the key
				$cell2 .= "<option value='".$key."'".$selected.">".$key."</option>";
			}
			// close the select
			$cell2 .= "</select>";

			// open the cell
			$cell2 .= "<label for='tiny_mce_rows' style='margin-left:18px'>".$LANG->line("tiny_mce_rows_label")."</label> ";
			// create rows
			$cell2 .= "<input type='text' size='2' name='tiny_mce_rows' id='tiny_mce_rows' value='".$REGX->form_prep($settings["tiny_mce_rows"])."' />";

			// return the array
			return array('cell2' => $cell2);
		}
		// no configs
		else
		{
			// add an error message
			$cell2 .= "<span class='highlight'>".$LANG->line("error_no_configs")." ".$this->settings["tinymce_configs_path"].".</span>";
		}

		return array(
			'cell2'						=> $cell2,
			'formatting_unavailable' 	=> 'y',
			'direction_unavailable' 	=> 'y',
		);

	}

	/**
	* Takes the control panel html and adds the TinyMCE scripts
	*
	* @param	string $out The control panel html
	* @return	string The modified control panel html
	* @since 	Version 2.0.0
	*/
	function show_full_control_panel_end($out)
	{
		global $IN, $EXT, $SESS;

		if($EXT->last_call !== FALSE) $out = $EXT->last_call;

		if($IN->GBL('C', 'GET') == 'publish' || $IN->GBL('C', 'GET') == 'edit')
		{
			// include the library script
			$r =  "\n\n" . "<!-- START LG TINYMCE 2 -->";
			$r .= "\n" . $this->site_settings['tinymce_global_scripts'];

			if(($configs = $this->_get_tinymce_configs()) !== FALSE)
			{
				foreach ($this->required_configs as $filename)
				{
					// include it
					if(substr($filename, -3) == ".js")
					{
						$r .= "\n".'<script src="'.FT_URL."ff_lg_tinymce/tinymce_config/".$filename.'" type="text/javascript" charset="utf-8"></script>';
					}
					else
					{
						$r .= $configs[$filename];
					}
				}
			}

			$r .= "\n" . "<!-- END LG TINYMCE 2 -->\n";
			$out = str_replace("<head>", "<head>" . $r, $out);
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
		global $SESS;

		// have the configs been processed?
		if(isset($SESS->cache['lg']['ff_tinymce']['configs']) === FALSE)
		{
			// assume there are no configs
			$configs = FALSE;
			// if the provided string an actual directory
			if(is_dir($dir = FT_PATH."ff_lg_tinymce/tinymce_config/"))
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