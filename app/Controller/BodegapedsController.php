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
class BodegapedsController extends AppController {

/**
 * Components
 *
 * @var array
 */
     public $components = array('Session', 'RequestHandler', 'Paginator', 'Flash');
    public $helpers = array('Html', 'Form', 'Time', 'Js', 'Session');
    public $paginate = array(
        'limit' => 25,
        'order' => array(
           // 'Post.title' => 'asc'
        )
    );

/**
 * index method
 *
 * @return void
 */

   /** public function index2() {
   $valores = array(0, 5, -3, 8, -1, 10);
  // $valores = $this->Bodegaspeds->find('all', array('fields' => 'Bodegaspeds.EXISTENCIA'));
        $valoresMayoresACero = array();
        foreach ($valores as $valor) {
       if ($valor > 0) {
           $valoresMayoresACero[] = $valor;
       }
   }
   
   $this->set('valores', $valoresMayoresACero);
}
   */


    public function index1() {

   $this->Bodegaped->recursive = 2;
        $this->set('bodegapeds', $this->Paginator->paginate());
      
    }

    public function index()
    {
        $this->Bodegaped->recursive = 3;
        
        $this->paginate['Bodegaped']['limit'] = 2;
    //    $this->paginate['Bodegaped']['order'] = array('Order.create' => 'DESC');
        $this->set('bodegapeds', $this->paginate( ));
       //  $usuarios = $this->Session->read('Auth.User.Bodegaped.user_id');
        // $user = $this->Session->read('Auth.User.id');
      //   if ($this->Session->read('Auth.User.id') == $user) { 
               
             
    
}

     public function index3()
    {
        //La primera vez que se inicia la pagina, la variable tags no esta asignada, el primer IF escapea esto.
        if ($this->request->is('post') && isset($this->request->data['tags'])) {
            // Esto es cuando el input es distinto de nada, osea que hay un filtro establecido.
            if(($this->request->data['tags']) != ''){
                            $search = $this->request->data['tags'];
                            $this->paginate = array(
                            'limit'=>5,
                            'order' => array(
                            'Bodegaspeds.ARTICULO' => 'asc'
                             ),    
                            'conditions' => [ 'OR' => [
                            'nombre LIKE' => $search . '%',
                                         ]]
                                        );
            }
            // Esto es cuando el input esta vacío, no hay filtro, entonces muestro todos los registros.
            else{
                $this->paginate = array(
                             'limit'=>5,
                            'order' => array(
                            'Bodegaspeds.ARTICULO' => 'asc'
                             ),    
                            'conditions' => array(
                             'Bodegaspeds.ARTICULO' <> ''
                                )
                                        );
            }
        }
        $bodegapeds = $this->paginate($this->Bodegas);

        $this->set(compact('odegaspeds'));
        $this->set('_serialize', ['bodegapeds']);
    }


                     
                  

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function view($ARTICULO = null) {
        if (!$this->Bodegaped->exists($ARTICULO)) {
            throw new NotFoundException(__('Invalid articulos'));
        }
        $options = array('conditions' => array('Bodegaped.' . $this->Bodegaped->primaryKey => $ARTICULO));
         
        $this->set('bodegapeds', $this->Bodegaped->find('first', $options));
    }

 public function view2($ARTICULO = null) {

     $this->Bodegaped->recursive = 2;
        if (!$this->Bodegaped->exists($ARTICULO)) {
            throw new NotFoundException(__('Invalid articulos'));
        }
        $options = array('conditions' => array('Bodegaped.' . $this->Bodegaped->primaryKey => $ARTICULO));
         
        $this->set('bodegapeds', $this->Bodegaped->find('first', $options));
    }
    
