const btn_agregar = document.querySelector(".agregar");

if(btn_agregar != null)
  btn_agregar.disabled = true

function verify_perso() {
    const email = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
    let correo
    let ci
    let array_input = []
    let inputs = document.querySelectorAll("input")
    inputs.forEach(e => {
        if(e.name == "correo")
          correo = e.value
        if(e.name == "ci")
          ci = e.value
        e.value === "" ? v = null : v = e.value
        array_input.push(v)
    })

    if(email.test(correo) || correo === "")
      document.querySelector(".msg_email").innerHTML = ""
    else
      document.querySelector(".msg_email").innerHTML = "El correo tiene un formato no valido"

    //console.log(array_input)
    /*
    if(hasDupli(validar_clave) || validar_clave[1] === "")
      document.querySelector(".msg_rpassword").innerHTML = ""
    else
      document.querySelector(".msg_rpassword").innerHTML = "La contraseña no coinciden"
 */
    if(array_input.includes(null)){
      document.querySelector(".msg_campos").classList.add("mb-4")
      document.querySelector(".msg_campos").innerHTML = "No pueden haber campos vacíos"
    }else{
      document.querySelector(".msg_campos").classList.remove("mb-4")
      document.querySelector(".msg_campos").innerHTML = ""
    }

    unique({valor: array_input[2], campo: 'ci'}, function(resp){
      if(array_input.includes(null) || !email.test(correo) || ci.length<7 || resp == true)
        btn_agregar.disabled = true
      else 
        btn_agregar.disabled = false
    })
    
 }

/* ########################################################################################## */

const btn_editar = document.querySelector(".actualizar");

if(btn_editar != null)
btn_editar.disabled = true

function verify_persoe() {
    const email = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
    let correo
    let ci
    let array_input = []
    let inputs = document.querySelectorAll("input")
    inputs.forEach(e => {
      if(e.name == "correo")
        correo = e.value
      if(e.name == "ci")
        ci = e.value
      e.value === "" ? v = null : v = e.value
      array_input.push(v)
    })
    /* console.log(array_input)
    console.log("#################")
    console.log(validar_clave) */

    if(email.test(correo) || correo === "")
      document.querySelector(".msg_email").innerHTML = ""
    else
      document.querySelector(".msg_email").innerHTML = "El correo tiene un formato no valido"

    if(array_input.includes(null)){
      document.querySelector(".msg_campos").classList.add("mb-4")
      document.querySelector(".msg_campos").innerHTML = "No pueden haber campos vacíos"
    }else{
      document.querySelector(".msg_campos").classList.remove("mb-4")
      document.querySelector(".msg_campos").innerHTML = ""
    }

    if(array_input.includes(null) || !email.test(correo) || ci.length<7)
      btn_editar.disabled = true
    else 
      btn_editar.disabled = false
 }

/* ########################################################################################## */

const boton = document.querySelector(".btn-estado")

if(boton != null){
  boton.addEventListener("click", () =>{
      let pregunta
      let respuesta
      const estado = document.querySelector("[name=cod_resistro]").value
      const ci = document.querySelector("[name=cedula]").value
      if(estado == 0){
        pregunta = "activar"
        respuesta = "Activado"
    }
    else{
        pregunta = "inhabilitar"
        respuesta = "Inhabilitado"
    }
      alertify.confirm("<b>SISCONASIS</b>", "<center>¿Esta seguro que desea "+pregunta+" a esta persona?</center>", function(){
        $.ajax({
          url:'/'+url[1]+'/personal/estado',
          type:"POST",
          data: ("estado="+estado+"&ci="+ci),
          success:function(resp){
              if(resp == "true")
                alertify.alert("<b>SISCONASIS</b>", "<center>"+respuesta+" con existo</center>", function(){
                    window.location.reload()
                })
          } 
        })
      }, function(){}).set('labels', {ok:'Ok', cancel:'cancelar'})
  })
}