

        angular.module("photo_profile").controller("photo_profilectrl", function($scope,photoProfileAPI){
            
                $scope.loadDataPhoto = [];
                var loadDataPhoto = function(){
                    photoProfileAPI.getLoadPhotoProfileAPI().success(function(data){
                        $scope.dataProfilePhoto = data;
                    }).error(function(data){
                        $scope.error = "Houve um erro :"+data;
                    });
                };
            
                $scope.alterPhotoProfile = function(imagem){
                    photoProfileAPI.getSavePhotoProfileAPI(imagem).success(function(data){
                        console.log(imagem);
                        console.log('Data console :'+data);
                        loadDataPhoto();
                    }).error(function(data){
                        $scope.error = "Houve um erro :"+data;
                    });
                };
                
                loadDataPhoto();
        });

