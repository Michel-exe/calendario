import React, { useState } from 'react'
import { View, Text } from 'react-native'
import { alert } from '../../styles/styles'
import { BTNprimary } from './Button'

export default function Alerta({ text, desc }) {
   let [element, setElement] = useState(0);
   return (
      <View style={{display:(element===1 ? 'flex' : 'none'), ...alert.Container}}>
         <View style={alert.alerta}>
            <Text style={alert.tittle}>{text}</Text>
            <Text style={alert.description}>{desc}</Text>
            <BTNprimary event={setElement} />
         </View>
      </View>
   )
}
