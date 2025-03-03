module.exports = {
  theme: {
    extend: {
      colors: {
        'ocean-green': {
          '50': '#eefbf3',
          '100': '#d5f6e0',
          '200': '#aeecc6',
          '300': '#79dca6',
          '400': '#38b273',
          '500': '#20a967',
          '600': '#138852',
          '700': '#0f6d44',
          '800': '#0e5737',
          '900': '#0d472f',
          '950': '#06281b',
        },
      },
    },
  },
  // Update the color references in the header and footer to use the 'ocean-green' 500 color.
  header: {
    backgroundColor: '#20a967',
  },
  footer: {
    backgroundColor: '#20a967',
  },
}
