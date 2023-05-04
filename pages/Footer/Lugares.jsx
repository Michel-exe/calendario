import React from 'react'
import { Text, View, TouchableNativeFeedback, ScrollView } from 'react-native'
import establecimientos from '../../data/establecimientos'
import { StyleLugares } from '../../styles/pages';

export default function Lugares({events:{setloc,settext,seturi},cerrar}) {
   return (
      <View style={StyleLugares.container}>
         <ScrollView style={StyleLugares.scroll}>
            <View >
               {establecimientos.map(est => {
                  return (
                     <View key={est.idCat} style={StyleLugares.caja}>
                        <Text style={StyleLugares.cajaTit}>{est.category}</Text>
                        <View>
                           {est.data.map(data => {
                              return (
                                 <TouchableNativeFeedback key={data.id}
                                    onPress={()=>{
                                       cerrar()
                                       settext(data.name)
                                       seturi(data.url)
                                       setloc(data.loc)
                                    }}
                                 >
                                    <View style={StyleLugares.cajaHijo}>
                                       <Text style={StyleLugares.cajaHijoTit}>{data.name}</Text>
                                       <Text style={StyleLugares.cajaHijoDes}>{data.refe}</Text>
                                    </View>
                                 </TouchableNativeFeedback>
                              )
                           })}
                        </View>
                     </View>
                  )
               })
               }
            </View>
         </ScrollView>
      </View>
   )
}
