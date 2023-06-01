<style>
.hero-icons-section{
   height: 19vh;
} 
.box-icons{
   display: flex;
   flex-direction: row;
   justify-content: center;
}
.inner-boxes-icons{
    display: flex;
    flex-direction: column;
    justify-content: center,space-between;
    text-align: center;
    margin: 40px;
    margin-top: 32px;
}
.inner-boxes-icons h2{
   font-size: 25px;
   font-weight: bold;
   background: -webkit-linear-gradient(rgb(20, 60, 24), rgb(21, 4, 4));
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}
 .mid-icons{
    font-size: 70px;
    background: -webkit-linear-gradient(rgb(20, 60, 24), rgb(21, 4, 4));
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
 }
 
 h2 i{
   color: green;
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
    height: 120vh;
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
          <h2><i class="fa-regular fa-circle-check"></i> Pago seguro</h2>
          <i class="mid-icons fa-solid fa-money-bill"></i>
          <p>Transacciones seguras con <b>®Mercado Pago</b>.</p>
      </div>
   </div>  
</div>