


        
        angular.module("profile").factory("profileAPI", function($http, config){
            
            var _getLoadProfile = function(){
              
                return $http.get(config.baseUrl+"perfil_pessoal/perfil_pessoal_controller/load_profile");
                
            };
            
            var _getLoadSector = function(){
                
                return $http.get(config.baseUrl+"setor/setor_controller/active_sector");
                
            };
            
            var _getAlterProfile = function(dataProfile){
              
                return $http.post(config.baseUrl+"perfil_pessoal/perfil_pessoal_controller/update_profile",dataProfile);
                
            };
            
            return {
                
                getLoadProfile : _getLoadProfile,
                
                getLoadSector : _getLoadSector,
                
                getAlterProfile : _getAlterProfile
                
            };
            
        });