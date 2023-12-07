<?php
App::uses('AppController', 'Controller');
/**
 * Recibospeds Controller
 *
 * @property Recibospeds $Tickect
 * @property PaginatorComponent $Paginator
 */
class RecibopedsController extends AppController {

/**
 * Components
 *
 * @var array
 */
      public $components = array('Session', 'RequestHandler', 'Paginator', 'Flash');
    public $helpers = array('Html', 'Form', 'Time', 'Js');
    public $paginate = array(
            'limit' => 10,);

    
/**
 * index method
 *
 * @return void
 */
    public function index()
    {
        $this->Reciboped->recursive = 1;
        
      //  $this->paginate['Orden']['limit'] = 10;
      //  $this->paginate['Orden']['order'] = array('Order.create' => 'DESC');
        $this->set('recibopeds', $this->paginate());
           
         $usuarios = $this->Session->read('Auth.User.Reciboped.user_id');
         $user = $this->Session->read('Auth.User.id');
         if ($this->Session->read('Auth.User.id') == $user) { 
               
               $recibopeds = $this->Reciboped->find('all', array('conditions' => array( 'Reciboped.user_id' => $user), 'order' => array('Reciboped.created' => 'DESC')));

                    $this->set(compact('recibopeds', $usuarios));
}

             
         }  


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function view($id = null) {
        $this->Reciboped->recursive = 1;
        if (!$this->Reciboped->exists($id)) {
            throw new NotFoundException(__('Invalid Recibo'));
        }
        $options = array('conditions' => array('Reciboped.' . $this->Reciboped->primaryKey => $id));
        $this->set('recibopeds', $this->Reciboped->find('first', $options));
    }

/**
 * add method
 *
 * @return void
 */
   
    public function add() {
        if ($this->request->is('post')) {
            $this->Reciboped->create();
            if ($this->Reciboped->save($this->request->data)) {
                $this->Session->setFlash('Recibo Guardado con Exito', 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('No se pudo guardar el Recibo. Por favor, inténtelo de nuevo.', array('class' => 'alert alert-danger'));
            }
        }
    
        // Recuperando clientes
        $usuario = $this->Session->read('Auth.User.id');
          $clientes = $this->Reciboped->Cliente->find('list', array('fields' => array('Cliente.DESCRIPCION'), 'order' => 'Cliente.DESCRIPCION ASC'));
           
            $users = $this->Reciboped->User->find('list', array('fields' => array('User.nombre'), 'conditions' => array('User.id' => $usuario)));
          
     $this->set(compact('clientes', 'users', $usuario));
    }
    

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
   public function edit($id = null) {
    if (!$id) {
        throw new NotFoundException(__('Datos Invalidos'));
    }

    $post = $this->Tickect->findById($id);
    if (!$post) {
        throw new NotFoundException(__('Datos Invalido'));
    }

    if ($this->request->is(array('post', 'put'))) {
        $this->Tickect->id = $id;
        if ($this->Tickect->save($this->request->data)) {
         $this->Session->setFlash('ACTUALIZADO con Exito', 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            
        }
        $this->Flash->error(__('No se logro Actualizar'));
    }

    if (!$this->request->data) {
        $this->request->data = $post;
    }
    $nivels = $this->Tickect->Nivel->find('list');
    
        $this->set(compact('nivels'));
  $options = array('conditions' => array('Tickect.' . $this->Tickect->primaryKey => $id));
        $this->set('tickect', $this->Tickect->find('first', $options));
    }

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */

   public function delete($id = null) {
        $this->Tickect->id = $id;
        if (!$this->Tickect->exists()) {
            throw new NotFoundException(__('Datos Invalidos'));
        }
        $this->request->allowMethod('get', 'delete');
        if ($this->Tickect->delete()) {
            $this->Flash->success(__('Borrado con exito'));
        } else {
            $this->Flash->error(__('La auditoria no se logor borrar. por favor revise'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
