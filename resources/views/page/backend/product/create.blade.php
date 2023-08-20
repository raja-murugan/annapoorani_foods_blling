<div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="myExtraLargeModalLabel">Create Product</h5>
        </div>
        <div class="modal-body">
            <form autocomplete="off" method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                     <div class="col-lg-6 col-sm-6 col-6">
                        <div class="form-group">
                            <label>Session <span style="color: red;">*</span></label>
                              <select class="form-control  select productsession_id" name="session_id" id="session_id" required>
                                    <option value="" disabled selected hiddden>Select Session</option>
                                    @foreach ($session as $sessions)
                                        <option value="{{ $sessions->id }}">{{ $sessions->name }}</option>
                                    @endforeach 
                                </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-6">
                        <div class="form-group">
                            <label>Category <span style="color: red;">*</span></label>
                              <select class="form-control  select productcategory_id" name="category_id" id="category_id" required>
                                    <option value="" disabled selected hiddden>Select Category</option>
                                </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-6">
                        <div class="form-group">
                            <label>Product Name <span style="color: red;">*</span></label>
                            <input type="text" name="name" placeholder="Enter Product name" class="product_name" required>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-6">
                        <div class="form-group">
                            <label>Price<span style="color: red;">*</span></label>
                            <input type="text" name="price" placeholder="Enter Product Price" required>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-6">
                        <div class="form-group">
                            <label>Image<span style="color: red;">*</span></label>
                            <input type="file" id="productimage" class="form-control" name="productimage"><br/><br/>
                            <img src="#" id="category-img-tag" width="150" height="100"/>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-6">
                        <div class="form-group">
                            <label>Note<span style="color: red;">*</span></label>
                            <textarea type="text" name="note" placeholder="Enter note" required></textarea>
                        </div>
                    </div>

                    <hr>
                    <div class="col-lg-12 button-align">
                        <button type="submit" class="btn btn-submit me-2">Save</button>
                        <button type="button" class="btn btn-cancel" data-bs-dismiss="modal"
                            aria-label="Close">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
