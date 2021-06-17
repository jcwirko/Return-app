<!-- Modal -->
<div class="modal animated zoomIn" id="createMdl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-inspinia text-primary" id="exampleModalLabel">Nuevo Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('products.store')}}" role="form" method="POST" id="createProductFrm">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-6 form-group">
                            <div>
                                <label for="name" class="form-fields">Nombre</label>
                                <label class="mandatory-field">*</label>
                                <input type="text"
                                       class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}"
                                       name="name" id="name" value="{{old('name')}}">
                                @if($errors->has('name'))
                                    <span class="text-danger">{{$errors->first('name')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 form-group">
                            <div>
                                <label for="unit_price" class="form-fields">Precio unitario ($)</label>
                                <label class="mandatory-field">*</label>
                                <input type="text"
                                       class="form-control  {{$errors->has('unit_price') ? 'is-invalid' : ''}}"
                                       name="unit_price" id="unit_price"
                                        value="{{old('unit_price',0)}}">
                                @if ($errors->has('unit_price'))
                                    <span class="text-danger">{{ $errors->first('unit_price') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 form-group">
                            <div>
                                <label for="quantity" class="form-fields">Cantidad</label>
                                <label class="mandatory-field">*</label>
                                <input type="text"
                                       class="form-control {{$errors->has('quantity') ? 'is-invalid' : ''}}"
                                       name="quantity" id="quantity" value="{{old('quantity',0)}}">
                                @if ($errors->has('quantity'))
                                    <span class="text-danger">{{ $errors->first('quantity') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 form-group">
                            <div>
                                <label for="total_cost" class="form-fields">Costo Total</label>
                                <label class="mandatory-field">*</label>
                                <input type="text" class="form-control " name="total_cost" id="total_cost"
                                       readonly value="{{old('total_cost',0)}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 form-group">
                            <div>
                                <label for="name" class="form-fields">Descripción</label>
                                <textarea class="form-control" name="description" id="description"
                                          rows="3">{{old('description')}}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="buttons-form-submit d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary mr-1" data-dismiss="modal">Cerrar</button>
                        <button type="submit" href="#" class="btn btn-primary">
                            Guardar
                            <i class="fas fa-spinner fa-spin d-none"></i>
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
