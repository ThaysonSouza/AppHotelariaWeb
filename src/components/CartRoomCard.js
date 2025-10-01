export default function CartRoomCard(roomData, index) {
    const card = document.createElement('div');
    card.className = "cart-room-card";
    card.setAttribute('data-room-id', roomData.id || index);
    
    // Calcular desconto se houver
    const discount = roomData.originalPrice && roomData.price ? 
        Math.round(((roomData.originalPrice - roomData.price) / roomData.originalPrice) * 100) : 0;
    
    card.innerHTML = `
        <div class="container-fluid">
            <div class="row cart-room-row align-items-center">
                <div class="col-md-4">
                    <div class="room-info">
                        <h6 class="room-category">${roomData.category}</h6>
                        <div class="bed-config">
                            ${roomData.bedConfig}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="occupancy-info">
                        ${roomData.occupancy}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="price-info">
                        ${roomData.originalPrice ? `<span class="original-price">R$ ${roomData.originalPrice.toLocaleString('pt-BR')}</span>` : ''}
                        <span class="current-price">R$ ${roomData.price.toLocaleString('pt-BR')}</span>
                        ${roomData.taxes ? `<div class="taxes">${roomData.taxes}</div>` : ''}
                        ${discount > 0 ? `<span class="discount-badge">${discount}% off</span>` : ''}
                        ${roomData.genius ? '<span class="genius-badge">Genius</span>' : ''}
                    </div>
                </div>
            </div>
        </div>
    `;
    
    return card;
}
