

        
        serviceCallApp.factory('serviceCallAPIService', function($http){
            
            var _getServiceCall = function(){
                
                return $http.get('/cd/index.php/chamado/chamado_controller/myServiceCallList');
                
            };
            var _getCategory = function(){
                
                return $http.get('/cd/index.php/chamado/chamado_controller/categoryList');
                
            };
            
            return{
                
                getServiceCall : _getServiceCall,
                
                getCategory : _getCategory
                
            };
        });