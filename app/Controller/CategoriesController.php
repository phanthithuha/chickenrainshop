<?php
App::uses('AppController', 'Controller');
/**
 * Categories Controller
 *
 * @property Category $Category
 * @property PaginatorComponent $Paginator
 */
class CategoriesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	// menu categories
	public function menu(){
		if ($this->request->is('requested')) {
			$categories = $this->Category->find('all', array(
			'recursive'=>-1,
			'order'=>array('name' => 'asc')
			));
		return $categories;
		}
		
	}

/**
 * index method
 *
 * @return void
 */
	//public function index() {
		// $this->Category->recursive = 0;
		// $this->set('categories', $this->Paginator->paginate());
	public function index() {
		//$this->Writer->recursive = 0;
		//$this->set('writers', $this->Paginator->paginate());
		$this->Paginator->settings = array(
		'fields' => array('name', 'slug'),
		'order' => array('name' => 'desc'),
		'limit' => 5,
		
		'paramType'=> 'querystring'
		);
	$categories = $this->Paginator->paginate();
	// dua them du lieu de phan trang: sap xxep du lieu theo y muon, hti so trang
	// mac dinh 20 cuon sach tren mot trang
	$this->set('categories', $categories);
	//$this->set(compact('data'));
	}
	

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	// public function view($id = null) {
	// 	if (!$this->Category->exists($id)) {
	// 		throw new NotFoundException(__('Invalid category'));
	// 	}
	// 	$options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
	// 	$this->set('category', $this->Category->find('first', $options));
	// }
public function view($slug = null) {
		$options = array(
			'conditions' => 
			array(
				'category.slug' => $slug),
				'recursive'=>-1
				);
		// phan trang du lieu
		$category =  $this->Category->find('first', $options);
		if (empty($category)) {
			throw new NotFoundException(__('Không tìm thấy danh mục này!'));
		}
		$this->set('category', $category);
		$this->Paginator->settings = array(
		'fields' => array('id','title', 'slug', 'image', 'sale_price'),
		'order' => array('created' => 'desc'),
		'limit' => 5,
		'contain' => array(
			'Writer' =>array('name', 'slug'),
			'Category' => array('slug')
		),
		'conditions' =>array(
			'published' =>1,
			'Category.slug'=>$slug
			),
		'paramType'=> 'querystring'
		);
	$books = $this->Paginator->paginate('Book');
	// dua them du lieu de phan trang: sap xxep du lieu theo y muon, hti so trang
	// mac dinh 20 cuon sach tren mot trang
	$this->set('books', $books);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Category->create();
			if ($this->Category->save($this->request->data)) {
				$this->Session->setFlash(__('The category has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The category could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Category->exists($id)) {
			throw new NotFoundException(__('Invalid category'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Category->save($this->request->data)) {
				$this->Session->setFlash(__('The category has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The category could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
			$this->request->data = $this->Category->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Category->id = $id;
		if (!$this->Category->exists()) {
			throw new NotFoundException(__('Invalid category'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Category->delete()) {
			$this->Session->setFlash(__('The category has been deleted.'));
		} else {
			$this->Session->setFlash(__('The category could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
