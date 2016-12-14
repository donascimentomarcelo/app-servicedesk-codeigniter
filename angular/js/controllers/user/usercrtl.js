




        angular.module("user").controller("usercrtl", function ($scope, $timeout, userAPI, userInterceptors) {

            $scope.userData =   [];
            $scope.sectorData = [];
            $scope.infoUser =   [];
            $scope.infoSector = [];

            var loadUser = function () {
                userAPI.getLoadUser().success(function (data) {
                    $scope.userData = data;

                }).error(function () {
                    $scope.infoUser = {
                        'class': 'alert alert-danger alert-dismissible alert-upload fade in',
                        'message': 'Não é possivel carregar os usuários! Houve um erro interno.'
                    };
                });
            };

            var loadSector = function () {
                userAPI.getLoadSector().success(function (data) {
                    $scope.sectorData = data;

                }).error(function () {
                    $scope.infoSector = {
                        'class': 'alert alert-danger alert-dismissible alert-upload fade in',
                        'message': 'Não é possivel carregar os setores! Houve um erro interno.'
                    };
                });
            };

            $scope.insert_or_edit = function (action) {

                userAPI.getActionUser(action).success(function (data) {
                    //http://stackoverflow.com/questions/24443246/angularjs-how-to-upload-multipart-form-data-and-a-file
                    delete $scope.action;
                    delete $scope.selectedIndex;
                    userInterceptors.getInsert_or_edit();
                    loadUser();
                    $scope.message = data;
                    $scope.hideMessage = false;

                    $timeout(function () {
                        $scope.hideMessage = true;
                    }, 3000);

                }).error(function () {
                    $scope.infoUser = {
                        'class': 'alert alert-danger alert-dismissible alert-content-grid-mdl-grid fade in',
                        'message': 'Não foi possível realizar a operação!'};
                    $scope.message = $scope.infoUser;
                    $scope.hideMessage = false;
                    $timeout(function () {
                        $scope.hideMessage = true;
                    }, 3000);
                });

            };

            $scope.edit = function (userData) {
                userInterceptors.getEdit(userData);
                $scope.action = userData;
            };

            $scope.new = function () {
                delete $scope.action;
                delete $scope.selectedIndex;
                $scope.senha = '';
                userInterceptors.getInsert_or_edit();
            };

            $scope.ordenationBy = function (click) {
                $scope.ordenationCritery = click;
                $scope.ordenation = !$scope.ordenation;
            };

            $scope.itemClicked = function (id) {
                $scope.selectedIndex = id;
            };


            loadUser();

            loadSector();
        });
