

        
        serviceCallApp.factory('serviceCallAPIService', function($http){
            
            var _getServiceCall = function(){
                
                return $http.get('/cd/index.php/chamado/chamado_controller/serviceCallList');
                
            };
            
            return{
                
                getServiceCall : _getServiceCall
                
            };
        });