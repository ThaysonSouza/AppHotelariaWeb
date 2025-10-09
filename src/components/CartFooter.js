export default function CartFooter(totalPrice) {
    const footer = document.createElement('div');
    footer.className = "cart-footer-container";
    
    footer.innerHTML = `
        <div class="container-fluid">
            <div class="row cart-footer-row align-items-center">
                <div class="col-md-6">
                    <button class="btn btn-primary btn-lg reserve-btn" onclick="proceedToReservation()">
                        Reservar agora
                    </button>
                </div>
                <div class="col-md-6">
                    <div class="total-info">
                        <span class="total-label">Total:</span>
                        <span class="total-price">R$ ${totalPrice.toFixed(2)}</span>
                    </div>
                </div>
            </div>
        </div>
    `;
    
    return footer;
}

// Função global para prosseguir com a reserva
window.proceedToReservation = function() {
    const cartRooms = JSON.parse(localStorage.getItem('cartRooms')) || [];
    
    if (cartRooms.length === 0) {
        alert('Seu carrinho está vazio!');
        return;
    }
    
    // Aqui você pode redirecionar para uma página de checkout ou mostrar um modal
    alert(`Prosseguindo com a reserva de ${cartRooms.length} quarto(s). Total: R$ ${cartRooms.reduce((sum, room) => sum + (room.preco * 4), 0).toFixed(2)}`);
};
