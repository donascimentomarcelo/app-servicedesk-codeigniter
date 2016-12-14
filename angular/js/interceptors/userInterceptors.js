


        angular.module('user').factory('userInterceptors', function () {

            return{
                getInsert_or_edit: _getInsert_or_edit,
                getEdit: _getEdit
            };

            function _getInsert_or_edit() {
                angular.element(document.getElementById('name')).parent().removeClass('is-focused is-dirty');
                angular.element(document.getElementById('name')).parent().addClass('is-invalid');

                angular.element(document.getElementById('email')).parent().removeClass('is-focused is-dirty');
                angular.element(document.getElementById('email')).parent().addClass('is-invalid');

                angular.element(document.getElementById('ramal')).parent().removeClass('is-focused is-dirty');
                angular.element(document.getElementById('ramal')).parent().addClass('is-invalid');

                angular.element(document.getElementById('password')).parent().removeClass('is-focused is-dirty');
                angular.element(document.getElementById('password')).parent().addClass('is-invalid');

                document.getElementById('administrador').parentNode.MaterialRadio.uncheck();
                document.getElementById('usuario').parentNode.MaterialRadio.uncheck();
                document.getElementById('ativo').parentNode.MaterialRadio.uncheck();
                document.getElementById('inativo').parentNode.MaterialRadio.uncheck();
            };

            function _getEdit(userData) {
                angular.element(document.getElementById('name')).parent().addClass('is-dirty is-focused');
                angular.element(document.getElementById('name')).parent().removeClass('is-invalid');

                angular.element(document.getElementById('email')).parent().addClass('is-dirty is-focused');
                angular.element(document.getElementById('email')).parent().removeClass('is-invalid');

                angular.element(document.getElementById('ramal')).parent().addClass('is-dirty is-focused');
                angular.element(document.getElementById('ramal')).parent().removeClass('is-invalid');

                angular.element(document.getElementById('password')).parent().addClass('is-dirty is-focused');
                angular.element(document.getElementById('password')).parent().removeClass('is-invalid');

                document.getElementById('' + userData.perfil + '').parentNode.MaterialRadio.check();
                document.getElementById('' + userData.status + '').parentNode.MaterialRadio.check();
            }
            ;


        });