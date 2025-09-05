export async function loginRequest(email, senha) {

    const dados = { email, senha };
    const response = await fetch("api/login", {
        method: "POST",
        headers: {
            "Accept": "application/json",
            "Content-type": "application/json"
        },

        body: JSON.stringify(dados),
        //body: new URLSearchParams({ "email":email,"senha":senha}).toString(),
        /*URL da requisiçao é a mesma da origem dp front(mesmo protocolo http/mesmo dominio
        local/mesma porta 80 do servidoer web apache)
        Front: http://localhost/primesite/public/index.html
        Back: http://localhost/primesite/api/login.php 
        */
        credentials: "same-origin"
    });

    //Interpreta a resposta como JSON
    let data = null;
    try {
        data = await response.json();
    }
    catch {
        // Se nao for JSON valido, data permanece null
        data = null;
    }

    if (!data || !data.token) {
        const message = "Resposta invalida do servidor. Token ausente";
        return { ok: false, token: null, raw: data, message };
    }

    return {
        ok: true,
        token: data.token,
        raw: data
    }
}
/*funcao para salvar a chave token apos autenticaçao confirmada,
ao salvar no local storage, o usuario podeara mudar de pagina, fechar o site
e permanecer logado mesmo assim, DESDE QUE O TEMPO NAO TENHA ESGOTADO
*/
export function saveToken(token){
    localStorage.setItem("auth_token", token);

}

/*Funçao para recuperar a chave a cada pagian que o usuario navegar*/
export function getToken(){
    return localStorage.setItem("auth_token");
}

/*Funçao para remover a chave token quando o usuario deslogar*/
export function clearToken(){
    localStorage.removeItem("auth_token");
}

