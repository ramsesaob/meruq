<?php
App::uses('AppController', 'Controller');

use Cake\Datasource\ConnectionManager;
class PedidosController extends AppController {
  public $components = array('Session', 'RequestHandler', 'Paginator', 'Flash');
    public $helpers = array('Html', 'Form', 'Time', 'Js');



    public function isAuthorized($user)
    {
        if($user['role'] == 'admin')
        {
            if(in_array($this->action, array('add', 'view', 'view2', 'itemupdate', 'remove', 'quitar', 'recalcular', 'check', 'edit2', 'opc0', 'opc1', 'opc2', 'opc3', 'opc4', 'opc5', 'opc6', 'opc7', 'opc8', 'opc9', 'opc10',
                'opc10', 'opc11', 'opc12', 'opc13', 'opc14', 'opc15', 'opc16', 'opc17', 'opc18', 'opc19', 'opc20', 'opc21', 'opc22', 'opc23', 'opc24', 'opc25')))
            {
                return true;
            }
            else
            {
                if($this->Auth->user('id'))
                {
                    $this->Session->setFlash('ESTE PORCENTAJE NO ESTA PERMITIDO ', 'default', array('class' => 'alert alert-danger'));
                   $this->redirect(array('controller' => 'pedidos','action' => 'view'));
                }
            }
        }
        
        return parent::isAuthorized($user);
    }
    
   public function add()
    {
        if($this->request->is('ajax'))
        {
            $id = $this->request->data['id'];
            $cantidad = $this->request->data['cantidad'];
            $porcentaje = $this->request->data['porcentaje'];
            $existencia1 = $this->Pedido->Bodegaped->find('all', array('fields' => array('Bodegaped.EXISTENCIA'), 'conditions' => array('Bodegaped.id' => $id)));
             $existencia = $existencia1[00]['Bodegaped']['EXISTENCIA'];
            $cantped1 = $this->Pedido->Bodegaped->find('all', array('fields' => array('Bodegaped.cantped'), 'conditions' => array('Bodegaped.id' => $id)));
            $cantped = $cantped1[00]['Bodegaped']['cantped'];
         //    $bodegapeds = $this->Bodegaped->find('all', array('recursive' => 3,  'conditions' => array($conditions), 'limit' => 1000));
            $articulo = $this->Pedido->Bodegaped->find('all', array('fields' => array('Bodegaped.VENTA'), 'conditions' => array('Bodegaped.id' => $id)));
            
            $venta = $articulo[00]['Bodegaped']['VENTA'];

            $preciodesc = $articulo[00]['Bodegaped']['VENTA'];
            $subtotal1 = $cantidad * $venta;
            $subtotal =  number_format($subtotal1, 2, '.', '');

             $usuario = $this->Session->read('Auth.User.id');
           $desc1 = $this->Pedido->Bodegaped->find('all', array('fields' => array('Bodegaped.descmax'), 'conditions' => array('Bodegaped.id' => $id)));
                                                        
            $dmaxx = $desc1[00]['Bodegaped']['descmax'];
            
            //calcular la existencia rela
            $existencia_real = $existencia - $cantped;

            $pedido = array( 'bodegaped_id' => $id, 'cantidad' => $cantidad, 'subtotal' => $subtotal, 'porcentaje' => $porcentaje, 'userped' => $usuario, 'dmax' => $dmaxx, 'precio_org' => $venta, 'preciodesc' => $preciodesc, 'existencia' => $existencia_real, 'cantped' => $cantped);
            
            $existe_pedido = $this->Pedido->find( 'all', array('fields' => array('Pedido.bodegaped_id'), 'conditions' => array('Pedido.bodegaped_id' => $id)));
           
          //   $this->Session->setFlash('ARTICULO AGREGADO CON EXITO', 'default', array('class' => 'alert alert-success'));
            
                 if(count($existe_pedido) == 0)
            {
                
                $this->Pedido->save($pedido);

            }
        
       }
        
        $this->autoRender = false;
    }

        
      
   
    public function edit($id = null) {
             if (!$id) {
            throw new NotFoundException(__('Datos Invalido'));
        }
                $post = $this->Pedido->findById($id);
                if (!$post) {
                    throw new NotFoundException(__('Datos Invalido'));
                }

                if ($this->request->is(array('post', 'put'))) {
                    $this->Pedido->id = $id;
                    if ($this->Pedido->save($this->request->data)) {
                        $this->Flash->success(__('El item ha sido Actualizado'));
                        return $this->redirect(array('action' => 'add'));
                    }
                   
           //     $this->data['Actuacion']['poas'] = 0.0;
             //       $this->Flash->error(__('No se logro Actualizar'));
                }


                if (!$this->request->data) {
                    $this->request->data = $post;
                }

        if (!$this->request->data) {
            $this->request->data = $post;
        }
            
            
             $usuarios1 = $this->Session->read('Auth.User.id');
          
         if ($this->Session->read('Auth.User.id') == $usuarios1) {
        $clientes = $this->Orden->Cliente->find('list', array('order' => 'Cliente.DESCRIPCION ASC'));
           
            $usuarios = $this->Session->read('Auth.User.id');

              $users = $this->Orden->User->find('list', array('fields' => array('User.nombre'), 'conditions' => array('User.id' => $usuarios)));

             
            $this->set(compact( 'clientes', 'users', $usuarios));
      
     }
    } 
    
