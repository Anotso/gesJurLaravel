@extends('template.home')

@section('content')
<div class="container">
    <h4>Cadastro de usuário</h4>
    <form action="" class="mb-5">
        <div id="typeRegister"></div>
        <div id="dataPerson" hidden></div>
        <div id="dataOffice" hidden></div>
        <div id="dataPayment" hidden></div>
        <div id="btnGroup float-right">
            <button class="btn btn-warning">
                Cancelar
            </button>
            <button class="btn btn-success">
                Avançar
            </button>
            <button class="btn btn-success" hidden>
                Cadastrar
            </button>
        </div>
    </form>
</div>
@endsection

@section('script')
<script>
    console.log("Hello World");
</script>
@endsection