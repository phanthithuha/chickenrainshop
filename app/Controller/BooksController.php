<?php
App::uses('AppController', 'Controller');
/**
 * Books Controller
 *
 * @property Book $Book
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class BooksController extends AppController {
	public $paginate = array(
		'order' => array('created'=> 'desc'),
		'limit' => 5
		);
	// private function sum($cart){
	// 	$total = 0;
	// 	foreach ($cart as $book) {
	// 		$total += $book['quantity']*$book['sale_price'];
	// 	}
	// 	return $total;
	// }
	public function add_to_cart($id=null){
		if ($this->request->is('post')) {
			$book = $this->Book->find('first', array(
				'recursive'=> -1,
				'conditions' => array('Book.id'=>$id)
				));
			if ($this->Session->check('cart.'.$id)) {
				$item = $this->Session->read('cart.'.$id);
				$item['quantity'] +=1; 
			}else{
				$item = array(
				'id'=> $book['Book']['id'],
				'title' =>$book['Book']['title'],
				'slug'=>$book['Book']['slug'],
				'sale_price' => $book['Book']['sale_price'],
				'quantity' => 1
					);
			}
			// tao gio hang va them san pham vao trong gio hang
			$this->Session->write('cart.'.$id, $item);
			//tinh tong gia tri cua gio hang
			$cart = $this->Session->read('cart');
			$total = 0;
			foreach ($cart as $book) {
			$total += $book['quantity']*$book['sale_price'];
			}
			$this->Session->write('payment.total', $total);

			$this->Session->setFlash('Đã thêm sách vào giỏ hàng!', 'default', array('class' =>'alert alert-info'),'cart');
			$this->redirect($this->referer());
		}
	}
// xem giỏ hàng
public function view_cart(){
	$this->layout = 'cart';
	// đọc session
	$cart = $this->Session->read('cart');
	$payment = $this->Session->read('payment');
	// gửi nhiều biến lên view
	$this->set(compact('cart','payment'));
	$this->set('title_for_layout', 'Giỏ hàng - KIKI Bookshop');
}


// end xem giỏ hàng
// ham get_keyword
public function get_keyword (){
	if ($this->request->is('post')) {
		$this->Book->set($this->request->data);
		if ($this->Book->validates()) {
			$keyword = $this->request->data['Book']['keyword'];	
		}else{
			$errors = $this->Book->validationErrors;
			$this->Session->write('search_validation', $errors);
		}
		$this->redirect(array('action'=>'search', 'keyword'=>$keyword));
	}
}
public function lienhe (){
	
}

// tim kiem sach 

public function search(){
	$notFound = false;
	// pr($this->request->params);
	// pr($this->passedArgs);
	if (!empty($this->request->params['named']['keyword'])) {
		$keyword =$this->request->params['named']['keyword'];
		$this->Paginator->settings=array(
			'fields'=>array('title', 'image','sale_price','slug' ),
			'cotain'=> array('Writer.name', 'Writer.slug'),
			'order'=>array('Book.created'=>'desc'),
			'limit' =>5,
			'conditions' => array(
				'Book.published'=> 1,
				'or'=>array
				('title like'=>'%'.$keyword.'%',
				'Writer.name like'=>'%'.$keyword.'%',)
				),
			'joins' => array(
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
				)
			);
		$books = $this->paginate('Book');
		//$books = $this->Book->find('all',);
		//pr($books);
		if (!empty($books)) {
		$this->set('results', $books);
		}else {
			$notFound = true;
		}
		$this->set('keyword', $keyword);
	}
	if ($this->Session->check('search_validation')) {
				$this->set('errors',$this->Session->read('search_validation'));
			}		
	$this->set('notFound', $notFound);
}

public $components = array('Paginator', 'Session');
	public function truyvan (){
		$books = $this->Book->find('first', array(
			'contain' => array(
				'Writer' => array(
					'fields' => array('id', 'name')
					), 
				'Comment'=> array(
					'limit' => 5
					)
				),
			'fields' => array('id', 'title')
			//'recursive' => 1,
			// chỉ lấy ra dữ liệu của bảng BOOKS
			// = 0 books+ dlieu belongTo, 1: belongTo+ hasmany, 2: all data
			//'conditions' => array('id <' =>11),
			//'order' =>array('title'=>'asc')
			//'limit' => 2
			// 
			));
		//$books = $this->Book->query("select id, title from books");
		echo '<meta charset="UTF-8">';
		pr($books);
		exit;
	}
/**
 * Components
 *
 * @var array
 */
	

/**
 * index method
 * hien thi 10 san pham moi nhat
 * @return void
 */
	public function index() {
		// $this->Book->recursive = 0;
		// $this->set('books', $this->Paginator->paginate());
		$books = $this->Book->latest();
		$this->set('books', $books);
		$this->set('title_for_layout', 'Home - KIKI Book');
	}


