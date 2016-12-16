

angular.module('user').factory('userValidate', function (toastr, userInterceptors) {

            return{
               getValitadeMessage : _getValitadeMessage
            };

            function _getValitadeMessage(data) {
                
                if(data === '1')
                {
                    toastr.success('Operação realizada com sucesso!');
                    userInterceptors.getInsert_or_edit();
                }
                else if(data === '1146')
                {
                    toastr.error('Houve um erro na base de dados!');
                }
                
            };

        });