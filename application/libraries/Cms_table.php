<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// For easy references
class Cms_table {
  const _TABLE_NAME = 'user_admins';
  const _USER_ID = 'user_admin_id';
  const _UUID = 'uuid';
  const _USERNAME = 'username';
  const _PASSWORD = 'password';
  const _FNAME = 'fname';
  const _LNAME = 'lname';
  const _CREATED_ON = 'created_on';
  const _CREATED_BY = 'created_by';
  const _ADMIN_ROLE = 'admin_role';
  const _STATUS = 'status';
}

// For site_metadata db table
class Metadata_table {
  const _TABLE_NAME = 'site_metadata';
  const _SM_ID = 'site_metadata_id';
  const _SM_TITLE = 'sm_title';
  const _SM_CONTENT = 'sm_content';
  const _SM_TYPE = 'sm_type';
  const _CREATED_ON = 'sm_created_on';
  const _CREATED_BY = 'sm_created_by';
  const _STATUS = 'sm_status';
}

// For posts db table
class Posts_table {
  const _TABLE_NAME = 'posts';
  const _POST_ID = 'post_id';
  const _USER_ID = 'user_id';
  const _POST_TITLE = 'p_title';
  const _POST_SLUG = 'p_slug';
  const _POST_CONTENT = 'p_content';
  const _POST_TYPE = 'p_type';
  const _POST_DATE_CREATED = 'p_date_created';
  const _P_FEATURED = 'p_is_featured';
  const _P_EFFACE = 'p_is_efface';
  const _STATUS = 'p_status';
}

// Site reports db table
class Reports_table {
  const _TABLE_NAME = 'reports';
  const _REPORT_ID = 'report_id';
  const _POST_ID = 'post_id';
  const _USER_ID = 'user_id';
  const _CREATED_ON = 'r_created_on';
  const _STATUS = 'r_status';
}

// Site reports db table
class Users_table {
  const _TABLE_NAME = 'users';
  const _USER_ID = 'user_id';
  const _USERNAME = 'username';
  const _CREATED_ON = 'u_created_on';
  const _STATUS = 'status';
}