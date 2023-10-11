@extends('adminlte::page')

@section('title', '- Criar Propriedade')
@section('plugins.BootstrapSwitch', true)
@section('plugins.BsCustomFileInput', true)
@section('plugins.Summernote', true)
@section('plugins.select2', true)
@section('plugins.BootstrapSelect', true)


@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-fw fa-home"></i> Criar Propriedade</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.properties.index') }}">Propriedades</a></li>
                        <li class="breadcrumb-item active">Criar Propriedade</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    @include('components.alert')

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Dados Cadastrais da Propriedade</h3>
                        </div>

                        <form method="POST" action="{{ route('admin.properties.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="card-body">
                                {{-- 'sale', 'rent' --}}
                                <div class="d-flex flex-wrap justify-content-start">
                                    <div class="col-12 col-md-6 form-group px-0 pr-md-2">
                                        <label for="title">Título</label>
                                        <input type="text" class="form-control" id="title"
                                            placeholder="Título do Anúncio" name="title" value="{{ old('title') }}"
                                            required>
                                    </div>
                                    <div class="col-12 col-md-6 form-group px-0 pl-md-2">
                                        <label for="headline">Headline</label>
                                        <input type="text" class="form-control" id="headline"
                                            placeholder="Texto da headline" name="headline" value="{{ old('headline') }}"
                                            required>
                                    </div>

                                    <div class="col-12 form-group px-0">
                                        <x-adminlte-input-file name="cover" label="Imagem de capa"
                                            placeholder="Selecione uma imagem..." legend="Selecionar" />
                                    </div>

                                    <div class="col-12 col-md-4 form-group px-0 pr-md-2">
                                        <label for="experience">Experiência</label>
                                        <x-adminlte-select2 name="experience">
                                            <option {{ old('experience') == "experiência" ? 'selected' : '' }}
                                                    value="experience">experiência</option>
                                        </x-adminlte-select2>
                                    </div>
                                    <div class="col-12 col-md-4 form-group px-0 px-md-2">
                                        <label for="category">Categoria</label>
                                        <x-adminlte-select2 name="category">
                                            <option {{ old('category') == "categoria" ? 'selected' : '' }}
                                                    value="categoria">tipo</option>
                                        </x-adminlte-select2>
                                    </div>
                                    <div class="col-12 col-md-4 form-group px-0 pl-md-2">
                                        <label for="type">Tipo</label>
                                        <x-adminlte-select2 name="type">
                                                <option {{ old('type') == "tipo" ? 'selected' : '' }}
                                                    value="tipo">tipo</option>
                                        </x-adminlte-select2>
                                    </div>


                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
