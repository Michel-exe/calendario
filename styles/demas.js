import { StyleSheet, Dimensions } from 'react-native'
import atajos from './atajos';
import Constants from 'expo-constants'
import { COLORS, RADIUS, SHADOWS, SIZES } from '../constants';
import { Colors } from 'react-native/Libraries/NewAppScreen';

const marginTop = Constants.statusBarHeight
const { height, width } = Dimensions.get("window");

const Establecimientos = StyleSheet.create({
	container: {
		marginTop: marginTop,
		position: 'relative',
		width: width,
		height: height,
	},
   scroll:{
      height: height - 60,
   }
})
const StylesHeader = StyleSheet.create({
   container:{
		backgroundColor: COLORS.primary,
      height: 60,
      paddingLeft: 20,
      paddingRight: 20,
      ...atajos.center
   },
   tit: {
      fontSize: SIZES.xlarge,
      color: COLORS.tertiary,
      textAlign: 'center',
      fontWeight: 'bold',
      letterSpacing: 3,
   }
})
const StylesTerminos = StyleSheet.create({
   container: {
      width: '90%',
      marginLeft: '5%',
      paddingTop: 10,
      marginBottom: .5 * height
   },
   term: {
      marginTop: 10
   },
   text: {
      fontSize: SIZES.large,
      fontWeight: 'bold',
   },
   desc: {
      fontSize: SIZES.medium,
      textAlign: 'justify'
   },
})

export { StylesTerminos, Establecimientos, StylesHeader }