import React, { useEffect, useState } from 'react'
import { StyleRuta } from '../../styles/pages';
import { requestForegroundPermissionsAsync, getCurrentPositionAsync } from 'expo-location'
import { View, TouchableWithoutFeedback, Animated, Image } from 'react-native'
import MapView, { Marker, PROVIDER_OSM, } from 'react-native-maps'
import MapViewDirections from 'react-native-maps-directions'
import { icons } from '../../constants';

export default function Ruta({ ruta, posRuta, cerRuta }) {
   if (ruta.latitude === undefined) {
      ruta = {
         latitude: 19.493037,
         longitude: -98.535733
      }
   }

   const llave = 'asdfghjklñpoiuytrewqqwertyuioplkjhgfds'

   useEffect(() => {
      obtLocations();
   }, [ruta])

   const obtLocations = async () => {
      let { status } = await requestForegroundPermissionsAsync()
      if (status !== 'granted') {
         alert("Permission denied");
         return
      }

      let location = await getCurrentPositionAsync({})
      const current = {
         latitude: location.coords.latitude,
         longitude: location.coords.longitude
      }
      setOrigin(current)
   }

   const [origin, setOrigin] = useState({
      latitude: 19.493037,
      longitude: -98.535733,
   })

   const destino = {
      latitude: ruta.latitude,
      longitude: ruta.longitude,
   }

   return (
      <Animated.View style={[StyleRuta.container, posRuta]}>
         <MapView
            style={StyleRuta.mapa}
            provider={PROVIDER_OSM}
            region={{
               latitude: origin.latitude,
               longitude: origin.longitude,
               latitudeDelta: 0.01,
               longitudeDelta: 0.01,
            }}

         >
            <Marker image={icons.walk} coordinate={origin} />
            <Marker coordinate={destino} />
            <MapViewDirections
               origin={origin}
               destination={destino}
               apikey={llave}
               strokeWidth={3}
               strokeColor="#0f0"
               strokeOpacity={0.8}
            />
         </MapView>

         <TouchableWithoutFeedback onPress={cerRuta} >
            <View style={StyleRuta.iconCon}>
               <Image
                  style={StyleRuta.icon}
                  source={icons.fl}
               />
            </View>
         </TouchableWithoutFeedback>
      </Animated.View>
   )
}
