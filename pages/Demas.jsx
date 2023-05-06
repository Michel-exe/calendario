import React from 'react'
import { View, Text, ScrollView } from 'react-native'
import { Establecimientos } from '../styles/demas';
import Terminos from './Demas/Terminos';
import Header from './Demas/Header';

export default function Demas() {
   return (
      <View style={Establecimientos.container}>
         <Header tit={"Terminos y Condiciones"} />
         <ScrollView style={Establecimientos.scroll}>
            <Terminos />
         </ScrollView>
      </View>
   )
}