<?php
class BooksController extends AppController{
	public $name = 'Books';
	//public $scaffold;
	public $components = array('Utils');
	function index(){
		$books = $this->Book->find('all');

		$this->set('books',$books);
		$this->set('title_for_layout','Список всех книг');
	}
	public function view($id = null){
		if (!$id){
			//$this->Session->setFlash('Книги по данному запросу не найдено');
			//$this->redirect($arrayName = array('action'=>'index'),null,true);
			$this->setRed('Книги по данному запросу не найдено','index');
		}
		$book = $this->Book->find('first',array('conditions'=> array('id'=>$id)));
		
		if($book) {
			$this->set('book',$book);
		}else{
			$this->Session->setFlash('Книги по данному запросу не найдено');
			$this->redirect($arrayName = array('action'=>'index'),null,true);
		}
	}
	public function delete($id = null){
		$book = $this->Book->find('first',array('conditions'=> array('id'=>$id)));
		if (!$id || !$book) {
			$this->Session->setFlash('Записи с таким ID не найдено');
			$this->redirect($arrayName = array('action'=>'index'),null,true);
		}
		if($this->Book->delete($id)){
			$this->Session->setFlash('Книга успешно удалена');
			$this->redirect($arrayName = array('action'=>'index'),null,true);
		}
	}
	public function add(){
		if (!empty($this->data)) {
			$this->Book->create();
			$this->Book->save($this->data);
			$this->Session->setFlash('Книга успешно добавлена');
			$this->redirect('index',null,true);
		}
	}
	public function edit($id = null){
		if (!$id) {
			$this->Session->setFlash('Нет такой книги');
			$his->redirect('index',null,false);
		}
		if (empty($this->data)) {
			$this->data = $this->Book->find('first', array('conditions'=> array('id'=>$id)));
		}else{
			if ($this->Book->save($this->data)) {
				$this->Session->setFlash('Данные успешно сохранены');
			}else{
				$this->Session->setFlash('Данные сохранить не удалось');
			}
			$this->redirect('index',null,true);
		}
	}
	
}

//$this->Article->find('all', array('conditions' => array('Article.status' => 'pending')