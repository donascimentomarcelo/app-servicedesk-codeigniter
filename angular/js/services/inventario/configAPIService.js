
        
        angular.module("inventarioConfig").factory("configAPI", function($http, config){
            
            var _getLoadConfig = function(){
                
              return $http.get(config.baseUrl+"/cd/index.php/inventario/inventario_controller/list_config");
                
            };
            
            return{
                
                getLoadConfig : _getLoadConfig
                
            };
        });
        
        