<?php
//
use \Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;
//
// not a RouteConfigurator, don't confuse !
return function( RoutingConfigurator  $configurator) {
    $configurator
        ->add('hello', 'hello/{name}')
        ->defaults(['name' => 'World'])
        ->controller('App\Controller\HelloController@sayHello');
//    gives ->defaults(['name' => 'World', 'controller' => '\App\Controller\HelloController@sayHello'])])
//    yet better : remove the defaults part if just controller param;
//
//        ->add('list','/')
//        ->defaults(['controller' => '\App\Controller\TaskController@index'])
//
//        ->add('create', '/create')
//        ->defaults(['controller' => '\App\Controller\TaskController@create'])
//        ->host('localhost')
//        ->schemes( ['https', 'http'])
//        ->methods(['GET', 'POST'])
//
//        ->add('show', '/show/{id}')
//        ->defaults([
//            'id' => 100,
//            'controller' => '\App\Controller\TaskController@show'
//        ])
//    ;
};
?>