const carga = (b) => {
   if (b == 0) {
      document.querySelector(".contenido section").innerHTML = ""
      return;
   }
   let c = "";
   for (let i = 0; i < 10; i++) {
      c += comp.componenteCarga();
   }
   document.querySelector(".contenido section").innerHTML = c
}
const agregar = (json) => {
   const section = document.querySelector(".contenido section");
   if (json[0].e == '0') {
      section.classList.add("hams");
      section.innerHTML = comp.componeneteVacio()
      return;
   }
   else if (json[0].e == '1') {
      section.classList.add("hams");
      section.innerHTML = comp.componeneteError()
      return;
   }
   section.classList.remove("hams");
   carga(0);
   json.map(j => {
      section.innerHTML += j.idTipo == "1" ? comp.componenteHouse(j) : comp.componenteRest(j);
   })
}
const traer = {
   index: async (v) => {
      carga(1)
      await peticion(ruta.get,
         [{ n: "cat", v: (v || 0) }],
         (res) => { agregar(res) }
      );
   },
   buscar: async () => {
      carga(1)
      try {
         let search = window.location.search.replace("?", "").split("&");

         if(search[0].includes("0") && search[1].includes("0")) window.location.href=ruta.origen;

         const p = document.querySelector(".cont-busqueda p").children
         const opt = (id, s, i) => {
            let se = s[i].split('=')[1]
            se = se=="0" ? "---" : se;
            try {
               return document.querySelector(`#${id} option[value="${se}"]`).textContent
            } catch (error) {
               return "---"
            }
         }

         p[0].innerHTML = opt("loc", search, 0)
         p[1].innerHTML = opt("tip", search, 1)

         await peticion(`${ruta.buscar}${window.location.search}`,
            [{ n: "type", v: "buscar" }], (res) => { console.log(res); agregar(res) });
      } catch (error) {
         window.location.href=ruta.origen
         console.log(error);
      }

   },
   url: () => {
   }
}