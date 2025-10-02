export default function CartRoomCard() {
    const card = document.createElement('div');
    card.className = "cart-room-card";
    
    card.innerHTML = `
        <div class="container-fluid">
            <div class="row cart-room-row align-items-center">
                <div class="col-md-4">
                    <div class="room-info">
                     
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="occupancy-info">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="price-info">
                      
                    </div>
                </div>
            </div>
        </div>
    `;
    
    return card;
}
