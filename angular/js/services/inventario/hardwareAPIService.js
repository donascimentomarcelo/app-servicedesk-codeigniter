

angular.module("hardware").factory("hardwareAPI", function($http, config){
    var _getCarregaHardware = function(){
        
      return $http.get(config.baseUrl+"/cd/index.php/inventario/inventario_controller/listagem");
      
    };
    
    var _getRegistraInventario = function(registro){
        
        return $http.post(config.baseUrl+"/cd/index.php/inventario/inventario_controller/registro_hardware", registro);
        
    };
    
    var _getApagarRegistro = function(idinventario){
       
        return $http.post(config.baseUrl+"/cd/index.php/inventario/inventario_controller/exclui_hardware",{idinventario:idinventario});
        
    };
    
     var _getLoadData = function(){
        
        return $http.get(config.baseUrl+"/cd/index.php/usuario/usuario_controller/getPreencheDados");
        
    };
    
    var _getLoadConfig = function(){
        
        return $http.get(config.baseUrl+"/cd/index.php/inventario/inventario_controller/list_config_hw");  
        
    };
    
    var _getLoadEdit = function(idinventario){
        
       return $http.post(config.baseUrl+"/cd/index.php/inventario/inventario_controller/list_edit_hw",{idinventario:idinventario});
        
    };
    
    return{
        
        getCarregaHardware : _getCarregaHardware,
        
        getRegistraInventario : _getRegistraInventario,
        
        getApagarRegistro : _getApagarRegistro,
        
        getLoadData : _getLoadData,
        
        getLoadConfig : _getLoadConfig,
        
        getLoadEdit : _getLoadEdit
    };
});