<?php


use Cake\Datasource\ConnectionManager;

class OrdensController extends AppController{

    
    public $components = array('Session', 'RequestHandler', 'Paginator', 'Flash');
    public $helpers = array('Html', 'Form', 'Time', 'Js');
    
    public $paginate = array(
            'limit' => 2,
            'order' => array(
                'Orden.id' => 'desc'
            )
        );

        public function index2() {
            $usuarios = $this->Session->read('Auth.User.id');
            $client = $this->Orden->find('list', array('recursive' => 1, 'fields' => 'Cliente.DESCRIPCION',  'limit' => 1, 'order' => 'Orden.created DESC' ));

            $this->set(compact('client'));

         
                               
        $this->Orden->recursive = 0;
        $this->set('ordens', $this->Paginator->paginate());
    }
     public function index4() {
        $this->Orden->recursive = 0;
        $this->set('ordens', $this->Paginator->paginate());
    }
      public function index3() {
        $this->Orden->recursive = 0;
          $this->set('ordens', $this->Paginator->paginate());
                 $usuarios = $this->Session->read('Auth.User.Orden.user_id');
                 $user = $this->Session->read('Auth.User.id');
       
                    if ($this->Session->read('Auth.User.id') == $user) { 
                        $ordens = $this->Orden->find('all', array('conditions' => array( 'Orden.user_id' => $user), 'order' => array('Orden.created' => 'DESC')));
                            $this->set(compact('ordens', $usuarios));
                                }
        $this->set('menu/top_menu',false);
        $this->render('index3','index3');
        
    }

    private $db;
     public function index()
    {
        $this->Orden->recursive = 1;
        
      //  $this->paginate['Orden']['limit'] = 10;
      //  $this->paginate['Orden']['order'] = array('Order.create' => 'DESC');
        $this->set('ordens', $this->paginate());
         $usuarios = $this->Session->read('Auth.User.Orden.user_id');
         $user = $this->Session->read('Auth.User.id');
         if ($this->Session->read('Auth.User.id') == $user) { 
               
               $ordens = $this->Orden->find('all', array('conditions' => array( 'Orden.user_id' => $user), 'order' => array('Orden.created' => 'DESC')));

                    $this->set(compact('ordens', $usuarios));
    }
     if ($this->Session->read('Auth.User.role') == admin) { 
               
               $ordens = $this->Orden->find('all');
                    $this->set(compact('ordens'));
    }
}
    public function initialize(): void
    {
        parent::initialize();
        $this->db = ConnectionManager::get("default");
    }

    public function searchForm()
    {
        // open frontend view
    }

public function view($id = null) 
    {
         $this->Orden->recursive = 3;
        if (!$this->Orden->exists($id)) {
            throw new NotFoundException(__('Invalid orden'));
        }
        $options = array('conditions' => array('Orden.' . $this->Orden->primaryKey => $id));
         $this->pdfConfig = array(
            'pageSize' => 'A4',
            'orientation' => 'vertical',
            'margin' => 
                [
                'bottom' => 100,
                'left' => 100,
                'right' => 130,
                'top' => 145
                ],
            'download' => true,
            'filename' => 'pedidosmq_' . $id .'.pdf'
        );
         $this->Orden->recursive = 3;
        $this->Paginator->settings = $this->paginate;
        $this->set('orden', $this->Orden->find('first', $options));
    }

public function view2($id = null) {
        if (!$this->Orden->exists($id)) {
            throw new NotFoundException(__('Datos Invalidos'));
        }
        $options = array('conditions' => array('Orden.' . $this->Orden->primaryKey => $id));
        $this->set('orden', $this->Orden->find('first', $options));
        $this->pdfConfig = array(
            'pageSize' => 'letter',
            'orientation' => 'landscape',
            'margin' => 
                [
                'bottom' => 100,
                'left' => 50,
                'right' => 30,
                'top' => 45
                ],
            'download' => true,
            'filename' => 'pedidosmq_' . $id .'.pdf'
        );
        $this->set('orden', $this->Orden->find('first', $options));
        $this->Orden->recursive = 2;
        $this->Paginator->settings = $this->paginate;
        
        $this->set('ordens', $this->Paginator->paginate());
    }
 /**public function view3($id = null) {
        if (!$this->Orden->exists($id)) {
            throw new NotFoundException(__('Datos Invalidos'));
        }
        $options = array('conditions' => array('Orden.' . $this->Orden->primaryKey => $id));
        $this->set('poa', $this->Orden->find('first', $options));
        $this->pdfConfig = array(
            'pageSize' => 'letter',
            'orientation' => 'landscape',
            'margin' => 
                [
                'bottom' => 100,
                'left' => 50,
                'right' => 30,
                'top' => 45
                ],
            'download' => true,
            'filename' => 'pedido_' . $id .'.pdf'
        );
        $this->set('poa', $this->Poa->find('first', $options));
        $this->Orden->recursive = 2;
        $this->Paginator->settings = $this->paginate;
        
        $this->set('ordens', $this->Paginator->paginate());
    }
   */
        /**$this->pdfConfig = array(
            'pageSize' => 'letter',
            'orientation' => 'landscape',
            'margin' => 
                [
                'bottom' => 100,
                'left' => 50,
                'right' => 30,
                'top' => 45
                ],
            'download' => true,
            'filename' => 'POA_' . $id .'.pdf'
        );
        $this->set('poa', $this->Poa->find('first', $options));
        $this->Poa->recursive = 2;
        $this->Paginator->settings = $this->paginate;
        
        $this->set('poas', $this->Paginator->paginate());
    }
*/


