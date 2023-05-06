import { View, Text } from 'react-native'
import React from 'react'
import { StylesHeader } from '../../styles/demas'

export default function Header({tit}) {
  return (
    <View style={StylesHeader.container}>
      <Text style={StylesHeader.tit}>{tit}</Text>
    </View>
  )
}