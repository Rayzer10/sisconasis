const options = { timeZone: 'America/Caracas', year: 'numeric', month: 'numeric', day: 'numeric' };
const fecha = new Date().toLocaleDateString('es-VE', options);

const dia = new Date().getDate();
const mes = new Date().getMonth() + 1; // Sumamos 1 porque getMonth() devuelve un número entre 0 y 11
const anio = new Date().getFullYear();

const finicio = document.querySelector(".datepicker-inicio input")
const dini = finicio.defaultValue.split("-")

const fcierre = document.querySelector(".datepicker-cierre input")
const dcie = fcierre.defaultValue.split("-")

var datepickerTranslated = document.querySelector('.datepicker-inicio');
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
      min: new Date(anio - 1, 8, dini[2]),
      max: new Date(anio, 11, dini[2]),
  });

  var datepickerTranslated = document.querySelector('.datepicker-cierre');
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
      min: new Date(anio, 0, dcie[2]),
      max: new Date(anio + 1, 7, dcie[2]),
  });

  /* ########################################################################### */

  const boton = document.querySelector(".actualizar")
  const check = document.querySelector("[name=check]")
  boton.disabled = true

  check.addEventListener("change", (e) =>{
    if(e.target.checked == true)
      boton.disabled = false
    else
      boton.disabled = true
  })
