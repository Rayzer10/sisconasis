const picker1 = document.querySelector('.timepicker1');
const tpFormat1 = new mdb.Timepicker(picker1, { format24: true });

const picker2 = document.querySelector('.timepicker2');
const tpFormat2 = new mdb.Timepicker(picker2, { format24: true });

/* ########################################################################### */

const addho = document.querySelector(".agregar_horarios")

if(addho!= null){

    addho.disabled = true

    addho.addEventListener('click', (event) =>{
        event.preventDefault()
        alertify.confirm('<b>SISCONASIS</b>', '<center>¿Esta seguro que desea asignar este horario al docente?</center>', function(){ 
            alertify.alert("<b>SISCONASIS</b>", "<center>Horario asignado exitosamente</center>", function(){ form.submit() })
        }, function(){}).set('labels', {ok:'Ok', cancel:'cancelar'});
    })

}

function horarios_vali(){
    let data = []
    const select = document.querySelectorAll("select")
    select.forEach(sele =>{
        sele.value == "" ? data.push(null) : data.push(sele.value)
    })

    if(data.includes(null))
        addho.disabled = true
    else
        addho.disabled = false
}

/* ########################################################################### */


/* if(editho!= null){

    function horarios_valie(){
        let data = []
        const select = document.querySelectorAll("select")
        select.forEach(sele =>{
            sele.value == "" ? data.push(null) : data.push(sele.value)
        })

        if(data.includes(null))
            editho.disabled = true
        else
            editho.disabled = false
    }

} */

const editho = document.querySelector(".editar_horarios")

editho.addEventListener('click', (event) =>{
    event.preventDefault()
    alertify.confirm('<b>SISCONASIS</b>', '<center>¿Esta seguro que desea modificar el horario del docente?</center>', function(){ 
        alertify.alert("<b>SISCONASIS</b>", "<center>Horario modificado exitosamente</center>", function(){ form.submit() })
    }, function(){}).set('labels', {ok:'Ok', cancel:'cancelar'});
})

function obt_anio(){
    const ci = document.querySelector("[name=ci_personal]").value
    let datos = []
    let options = ""
    $.post('/'+url[1]+'/horarios/anios_ci', {ci: ci}, function(data){
        const resp = JSON.parse(data);
        if(JSON.stringify(resp).length == 0){
            sections.innerHTML = '<option value="">Sin resultados</option>'
        }
        else{
            datos.push(['<option value="" disabled selected>Seleccione</option>'])
            resp.forEach(e => {
                options = `
                        <option value=${e.id_pba}>${e.anios.toUpperCase()}</option>
                    `
                datos.push(options)
            })
            document.querySelector("[name=anios]").innerHTML = datos
        }
    })
}

/* ########################################################################### */

function obt_dias(){
    const anio = document.querySelector("[name=anios]").value
    const ci = document.querySelector("[name=ci_personal]").value
    let datos = []
    let options = ""
    $.post('/'+url[1]+'/horarios/anio_dias', {ci: ci, id: anio}, function(data){
        const resp = JSON.parse(data);
        if(JSON.stringify(resp).length == 0){
            sections.innerHTML = '<option value="">Sin resultados</option>'
        }else{
            datos.push(['<option value="" disabled selected>Seleccione</option>'])
            resp.forEach(e => {
                options = `
                        <option value=${e.id}>${e.dias.toUpperCase()}</option>
                    `
                datos.push(options)
            })
            document.querySelector("[name=dias]").innerHTML = datos
        }
    })
}

/* ########################################################################### */

function filtro_result(){
    const anio = document.querySelector("[name=anios]").value
    const ci = document.querySelector("[name=ci_personal]").value
    const dia = document.querySelector("[name=dias]").value
    $.post('/'+url[1]+'/horarios/listahorario', {ci: ci, id: anio, dia: dia}, function(data){
        document.querySelector(".listahorarios").innerHTML = data
    })
}