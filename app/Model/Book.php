<?php
App::uses('AppModel', 'Model');
/**
 * Book Model
 *
 * @property Category $Category
 * @property Comment $Comment
 * @property Writer $Writer
 */
class Book extends AppModel {
	public $actsAs = array('Containable');
	//==============
	public $validate = array(
		'keyword' =>array(
			'rule' =>'notEmpty',
			'message' => 'Bạn phải gõ từ khóa để tìm kiếm!'
			),
		'title' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'slug' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Category' => array(
			'className' => 'Category',
			'foreignKey' => 'category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Comment' => array(
			'className' => 'Comment',
			'foreignKey' => 'book_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);


/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Writer' => array(
			'className' => 'Writer',
			'joinTable' => 'books_writers',
			'foreignKey' => 'book_id',
			'associationForeignKey' => 'writer_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' =>'',
			'insertQuery' => '',
		)
	);
	public function latest(){
		return $this->find('all', array(
			'fields' => array('id','title', 'image', 'sale_price', 'slug'),
			'order'=> array('created'=>'desc'),
			'limit' => 4,
			'conditions' => array('published'=>1),
			'contain' => array('Writer' => array(
				'fields' => array('name', 'slug')
				))
			));
	}
	

}
