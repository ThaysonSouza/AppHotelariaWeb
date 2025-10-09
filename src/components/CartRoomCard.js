export default function CartRoomCard(room, index) {
    const card = document.createElement('div');
    card.className = "cart-room-card";
    
    const camas = [
        (room.camaCasal > 0 ? `${room.camaCasal} cama(s) de casal` : null),
        (room.camaSolteiro > 0 ? `${room.camaSolteiro} cama(s) de solteiro` : null),
    ].filter(Boolean).join(' - ');
    
    const totalPessoas = (room.camaCasal * 2) + room.camaSolteiro;
    const precoTotal = (room.preco || 0) * 4; // 4 diárias
    
    card.innerHTML = `
        <div class="container-fluid">
            <div class="row cart-room-row align-items-center">
                <div class="col-md-4">
                    <div class="room-info">
                        <div class="room-category">${room.nome || 'Quarto'}</div>
                        <div class="bed-config">${camas}</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="occupancy-info">
                        <span class="fs-4">${totalPessoas}</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="price-info">
                        <span class="current-price">R$ ${precoTotal.toFixed(2)}</span>
                        <button class="btn btn-sm btn-outline-danger ms-2" onclick="removeFromCart(${index})">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    `;
    
    return card;
}

// Função global para remover do carrinho
window.removeFromCart = function(index) {
    try {
        let cartRooms = JSON.parse(localStorage.getItem('cartRooms')) || [];
        cartRooms.splice(index, 1);
        localStorage.setItem('cartRooms', JSON.stringify(cartRooms));
        
        // Recarregar a página do carrinho
        window.location.reload();
    } catch (error) {
        console.error('Erro ao remover do carrinho:', error);
    }
};
