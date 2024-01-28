/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",    
  ],
  theme: {
    extend: {
      colors: {
        text: '#69665c',
      },
      fontWeight: {
        normal: 300,
      }
    },
    colors: {
      'blue': '#d1e5f7',
      'yellow': '#fff9de',
      'purple': '#d2ceff',
      'green': '#daf2d6',
      'gray': '#b2afa1',
      'gray-dark': '#69665c',
      'pink': '#ffcece',
      'white': '#fff',
    },
    fontFamily: {
      sans: ['Ubuntu', 'sans-serif'],
    },
  },
  plugins: [],
  purge: false,
}

