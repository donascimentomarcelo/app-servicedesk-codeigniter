


        
        angular.module("sector").factory("sectorAPI", function($http){
            
            var _getLoadDataSector = function(){
                
                return $http.get('/cd/index.php/setor/setor_controller/loadSector');
                
            };
            
            var _getSaveOrEditSector = function(action){
                
                return $http.post('/cd/index.php/setor/setor_controller/save_or_edit_sector', action);
                
            };
            
            return{
                
                getLoadDataSector : _getLoadDataSector,
                
                getSaveOrEditSector : _getSaveOrEditSector
                
            };
            
        });