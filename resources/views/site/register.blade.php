@extends('template.home')

@section('css')
<style>
    #phone-group, #address-group{
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
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Informe o seu nome completo">
            </div>
            <div class="form-group">
                <label for="birth">Data de nascimento</label>
                <input type="date" class="form-control" id="birth" name="date-of-birth">
            </div>
            <div class="form-group">
                <label for="cpf">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Informe o seu CPF">
            </div>
            <section id="phone-group">
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
                        <input type="text" class="form-control" id="cepPerson" name="cepPerson" placeholder="Informe o seu CEP">
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
                                <input type="text" class="form-control" id="numberPerson" name="numberPerson">
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
                    <div class="form-group row" id="divPhoneStart">
                        <div class="col-10 align-self-center">
                            <input type="text" class="form-control" name="phone[]" placeholder="Informe o seu número do telefone">
                        </div>
                        <label id="deletePhoneStart" class="col-2 col-form-label align-self-center text-center cursorLinkPointer" onclick="removeInputPhone(this)">
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
                        <input type="text" class="form-control" id="cepPerson" name="cepPerson" placeholder="Informe o seu CEP">
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
                                <input type="text" class="form-control" id="numberPerson" name="numberPerson">
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
            </section>
        </div>
        {{-- FIM DIV - DADOS PROFISSIONAIS --}}
        {{-- INICIO DIV - DADOS DE PAGAMENTO --}}
        <div id="dataPayment" hidden>
            <h5 class="mt-5 mb-2">Método de Pagamento</h5>
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
            <button class="btn btn-success" id="btnSave" hidden>
                Cadastrar
            </button>
        </div>
    </form>
</div>
@endsection

@section('script')
<script>
    //CONTROL SCREEN - VARIABLE
    let screenCurrent = "typeRegister";
    let screenBack = "";

    //INPUT PHONE - VARIABLE
    let countDivPhone = 0;
    let divPhone = document.getElementById("phone-div");

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

    //CONTROL SCREEN - FNC
    function nextScreen(){
        let optProfessional = document.getElementById("professional").checked;
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
                }
                break;
            case "dataPerson":
                if(optProfessional){
                    document.getElementById("typeRegisterPerson").hidden = false;
                    document.getElementById("dataPerson").hidden = true;
                    screenCurrent = "typeRegisterPerson";
                    console.log("--------------------------------");
                    console.log("Next - dataPerson");
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
                    console.log("--------------------------------");
                    console.log("Next - typeRegisterPerson");
                }
                break;
            case "dataOffice":
                if(optProfessional){
                    document.getElementById("dataPayment").hidden = false;
                    document.getElementById("dataOffice").hidden = true;
                    document.getElementById("btnNext").hidden = true;
                    document.getElementById("btnSave").hidden = false;
                    screenCurrent = "dataPayment";
                    console.log("--------------------------------");
                    console.log("Next - dataOffice");
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
                console.log("Back - dataPerson");
                if(!optProfessional){
                    document.getElementById("btnSave").hidden = true;
                }
                break;
            case "typeRegisterPerson":
                document.getElementById("dataPerson").hidden = false;
                document.getElementById("typeRegisterPerson").hidden = true;
                if(optProfessional){
                    screenCurrent = "dataPerson";
                    console.log("Back - typeRegisterPerson");
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
                    console.log("Back - dataOffice");
                }
                break;
            case "dataPayment":
                if(optProfessional){
                    document.getElementById("dataOffice").hidden = false;
                    document.getElementById("dataPayment").hidden = true;
                    document.getElementById("btnSave").hidden = true;
                    document.getElementById("btnNext").hidden = false;
                    screenCurrent = "dataOffice";
                    console.log("--------------------------------");
                    console.log("Back - dataPayment");
                }
                break;

            default:
                break;
        }
    }
</script>
@endsection
