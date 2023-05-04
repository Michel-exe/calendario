import { useState } from 'react'
import { Animated, Dimensions } from 'react-native'

const Animacion = () => {
    const width = Dimensions.get("window").width;
    const [position] = useState(new Animated.ValueXY({ x: -width, y: 0 }))

    return {
        actMl: () => {
            Animated.timing(position, {
                toValue: { x: 0, y: 0 },
                duration: 300,
                useNativeDriver: false
            }).start();
        },
        cerMl: () => {
            Animated.timing(position, {
                toValue: { x: -width, y: 0 },
                duration: 300,
                useNativeDriver: false
            }).start();
        },
        posMl: position.getLayout()
    }

}



export { Animacion }
