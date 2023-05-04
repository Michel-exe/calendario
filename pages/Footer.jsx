import React from 'react'
import { View, TouchableOpacity } from 'react-native'
import { StyleFooter } from '../styles/pages'
import Nav from './Footer/Nav'
import { icons } from '../constants'

export default function Footer({ activar, activar2}) {
   return (
      <View style={StyleFooter.container} >
         <View style={StyleFooter.containerBTN} >
            <TouchableOpacity
               style={StyleFooter.touch}
               onPress={activar2}
            >
               <Nav img={icons.ver}/>
            </TouchableOpacity>
            <TouchableOpacity
               style={StyleFooter.touch}
               onPress={activar}
            >
               <Nav img={icons.categories} type={"lugar"} />
            </TouchableOpacity>
         </View>

      </View>
   )
}