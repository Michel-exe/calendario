import {StyleSheet, Dimensions} from 'react-native'
import {SIZES,TEXTS,RADIUS,COLORS,SHADOWS} from '../constants/'
import atajos from './atajos';
import { Share } from 'react-native-web';

const { height, width } = Dimensions.get("window");

const alert = StyleSheet.create({
    Container:{
        position:'absolute',
        top: 0,
        width: '100%',
        height: '100%',
        ...atajos.center,
        zIndex: 99,
    },
    alerta: {
        left: '10%',
        width: '80%',
        height: '28%',
        ...atajos.center,
        backgroundColor: COLORS.lightWhite,
        padding: 20,
        borderRadius: RADIUS.xxlarge,
        ...SHADOWS.medium
    },
    tittle: {
        fontSize: SIZES.xxlarge,
        color: TEXTS.original,
        fontWeight: '900',
    },
    description: {
        fontSize: SIZES.medium,
        color: TEXTS.black
    }
})
const button = StyleSheet.create({
    primary: {
        ...atajos.button,
        ...atajos.center,
        backgroundColor: COLORS.primary,
    },
    second:{
        ...atajos.button,
        ...atajos.center,
        borderColor: COLORS.primary,
        borderWidth: 2,
    },
    tertiary:{
        ...atajos.button,
        ...atajos.center,
    },
    text:{
        textAlign: 'center',
        letterSpacing: 2,
        fontSize: SIZES.medium,
        textTransform: 'uppercase',
        color: COLORS.black,
        fontWeight: '900'
    },
    textSecond: {
        color: COLORS.second,
    },
})
const BtnCerrar = StyleSheet.create({
    container:{
        width: width,
        height: 50,
        justifyContent: 'flex-end',
        paddingRight: 20,
    },
    touch:{
        width: 40,
        height: 30,
        marginBottom: 10,
        marginLeft: 'auto',
    },
    img: {
        width: '100%',
        height: '100%',
        resizeMode: 'contain',
    }
})
const home = StyleSheet.create({
    container: {
        position: 'absolute',
        top: 75,
        left: '2.5%',
        width: 50,
        height: 50,
        padding: 7.5,
        borderRadius: RADIUS.xxlarge,
        backgroundColor: COLORS.primary,
        borderColor: COLORS.tertiary,
        borderWidth: 2,
    },
    icon: {
        width: '100%',
        height: '100%',
        resizeMode: 'cover',
    }
})

export {alert,button,BtnCerrar,home}