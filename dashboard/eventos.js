const compServ = (ide,val)=>{
    return`
    <p data-id='${ide}'>
        ${val} <span>X</span>
    </p>`;
};
const agregar1 = ()=>{
    const agregar = document.getElementById("agregar");
    const listServicios = document.getElementById("listServicios")
    const sectList = document.querySelector(".sect-list")

    agregar.addEventListener("click", e =>{
        const inp = e.target.previousElementSibling;
        if(inp.value.length==0){ inp.focus(); return;}

        let ide=0;
        try {
            ide = listServicios.querySelector(`option[value='${inp.value}']`)
            listServicios.removeChild(ide)
        } catch (error) {
            alert("Serrvicio no encontrado escoja uno de la lista\nSi es un nuevo servicio agreguelo, accediendolo a el desde el menu");
            return;
        }

        sectList.innerHTML+=compServ(ide.dataset.ide,inp.value);
        inp.value=""
        inp.focus();
    })
    sectList.addEventListener("click", e =>{
        if(e.target.tagName!="SPAN") return;
        const parent = e.target.parentElement
        listServicios.innerHTML+=`<option value='${parent.textContent.trim().replace(" X","")}' data-ide='${parent.dataset.id}'></option>`

        sectList.removeChild(parent);

    })
};
const agregar2 = ()=>{
    const agregar = document.getElementById("agregar");
    const sectList = document.querySelector(".sect-list");

    agregar.addEventListener("click", e =>{
        const inp = e.target.previousElementSibling.previousElementSibling;

        if(inp.value.length==0){ inp.focus(); return;}

        sectList.innerHTML+=compServ(0,inp.value);
        inp.value=""
        e.target.previousElementSibling.querySelector("b").textContent="0"
        inp.focus();
    })
    sectList.addEventListener("click", e =>{
        if(e.target.tagName!="SPAN") return;
        sectList.removeChild(e.target.parentElement);

    })
};
const inpEve = e =>{
    const tar = e.target;
    if((tar.tagName=="INPUT" || tar.tagName=="TEXTAREA") && tar.classList.contains("inpEvent")){
        let bro = tar.nextElementSibling.querySelector("b")
        bro.textContent=tar.value.length
    }
}
window.addEventListener("keyup", e => inpEve(e))

