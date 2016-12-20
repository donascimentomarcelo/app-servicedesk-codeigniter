

        
        angular.module('software').factory('softwareInterceptor', function(){
            return{
                cleanInputSoftware : _cleanInputSoftware,
                
                fillInputSoftware : _fillInputSoftware
            };
            
            
            function _cleanInputSoftware(){
                angular.element(document.getElementById('nomesoftware')).parent().removeClass('is-focused is-dirty');
                angular.element(document.getElementById('nomesoftware')).parent().addClass('is-invalid');
                
                angular.element(document.getElementById('serialsoftware')).parent().removeClass('is-focused is-dirty');
                angular.element(document.getElementById('serialsoftware')).parent().addClass('is-invalid');
            };
            
            function _fillInputSoftware(){
                angular.element(document.getElementById('nomesoftware')).parent().addClass('is-dirty is-focused');
                angular.element(document.getElementById('nomesoftware')).parent().removeClass('is-invalid');

                angular.element(document.getElementById('serialsoftware')).parent().addClass('is-dirty is-focused');
                angular.element(document.getElementById('serialsoftware')).parent().removeClass('is-invalid');
            };
            
        });