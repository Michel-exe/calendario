import React from 'react'
import { View, Text, Image, TouchableOpacity } from 'react-native'
import { WebView } from 'react-native-webview';
import { StylesMapa } from '../../styles/pages';
import { icons } from '../../constants';
// import { images } from '../../constants';

export default function Mapa({ uri, text, loc, actMl, actRuta, setRuta }) {
   return (
      <View style={StylesMapa.container}>
         <View style={StylesMapa.container}>
            <WebView
               style={StylesMapa.container}
               source={{ uri: uri }}
               originWhitelist={['*']}
            />
         </View>
         <View style={StylesMapa.tapa}>
            <TouchableOpacity onPress={actMl} >
               <Image
                  style={StylesMapa.image}
                  source={icons.menu}
               />
            </TouchableOpacity>
            <Text style={StylesMapa.text}>{text}</Text>
            <TouchableOpacity onPress={() => { setRuta(loc); actRuta(); }} >
               <Image
                  style={StylesMapa.image}
                  source={icons.ruta}
               />
            </TouchableOpacity>
            {/* <View style={StylesMapa.logo}>
               <Image
                  style={StylesMapa.imgLogo}
                  source={images.xanthe}
               />
            </View> */}
         </View>
      </View>
   )
}