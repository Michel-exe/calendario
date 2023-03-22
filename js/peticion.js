const peticion = async (url, objeto, funcion,jsonBol) => {
   let data = new FormData();

   objeto.map(obj => {
      data.append(
         obj.n,
         obj.v
      );
      if(!obj.n) return console.log("Valor del objeto no especificado");
   })

   // console.log(url);
   // console.log(objeto);
   // console.log(funcion);

   await fetch(url, {
      method: "POST",
      body: data,
   }).then(r => r.text())
      .then(res => {
         // console.log(res);
         if(!funcion) return console.log("Funcion no especificada");

         if(jsonBol==1){ return funcion(res);}
         // console.log(res);
         try { funcion(JSON.parse(res)) }
         catch (error) { console.log(error); console.log(res); }
      })
      .catch(e => console.log(e))
}
// peticion("ruta", [{}, {}]);