<?php

/* 
	Project NUKEVIET 4.x
	Author : NukeViet Systems(hoangnt@nguyenvan.vn)
	Date: 27/09/2017
	Lisence: GNU/GPL version 2 or any later version
*/

if( ! defined( 'NV_MAINFILE' ) ) die( 'Stop!!!' );

$sql_drop_module = array();

$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_genealogy";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_location";

$sql_create_module = $sql_drop_module;

$sql_create_module[] = "CREATE TABLE IF NOT EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . " (
  id int(11) NOT NULL AUTO_INCREMENT,
  gid int(11) NOT NULL DEFAULT '0',
  parentid int(11) NOT NULL DEFAULT '0' COMMENT 'Là con của Ai, thường là bố',
  parentid2 int(11) NOT NULL DEFAULT '0' COMMENT 'Là con của mẹ nào',
  weight int(11) NOT NULL DEFAULT '0' COMMENT 'Là con/vợ thứ mấy (Thứ 2, 3 hay cả, hai, ba , tư..)',
  lev int(11) NOT NULL DEFAULT '0' COMMENT 'Đời thứ',
  relationships tinyint(4) NOT NULL DEFAULT '0' COMMENT 'Quan hệ với người được chọn: Vợ/Con.',
  gender tinyint(4) NOT NULL DEFAULT '0' COMMENT 'Nam/Nữ/Chưa biết',
  active tinyint(4) NOT NULL DEFAULT '0' COMMENT 'Còn sống/ đã mất/ không rõ',
  anniversary varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT 'Ngày giỗ',
  actanniversary tinyint(4) NOT NULL DEFAULT '0' COMMENT 'Hiển thị ngày giỗ hay không',
  alias varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  full_name varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên húy (Là tên trong khai sinh, tên cúng cơm)',
  codes varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Số mã hiệu (Là số mã hiệu trong gia phả, nếu có)',
  name1 varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên tự (Là tên tự gọi)',
  name2 varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Là tên thụy phong, truy phong sau khi mất',
  birthday datetime NOT NULL COMMENT 'Ngày giờ sinh ',
  dieday date NOT NULL COMMENT 'Ngày giờ mất ',
  life int(11) NOT NULL DEFAULT '0' COMMENT 'Hưởng thọ',
  burial varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mộ táng tại',
  content mediumtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Sự nghiệp, công đức của nguời này. (Nếu là nữ, ghi tên con, cháu ngoại cũng như các ghi chú khác vào đây.)',
  image varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Upload đính kèm ảnh chân dung',
  userid int(11) NOT NULL DEFAULT '0',
  add_time int(11) NOT NULL DEFAULT '0',
  edit_time int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (id)
) ENGINE=MyISAM";



$sql_create_module[] = "CREATE TABLE IF NOT EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (
  fid mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  active tinyint(4) NOT NULL DEFAULT '0',
  title varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  alias varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  description varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  weight smallint(4) NOT NULL DEFAULT '0',
  keywords mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  add_time int(11) NOT NULL DEFAULT '0',
  edit_time int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (fid),
  UNIQUE KEY alias (alias)
) ENGINE=MyISAM";



$sql_create_module[] = "CREATE TABLE IF NOT EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_genealogy (
  gid mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  title varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  alias varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  weight smallint(4) NOT NULL DEFAULT '0',
  add_time int(11) NOT NULL DEFAULT '0',
  edit_time int(11) NOT NULL DEFAULT '0',
  userid int(11) NOT NULL DEFAULT '0',
  fid int(11) NOT NULL DEFAULT '0',
  locationid int(11) NOT NULL DEFAULT '0',
  description mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  rule mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  content mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  status tinyint(4) NOT NULL DEFAULT '1',
  number int(11) NOT NULL DEFAULT '0',
  years varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  author varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  full_name varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  telephone varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  email varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  who_view tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (gid),
  UNIQUE KEY alias (alias),
  KEY locationid (locationid)
) ENGINE=MyISAM";



$sql_create_module[] = "CREATE TABLE IF NOT EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_location (
  locationid mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  parentid mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  title varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  alias varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  weight smallint(4) NOT NULL DEFAULT '0',
  orders mediumint(8) NOT NULL DEFAULT '0',
  lev smallint(4) NOT NULL DEFAULT '0',
  numlistcu int(11) NOT NULL DEFAULT '0',
  listcu mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  active tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  number int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (locationid),
  UNIQUE KEY title (title),
  UNIQUE KEY alias (alias)
) ENGINE=MyISAM";




