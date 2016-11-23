




        angular.module("user").controller("usercrtl", function ($scope, userAPI) {

            $scope.userData = [];
            var loadUser = function () {
                userAPI.getLoadUser().success(function (data) {
                    $scope.userData = data;

                }).error(function (data) {
                    $scope.error = "Ocorreu um erro :" + data;
                });
            };

            $scope.sectorData = [];
            var loadSector = function () {
                userAPI.getLoadSector().success(function (data) {
                    $scope.sectorData = data;

                }).error(function (data) {
                    $scope.error = "Ocorreu um erro :" + data;
                });
            };

            $scope.insert_or_edit = function (action) {

                userAPI.getActionUser(action).success(function () {
                    
                    delete $scope.action;
                    delete $scope.selectedIndex;
                    loadUser();

                }).error(function (data) {
                    $scope.error = "Ocorreu um erro :" + data;
                });

            };

            $scope.edit = function (userData) {
                $scope.action = userData;
            };

            $scope.new = function () {
                delete $scope.action;
                delete $scope.selectedIndex;
            };

            $scope.ordenationBy = function (click) {
                $scope.ordenationCritery = click;
                $scope.ordenation = !$scope.ordenation;
            };
            
            $scope.itemClicked = function(id){
                $scope.selectedIndex = id;
            };

            loadUser();

            loadSector();
        });