    public function searchCountry()
    {
        if ($this->request->is("ajax")) {

            $searchQuery = $this->request->getData['Cliente'];

            $clientesList = [0];

            if (isset($searchQuery) && !empty($searchQuery)) {

                // Fetch record with search query
                $clientes = $this->db->execute("SELECT id, DESCRIPCION from CLIENTES WHERE DESCRIPCION like '%" . $searchQuery . "%'")->fetchAll("assoc");
            } else {

                // Fetch record
                $clientes = $this->db->execute("SELECT id, DESCRIPCION from clientes")->fetchAll("assoc");
            }

            foreach ($clientes as $cliente) {
                $clientesList[] = array(
                    "id" => $cliente['id'],
                    "DESCRIPCION" => $cliente['DESCRIPCION'],
                );
            }

            echo json_encode(array(
               
                "data" => $clientesList
            ));

            die;
        }
    }

/**public function index() {
        $this->Auditoria->recursive = 1;
        $this->set('auditorias', $this->Paginator->paginate());
            if ($this->Session->read('Auth.User.AreaControl.cod_dep') == 'central') { 
        
                $auditorias = $this->Auditoria->find('all', array('conditions' => array( 'Auditoria.area_controls_id' => '1')));

                    $this->set(compact('auditorias'));
            }*/
   

    
   /**  public function edit($id = null) {
                                      
                                         if (!$id) {
                                                throw new NotFoundException(__('Datos Invalidos'));
                                            }

                                        $post = $this->Orden->findById($id);
                                        if (!$post) {
                                            throw new NotFoundException(__('Datos Invalido'));
                                        }

                                        if ($this->request->is(array('post', 'put'))) {
                                            $this->Orden->id = $id;

                                            if ($this->Orden->save($this->request->data)) {
                                             $this->Session->setFlash('ACTUALIZADO con Exito', 'default', array('class' => 'alert alert-success'));
                                                    return $this->redirect(array('action' => 'index'));
                                                
                                            }
                                            $this->Flash->error(__('No se logro Actualizar'));
                                        }

                                        if (!$this->request->data) {
                                            $this->request->data = $post;
                                        }
                $clientes = $this->Orden->Cliente->find('list', array('order' => 'Cliente.DESCRIPCION ASC')); 
                $cod = 'F'; 
                $codigos = $this->Orden->Codigo->find('list', array('fields' => array('Codigo.DESCRIPCION'), 'conditions' => array('Codigo.TIPO' => $cod)));
                     
                $this->set(compact( 'clientes', 'codigos' ));
                 $this->Orden->recursive = 1;
        $options = array('conditions' => array('Orden.' . $this->Orden->primaryKey => $id));
        $this->set('orden', $this->Orden->find('first', $options));


        /**if($this->request->is('post'))
        {
            $this->OrdenItem->create();

            if($this->OrdenItem->save($this->request->data))
            {
                $id_orden = $this->OrdenItem->id;
               
              
                
                for($i = 0; $i < count($orden_item); $i++)
                {
                    $bodegaped_id = $orden_item[$i]['OrdenItem']['bodegaped_id'];
                    $cantidad = $orden_item[$i]['OrdenItem']['cantidad'];
                    $subtotal = $orden_item[$i]['OrdenItem']['subtotal'];
                    $porcentaje = $orden_item[$i]['OrdenItem']['porcentaje'];

                    
                    $orden_items = array('bodegaped_id' => $bodegaped_id, 'orden_id' => $id_orden, 'cantidad' => $cantidad, 'subtotal' => $subtotal,'porcentaje' => $porcentaje );
                    $this->OrdenItem->saveAll($orden_items);
                }
             }
        }
                                    
    }
    
                
    */
    public function add()
    {
          
            $user = $this->Session->read('Auth.User.id');
        $this->loadModel('Pedido', 'Cliente', 'RequestHandler');
        $orden_item = $this->Pedido->find('all', array('conditions' => array( 'Pedido.userped' => $user), 'order' => 'Pedido.id ASC'));
     //     $this->set('pedidos', $this->Pedido->find('all', array('conditions' => array( 'Pedido.userped' => $user), 'order' => 'Pedido.id ASC')));
        // debug($orden_item);
        if(count($orden_item) > 0)
        {
           //calculando sub total
           $user2 = $this->Session->read('Auth.User.id');
            $total_pedidos = $this->Pedido->find('all', array('fields' => array('SUM(Pedido.subtotal) as subtotal'), 'conditions' => array( 'Pedido.userped' => $user2)));
            $mostrar_total_pedidos1 = $total_pedidos[0][0]['subtotal'];
             $mostrar_total_pedidos =  number_format($mostrar_total_pedidos1, 2, '.', '');

             //iva
             $iva1 = ($mostrar_total_pedidos1 * 0.16);
             $iva =  number_format($iva1, 2, '.', '');
            // calculando total
             $total1 = ($mostrar_total_pedidos1 + $iva1);
             $total = number_format($total1, 2, '.', '');



            // Recuperando clientes
             $user4 = $this->Session->read('Auth.User.vendedor');
            $clientes = $this->Orden->Cliente->find('list', array('fields' => array('Cliente.DESCRIPCION'), 'order' => 'Cliente.DESCRIPCION ASC' 
               , 'conditions' => array('Cliente.VENDEDOR LIKE' => '%' . $user4 . '%')
            ));
          //       $result = array(  'cliente_id' => $clientes );

            $cod = 'F';
            $codigos = $this->Orden->Codigo->find('list', array('fields' => array('Codigo.DESCRIPCION'), 'conditions' => array('Codigo.TIPO' => $cod)));
            $usuarios = $this->Session->read('Auth.User.id');
             $users = $this->Orden->User->find('list', array('fields' => array('User.nombre'), 'conditions' => array('User.id' => $usuarios)));
         //    $usersString = implode(",", $usersString);

             // variables de whatsapp
             $client = $this->Orden->find('list', array('recursive' => 1, 'fields' => 'Cliente.DESCRIPCION',  'limit' => 1, 'order' => 'Orden.created DESC' ));
             $telefono = $this->Session->read('Auth.User.telefonovend');
             $numpedido = $this->Orden->find('list', array('recursive' => 1, 'fields' => 'Orden.numpedido',  'limit' => 1, 'order' => 'Orden.created DESC' ));
             //
            $this->set(compact('clientes', 'orden_item', 'mostrar_total_pedidos', 'codigos', 'users', 'client', 'iva', 'total', 'telefono', $usuarios));
        }
        else
        {
            $this->Session->setFlash('Ninguna orden ha sido procesada', 'default', array('class' => 'alert alert-danger'));
            return $this->redirect(array('controller' => 'pages', 'action' => 'home'));
        }

      
        
        if($this->request->is('post'))
        {
            $this->Orden->create();

            if($this->Orden->save($this->request->data))
            {
                $id_orden = $this->Orden->id;
               
              
                
                for($i = 0; $i < count($orden_item); $i++)
                {
                    $bodegaped_id = $orden_item[$i]['Pedido']['bodegaped_id'];
                    $cantidad = $orden_item[$i]['Pedido']['cantidad'];
                    $subtotal = $orden_item[$i]['Pedido']['subtotal'];
                    $porcentaje = $orden_item[$i]['Pedido']['porcentaje'];
                    $userped = $orden_item[$i]['Pedido']['userped'];
                    $preciodesc = $orden_item[$i]['Pedido']['preciodesc'];
                    $dmax = $orden_item[$i]['Pedido']['dmax'];
                    

                    $orden_items = array('bodegaped_id' => $bodegaped_id, 'orden_id' => $id_orden, 'cantidad' => $cantidad, 'subtotal' => $subtotal,'porcentaje' => $porcentaje,  'preciodesc' => $preciodesc, 'userped' => $userped, 'dmax' => $dmax);
                    $this->Orden->OrdenItem->saveAll($orden_items);
                }
                
                //Eliminando el contenido de la tabla pedidos
               //  $user2 = $this->Session->read('Auth.User.id');
               // $id2 = $this->Pedido->find('all', array('conditions' => array( 'Pedido.userped' => $user)));
                $user3 = $this->Session->read('Auth.User.id');
             //   $id = $this->Pedido->find('all', array('fields' => 'Pedido.userped'));
             //   $this->Model->deleteAll(array('Model.field_name'=>'field_value'));
            if($this->Pedido->deleteAll (  array( 'Pedido.userped' => $user)) )

                
                $this->Session->setFlash('Pedido Finalizado con Exito', 'default', array('class' => 'alert alert-success'));
                
     
                                 // Send text message to a phone number
                              
                                $curl = curl_init();

                    curl_setopt_array($curl, [
                      CURLOPT_URL => "https://api.zapphub.com/v1/messages",
                      CURLOPT_RETURNTRANSFER => true,
                             CURLOPT_SSL_VERIFYPEER => false,
                      CURLOPT_ENCODING => "",
                      CURLOPT_MAXREDIRS => 10,
                      CURLOPT_TIMEOUT => 30,
                      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                      CURLOPT_CUSTOMREQUEST => "POST",
                      CURLOPT_POSTFIELDS => "{\"phone\":\" $telefono \",\"schedule\":{\"delayTo\":\"1m\"},\"message\":\"Hola tu pedido Nº *".implode(',',$numpedido). "* a nombre de *".implode(',',$client). " ha sido cargado con éxito* a través de la app de pedido, puedes consultar en el apartado ver mis pedidos para mas informaciòn.\"}",
                      CURLOPT_HTTPHEADER => [
                        "Content-Type: application/json",
                        "Token: 651aabc3afc0521d18df903bef6f8942b1f7b67c38c94c7f46d2915e09f67f863237bd8f4555cfff"
                      ],
                    ]);

                    $response = curl_exec($curl);
                    $err = curl_error($curl);

                    curl_close($curl);

                    if ($err) {
                      echo "cURL Error #:" . $err;
                    } else {
                      echo $response;
                    }
                        
          
                return $this->redirect(array('controller' => 'ordens', 'action' => 'index2'));
                     
                             

            }
            else
            {
                $this->Session->setFlash('El Articulo no pudo ser procesado.'. 'default', array('class' => 'alert alert-danger'));
            } 
          

        }
      
       
       
    }
    public function edit($id = null)
    {
          
            $user = $this->Session->read('Auth.User.id');
        $this->loadModel('Pedido', 'Cliente', 'RequestHandler');
        $orden_item = $this->Pedido->find('all', array('conditions' => array( 'Pedido.userped' => $user), 'order' => 'Pedido.id ASC'));
     //     $this->set('pedidos', $this->Pedido->find('all', array('conditions' => array( 'Pedido.userped' => $user), 'order' => 'Pedido.id ASC')));
        // debug($orden_item);
        if(count($orden_item) > 0)
        {
           $user2 = $this->Session->read('Auth.User.id');
       
            $total_pedidos = $this->Pedido->find('all', array('fields' => array('SUM(Pedido.subtotal) as subtotal'), 'conditions' => array( 'Pedido.userped' => $user2)));
            $mostrar_total_pedidos1 = $total_pedidos[0][0]['subtotal'];
             $mostrar_total_pedidos =  number_format($mostrar_total_pedidos1, 2, '.', '');
            // Recuperando clientes
            $clientes = $this->Orden->Cliente->find('list', array('fields' => array('Cliente.DESCRIPCION'), 'order' => 'Cliente.DESCRIPCION ASC', 'conditions' => array('Cliente.ESTATUS' => 1)));
          //       $result = array(  'cliente_id' => $clientes );

            $cod = 'F';
            $codigos = $this->Orden->Codigo->find('list', array('fields' => array('Codigo.DESCRIPCION'), 'conditions' => array('Codigo.TIPO' => $cod)));
            $usuarios = $this->Session->read('Auth.User.id');
             $users = $this->Orden->User->find('list', array('fields' => array('User.nombre'), 'conditions' => array('User.id' => $usuarios)));
            $this->set(compact('clientes', 'orden_item', 'mostrar_total_pedidos', 'codigos', 'users', $usuarios));
        }
        else
        {
            $this->Session->setFlash('Ninguna orden ha sido procesada', 'default', array('class' => 'alert alert-danger'));
            return $this->redirect(array('controller' => 'pages', 'action' => 'home'));
        }

      if (!$id) {
        throw new NotFoundException(__('Datos Invalidos'));
    }

    $post = $this->Orden->findById($id);
    if (!$post) {
        throw new NotFoundException(__('Datos Invalido'));
    }
        
        if ($this->request->is(array('post', 'put'))) {
            $this->Orden->create();
                
            if($this->Orden->save($this->request->data))
            {
                $id = $this->Orden->id;
               
              
                
                for($i = 0; $i < count($orden_item); $i++)
                {
                    $bodegaped_id = $orden_item[$i]['Pedido']['bodegaped_id'];
                    $cantidad = $orden_item[$i]['Pedido']['cantidad'];
                    $subtotal = $orden_item[$i]['Pedido']['subtotal'];
                    $porcentaje = $orden_item[$i]['Pedido']['porcentaje'];
                    $userped = $orden_item[$i]['Pedido']['userped'];
                    $dmax2 = $orden_item[$i]['Pedido']['dmax'];
                    $dmax = $orden_item[$i]['Pedido']['norden'];
               //     $norden = $orden_item[$i]['Pedido']['norden'];
                    $preciodesc = $orden_item[$i]['Pedido']['preciodesc'];
                    
                    $orden_items = array('bodegaped_id' => $bodegaped_id, 'cantidad' => $cantidad, 'subtotal' => $subtotal,'porcentaje' => $porcentaje, 'userped' => $userped, 'orden_id' => $dmax, 'dmax' => $dmax2, 'preciodesc' => $preciodesc);
                    $this->Orden->OrdenItem->saveAll($orden_items);
                }
                
                //Eliminando el contenido de la tabla pedidos
               //  $user2 = $this->Session->read('Auth.User.id');
               // $id2 = $this->Pedido->find('all', array('conditions' => array( 'Pedido.userped' => $user)));
                $user3 = $this->Session->read('Auth.User.id');
             //   $id = $this->Pedido->find('all', array('fields' => 'Pedido.userped'));
             //   $this->Model->deleteAll(array('Model.field_name'=>'field_value'));
            if($this->Pedido->deleteAll (  array( 'Pedido.userped' => $user)) )

                
                $this->Session->setFlash('Pedido Finalizado con Exito', 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('controller' => 'ordens', 'action' => 'index2'));
            }
            else
            {
                $this->Session->setFlash('El Articulo no pudo ser procesado.'. 'default', array('class' => 'alert alert-danger'));
            } 
          

        }
        if (!$this->request->data) {
        $this->request->data = $post;
    }
        $this->Orden->recursive = 3;
       $this->Paginator->settings = $this->paginate;
        $this->set('orden', $this->Orden->find('first'));
      
       
    }
     public function edit2($id = null)
    {
          
            $user = $this->Session->read('Auth.User.id');
        $this->loadModel('Pedido', 'Cliente', 'RequestHandler');
        $orden_item = $this->Pedido->find('all', array('conditions' => array( 'Pedido.userped' => $user), 'order' => 'Pedido.id ASC'));
     //     $this->set('pedidos', $this->Pedido->find('all', array('conditions' => array( 'Pedido.userped' => $user), 'order' => 'Pedido.id ASC')));
        // debug($orden_item);
        
           $user2 = $this->Session->read('Auth.User.id');
       
            $total_pedidos = $this->Pedido->find('all', array('fields' => array('SUM(Pedido.subtotal) as subtotal'), 'conditions' => array( 'Pedido.userped' => $user2)));
            $mostrar_total_pedidos1 = $total_pedidos[0][0]['subtotal'];
             $mostrar_total_pedidos =  number_format($mostrar_total_pedidos1, 2, '.', '');
            // Recuperando clientes
            $clientes = $this->Orden->Cliente->find('list', array('fields' => array('Cliente.DESCRIPCION'), 'order' => 'Cliente.DESCRIPCION ASC', 'conditions' => array('Cliente.ESTATUS' => 1)));
          //       $result = array(  'cliente_id' => $clientes );

            $cod = 'F';
            $codigos = $this->Orden->Codigo->find('list', array('fields' => array('Codigo.DESCRIPCION'), 'conditions' => array('Codigo.TIPO' => $cod)));
            $usuarios = $this->Session->read('Auth.User.id');
             $users = $this->Orden->User->find('list', array('fields' => array('User.nombre'), 'conditions' => array('User.id' => $usuarios)));
            $this->set(compact('clientes', 'orden_item', 'mostrar_total_pedidos', 'codigos', 'users', $usuarios));
       

      if (!$id) {
        throw new NotFoundException(__('Datos Invalidos'));
    }

    $post = $this->Orden->findById($id);
    if (!$post) {
        throw new NotFoundException(__('Datos Invalido'));
    }
        
        if ($this->request->is(array('post', 'put'))) {
            $this->Orden->create();
                
            if($this->Orden->save($this->request->data))
            {
                $id = $this->Orden->id;
               
              
                
                for($i = 0; $i < count($orden_item); $i++)
                {
                    $bodegaped_id = $orden_item[$i]['Pedido']['bodegaped_id'];
                    $cantidad = $orden_item[$i]['Pedido']['cantidad'];
                    $subtotal = $orden_item[$i]['Pedido']['subtotal'];
                    $porcentaje = $orden_item[$i]['Pedido']['porcentaje'];
                    $userped = $orden_item[$i]['Pedido']['userped'];
                    $dmax2 = $orden_item[$i]['Pedido']['dmax'];
                    $dmax = $orden_item[$i]['Pedido']['norden'];
               //     $norden = $orden_item[$i]['Pedido']['norden'];
                    
                    $orden_items = array('bodegaped_id' => $bodegaped_id, 'cantidad' => $cantidad, 'subtotal' => $subtotal,'porcentaje' => $porcentaje, 'userped' => $userped, 'orden_id' => $dmax, 'dmax' => $dmax2);
                    $this->Orden->OrdenItem->saveAll($orden_items);
                }
                
                //Eliminando el contenido de la tabla pedidos
               //  $user2 = $this->Session->read('Auth.User.id');
               // $id2 = $this->Pedido->find('all', array('conditions' => array( 'Pedido.userped' => $user)));
                $user3 = $this->Session->read('Auth.User.id');
             //   $id = $this->Pedido->find('all', array('fields' => 'Pedido.userped'));
             //   $this->Model->deleteAll(array('Model.field_name'=>'field_value'));
            if($this->Pedido->deleteAll (  array( 'Pedido.userped' => $user)) )

                
                $this->Session->setFlash('Pedido Finalizado con Exito', 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('controller' => 'ordens', 'action' => 'index2'));
            }
            else
            {
                $this->Session->setFlash('El Articulo no pudo ser procesado.'. 'default', array('class' => 'alert alert-danger'));
            } 
          

        }
        if (!$this->request->data) {
        $this->request->data = $post;
    }
        $this->Orden->recursive = 3;
       $this->Paginator->settings = $this->paginate;
        $this->set('orden', $this->Orden->find('first'));
      
       
    }

    /** public function search() {
        $this->autoRender = false;
        $this->response->type('json');

        $term = $this->request->query('term'); // Obtén el término de búsqueda enviado desde el frontend

        if (!empty($term)) {
            $clientes = $this->Orden->Cliente->find('list', array(
                'conditions' => array(
                    'Cliente.DESCRIPCION LIKE' => '%' . $term . '%'
                ),
                'order' => 'Cliente.DESCRIPCION ASC'
            ));

            $this->response->body(json_encode($clientes));
        }
    }
    **/
    public function delete($id = null) {
        $this->Orden->id = $id;
        if (!$this->Orden->exists()) {
            throw new NotFoundException(__('Pedido Invalido'));
        }
        $this->request->allowMethod('post', 'Borrar');
        if ($this->Orden->delete()) {
            $this->Flash->success(__('El pedido ha sido eliminado.'));
        } else {
            $this->Flash->error(__('No se pudo eliminar el pedido. Por favor, inténtelo de nuevo'));
        }
        return $this->redirect(array('action' => 'index'));
    } 


}



       

?>