/**
 * @license Copyright (c) 2003-2018, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */
CKEDITOR.config.autoParagraph = false;
CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	// For complete reference see:
	// https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_config.html
	config.enterMode = CKEDITOR.ENTER_BR; // pressing the ENTER KEY input <br/>
	config.shiftEnterMode = CKEDITOR.ENTER_P; //pressing the SHIFT + ENTER KEYS input <p>
	config.autoParagraph = false;
	config.htmlEncodeOutput = false;
	config.fillEmptyBlocks = false;
	config.entities = false;
	config.tabSpaces = 0;
	config.entities_latin = false;
	//config.forcePasteAsPlainText = true;
	// The toolbar groups arrangement, optimized for a single toolbar row.
	config.toolbarGroups = [
		{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
		{ name: 'forms' },
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
		{ name: 'links' },
		{ name: 'insert' },
		{ name: 'styles' },
		{ name: 'colors' },
		{ name: 'tools' },
		{ name: 'others' },
		{ name: 'about' }
	];
// Set the most common block elements.
    config.format_tags = 'p;h1;h2;h3;pre';

	// The default plugins included in the basic setup define some buttons that
	// are not needed in a basic editor. They are removed here.
	config.removeButtons = 'Cut,Copy,Paste,Undo,Redo,Anchor,Underline,Strike,Subscript,Superscript';

	// Dialog windows are also simplified.
	config.removeDialogTabs = 'link:advanced';
	config.filebrowserBrowseUrl = 'http://minhhao.vn/ckfinder/ckfinder.html';
	config.filebrowserImageBrowseUrl = 'http://minhhao.vn/ckfinder/ckfinder.html?type=Images';
	config.filebrowserFlashBrowseUrl = 'http://minhhao.vn/ckfinder/ckfinder.html?type=Flash';
	config.filebrowserUploadUrl = 'http://minhhao.vn/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
	config.filebrowserImageUploadUrl = 'http://minhhao.vn/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
	config.filebrowserFlashUploadUrl = 'http://minhhao.vn/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
};
