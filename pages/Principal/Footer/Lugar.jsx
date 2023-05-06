import React, { useCallback } from 'react'
import { View, Text, Animated, ScrollView, Image, Linking, Dimensions, Alert, TouchableOpacity } from 'react-native'
import { StyleFooter } from '../../../styles/pages'
import BtnCerrarMain from '../../components/BtnCerrarMain'
import { StyleLugares } from '../../../styles/pages';
import lugar from '../../../data/lugar'
import { icons } from '../../../constants';
import MyCarrusel from '../../components/Carrusel';
import { BTNlink } from '../../components/Button';

const Estab = (est) => {
   const { height, width } = Dimensions.get("window");
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
         <View style={StyleLugares.contact}>
            <BTNlink url={"https://facebook.com"} img={icons.facebook} />
            <BTNlink url={"https://api.whatsapp.com/send?phone=+527491086498&text=Hola"} img={icons.whatsapp} />
            <BTNlink url={"tel:+527491086498"} img={icons.phone} />
            <BTNlink url={"sms:+527491086498"} img={icons.msj} />
            <BTNlink url={"https://www.google.com.mx/"} img={icons.url} />
         </View>
         <View style={StyleLugares.carrusel}>
            <Text style={StyleLugares.carruselText}>Imagenes:</Text>
            <MyCarrusel data={est.img} />
         </View>
         <View style={StyleLugares.carrusel}>
            <Text style={StyleLugares.carruselText}>Imagenes:</Text>
            <MyCarrusel data={est.img} />
         </View>
         <View style={StyleLugares.carrusel}>
            <Text style={StyleLugares.carruselText}>Imagenes:</Text>
            <MyCarrusel data={est.img} />
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