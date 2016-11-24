


        
        angular.module("profile").factory("profileAPI", function($http, config){
            
            var _getLoadProfile = function(){
              
                return $http.get(config.baseUrl+"perfil_pessoal/perfil_pessoal_controller/");
                
            };
            
            return {
                
                getLoadProfile : _getLoadProfile
                
            };
            
        });