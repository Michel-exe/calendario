import React, { useState, useRef } from 'react'
import { View, Text, StyleSheet, Image, FlatList, Animated, useWindowDimensions } from 'react-native'

const images = [
   { idima: "img1", item: "https://resizer.otstatic.com/v2/photos/wide-huge/2/47967436.jpg", },
   { idima: "img2", item: "https://cdn.pixabay.com/photo/2016/11/18/14/05/brick-wall-1834784_640.jpg", },
   { idima: "img3", item: "https://cdn.pixabay.com/photo/2015/11/19/10/38/food-1050813_1280.jpg", },
   { idima: "img4", item: "https://cdn.pixabay.com/photo/2021/03/16/10/04/street-6099209_1280.jpg", },
   { idima: "img5", item: "https://cdn.pixabay.com/photo/2016/11/18/15/53/breakfast-1835478_1280.jpg", },
   { idima: "img6", item: "https://cdn.pixabay.com/photo/2016/03/05/19/02/salmon-1238248_1280.jpg", },
   { idima: "img7", item: "https://resizer.otstatic.com/v2/photos/wide-huge/2/47967436.jpg", },
]

export default function Carrusel() {
   return (
      <View style={{ width: '100%', height: '100%', flex: 1, }}>
         <Text>Hola </Text>
      </View>
   )
}