    public function view()
    {
        $user = $this->Session->read('Auth.User.id');
         
        $this->Pedido->recursive = 2;

           $userped = $this->Pedido->find('all', array('fields' => 'Pedido.userped' ));
         if ($this->Session->read('Auth.User.id') == $user) {
        $res_pedidos = $this->Pedido->find('all', array('conditions' => array( 'Pedido.userped' => $user)));
      
        if(count($res_pedidos) == 0)
        {
            $this->Session->setFlash('Aún no se han cargado articulos al pedidos', 'default', array('class' => 'alert alert-warning'));
            return $this->redirect(array('controller' => 'bodegapeds', 'action' => 'search'));
        }
                
        $this->set('pedidos', $this->Pedido->find('all', array('conditions' => array( 'Pedido.userped' => $user), 'order' => 'Pedido.id ASC')));

           
        //$orden_item = $this->Pedido->find('all', array('conditions' => array( 'Pedido.userped' => $user), 'order' => 'Pedido.id ASC'));


         $user2 = $this->Session->read('Auth.User.id');
        $total_pedidos = $this->Pedido->find('all', array('fields' => array('SUM(Pedido.subtotal) as subtotal'), 'conditions' => array( 'Pedido.userped' => $user2)));
          $mostrar_total_pedidos1 = $total_pedidos[0][0]['subtotal'];

           $mostrar_total_pedidos =  number_format($mostrar_total_pedidos1, 2, '.', '');


        
        $this->set('total_pedidos',  $mostrar_total_pedidos);
       
            
                  
         
         }
    }


       
   
    

    public function view2()
    {
    
        
        $user = $this->Session->read('Auth.User.id');
         
        $this->Pedido->recursive = 2;

           $userped = $this->Pedido->find('all', array('fields' => 'Pedido.userped' ));
         if ($this->Session->read('Auth.User.id') == $user) {
        $res_pedidos = $this->Pedido->find('all', array('conditions' => array( 'Pedido.userped' => $user)));
      
        if(count($res_pedidos) == 0)
        {
            $this->Session->setFlash('Aún no se realizaron pedidos', 'default', array('class' => 'alert alert-warning'));
            return $this->redirect(array('controller' => 'bodegapeds', 'action' => 'search'));
        }
                
        $this->set('pedidos', $this->Pedido->find('all', array('conditions' => array( 'Pedido.userped' => $user), 'order' => 'Pedido.id ASC')));

        //$orden_item = $this->Pedido->find('all', array('conditions' => array( 'Pedido.userped' => $user), 'order' => 'Pedido.id ASC'));


         $user2 = $this->Session->read('Auth.User.id');
        $total_pedidos = $this->Pedido->find('all', array('fields' => array('SUM(Pedido.subtotal) as subtotal'), 'conditions' => array( 'Pedido.userped' => $user2)));
          $mostrar_total_pedidos1 = $total_pedidos[0][0]['subtotal'];

           $mostrar_total_pedidos =  number_format($mostrar_total_pedidos1, 2, '.', '');


        
        $this->set('total_pedidos',  $mostrar_total_pedidos);
       $this->Paginator->settings = $this->paginate;
        $this->set('pedido', $this->Pedido->find('first'));
                   $this->set('menu/top_menu',false);
        $this->render('view2','view2');   
         
         }
    }
    public function view3($id = null) {
        $this->Pedido->recursive = 3;
   

         $dmax = $this->Pedido->find('all', array('fields' => 'Pedido.dmax'));
            $dmaxx = $dmax[00]['Pedido']['dmax'];
                  //  $dmaxx = $this->Pedido->dmax;                                     
            
           $this->set(compact('dmaxx'));


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
            
            $item = $this->Pedido->find('all', array('fields' => array('Pedido.id', 'Pedido.preciodesc'), 'conditions' => array('Pedido.id' => $id)));
            
            $precio_item = $item[0]['Pedido']['preciodesc'];
            
            $subtotal_item1 = $cantidad * $precio_item;

            $subtotal_item = number_format($subtotal_item1, 2, '.', '');

        

            $item_update = array('id' => $id, 'cantidad' => $cantidad, 'subtotal' => $subtotal_item, 'dmax' => $dmax);
            
            $this->Pedido->saveAll($item_update);
        }
        
        $total = $this->Pedido->find('all', array('fields' => array('SUM(Pedido.subtotal) as subtotal')));
        $mostrar_total1 = $total[0][0]['subtotal'];

       //  $mostrar_total = number_format($mostrar_total1, 2, '.', '');
        
        $pedido_update1 = $this->Pedido->find('all', array('fields' => array('Pedido.id', 'Pedido.subtotal'), 'conditions' => array('Pedido.id' => $id)));

      //    $pedido_update = number_format($pedido_update1, 2, '.', '');
        
        $mostrar_pedido = array('id' => $pedido_update1[0]['Pedido']['id'], 'subtotal' => $pedido_update1[0]['Pedido']['subtotal'], 'total' => $mostrar_total1);
        
