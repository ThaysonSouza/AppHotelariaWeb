export default function CartFooter() {
    const footer = document.createElement('div');
    footer.className = "cart-footer-container";
    
    footer.innerHTML = `
        <div class="container-fluid">
            <div class="row cart-footer-row align-items-center">
                <div class="col-md-6">
                    <button class="btn btn-primary btn-lg reserve-btn" id="btnProceedReservation">
                        Reservar agora
                    </button>
                </div>
                <div class="col-md-6">
                    <div class="total-info">
                        <span class="total-label">Total:</span>
                        <span class="total-price" id="cartTotal">R$ 0,00</span>
                    </div>
                </div>
            </div>
        </div>
    `;

    return footer;
};
