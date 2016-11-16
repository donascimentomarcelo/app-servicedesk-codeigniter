
        
        angular.module("inventarioConfig").controller("configcrtl", function($scope, configAPI){
        
            $scope.dataConfig = [];
            var loadConfig = function(){
                configAPI.getLoadConfig().success(function(data){
                    $scope.dataConfig = data;
                    console.log('motre-me o que tens :'+data);
                }).error(function(data){
                    $scope.error = "Ocorreu um erro :"+data;
                });
            };
            loadConfig();

        });
        
        