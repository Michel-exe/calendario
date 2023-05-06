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
		backgroundColor: COLORS.primary
	}
})
const StylesMapa = StyleSheet.create({
	container: {
		...atajos.tamano,
		zIndex: -1,
	},
	image: {
		width: 35,
		height: 35,
		resizeMode: 'contain',
	},
	tapa: {
		...atajos.tamano,
		height: '10%',
		top: 0,
		height: 65,
		paddingLeft: 20,
		paddingRight: 20,
		backgroundColor: COLORS.primary,
		borderBottomLeftRadius: RADIUS.large,
		borderBottomRightRadius: RADIUS.large,
		...SHADOWS.medium,
		position: 'absolute',
		alignItems: 'center',
		justifyContent: 'space-between',
		flexDirection: 'row',
	},
	text: {
		fontSize: SIZES.large,
		letterSpacing: 2,
		fontWeight: 'bold',
		color: COLORS.tertiary
	},
	logo:{
		position: 'absolute',
		top: 100,
		right: 0,
		width: 50,
		height: 30,
	},
	imgLogo:{
		width: 50,
		height: 30,
		resizeMode: 'contain',
	},
})
const StyleMenuLateral = StyleSheet.create({
	container: {
		...atajos.tamano,
		position: 'absolute',
		left: 0,
		top: 200,
		borderTopRightRadius: RADIUS.xxlarge,
		borderBottomRightRadius: RADIUS.xxlarge,
	},
	header: {
		height: 70,
		backgroundColor: COLORS.primary,
	},
	imgLogo: {
		width: .7 * width,
		height: 50,
		marginTop: 10,
		...atajos.margin,
		resizeMode: 'contain',
	},
	lista: {
		width: '100%',
		height: '100%',
		backgroundColor: COLORS.primary,
		...SHADOWS.medium,
		paddingBottom: .5 * height,
	},
	contlista: {
		width: '90%',
		left: '5%',
		borderBottomColor: COLORS.second,
		marginBottom: 15,
		paddingBottom: 15,
		borderBottomWidth: 2,
	},
	listaTit: {
		fontSize: SIZES.large,
		fontWeight: 'bold',
		letterSpacing: 3,
		marginBottom: 10,
		color: COLORS.tertiary
	},
	listaElement: {
		// width: '95%',
		// left: '2.5%',
		marginBottom: 5,
		paddingBottom: 5,
	},
	listaDes: {
		fontSize: SIZES.medium,
		fontWeight: 'bold',
		letterSpacing: 3,
		color: COLORS.black2,
		backgroundColor: COLORS.second,
		borderRadius: RADIUS.xlarge,
		padding: 15,
	},
	imgIcon: {
		position: 'absolute',
		top: 15,
		right: 15,
		width: 35,
		height: 35,
	},
})
const StyleFooter = StyleSheet.create({
	container: {
		position: 'absolute',
		bottom: 0,
		left: 0,
		...atajos.tamano,
		backgroundColor: COLORS.second,
		borderTopLeftRadius: RADIUS.large,
		borderTopRightRadius: RADIUS.large,
		...SHADOWS.medium,
		height: '9%',
		paddingTop: '2%',
		gap: 5,
	},
	containerBTN: {
		flexDirection: 'row',
		justifyContent: 'space-around',
		...atajos.tamano,
	},
	containerMain: {
		position: 'absolute',
		height: height,
		backgroundColor: COLORS.primaryOpaco,
		width: width,
		top: .55 * height,
		borderTopLeftRadius: RADIUS.xxlarge,
		borderTopRightRadius: RADIUS.xxlarge,

	},
	touch: {
		width: '48%',
		backgroundColor: COLORS.primary,
		...atajos.center,
		borderTopLeftRadius: RADIUS.xxlarge,
		borderTopRightRadius: RADIUS.xxlarge,
	},
	nav: {
		width: '100%',
		height: '100%',
		...atajos.center,
	},
	navImg: {
		width: '90%',
		height: '100%',
		resizeMode: 'contain',
		...atajos.margin
	}
})
const StyleLugares = StyleSheet.create({
	container: {
		width: '100%',
		height: 50 + (.53 * height),
	},
	container2: {
		width: '100%',
		height: (.25 * height),
	},
	scroll:{
		height: (50 + (.75*height))
	},
	caja: {
		marginBottom: 5,
		...atajos.margin,
		position: 'relative',
		borderWidth: 2,
		borderColor: COLORS.tertiary,
		padding: 10,
		marginVertical: 5,
		borderRadius: 5,
		width: '95%',
		borderRadius: RADIUS.xxlarge,
	},
	cajaTit: {
		textTransform: 'uppercase',
		fontWeight: 600,
		letterSpacing: 1,
		fontSize: SIZES.xlarge,
		fontWeight: 'bold',
		marginBottom: 5,
		color: COLORS.tertiary,
		textAlign: 'center',
	},
	cajaDescription: {
		marginTop: 3,
	},
	cajaHijo: {
		position: 'relative',
		backgroundColor: COLORS.second,
		borderRadius: RADIUS.xlarge,
		padding: 15,
		marginVertical: 5,
		width: '100%',
		...atajos.margin,
	},
	cajaHijoTit:{
		textTransform: 'uppercase',
		letterSpacing: 1,
		fontWeight: 'bold',
		fontSize: SIZES.medium,
	},
	cajaHijoSubTit:{
		textTransform: 'uppercase',
		fontWeight: 600,
		fontWeight: 'bold',
		width: '100%',
		fontSize: SIZES.medium,
	},
	cajaHijoTit2:{
		textTransform: 'uppercase',
		letterSpacing: 2,
		fontWeight: 'bold',
		width: '100%',
		fontSize: SIZES.large,
		textAlign: 'center',
		marginTop: 5,
	},
	cajaHijoDes:{
		color: COLORS.black2,
	},
	carrusel:{
		flex: 1,
		width: '95%',
		marginLeft: '2.5%',
		height: '100%',
		maxHeight: .35 * height,
		marginTop: 30,
		marginBottom: 10,
		// flexDirection: 'row',
		// flexWrap: 'wrap',
		// alignItems: 'center',
		// justifyContent: 'center',
		// gap: 10,
		// height: (.35*height)*4,
	},
	carruselText:{
		fontSize: SIZES.xlarge,
		color: COLORS.tertiary,
		fontWeight: 'bold',
		marginBottom: 10,
	},
	carruselImg:{
		width: '48%',
		height: .35*height,
	},
	contact:{
		marginTop: 10,
		marginRight: 30,
		flexDirection: 'row',
		justifyContent: 'flex-end',
		gap: 10,
	},
	contactBtnText:{
		color: COLORS.primary,
		fontSize: SIZES.medium,
		textAlign: 'center',
		fontWeight: 'bold',
		letterSpacing: 2,
	},

})
const StyleRuta = StyleSheet.create({
	container:{
		width:'100%',
		height: (marginTop+height),
		position:'absolute',
		backgroundColor: COLORS.primary
	},
	mapa: {
		...atajos.tamano,
		position:'absolute',
		top: 0,
		height: (marginTop+height),
	},
	iconCon:{
		width: 45, 
		height: 45, 
		padding: 5,
		position: 'absolute',
		top: '6%', 
		left: '3%',
		backgroundColor: COLORS.primary,
		borderRadius: RADIUS.xxlarge,
		...atajos.center,
        borderColor: COLORS.tertiary,
        borderWidth: 2,
	},
	icon: {
		width: '100%',
		height: '100%',
		resizeMode:'cover',
	}
})
export { StylesMapa, Establecimientos, StyleMenuLateral, StyleFooter, StyleLugares, StyleRuta }