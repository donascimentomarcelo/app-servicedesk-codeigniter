
        
        angular.module("inventarioConfig").factory("configAPI", function($http){
            
            var _getLoadConfig = function(){
                
              return $http.get("/cd/index.php/inventario/inventario_controller/list_config");
                
            };
            var _getActionConfig = function(action){
                
              return $http.post("/cd/index.php/inventario/inventario_controller/save_or_edit_config",action);
                
            };
            
            return{
                
                getLoadConfig : _getLoadConfig,
                
                getActionConfig : _getActionConfig
                
            };
        });
        
        