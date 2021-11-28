/**
 * @license Copyright (c) 2003-2016, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function (config) {
  // Define changes to default configuration here. For example:
  // config.language = 'fr';
  // config.uiColor = '#AADC6E';
  var base_url = "http://192.168.0.2/trunk/";
  config.filebrowserBrowseUrl =
    base_url + "/public/admin_assets/vendors/kcfinder/browse.php?type=files";
  config.filebrowserImageBrowseUrl =
    base_url + "/public/admin_assets/vendors/kcfinder/browse.php?type=images";
  config.filebrowserFlashBrowseUrl =
    base_url + "/public/admin_assets/vendors/kcfinder/browse.php?type=flash";
  config.filebrowserUploadUrl =
    base_url + "/public/admin_assets/vendors/kcfinder/upload.php?type=files";
  config.filebrowserImageUploadUrl =
    base_url + "/public/admin_assets/vendors/kcfinder/upload.php?type=images";
  config.filebrowserFlashUploadUrl =
    base_url + "/public/admin_assets/vendors/kcfinder/upload.php?type=flash";
};
