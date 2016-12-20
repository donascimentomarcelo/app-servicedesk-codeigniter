

        
        angular.module('software').factory('softwareInterceptor', function(){
            return{
                cleanInputSoftware : _cleanInputSoftware,
                
                fillInputSoftware : _fillInputSoftware
            };
            
            
            function _cleanInputSoftware(){
                angular.element(document.getElementById('nameHardware')).parent().removeClass('is-focused is-dirty');
                angular.element(document.getElementById('nameHardware')).parent().addClass('is-invalid');
                
                angular.element(document.getElementById('modelHardware')).parent().removeClass('is-focused is-dirty');
                angular.element(document.getElementById('modelHardware')).parent().addClass('is-invalid');
            };
            
            function _fillInputSoftware(){
                angular.element(document.getElementById('nameHardware')).parent().addClass('is-dirty is-focused');
                angular.element(document.getElementById('nameHardware')).parent().removeClass('is-invalid');

                angular.element(document.getElementById('modelHardware')).parent().addClass('is-dirty is-focused');
                angular.element(document.getElementById('modelHardware')).parent().removeClass('is-invalid');
            };
            
        });