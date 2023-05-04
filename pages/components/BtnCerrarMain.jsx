import { View, Image, TouchableOpacity } from 'react-native'
import React from 'react'
import { icons } from '../../constants'
import { BtnCerrar } from '../../styles/styles'


export default function BtnCerrarMain({ event }) {
   return (
      <View style={BtnCerrar.container}>
         <TouchableOpacity
            style={BtnCerrar.touch}
            onPress={event}
         >
            <Image
               style={BtnCerrar.img}
               source={icons.cerrar}
            />
         </TouchableOpacity>
      </View>
   )
}