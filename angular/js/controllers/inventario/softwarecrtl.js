

                angular.module('software').controller('softwarecrtl', function($scope, softwareAPI){
                    
                    $scope.dataSoftware = [];
                    
                    var loadSoftware = function(){
                        softwareAPI.getLoadSoftware().success(function(data){
                            $scope.dataSoftware = data;
                        }).error(function(data){
                            $scope.error = "Aconteceu um erro :"+data;
                        });
                    };

                    var loadConfigSoftware = function(){
                        softwareAPI.getConfigLoadSoftware().success(function(data){
                            $scope.dataConfigSoftware = data;
                        }).error(function(data){
                            $scope.error = "Ocorreu um erro :"+data;
                        });
                    };
                    
                    $scope.actionSoftware = function(action){
                        softwareAPI.getActionSoftware(action).success(function(){
                            delete $scope.action;
                            delete $scope.selectedIndex;
                            loadSoftware();
                        }).error(function(data){
                            $scope.error = "Aconteceu um erro :"+data;
                        });
                    };
                    
                    $scope.delete = function(idsoftware){
                        softwareAPI.getDeleteSoftware(idsoftware).success(function(){
                            delete $scope.action;
                            delete $scope.selectedIndex;
                            loadSoftware();
                        }).error(function(data){
                            $scope.error = "Aconteceu um erro :"+data;
                        });
                    };
                    
                    $scope.itemSelected = function(idsoftware){
                        $scope.selectedIndex = idsoftware;
                    };
                    
                    $scope.update = function(dataSoftware){
                        $scope.action = dataSoftware;
                    };
                    
                    $scope.new = function(){
                        delete $scope.action;
                        delete $scope.selectedIndex;
                    };
                    
                    $scope.ordenationBy = function(click){
                        $scope.ordenationCritery = click;
                        $scope.ordenation = !$scope.ordenation;
                    };
                    
                    
                    loadSoftware();
                    
                    loadConfigSoftware();

                });
                