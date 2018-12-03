<?php

/*
 * This file is part of the Ocrend Framewok 2 package.
 *
 * (c) Ocrend Software <info@ocrend.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace app\models;

use app\models as Model;
use Ocrend\Kernel\Models\Models;
use Ocrend\Kernel\Models\IModels;
use Ocrend\Kernel\Models\ModelsException;
use Ocrend\Kernel\Models\Traits\DBModel;
use Ocrend\Kernel\Router\IRouter;

/**
 * Modelo Home
 *
 * @author Jose Luis Acevedo Parajón <acebedo.parajon@gmail.com>
 */

class Home extends Models implements IModels {
    /**
      * Característica para establecer conexión con base de datos. 
    */
    use DBModel;

    // Contenido del modelo... 


		/**
      * Obtiene elementos de Home en platos
      *
      * @param string $select: Elementos de platos a seleccionar
      *
      * @return false|array: false si no hay datos.
      *                     array con los datos.
    */
    final public function get(string $select = '*') {
      return $this->db->select($select,'platos');
    }

    final public function categoria() {
      return $this->db->query_select('SELECT categoria,COUNT(*) FROM platos GROUP BY categoria');
    }


    /**
      * __construct()
    */
    public function __construct(IRouter $router = null) {
        parent::__construct($router);
        $this->startDBConexion();
    }

    /**
      * __destruct()
    */ 
    public function __destruct() {
        parent::__destruct();
        $this->endDBConexion();
    }
}