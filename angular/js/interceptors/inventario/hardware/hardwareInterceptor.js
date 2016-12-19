

        angular.module('hardware').factory('hardwareInterceptor', function(){
            return {
                cleanInputHardware : _cleanInputHardware,
                
                fillInputHardware: _fillInputHardware
            };
            
            function _cleanInputHardware(){
                
                angular.element(document.getElementById('nameHardware')).parent().removeClass('is-focused is-dirty');
                angular.element(document.getElementById('nameHardware')).parent().addClass('is-invalid');
                
                angular.element(document.getElementById('modelHardware')).parent().removeClass('is-focused is-dirty');
                angular.element(document.getElementById('modelHardware')).parent().addClass('is-invalid');
                
            };
            
            function _fillInputHardware(){
                
                angular.element(document.getElementById('nameHardware')).parent().addClass('is-dirty is-focused');
                angular.element(document.getElementById('nameHardware')).parent().removeClass('is-invalid');

                angular.element(document.getElementById('modelHardware')).parent().addClass('is-dirty is-focused');
                angular.element(document.getElementById('modelHardware')).parent().removeClass('is-invalid');
                
            };
        });