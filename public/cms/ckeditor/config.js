/**
 * @license Copyright (c) 2003-2018, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	config.toolbarGroups = [
		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
		{ name: 'forms', groups: [ 'forms' ] },
		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
		{ name: 'links', groups: [ 'links' ] },
		{ name: 'insert', groups: [ 'insert' ] },
		'/',
		{ name: 'styles', groups: [ 'styles' ] },
		{ name: 'colors', groups: [ 'colors' ] },
		{ name: 'tools', groups: [ 'tools' ] },
		{ name: 'others', groups: [ 'others' ] },
		{ name: 'about', groups: [ 'about' ] }
	];
	config.autoParagraph = false;
	config.enterMode = CKEDITOR.ENTER_BR;
	config.removeButtons = 'Preview,Print,Templates,NewPage,Cut,Undo,Redo,Copy,Paste,PasteText,PasteFromWord,Scayt,SelectAll,Find,Replace,Form,Radio,Checkbox,TextField,Textarea,Select,Button,ImageButton,HiddenField,CopyFormatting,Indent,Outdent,CreateDiv,BidiLtr,BidiRtl,Language,Anchor,Flash,HorizontalRule,Smiley,Iframe,PageBreak,SpecialChar,RemoveFormat,JustifyLeft,JustifyCenter,JustifyRight,JustifyBlock,TextColor,BGColor,ShowBlocks,About,FontSize,Font';
};
