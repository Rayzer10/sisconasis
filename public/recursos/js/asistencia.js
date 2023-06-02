function cedula(data){
    $.post('/'+url[1]+'/asistencias/asisinfo', { cedula: data.value }, function(d){
        let content
        let horario
        let text
        resp = JSON.parse(d)
        const basis = document.querySelector('.body-asis')
        const iasis = document.querySelector('.info-asis')
        if(resp.items[0]!=null){
            console.log(resp.items[0])
            if(resp.items[0].count == 0){
                horario = resp.items[0].horario_entrada
                text = 'Entrada'
            }else{
                horario = resp.items[0].horario_salida
                text = 'Salida'
            }
            content = `
                <div class="col-lg-6 col-sm-12">
                    <b>Cédula:</b> ${resp.items[0].ci}
                </div>
                <div class="col-lg-6 col-sm-12">
                    <b>Horario de ${text.toLocaleLowerCase()}:</b> ${horario.substr(0, 5)}
                    <input type="hidden" name="hora" value="${horario}">
                </div>
                `
                basis.style.display = 'block';
                document.querySelector('.btn-block').style.display = "block"
                document.querySelector('.btn-block').innerHTML = `<i class="fa-solid fa-check"></i> Marcar ${text}`
                iasis.innerHTML = content
        }
        else{
            basis.style.display = 'block';
            iasis.innerHTML = '<div class="col-sm-12">No tiene un horario asignado para este día</div>'
            document.querySelector('.btn-block').style.display = "none"
        }
    })
}

    const fec = document.querySelector('.fecha')
    function fecha(){
        $.get('/' + url[1] + '/asistencias/fechas').done(function(resp) {
            data = JSON.parse(resp)
            let fech = ''
            if(data.error != false){
                fec.min = data.items[0].fecha_min
                fec.max = data.items[0].fecha_max
                fec.value = data.items[0].fecha_max
                filtro(data.items[0].fecha_max)
                fech = data.items[0].fecha_max
                splitf = fech.split('-')
                
                // Obtener los componentes de la fecha
                const anio = parseInt(splitf[0]);
                const mes = parseInt(splitf[1]) - 1; // Restamos 1 al mes para que sea compatible con el índice de meses en JavaScript
                const dia = parseInt(splitf[2]);

                // Nombres de meses capitalizados
                const nombresMeses = [
                    "Enero",
                    "Febrero",
                    "Marzo",
                    "Abril",
                    "Mayo",
                    "Junio",
                    "Julio",
                    "Agosto",
                    "Septiembre",
                    "Octubre",
                    "Noviembre",
                    "Diciembre"
                ];
                
                // Obtener el nombre del mes capitalizado
                const nombreMes = nombresMeses[mes];

                // Construir la cadena de fecha en el formato deseado
                const fechaFormateada = `${dia} de ${nombreMes} del ${anio}`;

                // Mostrar la fecha formateada
                //console.log(fechaFormateada);

                document.querySelector('.fechacomp').innerHTML = fechaFormateada
            }
        })
    }

    fecha()

    function filtro(){
        let content = ''
        let cont = 0;
        $.post('/' + url[1] + '/asistencias/filtro', { fecha: fec.value }, function(r){
            data = JSON.parse(r)
            if(data.error != false){
                data.items.forEach(e =>{
                    cont % 2 == 0 ? paint = 'box-shadow: inset 0 0 0 9999px rgba(0, 0, 0, 0.05)' : paint = ''
                    let entrada = ''; // Inicializar la variable entrada
                    let salida = ''; // Inicializar la variable salida
                    if (e.asistencia == 1) 
                        entrada = '<i class="fa-solid fa-check"></i>'
                    else if (e.asistencia == 2) {
                        entrada = '<i class="fa-solid fa-check"></i>'
                        salida = '<i class="fa-solid fa-check"></i>'
                      }
                    content += `
                        <tr>
                            <td style="${paint}">${e.cedula}</td>
                            <td style="${paint}">${e.nombre} ${e.apellido}</td>
                            <td style="${paint}">${entrada}</td>
                            <td style="${paint}">${salida}</td> 
                        </tr>
                    `
                    cont++
                })
                document.querySelector('.result').innerHTML = content
            }else{
                document.querySelector('.result').innerHTML = "<td style='box-shadow: inset 0 0 0 9999px rgba(0, 0, 0, 0.05)' colspan='4'>NINGÚN DATO DISPONIBLE EN ESTA TABLA</td>"
            }
        })
    }


  