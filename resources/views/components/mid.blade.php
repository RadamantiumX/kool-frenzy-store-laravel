<style>
.hero-icons-section{
   height: 29vh;
   background-image: linear-gradient(to top, rgba(50, 84, 168,0.404)0%,rgba(62, 50, 168,0.404)100%),url('https://i.postimg.cc/R0FVWGJ9/banner.jpg');
     background-size: cover;
     background-repeat: no-repeat;
     background-attachment: fixed;
     background-position: center;
} 
.box-icons{
   display: flex;
   flex-direction: row;
   justify-content: center;
   padding-top: 60px;
}
.inner-boxes-icons{
    display: flex;
    flex-direction: column;
    justify-content: center,space-between;
    text-align: center;
    margin: 40px;
    margin-top: 32px;
}
.inner-boxes-icons p{
   color: #fff;
}
.inner-boxes-icons h2{
   font-size: 25px;
   font-weight: bold;
   background: #fff;
   font-family: 'Permanent Marker', cursive;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}
 .mid-icons{
    font-size: 70px;
    background: #fff;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
 }
 
 h2 i{
   color: #fff;
   font-weight: bold;
   font-size: 27px;
 }
 @media screen and (max-width: 1400px){
   .hero-icons-section{
    height: 40vh;
  }
}
@media screen and (max-width: 900px){
   .hero-icons-section{
    height: 30vh;
  }
}
@media screen and (max-width: 500px){
  .hero-icons-section{
    height: 160vh;
  }
  .box-icons{
  
   flex-direction: column;
   
}
}
</style>
<div class="hero-icons-section">
   <div class="box-icons">
      <div class="inner-boxes-icons">
          <h2><i class="fa-regular fa-circle-check"></i> Diseños únicos</h2>
          <i class="mid-icons fa-solid fa-palette"></i>
          <p>Exclusivos, originales y creaciones totalmente personalizadas.</p>
      </div>
       <div class="inner-boxes-icons middle">
          <h2><i class="fa-regular fa-circle-check"></i> Calidad superior</h2>
          <i class="mid-icons fa-solid fa-award"></i>
          <p>Lo mejor en indumentaria, de primera selección.</p>
      </div>
       <div class="inner-boxes-icons">
          <h2><i class="fa-regular fa-circle-check"></i> Compra segura</h2>
          <i class="mid-icons fa-solid fa-money-bill"></i>
          <p>Transacciones protegidas con <b>®Mercado Pago</b>.</p>
      </div>
   </div>  
</div>