
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
   section.classList.remove("hams");
   carga(0);
   json.map(j => {
      section.innerHTML += j.idTipo == "1" ? comp.componenteHouse(j) : comp.componenteRest(j);
   })
   // carga(0);
   // section.innerHTML=c;
}
const traer = async (v) => {
   carga(1)
   const d = new FormData();
   d.append("cat", v || 0)
   await fetch(`./php/get.php${window.location.search}`, {
      method: "POST",
      body: d
   }).then(r => r.text())
      //  }).then(r => r.json())
      .then(res => {
         console.log(res);
         try {
            agregar(JSON.parse(res))
         } catch (error) {
            console.log(error);
            console.log(res);
         }
      })
      .catch(e => console.log(e))
}
traer();
document.querySelector(".tipos").addEventListener("click", e => {
   const tar = e.target
   if (tar.tagName != "SPAN") {
      return;
   }
   tar.parentNode.querySelector(".act").classList.remove("act");
   tar.classList.add("act")
   traer(e.target.dataset.i)
   // console.log(e.target.dataset.i);
   // let pa = tar.tagName!="SPAN" ? (tar.tagName=="P" || tar.tagName=="B" ? tar.parentNode : ()) : tar;
})