const fet = async (url,obj) => {
   let data = new FormData();

   obj.map(o =>{
      data.append(o.n,o.v)
   })

   await fetch(url, {
      method: "POST",
      body: data,
   }) .then(r => r.text())
      .then(res => console.log(res))
      .catch(e => console.log(e))
}
const obj = [
   {
      n:'a',
      v:'1',
   },
   {
      n:'b',
      v:'2',
   }
] 
fet("./php/recibir.php",obj)