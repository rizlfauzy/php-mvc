/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./public/*.php", "./public/**/*.{js,css,scss}","./app/views/**/*.php"],
  theme: {
    container: {
      center: true,
      padding: "16px",
    },
    extend: {
      screens: {
        "2xl": "1320px",
      },
      colors: {
        dark: "#0f172a",
        primary: "#eaeaea",
        "light-green": "#00ccc9",
        "tertiary-gray": "#949494",
      },
      fontSize: {
        "2xs": "0.5rem",
        md: "1rem",
      },
    },
  },
  plugins: [],
};
