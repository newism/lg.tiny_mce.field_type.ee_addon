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

	var $default_field_settings = array(
		"tiny_mce_conf"	=> ""
	);

	var $default_cell_settings = array(
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
				$SD->label($LANG->line("lg_tinymce_global_scripts_label"), '')
				. $LANG->line("lg_tinymce_settings_info")
				. $LANG->line("lg_tinymce_settings_example"),
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
	* @param  	array  $settings  The field's settings
	* @since 	version 2.0.0
	*/
	function display_cell($cell_name, $cell_data, $cell_settings)
	{
		return $this->display_field($cell_name, $cell_data, $cell_settings);
	}

	/**
	* Display Field Settings
	* 
	* @param  	array  $settings  The field's settings
	* @since 	version 2.0.0
	*/
	function display_field_settings($settings)
	{
		return array(
			'cell2' => $this->_build_field_settings($settings)
		);

	}

	/** 
	* Display cell settings
	*
	* @param  	array  $settings  The field's settings
	* @since 	version 2.0.0
	*/
	function display_cell_settings($settings)
	{
		return $this->_build_field_settings($settings, TRUE);
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

		$LANG->fetch_language_file("ff_lg_tinymce");

		// open the cell

		// get the configs
		$configs = $this->_get_tinymce_configs();

		// if configs
		if($configs !== FALSE)
		{
			$out = "<div class='itemWrapper' style='float:left; margin-right:18px;'><label>".$LANG->line("tiny_mce_conf_label");

			// create select
			$out .= " <select name='tiny_mce_conf' id='tiny_mce_conf'"." style='display:block; margin-top:5px'>";
			// loop over each config
			foreach ($configs as $key => $value)
			{
				$selected = ($key == $settings["tiny_mce_conf"]) ? " selected='selected'" : "";
				// add an option with the filename as the key
				$out .= "<option value='".$key."'".$selected.">".$key."</option>";
			}
			// close the select
			$out .= "</select>";
			$out .= "</label></div>";

			/*
			// open the cell
			$out .= "<div class='itemWrapper' style='float:left'><label>".$LANG->line("tiny_mce_rows_label")."";
			// create rows
			$out .= " <input type='text' size='2' name='tiny_mce_rows' id='tiny_mce_rows' value='".$REGX->form_prep($settings["tiny_mce_rows"])."' style='width:30px; display:block; margin-top:9px' />";
			$out .= "</label></div>";
			*/
		}
		// no configs
		else
		{
			// add an error message
			$out = "<span class='highlight'>".$LANG->line("error_no_configs")." ".$this->settings["tinymce_configs_path"].".</span>";
		}

		return $out;

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
		global $IN;

		$out = $this->get_last_call($out) . NL . NL;

		if(
			($IN->GBL('C', 'GET') == 'publish' || $IN->GBL('C', 'GET') == 'edit')
			|| (
				$IN->GBL('C', 'GET') == 'admin'
				&& $IN->GBL('M', 'GET') == 'blog_admin'
				&& $IN->GBL('P', 'GET') == 'edit_field'
			)
		)
		{
			// include the library script
			$r =  "\n\n" . "<!-- START LG TINYMCE 2 -->";
			$r .= "\n" . $this->site_settings['tinymce_global_scripts'];

			if(($configs = $this->_get_tinymce_configs()) !== FALSE)
			{
				foreach (array_unique($this->required_configs) as $filename)
				{
					// include it
					if(substr($filename, -3) == ".js")
					{
						$r .= "\n".'<script src="'.FT_URL."ff_lg_tinymce/tinymce_config/".$filename.'" type="text/javascript" charset="utf-8"></script>';
					}
					elseif(isset($configs[$filename]) === TRUE)
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