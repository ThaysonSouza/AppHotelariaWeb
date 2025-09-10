export default function RoomCard() {
  const containerCard = document.createElement('div');
  containerCard.className = 'card'

  containerCard.innerHTML =`
<div class="container my-4">
  <div class="row g-4 justify-content-center">

    <!-- Card 1: Suíte Elegance -->
    <div class="col-md-6 col-lg-4">
      <div class="card shadow-sm rounded" style="width: 100%;">
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="public/assets/images/suitePaulista.jpg" class="d-block w-100" alt="Vista da suíte Paulista">
            </div>
            <div class="carousel-item">
              <img src="public/assets/images/suitePaulista2.jpg" class="d-block w-100" alt="Banheiro da suíte">
            </div>
            <div class="carousel-item">
              <img src="public/assets/images/suitePaulista3.jpg" class="d-block w-100" alt="Área de descanso">
            </div>
            <div class="carousel-item">
              <img src="public/assets/images/suitePaulista4.jpg" class="d-block w-100" alt="Detalhes de decoração">
            </div>
            <div class="carousel-item">
              <img src="public/assets/images/suitePaulista5.jpg" class="d-block w-100" alt="Vista da janela">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Próximo</span>
          </button>
        </div>
        <div class="card-body">
          <h5 class="card-title">Suíte Elegance</h5>
          <p class="card-text">
            Ambientes separados, banheira de hidromassagem, chuveiro independente, Nespresso, Smart TV, ar-condicionado, mesa de trabalho e Wi-Fi gratuito. Conforto e sofisticação em cada detalhe.
          </p>
          <a href="#" class="btn btn-primary w-100">Reservar</a>
        </div>
      </div>
    </div>

    <!-- Card 2: Suíte Luxo -->
    <div class="col-md-6 col-lg-4">
      <div class="card shadow-sm rounded" style="width: 100%;">
        <div id="carouselSuiteLuxo" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="public/assets/images/suiteLuxo1.jpg" class="d-block w-100" alt="Suíte Luxo - Vista principal">
            </div>
            <div class="carousel-item">
              <img src="public/assets/images/suiteLuxo2.jpg" class="d-block w-100" alt="Banheiro da suíte luxo">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselSuiteLuxo" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselSuiteLuxo" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Próximo</span>
          </button>
        </div>
        <div class="card-body">
          <h5 class="card-title">Suíte Luxo</h5>
          <p class="card-text">
            Banheira panorâmica, vista para a cidade, minibar, iluminação ambiente, cama king-size e serviço exclusivo.
          </p>
          <a href="#" class="btn btn-primary w-100">Reservar</a>
        </div>
      </div>
    </div>

  </div>
</div>

`
return containerCard;
}; 