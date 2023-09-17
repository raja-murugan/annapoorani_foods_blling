<div class="modal-dialog modal-l">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="myExtraLargeModalLabel">Update</h5>
        </div>
        <div class="modal-body">
            <form autocomplete="off" method="POST" action="{{ route('productsession.edit', ['id' => $Productdatas['id']]) }}">
                @csrf
                <div class="row">
                    <div class="col-lg-12 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Product <span style="color: red;">*</span></label>
                            <select class="form-control  select product_id" name="product_id" id="product_id" required>
                                    <option value="" disabled selected hiddden>Select Product</option>
                                    @foreach ($Product as $Products)
                                        <option value="{{ $Products->id }}"@if ($Products->id === $Productdatas['product_id']) selected='selected' @endif>{{ $Products->name }}</option>
                                    @endforeach
                                </select>
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-6 col-12">
                            <div class="form-group">
                                <label style="font-size:15px;padding-top: 5px;padding-bottom: 2px;">Session<span
                                        style="color: red;">*</span> </label>
                                <select class="form-control js-example-basic-single select" name="session_id" id="session_id" required>
                                    <option value="" disabled selected hiddden>Select Session</option>
                                    @foreach ($session as $sessions)
                                        <option value="{{ $sessions->id }}"@if ($sessions->id === $Productdatas['session_id']) selected='selected' @endif>{{ $sessions->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    <hr>
                    <div class="col-lg-12 button-align">
                        <button type="submit" class="btn btn-submit me-2">Update</button>
                        <button type="button" class="btn btn-cancel" data-bs-dismiss="modal"
                            aria-label="Close">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
