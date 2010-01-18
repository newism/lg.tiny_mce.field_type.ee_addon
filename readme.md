LG TinyMCE 2 - custom FieldFrame fieldtype for [ExpressionEngine][1] 1.6
=========================================================================

LG TinyMCE 2 creates a new [FieldFrame][2] fieldtype that replaces the default ExpressionEngine textarea field with a TinyMCE WYSIWYG editor. Version 2.0 introduces customisable toolbar configurations and SAEF / Fieldframe support.

Screenshots
-----------

* [![ LG TinyMCE 2.0.0 - Creating a new custom field][10_1] LG TinyMCE 2.0.0 - Creating a new custom field][10]
* [![ LG TinyMCE 2.0.0 - Publish form w/ multiple toolbar configs][11_1] LG TinyMCE 2.0.0 - Publish form w/ multiple toolbar configs][11]


Requirements
------------

**Note this version is not compatible with LG TinyMCE version 1**

LG TinyMCE 2 is a [FieldFrame][2] fieldtype and therefore requires:

- [PHP5][3] or later
- [ExpressionEngine 1.6][1] (EE2 support under development)
- [FieldFrame][2] 1.3.5
- [TinyMCE][4] 1.3 or later (Bundled in the download but can be updated independently)

Installation & Configuration
----------------------------

Installing LG TinyMCE is easy just follow the steps below:

- Download & install [FieldFrame][2]
- Download LG TinyMCE 2
- Copy `/system/extensions/fieldtypes/lg_tiny_mce` to `system/extensions/fieldtypes/`
- Copy `/system/language/english/lang.lg_tiny_mce.php` to `/system/language/english/`
- Enable LG TinyMCE in the fieldtypes Manager

### Creating custom toolbar / editor instance configurations

LG TinyMCE 2 allows developers to create custom TinyMCE configurations that are assigned to one or more editor instances (custom fields). This allows you to:

- [Create custom toolbars][6]
- [Load specific TinyMCE plugins][7]
- [Modify output before it's saved][8]
- [and much much more][9]...

Custom configurations are saved in `/system/extensions/fieldtypes/lg_tiny_mce/tiny_mce_config/`. Config files are javascript files containing a TinyMCE `init` function. Two sample configurations are provided: "Basic" & "Advanced".

    // Basic configuration for TinyMCE listing all the options
    tinyMCE.init({
    	button_tile_map : true,
    	editor_selector : 'lg_tinymce_basic',
    	mode:'textareas',
    	theme : 'advanced',
    	height : 150,
    	width : "99%",
    });

If you create your own TinyMCE configs make sure you include the following attribute:

	editor_selector : 'lg_tinymce_xxx'

`xxx` represents the file name without the `.js` extension. ie: 

	// basic.js TinyMCE configuration file
	editor_selector : 'lg_tinymce_basic'

	// advanced.js TinyMCE configuration file
	editor_selector : 'lg_tinymce_advanced'

Change log
----------
### 2.0.0

* Complete rewrite as a FieldFrame fieldtype
* Bundled TinyMCE

### 1.3.3

* Updated default settings
* Added hidden field for formatting

### 1.3.2

* Integrated LG Addon Updater

### 1.3.1

* Tiny bug fix in TinyMCE configuration
* Added donation link to extension settings

### 1.3.0

* Added MSM Compatibility
* Rewrote extension settings panel
* Added update checking

### 1.2.1

* Added number of rows option.

### 1.2.0

* Changed method names to follow new internal coding standards
* Source code commenting in PHPDoc syntax
* Added Slovak language file

### 1.1.8

* Fixed bug with GZIP option. Both GZIP and unzipped files where being loaded.

### 1.1.7

* Minor Bug Fix
* Updated documentation

### 1.1.5

* Minor Bug Fix

### 1.1.4

* Accepted into the official ExpressionEngine Addon repository

### 1.1.3

* Whitespace fix inline with EE Developer Guidelines
* Reduced number of preg_match methods

### 1.1.2

* Default configuration update
* Small memory improvement

### 1.1.0

* Added GZip compression option

### 1.0.0

* Initial Release


License
-------

Ownership of this software always remains property of the author.

You may:

* Modify the software for your own projects
* Use the software on personal and commercial projects

You may not:

* Resell or redistribute the software in any form or manner without permission of the author
* Remove the license / copyright / author credits

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.

[1]: http://expressionengine.com/
[2]: http://brandon-kelly.com/fieldframe/
[3]: http://php.net/downloads.php
[4]: http://tinymce.moxiecode.com/
[5]: http://github.com/newism/lg.tiny_mce.field_type.ee_addon/zipball/master
[6]: http://wiki.moxiecode.com/index.php/TinyMCE:Control_reference
[7]: http://wiki.moxiecode.com/index.php/TinyMCE:Plugins
[8]: http://wiki.moxiecode.com/index.php/TinyMCE:Configuration#Cleanup.2FOutput
[9]: http://wiki.moxiecode.com/index.php/TinyMCE:Configuration
[10]: http://s3.amazonaws.com/ember/BvdPpQAhf6dYxnSeWpngi7B9k3KIkB5o_m.jpg "LG TinyMCE 2.0.0 - Creating a new custom field"
[10_1]: http://s3.amazonaws.com/ember/BvdPpQAhf6dYxnSeWpngi7B9k3KIkB5o_s.jpg "LG TinyMCE 2.0.0 - Creating a new custom field thumbnail"
[11]: http://s3.amazonaws.com/ember/N6ZqSdf9M85oaO4Wm2MxFMpNTIdA5lYw_m.jpg "LG TinyMCE 2.0.0 - Publish form w/ multiple toolbar configs"
[11_1]: http://s3.amazonaws.com/ember/N6ZqSdf9M85oaO4Wm2MxFMpNTIdA5lYw_s.jpg "LG TinyMCE 2.0.0 - Publish form w/ multiple toolbar configs thumbnail"


<!-- 
    This document is marked up using the Markdown syntax: http://daringfireball.net/projects/markdown/
    If you are reading this notice you may need to run the raw content through the Dingus online Markdown parser: http://daringfireball.net/projects/markdown/dingus
    If you are viewing this readme on Github you don't need to re-parse the file.
-->