 const btn_agregar = document.querySelector(".agregar");

if(btn_agregar != null){
    btn_agregar.disabled = true

    const selects = document.querySelectorAll("select")
    let select_a_escolar_changed = false;
    let select_secciones_changed = false;

    selects.forEach(e =>{
        e.addEventListener("change", (element) =>{
            if(element.target.name === "aescolar")
                select_a_escolar_changed = true;
            else if(element.target.name === "secciones")
                select_secciones_changed = true;
              
            if(select_a_escolar_changed && select_secciones_changed) {
                btn_agregar.disabled = false;
            }
        })
    })
  }

/* ########################################################################### */

const aescolar = document.querySelector("[name=aescolar]")
if(aescolar!=null){
    aescolar.addEventListener("change", () =>{
        const secciones = ["A", "B", "C", "D", "E", "F", "G", "H"]
        $.post('/'+url[1]+'/secciones/disposecciones', { id: aescolar.value }, function(data){
            const select =  document.querySelector("[name=secciones]")
            resp = JSON.parse(data)
            select.innerHTML = secciones.reduce((html, seccion) => {
                const seccionEnResp = resp.find(s => s.nombre === seccion)
                if (seccionEnResp) {
                    return html + `<option value="${seccion}" disabled>${seccion}</option>`
                } else {
                    return html + `<option value="${seccion}">${seccion}</option>`
                }
            }, '')
        })
    })
}


/* ########################################################################### */

  function eliminar(event){
    event.preventDefault()
    href = event.target.href.split("/")
    let id = {'id': href[4]}
    alertify.confirm("<b>SISCONASIS</b>", "<center>¿Esta seguro que desea eliminar esta sección?</center>", function(){
        $.ajax({
          url:'/'+url[1]+'/secciones/eliminar',
          type:"POST",
          data: (id),
          success:function(resp){
              if(resp == "true")
                alertify.alert("<b>SISCONASIS</b>", "<center>Eliminada con éxito</center>", function(){
                    window.location.reload()
                })
          } 
        })
      }, function(){}).set('labels', {ok:'Ok', cancel:'cancelar'})
  }