/*latest_books method
* hiển thị tất cả sách và sắp xếp từ mới đến cũ
*phân trang dữ liệu
*/
public function latest_books (){
	$this->Paginator->settings = array(
		'fields' => array('id','title', 'slug', 'image', 'sale_price'),
		'order' => array('created' => 'desc'),
		'limit' => 8,
		'contain' => array(
			'Writer' =>array('name', 'slug')
		),
		'conditions' =>array('published' =>1),
		'paramType'=> 'querystring'
		);
	$books = $this->Paginator->paginate();
	// dua them du lieu de phan trang: sap xxep du lieu theo y muon, hti so trang
	// mac dinh 20 cuon sach tren mot trang
	$this->set('books', $books);
	$this->set('title_for_layout', 'Sách mới - KIKI BOOKS');
}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($slug = null) {
		$options = array(
			'conditions' => 
			array(
				'Book.slug' => $slug
				),
			'contain' => array(
				'Writer'=>array('name', 'slug')
				)
			);
		$book =  $this->Book->find('first', $options);
		//pr($book);
		if (empty($book)) {
			throw new NotFoundException(__('Không tìm thấy cuốn sách này!'));
		}
		$this->set('book', $book);
		// comments
		$this->loadModel('Comment');
		$comments = $this->Comment->find('all', array(
			'conditions' => array(
				'book_id' => $book['Book']['id']
				),
			'order' => array('Comment.created'=>'asc'),
			'contain'=> array(
				'User' => array('username')
				)
			));
		$this->set('comments', $comments);
		//pr($comments);
		// hiển thị sách liên quan
		$related_books = $this->Book->find('all', array(
			'fields' => array('title', 'image','sale_price', 'slug'),
			'conditions'=> array(
				'category_id' => $book['Book']['category_id'],
				'Book.id <>' => $book['Book']['id'],
				'published' => 1
				),
			'limit' => 4,
			'order' => 'rand()',
			'cotain' => array(
				'Writer' => array('name', 'slug')
				)
			));
		//pr($related_books);
		$this->set('related_books', $related_books);
		//báo lỗi xác thực dữ liệu khi gửi comment
		if($this->Session->check('comment_errors')){
			$errors = $this->Session->read('comment_errors');
			$this->set('errors', $errors);
			$this->Session->delete('comment_errors');
		}

	}
	//update comment_count trong books
	// public function update_comment (){
	// 	$books = $this->Book->find('all', array(
	// 		'fields' =>'id',
	// 		'contain' => 'Comment'
	// 		));
	// 	//pr($books);
	// 	foreach ($books as $book) {
	// 		//echo count($book['Comment']).'<br>';
	// 		if (count($book['Comment'])>0){
	// 			$this->Book->updateAll(
	// 				array('comment_count'=>count($book['Comment'])),
	// 				array('Book.id'=>$book['Book']['id'])
	// 				);
	// 		}
	// 	}
	// }

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Book->create();
			if ($this->Book->save($this->request->data)) {
				$this->Session->setFlash(__('The book has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The book could not be saved. Please, try again.'));
			}
		}
		$categories = $this->Book->Category->find('list');
		$writers = $this->Book->Writer->find('list');
		$this->set(compact('categories', 'writers'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Book->exists($id)) {
			throw new NotFoundException(__('Invalid book'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Book->save($this->request->data)) {
				$this->Session->setFlash(__('The book has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The book could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Book.' . $this->Book->primaryKey => $id));
			$this->request->data = $this->Book->find('first', $options);
		}
		$categories = $this->Book->Category->find('list');
		$writers = $this->Book->Writer->find('list');
		$this->set(compact('categories', 'writers'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Book->id = $id;
		if (!$this->Book->exists()) {
			throw new NotFoundException(__('Invalid book'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Book->delete()) {
			$this->Session->setFlash(__('The book has been deleted.'));
		} else {
			$this->Session->setFlash(__('The book could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Book->recursive = 0;
		$this->set('books', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Book->exists($id)) {
			throw new NotFoundException(__('Invalid book'));
		}
		$options = array('conditions' => array('Book.' . $this->Book->primaryKey => $id));
		$this->set('book', $this->Book->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Book->create();
			if ($this->Book->save($this->request->data)) {
				$this->Session->setFlash(__('The book has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The book could not be saved. Please, try again.'));
			}
		}
		$categories = $this->Book->Category->find('list');
		$writers = $this->Book->Writer->find('list');
		$this->set(compact('categories', 'writers'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Book->exists($id)) {
			throw new NotFoundException(__('Invalid book'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Book->save($this->request->data)) {
				$this->Session->setFlash(__('The book has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The book could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Book.' . $this->Book->primaryKey => $id));
			$this->request->data = $this->Book->find('first', $options);
		}
		$categories = $this->Book->Category->find('list');
		$writers = $this->Book->Writer->find('list');
		$this->set(compact('categories', 'writers'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Book->id = $id;
		if (!$this->Book->exists()) {
			throw new NotFoundException(__('Invalid book'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Book->delete()) {
			$this->Session->setFlash(__('The book has been deleted.'));
		} else {
			$this->Session->setFlash(__('The book could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
