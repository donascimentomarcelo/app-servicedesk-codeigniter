
        
        
        angular.module("sector").controller("sectorctrl", function($scope, sectorAPI){
            
            $scope.dataSector = [];
           
            var loadDataSector = function(){
                sectorAPI.getLoadDataSector().success(function(data){
                    $scope.dataSector = data;
                }).error(function(data){
                    $scope.error = "Ocorreu um erro :"+data;
                });
            };
            
            $scope.saveOrEdit = function(action){
                sectorAPI.getSaveOrEditSector(action).success(function(){
                    delete $scope.action;
                    delete $scope.selectedIndex;
                    loadDataSector();
                }).error(function(data){
                    $scope.error = "Houve um erro :"+data;
                });
            };
            
            $scope.edit = function(dataSector){
                $scope.action = dataSector;
            };
            
            $scope.new = function(){
              delete $scope.action;  
              delete $scope.selectedIndex;
            };
            
            $scope.ordenationBy = function(click){
                $scope.ordenationCritery = click;
                $scope.ordenation = !$scope.ordenation;
            };
            
            $scope.itemClicked = function(idsetor){
              $scope.selectedIndex = idsetor;  
            };
            
            loadDataSector();
        });
