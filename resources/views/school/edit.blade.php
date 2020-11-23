@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cadastro de Escolas</div>
                <div class="card-body">
                    <form action="{{ route('school.update', ['id' => $school->id]) }}" method="post" enctype="multipart/form-data" class="form">
                        @csrf
                        @method('POST')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    @if($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                    <div class="form-group">
                                        <label>CNPJ</label>
                                        <input type="text" name="cnpj" id="cnpj"
                                            class="form-control" v-model="cnpj"
                                            v-mask="'##.###.###/####-##'" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Nome</label>
                                        <input type="text"
                                            class="form-control"
                                            name="company_name" v-model="company_name" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Nome fantasia</label>
                                        <input type="text" class="form-control" name="fantasy_name"
                                            v-model="fantasy_name" placeholder="{{ old('fantasy_name') }}"
                                            value="{{ old('fantasy_name') }}">
                                     </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label>Telefone</label>
                                        <input type="text" name="phone" v-model="phone"  v-mask="'(##)####-####'"
                                            value="{{ old('phone') }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label>Contato</label>
                                        <input type="text" name="contact" value="{{ old('contact') }}" v-model="contact"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="email" v-model="email" value="{{ old('email') }}"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label>Segmento</label>
                                        <select class="form-control" id="segmento" name="segmento" v-model="segmento">
                                            <option value="1">Produto</option>
                                            <option value="2">Serviço</option>
                                            <option value="3">Produto e Serviço</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label>Inscrição Municipal</label>
                                        <input type="text" name="inscricao_municipal" v-model="inscricao_municipal" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label>Inscrição Estadual</label>
                                        <input type="text" name="inscricao_estadual" v-model="inscricao_estadual" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>CEP</label>
                                        <input type="text" name="zip_code" v-model="zip_code" v-mask="'#####-###'"
                                            class="form-control" @blur="pegaZip_code">
                                            <span v-if="zip_codeNaoExiste == true"  class="small text-danger"><strong>CEP não existe!</strong></span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Estado</label>
                                        <input type="text" name="state" v-model="state" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Cidade</label>
                                        <input type="text" name="city" v-model="city" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Bairro</label>
                                        <input type="text" name="neighborhood" v-model="neighborhood"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label>Endereço</label>
                                        <input type="text" name="address" v-model="address" class="form-control ">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label>Número</label>
                                        <input type="text" name="address_number" v-model="address_number"
                                            v-mask="'##########'" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label>Complemento</label>
                                        <input type="text" name="complement" v-model="complement" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="float-right btn btn-primary">Atualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    var vue = new Vue({
        el: '#app',
        data: {
            cnpj: '{{ $school->cnpj }}',
            erroCNPJ:'',
            fantasy_name: '{{ $school->fantasy_name }}',
            phone: '{{ $school->phone }}',
            zip_code:'{{ $school->zip_code }}',
            address:'{{ $school->address }}',
            contact: '{{ $school->contact }}',
            email: '{{ $school->email }}',
            address_number:'{{ $school->address_number }}',
            city:'{{ $school->city }}',
            state:'{{ $school->state }}',
            company_name:'{{ $school->company_name }}',
            cellphone:'{{  $school->cellphone }}',
            neighborhood:'{{ $school->neighborhood }}',
            complement:'{{ $school->complement }}',
            segmento: '{{ $school->segmento }}',
            inscricao_municipal: '{{ $school->inscricao_municipal }}',
            inscricao_estadual: '{{ $school->inscricao_estadual }}',
            isLoading: false,
            erroCNPJ: 0,
            zip_codeNaoExiste: false
        },
        methods: {
            getCNPJ() {
                const vm = this
                if (vm.cnpj == '') {
                    vm.erroCNPJ = 1
                    document.getElementById("cnpj").focus();
                } else {
                    vm.erroCNPJ = 0
                    vm.isLoading = true
                    axios.post('/getCNPJ', {
                        cnpj: vm.cnpj
                    })
                    .then(function (response) {
                        vm.zip_code = response.data.cep,
                        vm.address = response.data.logradouro,
                        vm.address_number = response.data.numero,
                        vm.city = response.data.municipio,
                        vm.state = response.data.uf,
                        vm.company_name = response.data.nome,
                        vm.fantasy_name = response.data.fantasia,
                        vm.phone = response.data.telefone,
                        vm.neighborhood = response.data.bairro,
                        vm.complement = response.data.complemento,
                        vm.isLoading = false
                    });
                }
            },
            pegaZip_code() {
                const vm = this
                vm.isLoading = true
                axios.get('/cep?c=' + this.zip_code)
                    .then(function (response) {
                        if (response.data.erro == true) {
                            vm.zip_codeNaoExiste = true,
                            vm.isLoading = false,
                            document.getElementById('zip_code').focus();
                        } else {
                            vm.address = response.data.logradouro,
                            vm.city = response.data.localidade,
                            vm.state = response.data.uf,
                            vm.neighborhood = response.data.bairro,
                            vm.isLoading = false
                            vm.zip_codeNaoExiste = false
                        }
                    });
            },
        }
})

</script>
@endsection
