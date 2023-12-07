<?php

class OrdenItemsController extends AppController {
    
    public $components = array('Session', 'RequestHandler', 'Paginator', 'Flash');
    public $helpers = array('Html', 'Form', 'Time', 'Js', 'Session');
    
    public $paginate = array(
            'limit' => 2,
            'order' => array(
                'OrdenItem.id' => 'asc'
            )
        );

    public function view($id = null)
    {
        $this->OrdenItem->recursive = 3;
        
        if(!$this->OrdenItem->exists($id))
        {
            throw new NotFoundException('pedido invalido');
        }
        
        $this->paginate['OrdenItem']['limit'] = 3;
        $this->paginate['OrdenItem']['conditions'] = array('OrdenItem.orden_id' => $id);
        $this->paginate['OrdenItem']['order'] = array('OrdenItem.id' => 'asc');
        $this->set('ordenitems', $this->paginate());
    }

    public function edit($id = null) {
    if (!$id) {
        throw new NotFoundException(__('Datos Invalidos'));
    }

    $post = $this->OrdenItem->findById($id);
    if (!$post) {
        throw new NotFoundException(__('Datos Invalido'));
    }

    if ($this->request->is(array('post', 'put'))) {
        $this->OrdenItem->id = $id;
        if ($this->v->save($this->request->data)) {
            $this->Flash->success(__('El item ha sido Actualizado'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Flash->error(__('No se logro Actualizar'));
    }

    if (!$this->request->data) {
        $this->request->data = $post;
    }
  // $areaControls = $this->User->AreaControl->find('list');
    
      //  $this->set(compact('areaControls', 'empleados', 'auditors'));
    
    }

    public function delete($id = null) {
        $this->OrdenItem->id = $id;
        if (!$this->OrdenItem->exists()) {
            throw new NotFoundException(__('Articulo Invalido'));
        }
        $this->request->allowMethod('post', 'Borrar');
        if ($this->OrdenItem->delete()) {
            $this->Flash->success(__('El Articulo ha sido eliminado.'));
        } else {
            $this->Flash->error(__('No se pudo eliminar el Articulo. Por favor, inténtelo de nuevo'));
        }
        return $this->redirect(array('action' => 'index'));
    } 

    public function searchjson()
    {
         $userbod1 = $this->Session->read('Auth.User.userbod');
        $this->OrdenItem->recursive = 3;
        $term = null;
        if(!empty($this->request->query['term']))
        {
            $term = $this->request->query['term'];
            $terms = explode(' ', trim($term));
            $terms = array_diff($terms, array(''));
           
            foreach($terms as $term)
            {
               
                $conditions[][] = array('OrdenItem.orden_id LIKE' => '%' . $term . '%');
               }

          
            $ordenitems = $this->OrdenItem->find('all', array('recursive' => -1,  'conditions' => array($conditions), 'limit' => 1000));
            
        }
        $this->OrdenItem->recursive = 3;
         $this->set(compact('search', $this->Paginator->paginate()));
        echo json_encode($ordenitems);
        $this->autoRender = false;
    }
    
    public function search($id = null)
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
               //  $userbod = 30;
                $terms1[] = preg_replace('/[^a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]/', '', $term);
                $conditions[][] = array('OrdenItem.numeroped LIKE' => '%' . $term . '%');
  
            }
            $ordenitems = $this->OrdenItem->find('all', array('recursive' => 2,  'conditions' => array($conditions), 'limit' => 1000));
            
            
            $terms1 = array_diff($terms1, array(''));
            $this->set(compact('ordenitems', 'terms1'));

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

       $total_pedidos = $this->OrdenItem->find('all', array('fields' => array('SUM(OrdenItem.subtotal) as subtotal'), 'conditions' => array( 'OrdenItem.numeroped' => $term)));
            $mostrar_total_pedidos1 = $total_pedidos[0][0]['subtotal'];
             $mostrar_total_pedidos =  number_format($mostrar_total_pedidos1, 2, '.', '');
              $this->set('total_pedidos',  $mostrar_total_pedidos);
        $this->loadModel('OrdenItem', 'RequestHandler');
             if(!empty($terms1))
            {
               
           $pedido = $this->OrdenItem->find('all', array('conditions' => array( 'OrdenItem.numeroped' => $terms1), 'order' => 'OrdenItem.id ASC'));
          //debug($pedido);
       
     
          if(count($pedido) > 0)
        {
            $this->set(compact('pedido'));
          }
        }
         if($this->request->is('post'))
        {
               // $this->Pedido->create();

         //   if($this->Pedido->save($this->request->data))
           // {
                //$id_pedido = $this->Pedido->id;
               
            
            
                for($i = 0; $i < count($pedido); $i++)
                {
                 //    $id_pedido = $this->Pedido->id;

                    
                    
                    $cantidad = $pedido[$i]['OrdenItem']['cantidad'];
                    $subtotal = $pedido[$i]['OrdenItem']['subtotal'];
                    $orden = $pedido[$i]['OrdenItem']['orden_id'];
                    $bodegaped_id = $pedido[$i]['OrdenItem']['bodegaped_id'];
                    $dmax = $pedido[$i]['OrdenItem']['dmax'];
                    $porcentaje = $pedido[$i]['OrdenItem']['porcentaje'];
                    $userped = $pedido[$i]['OrdenItem']['userped'];
                    $preciodesc = $pedido[$i]['OrdenItem']['preciodesc'];
                    $numeroped = $pedido[$i]['OrdenItem']['numeroped'];
                    
                  //  $orden = $orden_item['OrdenItem']['orden_id'];

                    
                 $pedidos = array(
                      
                    
                    'cantidad' => $cantidad,  
                    'subtotal' => $subtotal, 
                    'bodegaped_id' => $bodegaped_id, 
                    'dmax' => $dmax,
                    'norden' => $orden,
                    'userped' => $userped,
                    'preciodesc' => $preciodesc,
                    'porcentaje' => $porcentaje,  
                     
                    'numeroped' => $numeroped); 
                    

                    $this->OrdenItem->Pedido->saveAll($pedidos);
               
                }
                //Eliminando el contenido de la tabla orden_items
               //  $user2 = $this->Session->read('Auth.User.id');
               // $id2 = $this->Pedido->find('all', array('conditions' => array( 'Pedido.userped' => $user)));
                $user3 = $this->Session->read('Auth.User.id');
             //   $id = $this->Pedido->find('all', array('fields' => 'Pedido.userped'));
             //   $this->Model->deleteAll(array('Model.field_name'=>'field_value'));
            if($this->OrdenItem->deleteAll (array( 'OrdenItem.numeroped' => $term)) )

                  $this->Session->setFlash('Modifique o Agregue los articulos del Pedido', 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('controller' => 'pedidos', 'action' => 'view2'));
            
           
          
            }
        
    
       
    }

    public function itemupdate()
    {
        if($this->request->is('ajax'))
        {
            $id = $this->request->data['id'];
            
            $cantidad = isset($this->request->data['cantidad']) ? $this->request->data['cantidad'] : null;
            
            if($cantidad == 0)
            {
                $cantidad = 1;
            }
            
            $item = $this->OrdenItem->find('all', array('fields' => array('OrdenItem.id', 'Bodegasped.VENTA'), 'conditions' => array('OrdenItem.id' => $id)));
            
            $precio_item = $item[0]['Bodegasped']['VENTA'];
            
            $subtotal_item1 = $cantidad * $precio_item;

            $subtotal_item = number_format($subtotal_item1, 2, '.', '');

        

            $item_update = array('id' => $id, 'cantidad' => $cantidad, 'subtotal' => $subtotal_item, 'dmax' => $dmax);
            
            $this->OrdenItem->saveAll($item_update);
        }
        
        $total = $this->OrdenItem->find('all', array('fields' => array('SUM(OrdenItem.subtotal) as subtotal')));
        $mostrar_total1 = $total[0][0]['subtotal'];

       //  $mostrar_total = number_format($mostrar_total1, 2, '.', '');
        
        $pedido_update1 = $this->OrdenItem->find('all', array('fields' => array('OrdenItem.id', 'OrdenItem.subtotal'), 'conditions' => array('OrdenItem.id' => $id)));

      //    $pedido_update = number_format($pedido_update1, 2, '.', '');
        
        $mostrar_pedido = array('id' => $pedido_update1[0]['OrdenItem']['id'], 'subtotal' => $pedido_update1[0]['OrdenItem']['subtotal'], 'total' => $mostrar_total1);
        
        echo json_encode(compact('mostrar_pedido'));
        $this->autoRender = false;
    }

  

    
}

?>