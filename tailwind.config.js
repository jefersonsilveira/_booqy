/** @type {import('tailwindcss').Config} */
export default {
  darkMode: 'class',
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "node_modules/flowbite-vue/**/*.{js,jsx,ts,tsx}",
    "node_modules/flowbite/**/*.{js,jsx,ts,tsx}",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {
      fontFamily: {
        Axiforma: ["Axiforma", "sans-serif"],
        Red_Hat_Display: ["Red Hat Display", "sans-serif"],
        Red_Hat_Text: ["Red Hat Text", "sans-serif"],
       },
    },
  },
  plugins: [
    require('flowbite/plugin')
    // require("@tailwindcss/forms"),
    // require("@tailwindcss/typography"),
  ],
}