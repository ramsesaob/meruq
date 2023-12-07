<?php
App::uses('AppController', 'Controller');
/**

 */
class ReportevtsController extends AppController {
    
    public $uses = array('Reportevt');


    public function index() {
        $user = $this->Session->read('Auth.User.vendedor');
            $periodo = isset($this->request->query['periodo']) ? $this->request->query['periodo'] : date('Y-m');
            $montod = $this->Reportevt->find('all', array(
                
                'fields' =>  array('SUM(Reportevt.montod) as montod'),
                'conditions' => array(
                                    'PERIODO' => $periodo,
                                    'vend' => $user,
                                    'TIPO_DOC' => array(
                                        'nent',
                                        'fact',
                                    ),
                                ),
                                'group' => array(
                                    'PERIODO',
                                )
               
                ));

            $data = $montod[0];


             $montod2 = $this->Reportevt->find('all', array(
                
                'fields' =>  array('SUM(Reportevt.montod) as montod2'),
                'conditions' => array(
                                    'PERIODO' => $periodo,
                                    'vend' => $user,
                                    'TIPO_DOC' => 'dne',
                                    ),
                               
                                'group' => array(
                                    'PERIODO',
                                )
               
                ));

             $data2 =  $montod2[0];

             $data3 = $data2[0]['montod2'] * -1;


             $total_data = $data[0]['montod'] + $data2[0]['montod2'];
           
             $mostrar_acumulado =  number_format($total_data, 2, '.', '');
             
         
           $this->set(compact( 'data',  $data,  'data2', $data2,  'mostrar_acumulado', $mostrar_acumulado, 'data3', $data3));
           
          
            
    }

}

   