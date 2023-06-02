const options = { timeZone: 'America/Caracas', year: 'numeric', month: 'numeric', day: 'numeric' };
const fecha = new Date().toLocaleDateString('es-VE', options);

const dia = new Date().getDate();
const mes = new Date().getMonth() + 1; // Sumamos 1 porque getMonth() devuelve un número entre 0 y 11
const anio = new Date().getFullYear();

/* const finicio = document.querySelector(".datepicker-inicio input")
const dini = finicio.defaultValue.split("-")

const fcierre = document.querySelector(".datepicker-fin input")
const dcie = fcierre.defaultValue.split("-") */

var datepickerTranslated = document.querySelector('.datepicker-inicio');
if(datepickerTranslated != null){
  new mdb.Datepicker(datepickerTranslated, {
      title: "Seleccione la Fecha",
      monthsFull: [
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
      "Diciembre",
      ],
      monthsShort: [
      "Ene",
      "Feb",
      "Mar",
      "Abr",
      "May",
      "Jun",
      "Jul",
      "Ago",
      "Sep",
      "Oct",
      "Nov",
      "Dic",
      ],
      weekdaysFull: [
      "Domingo",
      "Lunes",
      "Martes",
      "Miércoles",
      "Jueves",
      "Viernes",
      "Sábado",
      ],
      weekdaysShort: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
      weekdaysNarrow: ["D", "L", "M", "M", "J", "V", "S"],
      okBtnText: "Ok",
      clearBtnText: "Limpiar",
      cancelBtnText: "Cancelar",
      min: new Date(anio - 2, 8, 1),
      max: new Date(anio, 11, 31),
  });

  var datepickerTranslated = document.querySelector('.datepicker-fin');
  new mdb.Datepicker(datepickerTranslated, {
      title: "Seleccione la Fecha",
      monthsFull: [
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
      "Diciembre",
      ],
      monthsShort: [
      "Ene",
      "Feb",
      "Mar",
      "Abr",
      "May",
      "Jun",
      "Jul",
      "Ago",
      "Sep",
      "Oct",
      "Nov",
      "Dic",
      ],
      weekdaysFull: [
      "Domingo",
      "Lunes",
      "Martes",
      "Miércoles",
      "Jueves",
      "Viernes",
      "Sábado",
      ],
      weekdaysShort: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
      weekdaysNarrow: ["D", "L", "M", "M", "J", "V", "S"],
      okBtnText: "Ok",
      clearBtnText: "Limpiar",
      cancelBtnText: "Cancelar",
      min: new Date(anio, 0, 1),
      max: new Date(anio + 2, 7, 31),
  });
}


/* ############################################################################################# */

const add = document.querySelector(".agregar")
if(add!=null)
    add.disabled = true

function vpermiso(){
    let valor = [];
    const input = document.querySelectorAll("input")
    const textarea = document.querySelectorAll("textarea")
    const select = document.querySelectorAll("select")

    select.forEach(e =>{
        if(e.classList.contains('select-input') == false){
            e.value!="" ? valor.push(e.value) : valor.push(null)
        }
    })

    input.forEach(e =>{
        if(e.classList.contains('select-input') == false){
            e.value!="" ? valor.push(e.value) : valor.push(null)
        }
    })

    textarea.forEach(e =>{
        if(e.classList.contains('select-input') == false){
            e.value!="" ? valor.push(e.value) : valor.push(null)
        }
    })

    if(valor.length == 5)
        valor = valor.filter((element) => element !== null);
        
    console.log(valor)

    if(valor.includes(null))
        add.disabled = true
    else
        add.disabled = false
}


/* ############################################################################################# */

function filtro(){
    let fil = document.querySelector('[name=filtro]').value
    $.post('/'+url[1]+'/permisos/filtro', { filtro: fil }, function(data){
        let content = ''
        let estado 
        let cont = 0;
        result = JSON.parse(data)
        console.log(result.error)
        if(result.error!=false){
            result.items.forEach(e =>{
                cont % 2 == 0 ? paint = 'box-shadow: inset 0 0 0 9999px rgba(0, 0, 0, 0.05)' : paint = ''
                e.estado == 1 ? estado = '<div class="text-success d-inline">Vigente</div>' : estado = '<div class="text-danger d-inline">Vencido</div>'
                content += `
                <tr>
                    <td style="${paint}">${e.ci}</td>
                    <td style="${paint}">${e.nombre} ${e.apellido}</td>
                    <td style="${paint}">${e.inicio}</td>
                    <td style="${paint}">${e.fin}</td>
                    <td style="${paint}">
                        <a href="#" data-mdb-toggle="modal" data-mdb-target="#staticBackdrop${e.id}" title="Detalles">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                    </td>
                </tr>
                <div class="modal fade" id="staticBackdrop${e.id}" data-mdb-backdrop="static" data-mdb-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel"><b>Más Detalles</b></h5>
                            <button type="button" class="btn-close reloaded" data-mdb-dismiss="modal" aria-label="Close" onclick=""></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <b style="font-weight:bold">Estado del permiso: </b>${estado}
                                </div>
                                <div class="col-12"><b style="font-weight:bold">Motivo:</b></div>
                                <div class="col-12">${e.motivo}</div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger reloaded" data-mdb-dismiss="modal" onclick="">Cerrar</button>
                        </div>
                        </div>
                    </div>
                </div>
                ` 
            })
            document.querySelector('.result').innerHTML = content
        }else{
            document.querySelector('.result').innerHTML = "<td style='box-shadow: inset 0 0 0 9999px rgba(0, 0, 0, 0.05)' colspan='5'>NINGÚN DATO DISPONIBLE EN ESTA TABLA</td>"
        }
    })
}

filtro()