<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// For easy references
class Home_table {
  const _TABLE_NAME = 'posts';
  const _POST_ID = 'p_id';
  const _USER_ID = 'user_id';
  const _POST_TITLE = 'p_title';
  const _POST_SLUG = 'p_slug';
  const _POST_CONTENT = 'p_content';
  const _POST_TYPE = 'p_type';
  const _POST_DATE_CREATED = 'p_date_created';
  const _POST_STATUS = 'p_status';
}

class site_metadata_table {
	const _TABLE_NAME = 'site_metadata';
	const _SM_ID = 'site_metadata_id';
	const _SM_CONTENT = 'sm_content';
	const _SM_TYPE = 'sm_type';
	const _SM_CREATED_ON = 'sm_created_on';
	const _SM_STATUS = 'sm_status';
}
