export default function DataSelector() {
  const container = document.createElement('div');
  container.className = 'data-selector-container';

  container.innerHTML = `
<div class="container my-4">
  <div class="row g-4 justify-content-center">

    <!-- Card 1: Suíte Elegance -->
    <div class="col-md-6 col-lg-4">
      <div class="card border-0 shadow rounded">
        <div id="dataCarousel1" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="public/assets/images/suitePaulista.jpg" class="d-block w-100" alt="Suíte Elegance" loading="lazy" style="height: 250px; object-fit: cover;">
            </div>
            <div class="carousel-item">
              <img src="public/assets/images/suitePaulista2.jpg" class="d-block w-100" alt="Suíte Elegance" loading="lazy" style="height: 250px; object-fit: cover;">
            </div>
            <div class="carousel-item">
              <img src="public/assets/images/suitePaulista3.jpg" class="d-block w-100" alt="Suíte Elegance" loading="lazy" style="height: 250px; object-fit: cover;">
            </div>
            <div class="carousel-item">
              <img src="public/assets/images/suitePaulista4.jpg" class="d-block w-100" alt="Suíte Elegance" loading="lazy" style="height: 250px; object-fit: cover;">
            </div>
            <div class="carousel-item">
              <img src="public/assets/images/suitePaulista5.jpg" class="d-block w-100" alt="Suíte Elegance" loading="lazy" style="height: 250px; object-fit: cover;">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#dataCarousel1" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#dataCarousel1" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
          </button>
        </div>
        <div class="card-body">
          <h5 class="card-title">Suíte Elegance</h5>
          <p class="card-text">Ambientes separados, banheira de hidromassagem, chuveiro independente, Nespresso, Smart TV, ar-condicionado, mesa de trabalho e Wi-Fi gratuito.</p>
          <a href="#" class="btn btn-primary w-100">Reservar</a>
        </div>
      </div>
    </div>

    <!-- Card 2: Suíte Luxo -->
    <div class="col-md-6 col-lg-4">
      <div class="card border-0 shadow rounded">
        <div id="dataCarousel2" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="public/assets/images/suiteJunior.jpg" class="d-block w-100" alt="Suíte Luxo" loading="lazy" style="height: 250px; object-fit: cover;">
            </div>
            <div class="carousel-item">
              <img src="public/assets/images/suiteJunior2.jpg" class="d-block w-100" alt="Suíte Luxo" loading="lazy" style="height: 250px; object-fit: cover;">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#dataCarousel2" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#dataCarousel2" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
          </button>
        </div>
        <div class="card-body">
          <h5 class="card-title">Suíte Luxo</h5>
          <p class="card-text">Banheira panorâmica, vista para a cidade, minibar, iluminação ambiente, cama king-size e serviço exclusivo.</p>
          <a href="#" class="btn btn-primary w-100">Reservar</a>
        </div>
      </div>
    </div>

  </div>
</div>

  `;

  return container;
}
