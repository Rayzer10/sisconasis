const check = document.querySelectorAll("[type=checkbox]")
if(check!=null){
  check.forEach(e => {
    e.addEventListener("change", (element) => {
      let v
      let valor = element.target.value.split("/")
      valor[1] == 1 ? v = 0 : v = 1
      let data = {"id": valor[0]}
      data[element.target.name] = v;
      console.log(data)
      $.ajax({
        url: '/'+url[1]+'/'+url[2]+"/actualizar",
        type: "POST",
        data: (data),
        success:function(resp){
          if(resp.trim() == "true")
            window.location.reload()
          else
            alertify.alert("<b>SISCONASIS</b>", "<center>A ocurrido un error</center>")
        }
      })
    })
  })
}
