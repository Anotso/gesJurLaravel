@extends('template.home')

@section('css')
<style>
    #phone-group, #address-group, #login-group{
        background-color: rgb(252, 252, 252);
        padding: 20px;
        border-radius: 5px;
    }
</style>
@endsection

@section('content')
<div class="container">
    <h4>Cadastro de usuário</h4>
    <form action="" class="mb-5">
        <div id="typeRegister">
            <h5 class="mt-5 mb-5">Tipo de cadastro</h5>
            <div class="row">
                <div class="col-md-6 text-center mb-3">
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" name="typeRegister" id="folks" value="folks" checked>
                        <label class="custom-control-label" for="folks">Perfil pessoal</label>
                    </div>
                </div>
                <div class="col-md-6 text-center mb-3">
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" name="typeRegister" id="professional" value="professional">
                        <label class="custom-control-label" for="professional">Perfil profissional</label>
                    </div>
                </div>
            </div>
        </div>
        <div id="typeRegisterPerson"hidden>
            <h5 class="mt-5 mb-5">Você é pessoa jurídica?</h5>
            <div class="row">
                <div class="col-md-6 text-center mb-3">
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" name="typePerson" id="pj" value="pj" checked>
                        <label class="custom-control-label" for="pj">Sim</label>
                    </div>
                </div>
                <div class="col-md-6 text-center mb-3">
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" name="typePerson" id="pf" value="pf">
                        <label class="custom-control-label" for="pf">Não</label>
                    </div>
                </div>
            </div>
        </div>
        {{-- INICIO DIV - DADOS PESSOAIS --}}
        <div id="dataPerson" hidden>
            <h5 class="mt-5 mb-2">Dados Pessoais</h5>
            <div class="alert alert-danger mb-2" role="alert" id="msgValidationFormFolks" hidden></div>
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Informe o seu nome completo" required>
            </div>
            {{-- <div class="form-group">
                <label for="birth">Data de nascimento</label>
                <input type="date" class="form-control" id="birth" name="date-of-birth" required>
            </div> --}}
            <div class="form-group">
                <label for="cpf">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Informe o seu CPF" required>
            </div>
            {{-- <section id="phone-group">
                <div class="row mb-2">
                    <div class="col-10"><h6>Telefone</h6></div>
                    <div class="col-2 align-self-center text-center cursorLinkPointer" onclick="addNewInputPhone('Person')">
                        <i class="c-icon c-icon-2xl cil-plus"></i>
                    </div>
                </div>
                <div class="align-self-center" id="phone-div">
                    <div class="form-group row" id="divPersonPhoneStart">
                        <div class="col-10 align-self-center">
                            <input type="text" class="form-control" name="phone[]" placeholder="Informe o seu número do telefone">
                        </div>
                        <label id="deletePersonPhoneStart" class="col-2 col-form-label align-self-center text-center cursorLinkPointer" onclick="removeInputPhone(this)">
                            <i class="c-icon c-icon-2xl cil-trash"></i>
                        </label>
                    </div>
                </div>
            </section>
            <section id="address-group" class="mt-2">
                <h6 class="mt-2 mb-2">Endereço</h6>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="cepPerson">
                        CEP
                    </label>
                    <div class="col-md-10 ">
                        <input type="text" class="form-control" id="cepPerson" name="cepPerson" placeholder="Informe o seu CEP" required onchange="loadCep(this)">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label" for="streetPerson">
                                Rua
                            </label>
                            <div class="col-md-10 ">
                                <input type="text" class="form-control" id="streetPerson" name="streetPerson" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label" for="numberPerson">
                                Nº
                            </label>
                            <div class="col-md-10 ">
                                <input type="text" class="form-control" id="numberPerson" name="numberPerson" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label" for="neighborhoodPerson">
                                Bairro
                            </label>
                            <div class="col-md-10 ">
                                <input type="text" class="form-control" id="neighborhoodPerson" name="neighborhoodPerson" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label" for="cityPerson">
                                Cidade
                            </label>
                            <div class="col-md-10 ">
                                <input type="text" class="form-control" id="cityPerson" name="cityPerson" disabled>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="statePerson">
                        Estado
                    </label>
                    <div class="col-md-10 ">
                        <input type="text" class="form-control" id="statePerson" name="statePerson" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="complementPerson">
                        Complemento
                    </label>
                    <div class="col-md-10 ">
                        <input type="text" class="form-control" id="complementPerson" name="complementPerson" placeholder="Informe o complemento">
                    </div>
                </div>
            </section> --}}
            <section id="login-group" class="mt-2">
                <h6 class="mt-2 mb-2">Dados de login</h6>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="email1">
                        E-mail
                    </label>
                    <div class="col-md-10 ">
                        <input type="email" class="form-control" id="email1" name="email1" placeholder="Informe o seu e-mail" required onchange="validadeInputsLogin(this)">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="email2">
                        Confirme o e-mail
                    </label>
                    <div class="col-md-10 ">
                        <input type="email" class="form-control" id="email2" name="email2" placeholder="Confirme o seu e-mail" required onchange="validadeInputsLogin(this)">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="pwd1">
                        Senha
                    </label>
                    <div class="col-md-10 ">
                        <input type="password" class="form-control" id="pwd1" name="pwd1" required onchange="validadeInputsPass(this.value)">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="pwd2">
                        Confirme a senha
                    </label>
                    <div class="col-md-10 ">
                        <input type="password" class="form-control" id="pwd2" name="pwd2" required onchange="validadeInputsPass(this.value)">
                    </div>
                </div>
            </section>
        </div>
        {{-- FIM DIV - DADOS PESSOAIS --}}
        {{-- INICIO DIV - DADOS PROFISSIONAIS --}}
        <div id="dataOffice" hidden>
            <h5 class="mt-5 mb-2">Dados Profissionais</h5>
            <div class="form-group" id="inputCnpj" hidden>
                <label for="cnpj">CNPJ</label>
                <input type="text" class="form-control" id="cnpj" name="cnpj" placeholder="Informe o CNPJ">
            </div>
            <section id="phone-group">
                <div class="row mb-2">
                    <div class="col-10"><h6>Telefone</h6></div>
                    <div class="col-2 align-self-center text-center cursorLinkPointer" onclick="addNewInputPhone('Office')">
                        <i class="c-icon c-icon-2xl cil-plus"></i>
                    </div>
                </div>
                <div class="align-self-center" id="phone-div">
                    <div class="form-group row" id="divOfficePhoneStart">
                        <div class="col-10 align-self-center">
                            <input type="text" class="form-control" name="phoneOffice[]" placeholder="Informe o seu número do telefone">
                        </div>
                        <label id="deleteOfficePhoneStart" class="col-2 col-form-label align-self-center text-center cursorLinkPointer" onclick="removeInputPhone(this)">
                            <i class="c-icon c-icon-2xl cil-trash"></i>
                        </label>
                    </div>
                </div>
            </section>
            <section id="address-group" class="mt-2">
                <h6 class="mt-2 mb-2">Endereço</h6>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="cepOffice">
                        CEP
                    </label>
                    <div class="col-md-10 ">
                        <input type="text" class="form-control" id="cepOffice" name="cepOffice" placeholder="Informe o seu CEP" onchange="loadCep(this)">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label" for="streetOffice">
                                Rua
                            </label>
                            <div class="col-md-10 ">
                                <input type="text" class="form-control" id="streetOffice" name="streetOffice" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label" for="numberOffice">
                                Nº
                            </label>
                            <div class="col-md-10 ">
                                <input type="text" class="form-control" id="numberOffice" name="numberOffice">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label" for="neighborhoodOffice">
                                Bairro
                            </label>
                            <div class="col-md-10 ">
                                <input type="text" class="form-control" id="neighborhoodOffice" name="neighborhoodOffice" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label" for="cityOffice">
                                Cidade
                            </label>
                            <div class="col-md-10 ">
                                <input type="text" class="form-control" id="cityOffice" name="cityOffice" disabled>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="stateOffice">
                        Estado
                    </label>
                    <div class="col-md-10 ">
                        <input type="text" class="form-control" id="stateOffice" name="stateOffice" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="complementOffice">
                        Complemento
                    </label>
                    <div class="col-md-10 ">
                        <input type="text" class="form-control" id="complementOffice" name="complementOffice" placeholder="Informe o complemento">
                    </div>
                </div>
            </section>
        </div>
        {{-- FIM DIV - DADOS PROFISSIONAIS --}}
        {{-- INICIO DIV - DADOS DE PAGAMENTO --}}
        <div id="dataPayment" hidden>
            <h5 class="mt-5 mb-2">Método de Pagamento</h5>
            <div class="alert alert-danger mb-2" role="alert" id="msgValidationFormProfessional" hidden></div>
            <div class="form-group">
                <label for="formGroupExampleInput">Label exemplo</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Input exemplo">
            </div>
        </div>
        {{-- FIM DIV - DADOS DE PAGAMENTO --}}
        <div id="btnGroup" class="mt-5">
            <button type="button" class="btn btn-warning" id="btnCancel">
                Cancelar
            </button>
            <button type="button" class="btn btn-success" id="btnBack" hidden onclick="backScreen()">
                Voltar
            </button>
            <button type="button" class="btn btn-success" id="btnNext" onclick="nextScreen()">
                Avançar
            </button>
            <button class="btn btn-success" id="btnSave" hidden onclick="valicationFormAll()">
                Cadastrar
            </button>
        </div>
    </form>
