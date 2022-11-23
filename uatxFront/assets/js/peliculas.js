$(document).ready(function(){

    //alert('se cargo el js');
    Peliculas.listado();

    //https://github.com/enriquecr1990/curso_uatx_1122

});

var Peliculas = {

    listado : function(){
        $.ajax({
            type : 'GET',
            url : 'http://localhost/curso/uatxAPI/rutas.php?controlador=peliculas&funcion=listado',
            data : {},
            dataType : 'json',
            success : function(respuestaAjax){
                //console.log(respuestaAjax);
                if(respuestaAjax.estatus){
                    var html_peliculas = '';
                    respuestaAjax.datos.forEach(function(elemento,indice){
                        //console.log(elemento);
                        html_peliculas += '<tr>' +
                            '<td>'+elemento.id+'</td>' +
                            '<td>'+elemento.titulo+'</td>' +
                            '<td>'+elemento.genero+'</td>' +
                            '<td>'+elemento.director+'</td>' +
                            '<td>'+elemento.sinopsis+'</td>' +
                            '<td>' +
                            '   <button type="button" class="btn btn-sm btn-info">editar</button>' +
                            '   <button type="button" class="btn btn-sm btn-warning">eliminar</button>' +
                            '</td>' +
                            '</tr>'
                    });
                    $('#tbodyResultadoPeliculas').html(html_peliculas);
                }else{
                    alert('hubo un problema');
                }
            },error : function(respuestaAjaxE){

            }
        });
    },
}