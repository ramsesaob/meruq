<?php
App::uses('AppController', 'Controller');
/**
 * Articulos Controller
 *
 * @property Estado $Estado
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class ArticulosController extends AppController {

/**
 * Components
 *
 * @var array
 */
   public $components = array('Paginator', 'Flash', 'Session', 'RequestHandler');
   public $helpers = array('Html', 'Form', 'Flash', 'Js');
   public $paginate = array(
        'limit' => 100,
        'order' => array(
           // 'Post.title' => 'asc'
        )
    );
/**
 * index method
 *
 * @return void
 */
    public function index() {
        $this->Articulo->recursive = 3;
        $this->set('articulos', $this->Paginator->paginate());
        $this->set('menu/top_menu',false);
        $this->render('index','index2');
    }
     public function index2() {

        
     $this->Articulo->recursive = 1;
        $articulos = $this->Articulo->find('all', array('recursive' => 1, 'fields' => array('Articulo.id', 'Articulo.DESCRIPCION', 'Articulo.VENTA', 'Articulo.ARTICULO', 'Articulo.foto', 'Articulo.foto_dir', 'Articulo.PROM')));
        $this->set(compact('articulos', $this->Paginator->paginate()));
    }
   public function acer() {

        
     $this->Articulo->recursive = 1;
        $articulos = $this->Articulo->find('all', array('recursive' => 1, 'fields' => array('Articulo.id', 'Articulo.DESCRIPCION', 'Articulo.VENTA', 'Articulo.ARTICULO', 'Articulo.foto', 'Articulo.foto_dir', 'Articulo.PROM'), 'conditions' => array('Articulo.CAT' => 'ACER')));
        $this->set(compact('articulos', $this->Paginator->paginate()));
    }
    public function aiteg() {

        
     $this->Articulo->recursive = 1;
        $articulos = $this->Articulo->find('all', array('recursive' => 1, 'fields' => array('Articulo.id', 'Articulo.DESCRIPCION', 'Articulo.VENTA', 'Articulo.ARTICULO', 'Articulo.foto', 'Articulo.foto_dir', 'Articulo.PROM'), 'conditions' => array('Articulo.CAT' => 'AITEG')));
        $this->set(compact('articulos', $this->Paginator->paginate()));
    }

   public function delux() {

        
     $this->Articulo->recursive = 1;
        $articulos = $this->Articulo->find('all', array('recursive' => 1, 'fields' => array('Articulo.id', 'Articulo.DESCRIPCION', 'Articulo.VENTA', 'Articulo.ARTICULO', 'Articulo.foto', 'Articulo.foto_dir', 'Articulo.PROM'), 'conditions' => array('Articulo.CAT' => 'DELUX')));
        $this->set(compact('articulos', $this->Paginator->paginate()));
    }
    public function explore() {

        
     $this->Articulo->recursive = 1;
        $articulos = $this->Articulo->find('all', array('recursive' => 1, 'fields' => array('Articulo.id', 'Articulo.DESCRIPCION', 'Articulo.VENTA', 'Articulo.ARTICULO', 'Articulo.foto', 'Articulo.foto_dir', 'Articulo.PROM'), 'conditions' => array('Articulo.CAT' => 'EXPLORE')));
        $this->set(compact('articulos', $this->Paginator->paginate()));
    }
    public function genius() {

        
     $this->Articulo->recursive = 1;
        $articulos = $this->Articulo->find('all', array('recursive' => 1, 'fields' => array('Articulo.id', 'Articulo.DESCRIPCION', 'Articulo.VENTA', 'Articulo.ARTICULO', 'Articulo.foto', 'Articulo.foto_dir', 'Articulo.PROM'), 'conditions' => array('Articulo.CAT' => 'GENIUS')));
        $this->set(compact('articulos', $this->Paginator->paginate()));
    }
    public function kingston() {

        
     $this->Articulo->recursive = 1;
        $articulos = $this->Articulo->find('all', array('recursive' => 1, 'fields' => array('Articulo.id', 'Articulo.DESCRIPCION', 'Articulo.VENTA', 'Articulo.ARTICULO', 'Articulo.foto', 'Articulo.foto_dir', 'Articulo.PROM'), 'conditions' => array('Articulo.CAT' => 'KINGSTON')));
        $this->set(compact('articulos', $this->Paginator->paginate()));
    }
    public function masriva() {

        
     $this->Articulo->recursive = 1;
        $articulos = $this->Articulo->find('all', array('recursive' => 1, 'fields' => array('Articulo.id', 'Articulo.DESCRIPCION', 'Articulo.VENTA', 'Articulo.ARTICULO', 'Articulo.foto', 'Articulo.foto_dir', 'Articulo.PROM'), 'conditions' => array('Articulo.CAT' => 'MASRIVA')));
        $this->set(compact('articulos', $this->Paginator->paginate()));
    }
    public function mercusys() {

        
     $this->Articulo->recursive = 1;
        $articulos = $this->Articulo->find('all', array('recursive' => 1, 'fields' => array('Articulo.id', 'Articulo.DESCRIPCION', 'Articulo.VENTA', 'Articulo.ARTICULO', 'Articulo.foto', 'Articulo.foto_dir', 'Articulo.PROM'), 'conditions' => array('Articulo.CAT' => 'MERCUSYS')));
        $this->set(compact('articulos', $this->Paginator->paginate()));
    }
    public function tplink() {

        
     $this->Articulo->recursive = 1;
        $articulos = $this->Articulo->find('all', array('recursive' => 1, 'fields' => array('Articulo.id', 'Articulo.DESCRIPCION', 'Articulo.VENTA', 'Articulo.ARTICULO', 'Articulo.foto', 'Articulo.foto_dir', 'Articulo.PROM'), 'conditions' => array('Articulo.CAT' => 'TP-LINK')));
        $this->set(compact('articulos', $this->Paginator->paginate()));
    }
    public function toshiba() {

        
     $this->Articulo->recursive = 1;
        $articulos = $this->Articulo->find('all', array('recursive' => 1, 'fields' => array('Articulo.id', 'Articulo.DESCRIPCION', 'Articulo.VENTA', 'Articulo.ARTICULO', 'Articulo.foto', 'Articulo.foto_dir', 'Articulo.PROM'), 'conditions' => array('Articulo.CAT' => 'TOSHIBA')));
        $this->set(compact('articulos', $this->Paginator->paginate()));
    }
    public function yoobao() {

        
     $this->Articulo->recursive = 1;
        $articulos = $this->Articulo->find('all', array('recursive' => 1, 'fields' => array('Articulo.id', 'Articulo.DESCRIPCION', 'Articulo.VENTA', 'Articulo.ARTICULO', 'Articulo.foto', 'Articulo.foto_dir', 'Articulo.PROM'), 'conditions' => array('Articulo.CAT' => 'YOOBAO')));
        $this->set(compact('articulos', $this->Paginator->paginate()));
    }
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function view($id = null) {
        $this->Articulo->recursive = 2;
        if (!$this->Articulo->exists($id)) {
            throw new NotFoundException(__('Invalid articulos'));
        }
        $options = array('conditions' => array('Articulo.' . $this->Articulo->primaryKey => $id));
        $this->set('articulos', $this->Articulo->find('first', $options));
    }

    public function view2($id = null) {
       
        
        $this->Articulo->recursive = 1;
        $this->set('articulos', $this->Paginator->paginate());
    }
    public function existencia($id = null) {
         $this->Articulo->recursive = 1;
        $this->set('articulos', $this->Paginator->paginate());
    }

    public function view3($id = null) {
       
        
        $this->Articulo->recursive = 1;
        $this->set('articulos', $this->Paginator->paginate());
    }
     public function view4($id = null) {
       
        
        $this->Articulo->recursive = 1;
        $this->set('articulos', $this->Paginator->paginate());
    }


