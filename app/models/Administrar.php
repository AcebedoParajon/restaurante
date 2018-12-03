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
 * Modelo Administrar
 *
 * @author Jose Luis Acevedo Parajón <acebedo.parajon@gmail.com>
 */

class Administrar extends Models implements IModels {
    /**
      * Característica para establecer conexión con base de datos. 
    */
    use DBModel;

    
    /**
      * Controla los errores de entrada del formulario
      *
      * @throws ModelsException
    */
    final private function errors() {
      global $http;
      # throw new ModelsException('¡Esto es un error!');
    }

    /** 
      * Crea un elemento de Administrar en la tabla ``
      *
      * @return array con información para la api, un valor success y un mensaje.
    */
    final public function add() {
      try {
        global $http;
                  
        # Controlar errores de entrada en el formulario
        $this->errors();

        # Insertar elementos
        $this->db->insert('platos',array(
          'categoria'=>$http->request->get('categoria'),
          'plato'=>$http->request->get('plato'),
          'precio'=>$http->request->get('precio'),
          'descripcion'=>$http->request->get('descripcion')
        ));

        return array('success' => 1, 'message' => 'Plato creado con éxito.');
      } catch(ModelsException $e) {
        return array('success' => 0, 'message' => $e->getMessage());
      }
    }
          
    /** 
      * Edita un elemento de Administrar en la tabla ``
      *
      * @return array con información para la api, un valor success y un mensaje.
    */
    final public function edit() : array {
      try {
        global $http;

        # Obtener el id del elemento que se está editando y asignarlo en $this->id
        $this->setId($http->request->get('id_platos'),'No se puede editar el elemento.'); 
                  
        # Controlar errores de entrada en el formulario
        $this->errors();

        # Actualizar elementos
        $this->db->update('platos',array(
          'categoria'=>$http->request->get('categoria'),
          'plato'=>$http->request->get('plato'),
          'precio'=>$http->request->get('precio'),
          'descripcion'=>$http->request->get('descripcion')

        ),"id_platos='$this->id'",'LIMIT 1');

        return array('success' => 1, 'message' => 'Editado con éxito.');
      } catch(ModelsException $e) {
        return array('success' => 0, 'message' => $e->getMessage());
      }
    }

    /** 
      * Borra un elemento de Administrar en la tabla ``
      * y luego redirecciona a administrar/&success=true
      *
      * @return void
    */
    final public function delete() {
      global $config;
      # Borrar el elemento de la base de datos
      $this->db->delete('platos',"id_platos='$this->id'");
      # Redireccionar a la página principal del controlador
      $this->functions->redir($config['site']['url'] . 'administrar/&success=true');
    }

    /**
      * Obtiene elementos de Administrar en la tabla ``
      *
      * @param bool $multi: true si se quiere obtener un listado total de los elementos 
      *                     false si se quiere obtener un único elemento según su id_platos
      * @param string $select: Elementos de  a seleccionar
      *
      * @return false|array: false si no hay datos.
      *                      array con los datos.
    */
    final public function get(bool $multi = true, string $select = '*') {
      if($multi) {
        return $this->db->query_select("SELECT * FROM platos ORDER BY categoria");
      }

      return $this->db->select($select,'platos',"id_platos='$this->id'",'LIMIT 1');
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