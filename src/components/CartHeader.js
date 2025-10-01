export default function CartHeader() {
    const header = document.createElement('div');
    header.className = "cart-header-container";
    
    header.innerHTML = `
        <div class="container-fluid">
            <div class="row cart-header-row">
                <div class="col-md-4">
                    <h5 class="cart-header-title">Categoria de quarto</h5>
                </div>
                <div class="col-md-4">
                    <h5 class="cart-header-title">Quantas pessoas?</h5>
                </div>
                <div class="col-md-4">
                    <h5 class="cart-header-title">Preço para 4 diárias</h5>
                </div>
            </div>
        </div>
    `;
    
    return header;
}
