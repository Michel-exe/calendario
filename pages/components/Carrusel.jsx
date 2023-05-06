import React from 'react'
import { Dimensions, Image } from 'react-native'
import Carousel from 'react-native-snap-carousel';

export default function MyCarrusel({ data }) {
   const { width } = Dimensions.get("window");
   return (
      <Carousel
         layout={'default'}
         data={data}
         sliderWidth={.95 * width}
         itemWidth={.95 * width}
         itemHeight={300}
         renderItem={({ item }) => {
            return (
               <Image
                  style={{
                     width: '100%',
                     height: '100%',
                     resizeMode: 'cover',
                  }}
                  source={{ uri: item.img }}
               />
            )
         }}

      />
   )
}