        echo json_encode(compact('mostrar_pedido'));
        $this->autoRender = false;
    }

   public function save_value() {
  
    
// Include the necessary CakePHP files and initialize the framework

// Assuming you have a model called "MyModel" and a corresponding table in the database
$this->loadModel('Pedido');

// Get the value from the AJAX request
$porcentaje = $_POST['porcentaje'];

// Save the value in the database
$data = [
  'porcentaje' => $porcentaje // Replace 'column_name' with the actual column name in your table
];
$this->Pedido->save($data);
}


    
 public function remove()
    {
        if($this->request->is('ajax'))
        {
            $id = $this->request->data['id'];
            $this->Pedido->delete($id);
        }
        
        $total_remove = $this->Pedido->find('all', array('fields' => array('SUM(Pedido.subtotal) as subtotal')));
        $mostrar_total_remove = $total_remove[0][0]['subtotal'];
        
        $pedidos = $this->Pedido->find('all');
        
        if(count($mostrar_total_remove) == 0)
        {
            $mostrar_total_remove = "0.00";
        }
        
        echo json_encode(compact('pedidos', 'mostrar_total_remove'));
        $this->autoRender = false;
    }
    
    public function quitar()
    {
        $id = $this->Pedido->find('all');
        if($this->Pedido->deleteAll ( $id >= 1, false))
        {
            $this->Session->setFlash('Todos los Articulos han sido removidos con Exìto', 'default', array('class' => 'alert alert-success'));
        }
        else
        {
            $this->Session->setFlash('No se pudo quitar los pedidos', 'default', array('class' => 'alert alert-danger'));
        }
        
        return $this->redirect(array('controller' => 'bodegapeds', 'action' => 'search'));
    }
    
  public function recalcular()
    {
        // debug($_POST);
        
        $arreglo = $this->request->data['Pedido'];
      // $porcentaje = $this->request->data['Pedido.porcentaje'];

    // debug($arreglo);
        
        if($this->request->is('post'))
        {
                             
                             if (!empty($this->request->data['preciodesc'])) {
                             
                    foreach($this->request->data['preciodesc'] as $pedidoId => $precioOrg) {
                        $this->Pedido->updateAll(
                            ['Pedido.preciodesc' => $precioOrg],
                            ['Pedido.id' => $pedidoId]
                        );
                    }
                  
               
            }
                else {
                    // precio_org no está presente en $this->request->data
                    // Manejar el caso cuando no se envía precio_org en el formulario
                    $this->Flash->success(__('Los cambios no se han guardado.'));
                }
               
                            
            foreach($arreglo as $key => $value)
            {
                 
                $entero = preg_replace("/[^0-9]/", "", $value);
                $existencia1 = $this->Pedido->find('all', array('fields' => array('Pedido.id','Pedido.existencia'), 'conditions' => array('Pedido.id' => $key)));
                $existencia = $existencia1[0]['Pedido']['existencia'];
                if ($entero > $existencia) {
                        // Cantidad ingresada es superior a la existencia, mostrar mensaje de error
                       $this->Flash->error(__('La cantidad ingresada es superior a la existencia.'));
                        return $this->redirect($this->referer());
                   }
                if($entero == 0 || $entero == "")
                {
                    $entero = 1;
                }

                $precio_update = $this->Pedido->find('all', array('fields' => array('Pedido.id', 'Pedido.preciodesc'), 'conditions' => array('Pedido.id' => $key))); 
                $precio_update_mostrar = $precio_update[0]['Pedido']['preciodesc'];

                $precio_update2 = $this->Pedido->find('all', array('fields' => array('Pedido.id', 'Pedido.precio_org'), 'conditions' => array('Pedido.id' => $key))); 
                $precio_update_mostrar2 = $precio_update2[0]['Pedido']['precio_org'];
               
                $porcentaje = $this->Pedido->find('all', array('fields' => array('Pedido.id','Pedido.porcentaje'), 'conditions' => array('Pedido.id' => $key)));
                $descuento = $porcentaje[0]['Pedido']['porcentaje'];
                
                //calcular existencia

                //calcular subtotal con  precio descuento
                $subtotal_update0 = $precio_update_mostrar * $entero;
 
              //calcular subtotal con precio original
                $subtotal_orig = $precio_update_mostrar2 * $entero;
                $subtotal_update1 = $descuento * $subtotal_orig;
                $subtotal_update2 = $subtotal_update1 / 100;
                $subtotal_update4 = $subtotal_orig - $subtotal_update2;

                $subtotal_update =  number_format($subtotal_update4, 2, '.', '');

                //agregar numero del pedido
                $norden = $this->Pedido->find('all', array('fields' => array('Pedido.norden', 'Pedido.created'),  'limit' => 1));
                $norden1 = $norden[0]['Pedido']['norden'];

                  
                 // modificando precio descuento

                    $preciodesc = $subtotal_update / $entero;
           
                //validar precio modificado

                $pedido_update = array('id' => $key, 'cantidad' => $entero, 'subtotal' => $subtotal_update, 'porcentaje' => $descuento, 'norden' => $norden1, 'preciodesc' => $preciodesc);
                $this->Pedido->saveAll($pedido_update);
            }
                if ($this->request->is('post') || $this->request->is('put')) {
        $this->loadModel('Pedido');
                $precio = $this->Pedido->find('all', array('fields' => array('Pedido.id','Pedido.preciodesc'), 'conditions' => array('Pedido.id' => $key)));
                $precio_org = $precio[0]['Pedido']['preciodesc'];

    // La clave 'precio_org' está presente en $this->request->data
    // Tu lógica aquí

        if($this->request->data['recalcular'] == 'recalcular')
        {
            $this->Session->setFlash('Todos los Articulos fueron actualizados correctamente', 'default', array('class' => 'alert alert-success'));
                    
            return $this->redirect(array('controller' => 'pedidos', 'action' => 'view'));            
        }
        elseif($this->request->data['procesar'] == 'procesar')
        {
             return $this->redirect(array('controller' => 'ordens', 'action' => 'add'));  
        }
    }

        }
            }
