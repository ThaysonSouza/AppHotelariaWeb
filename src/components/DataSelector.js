export default function DataSelector() {
  const container = document.createElement('div');
  container.className = 'container mt-4';

  container.innerHTML = `
   <div class="container my-5">
  <div class="row g-4 justify-content-center">

    <!-- Card 1: Suíte Elegance -->
    <div class="col-md-6 col-lg-4">
      <div class="card border-0 shadow rounded-4">
        <div id="carouselElegance" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
          <div class="carousel-inner rounded-top">
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
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselElegance" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselElegance" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Próximo</span>
          </button>
        </div>
        <div class="card-body p-4">
          <h5 class="card-title fw-semibold text-dark">Suíte Elegance</h5>
          <p class="card-text text-muted">
            Ambientes separados, banheira de hidromassagem, chuveiro independente, Nespresso, Smart TV, ar-condicionado, mesa de trabalho e Wi-Fi gratuito.
          </p>
          <a href="#" class="btn btn-primary w-100 rounded-pill">Reservar</a>
        </div>
      </div>
    </div>

    <!-- Card 2: Suíte Luxo -->
    <div class="col-md-6 col-lg-4">
      <div class="card border-0 shadow rounded-4">
        <div id="carouselLuxo" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
          <div class="carousel-inner rounded-top">
            <div class="carousel-item active">
              <img src="public/assets/images/suiteLuxo1.jpg" class="d-block w-100" alt="Suíte Luxo - Vista principal">
            </div>
            <div class="carousel-item">
              <img src="public/assets/images/suiteLuxo2.jpg" class="d-block w-100" alt="Banheiro da suíte luxo">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselLuxo" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselLuxo" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Próximo</span>
          </button>
        </div>
        <div class="card-body p-4">
          <h5 class="card-title fw-semibold text-dark">Suíte Luxo</h5>
          <p class="card-text text-muted">
            Banheira panorâmica, vista para a cidade, minibar, iluminação ambiente, cama king-size e serviço exclusivo.
          </p>
          <a href="#" class="btn btn-primary w-100 rounded-pill">Reservar</a>
        </div>
      </div>
    </div>

  </div>
</div>

  `;

  // Contadores
  const adultCount = container.querySelector('#adultCount');
  const childCount = container.querySelector('#childCount');
  const roomCount = container.querySelector('#roomCount');

  const updateCount = (element, delta) => {
    let value = parseInt(element.textContent);
    value = Math.max(0, value + delta);
    element.textContent = value;
  };

  container.querySelector('#adultMinus').onclick = () => updateCount(adultCount, -1);
  container.querySelector('#adultPlus').onclick = () => updateCount(adultCount, 1);
  container.querySelector('#childMinus').onclick = () => updateCount(childCount, -1);
  container.querySelector('#childPlus').onclick = () => updateCount(childCount, 1);
  container.querySelector('#roomMinus').onclick = () => updateCount(roomCount, -1);
  container.querySelector('#roomPlus').onclick = () => updateCount(roomCount, 1);

  // Submit
  container.querySelector('#searchForm').addEventListener('submit', (e) => {
    e.preventDefault();

    const destino = container.querySelector('#destino').value;
    const checkin = container.querySelector('#checkin').value;
    const checkout = container.querySelector('#checkout').value;
    const adultos = adultCount.textContent;
    const criancas = childCount.textContent;
    const quartos = roomCount.textContent;
    const pets = container.querySelector('#petsSwitch').checked;

    console.log('Busca iniciada com os seguintes dados:');
    console.log({ destino, checkin, checkout, adultos, criancas, quartos, pets });

    // Aqui você pode integrar com API ou redirecionar
  });

  return container;
}
