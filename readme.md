LG TinyMCE 2 - custom FieldFrame field type for [ExpressionEngine][1] 1.6
=========================================================================

Requirements
------------

LG TinyMCE 2 is a [FieldFrame][2] field type and therefore requires:

- [PHP5][3] or later
- [ExpressionEngine 1.6][1] (EE2 support under development)
- [FieldFrame][2] 1.3.5
- [TinyMCE][4] 1.3 or later (Bundled in the download)

Installation & Configuration
----------------------------

Installing LG TinyMCE is easy just follow the steps below:

- Download & install [FieldFrame][2]
- [Download LG TinyMCE 2][5]
- Copy `/system/extensions/fieldtypes/lg_tiny_mce` to `system/extensions/fieldtypes/`
- Copy `/system/language/english/lang.lg_tiny_mce.php` to `/system/language/english/`
- Enable LG TinyMCE in the Fieldtypes Manager

### Creating custom toolbar / editor instance configurations

LG TinyMCE 2 allows developers to create custom TinyMCE configurations that are assigned to one or more editor instances (custom fields). This allows you to:

- [Create custom toolbars][6]
- [Load specific TinyMCE plugins][7]
- [Modify output before it's saved][8]
- [and much much more][9]...

Custom configurations are saved in `/system/extensions/fieldtypes/lg_tiny_mce/tiny_mce_config/`. Two sample configurations are provided "Basic" & "Advanced".

If you create your own TinyMCE configs make sure you include the following attribute:

	editor_selector : 'lg_tinymce_xxx',

`xxx` represents the file name without the `.js` extension. ie: 

	// basic.js TinyMCE configuration file
	editor_selector : 'lg_tinymce_basic',

	// advanced.js TinyMCE configuration file
	editor_selector : 'lg_tinymce_advanced',

[1]: http://expressionengine.com/
[2]: http://brandon-kelly.com/fieldframe/
[3]: http://php.net/downloads.php
[4]: http://tinymce.moxiecode.com/
[5]: http://github.com/newism/lg.tiny_mce.field_type.ee_addon/zipball/master
[6]: http://wiki.moxiecode.com/index.php/TinyMCE:Control_reference
[7]: http://wiki.moxiecode.com/index.php/TinyMCE:Plugins
[8]: http://wiki.moxiecode.com/index.php/TinyMCE:Configuration#Cleanup.2FOutput
[9]: http://wiki.moxiecode.com/index.php/TinyMCE:Configuration