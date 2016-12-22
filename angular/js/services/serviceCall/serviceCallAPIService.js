

        
        serviceCallApp.factory('serviceCallAPIService', function($http){
            
            var _getServiceCall = function(){
                
                return $http.get('/cd/index.php/chamado/chamado_controller/myServiceCallList');
                
            };
            var _getCategory = function(){
                
                return $http.get('/cd/index.php/chamado/chamado_controller/categoryList');
                
            };
            var _getSubCategory = function(){
                
                return $http.get('/cd/index.php/chamado/chamado_controller/subcategoryList');
                
            };
            var _getSector = function(){
                
                return $http.get('/cd/index.php/chamado/chamado_controller/sectorList');
                
            };
            
            return{
                
                getServiceCall : _getServiceCall,
                
                getCategory : _getCategory,
                
                getSubCategory :_getSubCategory,
                
                getSector : _getSector
                
            };
        });