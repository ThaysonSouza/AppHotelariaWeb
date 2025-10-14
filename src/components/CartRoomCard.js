export default function CartRoomCard(room, index) {
    const card = document.createElement('div');
    card.className = "cart-room-card";
    
    card.innerHTML = `
        <div class="container-fluid">
            <div class="row cart-room-row align-items-center">
                <div class="col-md-4">
                    <div class="room-info">
                        <div class="room-category">${room?.nome ?? 'Quarto'}</div>
                        <div class="bed-config">${room?.camaCasal ?? 0} casal • ${room?.camaSolteiro ?? 0} solteiro</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="occupancy-info">
                        <span class="fs-4">${room?.capacidade ?? ((room?.camaCasal ?? 0)*2 + (room?.camaSolteiro ?? 0))} hóspedes</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="price-info">
                        <span class="current-price">R$ ${(room?.preco ?? 0).toFixed(2)}</span>
                        <button class="btn btn-sm btn-outline-danger ms-2" data-remove-index="${index}">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    `;
    
    return card;
};
