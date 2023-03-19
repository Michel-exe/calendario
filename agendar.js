const exp = {
    date:  /^202\d{1}-\d{2}-\d{2}$/,
    personas: /\d{1,3}$/ ,
	usuario: /[a-zA-Z0-9\_\-]{4,30}$/,
	nombre: /[a-zA-ZÀ-ÿ\s]{1,30}$/, 
	password: /.{4,12}$/,
	mail: /[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	phone: /\d{7,12}$/ 
}
const funcError = (e)=>{
    e.parentNode.classList.add("error")
    e.focus();
    // document.querySelector().parentNode classList.add("error")
}
const fet = async (url,obj,funcion) => {
    let data = new FormData();
 
    obj.map(o =>{
       data.append(o.n,o.v);
    })
 
    await fetch(url, {
       method: "POST",
       body: data,
    }) .then(r => r.text())
       .then(res => {
            if(res==="1"){
                setTimeout(() => {
                    window.location.href=window.location.origin+"/airBNB/"
                }, 5000);
            }
          console.log(res);
       })
       .catch(e => console.log(e))
 }
const validarInput = ()=>{
    const form = document.forms[0]
    const inputs ={
        date1: form[1],
        date2: form[2],
        adultos: form[3],
        ninos: form[4],
        nombre: form[6],
        apellidoP: form[7],
        apellidoM: form[8],
        mail: form[9],
        phone: form[10]
    }
    if(!exp.date.test(inputs.date1.value)) return funcError(inputs.date1);
    if(!exp.date.test(inputs.date2.value)) return funcError(inputs.date2);
    if(!exp.personas.test(inputs.adultos.value)) return funcError(inputs.adultos);
    if(!exp.personas.test(inputs.ninos.value)) return funcError(inputs.ninos);
    if(!exp.nombre.test(inputs.nombre.value)) return funcError(inputs.nombre);
    if(!exp.nombre.test(inputs.apellidoP.value)) return funcError(inputs.apellidoP);
    if(!exp.nombre.test(inputs.apellidoM.value)) return funcError(inputs.apellidoM);
    if(!exp.mail.test(inputs.mail.value)) return funcError(inputs.mail);
    if(!exp.phone.test(inputs.phone.value)) return funcError(inputs.phone);

    
    document.querySelector("body").innerHTML+=comp.componenteLoad()
    document.querySelector("body").classList.add("loader");
    
    let d = new Date();
    const p = (d) => {return (d+"").padStart(2,"0")}

    let fecha = `${d.getFullYear()}-${p(d.getMonth()+1)}-${p(d.getDate())} ${p(d.getHours())}:${p(d.getMinutes())}:${p(d.getSeconds())}`
    
    const obj=[
        { n:"tipo",   v:"agendar"},
        { n:"llegada", v:inputs.date1.value},
        { n:"salida", v:inputs.date2.value},
        { n:"adultos", v:inputs.adultos.value},
        { n:"ninos", v:inputs.ninos.value},
        { n:"ide", v:window.location.search.toString().split('&')[4].split("=")[1]},
        { n:"nombre", v:inputs.nombre.value},
        { n:"apeP",   v:inputs.apellidoP.value},
        { n:"apeM",   v:inputs.apellidoM.value},
        { n:"mail",   v:inputs.mail.value},
        { n:"phone",  v:inputs.phone.value},
        { n:"fecha", v: fecha}
    ]

    fet(`./php/agregar.php`,obj)

    document.querySelector(".cont-loader h2").innerHTML="Reservado<br><b>En un lapso de 3 dias nos comunicaremos con usted ya sea por correo o numero de telefono para completar el proceso </b>";
    console.log("CHI");
}
window.addEventListener("submit", e =>{
    e.preventDefault();
    if(e.target.dataset.usuario){ validarInput() }
})