/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  
  theme: {
    extend:{
        backgroundImage:{
          bg:"url('../../public/img/bg.png')",
          background:"url('../../public/img/background.png')",
          background2:"url('../../public/img/background2.png')",
        },
        colors:{
          bg:"#F0F0F2",
          main:"#FFF",
          hover:"#BFBFBF",
          text:"#403F3D",
          buttonlogin:"#ffa69e"
        },
        boxShadow: {
          'custom': '2px 4px 10px rgba(0, 0, 0, 0.3)',
          'nav': '0 30px 30px rgba(0, 0, 0, 0.3)',
        },
    },
  },
  plugins: [
    require('daisyui'),
    
  ],
}

