<?php

/*
 * This file is part of the Ocrend Framewok 2 package.
 *
 * (c) Ocrend Software <info@ocrend.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
*/

use app\models as Model;

/**
    * Inicio de sesión
    *
    * @return json
*/  
$app->post('/login', function() use($app) {
    $u = new Model\Users;   

    return $app->json($u->login());   
});

/**
    * Registro de un usuario
    *
    * @return json
*/
$app->post('/register', function() use($app) {
    $u = new Model\Users; 

    return $app->json($u->register());   
});

/**
    * Recuperar contraseña perdida
    *
    * @return json
*/
$app->post('/lostpass', function() use($app) {
    $u = new Model\Users; 

    return $app->json($u->lostpass());   
});


/**
    * Cambiar contraseña
    *
    * @return json
*/
$app->post('/newpass', function() use($app) {
    $u = new Model\Users; 

    return $app->json($u->newpass());   
});

/**
  * Acción vía ajax de Administrar en api/administrar/crear
  *
  * @return json
*/
$app->post('/administrar/crear', function() use($app) {
  $a = new Model\Administrar; 

  return $app->json($a->add());   
});


/**
  * Acción vía ajax de Administrar en api/administrar/editar
  *
  * @return json
*/
$app->post('/administrar/editar', function() use($app) {
  $a = new Model\Administrar; 

  return $app->json($a->edit());   
});