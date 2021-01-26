let identifyInput = "";

function limpa_formulário_cep() {
    //Limpa valores do formulário de cep.
    document.getElementById(`street${identifyInput}`).value=("");
    document.getElementById(`neighborhood${identifyInput}`).value=("");
    document.getElementById(`city${identifyInput}`).value=("");
    document.getElementById(`state${identifyInput}`).value=("");
}

function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {
        //Atualiza os campos com os valores.
        document.getElementById(`street${identifyInput}`).value=(conteudo.logradouro);
        document.getElementById(`neighborhood${identifyInput}`).value=(conteudo.bairro);
        document.getElementById(`city${identifyInput}`).value=(conteudo.localidade);
        document.getElementById(`state${identifyInput}`).value=(conteudo.uf);

    } //end if.
    else {
        //CEP não Encontrado.
        limpa_formulário_cep();
        alert("CEP não encontrado.");
    }
}

function loadCep(valor) {

//Nova variável "cep" somente com dígitos.
    var cep = valor.value.replace(/\D/g, '');
    identifyInput = valor.id.replace("cep", "");
    console.log(identifyInput);

//Verifica se campo cep possui valor informado.
    if (cep != "") {

        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if(validacep.test(cep)) {

            //Preenche os campos com "..." enquanto consulta webservice.
            document.getElementById(`street${identifyInput}`).value="...";
            document.getElementById(`neighborhood${identifyInput}`).value="...";
            document.getElementById(`city${identifyInput}`).value="...";
            document.getElementById(`state${identifyInput}`).value="...";


            //Cria um elemento javascript.
            var script = document.createElement('script');

            //Sincroniza com o callback.
            script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

            //Insere script no documento e carrega o conteúdo.
            document.body.appendChild(script);

        } //end if.
        else {
            //cep é inválido.
            limpa_formulário_cep();
            alert("Formato de CEP inválido.");
        }
    } //end if.
    else {
        //cep sem valor, limpa formulário.
        limpa_formulário_cep();
    }
}
