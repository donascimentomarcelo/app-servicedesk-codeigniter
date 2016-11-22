


            
            
            angular.module("user").controller("usercrtl", function($scope, userAPI){
                
                $scope.userData = [];
                var loadUser = function(){
                    userAPI.getLoadUser().success(function(data){
                        $scope.userData = data;
                      
                    }).error(function(data){
                        $scope.error = "Ocorreu um erro :"+data;
                    });
                };
                
                
                loadUser();
            });
            