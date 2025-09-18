export default function Hero() {
  const containerHero = document.createElement('div');
  containerHero.className = 'hero-section';
  
  containerHero.innerHTML = `
  <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000" data-bs-pause="hover">
    
    <!-- Indicadores -->
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>

    <!-- Slides -->
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="public/assets/images/hotelFora.jpg" class="d-block w-100" alt="Hotel exterior" loading="eager">
      </div>
      <div class="carousel-item">
        <img src="public/assets/images/hall.avif" class="d-block w-100" alt="Hall de entrada" loading="lazy">
      </div>
      <div class="carousel-item">
        <img src="public/assets/images/quarto.avif" class="d-block w-100" alt="Quarto de hotel" loading="lazy">
      </div>
    </div>

    <!-- Controles -->
    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Slide anterior</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Próximo slide</span>
    </button>
  </div>
  `;

  return containerHero;
};