const enviar=async(form)=>{
    const data = new FormData();
    data.append("type",form.type)
    data.append("fecha",form.fecha)
    data.append("day",form.day)
    data.append("mounth",form.mounth)
    data.append("year",form.year)
    data.append("check",form.check)
    data.append("i_hora",form.i_hora)
    data.append("f_hora",form.f_hora)
    data.append("idEve",form.idEve)
    data.append("evento",form.evento)
    data.append("descri",form.descri)
    data.append("idUbi",form.idUbi)
    data.append("calle",form.calle)
    data.append("municipio",form.municipio)
    data.append("colonia",form.colonia)
    data.append("numero",form.numero)
    data.append("estado",form.estado)
    data.append("referen",form.referen)
    data.append("color",form.color)
    await fetch("./php/agendar.php",{
        method:"POST",
        body: data
        // body: JSON.stringify({type: 'value'})
        // body: JSON.stringify({ name: 'John', age: 30 })
        // body: JSON.stringify(data)
    })  .then(res=>res.text())
        .then(r=>{
            console.log(r);
            document.querySelector(".carga h3").innerHTML=`${r=='1' ? "Guardado" : "<b style='color:red'> Error al agendar</b>"}`
            setTimeout(() =>{
                window.location=window.location.href
            },1000)
        })
}
document.querySelectorAll(".more").forEach(m =>{
    m.addEventListener("click", e =>{
        let el = m.parentElement.parentElement
        el.style.height=`${el.scrollHeight}px`
    })
})
window.addEventListener("submit",e =>{
    e.preventDefault();
    const tar = e.target;
    let [y,m,d] = tar[0].value.split("-");
    const form = {
        type: "agendar",
        fecha:tar[0].value,
        day:d,
        mounth:m,
        year:y,
        check:tar[1].checked,
        i_hora:tar[2].value,
        f_hora:tar[3].value,
        idEve:document.querySelector("input[name='radEve']:checked").dataset.id,
        evento:document.querySelector(".inpEvento").value,
        descri:document.querySelector(".inpDes").value,
        idUbi:document.querySelector("input[name='radUbi']:checked").dataset.id,
        calle:document.querySelector(".inpCalle").value,
        municipio:document.querySelector(".inpMun").value,
        colonia:document.querySelector(".inpCol").value,
        numero:document.querySelector(".inpNum").value,
        estado:document.querySelector(".inpEst").value,
        referen:document.querySelector(".inpRef").value,
        color:document.querySelector("input[name='col']:checked").getAttribute("col")
    }
    if(form.fecha.length==0){
        alert("Campo Fecha vacio");
        return
    }
    if(form.check==false && form.i_hora.length<5){
        alert("Por favor especifique una hora o rellene la casiila de 'Todo el Dia'")
        return
    }
    if(document.querySelector("input[name='radEve']").checked){
        alert("Por favor Especifique el nombre del evento y una descripcion")
        return
    }
    if(document.querySelector("input[name='radUbi']").checked){
        alert("Por favor Especifique el nombre del evento y una descripcion")
        return
    }
    
    document.querySelector(".carga").style.transform="scale(1)"
    enviar(form)
    // document.querySelector("input[type='radio']:checked")
    console.log(form);
    // console.log(e.target);
})
document.querySelectorAll(".bg-label").forEach(bg =>{
    bg.addEventListener("click",e=>{
        if(e.target.tagName!="DIV"){
            bg.querySelector(".active").classList.remove("active");
            e.target.classList.add("active");
        }
    })
})

document.getElementById("bg-color").addEventListener("input", e =>{
    document.getElementById("bg-new").checked=true;
    document.getElementById("bg-new").setAttribute("col",e.target.value)
    document.getElementById("bg-newLabel").style.background=e.target.value
})
document.querySelectorAll(".inp-Max").forEach(i=>{i.addEventListener("keyup",e=>{e.target.nextElementSibling.firstElementChild.innerHTML=e.target.value.length})})
