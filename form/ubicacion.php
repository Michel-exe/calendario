<div class="">
    <!-- <section>
        <p>Detalles de ubicacion</p>
        <span>
            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg" data-darkreader-inline-fill="" data-darkreader-inline-stroke="" style="--darkreader-inline-fill:currentColor; --darkreader-inline-stroke:currentColor;">
                <path d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path>
            </svg>
        </span>
    </section> -->
    <section>
        <label>Calle: </label>
        <input class="inp-Max inpCalle" type="text" cont="0" maxlength="30" value="">
        <span> <b>0 </b> / 30 </span>
    </section>
    <section>
        <label>Municipio: </label>
        <input class="inp-Max inpMun" type="text" cont="0" maxlength="30" value="">
        <span> <b>0 </b> / 30 </span>
    </section>
    <section>
        <label>Barrio / colonia: </label>
        <input class="inp-Max inpCol" type="text" cont="0" maxlength="30" value="">
        <span> <b>0 </b> / 30 </span>
    </section>
    <section>
        <label>Numero: </label>
        <input class="inp-Max inpNum" type="text" cont="0" maxlength="10" value="">
        <span> <b>0 </b> / 10 </span>
    </section>
    <section>
        <label>Estado: </label>
        <input class="inp-Max inpEst" type="text" cont="0" maxlength="30" list="estados" value="">
        <span> <b>0 </b> / 30 </span>
    </section>
    <section>
        <label>Referencias</label>
        <textarea class="inp-Max inpRef" cont="0" maxlength="200"></textarea>
        <span> <b>0 </b> / 200 </span>
    </section>
    <datalist id="estados">
        <option value="Aguascalientes" />
        <option value="Baja California" />
        <option value="Baja California Sur" />
        <option value="Campeche" />
        <option value="Chiapas" />
        <option value="Chihuahua" />
        <option value="Coahuila" />
        <option value="Colima" />
        <option value="Distrito Federal" />
        <option value="Durango" />
        <option value="Guanajuato" />
        <option value="Guerrero" />
        <option value="Hidalgo" />
        <option value="Jalisco" />
        <option value="México" />
        <option value="Michoacán" />
        <option value="Morelos" />
        <option value="Nayarit" />
        <option value="Nuevo León" />
        <option value="Oaxaca" />
        <option value="Puebla" />
        <option value="Querétaro" />
        <option value="Quintana Roo" />
        <option value="San Luis Potosí" />
        <option value="Sinaloa" />
        <option value="Sonora" />
        <option value="Tabasco" />
        <option value="Tamaulipas" />
        <option value="Tlaxcala" />
        <option value="Veracruz" />
        <option value="Yucatán" />
        <option value="Zacatecas" />
    </datalist>
</div>
<script>
    // const fielUbi = document.querySelector(".fiel-ubi");
    // const fielUbiSec = document.querySelector(".fiel-ubi > section");
    // fielUbiSec.addEventListener("click", e =>{
    //     fielUbi.classList.toggle("act")
    //     fielUbi.style.height=`${fielUbi.classList.contains("act") ? fielUbi.scrollHeight : '50' }px`
    // })
</script>