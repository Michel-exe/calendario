const comp = {
    reserv: (o)=>{
        return `
           <section>
              <div>
                 <label>Nombre:
                    <b>${o.nombre}</b>
                 </label>
              </div>
              <div>
                 <label>Apellidos:
                    <b>${o.ape}</b>
                 </label>
              </div>
              <div>
                 <label>Reservo el dia:
                    <b>${o.reser}</b>
                 </label>
              </div>
              <div>
                 <label>Telefono:
                    <a href="tel:+52${o.tel}">
                       <b>${o.tel}</b>
                    </a>
                 </label>
              </div>
              <div>
                 <label>Whatsapp:
                     <b>${o.whats=="1" ? "Si" : "No"}</b>
                     ${o.whats=="1" ? `<a href='https://api.whatsapp.com/send?phone=52${o.tel}&text=Hola+hemos+recibido+la+peticion+de+tu reservacion'>Enviar Mensaje</a>` : ""}
                 </label>
              </div>
              <div>
                 <label>Correo:
                    <a href="mailto:${o.mail}">
                       <b>${o.mail}</b>
                    </a>
                 </label>
              </div>
              <form id='update'>
                 <section class="inp inp-nor">
                    <label require>Llegada: </label>
                    <input type="date" value='${o.llegada}'>
                 </section>
                 <section class="inp inp-nor">
                    <label require>Salida: </label>
                    <input type="date" value='${o.salida}'>
                 </section>
                 <section class="inp inp-sub">
                    <button data-t="cerrar" type="button">Cerrar</button>
                    <button type="submit">Actualizar</button>
                 </section>
              </form>
           </section>`
        ;
    }
}