import React from 'react'
import { View, Text, Image, TouchableOpacity } from 'react-native'
import { icons } from '../../constants'
import { home } from '../../styles/styles'

export default function Home({seturi,settext,setRuta}) {
    return (
        <TouchableOpacity
            onPress={() => {
                settext("Nanacamilpa")
                seturi("https://www.google.com/maps/d/edit?mid=10p5gr5ryGSJ1XzxRrjJWSM32x_V36rI&usp=sharing")
                setRuta({
                    latitude: 19.49597,
                    longitude: -98.53468
                 })
            }}
            style={home.container}
        >
            <Image
                style={home.icon}
                source={icons.home}
            />
        </TouchableOpacity>
    )
}