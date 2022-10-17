@extends('layouts.admin')

@section('titulo')
    <span>Productos</span>

    <a href="" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#createMdl">
        <i class="fas fa-plus"></i>
    </a>
@endsection

@section('contenido')

    @include('products.modals.create')
    @include('products.modals.update')
    @include('products.modals.delete')

    <div class="card">
        <div class="card-body">
            <table id="dt-products" class="table table-striped table-bordered dts">
                <thead>
                <tr>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Descripción</th>
                    <th class="text-center">Precio Unitario</th>
                    <th class="text-center">Cantidad</th>
                    <th class="text-center">Costo total</th>
                    <th class="text-center">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr class="text-center">
                        <td>{{$product->name}}</td>
                        <td>{{$product->description}}</td>
                        <td> ${{$product->unit_price}}</td>
                        <td>{{$product->quantity}}</td>
                        <td> ${{$product->total_cost}}</td>
                        <td>
                            <a href="" class="edit-form-data" data-toggle="modal" data-target="#editMdl" onclick="editProduct({{$product}})">
                                <i class="far fa-edit"></i>
                            </a>

                            <a href="" class="delete-form-data" data-toggle="modal" data-target="#deleteMdl" onclick="deleteProduct({{$product}})">
                                <i class="far fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

@push('styles')
    <link rel="stylesheet" href="{{asset('libs/datatables/dataTables.bootstrap4.min.css')}}">
@endpush

@push('scripts')
    <script src="{{asset('/libs/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/libs/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <script>
        $(document).ready(function(){
            $("input[name='unit_price'], input[name='quantity']").on('keyup', function () {
                calculateTotalCost(this);
            });

            function calculateTotalCost(input){
                const formId = input.closest('form').id;
                const unitPrice = Number($(`#${formId} input[name='unit_price']`).val());
                const quantity = Number($(`#${formId} input[name='quantity']`).val());
                const totalCost = $(`#${formId} input[name='total_cost']`);

                if(!isNaN(unitPrice) && !isNaN(quantity)){
                    totalCost.val(unitPrice * quantity);
                }
            }      

            $('#createMdl').on('hidden.bs.modal', function () {
                var form = $('#createProductFrm');
                form.trigger('reset')
                form.find(`input.is-invalid`).removeClass('is-invalid');
                form.find(`span.text-danger`).remove();
                form.find(`input[name='unit_price']`).val(0)
                form.find(`input[name='quantity']`).val(0)
                form.find(`input[name='total_cost']`).val(0)
            })

            $('#editMdl').on('hidden.bs.modal', function () {
                var form = $('#editProductFrm');
                form.trigger('reset')
                form.find(`input.is-invalid`).removeClass('is-invalid');
                form.find(`span.text-danger`).remove();
                $("#editProductFrm").attr('action', '');
            })
        });

        function editProduct(product){
            const action = `/products/${product.id}`;

            $("#editProductFrm").attr('action', action);

            localStorage.setItem('action', action);

            $("#editProductFrm #name").val(product.name);
            $("#editProductFrm #description").val(product.description);
            $("#editProductFrm #unit_price").val(product.unit_price);
            $("#editProductFrm #quantity").val(product.quantity);
            $("#editProductFrm #total_cost").val(product.total_cost);
        }

        function deleteProduct(product) {
            $("#deleteProductFrm").attr('action', `/products/${product.id}`);

            $('#deleteProductFrm #productName').text(product.name);
        }

         
    </script>

    @if(!$errors->isEmpty())
        @if($errors->has('post'))
            <script>
                $(function () {
                    $('#createMdl').modal('show');
                });
            </script>
        @else
            <script>
                $(function () {
                    $('#editMdl').modal('show');
                    $("#editProductFrm").attr('action', localStorage.getItem('action'));
                });
            </script>
        @endif
    @endif
@endpush
