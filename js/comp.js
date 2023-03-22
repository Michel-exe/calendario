const comp = {
   componenteHouse: ({ estrellas, habitaciones, id, localidad, nombre, precio, refer, src, status, idTipo }) => {
      return `
           <div class="item item-house" data-idTipo="${idTipo}" data-id="${id}">
              <picture>
                 <img src="./archivos/${src}" alt=nombre>
              </picture>
              <div class="item-p1">
                 <h3>${nombre}</h3>
                 <b>
                    <span> <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg" data-darkreader-inline-fill="" data-darkreader-inline-stroke="" style="--darkreader-inline-fill:currentColor; --darkreader-inline-stroke:currentColor;"><path d="M908.1 353.1l-253.9-36.9L540.7 86.1c-3.1-6.3-8.2-11.4-14.5-14.5-15.8-7.8-35-1.3-42.9 14.5L369.8 316.2l-253.9 36.9c-7 1-13.4 4.3-18.3 9.3a32.05 32.05 0 0 0 .6 45.3l183.7 179.1-43.4 252.9a31.95 31.95 0 0 0 46.4 33.7L512 754l227.1 119.4c6.2 3.3 13.4 4.4 20.3 3.2 17.4-3 29.1-19.5 26.1-36.9l-43.4-252.9 183.7-179.1c5-4.9 8.3-11.3 9.3-18.3 2.7-17.5-9.5-33.7-27-36.3z"></path></svg></span>
                    <span>${estrellas}</span>
                 </b>
              </div>
              <div class="item-p3">
                 <b>$${precio}.00 MXN</b> Noche
              </div>
              <div class="item-p2">
                 <p> En <b>${localidad}</b> ${refer} </p>
              </div>
              <a href="ver.php?ide=${id}" target="_blank">
                <b>Ver mas</b>
              </a>
           </div>
        `;
   },
   componenteRest: ({ estrellas,categoria, refer, horariosC, horariosO, id, idTipo, localidad, nombre, servDom, src }) => {
      return `
           <div class="item item-rest" data-idTipo="${idTipo}"  data-id="${id}">
              <picture>
                 <img src="./archivos/${src}" alt=nombre>
              </picture>
              <div class="item-p1">
                 <h3>${nombre}</h3>
                 <b>
                    <span> <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg" data-darkreader-inline-fill="" data-darkreader-inline-stroke="" style="--darkreader-inline-fill:currentColor; --darkreader-inline-stroke:currentColor;"><path d="M908.1 353.1l-253.9-36.9L540.7 86.1c-3.1-6.3-8.2-11.4-14.5-14.5-15.8-7.8-35-1.3-42.9 14.5L369.8 316.2l-253.9 36.9c-7 1-13.4 4.3-18.3 9.3a32.05 32.05 0 0 0 .6 45.3l183.7 179.1-43.4 252.9a31.95 31.95 0 0 0 46.4 33.7L512 754l227.1 119.4c6.2 3.3 13.4 4.4 20.3 3.2 17.4-3 29.1-19.5 26.1-36.9l-43.4-252.9 183.7-179.1c5-4.9 8.3-11.3 9.3-18.3 2.7-17.5-9.5-33.7-27-36.3z"></path></svg></span>
                    <span>${estrellas}</span>
                 </b>
              </div>
              ${servDom == "1" ? "<div class='item-p5'><b>Con servicio a Domicilio</b></div>" : ""}
              <div class="item-p4">
              <p>De <b>${horariosO}</b> a <b>${horariosC}</b></p>
              </div>
              <div class="item-p2">
                 <p> En <b>${localidad}</b>${refer} </p>
              </div>
              <a href="ver.php?ide=${id}" target="_blank">
                <b>Ver mas</b>
              </a>
           </div>
        `;
   },
   componenteCarga: () => {
      return `
         <div class="item item-carga">
             <div class="itemli"></div>
             <div class="itemlt"></div>
             <div class="itemlt"></div>
             <div class="itemlt"></div>
             <div class="itemlt"></div>
        </div>
        `;
   },
   componenteLoad: () => {
      // return `<div class="cont-loader error"><div class="loader"></div><h2>Procesando</h2></div>`;
      return `<div class="cont-loader"><div class="loader"></div><h2>Procesando</h2></div>`;
   },
   componeneteVacio: ()=>{
      return `
         <div class="cont-hamster">
            <div aria-label="Orange and tan hamster running in a metal wheel" role="img" class="wheel-and-hamster">
               <div class="wheel"></div>
               <div class="hamster">
                  <div class="hamster__body">
                     <div class="hamster__head">
                        <div class="hamster__ear"></div>
                        <div class="hamster__eye"></div>
                        <div class="hamster__nose"></div>
                     </div>
                     <div class="hamster__limb hamster__limb--fr"></div>
                     <div class="hamster__limb hamster__limb--fl"></div>
                     <div class="hamster__limb hamster__limb--br"></div>
                     <div class="hamster__limb hamster__limb--bl"></div>
                     <div class="hamster__tail"></div>
                  </div>
               </div>
               <div class="spoke"></div>
            </div>
            <h3>Lo sentimos por el momento esta vacia esta categoria</h3>
            <h4>Seguimos trabajando para ofrecer el mejor servicio</h4>
         </div>
      `;
   },
   componeneteError: ()=>{
      return `<div class="cont-hamster"><div class="planet"></div><h3>Hubo un error</h3>
      <h4>Recurso solicitado no encontrado</h4></div>`
   }
}