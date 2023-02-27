const obtenerEvento=async (ide, day, mounth, year)=>{
    console.log(day +" - "+mounth+" - "+year);
        const data = new FormData();
        data.append("type","evento")
        data.append("ide",ide);
        data.append("day",day);
        data.append("mounth",mounth);
        data.append("year",year);
        await fetch("./php/get.php",{
            method: "POST",
            body:data
        })
        .then(res => res.json())
        .then(r => {
            if(r[0].e=='2'){
                document.querySelector(".eventos").innerHTML=`<p style="padding-top:20px;text-align:center;width:90%;margin:0 auto"> No hay Eventos el dia: ${day} - ${mounth} - ${year} </p>`;
            } else {
                mostrarEvento(r);
            }
            console.log(r);
                // console.log(JSON.parse(r.replaceAll("][",",")));
            })
        .catch(e => console.log(e))
}
let d = new Date()
 let [day, mounth, year] = [d.getDate(),d.getMonth(),d.getFullYear()];
 obtenerEvento(1,
    day.toString().padStart(2,"0"),
    (mounth+1).toString().padStart(2,"0"),
    year);

document.getElementById("diasc").addEventListener("click",async e =>{
    const tar = e.target
    if(tar.tagName=="B"){
        const {ide, day, mounth, year} = tar.dataset
        obtenerEvento(ide, day, mounth, year)
    }
})
const comp = (f)=>{
    console.log(f);
    return `
    <div class="evento" style="border-top: 20px solid ${f.color};">
        <section>
            <h3>
                ${f.evento}
            </h3>
        </section>
        <div>
            <section class="eveDate">
                <div>
                    <b>
                        ${f.i_fecha}
                    </b>
                </div>
            </section>
            <section class="eveSec">
                <div>
                    <span>
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg" data-darkreader-inline-fill="" data-darkreader-inline-stroke="" style="--darkreader-inline-fill:currentColor; --darkreader-inline-stroke:currentColor;">
                            <path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448 448-200.6 448-448S759.4 64 512 64zm0 820c-205.4 0-372-166.6-372-372s166.6-372 372-372 372 166.6 372 372-166.6 372-372 372z"></path>
                            <path d="M686.7 638.6L544.1 535.5V288c0-4.4-3.6-8-8-8H488c-4.4 0-8 3.6-8 8v275.4c0 2.6 1.2 5 3.3 6.5l165.4 120.6c3.6 2.6 8.6 1.8 11.2-1.7l28.6-39c2.6-3.7 1.8-8.7-1.8-11.2z"></path>
                        </svg>
                    </span>
                    <b>
                        ${f.i_hora} - ${f.t_hora}
                    </b>
                </div>
                <div>
                    <span>
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg" data-darkreader-inline-fill="" data-darkreader-inline-stroke="" style="--darkreader-inline-fill:currentColor; --darkreader-inline-stroke:currentColor;">
                            <path d="M12.5 3a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1h5zm0 3a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1h5zm.5 3.5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5zm-.5 2.5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1h5z"></path>
                            <path d="M16 2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2zM4 1v14H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h2zm1 0h9a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5V1z"></path>
                        </svg>
                    </span>
                    <p>
                        ${f.description}
                    </p>
                </div>
            </section>
            <section class="eveSec">
                <div>
                    <span>
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg" data-darkreader-inline-fill="" data-darkreader-inline-stroke="" style="--darkreader-inline-fill:currentColor; --darkreader-inline-stroke:currentColor;">
                            <path fill="none" stroke="#000" stroke-width="2" d="M12,22 C12,22 4,16 4,10 C4,5 8,2 12,2 C16,2 20,5 20,10 C20,16 12,22 12,22 Z M12,13 C13.657,13 15,11.657 15,10 C15,8.343 13.657,7 12,7 C10.343,7 9,8.343 9,10 C9,11.657 10.343,13 12,13 L12,13 Z" data-darkreader-inline-stroke="" style="--darkreader-inline-stroke:#e8e6e3;"></path>
                        </svg>
                    </span>
                    <nav>
                        <p>
                            Calle: <b>
                                ${f.calle}
                            </b>
                            No. <b>
                                
                                ${f.numero}
                            </b>
                            Barrio: <b>
                            
                                ${f.barrio}
                            </b>
                            Municipio de: <b>
                            
                                ${f.municipio}
                            </b>
                            en el Estado de: <b>
                            
                                ${f.estado}
                            </b>
                        </p>
                        <a href="https://www.google.com.mx/maps/search/
                        link
                        " target="_blank">Ver en Google Maps</a>
                    </nav>
                </div>
            </section>
        </div>
    </div>
    `;
}
const mostrarEvento = (r)=>{
    document.querySelector(".eventos").innerHTML="";
    r.map(f =>{
        document.querySelector(".eventos").innerHTML+=comp(f);
    })
}

