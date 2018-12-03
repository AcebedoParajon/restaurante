<?php

/*
 * This file is part of the Ocrend Framewok 2 package.
 *
 * (c) Ocrend Software <info@ocrend.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
*/

namespace app\controllers;

use app\models as Model;
use Ocrend\Kernel\Router\IRouter;
use Ocrend\Kernel\Controllers\Controllers;
use Ocrend\Kernel\Controllers\IControllers;
  
/**
 * Controlador administrar/
 *
 * @author Jose Luis Acevedo Parajón <acebedo.parajon@gmail.com>
*/
  
class administrarController extends Controllers implements IControllers {

    public function __construct(IRouter $router) {
        parent::__construct($router,array(
          'users_logged' => true
        ));   
        global $config;
        
        $a = new Model\Administrar($router);

        switch($this->method) {
          case 'crear':
            echo $this->template->render('administrar/crear');
          break;
          case 'editar':
            if($this->isset_id and false !== ($data = $a->get(false))) {
              echo $this->template->render('administrar/editar', array(
                'data' => $data[0]
              ));
            } else {
              $this->functions->redir($config['site']['url'] . 'administrar/&error=true');
            }
          break;
          case 'newpass':
            echo $this->template->render('administrar/newpass');
          break;
          case 'eliminar':
            $a->delete();
          break;
          default:
            echo $this->template->render('administrar/administrar',array(
              'data' => $a->get()
            ));
          break;
        }
    }

}