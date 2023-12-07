<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class UsersController extends AppController {



/**
 * Components
 *
 * @var array
 */
	 public $components = array('Session', 'RequestHandler', 'Paginator', 'Flash');
    public $helpers = array('Html', 'Form', 'Time', 'Js');


public function isAuthorized($user)
    {
        if($user['role'] == 'admin')
        {
            if(in_array($this->action, array('add', 'index','view','edit')))
            {
                return true;
            }
            else
            {
                if($this->Auth->user('id'))
                {
                    $this->Session->setFlash('No puede acceder', 'default', array('class' => 'alert alert-danger'));
                    $this->redirect($this->Auth->redirect());
                }
            }
        }
        
  
    
     {
        
        
        return parent::isAuthorized($user);
    }


}



/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 1;
		$this->set('users', $this->Paginator->paginate());
	}
	public function index2() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}
	/**public function index3() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());

	 if ($this->Session->read('Auth.User.AreaControl.cod_dep') == 'central') {
		
		$nombre_auditor= $this->Session->read('Auth.User.Auditor.nombre_auditor'); 
			$users = $this->User->find('all',
				array('fields' => array('Auditor.nombre_auditor', 'Auditor.apellido_auditor', 'Auditor.id'), 'conditions' => array( 'or' => array( 'Auditor.nombre_auditor' => $nombre_auditor))));

			$this->set(compact('users'));
			
		
			}
			 if ($this->Session->read('Auth.User.AreaControl.cod_dep') == 'descentralizada') {
		
		$nombre_auditor= $this->Session->read('Auth.User.Auditor.nombre_auditor'); 
			$users = $this->User->find('all',
				array('fields' => array('Auditor.nombre_auditor', 'Auditor.apellido_auditor', 'Auditor.id'), 'conditions' => array( 'or' => array( 'Auditor.nombre_auditor' => $nombre_auditor))));

			$this->set(compact('users'));
			
		
			}
			 if ($this->Session->read('Auth.User.AreaControl.cod_dep') == 'interna') {
		
		$nombre_auditor= $this->Session->read('Auth.User.Auditor.nombre_auditor'); 
			$users = $this->User->find('all',
				array('fields' => array('Auditor.nombre_auditor', 'Auditor.apellido_auditor', 'Auditor.id'), 'conditions' => array( 'or' => array( 'Auditor.nombre_auditor' => $nombre_auditor))));

			$this->set(compact('users'));
			
		
			}
		}*/
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */

	
	public function view($id = null) 
	{
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Usuario Invalido'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->pdfConfig = array(
			'download' => true,
			'filename' => 'user_' . $id .'.pdf'
		);
		$this->set('user', $this->User->find('first', $options));
	}
	public function view2($id = null) 
	{
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Usuario Invalido'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->pdfConfig = array(
			'download' => true,
			'filename' => 'user_' . $id .'.pdf'
		);
		$this->set('user', $this->User->find('first', $options));
	}
public function view3($id = null) 
	{
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->pdfConfig = array(
			'download' => true,
			'filename' => 'user_' . $id .'.pdf'
		);
		$this->set('user', $this->User->find('first', $options));
	}




/**
 * add method
 *
 * @return void
 */
	/**public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('Se ha guardado el usuario.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('No se pudo guardar el usuario. Por favor, inténtelo de nuevo.'));
			}
			debug($this->request->data);
		}
		
	}*/
	public function add() {
    if ($this->request->is('post')) {
        $this->User->create();
        $this->request->data['User']['userbod'] = implode(',', $this->request->data['User']['userbod']);
        if ($this->User->save($this->request->data)) {
            $this->Flash->success(__('Se ha guardado el usuario.'));
            return $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('No se pudo guardar el usuario. Por favor, inténtelo de nuevo.'));
        }
        debug($this->request->data);
    }
}

