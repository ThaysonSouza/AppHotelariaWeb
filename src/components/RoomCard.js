export default function RoomCard() {
  const containerCard = document.createElement('div');
  containerCard.className = 'room-cards-container';
  
  // IDs únicos simples
  const id1 = 'roomCarousel1';
  const id2 = 'roomCarousel2';

  containerCard.innerHTML = `
<div class="container my-4">
  <div class="row g-4 justify-content-center">

    <!-- Card 1: Suíte Elegance -->
    <div class="col-md-6 col-lg-4">
      <div class="card shadow-sm rounded">
        <div id="${id1}" class="carousel slide" data-bs-ride="carousel">
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
          <button class="carousel-control-prev" type="button" data-bs-target="#${id1}" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#${id1}" data-bs-slide="next">
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

    <!-- Card 2: Suíte Royal -->
    <div class="col-md-6 col-lg-4">
      <div class="card shadow-sm rounded">
        <div id="${id2}" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="public/assets/images/suiteJunior.jpg" class="d-block w-100" alt="Suíte Royal" loading="lazy" style="height: 250px; object-fit: cover;">
            </div>
            <div class="carousel-item">
              <img src="public/assets/images/suiteJunior2.jpg" class="d-block w-100" alt="Suíte Royal" loading="lazy" style="height: 250px; object-fit: cover;">
            </div>
            <div class="carousel-item">
              <img src="public/assets/images/suiteJunior3.jpg" class="d-block w-100" alt="Suíte Royal" loading="lazy" style="height: 250px; object-fit: cover;">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#${id2}" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#${id2}" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
          </button>
        </div>
        <div class="card-body">
          <h5 class="card-title">Suíte Royal</h5>
          <p class="card-text">Sala de estar espaçosa, banheira de hidromassagem, chuveiro separado e comodidades como Nespresso, Smart TV, ar-condicionado, mesa de trabalho e Wi-Fi gratuito.</p>
          <a href="#" class="btn btn-primary w-100">Reservar</a>
        </div>
      </div>
    </div>

  </div>
</div>
`;

  return containerCard;
}; 