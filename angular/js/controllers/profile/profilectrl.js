


        angular.module("profile").controller("profilectrl", function ($scope, $timeout, profileAPI, profileInterceptors) {

            $scope.dataProfile = [];
            $scope.dataSector =  [];
            $scope.info =        [];
            $scope.infoProfile = [];
            $scope.infoSector =  [];

            var loadProfile = function () {
                profileAPI.getLoadProfile().success(function (data) {

                    angular.forEach(data, function (value) {
                        $scope.dataProfile = value;
                        profileInterceptors.getLoadProfile();
                    });

                }).error(function () {
                    $scope.infoProfile = {
                        class: 'alert alert-danger alert-dismissible alert-upload fade in',
                        message: 'Não foi possível carregar os dados do perfil. Houve um erro interno!'
                    };
                    $scope.messageProfile = $scope.infoProfile;
                });
            };

            var loadSector = function () {
                profileAPI.getLoadSector().success(function (data) {
                    $scope.dataSector = data;
                }).error(function () {
                    $scope.infoSector = {
                        SClass: 'alert alert-danger alert-dismissible alert-upload fade in',
                        SMessage: 'Não foi possível carregar o setor. Houve um erro interno!'
                    };
                    $scope.messageSector = $scope.infoSector;

                });
            };

            $scope.alterProfile = function (dataProfile) {
                profileAPI.getAlterProfile(dataProfile).success(function (data) {
                    loadProfile();
                    $scope.message = data;
                    $scope.hideMessage = false;

                    $timeout(function () {
                        $scope.hideMessage = true;
                    },3000);

                }).error(function () {
                    $scope.info = {
                        class: 'alert alert-danger alert-dismissible alert-upload fade in',
                        message: 'Não foi possível atualizar o perfil. Houve um erro interno!'};
                    $scope.message = $scope.info;
                    $scope.hideMessage = false;

                    $timeout(function () {
                        $scope.hideMessage = true;
                    },3000);
                });
            };

            loadProfile();

            loadSector();
        });