public function edit($id = null) {
    if (!$id) {
        throw new NotFoundException(__('Datos Invalidos'));
    }

    $post = $this->User->findById($id);
    if (!$post) {
        throw new NotFoundException(__('Datos Invalido'));
    }

    if ($this->request->is(array('post', 'put'))) {
        $this->User->id = $id;
        $this->request->data['User']['userbod'] = implode(',', $this->request->data['User']['userbod']);
        if ($this->User->save($this->request->data)) {
            $this->Flash->success(__('El item ha sido Actualizado'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Flash->error(__('No se logro Actualizar'));
    }

    if (!$this->request->data) {
        $this->request->data = $post;
    }
  
	
	}

	public function beforeFilter() {
parent::beforeFilter();
$this->Auth->allow('logout');
 //Si el usuario tiene un rol de admin entonces le dejamos paso a todo.
        //Si no es así se trata de un usuario común y le permitimos solo la acción
        //logout y la correspondiente a usuario (página solo para ellos)
 if($this->Auth->user('role') === 'admin') {
	        $this->Auth->allow();
	    } elseif ($this->Auth->user('role') === 'user1') { 
	        $this->Auth->allow('logout', 'usuario');
	    } 
    }


	public function login() {
 if ($this->request->is('post')) {
 if ($this->Auth->login())
 
 
 return $this->redirect($this->Auth->redirect()); {

		 if (['User.status'] == 1) {
	    return true;}
		
		else {
				(['User.status'] == 0);
           $this->Flash->error(__('suspendido'));
        }

 }
$this->Flash->success(__('Nombre de usuario o contraseña no válidos, vuelve a intentarlo'));
 }
 $this->layout = 'login';

 		

 	}	



public function logout() {
	$this->Flash->success(__('Para volver a ingresar al sistema debe autenticarse con su usuario y contraseña'));
 return $this->redirect($this->Auth->logout());

} 

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */

	
	public function edit2($id = null) {
    if (!$id) {
        throw new NotFoundException(__('Datos Invalidos'));
    }

    $post = $this->User->findById($id);
    if (!$post) {
        throw new NotFoundException(__('Datos Invalido'));
    }

    if ($this->request->is(array('post', 'put'))) {
        $this->User->id = $id;
        if ($this->User->save($this->request->data)) {
            $this->Flash->success(__('El item ha sido Actualizado'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Flash->error(__('No se logro Actualizar'));
    }

    if (!$this->request->data) {
        $this->request->data = $post;
    }
   $areaControls = $this->User->AreaControl->find('list');
		$empleados = $this->User->Empleado->find('list');
		$auditors = $this->User->Auditor->find('list');
		$this->set(compact('areaControls', 'empleados', 'auditors'));
	
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
*/
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Usuario Invalido'));
		}
		$this->request->allowMethod('post', 'Borrar');
		if ($this->User->delete()) {
			$this->Flash->success(__('El usuario ha sido eliminado.'));
		} else {
			$this->Flash->error(__('No se pudo eliminar el usuario. Por favor, inténtelo de nuevo'));
		}
		return $this->redirect(array('action' => 'index'));
	} 


  public function desactivar($id = null) {
		
		if (!$id) {
			$this->Session->setFlash('Es necesario proveer un ID de usuario!!!');
			$this->redirect(array('action'=>'index'));
		}
		
        $this->User->id = $id;
        if (!$this->User->exists()) {
            $this->Session->setFlash('ID inválido');
			$this->redirect(array('action'=>'index'));
        }
        if ($this->User->saveField('status', 0)) {
          
             $this->Flash->success(__('Usuario Desactivado con exito'));
            $this->redirect(array('action' => 'index'));
        }
        
        $this->Flash->error(__('Hubo un error y no se pudo eliminar al usuario'));
        $this->redirect(array('action' => 'index'));
    }
	
	public function activate($id = null) {
		
		if (!$id) {
			$this->Session->setFlash('Es necesario proveer un ID de usuario!!!');
			$this->redirect(array('action'=>'index'));
		}
		
        $this->User->id = $id;
        if (!$this->User->exists()) {
            $this->Session->setFlash('ID inválido');
			$this->redirect(array('action'=>'index'));
        }
        if ($this->User->saveField('status', 1)) {
           $this->Flash->success(__('Usuario Reeactivado con exito'));
            $this->redirect(array('action' => 'index'));
        }
       $this->Flash->error(__('Hubo un error y no se pudo eliminar al usuario'));
        $this->redirect(array('action' => 'index'));
    }


 public function usuario() {
    	$this->paginate = array(
			'limit' => 10,
			'order' => array('User.username' => 'asc' )
		);
    	$users = $this->paginate('User');
		$this->set(compact('users'));
    	$this->render('/Users/usuario');
    }
}
?>
