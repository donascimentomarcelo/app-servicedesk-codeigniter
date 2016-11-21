


    angular.module("software").factory("softwareAPI", function($http, config){
        
        var _getLoadSoftware = function(){
            
            return $http.get(config.baseUrl+"/cd/index.php/inventario/inventario_controller/list_software");
            
        };
        
        var _getConfigLoadSoftware = function(){
            
            return $http.get(config.baseUrl+"/cd/index.php/inventario/inventario_controller/list_config_sw");
        };
        
        var _getActionSoftware = function(action){
            
            return $http.post(config.baseUrl+"/cd/index.php/inventario/inventario_controller/insert_or_update_software",action);
            
        };
        
        var _getDeleteSoftware = function(idsoftware){
            
            return $http.post(config.baseUrl+"/cd/index.php/inventario/inventario_controller/delete_software",{idsoftware : idsoftware});
            
        };
       
        return{
          
               getLoadSoftware : _getLoadSoftware,
               
               getConfigLoadSoftware : _getConfigLoadSoftware,
               
               getActionSoftware : _getActionSoftware,
               
               getDeleteSoftware : _getDeleteSoftware
            
        };
    });