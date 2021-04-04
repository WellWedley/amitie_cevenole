/*
Copyright (c) 2003-2010, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	config.language = 'fr';
	config.uiColor = '#efefef';
	
	config.toolbar = 'NL';
	config.toolbar_NL =
	[
		['Bold','Italic','Underline','NumberedList','BulletedList','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','Link','Unlink','FontSize','TextColor','Image','Iframe','Source']
	];
	config.toolbar_MINIMAL =
	[
		['Bold','Italic','Underline','NumberedList','BulletedList','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','Link','Unlink','FontSize','TextColor','Image']
	];
   config.filebrowserBrowseUrl = '/backoffice/kcfinder/browse.php?type=files';
   config.filebrowserImageBrowseUrl = '/backoffice/kcfinder/browse.php?type=images';
   config.filebrowserFlashBrowseUrl = '/backoffice/kcfinder/browse.php?type=flash';
   config.filebrowserUploadUrl = '/backoffice/kcfinder/upload.php?type=files';
   config.filebrowserImageUploadUrl = '/backoffice/kcfinder/upload.php?type=images';
   config.filebrowserFlashUploadUrl = '/backoffice/kcfinder/upload.php?type=flash';

};

