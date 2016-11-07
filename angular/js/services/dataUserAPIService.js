

angular.module("datauser").factory("loadDataAPI", function($http, config){
    
    var _getLoadData = function(){
        
        return $http.get(config.baseUrl+"chamar do helper");
        
    };
    
    return{
        
        getLoadData : _getLoadData
        
    };
    
});
 