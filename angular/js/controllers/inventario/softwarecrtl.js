

                angular.module('software').controller('softwarecrtl', function($scope, softwareInterceptor, softwareValidate, softwareAPI){
                    
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
                            if(data === '    1')
                            {
                            delete $scope.action;
                            delete $scope.selectedIndex;
                            }
                            softwareValidate.messageSoftware(data);
                            softwareInterceptor.cleanInputSoftware();
                            loadSoftware();
                        }).error(function(data){
                            $scope.error = "Aconteceu um erro :"+data;
                        });
                    };
                    
                    $scope.delete = function(idsoftware){
                        softwareAPI.getDeleteSoftware(idsoftware).success(function(data){
                            if(data === '    1')
                            {
                            delete $scope.action;
                            delete $scope.selectedIndex;
                            }
                            softwareValidate.deleteSoftware(data);
                            softwareInterceptor.cleanInputSoftware();
                            loadSoftware();
                        }).error(function(data){
                            $scope.error = "Aconteceu um erro :"+data;
                        });
                    };
                    
                    $scope.itemSelected = function(idsoftware){
                        $scope.selectedIndex = idsoftware;
                    };
                    
                    $scope.update = function(dataSoftware){
                        softwareInterceptor.fillInputSoftware();
                        $scope.action = dataSoftware;
                    };
                    
                    $scope.new = function(){
                        softwareInterceptor.cleanInputSoftware();
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
                