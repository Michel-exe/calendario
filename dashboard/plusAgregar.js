const imagenes = ()=>{
    let file = document.getElementById("file")
    file.addEventListener("change", () =>{ cargar(file.files) })
    window.addEventListener("submit", e => {
        e.preventDefault();
        subir(file.files)
    })
    let arr = [];
    const imgLoad = document.querySelector(".img-load");
    imgLoad.addEventListener("click", e =>{
        if(e.target.tagName=="SPAN"){
            arr.push(e.target.parentNode.dataset.cont)
            imgLoad.removeChild(e.target.parentNode)
        }
    })

    const cargarArchivoImagen = (ar,i) => {
        const reader = new FileReader();
        reader.readAsDataURL(ar);
        reader.addEventListener('load', e => {
            let url = URL.createObjectURL(ar);
            imgLoad.innerHTML += `<section data-cont='${i}'><span>X</span><picture><img src="${url}" alt="" width="100px" height="100px"></picture><h4>${ar.name}</h4></section>`;
        })
    }
    const cargar = (file) => {
        imgLoad.innerHTML="";
        if (file != undefined) {
            for (i = 0; i < file.length; i++) {
                const fil = file[i];
                const exp = /jpg|png|jpeg/g
                if (!fil) {
                    alert('Seleccione un archivo para cargar');
                    return;
                }
                if (!fil.type.startsWith('image/')) {
                    alert('Seleccione un archivo de imagen');
                    return;
                }
                if (fil.size > 6627733) {
                    alert('El archivo es demasiado grande');
                    return;
                }
                if (!exp.test(fil.type.split("/")[1])) {
                    alert('Seleccione una extencion de imagen valido \nPNG JPG JPEG');
                    return;
                }
                console.log(i);
                cargarArchivoImagen(fil,i)
            }
        }
    }
    const subir = async (file)=>{
        let fd = new FormData();

        for (i = 0; i < file.length; i++) {
            if(arr.includes(i.toString())) continue;

            document.querySelector(".subidas h3").innerHTML=`<b> ${(i+1)-arr.length} </b> - ${file.length-arr.length}`;
            console.log(file[i]);
            fd.append(`type`, 'file');
            fd.append(`file`, file[i]);
            fd.append(`id`, document.forms[0][0].value);
            await fetch('./php/plusAgregar.php',{
                method: 'POST',
                body: fd
            })
            .then(res => res.text())
            .then(resp => console.log(resp))
            .catch(e => console.log(e))
        }
    }
}
const comida = ()=>{
    const comidas = document.getElementById("comidas");
    const enviar = async (ide,pla,tipo,por,tp)=>{
        let data = new FormData();
        data.append("type","comida");
        data.append("ide",ide);
        data.append("platillo",pla);
        data.append("tipo",tipo);
        data.append("porcion",por);
        data.append("tipoPorcion",tp);
     
        await fetch('./php/plusAgregar.php', {
           method: "POST",
           body: data,
        }) .then(r => r.text())
           .then(res => {
              console.log(res);
              if(res=="1"){
                window.location=`${(window.location.href).replace("&c=t","")}`;
              }
           })
           .catch(e => console.log(e))
    }
    document.querySelector("input[type='button']").addEventListener("click",()=>{
        let [id,fi,pla,tipo,por,tp] = document.forms[0];
        comidas.innerHTML+=`<section data-id='${id.value}' data-pla='${pla.value}' data-tipo='${tipo.value}' data-por='${por.value}' data-tp='${tp.value}'><b>${pla.value}</b> ${tipo.value} - ${por.value}${tp.value} <span>X</span> </section>`
        pla.value="";
        pla.focus();
    })
    comidas.addEventListener("click",e =>{
        if(e.target.tagName=="SPAN"){
            comidas.removeChild(e.target.parentNode)
        }
    })

    window.addEventListener("submit", e => {
        e.preventDefault();
        let pla="",tipo="",por="",tp="";
        comidas.childNodes.forEach(f => pla+=f.dataset.pla+"|" )
        comidas.childNodes.forEach(f => tipo+=f.dataset.tipo+"|" )
        comidas.childNodes.forEach(f => por+=f.dataset.por+"|" )
        comidas.childNodes.forEach(f => tp+=f.dataset.tp+"|" )

        if(pla.length==0){
            alert("Por favor agregue un platillo como minimo o precione saltar");
            return;
        }
        enviar(document.forms[0][0].value,pla,tipo,por,tp)
    })
    document.getElementById("linkSalto").setAttribute("href",(window.location.href).replace("&c=t",""))
}





