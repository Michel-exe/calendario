const settingFiltro = document.querySelector(".setting-filtro");
document.querySelector(".setting-filtro form").addEventListener("submit", e =>{
    e.preventDefault();
    
    let tipos =[];
    let c=-3;
    for (let i = 0; i < e.target.length-1; i=i+3) {
        localStorage.setItem(
            e.target[i].dataset.t,
            `{"status":"${(e.target[i].checked?1:0)}","orden":"${(e.target[i+1].checked ? "DESC" : "ASC")}"}`
        )
        if(e.target[i].checked){
            tipos.push(`"${e.target[i].dataset.t}"`);
        }
    }
    localStorage.setItem("tipos",`[${tipos}]`)
    
    // console.log(e.target.parentNode);
 })
 document.querySelector(".filtro").addEventListener("click", ()=>{
    settingFiltro.classList.toggle("scl")
 })
 settingFiltro.addEventListener("click", e =>{
    if(e.target.classList.contains("setting-filtro")){
       settingFiltro.classList.toggle("scl")
    }
    if(e.target.tagName=="INPUT"){
       let pa= e.target.parentNode;
       if(e.target.dataset.cat){
          return pa.classList.toggle("act")
       }
       pa.querySelector("div label[class='act']").classList.remove("act")
       document.querySelector(`label[for='${e.target.getAttribute("id")}']`).classList.add("act")
       // e.target.getAttribute("id")
    }
 })