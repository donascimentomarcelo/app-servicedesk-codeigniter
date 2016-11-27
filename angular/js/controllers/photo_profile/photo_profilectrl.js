

        angular.module("photo_profile").controller("photo_profilectrl", function($scope,photoProfileAPI){
            
                $scope.loadDataPhoto = [];
                var loadDataPhoto = function(){
                    photoProfileAPI.getLoadPhotoProfileAPI().success(function(data){
                        $scope.dataProfilePhoto = data;
                    }).error(function(data){
                        $scope.error = "Houve um erro :"+data;
                    });
                };
            
                $scope.alterPhotoProfile = function(action){
                    photoProfileAPI.getSavePhotoProfileAPI(action).success(function(){
                        console.log(action);
                        loadDataPhoto();
                    }).error(function(data){
                        $scope.error = "Houve um erro :"+data;
                    });
                };
                
                loadDataPhoto();
        });