public function recalcular2() {
    if ($this->request->is('post')) {
        $data = $this->request->getData('Pedido');
        
        foreach($data as $id => $pedidoData) {
            $pedido = $this->Pedido->findById($id);
            
            if ($pedido) {
                $pedido['Pedido']['precio_org'] = $pedidoData['precio_org'];
                $pedido['Pedido']['preciodesc'] = $pedidoData['preciodesc'];
                
                $this->Pedido->save($pedido);
            }
        }
        
        // Aquí puedes realizar acciones adicionales después de guardar los cambios, como calcular el subtotal y ajustar otros campos relacionados
        
        $this->Flash->success(__('Los cambios se han guardado.'));
        return $this->redirect($this->referer());
    }
}
  /**  public function recalcular()
{
    $arreglo = $this->request->data['Pedido'];

    if($this->request->is('post'))
    {
        foreach($arreglo as $key => $value)
        {
            $entero = preg_replace("/[^0-9]/", "", $value);
            
            if($entero == 0 || $entero == "")
            {
                $entero = 1;
            }

            $precio_update = $this->Pedido->find('all', array('fields' => array('Pedido.id', 'Bodegaped.VENTA'), 'conditions' => array('Pedido.id' => $key)));
            $precio_update_mostrar = $precio_update[0]['Bodegaped']['VENTA'];

            $porcentaje = $this->Pedido->find('all', array('fields' => array('Pedido.id','Pedido.porcentaje'), 'conditions' => array('Pedido.id' => $key)));
            $descuento = $porcentaje[0]['Pedido']['porcentaje'];

            $subtotal_update0 = $precio_update_mostrar * $entero;
            $subtotal_update1 = $subtotal_update0 * (100 - $descuento) / 100;
            $subtotal_update =  number_format($subtotal_update1, 2, '.', '');

            $pedido_update = array('id' => $key, 'cantidad' => $entero, 'subtotal' => $subtotal_update);
            $this->Pedido->save($pedido_update);
        }

        if($this->request->data['recalcular'] == 'recalcular')
        {
            $this->Session->setFlash('Todos los Articulos fueron actualizados correctamente', 'default', array('class' => 'alert alert-success'));
                
            return $this->redirect(array('controller' => 'pedidos', 'action' => 'view'));            
        }
        elseif($this->request->data['procesar'] == 'procesar')
        {
            return $this->redirect(array('controller' => 'ordens', 'action' => 'add'));  
        }
    }
}
*/

