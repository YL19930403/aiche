<?php if (!defined('ROOT_PATH'))
{
	exit('No Permission');
}

/**
 *
 *
 * @category   Framework
 * @package    __init__
 * @author     Xinze <xinze@live.cn>
 * @copyright  Copyright (c) 2016, 黄新泽
 * @version    1.0
 * @todo
 */
class Consult_Type extends Yf_Model
{
	public $_cacheKeyPrefix  = 'c|consult_type|';
	public $_cacheName       = 'consult';
	public $_tableName       = 'consult_type';
	public $_tablePrimaryKey = 'consult_type_id';

	/**
	 * @param string $user User Object
	 * @var   string $db_id 指定需要连接的数据库Id
	 * @return void
	 */
	public function __construct(&$db_id = 'shop', &$user = null)
	{
		$this->_tableName = TABEL_PREFIX . $this->_tableName;
		$this->_cacheFlag = CHE;
		parent::__construct($db_id, $user);
	}

	/**
	 * 根据主键值，从数据库读取数据
	 *
	 * @param  int $consult_cat_id 主键值
	 * @return array $rows 返回的查询内容
	 * @access public
	 */
	public function getCat($consult_cat_id = null, $sort_key_row = null)
	{
		$rows = array();
		$rows = $this->get($consult_cat_id, $sort_key_row);

		return $rows;
	}

	/**
	 * 插入
	 * @param array $field_row 插入数据信息
	 * @param bool $return_insert_id 是否返回inset id
	 * @param array $field_row 信息
	 * @return bool  是否成功
	 * @access public
	 */
	public function addCat($field_row, $return_insert_id = false)
	{
		$add_flag = $this->add($field_row, $return_insert_id);

		//$this->removeKey($consult_cat_id);
		return $add_flag;
	}

	/**
	 * 根据主键更新表内容
	 * @param mix $consult_cat_id 主键
	 * @param array $field_row key=>value数组
	 * @return bool $update_flag 是否成功
	 * @access public
	 */
	public function editCat($consult_cat_id = null, $field_row)
	{
		$update_flag = $this->edit($consult_cat_id, $field_row);

		return $update_flag;
	}

	/**
	 * 更新单个字段
	 * @param mix $consult_cat_id
	 * @param array $field_name
	 * @param array $field_value_new
	 * @param array $field_value_old
	 * @return bool $update_flag 是否成功
	 * @access public
	 */
	public function editCatSingleField($consult_cat_id, $field_name, $field_value_new, $field_value_old)
	{
		$update_flag = $this->editSingleField($consult_cat_id, $field_name, $field_value_new, $field_value_old);

		return $update_flag;
	}

	/**
	 * 删除操作
	 * @param int $consult_cat_id
	 * @return bool $del_flag 是否成功
	 * @access public
	 */
	public function removeCat($consult_cat_id)
	{
		$del_flag = $this->remove($consult_cat_id);

		//$this->removeKey($consult_cat_id);
		return $del_flag;
	}
}

?>