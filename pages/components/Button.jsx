import React from 'react'
import { View, Text, TouchableNativeFeedback, TouchableOpacity, Linking, Image } from 'react-native'
import { button } from '../../styles/styles'

export const BTNprimary = ({ event }) => {
   return (
      <TouchableNativeFeedback onPress={() => { event(0) }}>
         <View style={button.primary}>
            <Text style={button.text}>aceptar</Text>
         </View>
      </TouchableNativeFeedback>
   )
}
export const BTNsecond = ({ event }) => {
   return (
      <TouchableNativeFeedback onPress={() => { event(0) }}>
         <View style={button.second}>
            <Text style={{ ...button.text, ...button.textSecond }}>aceptar</Text>
         </View>
      </TouchableNativeFeedback>
   )
}
export const BTNtertiary = ({ event }) => {
   return (
      <TouchableNativeFeedback onPress={() => { event(0) }}>
         <View style={button.tertiary}>
            <Text style={button.text}>aceptar</Text>
         </View>
      </TouchableNativeFeedback>
   )
}
export const BTNlink = ({ img, url }) => {
   const handlePress = () => Linking.openURL(url);
   return (
      <TouchableOpacity style={button.contactTouch} onPress={handlePress} >
         <Image
            style={button.contactImg}
            source={img}
         />
      </TouchableOpacity>
   )
}
