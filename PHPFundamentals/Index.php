<?php
    $query = 'rangoInicial=2330&rangoFinal=2330&ventaDesde=2019-06-21&rangoInicial=2330';
    $queryArray = getQueryArray($query);

    $rangoInicial = '';
    $rangoFinal = '';
    $ventasDesde = '';

    if(existsKey('rangoInicial', $queryArray) && existsKey('rangoFinal', $queryArray) && existsKey('ventaDesde', $queryArray)){
        $rangoInicial = $queryArray['rangoInicial'];
        $rangoFinal = $queryArray['rangoFinal'];
        $ventasDesde = $queryArray['ventaDesde'];

        /* PROCESO DE DESCARGA */
    }

    /*RECIEVE QUERY AND RETURN AN ARRAY*/
    function getQueryArray($query){
        
        $queryArray = explode('&',$query);
        $associativeArray = array();

        foreach($queryArray as $element){
            $associativeArray[getKey($element)] = getValue($element);
        }

        return $associativeArray;
    }

    function getKey($key){
        $character = '=';
        $indexof = strpos($key,$character);
        return substr($key, 0, $indexof);
    }

    function getValue($value){
        $character = '=';
        $indexof = strpos($value,$character);
        return substr($value, ($indexof + 1));
    }

    function existsKey($key, $array){
        return array_key_exists($key, $array);
    }
?>