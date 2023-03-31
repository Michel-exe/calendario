const ver ={
    house: ()=>{
        const obtPrecio = ()=>{
            const precio = document.getElementById("precio");
            const form = document.querySelector(".inf-pago form");
            const pre = form.dataset.pre;
            const [f,inp1,inp2] = document.forms[1];
        
            const dif = moment(inp2.value).diff(moment(inp1.value), 'days')
        
            precio.children[0].children[1].innerHTML=`x ${dif} dia(s)`;
            precio.children[1].innerHTML="Total de: $"+(dif*parseInt(pre))+".00 MXN";
        }
        const changeDate = (form,v)=>{
            const h = v!=undefined ? new Date(v) : new Date() 
        
            let [dia,mes,anio]=[h.getDate(),h.getMonth()+1,h.getFullYear()]
            let m = new Date(h); 
            m.setDate(m.getDate() +1);
            let [dia2,mes2,anio2]=[m.getDate(),m.getMonth()+1,m.getFullYear()]
        
            dia  = dia.toString().padStart(2,"0");
            dia2 = dia2.toString().padStart(2,"0");
            mes  = mes.toString().padStart(2,"0");
            mes2 = mes2.toString().padStart(2,"0");
        
            form[1].setAttribute("min",`${anio}-${mes}-${dia}`);
            form[1].value=`${anio}-${mes}-${dia}`;
            form[2].setAttribute("min",`${anio}-${mes2}-${dia2}`);
            form[2].value=`${anio}-${mes2}-${dia2}`;
            
            obtPrecio();
        }
        window.addEventListener("DOMContentLoaded",() =>{ changeDate(document.forms[1]) })
        document.querySelector(".inf-pago form").addEventListener("input", e =>{
            if(e.target.getAttribute("type")=="date"){
                if(e.target.dataset.i=="1"){
                    changeDate(document.forms[1],e.target.value);
                    return;
                }
                obtPrecio();
            }
        })
    }
}