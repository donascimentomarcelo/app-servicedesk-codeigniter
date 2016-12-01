


        
        angular.module("sector").factory("sectorAPI", function($http, config){
            
            var _getLoadDataSector = function(){
                
                return $http.get(config.baseUrl+"setor/setor_controller/loadSector");
                
            };
            
            return{
                
                getLoadDataSector : _getLoadDataSector
                
            };
            
        });