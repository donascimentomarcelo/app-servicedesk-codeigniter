$(function(){

var obj = {
    'row1' : {
        1 : 'input1',
        2 : 'inpu2'
    },
    'row2' : {
        'key3' : 'input3',
        'key4' : 'input4'
    }
};

var buscarvalor = '';

for(var i in obj['row1']){
    buscarvalor += '<td>Mostra o valor que tens: Manuel ' + obj['row1'][i] + '</td>';
}

$('.add-info').html(buscarvalor);

  console.log(obj['row1'].length);


});
