const eventos = async()=>{
    let data = new FormData()
    let date = new Date();
    const year = date.getFullYear;
    let mes = parseInt(localStorage.getItem("mes"));
    let mesDes = (mes==12 ? 1 : mes+1).toString().padStart(2,"0")
    let mesAnt = (mes==1 ? 12 : mes-1).toString().padStart(2,"0")

    console.log(mesAnt+"-"+mes.toString().padStart(2,"0")+"-"+mesDes);

    data.append("type","todo")
    data.append("mesAnt",mesAnt)
    data.append("mes",mes.toString().padStart(2,"0"))
    data.append("mesDes",mesDes)
    data.append("year",year)
    await fetch("./php/get.php",{
        method: "POST",
        body:data
    })
    .then(res => res.json())
    .then(r => {
            ponerFechas(r)
        })
    .catch(e => console.log(e))
}
const ponerFechas = (res)=>{
    res.map(r =>{
        const cad = ".day_"+r.day+"-"+r.mounth+"-"+r.year
        if(document.querySelector(cad)!=null){
            let el =document.querySelector(cad)
            let div = document.querySelector(cad + " >div")
            el.style.background=r.color
            let ar = r.evento.split(" ");
            div.innerHTML+=`
                <div ide="${r.id}">
                    <h3>${ar[0]} ${ar[1] || ""} ${ar[2] || ""} ${ar[3] ? "..." : ""} </h3>
                </div>
            `;
            if(document.querySelector(cad + " >b")==null){
                el.innerHTML+=`<b data-ide="${r.id}" data-day="${r.day}" data-mounth="${r.mounth}" data-year="${r.year}"></b>`
            }
        }
        //  else{
        //     console.log("No ta 😔");
        // }
    })
}