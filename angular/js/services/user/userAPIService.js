


            angular.module("user").factory("userAPI", function($http, config){
                
                var _getLoadUser = function(){
                    
                    return $http.get(config.baseUrl+"/cd/index.php/usuario/usuario_controller/list_user");
                    
                };
                
                return {
                    
                    getLoadUser : _getLoadUser
                    
                };
            });
            
            