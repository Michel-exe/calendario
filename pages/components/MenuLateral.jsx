import React from 'react'
import { Text, View, Animated, TouchableNativeFeedback, ScrollView, Image } from 'react-native'
import { StyleMenuLateral } from '../../styles/pages';
import { icons, images } from '../../constants';
import menuLateral from '../../data/menuLateral';

export default function MenuLateral({position,cerrar}) {
   return (
      <Animated.View style={[StyleMenuLateral.container,position]}>
         <View style={StyleMenuLateral.header}>
            <Image
               style={StyleMenuLateral.imgLogo}
               source={images.xanthe}
            />
         </View>
         <ScrollView style={{ height: '100%' }}>
            <View style={StyleMenuLateral.lista}>
               {menuLateral.map(ml => {
                  return (
                     <View key={ml.idMenu} style={StyleMenuLateral.contlista}>
                        <Text style={StyleMenuLateral.listaTit}>{ml.tit}</Text>
                        {ml.links.map(m => {
                           return (
                              <View key={m.idlista} style={StyleMenuLateral.listaElement}>
                                 <Text style={StyleMenuLateral.listaDes}>{m.text}</Text>
                              </View>
                           )
                        })
                        }
                     </View>
                  )
               })}
            </View>
         </ScrollView>
         <TouchableNativeFeedback onPress={cerrar} >
            <Image
               style={StyleMenuLateral.imgIcon}
               source={icons.cerrar}
            />
         </TouchableNativeFeedback>
      </Animated.View>
   )
}