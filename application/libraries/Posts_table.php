<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// For easy references
class Posts_table {
  const _POST_ID = 'post_id';
  const _P_SLUG = 'p_slug';
  const _USER_ID = 'user_id';

  const _P_TABLE_NAME = 'posts';
  const _P_TITLE = 'p_title';
  const _P_CONTENT = 'p_content';
  const _P_TYPE = 'p_type';
  const _P_DATE_CREATED = 'p_date_created';
  const _P_FEATURED = 'p_is_featured';
  const _P_EFFACE = 'p_is_efface';
  const _P_STATUS = 'p_status';

  const _PV_TABLE_NAME = 'post_views';
  const _POST_VIEWS_ID = 'post_views_id';
  const _PV_CREATED_ON = 'pv_created_on';
  const _PV_STATUS = 'pv_status';

  const _PR_TABLE_NAME = 'post_read';
  const _POST_READ_ID = 'post_read_id';
  const _PR_CREATED_ON = 'pr_created_on';
  const _PR_STATUS = 'pr_status';

  const _PS_TABLE_NAME = 'post_supports';
  const _POST_SUPPORT_ID = 'post_support_id';
  const _ps_CREATED_ON = 'ps_created_on';
  const _PS_STATUS = 'ps_status';
}
