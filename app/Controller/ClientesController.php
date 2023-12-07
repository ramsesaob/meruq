<?php
App::uses('AppController', 'Controller');
/**
 * Clientes Controller
 *
 * @property Cliente $Cliente
 * @property PaginatorComponent $Paginator
 */
use Cake\Datasource\ConnectionManager;
class ClientesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash', 'Session');


	public function isAuthorized($user)
	{
		if($user['role'] == 'user')
		{
			if(in_array($this->action, array('add', 'index', 'view', 'edit')))
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
		
		return parent::isAuthorized($user);
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Cliente->recursive = 0;
		$this->Paginator->settings = array('limit' => 5);
		$this->set('clientes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Cliente->exists($id)) {
			throw new NotFoundException(__('Invalid cliente'));
		}
		$options = array('conditions' => array('Cliente.' . $this->Cliente->primaryKey => $id));
		$this->set('cliente', $this->Cliente->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Cliente->create();
			if ($this->Cliente->save($this->request->data)) {
				$this->Session->setFlash('The mesa has been saved.', 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The mesa could not be saved. Please, try again.', 'default', array('class' => 'alert alert-danger'));
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
		if (!$this->Cliente->exists($id)) {
			throw new NotFoundException(__('Invalid mesa'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Cliente->save($this->request->data)) {
				$this->Session->setFlash('The mesa has been saved.', 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The mesa could not be saved. Please, try again.', 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Cliente.' . $this->Cliente->primaryKey => $id));
			$this->request->data = $this->Cliente->find('first', $options);
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
		$this->Cliente->id = $id;
		if (!$this->Cliente->exists()) {
			throw new NotFoundException(__('Invalid mesa'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Cliente->delete()) {
			$this->Session->setFlash('The mesa has been deleted.', 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash('The mesa could not be deleted. Please, try again.', 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
/**public function searchjson()
	{
		$term = null;
		if(!empty($this->request->query['term']))
		{
			$term = $this->request->query['term'];
			$terms = explode(' ', trim($term));
			$terms = array_diff($terms, array(''));
			foreach($terms as $term)
			{
				$conditions[] = array('Cliente.DESCRIPCION LIKE' => '%' . $term . '%');
			}
			
			$clientes = $this->Cliente->find('all', array('recursive' => -1, 'fields' => array('Cliente.id', 'Cliente.CLIENTE', 'Cliente.DESCRIPCION', 'Cliente.CIUDAD'), 'conditions' => $conditions, 'limit' => 20));
		}
		echo json_encode($clientes);
		$this->autoRender = false;
	}
	
	public function search()
	{
		$search = null;
		if(!empty($this->request->query['search']))
		{
			$search = $this->request->query['search'];
			$search = preg_replace('/[^a-zA-ZñÑáéíóúÁÉÍÓÚ.,;:0-9 ]/', '', $search);
			$terms = explode(' ', trim($search));
			$terms = array_diff($terms, array(''));
			
			foreach($terms as $term)
			{
				$terms1[] = preg_replace('/[^a-zA-ZñÑáéíóúÁÉÍÓÚ.,;:0-9 ]/', '', $term);
				$conditions[] = array('Cliente.DESCRIPCION LIKE' => '%' . $term . '%');
			}
			$clientes = $this->Cliente->find('all', array('recursive' => -1, 'conditions' => $conditions, 'limit' => 200));
			if(count($clientes) == 1)
			{
				return $this->redirect(array('controller' => 'clientes', 'action' => 'view', $clientes[0]['Cliente']['id']));
			}
			$terms1 = array_diff($terms1, array(''));
			$this->set(compact('clientes', 'terms1'));
		}
		$this->set(compact('search'));
		
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

	private $db;

    public function initialize(): void
    {
        parent::initialize();
        $this->db = ConnectionManager::get("default");
    }

    public function searchForm()
    {
        // open frontend view
    }

    public function searchCountry()
    {
        if ($this->request->is("ajax")) {

            $searchQuery = $this->request->getData['query'];

            $clientesList = [0];

            if (isset($searchQuery) && !empty($searchQuery)) {

                // Fetch record with search query
                $clientes = $this->db->execute("SELECT id, DESCRIPCION from CLIENTES WHERE DESCRIPCION like '%" . $searchQuery . "%'")->fetchAll("assoc");
            } else {

                // Fetch record
                $clientes = $this->db->execute("SELECT id, DESCRIPCION from clientes")->fetchAll("assoc");
            }

            foreach ($clientes as $cliente) {
                $clientesList[0] = array(
                    "id" => $cliente['id'],
                    "text" => $cliente['DESCRIPCION'],
                );
            }

            echo json_encode(array(
               
                "data" => $clientesList
            ));

            die;
        }
    }*/
    public function search() {
        $this->autoRender = false;
        $this->response->type('json');

        $term = $this->request->query('term'); // Obtén el término de búsqueda enviado desde el frontend

        if (!empty($term)) {
            $clientes = $this->Cliente->find('list', array(
                'conditions' => array(
                    'Cliente.DESCRIPCION LIKE' => '%' . $term . '%'
                ),
                'order' => 'Cliente.DESCRIPCION ASC'
            ));

            $this->response->body(json_encode($clientes));
        }
    }
    

}
