export async function finishedOrder(item) {
    const url = "api/pedido/OrdemReserva";
    const body = {
        /*definindo que o pagamento sera feito via pix,
         mas sera alterado futuramente para que o usuario
         possa setar a forma desejada */
        cliente_id: 7,
        pagamento: "pix",
        quartos: item.map(it => (
            {
                id: it.quartoId,
                inicio: it.checkIn,
                fim: it.checkOut
            }
        ))
    };
    const res = await fetch(url, {
        method: "POST",
        headers: {
            "Accept": "application/json",
            "Content-Type": "application/json"
        },
        credentials: "same-origin",
        body: JSON.stringify(body)
    });
    let data = null;
    try {
        //Retorno em json() da requisiçao armazenado em data 
        data = await res.json();
    } catch { data = null; }
    if(!data){
        const menssagem = `Erro ao enviar pedido: ${res.status}`;
        return {ok: false, raw: data, menssagem}; }
    return {
        ok: true,
        raw: data
    }
}