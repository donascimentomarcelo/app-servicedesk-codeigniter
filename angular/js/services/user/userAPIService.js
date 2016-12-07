


            angular.module("user").factory("userAPI", function($http){
                
                var _getLoadUser = function(){
                    
                    return $http.get('/cd/index.php/usuario/usuario_controller/list_user');
                    
                };
                
                var _getActionUser = function(action){
                    
                    return $http.post('/cd/index.php/usuario/usuario_controller/insert_or_edit_user',action);
                    
                };
                
                var _getLoadSector = function(){
                    
                    return $http.get('/cd/index.php/setor/setor_controller/active_sector');
                    
                };
                
                return {
                    
                    getLoadUser : _getLoadUser,
                    
                    getActionUser : _getActionUser,
                    
                    getLoadSector : _getLoadSector
                    
                };
            });
            
            