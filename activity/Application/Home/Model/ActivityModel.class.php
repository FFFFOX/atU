<?php
namespace Home\Model;
use Think\Model\RelationModel;

class ActivityModel extends RelationModel{
	protected $_link = array(
	    //插入订单餐品信息表item时用到
		//'item' => array(   							//item是表名
		//	'mapping_name' => 'item',       		//映射到item属性 
		//	'mapping_type' => self::HAS_MANY,		//关联类型
		//	'mapping_fields' => 'foodtitle,num',    //表item中的关联字段
		//	'foreign_key' => 'oid',					
		//	),
		
		
		//查询订单的餐品详细信息时用到
		'enroll' => array(    				    //enroll是视图名
			'mapping_name' => 'Allow',       	//映射到Allow属性 
			'mapping_type' => self::HAS_MANY,       //关联类型
			'mapping_fields' => 'club',   //视图enroll中的关联字段
			'foreign_key' => 'aid',
			),
	);
}
?>