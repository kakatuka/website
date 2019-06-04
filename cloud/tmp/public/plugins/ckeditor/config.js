/**
 * @license Copyright (c) 2003-2016, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.skin = 'office2013';
	config.filebrowserBrowseUrl = baseUrl+'tmp/public/plugins/ckfinder/ckfinder.html';
	config.filebrowserImageBrowseUrl = baseUrl+'tmp/public/plugins/ckfinder/ckfinder.html?type=Images';
	config.filebrowserFlashBrowseUrl = baseUrl+'tmp/public/plugins/ckfinder/ckfinder.html?type=Flash';
	config.filebrowserUploadUrl = baseUrl+'tmp/public/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
	config.filebrowserImageUploadUrl = baseUrl+'tmp/public/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
	config.filebrowserFlashUploadUrl = baseUrl+'tmp/public/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';

};
