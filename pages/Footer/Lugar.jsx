import React from 'react'
import { View, Text, Animated, ScrollView, Image } from 'react-native'
import { StyleFooter } from '../../styles/pages'
import BtnCerrarMain from '../components/BtnCerrarMain'
import { StyleLugares } from '../../styles/pages';
import lugar from '../../data/lugar'


const Estab = (est) => {
   return (
      <View key={est.idEstab}>
         <View>
            <Text style={StyleLugares.cajaTit}>{est.name}</Text>
         </View>
         <View style={StyleLugares.caja}>
            <View>
               <Text style={StyleLugares.cajaHijoTit2}> Referencias </Text>
               <Text style={StyleLugares.cajaHijoDes}>{est.ubicacion}</Text>
            </View>
         </View>
         <View style={StyleLugares.caja}>
            <Text style={StyleLugares.cajaHijoTit2}> Menu </Text>
            {est.comida.map(({ tipo, platillo, idComida }) => {
               return (
                  <View key={idComida} style={StyleLugares.cajaHijo} >
                     <Text style={StyleLugares.cajaHijoSubTit}>{tipo}</Text>
                     <Text>{platillo}</Text>
                  </View>
               )
            })}
         </View>
         <View style={StyleLugares.carrusel}>
            {est.img.map(({ idima, img }) => {
               return (
                  <View key={idima} style={StyleLugares.carruselImg}>
                     <Image style={{ width: '100%', height: '100%', resizeMode: 'cover' }} source={{ uri: img }} />
                  </View>
               )
            })}
         </View>
      </View>
   )
}


export default function Lugar({ position, cerrar }) {
   return (
      <Animated.View style={[StyleFooter.containerMain, position]}>
         <BtnCerrarMain event={cerrar} />
         <View style={StyleLugares.container}>
            <ScrollView style={StyleLugares.scroll}>
               <View>
                  {lugar.map(lugar => {
                     return (<Estab key={"lugaaar1"} {...lugar} />)
                  })}
               </View>
            </ScrollView>
         </View>
      </Animated.View>
   )
}