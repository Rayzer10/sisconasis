const btn_agregar = document.querySelector(".agregar");

if(btn_agregar != null){
  const allinputs = ['rol','username','password','rpassword'] 
  allinputs.forEach(e =>{
    document.querySelector("[name="+e+"]").disabled = true
  })
  btn_agregar.disabled = true
}

function cedula(){
  const allinputs = ['rol','username','password','rpassword'] 
  allinputs.forEach(e =>{
    document.querySelector("[name="+e+"]").disabled = false
  })
}

function verify_user() {
    const hasDupli = array => new Set(array).size < array.length
    let validar_clave = []
    let array_input = []
    let inputs = document.querySelectorAll("input")
    inputs.forEach(e => {
      if(e.name=="password" || e.name=="rpassword")
        validar_clave.push(e.value)
      e.value === "" ? v = null : v = e.value
      array_input.push(v)
    })

    const alfanum = /^(?=.*\d)(?=.*[\u002e\u002d\u0040\u0024\u002a\u0023])(?=.*[a-z]).*[A-Z]\S{7,20}$/;

    if(alfanum.test(validar_clave[0]) || validar_clave[0] === "")
      document.querySelector(".msg_password").innerHTML = ""
    else
      document.querySelector(".msg_password").innerHTML = "La contraseña debe de ser <a href='#' onclick='helpau()'>alfanumérica</a>"

    if(hasDupli(validar_clave) || validar_clave[1] === "")
      document.querySelector(".msg_rpassword").innerHTML = ""
    else
      document.querySelector(".msg_rpassword").innerHTML = "La contraseña no coinciden"

    if(array_input.includes(null)){
      document.querySelector(".msg_campos").classList.add("mb-4")
      document.querySelector(".msg_campos").innerHTML = "No pueden haber campos vacíos"
    }else{
      document.querySelector(".msg_campos").classList.remove("mb-4")
      document.querySelector(".msg_campos").innerHTML = ""
    }

    unique({valor: array_input[1], campo: 'username'}, function(resp){
      if(array_input.includes(null) || !hasDupli(validar_clave) || resp == true)
          btn_agregar.disabled = true
      else 
        btn_agregar.disabled = false
    })
 }

/* ########################################################################################## */

const btn_editar = document.querySelector(".actualizar");

if(btn_editar != null)
btn_editar.disabled = true

function verify_usere() {
    const hasDupli = array => new Set(array).size < array.length
    let validar_clave = []
    let array_input = []
    let inputs = document.querySelectorAll("input")
    inputs.forEach(e => {
      if(e.name=="password" || e.name=="rpassword"){
        e.value === "" ? claves = null : claves = e.value 
        validar_clave.push(claves)
      }else{
        e.value === "" ? v = null : v = e.value
        array_input.push(v)
      }
    })
    /* console.log(array_input)
    console.log("#################")
    console.log(validar_clave) */

    const alfanum = /^(?=.*\d)(?=.*[\u002e\u002d\u0040\u0024\u002a\u0023])(?=.*[a-z]).*[A-Z]\S{7,20}$/;
    
    if(alfanum.test(validar_clave[0]) || validar_clave[0] === null)
      document.querySelector(".msg_password").innerHTML = ""
    else
      document.querySelector(".msg_password").innerHTML = "La contraseña debe de ser <a href='#' onclick='helpau()'>alfanumérica</a>"

    if(hasDupli(validar_clave) || validar_clave[1] === null)
      document.querySelector(".msg_rpassword").innerHTML = ""
    else
      document.querySelector(".msg_rpassword").innerHTML = "La contraseña no coinciden"

    if(array_input.includes(null) || (validar_clave[0]!=null && validar_clave[1]==null)){
      document.querySelector(".msg_campos").classList.add("mb-4")
      document.querySelector(".msg_campos").innerHTML = "No pueden haber campos vacíos"
    }else{
      document.querySelector(".msg_campos").classList.remove("mb-4")
      document.querySelector(".msg_campos").innerHTML = ""
    }

    if(array_input.includes(null) || (validar_clave[0]!==null && !alfanum.test(validar_clave[0])) || (validar_clave[0]!==null && !hasDupli(validar_clave)) || ((validar_clave.includes(null) && validar_clave[0]==null) && validar_clave[1]!=null))
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
      const estado = document.querySelector("[name=cod_registro]").value
      const ci = document.querySelector("[name=cedula]").value
      if(estado == 0){
        pregunta = "activar"
        respuesta = "Activado"
    }
    else{
        pregunta = "inhabilitar"
        respuesta = "Inhabilitado"
    }
      alertify.confirm("<b>SISCONASIS</b>", "<center>¿Esta seguro que desea "+pregunta+" este usuario?</center>", function(){
        $.ajax({
          url:'/'+url[1]+'/usuarios/estado',
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