const key = "Nocturne_cart";
export function setCart(cart) {
    localStorage.setItem(key, JSON.stringify(cart));
}

export function getCart() {
    try {
        const raw = localStorage.getItem(key);
        return raw ? JSON.parse(raw) : { status: "draft", item: [] }
    } catch {
        return { status: "draft", item: [] };
    }
}
export function addItemToCart(item) {
    const cart = getCart();
    cart.item.push(item);
    setCart(cart);
    return cart;
}
export function removeItemFromNocturne_cart(i){
    const nocturne_cart = getCart();
    nocturne_cart.item.splice(i, 1);
    setCart(nocturne_cart);
    return nocturne_cart;
}
export function clearNocturne_cart(){
    setCart({
        status : "draft",
        item: []
    });
}

export function getTotalItem(){
    const { item } = getCart();
    const total = item.reduce((acc, it) => 
        acc + Number(it.subtotal || 0), 0    
    );
    return {
        total,
        qtd_item : item.length
    }
}