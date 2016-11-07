
angular.module("datauser").controller('dataUsercrtl', function($scope,loadDataAPI){
    
    $scope.dados = [];
    
    var loaDdata = function(){
        loadDataAPI.getLoadData().success(function(data){
            $scope.dados = data;
        }).error(function(data){
            $scope.message = "Aconteceu um erro ao carregar os dados: "+data;
        });
        
    };
    
});
