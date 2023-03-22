const exp = {
    date: /^202\d{1}-\d{2}-\d{2}$/,
    personas: /\d{1,3}$/,
    usuario: /[a-zA-Z0-9\_\-]{4,30}$/,
    nombre: /[a-zA-ZÀ-ÿ\s]{1,30}$/,
    apeM: /[a-zA-ZÀ-ÿ\s]{0,30}$/,
    password: /.{4,12}$/,
    mail: /[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
    hora: /\d{1,2}:\d{1,2}$/,
    phone: /\d{7,12}$/,
    ide: /\d{1,5}$/
}
const funcError = (e) => {
    e.parentNode.classList.add("error")
    e.focus();
    // document.querySelector().parentNode classList.add("error")
}
const validarInput = async (e) => {
    const form =    e.target;
    const valid = {
        empieza: {
            house: 5,
            restaurante: 3
        },
        datos: (e) =>{
            return inputs = {
                nombre: form[e+1],
                apellidoP: form[e+2],
                apellidoM: form[e+3],
                mail: form[e+4],
                phone: form[e+5],
                ide: window.location.search.split("ide=")[1].split("&")[0]
            }
        },
        validar: (array)=>{
             return array.map(a =>{
                if (!a.exp.test(a.inp.value)) return a.inp;
            })
        },
        obtFecha: ()=>{
            let d = new Date();
            const p = (d) => { return (d + "").padStart(2, "0") }
            return `${d.getFullYear()}-${p(d.getMonth() + 1)}-${p(d.getDate())} ${p(d.getHours())}:${p(d.getMinutes())}:${p(d.getSeconds())}`
        },
        restaurant: ()=>{
            let inp = {
                dia: form[1],
                hora: form[2],
            }
            inp.d=valid.datos(valid.empieza.restaurante);
            const inputs = inp;

            let v = valid.validar([
                {exp:exp.date,inp:inputs.dia},
                {exp:exp.hora,inp:inputs.hora},
                {exp:exp.nombre,inp:inputs.d.nombre},
                {exp:exp.nombre,inp:inputs.d.apellidoP},
                {exp:exp.apeM,inp:inputs.d.apellidoM},
                {exp:exp.mail,inp:inputs.d.mail},
                {exp:exp.phone,inp:inputs.d.phone},
            ]);

            const inputError = v.find(f => f!=undefined )

            if(inputError!= undefined){
                alert("Error al registrarse, complete los campos correctamente");
                funcError(inputError);
                return false;
            }
            document.querySelector("body").innerHTML += comp.componenteLoad()
            document.querySelector("body").classList.add("loader");
            
            return [
                { n: "tipo", v: "agendarRest" },
                { n: "dia", v: inputs.dia.value },
                { n: "hora", v: inputs.hora.value },
                { n: "ide", v: inputs.d.ide },
                { n: "nombre", v: inputs.d.nombre.value },
                { n: "apeP", v: inputs.d.apellidoP.value },
                { n: "apeM", v: inputs.d.apellidoM.value },
                { n: "mail", v: inputs.d.mail.value },
                { n: "phone", v: inputs.d.phone.value },
                { n: "fecha", v: valid.obtFecha() }
            ];

        },
        house: () => {
            let inp = {
                date1: form[1],
                date2: form[2],
                adultos: form[3],
                ninos: form[4]
            }
            inp.d=valid.datos(valid.empieza.house);
            const inputs = inp;

            const v = valid.validar([
                {exp:exp.date,inp:inputs.date1},
                {exp:exp.date,inp:inputs.date2},
                {exp:exp.personas,inp:inputs.adultos},
                {exp:exp.personas,inp:inputs.ninos},
                {exp:exp.nombre,inp:inputs.d.nombre},
                {exp:exp.nombre,inp:inputs.d.apellidoP},
                {exp:exp.apeM,inp:inputs.d.apellidoM},
                {exp:exp.mail,inp:inputs.d.mail},
                {exp:exp.phone,inp:inputs.d.phone},
            ]);

            const inputError = v.find(f => f!=undefined )
            if(inputError!= undefined){
                alert("Error al registrarse, complete los campos correctamente");
                funcError(inputError);
                return false;
            }
            document.querySelector("body").innerHTML += comp.componenteLoad()
            document.querySelector("body").classList.add("loader");
            
            return [
                { n: "tipo", v: "agendarHouse" },
                { n: "llegada", v: inputs.date1.value },
                { n: "salida", v: inputs.date2.value },
                { n: "adultos", v: inputs.adultos.value },
                { n: "ninos", v: inputs.ninos.value },
                { n: "ide", v: inputs.d.ide },
                { n: "nombre", v: inputs.d.nombre.value },
                { n: "apeP", v: inputs.d.apellidoP.value },
                { n: "apeM", v: inputs.d.apellidoM.value },
                { n: "mail", v: inputs.d.mail.value },
                { n: "phone", v: inputs.d.phone.value },
                { n: "fecha", v: valid.obtFecha() }
            ];
        }
    }
    const obj = e.target.dataset.form=="h" ? valid.house() : valid.restaurant();
    if (!obj) return

    document.querySelector(".cont-loader h2").innerHTML = "Reservado<br><b>En un lapso de 3 dias nos comunicaremos con usted ya sea por correo o numero de telefono para completar el proceso </b>";

    await peticion(ruta.agregar, obj, res => {
        if (res == "1") {
            setTimeout(() => {
                window.location.href = window.location.origin + "/airBNB/"
            }, 5000);
        }
        console.log(res);
    },1
    )
}
window.addEventListener("submit", e => {
    e.preventDefault();
    if (e.target.dataset.usuario) { validarInput(e) }
})