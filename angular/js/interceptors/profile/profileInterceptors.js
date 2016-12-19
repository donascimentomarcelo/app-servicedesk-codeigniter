

        
        angular.module('profile').factory('profileInterceptors', function () {

            return{
               getLoadProfile : _getLoadProfile
            };

            function _getLoadProfile() {
                
                angular.element(document.getElementById('name')).parent().addClass('is-dirty is-focused');
                angular.element(document.getElementById('name')).parent().removeClass('is-invalid');
                
                angular.element(document.getElementById('email')).parent().addClass('is-dirty is-focused');
                angular.element(document.getElementById('email')).parent().removeClass('is-invalid');
                
                angular.element(document.getElementById('ramal')).parent().addClass('is-dirty is-focused');
                angular.element(document.getElementById('ramal')).parent().removeClass('is-invalid');
                
                angular.element(document.getElementById('password')).parent().addClass('is-dirty is-focused');
                angular.element(document.getElementById('password')).parent().removeClass('is-invalid');
            };

        });