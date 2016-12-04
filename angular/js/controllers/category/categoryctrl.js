


        angular.module("category").controller("categoryctrl", function (categoryAPI, $scope) {

        $scope.loadDataCategory = [];

        var loadCategory = function () {
             categoryAPI.getLoadCategory().success(function (data) {
                $scope.loadDataCategory = data;
            }).error(function (data) {
                $scope.error = "Houve um erro :" + data;
            });

        };

        $scope.saveOrEditCategory = function (action) {
            categoryAPI.getSaveOrEditCategory(action).success(function () {
                delete $scope.action;
                delete $scope.selectedIndex;
                loadCategory();
            }).error(function (data) {
                $scope.error = "Houve um erro :" + data;
            });
        };
        
        $scope.edit = function(loadDataCategory){
            $scope.action = loadDataCategory;
        };
        
        $scope.new = function(){
            delete $scope.action;
            delete $scope.selectedIndex;
        };
        
        $scope.ordenationBy = function(click){
            $scope.ordenationCritery = click;
            $scope.ordenation = !$scope.ordenation;
        };
        
        $scope.itemClicked = function(idcategoria){
            $scope.selectedIndex = idcategoria;
        };

        loadCategory();
    });

