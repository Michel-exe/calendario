const changeArray = (i,arr) => {
    const random = (a) => Math.floor(Math.random() * (a.length-1))
    
    let n1 = random(arr)
    let n2 = random(arr)
  
    while(n1===n2) n2 = random(arr)
  
    const tmpele = arr[n1]
    arr[n1] = arr[n2]
    arr[n2] = tmpele
  
    i++
    if (i !== 15) return changeArray(i,arr)
      
    return arr
}
export {changeArray}