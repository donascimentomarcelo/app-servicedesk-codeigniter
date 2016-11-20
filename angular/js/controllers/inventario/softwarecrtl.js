

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
                        softwareAPI.getActionSoftware(action).success(function(data){
                            delete $scope.action;
                            loadSoftware();
                        }).error(function(data){
                            $scope.error = "Aconteceu um erro :"+data;
                        });
                    };
                    
                    $scope.update = function(dataSoftware){
                        $scope.action = dataSoftware;
                    };
                    
                    $scope.new = function(){
                        delete $scope.action;
                    };
                    
                    
                    loadSoftware();
                    
                    loadConfigSoftware();

                });
                