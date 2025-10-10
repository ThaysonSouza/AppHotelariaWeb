export default function CartRoomCard(room, index) {
    const card = document.createElement('div');
    card.className = "cart-room-card";
    
    card.innerHTML = `
        <div class="container-fluid">
            <div class="row cart-room-row align-items-center">
                <div class="col-md-4">
                    <div class="room-info">
                        <div class="room-category">Quarto</div>
                        <div class="bed-config"></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="occupancy-info">
                        <span class="fs-4">total de pessoas</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="price-info">
                        <span class="current-price">R$ Preço total</span>
                        <button class="btn btn-sm btn-outline-danger ms-2" onclick="removeFromCart(${index})">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    `;
    
    return card;
};
