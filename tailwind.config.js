/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./app/Views/**/*.php",
    "./public/**/*.html",
    "./public/**/*.js"
  ],
  theme: {
    extend: {
      colors: {
        primary: {
          DEFAULT: "#F9FAFB"
        },
        green: {
          DEFAULT: "#4CAF50"
        }
      }
    },
  },
  plugins: [],
}

