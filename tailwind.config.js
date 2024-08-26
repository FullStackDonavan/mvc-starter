/** @type {import('tailwindcss').Config} */
module.exports = {
  mode: 'jit',
  content: [
    './public/**/*.php',
    './src/Views/**/*.php',
    './src/resources/js/components/**/*.vue',
  ],
  theme: {
    extend: {
      
      backgroundImage: {
        'gradient-radial': 'radial-gradient(circle, #320643, #140534)',
      },
    }
  },
  plugins: [],
}
