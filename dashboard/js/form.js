const fet = async (url,obj,funcion) => {
   let data = new FormData();

   obj.map(o =>{
      data.append(o.n,o.v)
   })

   await fetch(url, {
      method: "POST",
      body: data,
   }) .then(r => r.text())
      .then(res => {
         console.log(res);
         if(res.split("|")[0]=='1'){
            funcion(res)
         }
      })
      .catch(e => console.log(e))
}
// let obj = [] 
// fet("./php/recibir.php",obj);

window.addEventListener("submit", e =>{
   e.preventDefault();
   let obj = [] 
   const tar = e.target;
   console.log(tar);
   obj.push(tar.dataset.t=='h' ? "house" : 'restaurante')
   obj.push(
      { n:'nombre',v: tar[1].value},
      { n:'tipo',v: tar[2].value}
   )
   const sectList = document.querySelector(".sect-list")
   if(tar.dataset.t=='h'){
      let servicios='';
      sectList.childNodes.forEach(s=>servicios+=s.dataset.id+"|")

      obj.push(
         { n:'localidad',v: tar[4].value},
         { n:'referencias',v: tar[5].value},
         { n:'precio',v: tar[6].value},
         { n:'habitaciones',v: tar[7].value},
         { n:'status',v: tar[8].value},
         { n:'estrellas',v: tar[9].value},
         { n:'servicios',v:servicios}
      )
      fet("./php/agregar.php",obj,(res)=>{
         window.location=`./plusAgregar.php?t=${tar.dataset.t}&i=${res.split("|")[1]}&c=t`;
      });
   } else if(tar.dataset.t=='r'){
      let platillos='';
      sectList.childNodes.forEach(s=> platillos+= (s.textContent.replace(" "+s.childNodes[1].textContent,"|")).trim())

      obj.push(
         { n:'localidad',v: tar[4].value},
         { n:'horaO',v: tar[5].value},
         { n:'horaC',v: tar[6].value},
         { n:'serDom',v: tar[7].checked},
         { n:'categoria',v: tar[8].value},
         { n:'refer',v: tar[9].value},
         { n:'platillos',v:platillos}
      )
      fet("./php/agregar.php",obj,(res)=>{
         window.location=`./plusAgregar.php?t=${tar.dataset.t}&i=${res.split("|")[1]}`;
      });
   }


   console.log(obj);
   obj = [] 
})