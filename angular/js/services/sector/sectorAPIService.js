


        
        angular.module("sector").factory("sectorAPI", function($http, config){
            
            var _getLoadDataSector = function(){
                
                return $http.get(config.baseUrl+"loadSector");
                
            };
            
            var _getSaveOrEditSector = function(action){
                
                return $http.post(config.baseUrl+"save_or_edit_sector", action);
                
            };
            
            return{
                
                getLoadDataSector : _getLoadDataSector,
                
                getSaveOrEditSector : _getSaveOrEditSector
                
            };
            
        });