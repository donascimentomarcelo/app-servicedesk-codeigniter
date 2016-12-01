
        
        
        angular.module("sector").controller("sectorctrl", function($scope, sectorAPI){
            
            $scope.dataSector = [];
           
            var loadDataSector = function(){
                sectorAPI.getLoadDataSector().success(function(data){
                    $scope.dataSector = data;
                }).error(function(data){
                    $scope.error = "Ocorreu um erro :"+data;
                });
            };
            
            loadDataSector();
        });