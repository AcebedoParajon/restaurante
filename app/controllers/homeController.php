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
 * Controlador home/
 *
 * @author Jose Luis Acebedo <acebedo.parajon@gmail.com>
*/

class homeController extends Controllers implements IControllers {

    public function __construct(IRouter $router) {
        parent::__construct($router);
        $query = new Model\Home;
        $n_categoria = $query->categoria();
        $num_categoria = (int)$n_categoria[0][1];
        echo $this->template->render('home/home',array(
        	'datos'=>$query->get(),
        	'nombre_categoria'=>$query->categoria(),
        	'num_categoria'=>$num_categoria
        ));
    }

}