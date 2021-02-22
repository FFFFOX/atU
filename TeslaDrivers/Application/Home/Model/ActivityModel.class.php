<?php
namespace Home\Model;
use Think\Model\RelationModel;

class ActivityModel extends RelationModel{

	protected $_link = array(
		
		//关联添加活动的限制条件时用到
		'actclub' => array(    				    //actclub是表名
			'mapping_name' => 'limits',       	//映射到limits属性 
			'mapping_type' => self::HAS_MANY,       //关联类型
			'mapping_fields' => 'cid',
			'foreign_key' => 'aid',
			),

		'club' => array( 
			'mapping_type' => self::MANY_TO_MANY, 
			'mapping_name' => 'xianZhiClub',      
			'mapping_fields' => 'name',
			'foreign_key' => 'aid',
			'relation_table' => 'actclub',
			'relation_foreign_key' => 'aid',
			),
		
		
		//查询时用到
		'enroll' => array(    				    //enroll是视图名
			'mapping_name' => 'Allow',       	//映射到Allow属性 
			'mapping_type' => self::HAS_MANY,       //关联类型
			'mapping_fields' => 'activity,clubloc,club',   //视图enroll中的关联字段
			'foreign_key' => 'aid',
			),
	);
}