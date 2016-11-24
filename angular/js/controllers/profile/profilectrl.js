


        angular.module("profile").controller("profilectrl", function($scope, profileAPI){
            
            var loadProfile = function(){
                profileAPI.getLoadProfile().success(function(data){
                    $scope.dataProfile = data;
                }).error(function(data){
                    $scope.error = "Houve um erro :"+data;
                });
            };
            
            $scope.alterProfile = function(){
                profileAPI.getAlterProfile().success(function(){
                    loadProfile();
                }).error(function(data){
                    $scope.error = "Houve um erro :"+data;
                });
            };
            
            loadProfile();
        });