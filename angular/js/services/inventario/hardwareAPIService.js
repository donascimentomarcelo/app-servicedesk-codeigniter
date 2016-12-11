

angular.module("hardware").factory("hardwareAPI", function($http){
    var _getCarregaHardware = function(){
        
      return $http.get("/cd/index.php/inventario/inventario_controller/listagem");
      
    };
    
    var _getRegistraInventario = function(registro){
        
        return $http.post("/cd/index.php/inventario/inventario_controller/registro_hardware", registro);
        
    };
    
    var _getApagarRegistro = function(idinventario){
       
        return $http.post("/cd/index.php/inventario/inventario_controller/exclui_hardware",{idinventario:idinventario});
        
    };
    
    var _getLoadConfig = function(){
        
        return $http.get("/cd/index.php/inventario/inventario_controller/list_config_hw");  
        
    };
    
   
    return{
        
        getCarregaHardware : _getCarregaHardware,
        
        getRegistraInventario : _getRegistraInventario,
        
        getApagarRegistro : _getApagarRegistro,
        
        getLoadConfig : _getLoadConfig
    };
});