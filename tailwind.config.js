/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
     "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {
      fontFamily: {
        manrope: ['Manrope', 'sans-serif'], 
      },
      backgroundImage: {
        'navbar': "url('./images/batik1.png')",
      },
    },
  },
  plugins: [
    require('daisyui'),
    require('flowbite/plugin')
  ],
}

