




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
                    //http://stackoverflow.com/questions/24443246/angularjs-how-to-upload-multipart-form-data-and-a-file
                    delete $scope.action;
                    delete $scope.selectedIndex;
                    loadUser();

                }).error(function (data) {
                    $scope.error = "Ocorreu um erro :" + data;
                });

            };

            $scope.edit = function (userData) {
                angular.element(document.getElementById('name')).parent().addClass('is-focused');
                angular.element(document.getElementById('email')).parent().addClass('is-focused');
                angular.element(document.getElementById('ramal')).parent().addClass('is-focused');
                angular.element(document.getElementById('administrador')).prop('checked', true).addClass('is-focused');
                
                $scope.action = userData;
            };

            $scope.new = function () {
                delete $scope.action;
                angular.element(document.getElementById('name')).parent().removeClass('is-focused');
                angular.element(document.getElementById('email')).parent().removeClass('is-focused');
                angular.element(document.getElementById('ramal')).parent().removeClass('is-focused');
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
