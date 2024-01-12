module.exports = {
  content: ["../**.php",
  "../**/**.php",],
  theme: {
    screens: {
      sm: '480px',
      md: '580px',
      lg: '976px',
      xl: '1024px',
      xxl: '1400px',
    },
    extend: {
      colors: {
        orange: '#ff7a00',
        blue: '#0a2882',
        grey: '#c7ced2',
        lilac: '#6476fa',
        yellow: '#ffd428',
        
      }
    },
  },
  
  plugins: [
    function ({ addVariant }) {
        addVariant('child', '& > *');
        addVariant('child-hover', '& > *:hover');
    }
],
  important: true,
}
