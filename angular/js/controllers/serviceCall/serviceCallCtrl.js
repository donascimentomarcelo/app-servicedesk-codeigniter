

        serviceCallApp.controller('serviceCallCtrl', function(serviceCallAPIService, $scope){
            
            $scope.dataServiceCall = [];
            $scope.dataCategory    = [];
            $scope.dataSubCategory = [];
            $scope.dataSector      = [];
            $scope.dataHistoric    = [];
            
            var loadServiceCall = function(){
                serviceCallAPIService.getServiceCall().success(function(data){
                    $scope.dataServiceCall = data;
                }).error(function(data){
                    console.log(data);
                });
            };
            
            var loadCategory = function(){
                serviceCallAPIService.getCategory().success(function(data){
                    $scope.dataCategory = data;
                }).error(function(data){
                   console.log(data); 
                });
            };
            var loadSubCategory = function(){
                serviceCallAPIService.getSubCategory().success(function(data){
                    $scope.dataSubCategory = data;
                }).error(function(data){
                   console.log(data); 
                });
            };
            var loadSector = function(){
                serviceCallAPIService.getSector().success(function(data){
                    $scope.dataSector = data;
                }).error(function(data){
                   console.log(data); 
                });
            };
            
            $scope.historic = function(idchamado){
                serviceCallAPIService.getHistoric(idchamado).success(function(data){
                    console.log(data);
                    $scope.dataHistoric = data;
                }).error(function(data){
                   console.log(data); 
                });
            };
            
            $scope.edit = function(dataServiceCall){
                $scope.action = dataServiceCall;
            };
            
            loadServiceCall();
            loadCategory();
            loadSubCategory();
            loadSector();
        });