


                angular.module('hardware').factory('hardwareValidate', function(hardwareInterceptor, toastr){
                    
                    return {
                        
                        messageHardware : _messageHardware
                        
                    };
                    
                    function _messageHardware(data)
                    {
                        
                        if(data === '1')
                        {
                         toastr.success('Operação realizada com sucesso!');
                         hardwareInterceptor.cleanInputHardware();
                        }
                        
                        
                    };
                    
                });