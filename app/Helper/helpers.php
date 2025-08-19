<?php 

    /****   set function item active   *****/ 
    if (!function_exists('set_active')) {
        function set_active($routes, $activeClass = 'active'){
            if(is_array($routes)){
                foreach($routes as $r){
                    if(request()->routeIs($r)){
                        return 'active';
                    }
                }
            }
        }
    }
    
    
