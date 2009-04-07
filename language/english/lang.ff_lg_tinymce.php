<?php

$L = array(

	"lg_tinymce_settings_title" 	=> "LG TinyMCE settings",
	"lg_tinymce_settings_info" 		=> " <p>Global TinyMCE scripts will be loaded once even if there are multiple fields on the same page. Include the TinyMCE library script or the GZipped version of the library and the the GZip init script.</p>",
	"lg_tinymce_settings_example" 	=> "<p>Standard TinyMCE example:</p>
<pre><code>&lt;script src=&#x27;/scripts/tiny_mce/tiny_mce.js&#x27; type=&#x27;text/javascript&#x27; charset=&#x27;utf-8&#x27;&gt;&lt;/script&gt;</code></pre>
<p>GZipped TinyMCE example:</p>
<pre><code>&lt;script src=&#x27;/scripts/tiny_mce/tiny_mce_gzip.js&#x27; type=&#x27;text/javascript&#x27; charset=&#x27;utf-8&#x27;&gt;&lt;/script&gt;
	&lt;script type=&#x27;text/javascript&#x27;&gt;
	    // include all your plugins and themes!
	    tinyMCE_GZ.init({
	        plugins : &#x27;safari,pagebreak,style,layer,table,save,advhr,advimage,&#x27;
	        + &#x27;advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,&#x27;
	        + &#x27;searchreplace,print,contextmenu,paste,directionality,fullscreen,&#x27;
	        + &#x27;noneditable,visualchars,nonbreaking,xhtmlxtras,template&#x27;,
	        themes : &#x27;advanced&#x27;,
	        languages : &#x27;en&#x27;,
	        disk_cache : true,
	        debug : false
	    });
	&lt;/script&gt;</code></pre>",
	
	"lg_tinymce_config_path_label" => "TinyMCE config server path",
	"lg_tinymce_global_scripts_label" => "TinyMCE global scripts",

	"tiny_mce_conf_label" => "TinyMCE configuration:",
	"error_no_configs" => "There were no TinyMMCE configuration files found in:",

	"tiny_mce_rows_label" => "Rows:",

	"" => ""
);