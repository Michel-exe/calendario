import { View, Text } from 'react-native'
import React from 'react'
import { StylesTerminos } from '../../styles/demas'
import terminos from '../../data/terminos'

export default function Terminos() {
   return (
      <View style={StylesTerminos.container}>
         {terminos.map(({ text, desc }) => {
            return (
               <View style={StylesTerminos.term}>
                  <Text style={StylesTerminos.text}>{text}</Text>
                  <Text style={StylesTerminos.desc}>{desc}</Text>
               </View>
            )
         })}
      </View>
   )
}