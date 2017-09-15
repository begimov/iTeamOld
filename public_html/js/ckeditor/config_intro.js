/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	
	// %REMOVE_START%
	// The configuration options below are needed when running CKEditor from source files.
	config.plugins = 'dialogui,dialog,about,a11yhelp,basicstyles,blockquote,clipboard,panel,justify,floatpanel,menu,contextmenu,resize,button,toolbar,elementspath,enterkey,entities,popup,filebrowser,floatingspace,listblock,richcombo,format,horizontalrule,htmlwriter,wysiwygarea,image,indent,indentlist,fakeobjects,link,list,magicline,maximize,pastetext,pastefromword,removeformat,showborders,sourcearea,specialchar,menubutton,scayt,stylescombo,tab,table,tabletools,undo,wsc,youtube';
	config.skin = 'flat';
	// %REMOVE_END%

	// Define changes to default configuration here.
	// For complete reference see:
	// http://docs.ckeditor.com/#!/api/CKEDITOR.config

	// The toolbar groups arrangement, optimized for two toolbar rows.
	config.toolbarGroups = [
		/*{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },*/
		/*{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },*/
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'links' },
		{ name: 'insert' },
		/*{ name: 'forms' },*/
		{ name: 'clipboard',   groups: [ 'undo' ] },
		{ name: 'tools' },
		{ name: 'others' },
		'/',
		{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
		{ name: 'styles' },
		{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
		/*{ name: 'colors' },*/
		/*{ name: 'about' }*/
	];

	// Remove some buttons provided by the standard plugins, which are
	// not needed in the Standard(s) toolbar.
	config.removeButtons = 'Underline,Subscript,Superscript,Copy,Cut,Paste,PasteFromWord';

	// Set the most common block elements.
	config.format_tags = 'p;h1;h2;h3;pre';

	config.allowedContent = true;
	//config.extraAllowedContent = 'p(*)';
	
	// Simplify the dialog windows.
	//config.removeDialogTabs = 'image:advanced;link:advanced';
	//config.removeDialogTabs = 'link:advanced';
	
	config.extraPlugins = 'widget';
	config.extraPlugins = 'lineutils';
	config.extraPlugins = 'image2';
	config.image2_alignClasses = [ 'img-left', 'img-center', 'img-right' ]; //????????????????????????
	
	//config.filebrowserImageBrowseUrl = '/promo/promo?type=Images';
	//config.filebrowserImageUploadUrl = '/promo/promo?type=UploadImages';
	
	config.language = 'ru';
	
};