

        serviceCallApp.controller('serviceCallCtrl', function(serviceCallAPIService, $scope){
            
            $scope.dataServiceCall =[];
            var loadServiceCall = function(){
                serviceCallAPIService.getServiceCall().success(function(data){
                    $scope.dataServiceCall = data;
                    console.log(data.idchamado);
                }).error(function(data){
                    console.log(data);
                });
            };
            
            loadServiceCall();
        });