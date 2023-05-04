import { useState } from 'react'
import { Animated, Dimensions } from 'react-native'

const AnimacionMain2 = () => {
    const height = Dimensions.get("window").height;
    const [position] = useState(new Animated.ValueXY({ x: 0, y: height }))

    return {
        activar: () => {
            Animated.timing(position, {
                toValue: { x: 0, y: + (.35 * height) },
                duration: 400,
                useNativeDriver: false
            }).start();
        },
        cerrar: () => {
            Animated.timing(position, {
                toValue: { x: 0 , y:  (height) },
                duration: 400,
                useNativeDriver: false
            }).start();
        },
        position: position.getLayout()
    }
}
export { AnimacionMain2 }