</div>
@endsection

@section('script')
<script src="{{ asset('js/searchAddress.js')}}"></script>
<script>
    //CONTROL SCREEN - VARIABLE
    let screenCurrent = "typeRegister";
    let screenBack = "";

    //INPUT PHONE - VARIABLE
    let countDivPhone = 0;
    let divPhone = document.getElementById("phone-div");

    //VALIDATION FORM AND PROFILE
    let optInputPj;
    let optProfessional;

    //INPUT PHONE - FNC
    function addNewInputPhone(info){
        divPhone.insertAdjacentHTML('beforeend',`
            <div class="form-group row" id="div${info}Phone-${countDivPhone}">
                <div class="col-10 align-self-center">
                    <input type="text" class="form-control" name="phone[]" placeholder="Informe o seu número do telefone">
                </div>
                <label id="delete${info}Phone-${countDivPhone}" class="col-2 col-form-label align-self-center text-center cursorLinkPointer" onclick="removeInputPhone(this)">
                    <i class="c-icon c-icon-2xl cil-trash"></i>
                </label>
            </div>
        `);
        countDivPhone++;
    }
    function removeInputPhone(e){
        let idLabel = e.getAttribute("id").replace("delete", "div");
        document.getElementById(`${idLabel}`).remove();
    }

    function validadeInputsLogin(val){
        let emailPattern =  /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/;
        let stateEmail = emailPattern.test(val.value);
        let msg = document.getElementById("msgValidationFormFolks");

        if(val.id == "email1"){
            if(!stateEmail){
                msg.textContent = "Informe um e-mail válido";
                msg.hidden = false;
                setTimeout(() => {
                    msg.hidden = true;
                }, 10000);
            }else{
                let email2 = document.getElementById("email2").value;
                if(val.value != email2){
                    msg.textContent = "E-mails não conferem";
                    msg.hidden = false;
                    setTimeout(() => {
                        msg.hidden = true;
                    }, 10000);
                }
            }
        }else{
            let email1 = document.getElementById("email1").value;
            if(!stateEmail){
                msg.textContent = "Informe um e-mail válido";
                msg.hidden = false;
                setTimeout(() => {
                    msg.hidden = true;
                }, 10000);
            }else if(val.value != email1){
                msg.textContent = "E-mails não conferem";
                msg.hidden = false;
                setTimeout(() => {
                    msg.hidden = true;
                }, 10000);
            }
        }
        // if(stateEmail1){
        //     console.log("entrou");
        //     if(email1.value != email2.value && (email1 != "" || email1.value != undefined && email2.value != "" || email2.value != undefined)){
        //         console.log("E-mail diferente");
        //     }else if(pwd1 != pwd2 && (pwd1 != "" || pwd1 != undefined && pwd2 != "" || pwd2 != undefined)){
        //         console.log("Senha diferente");
        //     }else{
        //         console.log("Todos");
        //     }
        // }else{
        //     if(!stateEmail1){
        //         email1.setCustomValidity("Por favor, informe um e-mail válido");
        //         console.log("email1");
        //     }
        // }
    }

    function validadeInputsPass(p){
        var anUpperCase = /[A-Z]/;
        var aLowerCase = /[a-z]/;
        var aNumber = /[0-9]/;
        var aSpecial = /[!|@|#|$|%|^|&|*|(|)|-|_]/;
        var obj = {};
        obj.result = true;

        if(p.length < 15){
            obj.result=false;
            obj.error="Not long enough!"
            // return obj;
            console.log("menor que 15");
        }else{
            console.log("Maior que 15");
            var numUpper = 0;
            var numLower = 0;
            var numNums = 0;
            var numSpecials = 0;
            for(var i=0; i<p.length; i++){
                if(anUpperCase.test(p[i]))
                    numUpper++;
                else if(aLowerCase.test(p[i]))
                    numLower++;
                else if(aNumber.test(p[i]))
                    numNums++;
                else if(aSpecial.test(p[i]))
                    numSpecials++;
            }

            if(numUpper < 2 || numLower < 2 || numNums < 2 || numSpecials <2){
                obj.result=false;
                obj.error="Wrong Format!";
                return obj;
                console.log("Formato inválido");
            }else{
                console.log("Formato válido");
            }
        }

        // return obj;
    }

    function valicationFormAll(){
        let msgError = "Ops! Parece que ficaram alguns campos em branco";
        let errorDataPerson = false;
        let errorDataOffice = false;
        let alertItem = "msgValidationFormFolks";

        let name = document.getElementById("name").value;
        let cpf = document.getElementById("cpf").value;
        let email1 = document.getElementById("email1").value;
        let email2 = document.getElementById("email2").value;
        let pwd1 = document.getElementById("pwd1").value;
        let pwd2 = document.getElementById("pwd2").value;
        // let cepPerson = document.getElementById("cepPerson").value;
        // let streetPerson = document.getElementById("streetPerson").value;
        // let numberPerson = document.getElementById("numberPerson").value;
        // let neighborhoodPerson = document.getElementById("neighborhoodPerson").value;
        // let cityPerson = document.getElementById("cityPerson").value;
        // let statePerson = document.getElementById("statePerson").value;

        // VALIDATION OF PERSONAL INPUTS
        // if((name == "" || name == undefined) || (cpf == "" || cpf == undefined) || (cepPerson == "" || cepPerson == undefined) || (streetPerson == "" || streetPerson == undefined) || (numberPerson == "" || numberPerson == undefined) || (neighborhoodPerson == "" || neighborhoodPerson == undefined) || (cityPerson == "" || cityPerson == undefined) || (statePerson == "" || statePerson == undefined)){
        //     if(optProfessional){
        //         msgError += " na sessão de dados pessoais";
        //     }
        //     errorDataPerson = true;
        // }
        if((name == "" || name == undefined) || (cpf == "" || cpf == undefined) || (email1 == "" || email1 == undefined) || (email2 == "" || email2 == undefined) || (pwd1 == "" || pwd1 == undefined) || (pwd2 == "" || pwd2 == undefined)){
            if(optProfessional){
                msgError += " na sessão de dados pessoais";
            }
            errorDataPerson = true;
        }
        // VALIDATION OF PROFISSIONAL INPUTS
        if(optProfessional){
            alertItem = "msgValidationFormProfessional";
            let cepOffice = document.getElementById("cepOffice").value;
            let streetOffice = document.getElementById("streetOffice").value;
            let numberOffice = document.getElementById("numberOffice").value;
            let neighborhoodOffice = document.getElementById("neighborhoodOffice").value;
            let cityOffice = document.getElementById("cityOffice").value;
            let stateOffice = document.getElementById("stateOffice").value;
            let cnpj = document.getElementById("cnpj");
            let cnpfIsRequired = cnpj.required;
            if(cnpfIsRequired){
                cnpj = cnpj.value;
            }else{
                cnpj = "";
            }
            if((cnpj == "" || cnpj == undefined) || (cepOffice == "" || cepOffice == undefined) || (streetOffice == "" || streetOffice == undefined) || (numberOffice == "" || numberOffice == undefined) || (neighborhoodOffice == "" || neighborhoodOffice == undefined) || (cityOffice == "" || cityOffice == undefined) || (stateOffice == "" || stateOffice == undefined)){
                if(errorDataPerson){
                    msgError += " e na sessão dados profissionais";
                }else{
                    msgError += " na sessão dados profissionais";
                }
                errorDataOffice = true;
            }
        }
        if(errorDataPerson || errorDataOffice){
            document.getElementById(alertItem).textContent = msgError;
            document.getElementById(alertItem).hidden = false;
            setTimeout(() => {
                document.getElementById(alertItem).hidden = true;
            }, 10000);
        }
    }

    function validateForm(data){
        if(data){
            optInputPj = document.getElementById("pj").checked;
            if(optInputPj){
                document.getElementById("cnpj").required = true;
            }
            document.getElementById("cepOffice").required = true;
            document.getElementById("streetOffice").required = true;
            document.getElementById("numberOffice").required = true;
            document.getElementById("neighborhoodOffice").required = true;
            document.getElementById("cityOffice").required = true;
            document.getElementById("stateOffice").required = true;
        }
    }

    //CONTROL SCREEN - FNC
    function nextScreen(){
        optProfessional = document.getElementById("professional").checked;
        // console.log(`Valor de PF: ${optFolks}`);
        // console.log(`Valor de PJ: ${optProfessional}`);
        switch (screenCurrent) {
            case "typeRegister":
                document.getElementById(screenCurrent).hidden = true;
                document.getElementById("btnBack").hidden = false;
                screenCurrent = "dataPerson";
                document.getElementById("dataPerson").hidden = false;
                if(!optProfessional){
                    document.getElementById("btnSave").hidden = false;
                    document.getElementById("btnNext").hidden = true;
                }else{
                    validateForm(optProfessional);
                }
                break;
            case "dataPerson":
                if(optProfessional){
                    document.getElementById("typeRegisterPerson").hidden = false;
                    document.getElementById("dataPerson").hidden = true;
                    screenCurrent = "typeRegisterPerson";
                    // console.log("--------------------------------");
                    // console.log("Next - dataPerson");
                }
                break;
            case "typeRegisterPerson":
                if(optProfessional){
                    let userPj = document.getElementById("pj").checked;
                    document.getElementById("dataOffice").hidden = false;
                    if(userPj){
                        document.getElementById("inputCnpj").hidden = false;
                    }else{
                        document.getElementById("inputCnpj").hidden = true;
                    }
                    document.getElementById("dataOffice").hidden = false;
                    document.getElementById("typeRegisterPerson").hidden = true;
                    screenCurrent = "dataOffice";
                    // console.log("--------------------------------");
                    // console.log("Next - typeRegisterPerson");
                }
                break;
            case "dataOffice":
                if(optProfessional){
                    document.getElementById("dataPayment").hidden = false;
                    document.getElementById("dataOffice").hidden = true;
                    document.getElementById("btnNext").hidden = true;
                    document.getElementById("btnSave").hidden = false;
                    screenCurrent = "dataPayment";
                    // console.log("--------------------------------");
                    // console.log("Next - dataOffice");
                }
                break;
            default:
                break;
        }
    }

    function backScreen(){
        let optProfessional = document.getElementById("professional").checked;
        // console.log(`Valor de PF: ${optFolks}`);
        // console.log(`Valor de PJ: ${optProfessional}`);
        switch (screenCurrent) {
            case "dataPerson":
                document.getElementById("btnNext").hidden = false;
                document.getElementById("btnBack").hidden = true;
                document.getElementById("typeRegister").hidden = false;
                document.getElementById("dataPerson").hidden = true;
                screenCurrent = "typeRegister";
                // console.log("Back - dataPerson");
                if(!optProfessional){
                    document.getElementById("btnSave").hidden = true;
                }
                break;
            case "typeRegisterPerson":
                document.getElementById("dataPerson").hidden = false;
                document.getElementById("typeRegisterPerson").hidden = true;
                if(optProfessional){
                    screenCurrent = "dataPerson";
                    // console.log("Back - typeRegisterPerson");
                }
                break;
            case "dataOffice":
                // document.getElementById("btnNext").hidden = false;
                // document.getElementById("btnSave").hidden = true;
                // document.getElementById("btnBack").hidden = true;
                document.getElementById("typeRegisterPerson").hidden = false;
                document.getElementById("dataOffice").hidden = true;
                if(optProfessional){
                    screenCurrent = "typeRegisterPerson";
                    // console.log("Back - dataOffice");
                }
                break;
            case "dataPayment":
                if(optProfessional){
                    document.getElementById("dataOffice").hidden = false;
                    document.getElementById("dataPayment").hidden = true;
                    document.getElementById("btnSave").hidden = true;
                    document.getElementById("btnNext").hidden = false;
                    screenCurrent = "dataOffice";
                    // console.log("--------------------------------");
                    // console.log("Back - dataPayment");
                }
                break;

            default:
                break;
        }
    }
</script>
@endsection
