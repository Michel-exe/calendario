const COLORS = {
   primary: '#F6E1C3',
   second: '#E9A178',
   tertiary: '#A84448',
   text: '#7A3E65',

   primaryOpaco: '#F6E1C3ee',

   gray: "#83829A",
   gray2: "#C1C0C8",

   white: "#F3F4F8",

   lightWhite: "#FAFAFC",
   black: '#2a2a2a',
   black2: '#3a3a3a'
};
const TEXTS = {
   original: '#7A3E65',
   white: '#F6E1C3',
   black: '#313131'
}
const FONT = {
   regular: "DMRegular",
   medium: "DMMedium",
   bold: "DMBold",
};

const SIZES = {
   xsmall: 10,
   small: 12,
   medium: 16,
   large: 20,
   xlarge: 24,
   xxlarge: 32,
};
const RADIUS = {
   none: 0,
   xsmall: 5,
   small: 10,
   medium: 15,
   large: 20,
   xlarge: 25,
   xxlarge: 30,

}
const SHADOWS = {
   top:{
      shadowColor: "#f00",
      shadowOffset: {
         width: 2,
         height: -10,
      },
      shadowOpacity: 0.9,
      shadowRadius: 3.84,
      elevation: 2,
   },
   small: {
      shadowColor: "#999",
      shadowOffset: {
         width: 2,
         height: 2,
      },
      shadowOpacity: 0.9,
      shadowRadius: 3.84,
      elevation: 4,
   },
   medium: {
      shadowColor: "#000",
      shadowOffset: {
         width: 0,
         height: 2,
      },
      shadowOpacity: 0.25,
      shadowRadius: 5.84,
      elevation: 5,
   },
};

export { COLORS, TEXTS, FONT, SIZES, SHADOWS,RADIUS };
