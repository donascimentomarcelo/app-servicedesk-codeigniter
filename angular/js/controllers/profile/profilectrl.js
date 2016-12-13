

    
        angular.module("profile").controller("profilectrl", function($scope,$timeout, profileAPI){
            
            $scope.dataProfile = [];
            $scope.dataSector = [];
            $scope.info = [];
            $scope.hideMessage = false;
            
            var loadProfile = function(){
                profileAPI.getLoadProfile().success(function(data){
                    
                angular.forEach(data, function (value) {
                $scope.dataProfile = value;
                
                angular.element(document.getElementById('name')).parent().addClass('is-dirty is-focused');
                angular.element(document.getElementById('name')).parent().removeClass('is-invalid');
                
                angular.element(document.getElementById('email')).parent().addClass('is-dirty is-focused');
                angular.element(document.getElementById('email')).parent().removeClass('is-invalid');
                
                angular.element(document.getElementById('ramal')).parent().addClass('is-dirty is-focused');
                angular.element(document.getElementById('ramal')).parent().removeClass('is-invalid');
                
                angular.element(document.getElementById('password')).parent().addClass('is-dirty is-focused');
                angular.element(document.getElementById('password')).parent().removeClass('is-invalid');
                
                });
                    
                    
                }).error(function(data){
                    $scope.error = "Houve um erro :"+data;
                });
            };
            
            
            
            var loadSector = function(){
                profileAPI.getLoadSector().success(function(data){
                    $scope.dataSector = data;
                }).error(function(data){
                    $scope.error = "Houve um erro :"+data;
                });
            };
            
            $scope.alterProfile = function(dataProfile){
                profileAPI.getAlterProfile(dataProfile).success(function(data){
                    loadProfile();
                    $scope.message = data;
                       
                }).error(function(){
                    $scope.info = {class:'danger', message:'Não foi possível atualizar o perfil. Houve um erro interno!'};
                    $scope.message = $scope.info;
                    $timeout(function () {
                        $scope.hideMessage = true;
                    },
                    3000);
                });
            };
            
            loadProfile();
            
            loadSector();
        });