   public function view3($id = null) {
       
        
        $this->Articulo->recursive = 1;
        $this->set('bodegapeds', $this->Paginator->paginate());
    }




public function searchjson()
    {
         $userbod1 = $this->Session->read('Auth.User.userbod');
        $this->Bodegaped->recursive = 3;
        $term = null;
        if(!empty($this->request->query['term']))
        {
            $term = $this->request->query['term'];
            $terms = explode(' ', trim($term));
            $terms = array_diff($terms, array(''));
           
            foreach($terms as $term)
            {
                $this->Bodegaped->recursive = 3;
                 $conditions[] = array('Bodegaped.DESCRIPCION LIKE' => '%' . $term . '%', 'Bodegaped.EXISTENCIA <' => 41);
               }

          
            $bodegapeds = $this->Bodegaped->find('all', array('recursive' => 1, 'fields' => array('Bodegaped.id', 'Bodegaped.DESCRIPCION', 'Bodegaped.EXISTENCIA'), 'conditions' => array($conditions), 'limit' => 1000));
            
        }
        $this->Bodegaped->recursive = 3;
         $this->set(compact('search', $this->Paginator->paginate()));
        echo json_encode($bodegapeds);
        $this->autoRender = false;
    }
    
    public function search()
    {
        
    $userbod1 = $this->Session->read('Auth.User.userbod');
        $userbod1Array = explode(',', $userbod1);
        $userbod1Array[] = '15'; // Agregar '15' al arreglo
        $search = null;
        
        if(!empty($this->request->query['search']))
        {
            $search = $this->request->query['search'];
            $search = preg_replace('/[^a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]/', '', $search);
            $terms = explode(' ', trim($search));
            $terms = array_diff($terms, array(''));
        
           
         

            foreach($terms as $term)
            {
               //  $userbod = 30;
                $terms1[] = preg_replace('/[^a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]/', '', $term);
                
                 $conditions[] = array(
                                        'or' => array(
                                            'Bodegaped.CODIGO LIKE' => '%' . $term . '%',
                                            'Bodegaped.DESCRIPCION LIKE' => '%' . $term . '%'
                                        ),
                                        'Bodegaped.BODEGA IN' => $userbod1Array,
                                        'Bodegaped.EXISTENCIA >' => 0,
                                      //  'Bodegaped.ESTATUS =' => 1
                                    );
                                    
               // $conditions1[] = array('Bodegaped.BODEGA =' =>  $userbod1);
                 
            }
            
            $bodegapeds = $this->Bodegaped->find('all', array('recursive' => 1,  'conditions' => array($conditions), 'limit' => 1000, 'order' => 'Bodegaped.codigo ASC'));
            
            if(count($bodegapeds) == 1)
            {
                return $this->redirect(array('controller' => 'bodegapeds', 'action' => 'view', $bodegapeds[0]['Bodegaped']['id']));
            }
            $terms1 = array_diff($terms1, array(''));
            $this->set(compact('bodegapeds', 'terms1'));

        }

        

        $this->Paginator->settings = array('limit' => 5);
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


public function search2()
   {
        
    $userbod1 = $this->Session->read('Auth.User.userbod');
        $userbod1Array = explode(',', $userbod1);
        $userbod1Array[] = '15'; // Agregar '15' al arreglo
        $search = null;
        
        if(!empty($this->request->query['search']))
        {
            $search = $this->request->query['search'];
            $search = preg_replace('/[^a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]/', '', $search);
            $terms = explode(' ', trim($search));
            $terms = array_diff($terms, array(''));
        
           
         

            foreach($terms as $term)
            {
               //  $userbod = 30;
                $terms1[] = preg_replace('/[^a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]/', '', $term);
                
                 $conditions[] = array(
                                        'or' => array(
                                            'Bodegaped.CODIGO LIKE' => '%' . $term . '%',
                                            'Bodegaped.DESCRIPCION LIKE' => '%' . $term . '%'
                                        ),
                                        'Bodegaped.BODEGA IN' => $userbod1Array,
                                        'Bodegaped.EXISTENCIA >' => 0,
                                        
                                      //  'Bodegaped.ESTATUS =' => 1
                                    );
                                    
               // $conditions1[] = array('Bodegaped.BODEGA =' =>  $userbod1);
                 
            }
            
            $bodegapeds = $this->Bodegaped->find('all', array('recursive' => 1,  'conditions' => array($conditions), 'limit' => 1000, 'order' => 'Bodegaped.codigo ASC'));
            
            if(count($bodegapeds) == 1)
            {
                return $this->redirect(array('controller' => 'bodegapeds', 'action' => 'view2', $bodegapeds[0]['Bodegaped']['id']));
            }
            $terms1 = array_diff($terms1, array(''));
            $this->set(compact('bodegapeds', 'terms1'));

        }

        

        $this->Paginator->settings = array('limit' => 5);
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

public function search3()
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
                $conditions[] = array('Bodegaped.DESCRIPCION LIKE' => '%' . $term . '%', 'Bodegaped.EXISTENCIA >' => 0, 'Bodegaped.BODEGA =' => 15);
                 
            }

            $bodegapeds = $this->Bodegaped->find('all', array('recursive' => 3,  'conditions' => array($conditions), 'limit' => 1000));
            
            if(count($bodegapeds) == 1)
            {
                return $this->redirect(array('controller' => 'bodegapeds', 'action' => 'view', $bodegapeds[0]['Bodegaped']['id']));
            }
            $terms1 = array_diff($terms1, array(''));
            $this->set(compact('bodegapeds', 'terms1'));

            

        }
        

