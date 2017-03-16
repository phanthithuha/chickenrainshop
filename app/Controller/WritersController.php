<?php
App::uses('AppController', 'Controller');
/**
 * Writers Controller
 *
 * @property Writer $Writer
 * @property PaginatorComponent $Paginator
 */
class WritersController extends AppController {
	public $paginate = array(
		
		'limit' => 5
		);

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		//$this->Writer->recursive = 0;
		//$this->set('writers', $this->Paginator->paginate());
		$this->Paginator->settings = array(
		'fields' => array('name', 'slug'),
		'order' => array('name' => 'desc'),
		'limit' => 5,
		
		'paramType'=> 'querystring'
		);
	$writers = $this->Paginator->paginate();
	// dua them du lieu de phan trang: sap xxep du lieu theo y muon, hti so trang
	// mac dinh 20 cuon sach tren mot trang
	$this->set('writers', $writers);
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
	// 	if (!$this->Writer->exists($id)) {
	// 		throw new NotFoundException(__('Invalid writer'));
	// 	}
	// 	$options = array('conditions' => array('Writer.' . $this->Writer->primaryKey => $id));
	// 	$this->set('writer', $this->Writer->find('first', $options));
	// }

	public function view($slug = null) {
		$options = array(
			'conditions' => 
			array(
				'Writer.slug' => $slug),
				'recursive' => -1
				);
		$writer =  $this->Writer->find('first', $options);
		if (empty($writer)) {
			throw new NotFoundException(__('Không tìm thấy nhà văn này!'));
		}
		$this->set('writer', $writer);
		// phan trang du lieu
		$this->Paginator->settings = array(
		'fields' => array('id','title', 'slug', 'image', 'sale_price'),
		'order' => array('created' => 'desc'),
		'limit' => 8,
		'contain' => array(
			'Writer' =>array('name', 'slug')
		),
		'joins' =>array(
			array(
				'table' => 'books_writers',
				'alias' => 'BookWriter',
				'conditions' => 'BookWriter.book_id = Book.id'
				),
			array(
				'table' => 'writers',
				'alias' => 'Writer',
				'conditions' => 'BookWriter.writer_id = Writer.id'
				)
			
			),
			'conditions' =>array(
			'published' =>1,
			'Writer.slug'=>$slug
			),
		'paramType'=> 'querystring'
		);
	$books = $this->Paginator->paginate('Book');
	// dua them du lieu de phan trang: sap xxep du lieu theo y muon, hti so trang
	// mac dinh 20 cuon sach tren mot trang
	$this->set('books', $books);
	$this->set('title_for_layout', 'Tác giả - '.$writer['Writer']['name']);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Writer->create();
			if ($this->Writer->save($this->request->data)) {
				$this->Session->setFlash(__('Đã lưu nhà văn mới!'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Không thể thêm nhà văn mới!'));
			}
		}
		$books = $this->Writer->Book->find('list');
		$this->set(compact('books'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Writer->exists($id)) {
			throw new NotFoundException(__('Invalid writer'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Writer->save($this->request->data)) {
				$this->Session->setFlash(__('The writer has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The writer could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Writer.' . $this->Writer->primaryKey => $id));
			$this->request->data = $this->Writer->find('first', $options);
		}
		$books = $this->Writer->Book->find('list');
		$this->set(compact('books'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Writer->id = $id;
		if (!$this->Writer->exists()) {
			throw new NotFoundException(__('Invalid writer'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Writer->delete()) {
			$this->Session->setFlash(__('The writer has been deleted.'));
		} else {
			$this->Session->setFlash(__('The writer could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
