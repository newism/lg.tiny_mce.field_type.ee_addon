// Advanced configuration for TinyMCE listing all the options
tinyMCE.init({

	button_tile_map : true,
	editor_selector : 'lg_tinymce_advanced',
	mode:'textareas',
	theme : 'advanced',
	height : 300,
	width : "99%",

	// Cleanup/Output
	apply_source_formatting : true,
	convert_fonts_to_spans : true,
	convert_newlines_to_brs : false,
	fix_list_elements : true,
	fix_table_elements : true,
	fix_nesting : true,
	forced_root_block : 'p',

	// URL
	relative_urls : false,
	remove_script_host : true,

	// Layout
	// Uncomment and add your own stylesheet to style editor content
	// content_css : '/themes/site_themes/default/styles/editor.css?' + new Date().getTime(),

	// Advanced Theme
	theme_advanced_blockformats : 'p,h1,h2,h3,h4,h5,h6,code',
	theme_advanced_toolbar_location : 'top',
	theme_advanced_toolbar_align : 'left',
	theme_advanced_statusbar_location : 'bottom',
	theme_advanced_resize_horizontal : false,
	theme_advanced_resizing : true,

	/* 
	Advanced Configuration
	Every button and plugin in the world. With great power come shitty code...
	*/
	plugins : ''
	+ 'safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,'
	+ 'inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,'
	+ 'directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template',
	theme_advanced_buttons1 : 'save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,'
	+ 'justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect',
	theme_advanced_buttons2 : 'cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,'
	+ '|,outdent,indent,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime'
	+ 'preview,|,forecolor,backcolor',
	theme_advanced_buttons3 : 'tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,'
	+ 'iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen',
	theme_advanced_buttons4 : 'insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,'
	+ 'acronym,del,ins,|,visualchars,nonbreaking',

	// Really Long Settings
	entities : ''
	+ '160,nbsp,38,amp,162,cent,8364,euro,163,pound,165,yen,169,copy,174,reg,8482,trade,'
	+ '8240,permil,181,micro,183,middot,8226,bull,8230,hellip,8242,prime,8243,Prime,167,sect,'
	+ '182,para,223,szlig,8249,lsaquo,8250,rsaquo,171,laquo,187,raquo,8216,lsquo,8217,rsquo,'
	+ '8220,ldquo,8221,rdquo,8218,sbquo,8222,bdquo,60,lt,62,gt,8804,le,8805,ge,8211,ndash,'
	+ '8212,mdash,175,macr,8254,oline,164,curren,166,brvbar,168,uml,161,iexcl,191,iquest,'
	+ '710,circ,732,tilde,176,deg,8722,minus,177,plusmn,247,divide,8260,frasl,215,times,185,sup1,'
	+ '178,sup2,179,sup3,188,frac14,189,frac12,190,frac34,402,fnof,8747,int,8721,sum,8734,infin,'
	+ '8730,radic,8764,sim,8773,cong,8776,asymp,8800,ne,8801,equiv,8712,isin,8713,notin,8715,ni,'
	+ '8719,prod,8743,and,8744,or,172,not,8745,cap,8746,cup,8706,part,8704,forall,8707,exist,'
	+ '8709,empty,8711,nabla,8727,lowast,8733,prop,8736,ang,180,acute,184,cedil,170,ordf,186,ordm,'
	+ '8224,dagger,8225,Dagger,192,Agrave,194,Acirc,195,Atilde,196,Auml,197,Aring,198,AElig,'
	+ '199,Ccedil,200,Egrave,202,Ecirc,203,Euml,204,Igrave,206,Icirc,207,Iuml,208,ETH,209,Ntilde,'
	+ '210,Ograve,212,Ocirc,213,Otilde,214,Ouml,216,Oslash,338,OElig,217,Ugrave,219,Ucirc,220,Uuml,'
	+ '376,Yuml,222,THORN,224,agrave,226,acirc,227,atilde,228,auml,229,aring,230,aelig,231,ccedil,'
	+ '232,egrave,234,ecirc,235,euml,236,igrave,238,icirc,239,iuml,240,eth,241,ntilde,242,ograve,'
	+ '244,ocirc,245,otilde,246,ouml,248,oslash,339,oelig,249,ugrave,251,ucirc,252,uuml,254,thorn,'
	+ '255,yuml,914,Beta,915,Gamma,916,Delta,917,Epsilon,918,Zeta,919,Eta,920,Theta,921,Iota,922,Kappa,'
	+ '923,Lambda,924,Mu,925,Nu,926,Xi,927,Omicron,928,Pi,929,Rho,931,Sigma,932,Tau,933,Upsilon,'
	+ '934,Phi,935,Chi,936,Psi,937,Omega,945,alpha,946,beta,947,gamma,948,delta,949,epsilon,950,zeta,'
	+ '951,eta,952,theta,953,iota,954,kappa,955,lambda,956,mu,957,nu,958,xi,959,omicron,960,pi,'
	+ '961,rho,962,sigmaf,963,sigma,964,tau,965,upsilon,966,phi,967,chi,968,psi,969,omega,8501,alefsym,'
	+ '982,piv,8476,real,977,thetasym,978,upsih,8472,weierp,8465,image,8592,larr,8593,uarr,8594,rarr,'
	+ '8595,darr,8596,harr,8629,crarr,8656,lArr,8657,uArr,8658,rArr,8659,dArr,8660,hArr,8756,there4,'
	+ '8834,sub,8835,sup,8836,nsub,8838,sube,8839,supe,8853,oplus,8855,otimes,8869,perp,8901,sdot,'
	+ '8968,lceil,8969,rceil,8970,lfloor,8971,rfloor,9001,lang,9002,rang,9674,loz,9824,spades,'
	+ '9827,clubs,9829,hearts,9830,diams,8194,ensp,8195,emsp,8201,thinsp,8204,zwnj,8205,zwj,8206,lrm,'
	+ '8207,rlm,173,shy,233,eacute,237,iacute,243,oacute,250,uacute,193,Aacute,225,aacute,201,Eacute,'
	+ '205,Iacute,211,Oacute,218,Uacute,221,Yacute,253,yacute',

	valid_elements : ''
	+'a[accesskey|charset|class|coords|dir<ltr?rtl|href|hreflang|id|lang|name'
	+'|onblur|onclick|ondblclick|onfocus|onkeydown|onkeypress|onkeyup'
	+'|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|rel|rev'
	+'|shape<circle?default?poly?rect|style|tabindex|title|target|type],'
	+'abbr[class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress'
	+'|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style'
	+'|title],'
	+'acronym[class|dir<ltr?rtl|id|id|lang|onclick|ondblclick|onkeydown|onkeypress'
	+'|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style'
	+'|title],'
	+'address[class|align|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown'
	+'|onkeypress|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover'
	+'|onmouseup|style|title],'
	+'applet[align<bottom?left?middle?right?top|alt|archive|class|code|codebase'
	+'|height|hspace|id|name|object|style|title|vspace|width],'
	+'area[accesskey|alt|class|coords|dir<ltr?rtl|href|id|lang|nohref<nohref'
	+'|onblur|onclick|ondblclick|onfocus|onkeydown|onkeypress|onkeyup'
	+'|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup'
	+'|shape<circle?default?poly?rect|style|tabindex|title|target],'
	+'base[href|target],'
	+'basefont[color|face|id|size],'
	+'bdo[class|dir<ltr?rtl|id|lang|style|title],'
	+'big[class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress'
	+'|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style'
	+'|title],'
	+'blockquote[dir|style|cite|class|dir<ltr?rtl|id|lang|onclick|ondblclick'
	+'|onkeydown|onkeypress|onkeyup|onmousedown|onmousemove|onmouseout'
	+'|onmouseover|onmouseup|style|title],'
	+'body[alink|background|bgcolor|class|dir<ltr?rtl|id|lang|link|onclick'
	+'|ondblclick|onkeydown|onkeypress|onkeyup|onload|onmousedown|onmousemove'
	+'|onmouseout|onmouseover|onmouseup|onunload|style|title|text|vlink],'
	+'br[class|clear<all?left?none?right|id|style|title],'
	+'button[accesskey|class|dir<ltr?rtl|disabled<disabled|id|lang|name|onblur'
	+'|onclick|ondblclick|onfocus|onkeydown|onkeypress|onkeyup|onmousedown'
	+'|onmousemove|onmouseout|onmouseover|onmouseup|style|tabindex|title|type'
	+'|value],'
	+'caption[align<bottom?left?right?top|class|dir<ltr?rtl|id|lang|onclick'
	+'|ondblclick|onkeydown|onkeypress|onkeyup|onmousedown|onmousemove'
	+'|onmouseout|onmouseover|onmouseup|style|title],'
	+'center[class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress'
	+'|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style'
	+'|title],'
	+'cite[class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress'
	+'|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style'
	+'|title],'
	+'code[class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress'
	+'|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style'
	+'|title],'
	+'col[align<center?char?justify?left?right|char|charoff|class|dir<ltr?rtl|id'
	+'|lang|onclick|ondblclick|onkeydown|onkeypress|onkeyup|onmousedown'
	+'|onmousemove|onmouseout|onmouseover|onmouseup|span|style|title'
	+'|valign<baseline?bottom?middle?top|width],'
	+'colgroup[align<center?char?justify?left?right|char|charoff|class|dir<ltr?rtl'
	+'|id|lang|onclick|ondblclick|onkeydown|onkeypress|onkeyup|onmousedown'
	+'|onmousemove|onmouseout|onmouseover|onmouseup|span|style|title'
	+'|valign<baseline?bottom?middle?top|width],'
	+'dd[class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress|onkeyup'
	+'|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style|title],'
	+'del[cite|class|datetime|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown'
	+'|onkeypress|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover'
	+'|onmouseup|style|title],'
	+'dfn[class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress'
	+'|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style'
	+'|title],'
	+'dir[class|compact<compact|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown'
	+'|onkeypress|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover'
	+'|onmouseup|style|title],'
	+'div[align<center?justify?left?right|class|dir<ltr?rtl|id|lang|onclick'
	+'|ondblclick|onkeydown|onkeypress|onkeyup|onmousedown|onmousemove'
	+'|onmouseout|onmouseover|onmouseup|style|title],'
	+'dl[class|compact<compact|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown'
	+'|onkeypress|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover'
	+'|onmouseup|style|title],'
	+'dt[class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress|onkeyup'
	+'|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style|title],'
	+'em/i[class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress'
	+'|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style'
	+'|title],'
	+'fieldset[class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress'
	+'|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style'
	+'|title],'
	+'font[class|color|dir<ltr?rtl|face|id|lang|size|style|title],'
	+'form[accept|accept-charset|action|class|dir<ltr?rtl|enctype|id|lang'
	+'|method<get?post|name|onclick|ondblclick|onkeydown|onkeypress|onkeyup'
	+'|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|onreset|onsubmit'
	+'|style|title|target],'
	+'frame[class|frameborder|id|longdesc|marginheight|marginwidth|name'
	+'|noresize<noresize|scrolling<auto?no?yes|src|style|title],'
	+'frameset[class|cols|id|onload|onunload|rows|style|title],'
	+'h1[align<center?justify?left?right|class|dir<ltr?rtl|id|lang|onclick'
	+'|ondblclick|onkeydown|onkeypress|onkeyup|onmousedown|onmousemove'
	+'|onmouseout|onmouseover|onmouseup|style|title],'
	+'h2[align<center?justify?left?right|class|dir<ltr?rtl|id|lang|onclick'
	+'|ondblclick|onkeydown|onkeypress|onkeyup|onmousedown|onmousemove'
	+'|onmouseout|onmouseover|onmouseup|style|title],'
	+'h3[align<center?justify?left?right|class|dir<ltr?rtl|id|lang|onclick'
	+'|ondblclick|onkeydown|onkeypress|onkeyup|onmousedown|onmousemove'
	+'|onmouseout|onmouseover|onmouseup|style|title],'
	+'h4[align<center?justify?left?right|class|dir<ltr?rtl|id|lang|onclick'
	+'|ondblclick|onkeydown|onkeypress|onkeyup|onmousedown|onmousemove'
	+'|onmouseout|onmouseover|onmouseup|style|title],'
	+'h5[align<center?justify?left?right|class|dir<ltr?rtl|id|lang|onclick'
	+'|ondblclick|onkeydown|onkeypress|onkeyup|onmousedown|onmousemove'
	+'|onmouseout|onmouseover|onmouseup|style|title],'
	+'h6[align<center?justify?left?right|class|dir<ltr?rtl|id|lang|onclick'
	+'|ondblclick|onkeydown|onkeypress|onkeyup|onmousedown|onmousemove'
	+'|onmouseout|onmouseover|onmouseup|style|title],'
	+'head[dir<ltr?rtl|lang|profile],'
	+'hr[align<center?left?right|class|dir<ltr?rtl|id|lang|noshade<noshade|onclick'
	+'|ondblclick|onkeydown|onkeypress|onkeyup|onmousedown|onmousemove'
	+'|onmouseout|onmouseover|onmouseup|size|style|title|width],'
	+'html[dir<ltr?rtl|lang|version],'
	+'iframe[align<bottom?left?middle?right?top|class|frameborder|height|id'
	+'|longdesc|marginheight|marginwidth|name|scrolling<auto?no?yes|src|style'
	+'|title|width],'
	+'img[align<bottom?left?middle?right?top|alt|border|class|dir<ltr?rtl|height'
	+'|hspace|id|ismap<ismap|lang|longdesc|name|onclick|ondblclick|onkeydown'
	+'|onkeypress|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover'
	+'|onmouseup|src|style|title|usemap|vspace|width],'
	+'input[accept|accesskey|align<bottom?left?middle?right?top|alt'
	+'|checked<checked|class|dir<ltr?rtl|disabled<disabled|id|ismap<ismap|lang'
	+'|maxlength|name|onblur|onclick|ondblclick|onfocus|onkeydown|onkeypress'
	+'|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|onselect'
	+'|readonly<readonly|size|src|style|tabindex|title'
	+'|type<button?checkbox?file?hidden?image?password?radio?reset?submit?text'
	+'|usemap|value],'
	+'ins[cite|class|datetime|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown'
	+'|onkeypress|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover'
	+'|onmouseup|style|title],'
	+'isindex[class|dir<ltr?rtl|id|lang|prompt|style|title],'
	+'kbd[class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress'
	+'|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style'
	+'|title],'
	+'label[accesskey|class|dir<ltr?rtl|for|id|lang|onblur|onclick|ondblclick'
	+'|onfocus|onkeydown|onkeypress|onkeyup|onmousedown|onmousemove|onmouseout'
	+'|onmouseover|onmouseup|style|title],'
	+'legend[align<bottom?left?right?top|accesskey|class|dir<ltr?rtl|id|lang'
	+'|onclick|ondblclick|onkeydown|onkeypress|onkeyup|onmousedown|onmousemove'
	+'|onmouseout|onmouseover|onmouseup|style|title],'
	+'li[class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress|onkeyup'
	+'|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style|title|type'
	+'|value],'
	+'link[charset|class|dir<ltr?rtl|href|hreflang|id|lang|media|onclick'
	+'|ondblclick|onkeydown|onkeypress|onkeyup|onmousedown|onmousemove'
	+'|onmouseout|onmouseover|onmouseup|rel|rev|style|title|target|type],'
	+'map[class|dir<ltr?rtl|id|lang|name|onclick|ondblclick|onkeydown|onkeypress'
	+'|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style'
	+'|title],'
	+'menu[class|compact<compact|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown'
	+'|onkeypress|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover'
	+'|onmouseup|style|title],'
	+'meta[content|dir<ltr?rtl|http-equiv|lang|name|scheme],'
	+'noframes[class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress'
	+'|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style'
	+'|title],'
	+'noscript[class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress'
	+'|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style'
	+'|title],'
	+'object[align<bottom?left?middle?right?top|archive|border|class|classid'
	+'|codebase|codetype|data|declare|dir<ltr?rtl|height|hspace|id|lang|name'
	+'|onclick|ondblclick|onkeydown|onkeypress|onkeyup|onmousedown|onmousemove'
	+'|onmouseout|onmouseover|onmouseup|standby|style|tabindex|title|type|usemap'
	+'|vspace|width],'
	+'ol[class|compact<compact|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown'
	+'|onkeypress|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover'
	+'|onmouseup|start|style|title|type],'
	+'optgroup[class|dir<ltr?rtl|disabled<disabled|id|label|lang|onclick'
	+'|ondblclick|onkeydown|onkeypress|onkeyup|onmousedown|onmousemove'
	+'|onmouseout|onmouseover|onmouseup|style|title],'
	+'option[class|dir<ltr?rtl|disabled<disabled|id|label|lang|onclick|ondblclick'
	+'|onkeydown|onkeypress|onkeyup|onmousedown|onmousemove|onmouseout'
	+'|onmouseover|onmouseup|selected<selected|style|title|value],'
	+'p[align<center?justify?left?right|class|dir<ltr?rtl|id|lang|onclick'
	+'|ondblclick|onkeydown|onkeypress|onkeyup|onmousedown|onmousemove'
	+'|onmouseout|onmouseover|onmouseup|style|title],'
	+'param[id|name|type|value|valuetype<DATA?OBJECT?REF],'
	+'pre/listing/plaintext/xmp[align|class|dir<ltr?rtl|id|lang|onclick|ondblclick'
	+'|onkeydown|onkeypress|onkeyup|onmousedown|onmousemove|onmouseout'
	+'|onmouseover|onmouseup|style|title|width],'
	+'q[cite|class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress'
	+'|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style'
	+'|title],'
	+'s[class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress|onkeyup'
	+'|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style|title],'
	+'samp[class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress'
	+'|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style'
	+'|title],'
	+'script[charset|defer|language|src|type],'
	+'select[class|dir<ltr?rtl|disabled<disabled|id|lang|multiple<multiple|name'
	+'|onblur|onclick|ondblclick|onfocus|onkeydown|onkeypress|onkeyup'
	+'|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|size|style'
	+'|tabindex|title],'
	+'small[class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress'
	+'|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style'
	+'|title],'
	+'span[align<center?justify?left?right|class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown'
	+'|onkeypress|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover'
	+'|onmouseup|style|title],'
	+'strike[class|class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown'
	+'|onkeypress|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover'
	+'|onmouseup|style|title],'
	+'strong/b[class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress'
	+'|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style'
	+'|title],'
	+'style[dir<ltr?rtl|lang|media|title|type],'
	+'sub[class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress'
	+'|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style'
	+'|title],'
	+'sup[class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress'
	+'|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style'
	+'|title],'
	+'table[align<center?left?right|bgcolor|border|cellpadding|cellspacing|class'
	+'|dir<ltr?rtl|frame|height|id|lang|onclick|ondblclick|onkeydown|onkeypress'
	+'|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|rules'
	+'|style|summary|title|width],'
	+'tbody[align<center?char?justify?left?right|char|class|charoff|dir<ltr?rtl|id'
	+'|lang|onclick|ondblclick|onkeydown|onkeypress|onkeyup|onmousedown'
	+'|onmousemove|onmouseout|onmouseover|onmouseup|style|title'
	+'|valign<baseline?bottom?middle?top],'
	+'td[abbr|align<center?char?justify?left?right|axis|bgcolor|char|charoff|class'
	+'|colspan|dir<ltr?rtl|headers|height|id|lang|nowrap<nowrap|onclick'
	+'|ondblclick|onkeydown|onkeypress|onkeyup|onmousedown|onmousemove'
	+'|onmouseout|onmouseover|onmouseup|rowspan|scope<col?colgroup?row?rowgroup'
	+'|style|title|valign<baseline?bottom?middle?top|width],'
	+'textarea[accesskey|class|cols|dir<ltr?rtl|disabled<disabled|id|lang|name'
	+'|onblur|onclick|ondblclick|onfocus|onkeydown|onkeypress|onkeyup'
	+'|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|onselect'
	+'|readonly<readonly|rows|style|tabindex|title],'
	+'tfoot[align<center?char?justify?left?right|char|charoff|class|dir<ltr?rtl|id'
	+'|lang|onclick|ondblclick|onkeydown|onkeypress|onkeyup|onmousedown'
	+'|onmousemove|onmouseout|onmouseover|onmouseup|style|title'
	+'|valign<baseline?bottom?middle?top],'
	+'th[abbr|align<center?char?justify?left?right|axis|bgcolor|char|charoff|class'
	+'|colspan|dir<ltr?rtl|headers|height|id|lang|nowrap<nowrap|onclick'
	+'|ondblclick|onkeydown|onkeypress|onkeyup|onmousedown|onmousemove'
	+'|onmouseout|onmouseover|onmouseup|rowspan|scope<col?colgroup?row?rowgroup'
	+'|style|title|valign<baseline?bottom?middle?top|width],'
	+'thead[align<center?char?justify?left?right|char|charoff|class|dir<ltr?rtl|id'
	+'|lang|onclick|ondblclick|onkeydown|onkeypress|onkeyup|onmousedown'
	+'|onmousemove|onmouseout|onmouseover|onmouseup|style|title'
	+'|valign<baseline?bottom?middle?top],'
	+'title[dir<ltr?rtl|lang],'
	+'tr[abbr|align<center?char?justify?left?right|bgcolor|char|charoff|class'
	+'|rowspan|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress'
	+'|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style'
	+'|title|valign<baseline?bottom?middle?top],'
	+'tt[class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress|onkeyup'
	+'|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style|title],'
	+'u[class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress|onkeyup'
	+'|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style|title],'
	+'ul[class|compact<compact|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown'
	+'|onkeypress|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover'
	+'|onmouseup|style|title|type],'
	+'var[class|dir<ltr?rtl|id|lang|onclick|ondblclick|onkeydown|onkeypress'
	+'|onkeyup|onmousedown|onmousemove|onmouseout|onmouseover|onmouseup|style'
});