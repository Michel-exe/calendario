import React from 'react'
import { Animated } from 'react-native'
import { StyleFooter } from '../../../styles/pages'
import BtnCerrarMain from '../../components/BtnCerrarMain'
import Lugares from './Lugares'

export default function Main({ position, cerrar, events }) {
   return (
      <Animated.View style={[StyleFooter.containerMain, position]}>
         <BtnCerrarMain event={cerrar} />
         <Lugares events={events} cerrar={cerrar} />
      </Animated.View>
   )
}