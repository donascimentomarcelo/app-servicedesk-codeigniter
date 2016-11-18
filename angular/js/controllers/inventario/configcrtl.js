
        
        angular.module("inventarioConfig").controller("configcrtl", function($scope, configAPI){
        
            $scope.dataConfig = [];
            var loadConfig = function(){
                configAPI.getLoadConfig().success(function(data){
                    $scope.dataConfig = data;
                }).error(function(data){
                    $scope.error = "Ocorreu um erro :"+data;
                });
            };
            
            $scope.actionConfig = function(action){
                configAPI.getActionConfig(action).success(function(data){
                delete $scope.action;
                delete $scope.selectIndex;
                loadConfig();
                }).error(function(data){
                    $scope.error = "Aconteceu um erro :"+data;
                });
            };
            
            $scope.editConfig = function(dataConfig){
                $scope.action = dataConfig;
            };
            
            $scope.new = function(){
                delete $scope.action;
                delete $scope.selectedIndex;
            };
            
            $scope.ordenationBy = function(click){
                $scope.ordenationCritery = click;
                $scope.ordenation = !$scope.ordenation;
            };
            
            $scope.itemClicked = function(idconfig){
                console.log(idconfig)
                $scope.selectedIndex = idconfig;
            };
            
            loadConfig();

        });
        
        