public function searchjson()
    {
        $term = null;
        if(!empty($this->request->query['term']))
        {
            $term = $this->request->query['term'];
            $terms = explode(' ', trim($term));
            $terms = array_diff($terms, array(''));
            foreach($terms as $term)
            {
                $conditions[] = array('Articulo.DESCRIPCION LIKE' => '%' . $term . '%');
            }
            
            $articulos = $this->Articulo->find('all', array('recursive' => -1, 'fields' => array('Articulo.id', 'Articulo.DESCRIPCION', 'Articulo.VENTA', 'Articulo.ARTICULO'), 'conditions' => $conditions, 'limit' => 20));
        }
         $this->set(compact('search', $this->Paginator->paginate()));
        echo json_encode($articulos);
        $this->autoRender = false;
    }
    
    public function search()
    {
        $search = null;
        if(!empty($this->request->query['search']))
        {
            $search = $this->request->query['search'];
            $search = preg_replace('/[^a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]/', '', $search);
            $terms = explode(' ', trim($search));
            $terms = array_diff($terms, array(''));
            
            foreach($terms as $term)
            {
                $terms1[] = preg_replace('/[^a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]/', '', $term);
                $conditions[] = array('Articulo.DESCRIPCION LIKE' => '%' . $term . '%');
            }
            $articulos = $this->Articulo->find('all', array('recursive' => 2, 'conditions' => $conditions, 'limit' => 1000));
           /** if(count($articulos) == 1)
            {
                return $this->redirect(array('controller' => 'articulos', 'action' => 'view', $articulos[0]['Articulo']['id']));
            }*/
            $terms1 = array_diff($terms1, array(''));
            $this->set(compact('articulos', 'terms1'));
        }
        $this->set(compact('search', $this->Paginator->paginate()));
        
        if($this->request->is('ajax'))
        {
            $this->layout = false;
            $this->set('ajax', 1);
        }
        else
        {
            $this->set('ajax', 0);
        }
    }




/**
 * add method
 *
 * @return void
 */
    public function add() {
        if ($this->request->is('post')) {
            $this->Articulo->create();
            if ($this->Articulo->save($this->request->data)) {
                $this->Flash->success(__('The estado has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The estado could not be saved. Please, try again.'));
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
        if (!$this->Articulo->exists($id)) {
            throw new NotFoundException(__('Invalid Articulo'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Articulo->save($this->request->data)) {
                $this->Session->setFlash('The Articulo has been saved.', 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'search'));
            } else {
                $this->Session->setFlash('The Articulo could not be saved. Please, try again.', 'default', array('class' => 'alert alert-danger'));
            }
        } else {
            $options = array('conditions' => array('Articulo.' . $this->Articulo->primaryKey => $id));
            $this->request->data = $this->Articulo->find('first', $options);
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
        $this->Articulo->id = $id;
        if (!$this->Articulo->exists()) {
            throw new NotFoundException(__('Invalid estado'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Articulo->delete()) {
            $this->Flash->success(__('The estado has been deleted.'));
        } else {
            $this->Flash->error(__('The estado could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
