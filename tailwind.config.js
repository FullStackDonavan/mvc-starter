/** @type {import('tailwindcss').Config} */
module.exports = {
  mode: 'jit',
  content: [
    './src/Views/**/*.blade.php',
    './src/Views/**/*.php',
    './public/**/*.html',
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
