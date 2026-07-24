/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./**/*.php"],
  theme: {
    extend: {
      colors: {
        'maroon': {
          DEFAULT: '#8B1E1E',
          'dark': '#A61C1C',
        },
        'krem': '#FBEAEA',
        'krem-light': '#FDF3F0',
      },
      fontFamily: {
        'sans': ['Inter', 'sans-serif'],
      }
    },
  },
  plugins: [],
}
