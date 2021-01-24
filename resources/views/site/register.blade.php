@extends('template.home')

@section('css')
<style>
    #phone-group{
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
                        <input class="custom-control-input" type="radio" name="typePerson" id="folks" value="folks" checked>
                        <label class="custom-control-label" for="folks">Perfil pessoal</label>
                    </div>
                </div>
                <div class="col-md-6 text-center mb-3">
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" name="typePerson" id="professional" value="professional">
                        <label class="custom-control-label" for="professional">Perfil profissional</label>
                    </div>
                </div>
            </div>
        </div>
        {{-- INICIO DIV - DADOS PESSOAIS --}}
        <div id="dataPerson" >
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
                <input type="date" class="form-control" id="cpf" name="cpf" placeholder="Informe o seu CPF">
            </div>
            <section id="phone-group">
                <div class="row mb-2">
                    <div class="col-10"><h6>Telefone</h6></div>
                    <div class="col-2 align-self-center text-center cursorLinkPointer" onclick="addNewInputPhone()">
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
        </div>
        {{-- FIM DIV - DADOS PESSOAIS --}}
        {{-- INICIO DIV - DADOS PROFISSIONAIS --}}
        <div id="dataOffice" >
            <h5 class="mt-5 mb-2">Dados Profissionais</h5>
            <div class="form-group">
                <label for="formGroupExampleInput">Label exemplo</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Input exemplo">
            </div>
        </div>
        {{-- FIM DIV - DADOS PROFISSIONAIS --}}
        {{-- INICIO DIV - DADOS DE PAGAMENTO --}}
        <div id="dataPayment" >
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
    function addNewInputPhone(){
        divPhone.insertAdjacentHTML('beforeend',`
            <div class="form-group row" id="divPhone-${countDivPhone}">
                <div class="col-10 align-self-center">
                    <input type="text" class="form-control" name="phone[]" placeholder="Informe o seu número do telefone">
                </div>
                <label id="deletePhone-${countDivPhone}" class="col-2 col-form-label align-self-center text-center cursorLinkPointer" onclick="removeInputPhone(this)">
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
        console.log(`Valor de PJ: ${optProfessional}`);
        switch (screenCurrent) {
            case "typeRegister":
                let divDataPerson = document.getElementById("dataPerson");
                // divDataPerson.hidden = false;
                screenCurrent = "dataPerson";
                screenBack = "typeRegister";
                document.getElementById("btnSave").hidden = false;
                document.getElementById("btnBack").hidden = false;
                if(!optProfessional){
                    document.getElementById("btnNext").hidden = true;
                }
                break;
            case "dataPerson":
                if(optProfessional){
                    let divDataPerson = document.getElementById("dataPerson");
                    // divDataPerson.hidden = false;
                    screenCurrent = "dataOffice";
                    screenBack = "dataPerson";
                    console.log(screenCurrent+"OI");
                }
                break;
            case "dataOffice":

                break;
            case "dataPayment":

                break;

            default:
                break;
        }
        if(screenCurrent == "typeRegister"){


            console.log(screenCurrent);
        }

    }

    function backScreen(){
        let optProfessional = document.getElementById("professional").checked;
        // console.log(`Valor de PF: ${optFolks}`);
        console.log(`Valor de PJ: ${optProfessional}`);
        switch (screenCurrent) {
            case "dataPerson":
                document.getElementById("btnNext").hidden = false;
                document.getElementById("btnSave").hidden = true;
                document.getElementById("btnBack").hidden = true;
                screenCurrent = "typeRegister";
                if(optProfessional){
                    let divDataPerson = document.getElementById("dataPerson");
                    // divDataPerson.hidden = false;
                    console.log(screenCurrent+"OI");
                }
                break;
            case "dataOffice":

                break;
            case "dataPayment":

                break;

            default:
                break;
        }
        if(screenCurrent == "typeRegister"){


            console.log(screenCurrent);
        }

    }
</script>
@endsection
