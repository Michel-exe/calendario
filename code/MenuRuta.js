import { useState } from 'react'
import { Animated, Dimensions } from 'react-native'
import Constants from 'expo-constants'

const MenuRuta = () => {
    const marginTop = Constants.statusBarHeight
    const width = Dimensions.get("window").width;
    const [position] = useState(new Animated.ValueXY({ x: width, y: -marginTop }))

    return {
        actRuta: () => {
            Animated.timing(position, {
                toValue: { x: 0, y: -marginTop },
                duration: 200,
                useNativeDriver: false
            }).start();
        },
        cerRuta: () => {
            Animated.timing(position, {
                toValue: { x: width, y: -marginTop },
                duration: 200,
                useNativeDriver: false
            }).start();
        },
        posRuta: position.getLayout()
    }

}



export { MenuRuta }
