<?php if(!defined('BASEPATH'))exit('No direct script access allowed');

if (!function_exists('filtrodedatos'))
{
   function filtrodedatos($filtrar, $datos_aceptados)
   {
      $datos_filtrados=array();
      $filtrar_keys=array_keys($filtrar);
      $error=false;
   	foreach ($datos_aceptados as $dato)
      {
         if(in_array($dato,$filtrar_keys))
         {
            $datos_filtrados[$dato]=$filtrar[$dato];
         }
      }
      $filtrar_keys=array_keys($datos_filtrados);
      foreach ($datos_aceptados as $dato)
      {
         if(!in_array($dato,$filtrar_keys))
         {
            $error=true;
         }
      }

      if($error) return null;
      return $datos_filtrados;
   }
}