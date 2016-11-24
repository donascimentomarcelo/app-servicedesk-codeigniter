

    
        angular.module("profile").controller("profilectrl", function($scope, profileAPI){
            
            $scope.dataProfile = [];
            
            var loadProfile = function(){
                profileAPI.getLoadProfile().success(function(data){
                    $scope.dataProfile = data;
                }).error(function(data){
                    $scope.error = "Houve um erro :"+data;
                });
            };
            
            $scope.dataSector = [];
            
            var loadSector = function(){
                profileAPI.getLoadSector().success(function(data){
                    $scope.dataSector = data;
                }).error(function(data){
                    $scope.error = "Houve um erro :"+data;
                });
            };
            
            $scope.alterProfile = function(dataProfile){
                profileAPI.getAlterProfile(dataProfile).success(function(){
                    loadProfile();
                }).error(function(data){
                    $scope.error = "Houve um erro :"+data;
                });
            };
            
            loadProfile();
            
            loadSector();
        });