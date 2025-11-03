//Listar os quartos disponiveis de acordo com inicio, fim e quantidade
export async function quartosDisponivelRequest({ dataInicio, dataFim, qtd }) {

    const params = new URLSearchParams();
    if (dataInicio) params.set("dataInicio", dataInicio);
    if (dataFim) params.set("dataFim", dataFim);
    if (qtd !== null && qtd !== "") params.set("qtd", String(qtd));

    const url = `api/room/disponivel?${params.toString()}`;

    const response = await fetch(url, {
        method: "GET",
        headers: {
            "Accept": "application/json",
        },
        credentials: "same-origin"
    });
    let data = null;
    try {
        data = await response.json();
    } catch {
        data = null;
    }
    if (!response.ok) {
        const msg = data?.mensagem || data?.message || data?.menssagem || "Falha ao buscar quartos disponíveis!";
        throw new Error(msg);
    }
    const quartos = Array.isArray(data?.Quartos)
        ? data.Quartos
        : (Array.isArray(data) ? data : []);
    console.log(quartos);
    return quartos;

}

// Cadastrar novo quarto com upload de imagens
export async function cadastrarQuarto(dados) {
    // dados: { nome, numero, camaCasal, camaSolteiro, preco, disponivel, imagens }
    const form = new FormData();
    form.set("nome", String(dados?.nome ?? ""));
    form.set("numero", String(dados?.numero ?? ""));
    form.set("camaCasal", String(dados?.camaCasal ?? 0));
    form.set("camaSolteiro", String(dados?.camaSolteiro ?? 0));
    form.set("preco", String(dados?.preco ?? 0));
    form.set("disponivel", String(dados?.disponivel ?? 1));

    const arquivos = dados?.imagens || [];
    if (arquivos && typeof arquivos.length === "number") {
        for (let i = 0; i < arquivos.length; i++) {
            if (arquivos[i]) form.append("imagens[]", arquivos[i]);
        }
    }

    const token = (await import('./authAPI.js')).getToken?.()
        || (typeof window !== 'undefined' ? window.localStorage?.getItem('auth_token') : null)
        || null;

    const response = await fetch("api/room", {
        method: "POST",
        body: form,
        headers: token ? { "Authorization": `Bearer ${token}` } : undefined,
        credentials: "same-origin"
    });

    let data = null;
    try { data = await response.json(); } catch { data = null; }

    if (!response.ok) {
        const msg = data?.mensagem || data?.message || data?.menssagem || "Falha ao cadastrar quarto.";
        throw new Error(msg);
    }
    return data;
}