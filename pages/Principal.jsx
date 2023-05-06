import React, { useState } from 'react'
import { View } from 'react-native'
import { Establecimientos } from '../styles/pages';
import Alerta from './components/Alerta';
import Mapa from './Principal/Mapa';
import Footer from './Principal/Footer';
import MenuLateral from './components/MenuLateral';
import { Animacion } from '../code/MenuLateral';
import { MenuRuta } from '../code/MenuRuta';
import { AnimacionMain } from '../code/AnimacionMain'
import { AnimacionMain2 } from '../code/AnimacionMain2'
import Main from './Principal/Footer/Main';
import Lugar from './Principal/Footer/Lugar';
import Ruta from './Principal/Ruta';
import Home from './components/Home';
// import Carrusel from './components/Carrusel';

export default function Principal() {
   const { actMl, posMl, cerMl } = Animacion()
   const { actRuta, posRuta, cerRuta } = MenuRuta()

   const { activar: act, position: pos, cerrar: cerr } = AnimacionMain()
   const { activar: act2, position: pos2, cerrar: cerr2 } = AnimacionMain2()

   let [uri, seturi] = useState("https://www.google.com/maps/d/edit?mid=10p5gr5ryGSJ1XzxRrjJWSM32x_V36rI&usp=sharing");
   let [text, settext] = useState("Nanacamilpa")
   let [loc, setloc] = useState({})
   let [ruta, setRuta] = useState({
      latitude: 19.49597,
      longitude: -98.53468
   })

   return (
      <View style={Establecimientos.container}>
         <Mapa 
            uri={uri}
            text={text}
            loc={loc}
            actMl={actMl}
            actRuta={actRuta}
            setRuta={setRuta}
         />
         <Alerta 
            text={"¡Bienvenid@!"} 
            desc={"Esta aplicacion ocupa coockies, para brindarte un mejor servicio para mas informacion puedes ver nuestras politicas de privacidad, esa informacion solo la sabremos tu y yo 🤫"} />
         <Home setRuta={setRuta} settext={settext} seturi={seturi} />
         
         <Footer activar={act} activar2={act2} />
         
         <Main position={pos} cerrar={cerr} events={{seturi:seturi,settext:settext,setloc:setloc}}  />
         <Lugar position={pos2} cerrar={cerr2} />

         <MenuLateral position={posMl} cerrar={cerMl} />
         <Ruta ruta={ruta} posRuta={posRuta} cerRuta={cerRuta} />
      </View>

   )
}