public function check()
  {
        // debug($_POST);
        
        $arreglo = $this->request->data['Pedido'];
      // $porcentaje = $this->request->data['Pedido.porcentaje'];

    // debug($arreglo);
        
        if($this->request->is('post'))
        {
                         if (!empty($this->request->data['preciodesc'])) {
                foreach($this->request->data['preciodesc'] as $pedidoId => $precioOrg) {
                    $this->Pedido->updateAll(
                        ['Pedido.preciodesc' => $precioOrg],
                        ['Pedido.id' => $pedidoId]
                    );
                }
              
            } else {
                // precio_org no está presente en $this->request->data
                // Manejar el caso cuando no se envía precio_org en el formulario
                $this->Flash->success(__('Los cambios no se han guardado.'));
            }
            foreach($arreglo as $key => $value)
            {
                 
                $entero = preg_replace("/[^0-9]/", "", $value);
                
                if($entero == 0 || $entero == "")
                {
                    $entero = 1;
                }

               
                 
            //   $porcentaje = $this->Pedido->find('all', array('fields' => array('Pedido.porcentaje'), 'conditions' => array('Pedido.id' => $id)));
               

                $precio_update = $this->Pedido->find('all', array('fields' => array('Pedido.id', 'Pedido.preciodesc'), 'conditions' => array('Pedido.id' => $key)));
                
                $precio_update_mostrar = $precio_update[0]['Pedido']['preciodesc'];
               
                $porcentaje = $this->Pedido->find('all', array('fields' => array('Pedido.id','Pedido.porcentaje'), 'conditions' => array('Pedido.id' => $key)));
                $descuento = $porcentaje[0]['Pedido']['porcentaje'];
                
                $subtotal_update0 = $precio_update_mostrar * $entero;
                $subtotal_update1 = $descuento * $subtotal_update0;
                $subtotal_update2 = $subtotal_update1 / 100;
                
                $subtotal_update4 = $subtotal_update0 - $subtotal_update2;
                $subtotal_update =  number_format($subtotal_update4, 2, '.', '');
                $norden = $this->Pedido->find('all', array('fields' => array('Pedido.norden', 'Pedido.created'),  'limit' => 1));
                $norden1 = $norden[0]['Pedido']['norden'];

                $preciodesc = $subtotal_update / $entero;
                
                
                $pedido_update = array('id' => $key, 'cantidad' => $entero, 'subtotal' => $subtotal_update, 'porcentaje' => $descuento, 'norden' => $norden1, 'preciodesc' => $preciodesc);
                $this->Pedido->saveAll($pedido_update);
            }
                if ($this->request->is('post') || $this->request->is('put')) {
        $this->loadModel('Pedido');
                $precio = $this->Pedido->find('all', array('fields' => array('Pedido.id','Pedido.preciodesc'), 'conditions' => array('Pedido.id' => $key)));
                $precio_org = $precio[0]['Pedido']['preciodesc'];

              
    // La clave 'precio_org' está presente en $this->request->data
    // Tu lógica aquí

                          


        if($this->request->data['check'] == 'check')
        {
            $this->Session->setFlash('Todos los Articulos fueron actualizados correctamente', 'default', array('class' => 'alert alert-success'));
                    
            return $this->redirect(array('controller' => 'pedidos', 'action' => 'view2'));            
        }
        elseif($this->request->data['procesar'] == 'procesar')
        {
             return $this->redirect(array('controller' => 'ordens', 'action' => 'index3'));  
        }
    }

        }
            }




 public function opc0($id = null) {
        $this->Pedido->recursive = 2;
       if (!$id) {
            $this->Session->setFlash('Es necesario proveer un ID !!!');
            $this->redirect(array('action'=>'index'));
        }
        
        $this->Pedido->id = $id;
        if (!$this->Pedido->exists()) {
            $this->Session->setFlash('ID inválido');
            $this->redirect(array('action'=>'index'));
        }
        
       $desc = $this->Pedido->Bodegaped->find('all', array('fields' => array('Bodegaped.id', 'Articulo.DESCUENTO'), 'conditions' => array('Bodegaped.id =' => $id)));
        if (0 <= $desc) {
            $this->Pedido->saveField('porcentaje', 0);
           $this->Flash->success(__('El porcentaje 0 ha sido Actualizado en el Articulo'));
            $this->redirect(array('controller' => 'pedidos','action' => 'view'));
        }
        else{
            $this->Session->setFlash('ESTE PORCENTAJE NO ESTA PERMITIDO ', 'default', array('class' => 'alert alert-danger'));
                   $this->redirect(array('controller' => 'pedidos','action' => 'view'));
        }
      
    }
        
    public function opc1($id = null) {
     
        
        $this->Pedido->id = $id;
  
            $dcarg = 1;
           $dmax = $this->Pedido->find('all', array('fields' => 'Pedido.dmax', 'conditions' => array('Pedido.id' => $id)));
            $dmaxx = $dmax[00]['Pedido']['dmax'];
                    
           if ($dmaxx < $dcarg) {
            $this->Session->setFlash('ESTE PORCENTAJE NO ESTA PERMITIDO ', 'default', array('class' => 'alert alert-danger'));
                   $this->redirect(array('controller' => 'pedidos','action' => 'view'));
        }
        else{
            $this->Pedido->saveField('porcentaje', 1);
            $this->Flash->success(__('El porcentaje 1 ha sido Actualizado en el Articulo'));
            $this->redirect(array('controller' => 'pedidos','action' => 'view'));
        }
     
    }
        
    

     public function opc2($id = null) {
     
        
        $this->Pedido->id = $id;
  
            $dcarg = 2;
           $dmax = $this->Pedido->find('all', array('fields' => 'Pedido.dmax', 'conditions' => array('Pedido.id' => $id)));
            $dmaxx = $dmax[00]['Pedido']['dmax'];
                    
           if ($dmaxx < $dcarg) {
            $this->Session->setFlash('ESTE PORCENTAJE NO ESTA PERMITIDO ', 'default', array('class' => 'alert alert-danger'));
                   $this->redirect(array('controller' => 'pedidos','action' => 'view'));
        }
        else{
            $this->Pedido->saveField('porcentaje', 2);
            $this->Flash->success(__('El porcentaje 2 ha sido Actualizado en el Articulo'));
            $this->redirect(array('controller' => 'pedidos','action' => 'view'));
        }
     
    }
     public function opc3($id = null) {
     
        
        $this->Pedido->id = $id;
  
            $dcarg = 3;
           $dmax = $this->Pedido->find('all', array('fields' => 'Pedido.dmax', 'conditions' => array('Pedido.id' => $id)));
            $dmaxx = $dmax[00]['Pedido']['dmax'];
                    
           if ($dmaxx < $dcarg) {
            $this->Session->setFlash('ESTE PORCENTAJE NO ESTA PERMITIDO ', 'default', array('class' => 'alert alert-danger'));
                   $this->redirect(array('controller' => 'pedidos','action' => 'view'));
        }
        else{
            $this->Pedido->saveField('porcentaje', 3);
            $this->Flash->success(__('El porcentaje 3 ha sido Actualizado en el Articulo'));
            $this->redirect(array('controller' => 'pedidos','action' => 'view'));
        }
     
    }
     public function opc4($id = null) {
     
        
        $this->Pedido->id = $id;
  
            $dcarg = 4;
           $dmax = $this->Pedido->find('all', array('fields' => 'Pedido.dmax', 'conditions' => array('Pedido.id' => $id)));
            $dmaxx = $dmax[00]['Pedido']['dmax'];
                    
           if ($dmaxx < $dcarg) {
            $this->Session->setFlash('ESTE PORCENTAJE NO ESTA PERMITIDO ', 'default', array('class' => 'alert alert-danger'));
                   $this->redirect(array('controller' => 'pedidos','action' => 'view'));
        }
        else{
            $this->Pedido->saveField('porcentaje', 4);
            $this->Flash->success(__('El porcentaje 4 ha sido Actualizado en el Articulo'));
            $this->redirect(array('controller' => 'pedidos','action' => 'view'));
        }
     
    }
     public function opc5($id = null) {
     
        
        $this->Pedido->id = $id;
  
            $dcarg = 5;
           $dmax = $this->Pedido->find('all', array('fields' => 'Pedido.dmax', 'conditions' => array('Pedido.id' => $id)));
            $dmaxx = $dmax[00]['Pedido']['dmax'];
                    
           if ($dmaxx < $dcarg) {
            $this->Session->setFlash('ESTE PORCENTAJE NO ESTA PERMITIDO ', 'default', array('class' => 'alert alert-danger'));
                   $this->redirect(array('controller' => 'pedidos','action' => 'view'));
        }
        else{
            $this->Pedido->saveField('porcentaje', 5);
            $this->Flash->success(__('El porcentaje 5 ha sido Actualizado en el Articulo'));
            $this->redirect(array('controller' => 'pedidos','action' => 'view'));
        }
     
    }
     public function opc6($id = null) {
     
        
        $this->Pedido->id = $id;
  
            $dcarg = 6;
           $dmax = $this->Pedido->find('all', array('fields' => 'Pedido.dmax', 'conditions' => array('Pedido.id' => $id)));
            $dmaxx = $dmax[00]['Pedido']['dmax'];
                    
           if ($dmaxx < $dcarg) {
            $this->Session->setFlash('ESTE PORCENTAJE NO ESTA PERMITIDO ', 'default', array('class' => 'alert alert-danger'));
                   $this->redirect(array('controller' => 'pedidos','action' => 'view'));
        }
        else{
            $this->Pedido->saveField('porcentaje', 6);
            $this->Flash->success(__('El porcentaje 6 ha sido Actualizado en el Articulo'));
            $this->redirect(array('controller' => 'pedidos','action' => 'view'));
        }
     
    }
     public function opc7($id = null) {
     
        
        $this->Pedido->id = $id;
  
            $dcarg = 7;
           $dmax = $this->Pedido->find('all', array('fields' => 'Pedido.dmax', 'conditions' => array('Pedido.id' => $id)));
            $dmaxx = $dmax[00]['Pedido']['dmax'];
                    
           if ($dmaxx < $dcarg) {
            $this->Session->setFlash('ESTE PORCENTAJE NO ESTA PERMITIDO ', 'default', array('class' => 'alert alert-danger'));
                   $this->redirect(array('controller' => 'pedidos','action' => 'view'));
        }
        else{
            $this->Pedido->saveField('porcentaje', 7);
            $this->Flash->success(__('El porcentaje 7 ha sido Actualizado en el Articulo'));
            $this->redirect(array('controller' => 'pedidos','action' => 'view'));
        }
     
    }
     public function opc8($id = null) {
     
        
        $this->Pedido->id = $id;
  
            $dcarg = 8;
           $dmax = $this->Pedido->find('all', array('fields' => 'Pedido.dmax', 'conditions' => array('Pedido.id' => $id)));
            $dmaxx = $dmax[00]['Pedido']['dmax'];
                    
           if ($dmaxx < $dcarg) {
            $this->Session->setFlash('ESTE PORCENTAJE NO ESTA PERMITIDO ', 'default', array('class' => 'alert alert-danger'));
                   $this->redirect(array('controller' => 'pedidos','action' => 'view'));
        }
        else{
            $this->Pedido->saveField('porcentaje', 8);
            $this->Flash->success(__('El porcentaje 8 ha sido Actualizado en el Articulo'));
            $this->redirect(array('controller' => 'pedidos','action' => 'view'));
        }
     
    }
    public function opc9($id = null) {
     
        
        $this->Pedido->id = $id;
  
            $dcarg = 9;
           $dmax = $this->Pedido->find('all', array('fields' => 'Pedido.dmax', 'conditions' => array('Pedido.id' => $id)));
            $dmaxx = $dmax[00]['Pedido']['dmax'];
                    
           if ($dmaxx < $dcarg) {
            $this->Session->setFlash('ESTE PORCENTAJE NO ESTA PERMITIDO ', 'default', array('class' => 'alert alert-danger'));
                   $this->redirect(array('controller' => 'pedidos','action' => 'view'));
        }
        else{
            $this->Pedido->saveField('porcentaje', 9);
            $this->Flash->success(__('El porcentaje 9 ha sido Actualizado en el Articulo'));
            $this->redirect(array('controller' => 'pedidos','action' => 'view'));
        }
     
    }
      public function opc10($id = null) {
     
        
        $this->Pedido->id = $id;
  
            $dcarg = 10;
           $dmax = $this->Pedido->find('all', array('fields' => 'Pedido.dmax', 'conditions' => array('Pedido.id' => $id)));
            $dmaxx = $dmax[00]['Pedido']['dmax'];
                    
           if ($dmaxx < $dcarg) {
            $this->Session->setFlash('ESTE PORCENTAJE NO ESTA PERMITIDO ', 'default', array('class' => 'alert alert-danger'));
                   $this->redirect(array('controller' => 'pedidos','action' => 'view'));
        }
        else{
            $this->Pedido->saveField('porcentaje', 10);
            $this->Flash->success(__('El porcentaje 10 ha sido Actualizado en el Articulo'));
            $this->redirect(array('controller' => 'pedidos','action' => 'view'));
        }
     
    }
    


 public function opc11($id = null) {
     
        
        $this->Pedido->id = $id;
  
            $dcarg = 11;
           $dmax = $this->Pedido->find('all', array('fields' => 'Pedido.dmax', 'conditions' => array('Pedido.id' => $id)));
            $dmaxx = $dmax[00]['Pedido']['dmax'];
                    
           if ($dmaxx < $dcarg) {
            $this->Session->setFlash('ESTE PORCENTAJE NO ESTA PERMITIDO ', 'default', array('class' => 'alert alert-danger'));
                   $this->redirect(array('controller' => 'pedidos','action' => 'view'));
        }
        else{
            $this->Pedido->saveField('porcentaje', 11);
            $this->Flash->success(__('El porcentaje 11 ha sido Actualizado en el Articulo'));
            $this->redirect(array('controller' => 'pedidos','action' => 'view'));
        }
     
    }
     public function opc12($id = null) {
     
        
        $this->Pedido->id = $id;
  
            $dcarg = 12;
           $dmax = $this->Pedido->find('all', array('fields' => 'Pedido.dmax', 'conditions' => array('Pedido.id' => $id)));
            $dmaxx = $dmax[00]['Pedido']['dmax'];
                    
           if ($dmaxx < $dcarg) {
            $this->Session->setFlash('ESTE PORCENTAJE NO ESTA PERMITIDO ', 'default', array('class' => 'alert alert-danger'));
                   $this->redirect(array('controller' => 'pedidos','action' => 'view'));
        }
        else{
            $this->Pedido->saveField('porcentaje', 12);
            $this->Flash->success(__('El porcentaje 12 ha sido Actualizado en el Articulo'));
            $this->redirect(array('controller' => 'pedidos','action' => 'view'));
        }
     
    }
        
    public function opc13($id = null) {
      
        
        $this->Pedido->id = $id;
      
      
       /** $this->Pedido->recursive = 3;
       
               $pedidos = $this->Pedido->find('all', array(
                
                'fields' => array(
                    '[Articulo].[DESCUENTO]',
                ),
                'joins' => array(
                    
                                array(
                                      'conditions' => array(
                                                         '[Pedido].[bodegaped_id] = [bodegapeds].[id]',
                                                             ),
                                        'table' => '[bodegapeds]',
                                        'alias' => '[Bodegaped]',
                                        'type' => 'left',
               
                                        'conditions' => array(
                                        '[Bodegaped].[articulo_id] = [Articulo].[id]',
                                                              ),
                                            'table' => '[articulos]',
                                            'alias' => '[Articulo]',
                                            'type' => 'left',
                                        ),
                                             ),
                'conditions' => array(
                    '[pedido].[id]' => $id,
                ),
               
            ));
            $this->set(compact('pedidos', $this->Paginator->paginate()));
            echo json_encode($pedidos[0]);
            $this->autoRender = false;*/

          $dcarg = 13;
           $dmax = $this->Pedido->find('all', array('fields' => 'Pedido.dmax', 'conditions' => array('Pedido.id' => $id)));
            $dmaxx = $dmax[00]['Pedido']['dmax'];
         if ($dmaxx < $dcarg) {
            $this->Session->setFlash('ESTE PORCENTAJE NO ESTA PERMITIDO ', 'default', array('class' => 'alert alert-danger'));
                   $this->redirect(array('controller' => 'pedidos','action' => 'view'));
        }
        else{
            $this->Pedido->saveField('porcentaje', 13);
            $this->Flash->success(__('El porcentaje 13 ha sido Actualizado en el Articulo'));
            $this->redirect(array('controller' => 'pedidos','action' => 'view'));
        }
     
    }
    

    public function opc14($id = null) {
     
        
        $this->Pedido->id = $id;
  
            $dcarg = 14;
           $dmax = $this->Pedido->find('all', array('fields' => 'Pedido.dmax', 'conditions' => array('Pedido.id' => $id)));
            $dmaxx = $dmax[00]['Pedido']['dmax'];
                    
           if ($dmaxx < $dcarg) {
            $this->Session->setFlash('ESTE PORCENTAJE NO ESTA PERMITIDO ', 'default', array('class' => 'alert alert-danger'));
                   $this->redirect(array('controller' => 'pedidos','action' => 'view'));
        }
        else{
            $this->Pedido->saveField('porcentaje', 14);
            $this->Flash->success(__('El porcentaje 14 ha sido Actualizado en el Articulo'));
            $this->redirect(array('controller' => 'pedidos','action' => 'view'));
        }
     
    }
    public function opc15($id = null) {
     
        
        $this->Pedido->id = $id;
  
            $dcarg = 15;
           $dmax = $this->Pedido->find('all', array('fields' => 'Pedido.dmax', 'conditions' => array('Pedido.id' => $id)));
            $dmaxx = $dmax[00]['Pedido']['dmax'];
                    
           if ($dmaxx < $dcarg) {
            $this->Session->setFlash('ESTE PORCENTAJE NO ESTA PERMITIDO ', 'default', array('class' => 'alert alert-danger'));
                   $this->redirect(array('controller' => 'pedidos','action' => 'view'));
        }
        else{
            $this->Pedido->saveField('porcentaje', 15);
            $this->Flash->success(__('El porcentaje 15 ha sido Actualizado en el Articulo'));
            $this->redirect(array('controller' => 'pedidos','action' => 'view'));
        }
     
    }
     public function opc16($id = null) {
     
        
        $this->Pedido->id = $id;
  
            $dcarg = 16;
           $dmax = $this->Pedido->find('all', array('fields' => 'Pedido.dmax', 'conditions' => array('Pedido.id' => $id)));
            $dmaxx = $dmax[00]['Pedido']['dmax'];
                    
           if ($dmaxx < $dcarg) {
            $this->Session->setFlash('ESTE PORCENTAJE NO ESTA PERMITIDO ', 'default', array('class' => 'alert alert-danger'));
                   $this->redirect(array('controller' => 'pedidos','action' => 'view'));
        }
        else{
            $this->Pedido->saveField('porcentaje', 16);
            $this->Flash->success(__('El porcentaje 16 ha sido Actualizado en el Articulo'));
            $this->redirect(array('controller' => 'pedidos','action' => 'view'));
        }
     
    }
     public function opc17($id = null) {
     
        
        $this->Pedido->id = $id;
  
            $dcarg = 17;
           $dmax = $this->Pedido->find('all', array('fields' => 'Pedido.dmax', 'conditions' => array('Pedido.id' => $id)));
            $dmaxx = $dmax[00]['Pedido']['dmax'];
                    
           if ($dmaxx < $dcarg) {
            $this->Session->setFlash('ESTE PORCENTAJE NO ESTA PERMITIDO ', 'default', array('class' => 'alert alert-danger'));
                   $this->redirect(array('controller' => 'pedidos','action' => 'view'));
        }
        else{
            $this->Pedido->saveField('porcentaje', 17);
            $this->Flash->success(__('El porcentaje 17 ha sido Actualizado en el Articulo'));
            $this->redirect(array('controller' => 'pedidos','action' => 'view'));
        }
     
    }
    public function opc18($id = null) {
     
        
        $this->Pedido->id = $id;
  
            $dcarg = 18;
           $dmax = $this->Pedido->find('all', array('fields' => 'Pedido.dmax', 'conditions' => array('Pedido.id' => $id)));
            $dmaxx = $dmax[00]['Pedido']['dmax'];
                    
           if ($dmaxx < $dcarg) {
            $this->Session->setFlash('ESTE PORCENTAJE NO ESTA PERMITIDO ', 'default', array('class' => 'alert alert-danger'));
                   $this->redirect(array('controller' => 'pedidos','action' => 'view'));
        }
        else{
            $this->Pedido->saveField('porcentaje', 18);
            $this->Flash->success(__('El porcentaje 18 ha sido Actualizado en el Articulo'));
            $this->redirect(array('controller' => 'pedidos','action' => 'view'));
        }
     
    }
    public function opc19($id = null) {
     
        
        $this->Pedido->id = $id;
  
            $dcarg = 19;
           $dmax = $this->Pedido->find('all', array('fields' => 'Pedido.dmax', 'conditions' => array('Pedido.id' => $id)));
            $dmaxx = $dmax[00]['Pedido']['dmax'];
                    
           if ($dmaxx < $dcarg) {
            $this->Session->setFlash('ESTE PORCENTAJE NO ESTA PERMITIDO ', 'default', array('class' => 'alert alert-danger'));
                   $this->redirect(array('controller' => 'pedidos','action' => 'view'));
        }
        else{
            $this->Pedido->saveField('porcentaje', 19);
            $this->Flash->success(__('El porcentaje 19 ha sido Actualizado en el Articulo'));
            $this->redirect(array('controller' => 'pedidos','action' => 'view'));
        }
     
    }
     public function opc20($id = null) {
     
        
        $this->Pedido->id = $id;
  
            $dcarg = 20;
           $dmax = $this->Pedido->find('all', array('fields' => 'Pedido.dmax', 'conditions' => array('Pedido.id' => $id)));
            $dmaxx = $dmax[00]['Pedido']['dmax'];
                    
           if ($dmaxx < $dcarg) {
            $this->Session->setFlash('ESTE PORCENTAJE NO ESTA PERMITIDO ', 'default', array('class' => 'alert alert-danger'));
                   $this->redirect(array('controller' => 'pedidos','action' => 'view'));
        }
        else{
            $this->Pedido->saveField('porcentaje', 20);
            $this->Flash->success(__('El porcentaje 20 ha sido Actualizado en el Articulo'));
            $this->redirect(array('controller' => 'pedidos','action' => 'view'));
        }
     
    }
    public function opc21($id = null) {
     
        
        $this->Pedido->id = $id;
  
            $dcarg = 21;
           $dmax = $this->Pedido->find('all', array('fields' => 'Pedido.dmax', 'conditions' => array('Pedido.id' => $id)));
            $dmaxx = $dmax[00]['Pedido']['dmax'];
                    
           if ($dmaxx < $dcarg) {
            $this->Session->setFlash('ESTE PORCENTAJE NO ESTA PERMITIDO ', 'default', array('class' => 'alert alert-danger'));
                   $this->redirect(array('controller' => 'pedidos','action' => 'view'));
        }
        else{
            $this->Pedido->saveField('porcentaje', 21);
            $this->Flash->success(__('El porcentaje 21 ha sido Actualizado en el Articulo'));
            $this->redirect(array('controller' => 'pedidos','action' => 'view'));
        }
     
    }
      public function opc22($id = null) {
     
        
        $this->Pedido->id = $id;
  
            $dcarg = 22;
           $dmax = $this->Pedido->find('all', array('fields' => 'Pedido.dmax', 'conditions' => array('Pedido.id' => $id)));
            $dmaxx = $dmax[00]['Pedido']['dmax'];
                    
           if ($dmaxx < $dcarg) {
            $this->Session->setFlash('ESTE PORCENTAJE NO ESTA PERMITIDO ', 'default', array('class' => 'alert alert-danger'));
                   $this->redirect(array('controller' => 'pedidos','action' => 'view'));
        }
        else{
            $this->Pedido->saveField('porcentaje', 22);
            $this->Flash->success(__('El porcentaje 22 ha sido Actualizado en el Articulo'));
            $this->redirect(array('controller' => 'pedidos','action' => 'view'));
        }
     
    }
  public function opc23($id = null) {
     
        
        $this->Pedido->id = $id;
  
            $dcarg = 23;
           $dmax = $this->Pedido->find('all', array('fields' => 'Pedido.dmax', 'conditions' => array('Pedido.id' => $id)));
            $dmaxx = $dmax[00]['Pedido']['dmax'];
                    
           if ($dmaxx < $dcarg) {
            $this->Session->setFlash('ESTE PORCENTAJE NO ESTA PERMITIDO ', 'default', array('class' => 'alert alert-danger'));
                   $this->redirect(array('controller' => 'pedidos','action' => 'view'));
        }
        else{
            $this->Pedido->saveField('porcentaje', 23);
            $this->Flash->success(__('El porcentaje 23 ha sido Actualizado en el Articulo'));
            $this->redirect(array('controller' => 'pedidos','action' => 'view'));
        }
     
    }
     public function opc24($id = null) {
     
        
        $this->Pedido->id = $id;
  
            $dcarg = 24;
           $dmax = $this->Pedido->find('all', array('fields' => 'Pedido.dmax', 'conditions' => array('Pedido.id' => $id)));
            $dmaxx = $dmax[00]['Pedido']['dmax'];
                    
           if ($dmaxx < $dcarg) {
            $this->Session->setFlash('ESTE PORCENTAJE NO ESTA PERMITIDO ', 'default', array('class' => 'alert alert-danger'));
                   $this->redirect(array('controller' => 'pedidos','action' => 'view'));
        }
        else{
            $this->Pedido->saveField('porcentaje', 24);
            $this->Flash->success(__('El porcentaje 24 ha sido Actualizado en el Articulo'));
            $this->redirect(array('controller' => 'pedidos','action' => 'view'));
        }
     
    }
 public function opc25($id = null) {
     
        
        $this->Pedido->id = $id;
  
            $dcarg = 25;
           $dmax = $this->Pedido->find('all', array('fields' => 'Pedido.dmax', 'conditions' => array('Pedido.id' => $id)));
            $dmaxx = $dmax[00]['Pedido']['dmax'];
                    
           if ($dmaxx < $dcarg) {
            $this->Session->setFlash('ESTE PORCENTAJE NO ESTA PERMITIDO ', 'default', array('class' => 'alert alert-danger'));
                   $this->redirect(array('controller' => 'pedidos','action' => 'view'));
        }
        else{
            $this->Pedido->saveField('porcentaje', 25);
            $this->Flash->success(__('El porcentaje 25 ha sido Actualizado en el Articulo'));
            $this->redirect(array('controller' => 'pedidos','action' => 'view'));
        }
     
    }
    
}
?>