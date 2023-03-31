document.querySelector("select").addEventListener("change", e => {
   const val = e.target.value
   window.location.href = `${window.location.origin}${window.location.pathname}?t=${val}`
})
const resUser = document.querySelector(".reser-user")
resUser.addEventListener("click", e => {
   if (e.target.classList.contains("reser-user") || (e.target.tagName == "BUTTON" && e.target.dataset.t == "cerrar")) {
      resUser.classList.toggle("act")
   }
})
const activarCarga =(b)=>{
   const cl =document.querySelector(".cont-load").classList;
   if(b==1) cl.add("act");
   else cl.remove("act");
}
document.querySelector(".tabla").addEventListener("click", e => {
   const t = e.target;
   if (t.tagName == "SPAN") {
      if(t.dataset.type != "info") activarCarga(1);

      const tp = t.dataset.type;
      let obj = []
      if (tp == "acept") {
         if (!window.confirm("¿Esta segur@ de aceptar el elemento?")) {
            return activarCarga(0);
         }
      }
      if (tp == "user") {
         alert("Redireeccionando")
      }
      if (tp == "pagar") {
         const prom = window.prompt("Escriba la cantidad que va a pagar")
         if (prom.length == 0 || !/\d{1,6}$/.test(prom)) {
            activarCarga();
            return alert("Escriba un numero valido")
         }
         obj.push({
            n: "pago",
            v: prom
         });
      }
      if (tp == "cancel") {
         if (!window.confirm("¿Esta segur@ de aceptar el elemento?")) {
            return activarCarga();
         }
      }
      if (tp == "trash") {
         if (!window.confirm("¿Esta segur@ de eliminar el elemento?")) {
            return activarCarga();
         }
      }
      if (tp == "info") {
         const resUserSec = resUser.querySelector("section");

         const ds = t.dataset;
         resUserSec.innerHTML = comp.reserv({
            nombre: ds.name,
            ape: ds.apellidos,
            reser: ds.fecha,
            tel: ds.phone,
            mail: ds.mail,
            llegada: ds.llegada,
            salida: ds.salida,
            whats: ds.whatsapp,
         })
         document.querySelector(".reser-user").classList.toggle("act");
         
         document.getElementById("update").addEventListener("submit",async e =>{
            activarCarga(1);
            e.preventDefault();
            const exp = { date: /^202\d{1}-\d{2}-\d{2}$/ };

            if(!exp.date.test(e.target[0].value)) e.target[0].focus()
            if(!exp.date.test(e.target[1].value)) e.target[1].focus()

            await peticion(
               rutas.reservaciones,
               [{
                  n: "ide",
                  v: t.parentNode.dataset.reser
               },{
                  n: "type",
                  v: "update"
               },{
                  n: "llegada",
                  v: e.target[0].value
               },{
                  n: "salida",
                  v: e.target[1].value
               }],
               (res) => {
                  console.log(res)
                  window.location.href = `${window.location.origin}${window.location.pathname}`
               },
               1
            )
            
            activarCarga()
         })
         return;
      }

      obj.push({
         n: "type",
         v: tp
      }, {
         n: "ide",
         v: t.parentNode.dataset.reser
      })
      console.log(obj);
      peticion(
         rutas.reservaciones,
         obj,
         (res) => {
            console.log(res);
            window.location.href = `${window.location.origin}${window.location.pathname}`
         },
         1
      )
   }
})