        $this->Paginator->settings = array('limit' => 5);
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

public function search4()
    {
        
     $userbod1 = $this->Session->read('Auth.User.userbod');
     $userbod2 = 30;
        $search = null;
        
        if(!empty($this->request->query['search']))
        {
            $search = $this->request->query['search'];
            $search = preg_replace('/[^a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]/', '', $search);
            $terms = explode(' ', trim($search));
            $terms = array_diff($terms, array(''));
        
           
         

            foreach($terms as $term)
            {
               //  $userbod = 30;
                $terms1[] = preg_replace('/[^a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]/', '', $term);
                $conditions[][] = array('or' => array('Bodegaped.CODIGO LIKE' => '%' . $term . '%', 'Bodegaped.DESCRIPCION LIKE' => '%' . $term . '%'),  'Bodegaped.BODEGA =' => array($userbod1, 15), 'Bodegaped.EXISTENCIA >' => 0, 'Bodegaped.ESTATUS =' => 1);
               // $conditions1[] = array('Bodegaped.BODEGA =' =>  $userbod1);
                 
            }
            
            $bodegapeds = $this->Bodegaped->find('all', array('recursive' => 1,  'conditions' => array($conditions), 'limit' => 1000));
            
            if(count($bodegapeds) == 1)
            {
                return $this->redirect(array('controller' => 'bodegapeds', 'action' => 'view', $bodegapeds[0]['Bodegaped']['id']));
            }
            $terms1 = array_diff($terms1, array(''));
            $this->set(compact('bodegapeds', 'terms1'));

        }

        

        $this->Paginator->settings = array('limit' => 5);
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
         
       
        $this->set('menu/top_menu',false);
        $this->render('search4','search4');
    }
/**
 * add method
 *
 * @return void
 */
    public function add() {
        if ($this->request->is('post')) {
            $this->Bodegaped->create();
            if ($this->Bodegaped->save($this->request->data)) {
                $this->Flash->success(__('The Bodegaspeds has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The Bodegaspeds could not be saved. Please, try again.'));
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
        if (!$this->Bodegaped->exists($id)) {
            throw new NotFoundException(__('Invalid Bodegaspeds'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Bodegaped->save($this->request->data)) {
                $this->Flash->success(__('The Bodegaspeds has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The Bodegaspeds could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Bodegaped.' . $this->Bodegaped->primaryKey => $id));
            $this->request->data = $this->Bodegaped->find('first', $options);
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
        $this->Bodegaped->id = $id;
        if (!$this->Bodegaped->exists()) {
            throw new NotFoundException(__('Invalid Bodegaspeds'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Bodegaped->delete()) {
            $this->Flash->success(__('The Bodegaspeds has been deleted.'));
        } else {
            $this->Flash->error(__('The Bodegaspeds could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
