import React from 'react'
import { View, Image } from 'react-native'
import { StyleFooter } from '../../../styles/pages'

export default function Nav({ img }) {
   return (
      <View style={StyleFooter.nav} >
         <Image
            style={StyleFooter.navImg}
            source={img}
         />
      </View>
   )
}