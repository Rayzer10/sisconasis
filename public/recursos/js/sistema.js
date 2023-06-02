
//Alertify theme boostrap

alertify.defaults.transition = "slide";
alertify.defaults.theme.ok = "btn btn-primary";
alertify.defaults.theme.cancel = "btn btn-danger";
alertify.defaults.theme.input = "form-control";

/* ########################################################################################## */

//CONFIGURACION DEL DATATABLE

$(document).ready(function () {
$("#example").DataTable({
    responsive: true,
    lengthMenu: [
    [6, 10, 25, -1],
    [6, 10, 25, "All"],
    ],
    scrollCollapse: true,
    ordering: false,
    info: false,
    dom: "ftipr",
    language: {
    sProcessing: "Procesando...",
    sLengthMenu: "Mostrar _MENU_ registros",
    sZeroRecords: "No se encontraron resultados",
    sEmptyTable: "Ningún dato disponible en esta tabla",
    sInfo:
        "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
    sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
    sInfoPostFix: "",
    sSearch: "Buscar:",
    sUrl: "",
    sInfoThousands: ",",
    sLoadingRecords: "Cargando...",
    oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
    },
    oAria: {
        sSortAscending:
        ": Activar para ordenar la columna de manera ascendente",
        sSortDescending:
        ": Activar para ordenar la columna de manera descendente",
    },
    },
});
})

/* ########################################################################################## */

/* const contenido = window;
contenido.addEventListener("scroll", () => {
    const body_data = document.querySelector(".body_data")
    if (contenido.window.scrollY > 0) {
        body_data.classList.add("padding-bottom");
      } else {
        body_data.classList.remove("padding-bottom");
      }
}); */

/* ########################################################################################## */

let ux = window.location.pathname
let url = ux.split("/")

/* ########################################################################################## */

const menu = document.querySelectorAll(".menu > ul > li")
menu.forEach(elemt => {
    if(elemt.dataset.name != undefined){
        if(url[2] == elemt.dataset.name)
            elemt.classList.add("active")
        else if((url[2] == "pescolar" || url[2] == "secciones") && elemt.dataset.name == "academico"){
            elemt.classList.add("active")
        }
        else if((url[2] == "asistencias" || url[2] == "permisos" || url[2] == "feriados") && elemt.dataset.name == "asistencias"){
            elemt.classList.add("active")
        }
        else if((url[2] == "horarios") && elemt.dataset.name == "personal"){
            elemt.classList.add("active")
        }
        else if((url[2] == "usuarios" || url[2] == "historial" || url[2] == "roles") && elemt.dataset.name == "configuracion"){
            elemt.classList.add("active")
        }
    }
})

const group = document.querySelectorAll(".btn-group > a")
if(group!=null){
    group.forEach(e =>{
        if(url[2] == e.dataset.value)
            e.classList.add("not-active")
    })
}

/* ########################################################################################## */

const form = document.querySelector(".form")
const agregar = document.querySelector(".agregar")
if(agregar != null){
    agregar.addEventListener("click", (event) =>{
        let valor = {}

        const inputs = document.querySelectorAll('input');
        const selects = document.querySelectorAll('select');
        const textarea = document.querySelectorAll('textarea');
        const multiselects = document.querySelectorAll('.secciones');

        selects.forEach(e => {
            if(e.value!="")
                valor[e.name] = e.value
        })
        
        inputs.forEach(e =>{
            if(e.classList.contains('select-input') == false){
                if(e.value!="")
                    valor[e.name] = e.value
            }
    
        })

        if(textarea!=null){
            textarea.forEach(e => {
                if(e.value!="")
                    valor[e.name] = e.value
            })
        }

        if(multiselects!=null){
            multiselects.forEach(select => {
                const selectedOptions = Array.from(select.selectedOptions).map(option => option.value);
                valor[select.name] = selectedOptions
            });
        }
        console.log(valor)
        event.preventDefault()
        url[2] == 'asistencias' ? mensaje = 'Desea marcar esta asistencias' : mensaje = 'Desea guardar esta información'
        alertify.confirm('<b>SISCONASIS</b>', '<center>¿'+ mensaje +'?</center>', function(){ 
            /* form.submit() */
            $.post('/'+url[1]+'/'+url[2]+'/agregar', valor , function(resp){
                alertify.alert("<b>SISCONASIS</b>", "<center>"+resp+"</center>", function(){
                    window.location.reload();
                })
            })
        }, function(){}).set('labels', {ok:'Ok', cancel:'cancelar'});
    })
}

/* ########################################################################################## */

const actualizar = document.querySelector(".actualizar")
if(actualizar != null){
    actualizar.addEventListener("click", (event) =>{
        let valor = {}

        const inputs = document.querySelectorAll('input');
        const selects = document.querySelectorAll('select');
    
        selects.forEach(e => {
            if(e.value!="")
                valor[e.name] = e.value
        })
        
        inputs.forEach(e =>{
            if(e.classList.contains('select-input') == false){
                if(e.value!="")
                    valor[e.name] = e.value
            }
    
        })
        console.log(valor)
        event.preventDefault()
        alertify.confirm('<b>SISCONASIS</b>', '<center>¿Esta seguro que desea sobrescribir esta información?</center>', function(){ 
            $.post('/'+url[1]+'/'+url[2]+'/actualizar', valor , function(resp){
                alertify.alert("<b>SISCONASIS</b>", "<center>"+resp+"</center>", function(){
                    window.location.reload();
                })
            })
        }, function(){}).set('labels', {ok:'Ok', cancel:'cancelar'});
    })
}

/* ########################################################################################## */

function unique(data, callback) {
    let table 
    $.post('/'+url[1]+'/system/unique', { dato: data.valor, tabla: url[2], campo: data.campo }, function(r){
        data = JSON.parse(r)
        data.verify == true ? document.querySelector('.'+url[2]+'-unique').innerHTML = "Ya existe en la base de datos" : document.querySelector('.'+url[2]+'-unique').innerHTML = ""
        callback(data.verify)
    })

}